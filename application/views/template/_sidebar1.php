<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
		style="opacity: .8">
		<span class="brand-text font-weight-light">Karyawan</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Karyawan</a>
				<a href="#" class="d-block">Karyawan</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					with font-awesome or any other icon font library -->
					<li class="nav-item">
						<a href="<?php echo base_url()?>index.php/dashboard2" class="nav-link">
							<i class="nav-icon fa fa-home"></i>
							<p>
								Dashboard
							</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-archive"></i>
							<p>
								Profil
								<i class="right fa fa-angle-left "></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url()?>tbl_keluarga" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Data Keluarga</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url()?>tbl_pendidikan" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Data Pendidikan</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url()?>tbl_log" class="nav-link">
							<i class="fa fa-table nav-icon"></i>
							<p>Log Absensi</p>
						</a>
					</li>
						<li class="nav-item">
							<a href="<?php echo base_url()?>keluar" class="nav-link">
								<i class="nav-icon fa fa-sign-out"></i>
								<p>Logout</p>
							</a>
						</li>
					</li>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>