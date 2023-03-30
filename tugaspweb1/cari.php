<?php
$nama = $_POST["nama"];
include "konek.php";

$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$nama%'";

//5. menggunakan kueri untuk menampilkan
$hasil = $koneksi->query($query);
$result = $hasil->fetch_assoc();

if ($result) {
    if ($hasil->num_rows > 0) {
        echo 'Data dapat ditemukan:<br>';
        echo "Nama: {$result['nama']}<br>";
        echo "Username: {$result['usrname']}<br>";
        echo "Password: {$result['passw']}<br>";
    } 
    else {
        echo 'Data tidak dapat ditemukan.';
    }
} else {
    echo 'Error dalam mencari data.';
}


?>