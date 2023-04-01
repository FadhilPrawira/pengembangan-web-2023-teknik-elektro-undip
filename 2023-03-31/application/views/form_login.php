<html>
    <head>
        <?php $this->load->view('_partials/head.php'); ?>
    </head>
    <body>
        <?php $this->load->view('_partials/navbar.php');?>
        <h1>Tempat login</h1>
        <form action="" method="POST">
            <label for="nama">Nama</label>
            <input type="text" name="nama">
            <br>
            <label for="password">Password</label>
            <input type="password" name="password">
            <br>
            <input type="submit" value="Login" name="submit">
        </form>
        <?php $this->load->view('_partials/footer.php'); ?>
    </body>
</html>