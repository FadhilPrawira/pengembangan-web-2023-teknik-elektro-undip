<?php
    // kode php
    echo "ini program php";
    echo "<br>";
    /*
    komentar 
    beberapa
    baris


    variabel tidak perlu dideklarasikan seperti di Java/C
    $namaVariabel = isi;
    operator aritmetika : + - * / %
    operator perbandingan ==, <, >, <=, >=, 

    increment (penambahan) : ++ 
    Contoh: i++ sama dengan i = i+1

    decrement (penguruangan) : --
    Contoh: i-- sama dengan i = i-1

    operator logika: and, or, xor, &&, ||, !

    fungsi matematika di PHP: pi()= 3.14
    */

    // memasukkan variabel
    $nama = "fadhil prawira<br>";

    echo "nama = ".$nama;

    $a = 10;
    $b = 20;

    $c = $a*$b;
    echo "hasil $a * $b = $c<br>";

    $c = $a%$b;
    echo "hasil $a % $b = $c<br>";

    $c = $a>$b;
    print_r($c);
    echo "hasil $a > $b = $c<br>";
    var_dump($a>$b);
    var_dump($a<$b);

    echo (pi());
    
    /*
    Percabangan:
    - kondisional:
    if ... else
    bentuk umum:
    if (kondisi) {
        pernyataan1;
    } else {
        pernyataan2;
    }
    - perulangan
    */
    echo "<br><br>";
    if($a>$b) {
        echo "nilai a lebih kecil dari b";
    } else {
        echo "nlai a lebih besar dari b";
    }

    /* konversi tabel golongan ke gaji
    gol     gaji
    1       1 juta
    2       2 juta
    3       3 juta
    4       4 juta
    */
    echo "<br><br>";
    
    // menggunakan if 
    $golongan = 1;
    if ($golongan == 1) echo "Gaji Anda 1 juta";
    else if ($golongan == 2) echo "Gaji Anda 2 juta";
    else if ($golongan == 3) echo "Gaji Anda 3 juta";
    else if ($golongan == 4) echo "Gaji Anda 4 juta";
    else echo "input salah";

    echo "<br><br>";

    // menggunakan switch case
    switch($golongan) {
        case '1': $gaji = "1 juta";
        break;
        case '2': $gaji = "2 juta";
        break;
        case '3': $gaji = "3 juta";
        break;
        case '4': $gaji = "4 juta";
        break;
        default: $gaji = "input salah";
    }
    echo "gaji = ".$gaji."<br>";
?>

    