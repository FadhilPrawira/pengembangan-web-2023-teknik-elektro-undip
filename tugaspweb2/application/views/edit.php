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
    <label for="kodebuku" class="col-form-label">Kode Buku*</label>
  </div>
  <div class="col-auto">
    <input type="text" name="kodebuku" value="<?= $buku->kodebuku; ?>" id="kodebuku" class="form-control" aria-labelledby="kodebukuHelpInline">
  </div>
  <div class="col-auto">
    <span id="kodebukuHelpInline" class="form-text">
      Kode buku maksimal 4 karakter.
    </span>
  </div>
</div>

		<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="judulbuku" class="col-form-label">Judul Buku*</label>
  </div>
  <div class="col-auto">
    <input type="text" name="judulbuku" value="<?= $buku->judulbuku; ?>" id="judulbuku" class="form-control" aria-labelledby="judulbukuHelpInline">
  </div>
  <div class="col-auto">
    <span id="judulbukuHelpInline" class="form-text">
      Judul buku maksimal 75 karakter.
    </span>
  </div>
</div>

<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="penerbit" class="col-form-label">Penerbit Buku</label>
  </div>
  <div class="col-auto">
    <input type="text" name="penerbit" value="<?= $buku->penerbit; ?>" id="penerbit" class="form-control" aria-labelledby="penerbitHelpInline">
  </div>
  <div class="col-auto">
    <span id="penerbitHelpInline" class="form-text">
      Penerbit buku maksimal 50 karakter.
    </span>
  </div>
</div>

<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="pengarang" class="col-form-label">Pengarang Buku</label>
  </div>
  <div class="col-auto">
    <input type="text" name="pengarang" value="<?= $buku->pengarang; ?>" id="pengarang" class="form-control" aria-labelledby="pengarangHelpInline">
  </div>
  <div class="col-auto">
    <span id="pengarangHelpInline" class="form-text">
	Pengarang buku maksimal 50 karakter.
    </span>
  </div>
</div>
<br>
            <input type="hidden" name="id" value="<?= $buku->id; ?>">

			<input type="submit" value="Tambah Data" class="btn btn-warning">
			
        <?php echo form_close(); ?>			
		</div>
		<?php $this->load->view('_partials/footer.php'); ?>
</body>
</html>