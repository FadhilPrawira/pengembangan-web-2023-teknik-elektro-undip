<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan_model extends CI_Model
{
    private $_table = "buku";

    // define nama kolom di dalam tabel "buku"
    public $id;
    public $kodebuku;
    public $judulbuku;
    public $pengarang;
    public $penerbit;

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
        $this->kodebuku = $post["kodebuku"];
        $this->judulbuku = $post["judulbuku"];
        $this->penerbit = $post["penerbit"];
        $this->pengarang = $post["pengarang"];

        return $this->db->insert($this->_table, $this);
    }

    public function caridata($keyword)
    {
	    if(!$keyword){
		    return null;
	    } 
	    $this->db->like('judulbuku', $keyword);
        $this->db->or_like('kodebuku', $keyword);
        $this->db->or_like('penerbit', $keyword);
	    $this->db->or_like('pengarang', $keyword);
	    $query = $this->db->get($this->_table);
	    return $query->result();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->kodebuku = $post["kodebuku"];
        $this->judulbuku = $post["judulbuku"];
        $this->penerbit = $post["penerbit"];
        $this->pengarang = $post["pengarang"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

}