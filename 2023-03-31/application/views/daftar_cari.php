<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_partials/head.php'); ?>
</head>

<body>
	<?php $this->load->view('_partials/navbar.php'); 
	?>
		<h2>Data Mahasiswa</h2>
			<table border=1>
									<tr>
										<th>Nama</th>
										<th>Alamat</th>
										<th>Action</th>
									</tr>
								
									<?php foreach ($mahasiswa as $mahasiswa): ?>
									<tr>
										<td>
											<?php echo $mahasiswa->nama ?>
										</td>
										<td>
											<?php echo $mahasiswa->alamat ?>
										</td>
                                        <td><a href=edit/<?php echo $mahasiswa->id?>>Edit</a>||<a href=delete/<?php echo $mahasiswa->id?>>Hapus</a></td>
									</tr>
									<?php endforeach; ?>
							</table>
	<?php $this->load->view('_partials/footer.php'); ?>
</body>

</html>