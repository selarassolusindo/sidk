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
        <h2 style="margin-top:0px">T44_kecamatan <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
    	    <!-- <div class="form-group">
                <label for="varchar">Kabupaten Id <?php echo form_error('kabupaten_id') ?></label>
                <input type="text" class="form-control" name="kabupaten_id" id="kabupaten_id" placeholder="Kabupaten Id" value="<?php echo $kabupaten_id; ?>" />
            </div> -->
            <div class="form-group">
                <label>Kabupaten <?php echo form_error('kabupaten_id') ?></label>
                <select name="kabupaten_id" class="form-control">
    				<option value="">Kabupaten</option>
    				<?php
    				foreach($kabupaten_data as $kabupaten)
    				{
    					$selected = ($kabupaten->id == $kabupaten_id) ? ' selected="selected"' : "";

    					echo '<option value="'.$kabupaten->id.'" '.$selected.'>'.$kabupaten->nama . '</option>';
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
    	    <a href="<?php echo site_url('_44_kecamatan') ?>" class="btn btn-default">Cancel</a>
    	</form>
    <!-- </body>
</html> -->
