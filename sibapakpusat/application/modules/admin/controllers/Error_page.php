<?php
# @Author: Sahebul
# @Date:   2019-05-22T13:37:39+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-05-25T10:28:26+05:30



if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Error_page extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->layout->switch_layout('template/login_layout');
    }

	public function index()
    {
       $this->layout->view_render('error_404');
    }

}
