<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Karyawan</title>
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
              <h1>Data Karyawan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Karyawan</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
<!-- 
  <div class="container"> -->
    <form action="<?php echo $action; ?>" method="post">

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Edit <?= $nama_kyn?></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="varchar">Nama <?php echo form_error('nama_kyn') ?></label>
                      <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" name="nama_kyn" id="nama_kyn" placeholder="Nama" value="<?php echo $nama_kyn; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="varchar">Tempat Lahir <?php echo form_error('t4_lahir') ?></label>
                      <input type="text" class="form-control form-control-sm" name="t4_lahir" id="t4_lahir" placeholder="Tempat Lahir" value="<?php echo $t4_lahir; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="date">Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
                      <input type="date" class="form-control form-control-sm" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
                    </div>
                    <div class="form-group">
                     <label for="varchar">Jenis Kelamin <?php echo form_error('j_kel') ?></label>
                     <select class="form-control form-control-sm" name="j_kel" id="j_kel" placeholder="Jenis Kelamin" >
                       <option>--Pilih Jenis Kelamin--</option>
                       <?php foreach($jenis_kelamin as $row) { ?>
                        <option value="<?php echo $row['jenis'] ?>" <?php if($j_kel){if($j_kel == $row['jenis']){echo 'selected'; } } ?>><?php echo $row['jenis'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                    <textarea class="form-control form-control-sm" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="int">No. Telepon <?php echo form_error('no_tlp') ?></label>
                    <input type="text" class="form-control form-control-sm" name="no_tlp" id="no_tlp" placeholder="No Telepon" value="<?php echo $no_tlp; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Email <?php echo form_error('no_tlp') ?></label>
                    <input type="text" class="form-control form-control-sm" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="">Jabatan <?php echo form_error('jabatan') ?></label>
                    <select class="form-control form-control-sm" name="jabatan">
                      <option>--Pilih Jabatan--</option>
                      <?php foreach($select_jabatan as $row) { ?>
                        <option value="<?php echo $row['jabatan'] ?>" <?php if($jabatan){if($jabatan == $row['jabatan']){echo 'selected'; } } ?>><?php echo $row['jabatan'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="date">Join Date <?php echo form_error('join_date') ?></label>
                    <input type="date" class="form-control form-control-sm" name="join_date" id="join_date" placeholder="Join Date" value="<?php echo $join_date; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="date">End Date <?php echo form_error('end_date') ?></label>
                    <input type="text" class="form-control form-control-sm" name="end_date" id="end_date" placeholder="End Date" value="<?php if ($end_date==0) {
                          echo "Present";
                        } ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Status Kepegawaian <?php echo form_error('status') ?></label>
                    <select class="form-control form-control-sm" id="status" name="status" placeholder="status">
                      <option>--Pilih Status Pegawai--</option>
                      <?php foreach($stat_pegawai as $row) { ?>
                        <option value="<?php echo $row['peg'] ?>" <?php if($status){if($status == $row['peg']){echo 'selected'; } } ?>><?php echo $row['peg'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="varchar">Status Kawin <?php echo form_error('stat_kwn') ?></label>
                    <select class="form-control form-control-sm" id="stat_kwn" name="stat_kwn" placeholder="Status Kawin">
                      <option>--Pilih Status Nikah--</option>
                      <?php foreach($kawin as $row) { ?>
                        <option value="<?php echo $row['kawin'] ?>" <?php if($stat_kwn){if($stat_kwn == $row['kawin']){echo 'selected'; } } ?>><?php echo $row['kawin'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="varchar">Foto <?php echo form_error('foto') ?></label>
                    <input type="file" class="form-control form-control-sm" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
                    <img style="width:200px;height:100px" src="<?php echo base_url(); ?>assets/img/<?php echo $foto; ?>" class="img-circl" alt="User Image" />
                  </div>
                  <input type="hidden" name="nik" value="<?php echo $nik; ?>" />
                  <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                  <a href="<?php echo site_url('tbl_karyawan') ?>" class="btn btn-default">Batal</a>
                </div>
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
