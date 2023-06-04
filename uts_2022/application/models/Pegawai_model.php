<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    private $_table = "pegawai";

    // define nama kolom di dalam tabel "pegawai"
    public $id;
    public $Nomorpegawai_057;
    public $NamaPegawai_057;
    public $Unit_057;
    public $Alamat_057;
    public $Nohp_057;

    // SELECT * FROM nama_tabel;
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function insert_query()
    {
        // Menangkap $_POST
        $post = $this->input->post();
        
        // Mendefinisikan masing-masing column_name berdasarkan $_POST 
        // $this->id = $post["id"];
        // ID tidak didefinisikan karena di MySQL bersifat Auto Increment
        // Selain itu ID juga tidak dituliskan di dalam form di views/add.php
        $this->Nomorpegawai_057 = $post["nomorpegawai"];
        $this->NamaPegawai_057 = $post["namapegawai"];
        $this->Unit_057 = $post["unit"];
        $this->Alamat_057 = $post["alamat"];
        $this->Nohp_057 = $post["noHP"];

        return $this->db->insert($this->_table, $this);
    }

    public function caridata($keyword)
    {
	    if(!$keyword){
		    return null;
	    } 
	    $this->db->like('NamaPegawai_057', $keyword);
	    $query = $this->db->get($this->_table);
	    return $query->result();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->Nomorpegawai_057 = $post["nomorpegawai"];
        $this->NamaPegawai_057 = $post["namapegawai"];
        $this->Unit_057 = $post["unit"];
        $this->Alamat_057 = $post["alamat"];
        $this->Nohp_057 = $post["noHP"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

}