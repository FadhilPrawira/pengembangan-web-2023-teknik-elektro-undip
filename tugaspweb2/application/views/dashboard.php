<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<!-- Head start here -->
	<head>
		<?php $this->load->view('_partials/header.php'); ?>	</head>
	<!-- Head end here -->

	<!-- Body start here -->
	<body>
		<?php $this->load->view('_partials/navbar.php'); ?>
		

		<!-- Content start here -->
		<div class="container my-5">
			<h1 class="py-3">Dashboard</h1>
			<!-- Table start here -->
			<table class="table table-striped table-hover table-bordered rounded-5">
				<!-- Table head start here -->
				<thead class="table-dark text-center">
					<tr>
						<th>No.</th>
						<th>Kode Buku</th>
						<th>Judul Buku</th>
						<th>Pengarang</th>
						<th>Penerbit</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<!-- Table head end here -->
				
				<!-- Table body start here -->
				<tbody><?php
			$nomor =1;
			foreach ($books as $book):
			?>	
					<tr>
						<td class="text-center"><?= $nomor.".";?></td>
						<td><?= $book->kodebuku;?></td>
						<td><?= $book->judulbuku;?></td>
						<td><?= $book->pengarang;?></td>
						<td><?= $book->penerbit;?></td>
						<td class="text-center"><a href="<?= site_url('perpustakaan/edit/').$book->id;?>" class="btn btn-warning">Edit</a> | <a href="<?= site_url('perpustakaan/delete/').$book->id;?>" class="btn btn-danger">Delete</a></td>
					</tr><?php $nomor++;endforeach;?>
				
				</tbody>
				<!-- Table body end here -->
			</table>
			<!-- Table end here -->
		</div>
		<!-- Content end here -->
			
		<?php $this->load->view('_partials/footer.php'); ?>
			
	</body>
	<!-- Body end here -->
</html>
