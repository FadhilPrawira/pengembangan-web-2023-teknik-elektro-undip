<?php
include "menu.php";
include "konek.php";
//menerima posting
$nama=$_POST["nama"];
$usrname=$_POST["usrname"];
$passw=$_POST["passw"];

echo "Data yang diinput: ";
echo $nama."   ".$usrname."<br>";

$queri="INSERT INTO mahasiswa (usrname, passw, nama) VALUES ('$usrname', '$passw', '$nama')";
$hasil = $koneksi->query($queri);
if ($hasil) echo "Input data berhasil ";
else echo "Input data gagal";

?>