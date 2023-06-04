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

		<?php echo form_open('pegawai/add'); ?>
		<div class="mb-3">
		<label for="nomorpegawai" class="form-label">Nomor Pegawai</label>
		<input type="text" name="nomorpegawai" class="form-control" aria-labelledby="nomorpegawaiHelpBlock" id="nomorpegawai" placeholder="Contoh: 191204121940031001">
		</div>
		<div id="nomorpegawaiHelpBlock" class="form-text">
			<p>Nomor Pegawai maksimal 18 karakter. Format mengikuti AAAABBCCDDDDEEFGGG.</p>
			<ul>
				<li>AAAABBCC adalah tanggal lahir pegawai dengan format tahun, bulan, tanggal</li>
				<li>DDDDEE adalah tanggal pengangkatan pegawai</li>
				<li>F adalah jenis kelamin pegawai dengan 1 adalah pria dan 2 adalah wanita</li>
				<li>GGG adalah urutan yang digunakan untuk menghindari duplikasi data AAAABBCCDDDDEEF dengan pegawai lain, bersifat increment</li>
			</ul>
		</div>
		<div class="mb-3">
		<label for="namapegawai" class="form-label">Nama Pegawai</label>
		<input type="text" name="namapegawai" class="form-control" aria-labelledby="namapegawaiHelpBlock" id="namapegawai" placeholder="Contoh: Hamengkubuwono IX" >
		</div>
		<div id="namapegawaiHelpBlock" class="form-text">
			<p>Nama pegawai maksimal 50 karakter.</p>
		</div>
		<div class="mb-3">
		<label for="unit" class="form-label">Nama Unit</label>
		<input type="text" name="unit" class="form-control" aria-labelledby="unitHelpBlock" id="unit" placeholder="Contoh: Direktorat Teknologi Informasi, Komunikasi dan Pelaporan">
		</div>
		<div id="unitHelpBlock" class="form-text">
			<p>Nama unit maksimal 50 karakter.</p>
		</div>
		<div class="mb-3">
		<label for="alamat" class="form-label">Alamat Pegawai</label>
		<input type="text" name="alamat" class="form-control" aria-labelledby="alamatHelpBlock" id="alamat" placeholder="Contoh: Kamar 15, Penginapan Abadi, Jl. Pegangsaan Timur No. 56, RT 002, RW 003, Perumahan Grand Tembalang Makmur, Kelurahan Tembalang, Kota Semarang, Provinsi Jawa Tengah, Kode Pos 50275 " >
		</div>
		<div id="alamatHelpBlock" class="form-text">
			<p>Alamat pegawai maksimal 70 karakter. Alamat harus jelas serta menyebutkan letak kamar/lantai, nama gedung, nama jalan/blok, nama RT dan RW, nama komplek/perumahan, nama kelurahan/desa, nama kecamatan, nama kabupaten/kota, nama provinsi, dan kode pos.</p>
		</div>
		<div class="mb-3">
		<label for="noHP" class="form-label">No. HP</label>
		<input type="text" name="noHP" class="form-control" aria-labelledby="noHPHelpBlock" id="noHP" placeholder="Contoh: 081234567890" >
		</div>
		<div id="noHPHelpBlock" class="form-text">
			<p>No. HP pegawai maksimal 16 karakter. Ditulis dengan format 08XXYYYYZZZZ. Tidak perlu dipisahkan spasi atau tanda hubung.</p>
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
