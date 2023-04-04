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
		<div class="container my-5">

		<h1>Tambah Data Baru</h1>
		<?php if ($this->session->flashdata('success')) :?>
			<div class="alert alert-success" role="alert">
			<?= $this->session->flashdata('success');?>
			</div>                    
        <?php endif; ?>
				<?php echo validation_errors(); ?>

		<?php echo form_open('perpustakaan/add'); ?>
		<div class="mb-3">
		<label for="kodebuku" class="form-label">Kode Buku</label>
		<input type="text" name="kodebuku" class="form-control" aria-labelledby="kodebukuHelpBlock" id="kodebuku" placeholder="Contoh: A001" <?php echo set_value('kodebuku'); ?>>
		</div>
		<div id="kodebukuHelpBlock" class="form-text">
			Kode buku maksimal 4 karakter. Gunakan Dewey Decimal Classification (DDC)
		</div>
		<br>
		<div class="mb-3">
		<label for="judulbuku" class="form-label">Judul Buku</label>
		<input type="text" name="judulbuku" class="form-control" aria-labelledby="judulbukuHelpBlock" id="judulbuku" placeholder="Contoh: Modern Control Engineering" <?php echo set_value('kodebuku'); ?>>
		</div>
		<div id="judulbukuHelpBlock" class="form-text">
			Judul buku maksimal 75 karakter.
		</div>
		<div class="mb-3">
		<label for="penerbit" class="form-label">Penerbit Buku</label>
		<input type="text" name="penerbit" class="form-control" aria-labelledby="penerbitHelpBlock" id="penerbit" placeholder="Contoh: Prentice Hall" <?php echo set_value('penerbit'); ?>>
		</div>
		<div id="penerbitHelpBlock" class="form-text">
			Penerbit buku maksimal 50 karakter.
		</div>
		<div class="mb-3">
		<label for="pengarang" class="form-label">Pengarang Buku</label>
		<input type="text" name="pengarang" class="form-control" aria-labelledby="pengarangHelpBlock" id="pengarang" placeholder="Contoh: J.K. Rowling" <?php echo set_value('pengarang'); ?>>
		</div>
		<div id="pengarangHelpBlock" class="form-text">
			Pengarang buku maksimal 50 karakter.
		</div>
		<br>

				<button type="submit" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
				<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
				</svg>
				Tambah Data
            	</button>
			<?php echo form_close(); ?>
		</div>
		<?php $this->load->view('_partials/footer.php'); ?>
	</body>
</html>
