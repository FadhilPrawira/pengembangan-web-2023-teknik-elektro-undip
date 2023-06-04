<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <?php 
    include('navbar.php');
    include('functions.php');

    ?>
    <h1>Selamat Datang di Edit Data</h1>
    <?php
    if(empty($_GET["id"])):
    ?>
    <h4>Belum ada data yang dipilih. <a href="dashboard.php">Klik untuk kembali ke dashboard</a></h4>
    <?php
    else :
        $id = htmlspecialchars($_GET["id"]);
        $result = getByID($id);

        if(isset($_POST["submit"])) {
            $updated_username = htmlspecialchars($_POST["username"]);
            $updated_password = htmlspecialchars($_POST["password"]);
            $updated_nama = htmlspecialchars($_POST["nama"]);
            $updated_alamat = htmlspecialchars($_POST["alamat"]);

            
            $result_edit = editData($id, $updated_username, $updated_password, $updated_nama, $updated_alamat);
            if(isset($result_edit)) {
                echo "<h5>".$result_edit."</h5>";
            }  
        }
    ?>
    
    <form action="" method="POST">
    <?php
            if ($result->num_rows > 0):
            while($row = $result->fetch_assoc()):
            ?>
        <label for="id">Id: </label>
        <input type="text" name="id" id="id" value="<?php echo $row["id"];?>">
        <br>
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" value="<?php echo $row["username"];?>">
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password"  value="<?php echo $row["password"];?>">
        <br>
        <label for="nama">Nama: </label>
        <input type="text" name="nama" id="nama" value="<?php echo $row["nama"];?>">
        <br>
        <label for="alamat">Alamat: </label>
        <input type="text" name="alamat" id="alamat" value="<?php echo $row["alamat"];?>">
        <br>
        <input type="submit" name="submit" value="Update Data!">


            <?php 
            endwhile;
            $conn->close();
            else:?>
            <h4>Id melebihi jumlah data</h4>
            <?php
            endif;
        endif;
            ?>
    </form>
</body>
</html>