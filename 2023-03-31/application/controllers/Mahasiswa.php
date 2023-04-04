<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("mahasiswa_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view("home");
    }

    public function list() 
    {
        $data["mahasiswa"] = $this->mahasiswa_model->getAll();
        $this->load->view("daftar", $data); //menampilkan

    }

    public function cari() 
    {

        $data['keyword'] = $this->input->get('keyword');
		$this->load->model('mahasiswa_model');

		$data['search_result'] = $this->mahasiswa_model->caridata($data['keyword']);
		
		$this->load->view('cari_form.php', $data);
        
    }


    public function add() //nambah data
    {
        $mahasiswa = $this->mahasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        if ($validation->run()) {
            $mahasiswa->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
           // $mahasiswa->getAll();
           // $this->load->view("daftar");
        } 
        else $this->session->set_flashdata('success', 'Gagal disimpan');

        $this->load->view("new_form");
        
    }

    public function edit($id = null)
    {
        if (!isset($id)) {
            // if id didn't exist, redirect to home
            redirect('mahasiswa');
        }  else {
            // define model
            $mahasiswa = $this->mahasiswa_model;
            // SELECT * FROM nama_tabel WHERE id=$id;
            $data["mahasiswa"] = $mahasiswa->getById($id);
            // View in browser with data from database
            $this->load->view("edit_form", $data);

            // define library form_validation
            $validation = $this->form_validation;
            // define rules for form_validation
            $validation->set_rules($mahasiswa->rules());
    
            if ($validation->run()) { // default false. If true, do update
                $mahasiswa->update();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            } else {
                if (!$data["mahasiswa"]) show_404();    
            }
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->mahasiswa_model->delete($id)) {
            redirect(site_url('mahasiswa'));
        }
    }
}