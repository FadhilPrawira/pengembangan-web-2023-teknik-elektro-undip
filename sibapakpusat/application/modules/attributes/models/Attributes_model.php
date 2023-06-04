<?php
# @Author: Sahebul
# @Date:   2019-05-27T09:59:41+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-05-27T10:24:15+05:30



if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Attributes_model extends MY_Model
{
  protected $tbl;
  protected $primary_key;
  function __construct(){
    parent::__construct();
    $this->tbl="tbl_product_attributes";
    $this->primary_key = "attributes_id";
  }
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->primary_key, $id);
        return $this->db->get($this->tbl)->row();
    }
    function get_all(){
      $this->db->select("name,attributes_id,values")
                ->from($this->tbl)
                ->where('is_deleted','0')
                ->order_by('name');
      return $this->db->get()->result();
    }
    function add($data){
        $this->db->insert($this->tbl,$data);
        return $this->db->insert_id();
    }
    function add_att_value($attributes,$attributes_id){
      if($attributes){
        foreach ($attributes as $key => $value) {
          $this->db->insert('tbl_product_attribute_values',array('attributes_id'=>$attributes_id,'value'=>$value->value));
        }

      }
    }
    function get_attr_values_by_id($id){
      $this->db->select('attributes_value_id,value');
      $this->db->from('tbl_product_attribute_values');
      $this->db->WHERE('attributes_id',$id);
      return $this->db->get()->result();
    }
    function edit($id,$data){
      $this->db->where($this->primary_key, $id);
      $this->db->update($this->tbl,$data);
      return $this->db->affected_rows();
    }
    function get_attributes(){
      $query = "SELECT
                  tpa.attributes_id,
                  tpa.name,
                  tpa.values
                 FROM tbl_product_attributes as tpa
                 WHERE tpa.is_deleted='0' ";

     $totalCol = $this->input->post('iColumns');
     $search = $this->input->post('sSearch');
     $columns = explode(',', $this->input->post('columns'));
     $start = $this->input->post('iDisplayStart');
     $page_length = $this->input->post('iDisplayLength');

     $query .= " AND (tpa.name like '%$search%' )";
     $query .= " GROUP BY tpa.attributes_id";
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
