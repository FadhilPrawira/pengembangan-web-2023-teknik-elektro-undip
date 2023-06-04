<?php
defined("BASEPATH") OR exit("No direct script access allowed");
if (!function_exists("fileupload")) {

    function fileUpload($file) {
        $pathname = FCPATH . 'storage/temps/';
        $destination = $pathname;
        $ci = & get_instance();
        $config['upload_path'] = $destination;
        $config['allowed_types'] = 'JPG|JPEG|GIF|PNG|PDF|jpg|jpeg|gif|png|pdf';
        $config['max_size'] = 0;
        $config['encrypt_name'] = TRUE;
        $ci->load->library('upload', $config);
        if (!$ci->upload->do_upload($file)) {
            $error = array("success" => 0, "error" => $ci->upload->display_errors());
            echo json_encode($error);
        } else {
            $data = array("success" => 1, "name" => "upload_" . $file, "upload_data" => $ci->upload->data());
            if ($ci->session->userdata($file)) {
                $tempArray = $ci->session->userdata($file);
                array_push($tempArray, $data["upload_data"]["file_name"]);
                $ci->session->set_userdata($file, $tempArray);
            } else {
                $tempArray = array($data["upload_data"]["file_name"]);
                $ci->session->set_userdata($file, $tempArray);
            }
            echo json_encode($data);
        }
    }

}
if (!function_exists("moveFile")) {

    function moveFile($folder, $files = NULL, $sessionfilename = NULL) {
        $folders = array(
            0 => "Brands",
            1 => "Products"
        );
        $ci = & get_instance();
        $folder_path = 'storage/' . $folders[$folder] . '/' . date("Y") . '/' . date("m") . '/' . date("d") . '/';
        $pathname = FCPATH . $folder_path;
        if (!is_dir($pathname)) {
            mkdir($pathname, 0777, true);
            file_put_contents($pathname . "index.html", '<html><head></head><body>Silence is golden</body></html>');
        }
        $session_files = $ci->session->userdata($sessionfilename);
        $finalUplodedFile = array();
        $today=date("Y-m-d H:i:s");
        if ($files != NULL) {
            foreach ($files as $key => $file) {
                $tempfile = FCPATH . 'storage/temps/' . $file;
                if (file_exists($tempfile)) {
                    $newfile = $pathname . $file;
                    if (in_array($file, $session_files)) {
                        if (rename($tempfile, $newfile)) {
                            $temporary_file=base_url() . $folder_path . $file;
                            $ci->load->database();
                            /*$data=array(
                                "file"=>$temporary_file,
                                "date_time"=>$today
                            );*/
                            //$ci->db->insert("files",$data);
                            array_push($finalUplodedFile,$temporary_file );
                            //unlink($tempfile);
                        }
                    }
                } else {
                    array_push($finalUplodedFile, $file);
                }
            }
            $ci->session->unset_userdata($sessionfilename);
        }
        if($session_files){
        foreach ($session_files as $files) {
            $tempfile = FCPATH . 'storage/temps/' . $file;
            if (file_exists($tempfile))
                unlink($tempfile);
        }
        }

        if (count($finalUplodedFile) > 0) {
            return $finalUplodedFile;
        } else {
            return false;
        }//End of if else
    }

}
