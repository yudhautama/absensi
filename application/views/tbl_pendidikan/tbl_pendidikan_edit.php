<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Pendidikan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- header -->
    <?php $this->load->view('template/_nav.php') ;?>
    <!-- sidebar -->
    <?php $this->load->view('template/_sidebar.php') ;?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Pendidikan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Pendidikan</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section> 
      <form action="<?php echo $action; ?>" method="post">

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-4">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title"><?= $button?></h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form">
                    <div class="card-body">
                     <div class="form-group">
                      <label for="int">NIK <?php echo form_error('nik') ?></label>
                      <select disabled="disabled" class="form-control form-control-sm" name="nik" id="nik" placeholder="NIK" />
                      <option>--Pilih NIK Karyawan--</option>
                      <?php foreach($nomor as $row) { ?>
                        <option value="<?php echo $row['nik'] ?>" <?php if($nik){if($nik == $row['nik']){echo 'selected'; } } ?>><?php echo $row['nik'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="varchar">Tingkat Pendidikan <?php echo form_error('tingk_pend') ?></label>
                    <select class="form-control form-control-sm" name="tingk_pend">
                      <option>--Pilih Pendidikan--</option>
                      <?php foreach($tingkat as $row) { ?>
                        <option value="<?php echo $row['pend'] ?>" <?php if($tingk_pend){if($tingk_pend==$row['pend']){echo 'selected';}}?>><?php echo $row['pend'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="varchar">Nama Sekolah <?php echo form_error('nama_sekolah') ?></label>
                    <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo $nama_sekolah; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Jurusan <?php echo form_error('jurusan') ?></label>
                    <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" value="<?php echo $jurusan; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="year">Tahun Masuk <?php echo form_error('tahun_masuk') ?></label>
                    <input type="text" class="form-control" name="tahun_masuk" id="tahun_masuk" placeholder="Tahun Masuk" value="<?php echo $tahun_masuk; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="year">Tahun Lulus <?php echo form_error('tahun_lulus') ?></label>
                    <input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" placeholder="Tahun Lulus" value="<?php echo $tahun_lulus; ?>" />
                  </div>
                  <input type="hidden" name="id_kyn" value="<?php echo $id_kyn; ?>" /> 
                  <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                  <a href="<?php echo site_url('tbl_karyawan') ?>" class="btn btn-default">Cancel</a>
                </form>
              </div>
            </div>
          </div>
        </section>
      </form>
    </div>
  </div>
  <?php $this->load->view('template/_footer') ;?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/dist/js/demo.js"></script>
</body>
</html>

</body>
</html>