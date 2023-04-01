<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_partials/head.php'); ?>
</head>

<body>
	<?php $this->load->view('_partials/navbar.php'); 
	?>

	<form action="<?php base_url("edit") ?>" method="post"
							enctype="multipart/form-data" >


							<div class="form-group">
								<label for="name">Nama* </label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama Mahasiswa" value="<?php echo $mahasiswa->nama ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Alamat</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" min="0" placeholder="Alamat mahasiswa" value="<?php echo $mahasiswa->alamat ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>
								<input type=hidden name=id value=<?php echo $mahasiswa->id; ?>>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>
					</div>

	<?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>