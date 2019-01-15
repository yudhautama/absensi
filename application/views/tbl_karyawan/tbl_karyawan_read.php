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
              <h1>Detail Karyawan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url()?>index.php/dashboard1">Home</a></li>
                <li class="breadcrumb-item active">Data Karyawan</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <img src="<?=base_url('assets/img/'.$foto)?>" style="width:100px; height:150"><br><br>
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="card card-info">
                <div class="card-header">
                <h3 class="card-title">Data Personal </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">NIK</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $nik; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $nama_kyn; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $t4_lahir; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $tgl_lahir; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $j_kel; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">Alamat</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $alamat; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">No. Telepon</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $no_tlp; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">Email</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $email; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">Jabatan</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $jabatan; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">Join Date</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $join_date; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">End Date</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php if ($end_date==0) {
                          echo "Present";
                        } ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">Status Nikah</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $stat_kwn; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-5 col-form-label">Status Kepegawaian</label>
                      <div class="col-sm-20">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $status; ?>">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-8">
              <!-- Horizontal Form -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Data Pendidikan <a href="<?php echo site_url('tbl_pendidikan/create') ?>"> <i class="fa fa-pencil"></i></a></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <table class="table table-hover">
                      <tr>
                        <th>Tingkat Pendidikan</th>
                        <th Width=100px>Nama Sekolah</th>
                        <th>Jurusan</th>
                        <th>Tahun Masuk</th>
                        <th>Tahun Lulus</th>
                        <th>Action</th>
                      </tr>
                      <?php 
                      $query=$this->Tbl_karyawan_model->pendidikan($nik);
                      foreach ($query->result() as $row){
                        ?>
                        <tr> 
                          <td><?php echo $row->tingk_pend; ?></td>
                          <td><?php echo $row->nama_sekolah; ?></td>
                          <td><?php echo $row->jurusan; ?></td>
                          <td><?php echo $row->tahun_masuk; ?></td>
                          <td><?php echo $row->tahun_lulus; ?></td>
                          <td>
                          <a href="<?php echo site_url('tbl_pendidikan/update/'.$row->id_kyn) ?>"><i class="fa fa-edit"></i></a>
                          <a onClick="return confirm('Anda Yakin ingin Menghapusnya?')" href="<?php echo site_url('tbl_pendidikan/delete/'.$row->id_kyn) ?>"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                      <?php }?>
                    </table>
                    <!-- /.card-body -->
                    <!-- /.card-footer -->
                    
                  </div>
                </div>
                <div class="col-md-20">
                  <!-- Horizontal Form -->
                  <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Data Keluarga <a href="<?php echo site_url('tbl_keluarga/create') ?>"> <i class="fa fa-pencil"></i></a></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                      <div class="card-body">
                        <table class="table table-hover">
                          <tr>
                            <th>Nama Anggota Keluarga</th>
                            <th>Hubungan Dalam Keluarga</th>
                            <th>Action</th>

                          </tr>
                          <?php 
                          $query=$this->Tbl_karyawan_model->keluarga($nik);
                          foreach ($query->result() as $row){
                            ?>
                            <tr> 
                              <td><?php echo $row->nama_klg; ?></td>
                              <td><?php echo $row->hubungan; ?></td>
                              <td>
                              <a href="<?php echo site_url('tbl_keluarga/update/'.$row->id_kyn) ?>"><i class="fa fa-edit"></i></a>
                              <a onClick="return confirm('Anda Yakin ingin Menghapusnya?')" href="<?php echo site_url('tbl_keluarga/delete/'.$row->id_kyn) ?>"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            <?php }?>
                        </table>
                          <!-- /.card-body -->
                          <!-- /.card-footer -->
                      </form>
                      </div>
                    </div>
                    <!--/.col (right) -->
                  </div>
                  <!-- /.row -->
                </div><!-- /.container-fluid -->
              </section>
              <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
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