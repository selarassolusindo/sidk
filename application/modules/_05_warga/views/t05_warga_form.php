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
        <h2 style="margin-top:0px">T05_warga <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NKK <?php echo form_error('NKK') ?></label>
            <input type="text" class="form-control" name="NKK" id="NKK" placeholder="NKK" value="<?php echo $NKK; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">NoUrut <?php echo form_error('NoUrut') ?></label>
            <input type="text" class="form-control" name="NoUrut" id="NoUrut" placeholder="NoUrut" value="<?php echo $NoUrut; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NIK <?php echo form_error('NIK') ?></label>
            <input type="text" class="form-control" name="NIK" id="NIK" placeholder="NIK" value="<?php echo $NIK; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('Nama') ?></label>
            <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama" value="<?php echo $Nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Idagama <?php echo form_error('idagama') ?></label>
            <input type="text" class="form-control" name="idagama" id="idagama" placeholder="Idagama" value="<?php echo $idagama; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Idwn <?php echo form_error('idwn') ?></label>
            <input type="text" class="form-control" name="idwn" id="idwn" placeholder="Idwn" value="<?php echo $idwn; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">TempatLahir <?php echo form_error('TempatLahir') ?></label>
            <input type="text" class="form-control" name="TempatLahir" id="TempatLahir" placeholder="TempatLahir" value="<?php echo $TempatLahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">TanggalLahir <?php echo form_error('TanggalLahir') ?></label>
            <input type="text" class="form-control" name="TanggalLahir" id="TanggalLahir" placeholder="TanggalLahir" value="<?php echo $TanggalLahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pendidikan <?php echo form_error('Pendidikan') ?></label>
            <input type="text" class="form-control" name="Pendidikan" id="Pendidikan" placeholder="Pendidikan" value="<?php echo $Pendidikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">OrangTua <?php echo form_error('OrangTua') ?></label>
            <input type="text" class="form-control" name="OrangTua" id="OrangTua" placeholder="OrangTua" value="<?php echo $OrangTua; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Darah <?php echo form_error('Darah') ?></label>
            <input type="text" class="form-control" name="Darah" id="Darah" placeholder="Darah" value="<?php echo $Darah; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="tinyint">Idusers <?php echo form_error('idusers') ?></label>
            <input type="text" class="form-control" name="idusers" id="idusers" placeholder="Idusers" value="<?php echo $idusers; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div> -->
	    <input type="hidden" name="idwarga" value="<?php echo $idwarga; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('_05_warga') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
