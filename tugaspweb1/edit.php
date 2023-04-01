<?php
require "config.php";
require "navbar.php";

$tidak_ada_id = "";
$peringatan = "";

// Cek apakah $_GET["id"] sudah diatur/didefinisikan
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $get_sql = "SELECT * FROM user WHERE id=$id;";
    
    // query ke database
    $get_result = $conn->query($get_sql);
    
    // melakukan fetch assoc pada query
    $get_row = $get_result->fetch_assoc();
} else {
    $tidak_ada_id = "Anda tidak memiliki hak di sini. Akses halaman melalui tampilan.php";
}


if(isset($_POST["ubah"])) {
    $received_id = htmlspecialchars($_POST["id"]);
    $received_username = htmlspecialchars($_POST["username"]);
    $received_old_password = htmlspecialchars($_POST["old_password"]);
    $new_password = htmlspecialchars($_POST["new_password"]);
    $verify_new_password = htmlspecialchars($_POST["verify_new_password"]);

    // cek apakah kedua password baru sama
    if($verify_new_password == $new_password) {
        $post_sql = "SELECT password FROM user WHERE id=$id;";
        // query ke database
        $post_result = $conn->query($post_sql);
        
        // melakukan fetch assoc pada query
        $post_row = $post_result->fetch_assoc();
    
        $saved_password = $post_row["password"];

        // cek apakah old_password sama dengan saved_password
        if($received_old_password == $saved_password) {
            // update password
            $update_sql = "UPDATE user SET password = '$new_password' WHERE id = $received_id;";
    
            // query ke database
            $update_result = $conn->query($update_sql);
            
            if($update_result) {
                $peringatan =  "<script>
                alert('Update password baru berhasil');
                document.location.href = 'tampilan.php';
                </script>";
            } else {
                $peringatan =  "<script>
                alert('Update password baru gagal');
                </script>";
            }
            
        } else {
            // old_password yang diinputkan salah
            $peringatan =  "<script>
            alert('password lama Anda tidak sesuai');
            </script>";
        }
    } else {
        $peringatan =  "<script>
        alert('kedua password baru tidak sesuai');
        </script>";
    }
   
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data User</title>
</head>
<body>
    <h1>Edit Data User</h1>
    <?= $peringatan;?>
    <?= "<p>$tidak_ada_id</p>";?>
    <form method="POST" action="">
        <label for="nama">Nama Lengkap:</label>
        <br>
        <input type="text" id="nama" name="nama" value="<?= $get_row["nama"]?>">
        <br>
        
        <label for="username">Username:</label>
        <br>
        <input type="text" id="username" name="username" value="<?= $get_row["username"]?>">
        <br>
        
        <!-- Cek apakah password baru 1 dan 2 sama. Jika sama, cek password lama dengan saved password. Jika password lama dan saved sama, UPDATE password di database-->
        <label for="old_password">Masukkan password lama:</label>
        <br>
        <input type="text" id="password" name="old_password">
        <br>

        <label for="new_password">Masukkan password baru:</label>
        <br>
        <input type="text" id="password" name="new_password">
        <br>

        <label for="verify_new_password">Masukkan kembali password baru:</label>
        <br>
        <input type="text" id="password" name="verify_new_password">
        <br>
        
        <input type="hidden" name="id" value="<?=$get_row["id"]?>">
        <input type="submit" value="Ubah Data" name="ubah">
    </form>
</body>
</html>