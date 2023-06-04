<?php
# @Author: Sahebul
# @Date:   2019-05-24T14:33:08+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-05-25T10:27:27+05:30



if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Activity_model extends MY_Model
{
  protected $tbl;
  protected $primary_key;
  function __construct(){
    parent::__construct();
    $this->tbl="tbl_admin_activities";
    $this->primary_key = "activity_id";
  }

    function add($data){
        $this->db->insert($this->tbl,$data);
        return $this->db->insert_id();;
    }
    function get_activities(){
      $query = "SELECT
                  ta.activity_id,
                  ta.activity
                 FROM tbl_admin_activities as ta";

     $totalCol = $this->input->post('iColumns');
     $search = $this->input->post('sSearch');
     $columns = explode(',', $this->input->post('columns'));
     $start = $this->input->post('iDisplayStart');
     $page_length = $this->input->post('iDisplayLength');

     $query .= " WHERE (ta.activity like '%$search%' )";
     $query .= " GROUP BY ta.activity_id";
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
