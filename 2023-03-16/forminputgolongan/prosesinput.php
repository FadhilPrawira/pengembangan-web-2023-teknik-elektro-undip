<?php
    $golongan = $_POST["golongan"];
    $nama = $_POST["nama"];

    echo "Golongan yang diinput adalah ".$golongan;
    echo "<br>";
    echo "Nama Anda adalah ".$nama;
    
    
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

?>