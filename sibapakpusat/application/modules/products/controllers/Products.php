<?php
# @Author: Sahebul
# @Date:   2019-05-29T11:08:05+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-05-29T11:23:29+05:30


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
        $this->load->model('category/category_model');
        $this->load->model('brands/brands_model');
        $this->load->model('attributes/attributes_model');
        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');
        $this->load->helper('fileUpload');
        $this->layout->add_js('custom/persediaan.js');
        $this->config->load('config');
    }
    public function index()
    {
        $this->layout->set_title('Daftar Aset Persediaan');
        $this->load_datatables();
        $this->layout->add_js('../datatables/persediaan_table.js');
        $this->breadcrumbs->admin_push('Dashboard', 'dashboard');
        $this->breadcrumbs->admin_push('products List', 'products');
        $this->layout->view_render('index');
    }
    public function get_products(){
     echo  $this->products_model->get_products();
    }
    public function get_persediaans(){
      $tahun = $this->session->userdata('tahun');
     echo  $this->products_model->get_persediaans($tahun);
    }
    public function get_persediaans_line(){

      $result=$this->products_model->get_persediaans_line($this->input->post('no_kuitansi'));

      if($result){
        echo json_encode(array('message'=>'Inventory Data','type'=>'success',"data"=>$result));
      }else {
        echo json_encode(array('message'=>'Something went wrong','type'=>'warning'));
      }
    }
    public function add()
    {
        $this->layout->set_title('Add Product');
        //$this->layout->add_js('../public/pekeupload/js/pekeUpload.js');
        $this->breadcrumbs->admin_push('Dashboard', 'dashboard');
        $this->breadcrumbs->admin_push('products List', 'products');
        $this->breadcrumbs->admin_push('Add products', 'products/add');
        $data = array(
            'button' => 'Add',
            'action' => admin_url('products/add_products'),
            'prod_id' => set_value(''),
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
    public function insertapi()
    {
      $url = 'http://localhost/monitoringbarang_ft/admin/pengajuan_baru/simpan_pengajuan_baru';
      $data = array('xunit' => '1',
    'xpengguna_nama' => 'Operator FT',
    'xnamabarang' => 'adnaosdmaosdnoas',
    'xsatuan' => 'Coba',
    'xjmlbrg' => 10);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      $response = curl_exec($ch);
      echo $response;
      if (curl_errno($ch)) {
   // Handle the error
   $error_msg = curl_error($ch);
  echo $error_msg;
  die();
}

      curl_close($ch);

    }
    public function add_products()
    {//var_dump($this->input->post());die;
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
          $name =
          $data = array(
               'name' => $this->input->post('name', TRUE),
               'category_id' => $this->input->post('product_category', TRUE),
               'brand_id' => $this->input->post('brand', TRUE),
               'description' => $this->input->post('description', TRUE)
           );
          if ($this->input->post("upload_image")) {
                  $image = moveFile(1, $this->input->post("upload_image"), "image");
                  $data['image_path'] = $image[0];
              }

          $result=$this->products_model->add($data);
          $attributes=!empty($this->input->post('attributes')) ? $this->input->post('attributes'):"";
          $attributes_value=!empty($this->input->post('attributes_value'))?$this->input->post('attributes_value'):"";
          $sold_as=!empty($this->input->post('sold_as'))?$this->input->post('sold_as'):"";
          $price=!empty($this->input->post('price'))?$this->input->post('price'):"";
          $inventory=!empty($this->input->post('inventory'))?$this->input->post('inventory'):"";
          $tax_rate=!empty($this->input->post('tax_rate'))?$this->input->post('tax_rate'):"";
          if($attributes){
            foreach ($attributes as $key => $value) {
              $attribute_data=array('attributes_id'=>$attributes[$key],
                                    'attributes_value'=>$attributes_value[$key],
                                    'prod_id'=>$result,
                                    'price' => $price[$key],
                                    'sold_as'=>$sold_as[$key],
                                    'inventory'=>$inventory[$key],
                                    'tax_rate'=>$tax_rate[$key]);
              $this->products_model->add_price($attribute_data);
            }
          }

          if($result){
            $this->activity_model->add(array('login_id'=>$this->login_id,'activity'=>ucfirst($this->username).' adde a product at '.date("M d, Y H:i")));
            $this->session->set_flashdata(array('message'=>'Product Added Successfully','type'=>'success'));
          }else {
            $this->session->set_flashdata(array('message'=>'Something went wrong. Try again','type'=>'warning'));
          }
          redirectToAdmin('products');

        }
    }
    public function edit($no_kuitansi)
    {
          //$this->layout->add_js('../public/pekeupload/js/pekeUpload.js');
          $this->breadcrumbs->admin_push('Dashboard', 'dashboard');
          $this->breadcrumbs->admin_push('List Persediaan', 'products');
          $this->breadcrumbs->admin_push('Edit Persediaan', 'products/edit/'.$no_kuitansi);
          $row = $this->products_model->get_line_by_no_kuitansi($no_kuitansi);
          $row2 = $this->products_model->get_by_no_kuitansi($no_kuitansi);

          if ($row) {
              $data = array(
                  'button' => 'Update',
                  'no_kuitansi' => $no_kuitansi,
                  'action' => admin_url('products/edit_persediaans/'.$no_kuitansi));

              $data['edit_data']=$row;
              $data['edit_persediaan_data']=$row2;

              //$data['sold_as']=$this->config->item('sold_as');
              //$data['tax_rate']=$this->config->item('tax_rate');
              //$data['category_list']=$this->category_model->get_all();
              //$data['brand_list']=$this->brands_model->get_all();
              //$data['attributes_list']=$this->attributes_model->get_all();
              $this->layout->view_render('edit', $data);
          } else {
            $this->session->set_flashdata(array('message'=>'No Records Found','type'=>'warning'));
            redirectToAdmin('products');
          }

    }
    public function edit_persediaans($no_kuitansi){
      //$this->_rules();
      //if ($this->form_validation->run() == FALSE) {
          //redirectToAdmin('products/edit/'.$no_kuitansi);
      //}

      $data_to_update=array(
        'status' => $this->input->post('status', TRUE),
        'unit_kuitansi' => $this->input->post('unit_kuitansi', TRUE),
        'uraian' => $this->input->post('uraian', TRUE),
        'tahun' => $this->input->post('tahun', TRUE),
        'tanggal' => $this->input->post('tanggal', TRUE),
        'tanggal_proses' => $this->input->post('tanggal_proses', TRUE),
        'posisi_terakhir' => $this->input->post('posisi_terakhir', TRUE),
        'unit' => $this->input->post('unit', TRUE),
        'subunit' => $this->input->post('subunit', TRUE),
        'sub_subunit' => $this->input->post('sub_subunit', TRUE),
        'total_harga' => $this->input->post('total_harga', TRUE),
        'subtotal' => $this->input->post('total_harga', TRUE),

      );

     $result=$this->products_model->edit($no_kuitansi,$data_to_update);

      $nos=!empty($this->input->post('no')) ? $this->input->post('no'):"";
      $barangs=!empty($this->input->post('barang')) ? $this->input->post('barang'):"";
      $jumlahs=!empty($this->input->post('jumlah'))?$this->input->post('jumlah'):"";
      $satuans=!empty($this->input->post('satuan'))?$this->input->post('satuan'):"";
      $hargas=!empty($this->input->post('harga'))?$this->input->post('harga'):"";
      $subtotals=!empty($this->input->post('subtotalline'))?$this->input->post('subtotalline'):"";

      if($nos){
        $this->products_model->delete_persediaan_line($no_kuitansi);
        //$this->products_model->update_persediaan_line($no_kuitansi);
        foreach ($nos as $key => $value) {
          //print_r($nos);
          //die();
          $persediaan_data=array('no'=>$nos[$key],
                                'barang'=>$barangs[$key],
                                'jumlah' => $jumlahs[$key],
                                'satuan'=>$satuans[$key],
                                'harga'=>$hargas[$key],
                                'subtotal'=>$subtotals[$key],
                                'no_kuitansi'=>$no_kuitansi);

          //if($nos[$key]){
           $this->products_model->edit_persediaan_line($no_kuitansi,$persediaan_data);
          //}else {
          //  $persediaan_data['no_kuitansi']=$no_kuitansi;
          //  $this->products_model->add_persediaan_line($persediaan_data);
          //}
        }
      }
      //print_r($persediaan_data);
      //die();
      if($result){
        $this->session->set_flashdata(array('message'=>'Persediaan berhasil diupdated','type'=>'success'));
      }else {
        $this->session->set_flashdata(array('message'=>'Ada yang salah','type'=>'warning'));
      }
      redirectToAdmin('products');
    }

    public function delete()
    {
      $prod_id=$this->input->post('prod_id');
      $result=$this->products_model->edit($prod_id,array('is_deleted'=>'1','updated_at'=>date("Y-m-d h:i:s") ));
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
        $this->form_validation->set_rules('product_category', 'Product Category', 'trim|required');
        $this->form_validation->set_rules('brand', 'Product Brand', 'trim|required');
        $this->form_validation->set_rules('attributes[]', 'Product Attributes', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span><br/>');
    }

}
