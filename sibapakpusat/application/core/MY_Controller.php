<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends MX_Controller {

    function __construct() {
        parent::__construct();
        }

    public function check_loggedin(){
            $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $this->session->set_userdata('redirectToCurrent', $url);
            $user = $this->session->all_userdata();
            if (isset($user['admin_logged_in'])) return true;
            else return false;
        }

}
/**
 *
 */
class Controller extends MX_Controller
{
  function __construct()
  {
    parent::__construct();
  }
}

class Admin_Controller extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    if (!$this->check_loggedin()) redirectToAdmin('admin/login');
    $this->load->model('activity/activity_model');
    $user = $this->session->all_userdata();
    $this->username=$user['username'];
    $this->login_id=$user['login_id'];
    $this->layout->switch_layout('template/admin_layout');
  }
  public function load_datatables()
  {
    $this->layout->add_css('../public/datatables/css/loading.css');
    $this->layout->add_css('../vendor/datatables/dataTables.bootstrap4.min.css');
    $this->layout->add_js('../public/datatables/js/jquery.dataTables.min.js');
    $this->layout->add_js('../public/datatables/js/dataTables.bootstrap4.min.js');

  }
}


?>
