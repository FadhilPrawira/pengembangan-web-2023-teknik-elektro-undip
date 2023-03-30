<?php

/* 
Loop : perulangan, digunakan untuk proses yang berulang
Macam-macam kode PHP loop:
- while
- do ... while
- for
- foreach
  foreach banyak digunakan untuk mengelola data dari tabel (database) dan mengelola array/larik
Array: tipe data yang mengelola lebih dari 1 item data
prodi = {"elektro", "mesin", "sipil", "arsitek"}

bentuk umum while :
    while (kondisi) {
        // pernyataan
    }

bentuk umum for :
    for (nilai_awal; nilai_akhir; indeks++) {
        // pernyataan
    }
*/

// untuk menampilkan 100x tulisan

$i = 0; // nilai awal index
while ($i<100) {
    echo "Teknik elektro ke-".$i." menggunakan while<br>";
    $i++; // index bertambah 1
}

for ($i=0;$i<100;$i++) {
    echo "Teknik elektro ke-".$i." menggunakan for<br>";
}