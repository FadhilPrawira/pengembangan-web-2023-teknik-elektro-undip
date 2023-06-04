<?php
# @Author: Sahebul
# @Date:   2019-06-13T15:38:21+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-06-13T15:38:33+05:30

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Reports extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('reports_model');
        $this->load->model('sales/sales_model');
        $this->load->library('form_validation');
        $this->load->library('breadcrumbs');
        $this->load->helper('fileUpload');
    }
    public function index()
    {
        $this->layout->set_title('Reports');
        $this->breadcrumbs->admin_push('Dashboard', 'dashboard');
        $this->breadcrumbs->admin_push('Reports', 'reports');
        $this->layout->view_render('index');
    }
    public function products(){
     $productResult=$this->reports_model->get_products_report();
     $filename = "Product_excel.xls";
       header("Content-Type: application/vnd.ms-excel");
       header("Content-Disposition: attachment; filename=\"$filename\"");
       $isPrintHeader = false;
       if (! empty($productResult)) {
           foreach ($productResult as $row) {
               if (! $isPrintHeader) {
                   echo implode("\t", array_keys($row)) . "\n";
                   $isPrintHeader = true;
               }
               echo implode("\t", array_values($row)) . "\n";
           }
       }
       exit();
    }
    public function category(){
     $Result=$this->reports_model->get_category_report();
     $filename = "Category_excel.xls";
       header("Content-Type: application/vnd.ms-excel");
       header("Content-Disposition: attachment; filename=\"$filename\"");
       $isPrintHeader = false;
       if (! empty($Result)) {
           foreach ($Result as $row) {
               if (! $isPrintHeader) {
                   echo implode("\t", array_keys($row)) . "\n";
                   $isPrintHeader = true;
               }
               echo implode("\t", array_values($row)) . "\n";
           }
       }
       exit();
    }
    public function brands(){
     $Result=$this->reports_model->get_brands_report();
     $filename = "Brand_excel.xls";
       header("Content-Type: application/vnd.ms-excel");
       header("Content-Disposition: attachment; filename=\"$filename\"");
       $isPrintHeader = false;
       if (! empty($Result)) {
           foreach ($Result as $row) {
               if (! $isPrintHeader) {
                   echo implode("\t", array_keys($row)) . "\n";
                   $isPrintHeader = true;
               }
               echo implode("\t", array_values($row)) . "\n";
           }
       }
       exit();
    }
    public function sales(){
      $from_date=$this->input->post("from_date");
      $to_date=$this->input->post("to_date");
     $Result=$this->reports_model->get_sales_report($from_date,$to_date);
     $filename = "sales_excel.xls";
       header("Content-Type: application/vnd.ms-excel");
       header("Content-Disposition: attachment; filename=\"$filename\"");
       $isPrintHeader = false;
       if (! empty($Result)) {
           foreach ($Result as $row) {
               if (! $isPrintHeader) {
                   echo implode("\t", array_keys($row)) . "\n";
                   $isPrintHeader = true;
               }
               echo implode("\t", array_values($row)) . "\n";
           }
       }
       exit();
    }

}
