<?php
include "menu.php";
$nama = $_POST["nama"];

/*
langkah-langkah membaca tabel dari PHP ke MySQL:
1. Mendefinisikan server dan akun untuk koneksi mysql
*/

$server_name = "localhost";
$db_username = "root";
$db_password = "MyN3wP4ssw0rd";
$db_name = "pweb";

// 2. membuka koneksi: query object oriented menggunakan mysqli
$koneksi = new mysqli($server_name, $db_username, $db_password, $db_name);


// 3. cek koneksi
if ($koneksi->connect_error) {
    die("koneksi gagal".$koneksi->connect_error);
} else {
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%".$nama."%';";

    $hasil = $koneksi->query($query);

    if ($hasil->num_rows) {

        // tampilkan isi tabel

        echo "<html><body>";
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>No</th>";
        echo "<th>Nama</th>";
        echo "<th>Alamat</th>";
        echo "</tr>";

        $id = 1;
        while ($baris = $hasil->fetch_assoc()) {
            // Menampilkan Nomor, nama, dan tabel menggunakan PHP
            // menampilkan nomor
            echo "<tr>";
            echo "<td>";
            echo $id;
            $id++;
            echo "</td>";
           
            echo "<td>";
            echo $baris["nama"];
            echo "</td>";
            
            echo "<td>";
            echo $baris["alamat"];
            echo "</td>";

            echo "<td>";
            echo '<a href="edit.php?id='.$id.'">Edit</a>';
            echo "</td>";
            echo "</tr>";

        }
        echo "</table></body></html>";
    } else {
        echo "Nama '".$nama."' yang dicari tidak ada di database";
    }

}
