<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php 
    include('navbar.php');
    include('functions.php');

    // Query SELECT id, username, nama, alamat FROM user;
    $result = getAll();

    // Untuk nomor di dalam tabel
    $nomor = 1;
    ?>
    <h1>Selamat Datang di Dashboard</h1>
    <br>
    <br>
    <table border="1px">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Alamat</th>
                <th>Aksi</th>
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
                <td>
                    <a href="edit.php?id=<?php echo $row["id"];?>"><button>Edit</button></a>
                    <a href="delete.php?id=<?php echo $row["id"];?>"><button>Delete</button></a>
                </td>
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
            ?>
        </tbody>
    </table>
</body>
</html>