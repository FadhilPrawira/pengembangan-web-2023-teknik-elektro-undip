<?php
require "config.php";
require "navbar.php";

$peringatan = "";

// Cek apakah $_GET["id"] sudah diatur/didefinisikan
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $get_sql = "SELECT * FROM user WHERE id=$id;";
    
    // query ke database
    $get_result = $conn->query($get_sql);
    
    // melakukan fetch assoc pada query
    $get_row = $get_result->fetch_assoc();

    // cek apakah ada data di database
    if($get_row==NULL) {
        $get_row["nama"] = "";
        $get_row["username"] = "";
        $get_row["id"] = "";
        $peringatan =  "<script>
        alert('User tidak ada di database');
        </script>";
    } else {
        if(isset($_POST["hapus"])) {
            // $confirm_box = "<script>confirm('Data akan dihapus selamanya!\n Apakah Anda yakin?');</script>";
            $sql = "DELETE FROM user WHERE id='$id';";
            
            // query ke database
            $result = $conn->query($sql);

            if($conn->affected_rows==1) {
                $peringatan =  "<script>
                alert('Hapus data berhasil');
                </script>";
                $get_row["nama"] = "";
                $get_row["username"] = "";
                $get_row["id"] = "";
            } else {
                $peringatan =  "<script>
                alert('Hapus data gagal');
                </script>";
            }
        }
    }
    
} else {
    $peringatan =  "<script>
    alert('Anda tidak memiliki hak di sini. Akses halaman melalui tampilan.php');
    document.location.href = 'tampilan.php';
    </script>";
    $get_row["nama"] = "";
    $get_row["username"] = "";
    $get_row["id"] = "";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data</title>
</head>
<body>
    <h1>Hapus data</h1>
    <?= $peringatan;?>
    <form method="POST" action="">
        <label for="nama">Nama Lengkap:</label>
        <br>
        <input type="text" id="nama" name="nama" value="<?= $get_row["nama"]?>">
        <br>
        
        <label for="username">Username:</label>
        <br>
        <input type="text" id="username" name="username" value="<?= $get_row["username"]?>">
        <br>
        
        <input type="hidden" name="id" value="<?=$get_row["id"]?>">
        <input type="submit" value="Hapus data" name="hapus">
    </form>

</body>
</html>