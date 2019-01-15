<!DOCTYPE html>
<?php $today = date('Y-m-d'); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Absensi</title>
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
              <h1>Data Absensi</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Absensi</li>
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
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"><?php echo $button; ?> Absen</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form">
                  <div class="card-body">
                   <div class="form-group">
                      <label for="int">NIK <?php echo form_error('nik') ?></label>
                      <select  class="form-control form-control-sm" name="nik" id="nik" placeholder="NIK" />
                      <option>--Pilih NIK Karyawan--</option>
                      <?php foreach($nik as $row) { ?>
                        <option value="<?php echo $row['nik']  ?>"><?php echo $row['nik'] ?> <?= $row ['nama_kyn']?></option>
                      <?php } ?>
                    </select>
                  </div>
                    <div class="form-group">
                      <label for="time">Jenis Absen <?php echo form_error('j_absen') ?></label>
                      <select class="form-control form-control-sm" name="j_absen" id="j_absen" placeholder="Jenis Absen" >
                        <option>--Pilih Jenis Absen--</option>
                        <?php foreach($j_absen as $row) { ?>
                          <option value="<?php echo $row['j_absen'] ?>">
                            <?php echo $row['j_absen'] ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="date">Tanggal <?php echo form_error('tgl') ?></label>
                      <input type="date" class="form-control form-control-sm" name="tgl" id="tgl" placeholder="Time Out" value="<?= (!$tgl) ? $today : $tgl ; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="time">Jam <?php echo form_error('jam') ?></label>
                      <input type="time" class="form-control form-control-sm" name="jam" id="jam" placeholder="Time Out" value="<?php echo $jam; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
                      <input type="text" class="form-control form-control-sm" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
                    </div>
                    <input type="hidden" name="id_kyn" value="<?php echo $id_kyn; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('tbl_detail_absen') ?>" class="btn btn-default">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
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