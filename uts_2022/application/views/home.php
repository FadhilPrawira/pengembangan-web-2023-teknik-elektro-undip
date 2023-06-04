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
					<h1 class="display-5 fw">Selamat datang di</h1>
					<h2 class="fw-bold">Bagian Kepegawaian</h2>
					<h2 class="fw-bold">Biro Umum dan Keuangan (BUK)</h2>
					<h2 class="fw-bold">Universitas Diponegoro</h2>

					<p class="col-md-8 fs-4">
					Bagian Kepegawaian menyelenggarakan fungsi: 
						<ol>
							<li>Pelaksanaan perencanaan analisis beban kerja</li>
							<li>Analisis kebutuhan rekrutmen sumber daya manusia fungsional akademik dan kependidikan</li>
							<li>Pelaksanaan layanan urusan kepegawaian fungsional akademik tenaga kependidikan</li>
							<li>Pelaksanaan layanan kesejahteraan sumber daya manusia fungsional akademik dan tenaga kependidikan</li>
							<li>Fungsi-fungsi lain yang ditetapkan oleh Rektor.</li>
						</ol> 
					</p>
					<a href="<?= site_url('pegawai/dashboard');?>" class="text-white">  
						<button class="btn btn-primary btn-lg" type="button">Lihat Data Pegawai</button>
					</a>
				</div>
			</div>	
		</div>
		<!-- Content end here -->

		<?php $this->load->view('_partials/footer.php'); ?>

	</body>
	<!-- Body end here -->
</html>
