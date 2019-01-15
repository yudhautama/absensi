<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kehadiran</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/plugins/datatables/dataTables.bootstrap4.min.css">
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
              <!-- <h1>Data Absensi</h1> -->
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

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Daftar Absensi Karyawan</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-13 text-right">
                 <form action="" method="post" enctype="multipart/form-data">
                  <?php echo anchor(site_url('tbl_detail_absen/create'),'+Tambah', 'class="btn btn-primary"'); ?>
                </div>
              </div>
              <!-- <div class="col-md-4 text-left">
                <div class="form-group">
                 <select name="bulan" id="bulan" class="form-control form-control-sm">
                  <option value="">--Pilih Bulan--</option>
                  <?php foreach($bulan as $row) { ?>
                    <option value="<?php echo $row['id_bulan'] ?>"><?php echo $row['bulan'] ?></option>
                  <?php } ?>
                </select>  
              </div>
            </div>
            <div class="col-md-4 text-left">
              <div class="form-group">
               <select name="tahun" id="tahun" class="form-control form-control-sm">
                <option value="">--Pilih Tahun--</option>
                <?php foreach($tahun as $row) { ?>
                  <option value="<?php echo $row['id_tahun'] ?>"><?php echo $row['tahun'] ?></option>
                <?php } ?>
              </select>  
            </div>
          </div> -->
          <div class="col-md-4 text-center">
            <div style="margin-top: 8px" id="message">
              <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
          </div>
          <table id="example1" class="table table-bordered" >
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Absen</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Keterangan</th>
                <th style="text-align:center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($tbl_detail_absen_data as $tbl_detail_absen)
              {
                ?>
                <tr>
                 <td width="80px"><?php echo ++$start ?></td>
                 <td><?php echo $tbl_detail_absen->nama_kyn?></td>
                 <td><?php echo $tbl_detail_absen->j_absen ?></td>
                 <td><?php echo date("d-m-Y", strtotime($tbl_detail_absen->tgl));?></td>
                 <td><?php echo $tbl_detail_absen->jam ?></td>
                 <td><?php echo $tbl_detail_absen->keterangan ?></td>
                 <td style="text-align:center" width="100px">
                 <a href="<?php echo site_url('tbl_detail_absen/read/'.$tbl_detail_absen->id_kyn) ?>"><i class="fa fa-info"></i></a> |
                 <a onClick="return confirm('Anda Yakin ingin Menghapusnya?')" href="<?php echo site_url('tbl_detail_absen/delete/'.$tbl_detail_absen->id_kyn) ?>"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
        <div class="row">
          <div class="col-md-6">
            <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
            <?php echo anchor(site_url('tbl_detail_absen/excel'), 'Excel', 'class="btn btn-primary"'); ?>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.0.0-alpha
  </div>
  <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
  reserved.
</footer>

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
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
