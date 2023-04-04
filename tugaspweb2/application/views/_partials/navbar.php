<!-- Navbar start here -->
		<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #001349;">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?php echo site_url('perpustakaan/index'); ?>">
					<img src="<?= site_url('assets/images/Logo-Digilib.png');?>" width="235" height="55" alt="Website UPT Perpustakaan dan Percetakan" id="logo" data-height-percentage="60" data-actual-width="235" data-actual-height="55">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="nav nav-tabs col-lg-5">
						<li class="nav-item">
							<a class="nav-link<?php if($active == 'index') echo ' text-dark active';else echo ' text-white'; ?>"<?php if($active == 'index') echo 'aria-current="page"';?> href="<?php echo site_url('perpustakaan/index'); ?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link<?php if($active == 'dashboard') echo ' text-dark active';else echo ' text-white';?>"<?php if($active == 'dashboard') echo 'aria-current="page"';?> href="<?php echo site_url('perpustakaan/dashboard'); ?>">Lihat Data</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if($active == 'search') echo ' text-dark active';else echo ' text-white';?>"<?php if($active == 'search') echo 'aria-current="page"';?> href="<?php echo site_url('perpustakaan/search'); ?>">Cari Data</a>
						</li>
						<li class="nav-item">
							<a class="nav-link<?php if($active == 'add') echo ' text-dark active';else echo ' text-white';?>"<?php if($active == 'add') echo 'aria-current="page"';?> href="<?php echo site_url('perpustakaan/add'); ?>">Tambah Data</a>
						</li>
						<li class="nav-item">
							<a class="nav-link<?php if($active == 'about_us') echo ' text-dark active';else echo ' text-white';?>"<?php if($active == 'about_us') echo 'aria-current="page"';?> href="<?php echo site_url('perpustakaan/about_us'); ?>">About Us</a>
						</li>
					</ul>
					<ul class="navbar-nav nav-tabs col-lg-6 justify-content-lg-end">
						<li class="nav-item">
							<a class="nav-link<?php if($active == 'contact_me') echo ' text-dark active';else echo ' text-white' ?>" <?php if($active == 'contact_me') echo 'aria-current="page"';?> href="<?php echo site_url('perpustakaan/contact_me'); ?>">Contact Me</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Navbar end here -->

		<!-- Breadcrumb start here -->
		<div class="container pt-5">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb py-3 px-3 rounded-3" style="background-color: #e9ecef">
					<?php if($active=='index'):?><li class="breadcrumb-item">
						<a href="<?= site_url('perpustakaan')?>">Home</a>
					</li>
				<?php elseif ($active=='dashboard'): ?><li class="breadcrumb-item">
						<a href="<?= site_url('perpustakaan')?>">Home</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?= 'Dashboard';?></li>
				<?php elseif ($active=='search'): ?><li class="breadcrumb-item">
						<a href="<?= site_url('perpustakaan')?>">Home</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?= 'Search Data';?></li>
				<?php elseif ($active=='add') :?><li class="breadcrumb-item">
						<a href="<?= site_url('perpustakaan')?>">Home</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?= 'Add Data';?></li>
				<?php elseif ($active=='edit') :?><li class="breadcrumb-item">
						<a href="<?= site_url('perpustakaan')?>">Home</a>
					</li>
					<li class="breadcrumb-item"><a href="<?= site_url('perpustakaan/dashboard')?>">Lihat Data</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?= 'Edit Data';?></li>
				<?php elseif ($active=='delete') :?><li class="breadcrumb-item">
						<a href="<?= site_url('perpustakaan')?>">Home</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?= 'Delete Data';?></li>
				<?php elseif ($active=='contact_me') :?><li class="breadcrumb-item">
						<a href="<?= site_url('perpustakaan')?>">Home</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?= 'Contact Me';?></li>
				<?php else :?><li class="breadcrumb-item">
						<a href="<?= site_url('perpustakaan')?>">Home</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?= 'About Us';?></li>
				<?php endif;?></ol>
			</nav>
		</div>
		<!-- Breadcrumb end here -->