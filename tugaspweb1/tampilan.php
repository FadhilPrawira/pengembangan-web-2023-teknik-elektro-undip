<?php
require "config.php";
require "navbar.php";
$sql = "SELECT * FROM user;";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan</title>
</head>
<body>
    <h1>Dashboard Data User</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Username</th>
            <th colspan="2">Aksi</th>
        </tr>
        
        <?php 
        $i = 1;
        while ($userdata = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?=$i;?></td>
            <td><?=$userdata["nama"];?></td>
            <td><?=$userdata["username"];?></td>
            <td>
                <a href="edit.php?id=<?=$userdata["id"];?>">Ubah Data</a>
            </td>
            <td>
                <a href="delete.php?id=<?=$userdata["id"];?>">Hapus User</a>
            </td>
        </tr>   
        <?php 
        $i++;
        endwhile;
        ?>
                 
        
    </table>
</body>
</html>