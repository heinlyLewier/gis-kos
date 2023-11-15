<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Sidebar -->
		<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #298505;">
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
				<div class="sidebar-brand-icon ">
					<img src="<?= base_url('assets/img/map.png'); ?>" width="50" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
				</div>
				<div class="sidebar-brand-text mx-3">GIS-KOS</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0" />

			<!-- Nav Item - Dashboard -->
			<?php if ($this->session->userdata('level') == 'User') { ?>
				<li class="nav-item <?= ($title == 'Dashboard') ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= site_url('home'); ?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Dashboard</span></a>
				</li>
			<?php } ?>
			<?php if ($this->session->userdata('level') == 'Admin') { ?>
				<li class="nav-item <?= ($title == 'Dashboard') ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= site_url('admin'); ?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Dashboard</span></a>
				</li>
			<?php } ?>
			<!-- Divider -->
			<hr class="sidebar-divider my-0" />
			<!-- Nav Item - Tables -->
			<?php if ($this->session->userdata('level') == 'User') { ?>
				<li class="nav-item <?= ($title == 'Data Kos') ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= site_url('kos'); ?>">
						<i class="fas fa-fw fa-home"></i>
						<span>Data Kos</span></a>
				</li>
			<?php } ?>
			<?php if ($this->session->userdata('level') == 'Admin') { ?>
				<li class="nav-item <?= ($title == 'Data Kos') ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= site_url('admin/kos'); ?>">
						<i class="fas fa-fw fa-home"></i>
						<span>Data Kos</span></a>
				</li>
				<li class="nav-item <?= ($title == 'Data User') ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= site_url('admin/user'); ?>">
						<i class="fas fa-fw fa-users"></i>
						<span>Data User</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
						<i class="fas fa-fw fa-folder"></i>
						<span>Pages</span>
					</a>
					<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Login Screens:</h6>
							<?php if ($this->session->userdata('security') !== 'Login') : ?>
								<a class="collapse-item" href="<?= site_url('auth'); ?>">Login</a>
							<?php endif; ?>
							<a class="collapse-item" href="<?= site_url('registrasi'); ?>">Register</a>
						</div>
					</div>
				</li>
			<?php } ?>
			<hr class="sidebar-divider my-0" />
			<li class="nav-item <?= ($title == 'Profil') ? 'active' : ''; ?>">
				<a class="nav-link" href="<?= site_url('profil/update_profil'); ?>">
					<i class="fas fa-fw fa-user"></i>
					<span>Profil</span></a>
			</li>
			<hr class="sidebar-divider my-0" />

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link logout" href="<?= site_url('auth/logout'); ?>">
					<i class="fas fa-fw fa-sign-out-alt"></i>
					<span>Logout</span></a>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider my-0" />
			<li class="nav-item">
				<a class="nav-link" href="<?= site_url('terbaru'); ?>">
					<i class="fas fa-fw fa-external-link-alt"></i>
					<span>Lihat Website</span></a>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block" />

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>
		<!-- End of Sidebar -->