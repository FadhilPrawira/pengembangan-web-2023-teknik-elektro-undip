<?php

echo "Perulangan";

// while ... 
// do ... while ...
// for ...
// foreach ... -> khusus array

// While ...
echo "<br>";
echo "Ini while";
$angka = 1;
while($angka <=10) {
    echo "Ini angka ke:".$angka." menggunakan while<br>";
    $angka++;
}
// DO WHILE
echo "Ini do while";
echo "<br>";
$angka = 1;
do {
    echo "Ini angka ke:".$angka." menggunakan DO while<br>";
    $angka++;
} while ($angka <=5);
echo "<br>";
// FOR
echo "Ini for";
echo "<br>";

// Python
// for x in range(0,5,1):
    // print(x)
// expected result in python:
// 0
// 1
// 2
// 3
// 4
for($x=0;$x<5;$x++) {
    echo "Ini angka ke:".$x."<br>";
}

echo "<br>";

// Array
$cars = array("Toyota", "Honda", "Mitsubishi");
// Python List
// cars = ["Toyota", "Honda", "Mitsubishi"]
$cars[1] = "Chevrolet";
echo "<pre>";
var_dump($cars);
echo "</pre>";

echo $cars[2];
// "indexed array" tidak bisa diakses menggunakan index negatif

// associative array
$biodata = array("nama"=>"fadhil", "jurusan"=>"teknik elektro");
$biodata = array(
    "nama"=>"fadhil", 
    "jurusan"=>"teknik elektro"
);

$biodata2 = [
    "nama"=>"arya pecinta coc",
    "alamat"=>"banowati dekat poncol",
    "pernahSD"=>True
];
echo "<pre>";
var_dump($biodata2);
print_r($biodata2);

echo "</pre>";

$arrlength = count($biodata2);
for($x = 0; $x < $arrlength; $x++) {
    echo $cars[$x];
    echo "<br>";
  }
echo "<br>";

// Foreach
foreach($biodata2 as $x_key => $x_value){
    echo "Key = ".$x_key." Value = ".$x_value."<br>";
}

// Python
/* 
biodata2 = {
    "nama":"arya pecinta coc",
    "alamat":"banowati dekat poncol",
    "pernahSD":True
}

for x_key, x_value in biodata2.items():
    print("Key = "+$x_key+" Value = "+$x_value+"<br>")

expected result in Python:
Key = nama Value = arya pecinta coc
Key = alamat Value = banowati dekat poncol
Key = pernahSD Value = True
*/