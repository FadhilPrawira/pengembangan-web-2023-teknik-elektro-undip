<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct()
    {
        // Mengambil construct dari class parent/induk
        parent::__construct();

        // load model "pegawai_model"
        $this->load->model('pegawai_model');

        // load library "form_validation" untuk validasi form
        $this->load->library('form_validation');
    }
 
    // Mengatur rules untuk library "form_validation"
    public function rules()
    {
        return 
        [
            [
                'field' => 'nomorpegawai',
                'label' => 'Nomor Pegawai',
                'rules' => 'alpha_numeric_spaces'
            ], [
                'field' => 'namapegawai',
                'label' => 'Nama Pegawai'
            ], [
                'field' => 'unit',
                'label' => 'Unit'
            ]        ];
        
    }

    // Menampilkan home
	public function index()
	{
        $data['active'] = 'index';
        $data['title'] = 'Home';
		$this->load->view('home.php', $data);
	}

    // Menampilkan data 
    // SELECT * FROM buku;
    public function dashboard()
    {
        $data['active'] = 'dashboard';
        $data['title'] = 'Dashboard';
        // SELECT * FROM buku
        // Memasukkan data dari query ke array $data, dengan key "books"
        $data["employees"] = $this->pegawai_model->getAll();
        $this->load->view('dashboard.php', $data);
    }

    // Mencari data dan menampilkan  hasil pencarian
    // SELECT * FROM buku WHERE nama LIKE '%nama%';
    public function search()
    {
        $data['active'] = 'search';
        $data['title'] = 'Search Data';
        // Menangkap 'keyword'
        $data['keyword'] = $this->input->post('keyword');
        // define model
        $this->load->model('pegawai_model');

		$data['search_result'] = $this->pegawai_model->caridata($data['keyword']);

        $this->load->view('search.php', $data);
    }

    // Menambahkan data
    // INSERT INTO buku VALUES();
    public function add()
    {
        $data['active'] = 'add';
        $data['title'] = 'Add Data';
        // define model
        $pegawai = $this->pegawai_model;        
        // define library form_validation
        $validation = $this->form_validation;        
        // define rules for form_validation        
        $validation->set_rules($this->rules());

        if ($validation->run()) { // default FALSE. If TRUE, do INSERT
            $pegawai->insert_query();
            $this->session->set_flashdata('message_alert', 'Berhasil disimpan');
            
        } else {
            $this->session->set_flashdata('message_alert', 'Gagal disimpan');
            
        }

        $this->load->view('add.php', $data);
    }


    // Menampilkan halaman tentang kami
    public function about_us()
    {
        $data['active'] = 'about_us';
        $data['title'] = 'About Us';
        $this->load->view('about.php', $data);
    }

    // Menampilkan halaman tentang kami
    public function contact_me()
    {
        $data['active'] = 'contact_me';
        $data['title'] = 'Contact Me';
        $this->load->view('contact.php', $data);
    }

    public function edit($id = null)
    {
        $data['active'] = 'edit';
        $data['title'] = 'Edit Data';
        if (!isset($id)) {
            // if id didn't exist, redirect to home
            redirect('pegawai/index');
        }  else {
            // define model
            $pegawai = $this->pegawai_model;
            // SELECT * FROM nama_tabel WHERE id=$id;
            $data["employee"] = $pegawai->getById($id);
            // View in browser with data from database
            $this->load->view("edit", $data);

            // define library form_validation
            $validation = $this->form_validation;
            // define rules for form_validation
            $validation->set_rules($this->rules());
    
            if ($validation->run()) { // default false. If true, do update
                $pegawai->update();
                $this->session->set_flashdata('success', 'Berhasil disimpan');

                // TODO: add flashdata alert in dashboard
                redirect('pegawai/dashboard');
            } else {
                if (!$data["employee"]) show_404();    
            }
        }
    }
    public function delete($id=null)
    {
        $data['active'] = 'delete';
        $data['title'] = 'Delete Data';
        if (!isset($id)) {
            show_404();
        } else {
            if ($this->pegawai_model->delete($id)) {
                redirect(site_url('pegawai/dashboard'));
            }
        }
    }

}
