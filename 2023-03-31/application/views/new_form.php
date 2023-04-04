<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_partials/head.php'); ?>
</head>

<body>
	<?php $this->load->view('_partials/navbar.php'); 
	?>
	<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

						<form action="<?php echo site_url('mahasiswa/add') ?>" method="post" >
                
								<label for="id">id*</label>
								<input class="form-control <?php echo form_error('id') ? 'is-invalid':'' ?>"
								 type="numeric" name="id" placeholder="id Mahasiswa" />
								<div class="invalid-feedback">
									<?php echo form_error('id') ?>
								</div>
							    
                        
                            
								<label for="nama">Nama*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Nama Mahasiswa" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							

							
								<label for="alamat">Alamat*</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" min="0" placeholder="Alamat Mahasiswa" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							

							<input type="submit" name="btn" value="Save" />
						</form>



	<?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>
