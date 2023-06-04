<?php
defined("BASEPATH") OR exit("No direct script access allowed");
class Upload extends Controller{
    function index() {
        $this->load->helper("fileupload");
        $file=$this->input->post("file");
        fileupload($file);
    }//End of index()
}//End of Upload
