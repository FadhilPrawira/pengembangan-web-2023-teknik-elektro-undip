<?php
// Berisi konfigurasi username, password, nama tabel, dan nama database
$db_name = "latihan_tugas_1";
$table_name = "user";
$db_username = "root";
$db_password = "MyN3wP4ssw0rd";
$server_name = "localhost";

// Create new connection
$conn = new mysqli($server_name, $db_username, $db_password, $db_name);
// echo "<pre>";
// var_dump($conn);
// echo "</pre>";
