<?php
# @Author: Sahebul
# @Date:   2019-06-03T11:18:52+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-06-03T11:18:55+05:30

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Inventory_model extends MY_Model
{
  protected $tbl;
  protected $primary_key;
  function __construct(){
    parent::__construct();
    $this->tbl="tbl_product_price";
    $this->primary_key = "prod_price_id";
  }

  function edit_row($id,$data){
    $this->db->where($this->primary_key,$id);
    $this->db->update($this->tbl,$data);
    return $this->db->affected_rows();
  }

  //For datatable
    function tot_rows(){
        $this->db->select("tp.name as product_name,
        tp.image_path,
        tpp.prod_id,
        tpp.prod_price_id,
        tpp.attributes_id,
        tpp.attributes_value,
        tpp.sold_as,
        tpp.price,
        tpp.tax_rate,
        tpp.inventory,
        tap.name as attributes_name");
        $this->db->from("tbl_product_price as tpp");
        $this->db->join('tbl_product_attributes as tap','tap.attributes_id=tpp.attributes_id','left');
        $this->db->join('tbl_products tp','tp.prod_id=tpp.prod_id','left');
        $this->db->where("tpp.is_deleted","0");
        $this->db->group_by('tpp.prod_price_id');
        $query = $this->db->get();
        return $query->num_rows();
    }//End of tot_rows()

    function all_rows($limit, $start, $col, $dir){
        $this->db->select("tp.name as product_name,
        tp.image_path,
        tpp.prod_id,
        tpp.prod_price_id,
        tpp.attributes_id,
        tpp.attributes_value,
        tpp.sold_as,
        tpp.price,
        tpp.tax_rate,
        tpp.inventory,
        tap.name as attributes_name");
        $this->db->from("tbl_product_price as tpp");
        $this->db->join('tbl_product_attributes as tap','tap.attributes_id=tpp.attributes_id','left');
        $this->db->join('tbl_products tp','tp.prod_id=tpp.prod_id','left');
        $this->db->where("tpp.is_deleted","0");
        $this->db->group_by('tpp.prod_price_id');
        $this->db->limit($limit, $start);
        $this->db->order_by($col, $dir);
        $query = $this->db->get();
        if($query->num_rows() == 0) {
            return NULL;
        } else {
            return $query->result();
        }
    }//End of all_rows()

    function search_rows($limit, $start, $keyword, $col, $dir){
        $this->db->select("tp.name as product_name,
        tp.image_path,
        tpp.prod_id,
        tpp.prod_price_id,
        tpp.attributes_id,
        tpp.attributes_value,
        tpp.sold_as,
        tpp.price,
        tpp.tax_rate,
        tpp.inventory,
        tap.name as attributes_name");
        $this->db->from("tbl_product_price as tpp");
        $this->db->join('tbl_product_attributes as tap','tap.attributes_id=tpp.attributes_id','left');
        $this->db->join('tbl_products tp','tp.prod_id=tpp.prod_id','left');
        $this->db->where("tpp.is_deleted","0");
        $this->db->like('tp.name', $keyword);
        // $this->db->or_like('c.name', $keyword);
        $this->db->limit($limit, $start);
        $this->db->group_by('tpp.prod_price_id');
        $this->db->order_by($col, $dir);


        $query = $this->db->get();//var_dump($this->db->last_query());die;
        if($query->num_rows() == 0) {
            return NULL;
        } else {
            return $query->result();
        }
    }//End of search_rows()

    function tot_search_rows($keyword){
        $this->db->select("tp.name as product_name,
        tp.image_path,
        tpp.prod_id,
        tpp.prod_price_id,
        tpp.attributes_id,
        tpp.attributes_value,
        tpp.sold_as,
        tpp.price,
        tpp.tax_rate,
        tpp.inventory,
        tap.name as attributes_name");
        $this->db->from("tbl_product_price as tpp");
        $this->db->join('tbl_product_attributes as tap','tap.attributes_id=tpp.attributes_id','left');
        $this->db->join('tbl_products tp','tp.prod_id=tpp.prod_id','left');
        $this->db->where("tpp.is_deleted","0");
        $this->db->group_by('tpp.prod_price_id');
        $query = $this->db->get();
        return $query->num_rows();
    }//End of tot_search_rows()


}
