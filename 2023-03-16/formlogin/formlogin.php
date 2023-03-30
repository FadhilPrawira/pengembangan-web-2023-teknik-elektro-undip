<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="proseslogin.php" method="post">

    
    <label for="username">Username</label>
    <input type="text" name="username" id="username">

    <br>

    <label for="password">password</label>
    <input type="password" name="password" id="password">

    <input type="submit" value="Kirim" name="submit">
    <!-- buat data yang tersimpan untuk usernamenya 
    misal username dodi password 123
    jika orang masukkan username tsb maka login berhasil
    jika salah maka keluar peringatan username password salah -->

    </form>
</body>
</html>