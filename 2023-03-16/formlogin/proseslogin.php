<?php

// pengaturan database
$server = "localhost";
$db_username = "root";
$db_password = "MyN3wP4ssw0rd";
$db_name = "peweb";

// koneksi ke database
$conn = new mysqli($server, $db_username, $db_password, $db_name);


// query SQL
$sql = "SELECT username, password FROM data_user;";

// melakukan query dari php ke msyql
$result = $conn->query($sql);

// membaca hasil query
$row = $result->fetch_assoc();


$saved_username = $row["username"];
$saved_password = $row["password"]; // hasil enkripsi md5

$received_username = $_POST["username"];
$received_password = md5($_POST["password"]);


// logic login
if($received_username == $saved_username) {
    
    // cek password saja
    if($received_password == $saved_password) {
        echo "Selamat datang DODIIIII, login berhasil";
    } else {
        echo "password salah";
    }

} else {
    echo "username salah";
}