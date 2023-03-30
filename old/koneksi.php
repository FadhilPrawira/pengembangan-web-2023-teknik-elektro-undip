<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "MyN3wP4ssw0rd";
$db_name = "tugas_pengweb";
$table_name = "user";

function koneksi($server_name, $db_username, $db_password, $db_name){
    // Create a new connection
    $koneksi = new mysqli($server_name, $db_username, $db_password, $db_name);
    
    // Check if a connection worked
    // If connect_error==TRUE, the connection didn't work and return the error detail
    if ($koneksi->connect_error) {
        return $koneksi->connect_error;
    } else {
        return null;
    }
}