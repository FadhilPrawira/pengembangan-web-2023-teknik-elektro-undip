<?php
# @Author: Sahebul
# @Date:   2019-05-25T09:59:41+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-05-25T10:24:15+05:30



if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Brands_model extends MY_Model
{
  protected $tbl;
  protected $primary_key;
  function __construct(){
    parent::__construct();
    $this->tbl="tbl_brand";
    $this->primary_key = "brand_id";
  }
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->primary_key, $id);
        return $this->db->get($this->tbl)->row();
    }
    function get_all(){
      $this->db->select("name,brand_id")
                ->from($this->tbl)
                ->where('is_deleted','0')
                ->order_by('name');
      return $this->db->get()->result();
    }
    function add($data){
        $this->db->insert($this->tbl,$data);
        return $this->db->insert_id();;
    }
    function edit($id,$data){
      $this->db->where($this->primary_key, $id);
      $this->db->update($this->tbl,$data);
      return $this->db->affected_rows();
    }
    function get_brands(){
      $query = "SELECT
                  tb.brand_id,
                  tb.name
                 FROM tbl_brand as tb
                 WHERE tb.is_deleted='0' ";

     $totalCol = $this->input->post('iColumns');
     $search = $this->input->post('sSearch');
     $columns = explode(',', $this->input->post('columns'));
     $start = $this->input->post('iDisplayStart');
     $page_length = $this->input->post('iDisplayLength');

     $query .= " AND (tb.name like '%$search%' )";
     $query .= " GROUP BY tb.brand_id";
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
