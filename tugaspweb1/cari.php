<?php
require "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Data</title>
</head>
<body>
    <h1>Cari Data</h1>
    <form method="POST" action="result_cari.php">
        <label for="nama">Nama:</label>
        <br>
        <input type="text" id="nama" name="nama">
        <br>

        <input type="submit" value="Cari Data" name="cari">
    </form>
</body>
</html>