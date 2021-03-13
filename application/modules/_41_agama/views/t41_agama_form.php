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
        <h2 style="margin-top:0px">T41_agama <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
    	    <div class="form-group">
                <label for="varchar">Agama <?php echo form_error('Agama') ?></label>
                <input type="text" class="form-control" name="Agama" id="Agama" placeholder="Agama" value="<?php echo $Agama; ?>" />
            </div>
    	    <input type="hidden" name="idagama" value="<?php echo $idagama; ?>" />
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    	    <a href="<?php echo site_url('_41_agama') ?>" class="btn btn-default">Cancel</a>
    	</form>
    <!-- </body>
</html> -->
