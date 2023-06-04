<?php
# @Author: Sahebul
# @Date:   2019-05-29T11:59:41+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-05-29T11:24:15+05:30



if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Products_model extends MY_Model
{
  protected $tbl;
  protected $primary_key;
  function __construct(){
    parent::__construct();
    $this->tbl="tbl_products";
    $this->primary_key = "prod_id";
  }
    // get data by id
    function get_by_id($id)
    {
        $this->db->select("p.*,pp.*,tpa.name as attributes_name")
                  ->from('tbl_products as p')
                  ->join('tbl_product_price as pp','pp.prod_id=p.prod_id','left')
                  ->join('tbl_product_attributes as tpa','tpa.attributes_id=pp.attributes_id','left')
                  ->where(array("p.prod_id"=>$id,"p.is_deleted"=>"0","pp.is_deleted"=>"0"));
        return $this->db->get()->result();
    }
    function get_line_by_no_kuitansi($no_kuitansi)
    {
        $this->db->select("tp.*,tpl.*")
                  ->from('tbl_persediaan as tp')
                  ->join('tbl_persediaan_line as tpl','tp.no_kuitansi=tpl.no_kuitansi','right')
                  ->where("tp.no_kuitansi",$no_kuitansi)
                  ->group_by('tpl.no');

                  //print_r($this->db->last_query());
//die();
        return $this->db->get()->result();
    }
    function get_by_no_kuitansi($no_kuitansi)
    {
        $this->db->select("tp.kode_usulan_belanja,tp.deskripsi,tp.jumlah,tp.harga_satuan,tp.subtotal")
                  ->from('tbl_persediaan as tp')
                  ->where(array("tp.no_kuitansi"=>$no_kuitansi));
        return $this->db->get()->result();
    }
    function get_all(){
      $this->db->select("name")
                ->from($this->tbl)
                ->where('is_deleted','0')
                ->order_by('name');
      return $this->db->get()->result();
    }
    function add($data){
        $this->db->insert($this->tbl,$data);
        return $this->db->insert_id();
    }
    function add_price($data){
      $this->db->insert("tbl_product_price",$data);
      return $this->db->insert_id();
    }
    function add_persediaan_line($data){
      $this->db->insert("tbl_persediaan_line",$data);
      //return $this->db->insert_id();
    }
    function edit_price($prod_price_id,$data){
      $this->db->where('prod_price_id',$prod_price_id);
      $this->db->update("tbl_product_price",$data);
    }
    function edit_persediaan_line($no_kuitansi,$data){

      //$this->db->where('no_kuitansi',$no_kuitansi);
      //$this->db->update("tbl_persediaan_line",$data);
      $this->db->insert("tbl_persediaan_line",$data);

    }
    function delete_persediaan_line($no_kuitansi)
    {
      $this->db->where('no_kuitansi', $no_kuitansi);
      $this->db->delete('tbl_persediaan_line');
    }
    function update_price($prod_id){
      $this->db->where('prod_id',$prod_id);
      $this->db->update("tbl_product_price",array('is_deleted'=>"1"));
    }

    function edit($id,$data){
      $this->db->where('no_kuitansi', $id);
      $this->db->update('tbl_persediaan',$data);
      return $this->db->affected_rows();
    }

    function get_persediaans_line($no_kuitansi){
      $query = "SELECT
                  tpl.no,
                  tpl.barang,
                  tpl.jumlah,
                  tpl.satuan,
                  tpl.harga,
                  tpl.subtotal
                 FROM tbl_persediaan_line as tpl
                 RIGHT JOIN tbl_persediaan as tp on tp.no_kuitansi=tpl.no_kuitansi
                 WHERE tp.no_kuitansi='$no_kuitansi' group by tpl.no_kuitansi";
      return $this->db->query($query)->result();
    }
    function get_persediaans($tahun){
      // $query = "SELECT
      //             tp.prod_id,
      //             tp.image_path,
      //             tp.name,
      //             tc.name as category_name,
      //             tb.name as brand_name
      //            FROM tbl_products as tp
      //            LEFT JOIN tbl_category as tc on tp.category_id=tc.category_id
      //            LEFT JOIN tbl_brand as tb on tp.brand_id=tb.brand_id
      //            WHERE tp.is_deleted='0' ";
      $query = "SELECT
                             tp.no_kuitansi,
                             tp.uraian,
                             tp.tanggal,
                             tp.tahun,
                             tp.subtotal,
                             tp.status,
                             tp.posisi_terakhir,
                             tp.kode_usulan_belanja
                            FROM tbl_persediaan as tp where tp.tahun='$tahun'
                          ";
     $totalCol = $this->input->post('iColumns');
     $search = $this->input->post('sSearch');
     $columns = explode(',', $this->input->post('columns'));
     $start = $this->input->post('iDisplayStart');
     $page_length = $this->input->post('iDisplayLength');

     $query .= " AND (tp.no_kuitansi like '%$search%' OR tp.uraian like '%$search%' OR tp.status like '%$search%' OR tp.posisi_terakhir like '%$search%' )";
     $query .= " GROUP BY tp.no_kuitansi";
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
