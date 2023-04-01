<?php
require "config.php";
require "navbar.php";


if(isset($_POST["cari"])) {
    $nama = $_POST["nama"];
    $sql = "SELECT nama,username FROM user WHERE nama LIKE '%$nama%';";
    $result = $conn->query($sql);
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
</head>
<body>
    <h1>Hasil Pencarian</h1>
    <a href="cari.php">Masih mencari sesuatu? Kembali ke kolom pencarian</a>
    <br>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Username</th>
        </tr>
        
        <?php 
        $i = 1;
        if(!empty($nama)):
            while ($userdata = $result->fetch_assoc()):    
        ?>
        <tr>
            <td><?=$i;?></td>
            <td><?=$userdata["nama"];?></td>
            <td><?=$userdata["username"];?></td>
        </tr>   
        <?php 
        $i++;
        endwhile;
        else:
        ?>
            <td colspan="3">Data yang dicari tidak ada</td>
        <?php
        endif;
        ?>
                 
        
    </table>
</body>
</html>