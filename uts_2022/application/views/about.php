<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('_partials/header.php'); ?>
</head>
<body>
	<?php $this->load->view('_partials/navbar.php'); ?>
    <div class="container my-5">
        <h1>Tentang Kami</h1>
        <hr>
        <h2>Bagian Kepegawaian Biro Umum dan Keuangan (BUK) Universitas Diponegoro</h2>
        <ul>
            <li>Alamat</li>
            <p>Gedung SA-MWA, Jl. Prof. Sudarto, SH., Tembalang, Semarang</p>
            <li>Telepon</li>
            <p><a href="tel:+62247460030">(024) 7460030 ext.133</a></p>
            <li>Email</li>
            <p><a href="mailto:kepegawaian@live.undip.ac.id">kepegawaian[at]live.undip.ac.id</a></p>
        </ul>
    </div>
    <?php $this->load->view('_partials/footer.php'); ?>
</body>
</html>
