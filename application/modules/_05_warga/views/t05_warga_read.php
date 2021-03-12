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
        <h2 style="margin-top:0px">T05_warga Read</h2>
        <table class="table">
	    <tr><td>NKK</td><td><?php echo $NKK; ?></td></tr>
	    <tr><td>NoUrut</td><td><?php echo $NoUrut; ?></td></tr>
	    <tr><td>NIK</td><td><?php echo $NIK; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
	    <tr><td>Idagama</td><td><?php echo $idagama; ?></td></tr>
	    <tr><td>Idwn</td><td><?php echo $idwn; ?></td></tr>
	    <tr><td>TempatLahir</td><td><?php echo $TempatLahir; ?></td></tr>
	    <tr><td>TanggalLahir</td><td><?php echo $TanggalLahir; ?></td></tr>
	    <tr><td>Pendidikan</td><td><?php echo $Pendidikan; ?></td></tr>
	    <tr><td>OrangTua</td><td><?php echo $OrangTua; ?></td></tr>
	    <tr><td>Darah</td><td><?php echo $Darah; ?></td></tr>
	    <tr><td>Idusers</td><td><?php echo $idusers; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('_05_warga') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>