<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Data</title>
</head>
<body>
    <?php 
    include('navbar.php');
    include('functions.php');
    ?>
    <h1>Selamat Datang di Search Data</h1>
    <h3>Cari berdasarkan username/nama/alamat</h3>
    <form action="" method="get">
        <label for="keyword">Keyword: </label>
        <input type="text" name="keyword" id="keyword">
        <br>
        <input type="submit" name="submit" value="Cari Data!">
    </form>
    <?php
        if(isset($_GET["submit"])) :
            $keyword = htmlspecialchars($_GET["keyword"]);
            $result = searchData($keyword); 
            // Untuk nomor di dalam tabel
            $nomor = 1;

    ?>


    <table border="1px">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0):
            while($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?php echo $nomor;?></td>
                <td><?php echo $row["nama"];?></td>
                <td><?php echo $row["username"];?></td>
                <td><?php echo $row["alamat"];?></td>
            </tr>

            <?php 
            $nomor++;
            endwhile;
            $conn->close();
            else:
            ?>
            <tr>
                <td colspan="5" style="text-align: center;">Tidak ada data</td>
            </tr>
            <?php
            endif;
        endif;
            ?>
        </tbody>
    </table>

</body>
</html>