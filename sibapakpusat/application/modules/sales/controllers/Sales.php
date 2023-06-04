<?php
# @Author: sahebul
# @Date:   2019-06-11T11:31:39+05:30
# @Last modified by:   sahebul
# @Last modified time: 2019-06-11T11:31:55+05:30

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Sales extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('products/products_model');
        $this->load->model('sales_model');
        $this->load->model('category/category_model');
        $this->load->model('brands/brands_model');
        $this->load->model('attributes/attributes_model');
        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');
        $this->load->helper('fileUpload');
        $this->layout->add_js('custom/sales.js');
        $this->config->load('config');
    }
    public function index()
    {
        $this->layout->set_title('Sales List');
        $this->load_datatables();
        $this->layout->add_js('../datatables/sales_table.js');
        $this->breadcrumbs->admin_push('Dashboard', 'dashboard');
        $this->breadcrumbs->admin_push('Sales List', 'sales');
        $this->layout->view_render('index');
    }
    public function get_sales(){
     echo  $this->sales_model->get_sales();
    }
    function get_product_by_filter(){
    $products= $this->sales_model->get_product_by_filter($this->input->post('category_id'),$this->input->post('brand_id'));
    if($products) {
        echo '<option value="">Select Products</option>';
        foreach ($products as $row) {
              $prod=$row->product_name.'->'.$row->attributes_value.'->'.$row->price.'/'.$row->sold_as;
            echo '<option data-product_name="'.$row->product_name.'" data-prod_price_id="'.$row->prod_price_id.'" data-sold_as="'.$row->sold_as.'" data-attributes_value="'.$row->attributes_value.'" data-price="'.$row->price.'" data-tax_rate="'.$row->tax_rate.'" value="' . $row->prod_id . '">' .$prod. '</option>';
        }
    }else {
      echo '<option value="">No Records Found</option>';
    }
    }

    public function add()
    {
        $this->layout->set_title('Add Sales');
        $this->breadcrumbs->admin_push('Dashboard', 'dashboard');
        $this->breadcrumbs->admin_push('Sales List', 'sales');
        $this->breadcrumbs->admin_push('Add sales', 'sales/add');
        $data = array(
            'button' => 'Add',
            'action' => admin_url('sales/add_sales'),
            'sales_id' => set_value(''),
            'image_path' => set_value(''),
            'name' => set_value('name'),
        );
        $data['sold_as']=$this->config->item('sold_as');
        $data['tax_rate']=$this->config->item('tax_rate');
        $data['category_list']=$this->category_model->get_all();
        $data['brand_list']=$this->brands_model->get_all();
        $data['attributes_list']=$this->attributes_model->get_all();
        $this->layout->view_render('add', $data);
    }
    public function add_sales()
    { //var_dump($this->input->post());die;
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
          $next_order_id=$this->sales_model->next_order_id();//var_dump($next_order_id);die;
          $prod_id=!empty($this->input->post('prod_id')) ? $this->input->post('prod_id'):"";
          $attributes_value=!empty($this->input->post('attributes_value'))?$this->input->post('attributes_value'):"";
          $sold_as=!empty($this->input->post('sold_as'))?$this->input->post('sold_as'):"";
          $price=!empty($this->input->post('price'))?$this->input->post('price'):"";
          $qty=!empty($this->input->post('qty'))?$this->input->post('qty'):"";
          $total_amount=!empty($this->input->post('total_amount'))?$this->input->post('total_amount'):"";
          $tax_rate=!empty($this->input->post('tax_rate'))?$this->input->post('tax_rate'):"";
          $result=null;
          if($prod_id){
            foreach ($prod_id as $key => $value) {
              $sales_data=array('prod_id'=>$prod_id[$key],
                                    'sales_date'=>$this->input->post('sales_date'),
                                    'attributes_value'=>$attributes_value[$key],
                                    'price' => $price[$key],
                                    'sold_as'=>$sold_as[$key],
                                    'qty'=>$qty[$key],
                                    'total'=>$total_amount[$key],
                                    'order_id' => $next_order_id,
                                    'tax_rate'=>$tax_rate[$key]);
              $result=$this->sales_model->add($sales_data);
            }
          }

          if($result){
            $this->activity_model->add(array('login_id'=>$this->login_id,'activity'=>ucfirst($this->username).' adde a sales at '.date("M d, Y H:i")));
            $this->session->set_flashdata(array('message'=>'Sales Added Successfully','type'=>'success'));
          }else {
            $this->session->set_flashdata(array('message'=>'Something went wrong. Try again','type'=>'warning'));
          }
          redirectToAdmin('sales');

        }
    }

    public function delete()
    {
      $sales_id=$this->input->post('sales_id');
      $result=$this->sales_model->edit($sales_id,array('is_deleted'=>'1','updated_at'=>date("Y-m-d h:i:s") ));
      if($result){
        $this->activity_model->add(array('login_id'=>$this->login_id,'activity'=>ucfirst($this->username).' deleted a sales at '.date("M d, Y H:i")));
        echo json_encode(array('message'=>'Sales deleted Successfully','type'=>'success'));
      }else {
        echo json_encode(array('message'=>'Something went wrong','type'=>'warning'));
      }
    }
    public function _rules()
    {

        $this->form_validation->set_rules('product_category', 'Product Category', 'trim|required');
        $this->form_validation->set_rules('brand', 'Product Brand', 'trim|required');
        $this->form_validation->set_rules('prod_id[]', 'Product', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span><br/>');
    }

}
