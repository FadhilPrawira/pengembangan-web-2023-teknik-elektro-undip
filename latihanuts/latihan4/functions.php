<?php
include('config.php');


function getAll() {
    // Get global connection
    global $conn, $table_name;
    $sql = "SELECT id, username, nama, alamat FROM ".$table_name.";";

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $result = $conn->query($sql);
    }
    return $result;    
}

function getByID($id) {
    // Get global connection
    global $conn, $table_name;
    $sql = "SELECT id, username, password, nama, alamat FROM ".$table_name." WHERE ".$table_name.".id = ".$id.";";

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $result = $conn->query($sql);
    }
    return $result;  
}

function addNewData($username = null, $password = null, $nama = null, $alamat = null) {
    global $conn, $table_name;
    $sql = "INSERT INTO `".$table_name."` (`id`, `username`, `password`, `nama`, `alamat`) VALUES (NULL, '".$username."', '".$password."', '".$nama."', '".$alamat."');";
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        if ($conn->query($sql) === TRUE) {
            return "New record created successfully";
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

function editData($id, $updated_username, $updated_password, $updated_nama, $updated_alamat) {
    global $conn, $table_name;
    $sql = "UPDATE `".$table_name."` SET `username` = '".$updated_username."', `password` = '".$updated_password."', `nama` = '".$updated_nama."', `alamat` = '".$updated_alamat."' WHERE `".$table_name."`.`id` = ".$id.";";
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        if ($conn->query($sql) === TRUE) {
            return "Record updated successfully";
          } else {
            return "Error updating record: " . $conn->error;
          }
    }

}

function deleteData($id) {
    global $conn, $table_name;
    $sql = "DELETE FROM ".$table_name." WHERE `".$table_name."`.`id` = ".$id.";";
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        if ($conn->query($sql) === TRUE) {
            return "Record deleted successfully";
        } else {
            return "Error deleting record: " . $conn->error;
        }
    }
}

function searchData($keyword = null) {
    // Get global connection
    global $conn, $table_name;
    $sql = "SELECT * FROM `".$table_name."` WHERE `username` LIKE '%".$keyword."%' OR `nama` LIKE '%".$keyword."%' OR `alamat` LIKE '%".$keyword."%';";

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $result = $conn->query($sql);
    }
    return $result;  
}