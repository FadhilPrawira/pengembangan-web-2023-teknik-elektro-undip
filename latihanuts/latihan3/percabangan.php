<?php

$bilangan = "35";
if($bilangan%2===0) {
    echo "Bilangan ".$bilangan." adalah bilangan genap";
} elseif ($bilangan%2===1) {
    echo "Bilangan ".$bilangan." adalah bilangan ganjil";
} else {
    echo "Bukan bilangan bulat";
}

/*
Nilai          Bobot
80 s.d. 100    A
70 s.d. 79     B
60 s.d. 69     C
50 s.d. 59     D
<50            E
*/

echo "<br>";
$skor = "54";
if($skor>=80 && $skor<=100) {
    echo 'A';
} elseif ($skor>=70 && $skor<80) {
    echo 'B';
} elseif ($skor>=60 && $skor<70) {
    echo 'C';
} elseif ($skor>=50 && $skor<60) {
    echo 'D';
} elseif ($skor<50 && $skor >=0) {
    echo 'E';
} else {
    echo "Input tidak valid";
}

/*
konversi nilai ke bobot
nilai   bobot
A       4
B       3
C       2
D       1
E       0
*/

echo "<br>";

$nilai = "F";
switch ($nilai) {
    case "A":
        echo "nilai anda 4";
        break;
    case "B":
        echo "nilai anda 3";
        break;
    case "C":
        echo "nilai anda 2";
        break;
    case "D":
        echo "nilai anda 1";
        break;
    case "E":
        echo "nilai anda 0";
        break;
    default:
        echo "Input tidak valid";
  }