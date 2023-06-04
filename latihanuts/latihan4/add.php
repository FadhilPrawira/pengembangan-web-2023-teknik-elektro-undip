<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Data</title>
</head>
<body>
    <?php 
    include('navbar.php');
    include('functions.php');
    ?>

    <h1>Selamat Datang di Add New Data</h1>
    <?php 

    if(isset($_GET["submit"])) {
        $username = htmlspecialchars($_GET["username"]);
        $password = htmlspecialchars($_GET["password"]);
        $nama = htmlspecialchars($_GET["nama"]);
        $alamat = htmlspecialchars($_GET["alamat"]);
        if(!empty($username) && !empty($password) && !empty($nama) && !empty($alamat)) {
            $result = addNewData($username, $password, $nama, $alamat);
            if(isset($result)) {
                echo "<h5>".$result.". <a href='dashboard.php'>Click here to go to dashboard<a></h5>";
            }
        } else {
            // $result = "Error: " . $sql . "<br>" . $conn->error;
            $result = "Formulir harus diisi semua!";
            if(isset($result)) {
                echo "<h5>".$result."</h5>";
            }
        }

        $conn->close();

    }

    ?>
    <form action="" method="GET">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <br>
        <label for="nama">Nama: </label>
        <input type="text" name="nama" id="nama">
        <br>
        <label for="alamat">Alamat: </label>
        <input type="text" name="alamat" id="alamat">
        <br>
        <input type="submit" name="submit" value="Tambah Data!">
    </form>
</body>
</html>
