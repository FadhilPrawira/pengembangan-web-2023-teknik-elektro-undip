<?php
include "menu.php";
include "konek.php";
//baca id dengan metode GET
$id = $_GET["id"];
echo "$id <br>";

//membuat queri hapus :
$queri = "DELETE FROM mahasiswa WHERE id='$id'";
$hasil = $koneksi->query($queri);
if ($hasil) echo "hapus data id=$id berhasil";
else echo "hapus data gagal";

?>