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
        //$data["mahasiswa"] = $this->mahasiswa_model->getAll();
        //$this->load->view("admin/mahasiswa/list", $data); //menampilkan
        $this->load->view("home");
    }
 
    public function list()
    {
        $data["mahasiswa"] = $this->mahasiswa_model->getAll();
        //$this->load->view("admin/mahasiswa/list", $data); //menampilkan
        $this->load->view("daftar", $data); //menampilkan
 
    }
 
    public function add()
    {
        $mahasiswa = $this->mahasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());
        //$this->load->view("menu");
 
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
        if (!isset($id)) redirect('mahasiswa');
       
        $mahasiswa = $this->mahasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());
 
        if ($validation->run()) {
            $mahasiswa->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
 
        $data["mahasiswa"] = $mahasiswa->getById($id);
        if (!$data["mahasiswa"]) show_404();
        
        $this->load->view("edit_form", $data);
    }
 
    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->mahasiswa_model->delete($id)) {
            redirect(site_url('mahasiswa'));
        }
    }
}