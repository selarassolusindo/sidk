<!-- <!doctype html>
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
        <h2 style="margin-top:0px">T45_desa <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
    	    <!-- <div class="form-group">
                <label for="varchar">Kecamatan Id <?php echo form_error('kecamatan_id') ?></label>
                <input type="text" class="form-control" name="kecamatan_id" id="kecamatan_id" placeholder="Kecamatan Id" value="<?php echo $kecamatan_id; ?>" />
            </div> -->
            <div class="form-group">
                <label>Kecamatan <?php echo form_error('kecamatan_id') ?></label>
                <select name="kecamatan_id" class="form-control">
    				<option value="">Kecamatan</option>
    				<?php
    				foreach($kecamatan_data as $kecamatan)
    				{
    					$selected = ($kecamatan->id == $kecamatan_id) ? ' selected="selected"' : "";

    					echo '<option value="'.$kecamatan->id.'" '.$selected.'>'.$kecamatan->nama . '</option>';
    				}
    				?>
    			</select>
            </div>
    	    <div class="form-group">
                <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
            </div>
    	    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    	    <a href="<?php echo site_url('_45_desa') ?>" class="btn btn-default">Cancel</a>
    	</form>
    <!-- </body>
</html> -->
