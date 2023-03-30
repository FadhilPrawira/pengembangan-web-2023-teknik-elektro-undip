<?php
//menerima input skor dari POST

$skor = $_POST["skor"];
// echo "Skor yang di-input-kan adalah ".$skor;

if($skor >=80 && $skor<=100 ) $nilai = "A";
elseif($skor >= 70 && $skor <80) $nilai = "B";
elseif($skor >= 60 && $skor <70) $nilai = "C";
elseif($skor >= 40 && $skor <60) $nilai = "D";
elseif($skor <40) $nilai = "E";
else $nilai = "Input salah";

echo "Nilai Anda adalah ".$nilai;