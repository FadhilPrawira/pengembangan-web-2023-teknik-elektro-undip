<?php
include "koneksi.php";
$nama = $_POST["nama"];
$username = $_POST["username"];
$password = $_POST["password"];
$button = $_POST["daftar"];

// Check if the "daftar" button has clicked
// if "daftar" button has clicked, do something
if (isset($button)) {
    // Call koneksi()
    koneksi();
    
    // do INSERT query to database
    $hasil = $koneksi->query($query);
}



$username = "thoha";
$password = "12345678";
$nama = "Thoha Khoirul";
$query = "INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES (NULL, '".$username."', '".$password."', '".$nama."');";

var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" >
        <br><br>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" >
        <br><br>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br><br>
        
        <!-- Tombol submit -->
        <input type="submit" value="Daftar" name="daftar">
    </form>
</body>
</html>