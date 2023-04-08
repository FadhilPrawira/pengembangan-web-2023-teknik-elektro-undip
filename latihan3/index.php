<?php

$variabel_entahlah1111 = "";
echo $variabel_entahlah;
echo "<br>";
var_dump(isset($variabel_entahlah));
echo "<br>";
var_dump(empty($variabel_entahlah));

// cek apakah variabel sudah didefinisikan
if(isset($variabel_entahlah)){
    // cek apakah variabel sudah diisi
    if(empty($variabel_entahlah)){
        // do something
    }

    // do something
}


echo "<br>";
echo "<br>";
echo "<br>";


echo "Hello World";
$nama = "Arya Pecinta COC";
echo "<br>";
echo $nama;
echo "<br>";

$apel = -7;
$pisang = 11;
$hasil = $apel%$pisang;
echo $hasil;

echo "<br>";

$logika_pertama = False;
$logika_kedua = False;
$hasil_logika = $logika_pertama || $logika_kedua;
echo "<br>";
echo "ini pake echo:";
echo $hasil_logika;

echo "<br>";
echo "ini pake var dump:";
var_dump($hasil_logika);

echo "<br>";
echo "ini pake print r:";
print_r($hasil_logika);
echo "<br>";

echo "Jum'at";
echo "<br>";
echo 'Ibu berkata, "Angkat jemuran, sekarang mendung!"';
echo "<br>";

$_nama_lengkap = "Fadhil Prawira";
echo $_nama_lengkap;
$NamaLengkap = "";
$namaLengkap = "";
$nama_lengkap = "";
$namalengkap = "";
echo "<br>";

$kemerdekaan = "17 Agustus 1945";
echo "Indonesia merdeka pada $kemerdekaan";
echo "<br>";

echo "Indonesia merdeka pada ".$kemerdekaan;
echo "<br>";

echo "Variabel pada PHP disimbolkan dengan \$nama_variabel";
echo "<br>";

echo $apel += $pisang;
echo "<br>";

// echo $apel = $apel + $pisang;
// ini komentar 1 baris
/*
ini komentar pertama
ini komentar kedua
*/

$nama = "Mulad";
$nama .=  " Sariro Yekti Handayani Arum";
echo $nama;
echo "<br>";
echo "<pre>";
var_dump(5>8);
echo "</pre>";
