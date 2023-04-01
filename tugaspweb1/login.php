<?php
require "config.php";
require "navbar.php";

$peringatan = "";
if(isset($_POST["masuk"])) {
    $received_username = htmlspecialchars($_POST["username"]);
    $received_password = htmlspecialchars($_POST["password"]);

    // cek apakah username dan password yang diterima kosong
    if(empty($received_username) and empty($received_password)) {
        $peringatan =  "<script>alert('Input kosong!');</script>";
    } else {
        $sql = "SELECT username, password FROM user WHERE username='".$received_username."' AND password='".$received_password."';";
        
        // query ke database
        $result = $conn->query($sql);
        
        // Cek apakah SELECT berhasil
        if($result) {
            // fetch assoc hasil query
            $rows = $result->fetch_assoc(); 
            
            // cek apakah ada data setelah dilakukan fetch assoc
            if ($rows == NULL) { 
                // Jika tidak ada data, kirim alert username/password tidak ditemukan
                $peringatan =  "<script>
                alert('Username/password tidak ditemukan');
                </script>";
            } else {
                // Jika ada data, kirim alert login berhasil dan redirect
                $peringatan =  "<script>
                alert('Login user berhasil');
                document.location.href = 'tampilan.php';
                </script>";
            }      
        } else {
            // menyimpan alert ke variabel peringatan
            $peringatan = "<script>alert('Login gagal. Terjadi kesalahan di database');</script>";
        }
    }   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <p>Username: fadhilprawira</p>
    <p>Password: s</p>
    <?= $peringatan;?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <br>
        <input type="text" id="username" name="username">
        <br>
        
        <label for="password">Password:</label>
        <br>
        <input type="text" id="password" name="password">
        <br>
        <input type="submit" value="Masuk" name="masuk">
    </form>
</body>
</html>