<?php
# @Author: sahebul
# @Date:   2019-05-27T17:48:31+05:30

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Attributes extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('attributes_model');
        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');
    }
    public function index()
    {
        $this->layout->set_title('Attributes List');
        $this->load_datatables();
        $this->layout->add_js('../datatables/attributes_table.js');
        $this->breadcrumbs->admin_push('Dashboard', 'dashboard');
        $this->breadcrumbs->admin_push('Attributes List', 'Attributes');
        $this->layout->view_render('index');
    }
    public function get_attributes(){
     echo  $this->attributes_model->get_attributes();
    }
    public function add()
    {
        $this->layout->set_title('Add Attribute');
        // $this->layout->add_js('../js/tagify.js');
        // $this->layout->add_js('../js/jQuery.tagify.min.js');
        $this->breadcrumbs->admin_push('Dashboard', 'dashboard');
        $this->breadcrumbs->admin_push('Attributes List', 'attributes');
        $this->breadcrumbs->admin_push('Add Attributes', 'attributes/add');
        $data = array(
            'button' => 'Add',
            'action' => admin_url('attributes/add_attributes'),
            'attributes_id' => set_value(''),
            'name' => set_value('name'),
            'attributes_value' => set_value(''),
        );
        $this->layout->view_render('add', $data);
    }
    public function add_attributes()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
          $name = $this->input->post('name', TRUE);
          $data = array(
               'name' => $name,
               'values'=> $this->input->post('attributes_value',true)
           );


          $attributes_id=$this->attributes_model->add($data);
          if($attributes_id){
            $this->activity_model->add(array('login_id'=>$this->login_id,'activity'=>ucfirst($this->username).' adde a attribute at '.date("M d, Y H:i")));
            $this->session->set_flashdata(array('message'=>'Attribute Added Successfully','type'=>'success'));
          }else {
            $this->session->set_flashdata(array('message'=>'Something went wrong. Try again','type'=>'warning'));
          }
          redirectToAdmin('attributes');

        }
    }
    public function edit($id)
    {   $this->layout->add_js('../public/pekeupload/js/pekeUpload.js');
        if(check_post()){
          $this->_rules();
          if ($this->form_validation->run() == FALSE) {
              redirectToAdmin('attributes/edit/'.$id);
          }
          $name = $this->input->post('name', TRUE);
          $attributes_id = $this->input->post('attributes_id', TRUE);
          $attributes_value = $this->input->post('attributes_value', TRUE);
          $data_to_update=array('name'=>$name,'values'=>$attributes_value,'updated_at'=>date("Y-m-d h:i:s"));

          $result=$this->attributes_model->edit($attributes_id,$data_to_update);
          if($result){
            $this->session->set_flashdata(array('message'=>'Attribute updated Successfully','type'=>'success'));
          }else {
            $this->session->set_flashdata(array('message'=>'Something went wrong. Try again','type'=>'warning'));
          }
          redirectToAdmin('attributes');
        }else {
          $row = $this->attributes_model->get_by_id($id);
          if ($row) {
              $data = array(
                  'button' => 'Update',
                  'action' => admin_url('attributes/edit/'.$row->attributes_id),
                  'attributes_id' => set_value('attributes_id', $row->attributes_id),
                  'name' => set_value('name', $row->name),
                  "attributes_value" => set_value('attributes_value',$row->values)
              );
              $this->layout->view_render('add', $data);
          } else {
            $this->session->set_flashdata(array('message'=>'No Records Found','type'=>'warning'));
            redirectToAdmin('attributes');
          }
        }

    }
    function formatAttributesValue($data){
       // string(54) "[{"value":"vdfvgd"},{"value":"fdgdf"},{"value":"dfs"}]"
       if($data){
         foreach ($data as $key => $value) {
           var_dump($value->value);die;
           // code...
         }
       }else {
         return "";
       }
    }
    public function delete()
    {
      $attributes_id=$this->input->post('attributes_id');
      $result=$this->attributes_model->edit($attributes_id,array('is_deleted'=>'1','updated_at'=>date("Y-m-d h:i:s") ));
      if($result){
        $this->activity_model->add(array('login_id'=>$this->login_id,'activity'=>ucfirst($this->username).' deleted a Attribute at '.date("M d, Y H:i")));
        echo json_encode(array('message'=>'Attribute deleted Successfully','type'=>'success'));
      }else {
        echo json_encode(array('message'=>'Something went wrong','type'=>'warning'));
      }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span><br/>');
    }

}
