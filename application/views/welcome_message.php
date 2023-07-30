<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GIS-KOS | Welcome</title>
	<!-- icon shortcut -->
	<link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/logo.png" type="image/x-icon">
	<!-- my css -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css">
	<!-- fontawesome -->
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
	<!-- sweetalert2 -->
	<script src="<?= base_url('assets/'); ?>vendor/sweetalert/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/sweetalert/sweetalert2.min.css">
</head>

<body data-spy="scroll" data-target="#navbarSupportedContent">
	<script>
		<?php if ($this->session->flashdata('gagal')) { ?>
			var isi = <?= json_encode($this->session->flashdata('gagal')) ?>;
			Swal.fire({
				position: 'center',
				icon: 'error',
				title: 'Gagal!',
				text: isi,
				showConfirmButton: false,
				timer: 1500
			})
		<?php } ?>
	</script>
	<?= $this->session->flashdata('pesan'); ?>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
			<div class="container">
				<a class="navbar-brand" href="<?= site_url('./'); ?>">GIS-KOS</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="#about">Tentang</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#peta">Peta</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#dataKos">Terbaru</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<div class="content" id="home">
		<img src="<?= base_url('assets/'); ?>img/background.jpg" alt="...">
		<div class="overlay"></div>
		<div class="hero">

			<h2 class="text-light display-4 font-weight-bold">Selamat Datang di Aplikasi GIS-KOS</h2>
			<p class="text-light">Sistem Informasi Geografis Pemetaan Rumah Kos di Kota Ambon.</p>
			<a name="" id="" class="btn btn-outline-success text-light bg-transparent" href="<?= site_url('auth'); ?>" role="button">Masuk</a>
		</div>
	</div>
	<section class="about py-5" id="about">
		<div class="row align-items-center container my-5 mx-auto">
			<div class="text col-lg-6 col-md-6 col-12 w-50">
				<h6>TENTANG APLIKASI</h6>
				<h2>Sistem Informasi Geografis Pemetaan Rumah Kos</h2>
				<p>Aplikasi GIS-KOS merupakan aplikasi berbasis web, yang memiliki tujuan untuk memetakan rumah kos berdasarkan lokasi, dan informasi tentang kos. Aplikasi ini juga mempermudah pengguna dalam mencari lokasi rumah kos.</p>
			</div>
			<div class="img col-lg-6 col-md-6 col-12 w-50">
				<img src="<?= base_url('assets/'); ?>img/logo.png" alt="..." class="img-fluid">
			</div>
		</div>
	</section>

	<section class="peta py-5" id="peta">
		<div class="row align-items-center container my-5 mx-auto">
			<div class="img col-lg-6 col-md-6 col-12 w-50">
				<img src="<?= base_url('assets/'); ?>img/map.png" alt="..." class="img-fluid">
			</div>
			<div class="text col-lg-6 col-md-6 col-12 w-50">
				<h6>PETA</h6>
				<h2>Sistem Informasi Geografis Pemetaan Rumah Kos</h2>
				<a href="<?= site_url('peta'); ?>">Lihat peta</a>
			</div>
		</div>
	</section>

	<section class="dataKos py-5" id="dataKos">
		<div class="mx-auto align-items-center">
			<div class="heading text-center pt-5">
				<h2 class="font-weight-bold pb-5">Postingan terbaru</h2>
			</div>
			<div class="row mx-auto justify-content-center align-items-center text-right">
				<?php if ($list->num_rows() > 0) { ?>
					<div class="col-md-12 text-center">
						<a name="" id="" class="nav-link d-block" href="<?= site_url('terbaru'); ?>" role="button">-> Lihat Semua <- </a>
					</div>
					<?php foreach ($list->result() as $key => $value) { ?>
						<a name="" id="" class="nav-link" href="<?= site_url('terbaru/detail/' . $value->id_kos); ?>" role="button">
							<div class="col-md-3">
								<div class="card m-0 border-0 shadow-sm text-center" style=" height: 25rem;">
									<?php if ($value->gambar1 != null) { ?>
										<img class="img-fluid mb-2" src="<?= base_url('uploads/kos/' . $value->gambar1); ?>" style="object-fit: cover; width: 100%; height: 170px;" alt="">
									<?php } else { ?>
										<img class="img-fluid mb-2" src="<?= base_url('uploads/kos/default.jpg'); ?>" style="object-fit: cover; width: 100%; height: 170px;" alt="">
									<?php } ?>
									<p>
										<span class="h5"><?= $value->nama_kos; ?></span><br>
										<span class="text-black-50" style="font-size: 2vh;"><?= $value->alamat_kos; ?>, <?= $value->kecamatan; ?></span><br>
										<span class="text-black-50 font-weight-bold" style="font-size: 15px;">Sisa Kamar : <?= $value->sisa_kamar; ?></span>
									</p>
									<hr class="mb-0">
									<div class="btn-group-sm text-center" role="group" aria-label="Basic example">
										<a name="" id="" class="btn btn-sm btn-primary border-0" href="<?= site_url('peta/lokasi/' . $value->id_kos); ?>" role="button"><i class="fas fa-route"></i> Lokasi</a>
										<a name="" id="" class="btn btn-sm btn-success border-0" style="background-color: #298505;" href="http:///api.whatsapp.com/send?phone=<?= $value->no_wa; ?>&text=Halo%20Admin,%20Saya%20Mau%20Pesan%20Kamar." role="button" target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp</a>
									</div>
								</div>
							</div>
						</a>
					<?php } ?>
				<?php } else { ?>
					Tidak ada data
				<?php } ?>
			</div>
		</div>
	</section>
	<footer class="text-center text-white mt-5" style="background: rgb(38, 119, 6);">
		<!-- Grid container -->
		<div class="container pt-3 pb-0">
			<!-- Section: Social media -->
			<section class="mb-3">
				<!-- Facebook -->
				<a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/heinly.heinly.35" target="_blank" role="button"><i class="fab fa-facebook"></i></a>

				<!-- Instagram -->
				<a class="btn btn-outline-light btn-floating m-1" href="https://instagram.com/heinly_lewier?igshid=MzNlNGNkZWQ4Mg==" target="_blank" role="button"><i class="fab fa-instagram"></i></a>

				<!-- Github -->
				<a class="btn btn-outline-light btn-floating m-1" href="https://github.com/heinlyLewier" target="_blank" role="button"><i class="fab fa-github"></i></a>
			</section>
			<!-- Section: Social media -->
		</div>
		<!-- Grid container -->

		<!-- Copyright -->
		<div class="text-center p-3" style="background-color: green; font-size: 12px;">
			Copyright &copy Skripsi GIS Pemetaan Rumah Kos di Kota Ambon 2023 - <?= date('Y'); ?> | Design by heinly_lewier
		</div>
		<!-- Copyright -->
	</footer>

	<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>