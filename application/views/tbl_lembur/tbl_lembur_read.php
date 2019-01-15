<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Master</title>
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
              <h1>Detail Lembur</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/dashboard1">Home</a></li>
                <li class="breadcrumb-item active">Data Lembur</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="container">
       <div class="card-body">
        <table class="table">
         <tr><td>Nama Karyawan</td><td><?php echo $nama_kyn; ?></td></tr>
         <tr><td>PIC</td><td><?php echo $PIC; ?></td></tr>
         <tr><td>Approval</td><td><?php echo $approval; ?></td></tr>
         <tr><td>Task</td><td><?php echo $Task; ?></td></tr>
         <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
         <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
         <tr><td></td><td><a href="<?php echo site_url('tbl_lembur') ?>" class="btn btn-default">Cancel</a></td></tr>
       </table>
     </div>
   </div>
 </div>
 <?php $this->load->view('template/_footer.php') ;?>

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