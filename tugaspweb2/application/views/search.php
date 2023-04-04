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
			<h1>Cari Data</h1>
			<?php echo form_open('perpustakaan/search'); ?>
				<div class="input-group my-3">
					<span class="input-group-text" id="basic-addon2">Judul Buku:</span>
					<input id="keyword" name="keyword" type="search" class="form-control" placeholder="Contoh: Dilan" aria-label="Contoh: Dilan" aria-describedby="button-addon2">
					<button class="btn btn-outline-secondary btn-warning text-black" type="submit" id="button-addon2">Cari 
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
							<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
						</svg>
					</button>
				</div>
			<?php echo form_close();?>
			
			<!-- Search result start here -->
			<?php if(isset($search_result) and count($search_result)>=1):?><div class="search-result container">
				<h1>Hasil Pencarian</h1>
				<hr>
				<!-- Table start here -->
				<table border="1" class="table table-striped table-hover table-bordered rounded-5">
					<!-- Table head start here -->
					<thead class="table-dark text-center">
						<tr>
							<th>No.</th>
							<th>Kode Buku</th>
							<th>Judul Buku</th>
							<th>Pengarang</th>
							<th>Penerbit</th>
						</tr>
					</thead>
					<!-- Table head end here -->

					<!-- Table body start here -->
					<tbody>	
				<?php $nomor = 1;foreach ($search_result as $book):?>
		<tr>
							<td class="text-center"><?= html_escape($nomor).".";?></td>
							<td><?= html_escape($book->kodebuku);?></td>
							<td><?= html_escape($book->judulbuku);?></td>
							<td><?= html_escape($book->pengarang);?></td>
							<td><?= html_escape($book->penerbit);?></td>      
						</tr>
					<?php $nomor++;endforeach;?>
</tbody>
					<!-- Table body end here -->
				</table>
				<!-- Table end here -->
			</div>  
		<?php else:?>
	<?php if(isset($keyword)):?>
	<div class="search-result container">
				<hr>
				<h1>Tidak ada data yang ditemukan</h1>
				<p>Coba dengan kata kunci yang lain</p>
    		</div>
		<?php endif;?><?php endif;?></div>
		<!-- Content end here -->

		<?php $this->load->view('_partials/footer.php'); ?>
	
	</body>
</html>
