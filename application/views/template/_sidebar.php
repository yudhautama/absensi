<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?php echo base_url()?>index.php/dashboard1" class="brand-link">
		<img src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
		style="opacity: .8">
		<span class="brand-text font-weight-light">Admin Absensi</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php echo base_url()?>assets/img/courage.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Admin</a>
				<a href="#" class="d-block">Admin</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					with font-awesome or any other icon font library -->
					<li class="nav-item">
						<a href="<?php echo base_url()?>index.php/dashboard1" class="nav-link">
							<i class="nav-icon fa fa-home"></i>
							<p>
								Dashboard
							</p>
						</a>
					</li>
					<li class="nav-item has-treeview <?php if($page == 'data_master'){ echo 'menu-open'; }?> ">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-archive"></i>
							<p>
								Data Master
								<i class="right fa fa-angle-left "></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url()?>index.php/tbl_karyawan" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Data Karyawan</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url()?>tbl_jabatan" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Data Jabatan</p>
								</a>
							</li>
							<!-- <li class="nav-item">
								<a href="<?php echo base_url()?>tbl_pendidikan" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Data Pendidikan</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url()?>tbl_keluarga" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Data Keluarga</p>
								</a>
							</li> -->
						</ul>
					</li>
					<!-- <li class="nav-item">
						<a href="<?php echo base_url()?>tbl_detail_absen" class="nav-link">
							<i class="fa fa-table nav-icon"></i>
							<p>Data Absensi</p>
						</a>
					</li> -->
					<li class="nav-item has-treeview <?php if($page == 'lainnya'){ echo 'menu-open'; }?>">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-archive"></i>
							<p>
								Kehadiran
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
						<li class="nav-item">
								<a href="<?php echo base_url()?>tbl_detail_absen" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Absensi</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url()?>tbl_lembur" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Lembur</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url()?>tbl_izin" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Izin</p>
								</a>
							</li>
						</ul>
						<li class="nav-item has-treeview <?php if($page == 'setup'){ echo 'menu-open'; }?>">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-cog"></i>
							<p>
								Setup
								<i class="fa fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
						<!-- <li class="nav-item">
								<a href="#" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>Role Management</p>
								</a>
							</li> -->
							<li class="nav-item">
								<a href="<?php echo base_url()?>users" class="nav-link">
									<i class="fa fa-circle-o nav-icon"></i>
									<p>User Management</p>
								</a>
							</li>
						</ul>
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