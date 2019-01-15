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
              <h1>Data Lembur</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Lembur</li>
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
                    <h3 class="card-title"><?php echo $button ?></h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form">
                    <div class="card-body">
                     <div class="form-group">
                      <label for="varchar">NIK<?php echo form_error('nik') ?></label>
                      <select class="form-control form-control-sm" name="nik" >
                        <option>--Pilih NIK Karyawan--</option>
                        <?php foreach($nik as $row) { ?>
                          <option value="<?php echo $row['nik']  ?>"><?php echo $row['nik'] ?> <?= $row['nama_kyn'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="varchar">PIC <?php echo form_error('PIC') ?></label>
                      <select class="form-control form-control-sm" name="PIC">
                        <option>--Pilih PIC--</option>
                        <?php foreach($PIC as $row) { ?>
                          <option value="<?php echo $row['nama_pic'] ?>"><?php echo $row['nama_pic'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="enum">Approval <?php echo form_error('approval') ?></label>
                      <select class="form-control form-control-sm" name="approval">
                        <option>--Pilih Approve--</option>
                        <?php foreach($approval as $row) { ?>
                          <option value="<?php echo $row['app'] ?>"><?php echo $row['app'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="varchar">Task <?php echo form_error('Task') ?></label>
                      <input type="text" class="form-control form-control-sm" name="Task" id="Task" placeholder="Task" value="<?php echo $Task; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                      <input type="date" class="form-control form-control-sm" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?= (!$tanggal) ? $today : $tanggal ; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
                      <input type="text" class="form-control form-control-sm" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
                    </div>
                    <input type="hidden" name="id_kyn" value="<?php echo $id_kyn; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('tbl_lembur') ?>" class="btn btn-default">Cancel</a>
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
