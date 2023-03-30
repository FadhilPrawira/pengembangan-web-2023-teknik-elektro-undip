<?php
include "konek.php";
//mendapatkan variabel hasil posting
$usrname=$_POST["usrname"];
$passw=$_POST["passw"];
$nama=$_POST["nama"];
$id=$_POST["id"];
//mengecek
echo $usrname."  ".$passw."  ".$nama."<br>";
$queri="UPDATE mahasiswa SET usrname='$usrname', passw='$passw', nama='$nama' WHERE id=$id";
$hasil = $koneksi->query($queri);
if ($hasil) echo "Edit id=$id Berhasil ";
else echo "Edit Gagal";

?>