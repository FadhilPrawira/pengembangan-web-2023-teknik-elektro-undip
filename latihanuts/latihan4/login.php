<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php 
    include('navbar.php');

    if(isset($_POST["submit"])) {
        // TODO : koneksi ke database
        if($_POST["username"] == "okepulsa" && $_POST["password"] == "mahadewa") {
        header('Location:index.php');
        }
    }
    ?>
    <h1>Halaman Login</h1>

    <form action="" method="post">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>