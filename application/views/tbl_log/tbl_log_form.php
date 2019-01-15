<!doctype html>
<html>
<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <style>
    body{
        padding: 15px;
    }
</style>
</head>
<body>
    <h2 style="margin-top:0px">Tbl_log <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">
       <div class="form-group">
        <label for="varchar">Nama Kyn <?php echo form_error('nama_kyn') ?></label>
        <input type="text" class="form-control" name="nama_kyn" id="nama_kyn" placeholder="Nama Kyn" value="<?php echo $nama_kyn; ?>" />
    </div>
    <div class="form-group">
        <label for="datetime">Tgl <?php echo form_error('tgl') ?></label>
        <input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
    </div>
    <div class="form-group">
        <label for="time">Log Masuk <?php echo form_error('log_masuk') ?></label>
        <input type="text" class="form-control" name="log_masuk" id="log_masuk" placeholder="Log Masuk" value="<?php echo $log_masuk; ?>" />
    </div>
    <div class="form-group">
        <label for="time">Log Keluar <?php echo form_error('log_keluar') ?></label>
        <input type="text" class="form-control" name="log_keluar" id="log_keluar" placeholder="Log Keluar" value="<?php echo $log_keluar; ?>" />
    </div>
    <input type="hidden" name="id_kyn" value="<?php echo $id_kyn; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('tbl_log') ?>" class="btn btn-default">Cancel</a>
</form>
</body>
</html>