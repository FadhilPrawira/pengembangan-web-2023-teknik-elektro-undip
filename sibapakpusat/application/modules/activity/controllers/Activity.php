<?php
# @Author: Sahebul
# @Date:   2019-05-24T14:31:41+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-05-25T10:27:10+05:30

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Activity extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('breadcrumbs');
    }
    public function index()
    {
        $this->layout->set_title('Activities');
        $this->load_datatables();
        $this->layout->add_js('../datatables/activity_table.js');
        $this->breadcrumbs->admin_push('Dashboard', 'dashboard');
        $this->breadcrumbs->admin_push('Activity Log', 'activity');
        $this->layout->view_render('index');
    }
    public function get_activities(){
     echo  $this->activity_model->get_activities();
    }


}
