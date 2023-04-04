<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan extends CI_Controller {

    public function __construct()
    {
        // Mengambil construct dari class parent/induk
        parent::__construct();

        // load model "perpustakaan_model"
        $this->load->model('perpustakaan_model');

        // load library "form_validation" untuk validasi form
        $this->load->library('form_validation');
    }
 
    // Mengatur rules untuk library "form_validation"
    public function rules()
    {
        return 
        [
            [
                'field' => 'kodebuku',
                'label' => 'Kode Buku',
                'rules' => 'max_length[4]',
                'errors' => 
                [
                'max_length' => 'Panjang kode buku maksimal 4 karakter'
                ]
            ], [
                'field' => 'judulbuku',
                'label' => 'Judul Buku',
                'rules' => 'max_length[75]',
                'errors' => 
                [
                'max_length' => 'Panjang judul buku maksimal 50 karakter'
                ]
            ], [
                'field' => 'penerbit',
                'label' => 'Penerbit Buku',
                'rules' => 'max_length[50]',
                'errors' => 
                [
                    'max_length' => 'Panjang penerbit buku maksimal 50 karakter'
                    ]
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
        $data["books"] = $this->perpustakaan_model->getAll();
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
        $this->load->model('perpustakaan_model');

		$data['search_result'] = $this->perpustakaan_model->caridata($data['keyword']);

        $this->load->view('search.php', $data);
    }

    // Menambahkan data
    // INSERT INTO buku VALUES();
    public function add()
    {
        $data['active'] = 'add';
        $data['title'] = 'Add Data';
        // define model
        $perpustakaan = $this->perpustakaan_model;        
        // define library form_validation
        $validation = $this->form_validation;        
        // define rules for form_validation        
        $validation->set_rules($this->rules());

        if ($validation->run()) { // default FALSE. If TRUE, do INSERT
            $perpustakaan->insert_query();
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
            redirect('perpustakaan/index');
        }  else {
            // define model
            $perpustakaan = $this->perpustakaan_model;
            // SELECT * FROM nama_tabel WHERE id=$id;
            $data["buku"] = $perpustakaan->getById($id);
            // View in browser with data from database
            $this->load->view("edit", $data);

            // define library form_validation
            $validation = $this->form_validation;
            // define rules for form_validation
            $validation->set_rules($this->rules());
    
            if ($validation->run()) { // default false. If true, do update
                $perpustakaan->update();
                $this->session->set_flashdata('success', 'Berhasil disimpan');

                // TODO: add flashdata alert in dashboard
                redirect('perpustakaan/dashboard');
            } else {
                if (!$data["buku"]) show_404();    
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
            if ($this->perpustakaan_model->delete($id)) {
                redirect(site_url('perpustakaan/dashboard'));
            }
        }
    }

}
