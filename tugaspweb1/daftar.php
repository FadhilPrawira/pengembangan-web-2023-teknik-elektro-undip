<?php
/*
TODO:
menambahkan pengecekan apakah username sudah ada di database
*/
require "config.php";
require "navbar.php";


// mendefinisikan peringatan
// Pada halaman yang baru dibuka, variabel peringatan isinya kosong. 
// Pada input kosong/insert gagal, variabel peringatan memiliki isi
$peringatan = "";
if(isset($_POST["daftar"])) {
    // mendefinisikan variabel nama, username, dan password
    // mengamankan input dari SQL injection
    $nama = htmlspecialchars($_POST["nama"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    // $password = md5(htmlspecialchars($_POST["password"]));

    // cek apakah input kosong
    if(!empty($username) and !empty($username) and !empty($password)) {
        $sql = "INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES (NULL, '".$username."', '".$password."', '".$nama."');";
        $result = $conn->query($sql);
        
        // Cek apakah insert berhasil
        if($result) {
            // menyimpan alert ke variabel peringatan
            $peringatan = "<script>
            alert('Pendaftaran user berhasil');
            document.location.href = 'home.php';
            </script>";
        } else {
            // menyimpan alert ke variabel peringatan
            $peringatan = "<script>alert('Pendaftaran user gagal/Terjadi kesalahan di database');</script>";
        }
    } else {
        // menyimpan alert ke variabel peringatan
        $peringatan =  "<script>alert('Input kosong!');</script>";
    } 
}


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
    <?= $peringatan;?>
    <h1>Pendaftaran User Baru</h1>
    <form method="POST" action="">
        <label for="nama">Nama Lengkap:</label>
        <br>
        <input type="text" id="nama" name="nama">
        <br>
        
        <label for="username">Username:</label>
        <br>
        <input type="text" id="username" name="username">
        <br>
        
        <label for="password">Password:</label>
        <br>
        <input type="text" id="password" name="password">
        <br>



        <input type="submit" value="Daftar" name="daftar">
    </form>
</body>
</html>