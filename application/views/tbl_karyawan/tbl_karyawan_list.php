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
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/plugins/iCheck/all.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- jQuery -->
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/plugins/jquery/jquery.js"></script>
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
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Karyawan</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php echo form_open('tbl_karyawan/deleteAll');?>
              
                <p><?php echo anchor(site_url('tbl_karyawan/create'),'Tambah', 'class="btn btn-primary"'); ?></p>
              </div>
              <input type="submit" value="Delete" onclick="return confirm('are you sure')"/>
              <div class="card-body">
                <div class="row">
                  <div class="col-2">
                    <label for="">From Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                      <input type="date" name="fromdate" class="form-control">
                    </div>
                  </div>
                  <div class="col-2">
                    <label for="">To Date</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                      <input type="date" name="todate" class="form-control">
                    </div>
                  </div>
                  <div class="col-2">
                    <label for="">Jenis kelamin</label>
                    <select class="form-control form-control-sm" name="j_kel" >
                      <option value=''>--Pilih Jenis Kelamin--</option>
                      <?php foreach($j_kel as $row) { ?>
                        <option value="<?php echo $row['jenis'] ?>">
                          <?php echo $row['jenis'] ?>
                        </option>
                      <?php } ?>
                    </select><br>
                    <button class="btn btn-primary" type="submit" name="filter">Filter</button>
                    <?php if(isset($_POST['filter'])){
                      header('location: tbl_karyawan?jenis_kelamin='.$_POST['j_kel']."&fromdate=".$_POST['fromdate']."&todate=".$_POST['todate']);
                    } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-4 text-left">
                <div id="message">
                  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
              </div>
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                  <th><input type="checkbox" id="check-all"></th>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th style="text-align:center; ">Foto</th>
                    <th style="text-align:center; ">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  foreach ($tbl_karyawan_data as $tbl_karyawan)
                  {
                    ?>
                    <tr>
                    <td><input type='checkbox' class='check-item' name='nik[]' value="<?php echo $tbl_karyawan->nik ?>"></td>
                      <td width="30px"><?php echo ++$start ?></td>
                      <td><?php echo $tbl_karyawan->nik ?></td>
                      <td width="150px"><?php echo $tbl_karyawan->nama_kyn ?></td>
                      <td><?php echo date("d-m-Y", strtotime($tbl_karyawan->tgl_lahir));?></td>
                      <td><?php echo $tbl_karyawan->j_kel ?></td>
                      <td><?php echo $tbl_karyawan->alamat ?></td>
                      <td><center><img src="<?=base_url('assets/img/'.$tbl_karyawan->foto)?>" style="width:75px; height:75"></center></td>
                      <td style="text-align:center" width="100px">
                      <a href="<?php echo site_url('tbl_karyawan/read/'.$tbl_karyawan->nik) ?>"><i class="fa fa-info"></i></a> |
                      <a href="<?php echo site_url('tbl_karyawan/update/'.$tbl_karyawan->nik) ?>"><i class="fa fa-edit"></i></a> |
                      <a onClick="return confirm('Anda Yakin ingin Menghapusnya?')" href="<?php echo site_url('tbl_karyawan/delete/'.$tbl_karyawan->nik) ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
              <?php echo form_close();?>
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
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/plugins/iCheck/icheck.min.js"></script>

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

    $("#check-all").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
    });


  });
</script>
</body>
</html>