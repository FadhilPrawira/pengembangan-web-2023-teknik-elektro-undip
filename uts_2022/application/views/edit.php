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

		<h1>Edit Data</h1>

        <?php echo form_open(''); ?>
		<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="nomorpegawai" class="col-form-label">Nomor Pegawai</label>
  </div>
  <div class="col-auto">
    <input type="text" name="nomorpegawai" value="<?= $employee->Nomorpegawai_057; ?>" id="nomorpegawai" class="form-control" aria-labelledby="nomorpegawaiHelpInline">
  </div>
  <div class="col-auto">
    <span id="nomorpegawaiHelpInline" class="form-text">
      Nomor Pegawai maksimal 4 karakter.
    </span>
  </div>
</div>

		<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="namapegawai" class="col-form-label">Nama Pegawai</label>
  </div>
  <div class="col-auto">
    <input type="text" name="namapegawai" value="<?= $employee->NamaPegawai_057; ?>" id="namapegawai" class="form-control" aria-labelledby="namapegawaiHelpInline">
  </div>
  <div class="col-auto">
    <span id="namapegawaiHelpInline" class="form-text">
      Nama Pegawai maksimal 50 karakter.
    </span>
  </div>
</div>

<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="unit" class="col-form-label">Nama Unit</label>
  </div>
  <div class="col-auto">
    <input type="text" name="unit" value="<?= $employee->Unit_057; ?>" id="unit" class="form-control" aria-labelledby="unitHelpInline">
  </div>
  <div class="col-auto">
    <span id="unitHelpInline" class="form-text">
      Nama unit maksimal 50 karakter.
    </span>
  </div>
</div>

<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="alamat" class="col-form-label">Alamat</label>
  </div>
  <div class="col-auto">
    <input type="text" name="alamat" value="<?= $employee->Alamat_057; ?>" id="alamat" class="form-control" aria-labelledby="alamatHelpInline">
  </div>
  <div class="col-auto">
    <span id="pengarangHelpInline" class="form-text">
    Alamat maksimal 70 karakter.
    </span>
  </div>
</div>

<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="noHP" class="col-form-label">No. HP</label>
  </div>
  <div class="col-auto">
    <input type="text" name="noHP" value="<?= $employee->Nohp_057; ?>" id="noHP" class="form-control" aria-labelledby="noHPHelpInline">
  </div>
  <div class="col-auto">
    <span id="noHPHelpInline" class="form-text">
    No HP maksimal 75 karakter.
    </span>
  </div>
</div>
<br>
            <input type="text" name="id" value="<?= $employee->id; ?>">

			<input type="submit" value="Tambah Data" class="btn btn-warning">
			
        <?php echo form_close(); ?>			
		</div>
		<?php $this->load->view('_partials/footer.php'); ?>
</body>
</html>