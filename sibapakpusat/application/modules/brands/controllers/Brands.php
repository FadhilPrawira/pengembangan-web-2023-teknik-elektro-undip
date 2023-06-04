<?php
# @Author: Sahebul
# @Date:   2019-05-25T10:08:05+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-05-25T10:23:29+05:30


if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Brands extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('brands_model');
        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');
        $this->load->helper('fileUpload');
    }
    public function index()
    {
        $this->layout->set_title('Brands List');
        $this->load_datatables();
        $this->layout->add_js('../datatables/brand_table.js');
        $this->breadcrumbs->admin_push('Dashboard', 'dashboard');
        $this->breadcrumbs->admin_push('Brands List', 'brands');
        $this->layout->view_render('index');
    }
    public function get_brands(){
     echo  $this->brands_model->get_brands();
    }
    public function add()
    {
        $this->layout->set_title('Add Brand');
        $this->layout->add_js('../public/pekeupload/js/pekeUpload.js');
        $this->breadcrumbs->admin_push('Dashboard', 'dashboard');
        $this->breadcrumbs->admin_push('Brands List', 'brands');
        $this->breadcrumbs->admin_push('Add Brands', 'brands/add');
        $data = array(
            'button' => 'Add',
            'action' => admin_url('brands/add_brands'),
            'brand_id' => set_value(''),
            'image_path' => set_value(''),
            'name' => set_value('name'),
        );
        $this->layout->view_render('add', $data);
    }
    public function add_brands()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
          $name = $this->input->post('name', TRUE);
          $data = array(
               'name' => $name,
           );
          if ($this->input->post("upload_image")) {
                  $image = moveFile(0, $this->input->post("upload_image"), "image");
                  $data['image_path'] = $image[0];
              }


          $result=$this->brands_model->add($data);
          if($result){
            $this->activity_model->add(array('login_id'=>$this->login_id,'activity'=>ucfirst($this->username).' adde a brand at '.date("M d, Y H:i")));
            $this->session->set_flashdata(array('message'=>'Brand Added Successfully','type'=>'success'));
          }else {
            $this->session->set_flashdata(array('message'=>'Something went wrong. Try again','type'=>'warning'));
          }
          redirectToAdmin('brands');

        }
    }
    public function edit($id)
    {   $this->layout->add_js('../public/pekeupload/js/pekeUpload.js');
        if(check_post()){
          $this->_rules();
          if ($this->form_validation->run() == FALSE) {
              redirectToAdmin('brands/edit/'.$id);
          }
          $name = $this->input->post('name', TRUE);
          $brand_id = $this->input->post('brand_id', TRUE);
          $data_to_update=array('name'=>$name,'updated_at'=>date("Y-m-d h:i:s"));
          if ($this->input->post("upload_image")) {
                  $image = moveFile(0, $this->input->post("upload_image"), "image");
                  $data_to_update['image_path'] = $image[0];
              }

          $result=$this->brands_model->edit($brand_id,$data_to_update);
          if($result){
            $this->session->set_flashdata(array('message'=>'Brand updated Successfully','type'=>'success'));
          }else {
            $this->session->set_flashdata(array('message'=>'Something went wrong. Try again','type'=>'warning'));
          }
          redirectToAdmin('brands');
        }else {
          $row = $this->brands_model->get_by_id($id);
          if ($row) {
              $data = array(
                  'button' => 'Update',
                  'action' => admin_url('brands/edit/'.$row->brand_id),
                  'brand_id' => set_value('brand_id', $row->brand_id),
                  'image_path' => set_value('image_path', $row->image_path),
                  'name' => set_value('name', $row->name)
              );
              $this->layout->view_render('add', $data);
          } else {
            $this->session->set_flashdata(array('message'=>'No Records Found','type'=>'warning'));
            redirectToAdmin('brands');
          }
        }

    }

    public function delete()
    {
      $brand_id=$this->input->post('brand_id');
      $result=$this->brands_model->edit($brand_id,array('is_deleted'=>'1','updated_at'=>date("Y-m-d h:i:s") ));
      if($result){
        $this->activity_model->add(array('login_id'=>$this->login_id,'activity'=>ucfirst($this->username).' deleted a brand at '.date("M d, Y H:i")));
        echo json_encode(array('message'=>'Brand deleted Successfully','type'=>'success'));
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
