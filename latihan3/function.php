<?php

// Python
/*
def nama_function(nama_parameter/argumen):
    do something
*/

// type VOID/langsung ke layar
function cekGanjilGenap_void($bilangan) {
    if($bilangan%2===0) {
        echo "Bilangan ".$bilangan." adalah bilangan genap";
    } elseif ($bilangan%2===1) {
        echo "Bilangan ".$bilangan." adalah bilangan ganjil";
    } else {
        echo "Bukan bilangan bulat";
    }
}

// Cara panggil function yang void
cekGanjilGenap_void(90);

// type return/dijadikan variabel
function cekGanjilGenap_return($bilangan) {
    if($bilangan%2===0) {
        return "Bilangan ".$bilangan." adalah bilangan genap";
    } elseif ($bilangan%2===1) {
        return "Bilangan ".$bilangan." adalah bilangan ganjil";
    } else {
        return "Bukan bilangan bulat";
    }
}
echo "<br>";
echo cekGanjilGenap_return(155);
echo "<br>";

echo "INI dari function.php";