<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "menu.php";?>
    <form action="bacatabel.php" method="post">
        <label for="nama">
            Nama
            <input type="text" name="nama" id="nama">
        </label>
        <input type="submit" value="Kirim" name="submit">
    </form>
</body>
</html>