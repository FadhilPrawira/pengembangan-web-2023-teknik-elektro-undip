<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<!-- Head start here -->
	<head>
		<?php $this->load->view('_partials/header.php'); ?>
	</head>
	<!-- Head end here -->

	<!-- Body start here -->
	<body>
		<?php $this->load->view('_partials/navbar.php'); ?>


		<!-- Content start here -->
		<div class="container my-5">
			<div class="p-5 mb-4 bg-body-tertiary rounded-3">
				<div class="container-fluid py-1">
					<h1 class="display-5 fw-bold">Selamat datang di</h1>
					<h2 class="fw-bold">UPT Perpustakaan dan UNDIP Press Universitas Diponegoro</h2>
					<p class="col-md-8 fs-4">
						<h5>Layanan kami</h5>
						<ul>
							<li>Anggota</li>
							<p>Lt 2 (Sirkulasi), Lt 3 (Koleksi Tandon, Rare Book), Lt 4 (Koleksi Serial, Referensi)</p>
							<li>Umum</li>
							<p>Lt 3 (Koleksi Tandon, Rare Book), Lt 4 (Koleksi Serial, Referensi)</p>			
						</ul>
						<h5>Jam Layanan</h5>
						<ul>
							<li>Senin – Kamis : 07.30 – 16.00</li>
							<li>Jum’at : 07.30 – 16.30</li>
							<li>Sabtu, Minggu dan Hari Besar : Libur</li>
						</ul>
					</p>
					<a href="<?= site_url('perpustakaan/dashboard');?>" class="text-white">  
						<button class="btn btn-primary btn-lg" type="button">Lihat Data Buku</button>
					</a>
				</div>
			</div>	
		</div>
		<!-- Content end here -->

		<?php $this->load->view('_partials/footer.php'); ?>

	</body>
	<!-- Body end here -->
</html>
