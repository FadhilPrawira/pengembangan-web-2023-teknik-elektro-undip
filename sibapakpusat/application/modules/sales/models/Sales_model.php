<?php
# @Author: Sahebul
# @Date:   2019-06-11T11:33:25+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-06-11T11:33:45+05:30

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Sales_model extends MY_Model
{
  protected $tbl;
  protected $primary_key;
  function __construct(){
    parent::__construct();
    $this->tbl="tbl_sales";
    $this->primary_key = "sales_id";
  }
  function get_total_sales(){
    $this->db->select("sum(total) as total_sale")
              ->from($this->tbl)
              ->where('is_deleted','0');
    return $this->db->get()->row();
  }
    // get data by id
    function get_product_by_filter($category_id,$brand_id){
      $this->db->select("tp.name as product_name,
                          pp.prod_id,
                          pp.prod_price_id,
                          pp.sold_as,
                          pp.attributes_value,
                          pp.price,
                          pp.tax_rate")
                ->from('tbl_products as tp')
                ->join('tbl_product_price as pp','pp.prod_id=tp.prod_id','left')
                ->join('tbl_product_attributes as tpa','tpa.attributes_id=pp.attributes_id','left')
                ->where(array("tp.category_id"=>$category_id,"tp.is_deleted"=>"0","tp.brand_id"=>$brand_id));
      return $this->db->get()->result();
    }
    function get_by_id($id)
    {
        $this->db->select("p.*,pp.*,tpa.name as attributes_name")
                  ->from('tbl_sales as p')
                  ->join('tbl_product_price as pp','pp.prod_id=p.prod_id','left')
                  ->join('tbl_product_attributes as tpa','tpa.attributes_id=pp.attributes_id','left')
                  ->where(array("p.prod_id"=>$id,"p.is_deleted"=>"0","pp.is_deleted"=>"0"));
        return $this->db->get()->result();
    }
    function add($data){
        $this->db->insert($this->tbl,$data);
        return $this->db->insert_id();
    }
    function next_order_id(){
      $this->db->select('order_id')
              ->from($this->tbl)
              ->order_by('sales_id','DESC')
              ->limit(1);
      $query=$this->db->get();
      if($query->num_rows() > 0){
        return $query->row()->order_id+1;
      }else {
        return 1;
      }
    }
  function edit($id,$data){
      $this->db->where($this->primary_key, $id);
      $this->db->update($this->tbl,$data);
      return $this->db->affected_rows();
    }


    function get_sales(){
      $query = "SELECT
                  ts.sales_id,
                  ts.order_id,
                  ts.sold_as,
                  ts.attributes_value,
                  concat(ts.price,'/',ts.sold_as) as price,
                  ts.qty,
                  ts.total,
                  concat(tp.name,'-',ts.attributes_value) as product_name
                 FROM tbl_sales as ts
                 LEFT JOIN tbl_products as tp on tp.prod_id=ts.prod_id
                 WHERE ts.is_deleted='0' ";

     $totalCol = $this->input->post('iColumns');
     $search = $this->input->post('sSearch');
     $columns = explode(',', $this->input->post('columns'));
     $start = $this->input->post('iDisplayStart');
     $page_length = $this->input->post('iDisplayLength');

     $query .= " AND (tp.name like '%$search%' OR ts.attributes_value like '%$search%' )";
     $query .= " GROUP BY ts.sales_id";
     $totalRecords = count($this->db->query($query)->result());

     for ($i = 0; $i < $this->input->post('iSortingCols'); $i++) {
         $sortcol = $this->input->post('iSortCol_' . $i);
         if ($this->input->post('bSortable_' . $sortcol)) {
           $query .= " ORDER BY ($columns[$sortcol])" . $this->input->post('sSortDir_' . $i);
         }
     }

     $this->db->limit($page_length, $start);

     $query .= " LIMIT $start,$page_length";
     $result = $this->db->query($query);
     $data = $result->result();
     $resData = json_encode(array(
         "aaData" => $data,
         "iTotalDisplayRecords" => $totalRecords,
         "iTotalRecords" => $totalRecords,
         "sColumns" => $this->input->post('sColumns'),
         "sEcho" => $this->input->post('sEcho')
     ));

     return $resData;
    }
}
