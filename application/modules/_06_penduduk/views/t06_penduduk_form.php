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
        <h2 style="margin-top:0px">T06_penduduk <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="tinyint">NoUrut <?php echo form_error('NoUrut') ?></label>
            <input type="text" class="form-control" name="NoUrut" id="NoUrut" placeholder="NoUrut" value="<?php echo $NoUrut; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('Nama') ?></label>
            <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama" value="<?php echo $Nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NIK <?php echo form_error('NIK') ?></label>
            <input type="text" class="form-control" name="NIK" id="NIK" placeholder="NIK" value="<?php echo $NIK; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">JenisKelamin <?php echo form_error('JenisKelamin') ?></label>
            <input type="text" class="form-control" name="JenisKelamin" id="JenisKelamin" placeholder="JenisKelamin" value="<?php echo $JenisKelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">TempatLahir <?php echo form_error('TempatLahir') ?></label>
            <input type="text" class="form-control" name="TempatLahir" id="TempatLahir" placeholder="TempatLahir" value="<?php echo $TempatLahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">TanggalLahir <?php echo form_error('TanggalLahir') ?></label>
            <input type="text" class="form-control" name="TanggalLahir" id="TanggalLahir" placeholder="TanggalLahir" value="<?php echo $TanggalLahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Agama <?php echo form_error('Agama') ?></label>
            <input type="text" class="form-control" name="Agama" id="Agama" placeholder="Agama" value="<?php echo $Agama; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Pendidikan <?php echo form_error('Pendidikan') ?></label>
            <input type="text" class="form-control" name="Pendidikan" id="Pendidikan" placeholder="Pendidikan" value="<?php echo $Pendidikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Pekerjaan <?php echo form_error('Pekerjaan') ?></label>
            <input type="text" class="form-control" name="Pekerjaan" id="Pekerjaan" placeholder="Pekerjaan" value="<?php echo $Pekerjaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">StatusKawin <?php echo form_error('StatusKawin') ?></label>
            <input type="text" class="form-control" name="StatusKawin" id="StatusKawin" placeholder="StatusKawin" value="<?php echo $StatusKawin; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">HubunganKeluarga <?php echo form_error('HubunganKeluarga') ?></label>
            <input type="text" class="form-control" name="HubunganKeluarga" id="HubunganKeluarga" placeholder="HubunganKeluarga" value="<?php echo $HubunganKeluarga; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">WargaNegara <?php echo form_error('WargaNegara') ?></label>
            <input type="text" class="form-control" name="WargaNegara" id="WargaNegara" placeholder="WargaNegara" value="<?php echo $WargaNegara; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NoPaspor <?php echo form_error('NoPaspor') ?></label>
            <input type="text" class="form-control" name="NoPaspor" id="NoPaspor" placeholder="NoPaspor" value="<?php echo $NoPaspor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NoKitasKitap <?php echo form_error('NoKitasKitap') ?></label>
            <input type="text" class="form-control" name="NoKitasKitap" id="NoKitasKitap" placeholder="NoKitasKitap" value="<?php echo $NoKitasKitap; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NamaAyah <?php echo form_error('NamaAyah') ?></label>
            <input type="text" class="form-control" name="NamaAyah" id="NamaAyah" placeholder="NamaAyah" value="<?php echo $NamaAyah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NamaIbu <?php echo form_error('NamaIbu') ?></label>
            <input type="text" class="form-control" name="NamaIbu" id="NamaIbu" placeholder="NamaIbu" value="<?php echo $NamaIbu; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idinduk <?php echo form_error('idinduk') ?></label>
            <input type="text" class="form-control" name="idinduk" id="idinduk" placeholder="Idinduk" value="<?php echo $idinduk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idkk <?php echo form_error('idkk') ?></label>
            <input type="text" class="form-control" name="idkk" id="idkk" placeholder="Idkk" value="<?php echo $idkk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Iduser <?php echo form_error('iduser') ?></label>
            <input type="text" class="form-control" name="iduser" id="iduser" placeholder="Iduser" value="<?php echo $iduser; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div>
	    <input type="hidden" name="idpenduduk" value="<?php echo $idpenduduk; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('_06_penduduk') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>