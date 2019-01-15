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
              <h1>Data Master</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Master</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-5">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Jabatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- <div class="card-body">
              </div> -->
              <div class="col-md-7 text-center">
                <div style="margin-top: 8px" id="message">
                  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
              </div>
              <table class="table table-bordered">
                <tr>
                  <th width="100px">No</th>
                  <!-- <th>Kode Jabatan</th> -->
                  <th width="150px">Jabatan</th>
                  <th width="150px">Action</th>
                  </tr><?php
                  foreach ($tbl_jabatan_data as $tbl_jabatan)
                  {
                    ?>
                    <tr>
                     <td><?php echo ++$start ?></td>
                     <!-- <td><?php echo $tbl_jabatan->kd_jabatan ?></td> -->
                     <td><?php echo $tbl_jabatan->jabatan ?></td>
                     <td style="text-align:center">
                      <?php 
                    // echo anchor(site_url('tbl_jabatan/read/'.$tbl_jabatan->kd_jabatan),' ', 'class="fa fa-info"'); 
                    // echo ' | '; 
                      echo anchor(site_url('tbl_jabatan/update/'.$tbl_jabatan->kd_jabatan),' ', 'class="fa fa-edit"'); 
                      echo ' | '; 
                      echo anchor(site_url('tbl_jabatan/delete/'.$tbl_jabatan->kd_jabatan),' ', 'class="fa fa-trash"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                      ?>
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Jabatan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <form role ="form" action="http://localhost/ci_adminlte/tbl_jabatan/create_action" method="post">
               <div class="form-group">
                <label for="varchar">Jabatan </label>
                <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="">
              </div>
              <input type="hidden" name="kd_jabatan" value=""> 
              <button type="submit" class="btn btn-primary">Tambah</button> 
              <a href="http://localhost/ci_adminlte/tbl_jabatan" class="btn btn-default">Cancel</a>
            </form>
          </div>
        </div>   
        <!-- /.card -->
      </div>
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
