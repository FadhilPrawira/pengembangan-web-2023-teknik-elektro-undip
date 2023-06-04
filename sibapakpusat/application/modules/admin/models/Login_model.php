<?php
# @Author: Sahebul
# @Date:   2019-05-23T11:50:42+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-05-25T10:28:44+05:30



if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Login_model extends CI_Model
{
    public $table = 'tbl_login';
    public $id = 'login_id';
    public $order = 'DESC';
    function __construct()
    {
        parent::__construct();
    }
    function get_tahun()
    {
        $this->db->select("distinct (tp.tahun)")
                  ->from('tbl_persediaan as tp');

        return $this->db->get()->result();
    }
	function process($username,$password,$tahun) {
        $this->db->select('*');
        $this->db->from('tbl_login');
        $this->db->where("username", $username);
		    $this->db->where("password", MD5($password));
        $this->db->where("is_deleted", 0);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            $row=$query->row();
            $id = $row->login_id;
            $username = $row->username;
            $password = $row->password;
            $data = array(
                "username" => $username,
                "login_id" => $id,
                "tahun" => $tahun,
                "admin_logged_in" => true,
                "isadmin" => true
            );
			  $this->session->set_userdata($data);
        return true;
        } else {
            return false;
        }
    } // End of process()

	function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get("tbl_login")->row();
    }
	function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update("tbl_login", $data);
    }
}
/* End of file Login_model.php */
