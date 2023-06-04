<?php
# @Author: Sahebul
# @Date:   2019-05-23T12:16:10+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-05-25T10:28:33+05:30



if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Login extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->layout->switch_layout('template/login_layout');
        $this->load->library('form_validation');
    }

	public function index()
    {
      if(isset($this->session->userdata['admin_logged_in']) && $this->session->userdata['admin_logged_in']){
        redirectToAdmin("dashboard");
      }
      $row = $this->login_model->get_tahun();
      $data = null;
      if ($row) {

          $data['tahun']=$row;


      }

       $this->layout->view_render('login',$data);
    }
	public function login_process(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_error_delimiters("<font class='animated fadeIn' style='color: #d43f3a'>", "</font>");
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $username = $this->security->xss_clean($this->input->post("username"));
            $password = $this->security->xss_clean($this->input->post("password"));
            $tahun = $this->security->xss_clean($this->input->post("tahun"));

            $login_model = $this->load->model("login_model");

            if($this->login_model->process($username, $password, $tahun)) {
                if($this->session->userdata['redirectToCurrent']){
                  redirectTo($this->session->userdata['redirectToCurrent']);
                }else {
                  redirectToAdmin("dashboard");
                }

            } else {
                $this->session->set_flashdata('flashMessage', 'Invalid username or password!');
                $this->index();
            }
        }
    } // End of process()
	public function logout(){
        $this->session->sess_destroy();
        session_write_close();
        redirect(admin_url('admin/login'));
    }
}
/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
