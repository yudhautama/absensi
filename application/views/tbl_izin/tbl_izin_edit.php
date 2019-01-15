<!DOCTYPE html>
<?php $today = date('Y-m-d'); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lainnya</title>
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
              <h1>Data Izin</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Izin</li>
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
                    <h3 class="card-title">Tambah</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form">
                    <div class="card-body">
                     <div class="form-group">
                      <label for="varchar">Nama Karyawan <?php echo form_error('nama_kyn') ?></label>
                      <select class="form-control form-control-sm" name="nama_kyn" id="nama_kyn" placeholder="Nama Karyawan">
                        <option>--Pilih Karyawan--</option>
                        <?php foreach($nama_karyawan as $row) { ?>
                          <option value="<?php echo $row['nama_kyn'] ?>" <?php if($nama_kyn){if($nama_kyn == $row['nama_kyn']){echo 'selected'; } } ?>><?php echo $row['nama_kyn'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="date">Tanggal Izin <?php echo form_error('tgl') ?></label>
                      <input type="date" class="form-control form-control-sm" name="tgl" id="tgl" placeholder="Tgl" value="<?= (!$tgl) ? $today : $tgl ; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="varchar">Alasan <?php echo form_error('alasan') ?></label>
                      <input type="text" class="form-control form-control-sm" name="alasan" id="alasan" placeholder="Alasan" value="<?php echo $alasan; ?>" />
                    </div>
                    <input type="hidden" name="id_kyn" value="<?php echo $id_kyn; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('tbl_izin') ?>" class="btn btn-default">Cancel</a>
                    
                  </form>
                </div>
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

