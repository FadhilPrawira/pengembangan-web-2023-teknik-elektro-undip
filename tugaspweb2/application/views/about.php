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
        <h2>UPT Perpustakaan dan Undip Press</h2>
        <ul>
            <li>Alamat</li>
            <p>Jl. Prof Sudarto, SH Gedung Widya Puraya, Tembalang, Semarang</p>
            <li>Telepon</li>
            <p>024 – 7460042</p>
            <li>Nomor Pokok Perpustakaan</li>
            <p>3374102D1000001</p>
            <li>Email</li>
            <p><a href="mailto:perpustakaanundip@gmail.com">perpustakaanundip[at]gmail.com</a></p>
            <li>WhatsApp</li>
            <p><a href="http://wa.me/6282135876098">0821-3587-6098</a></p>
        </ul>
    </div>
    <?php $this->load->view('_partials/footer.php'); ?>
</body>
</html>
