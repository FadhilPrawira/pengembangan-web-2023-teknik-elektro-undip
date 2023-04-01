<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Page extends CI_Controller
{
    public function contact()
    {
        $this->load->view('kontak_person');
    }
}