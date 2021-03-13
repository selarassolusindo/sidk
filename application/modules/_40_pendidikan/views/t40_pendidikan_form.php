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
        <h2 style="margin-top:0px">T40_pendidikan <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
    	    <div class="form-group">
                <label for="varchar">Pendidikan <?php echo form_error('Pendidikan') ?></label>
                <input type="text" class="form-control" name="Pendidikan" id="Pendidikan" placeholder="Pendidikan" value="<?php echo $Pendidikan; ?>" />
            </div>
    	    <input type="hidden" name="idpendidikan" value="<?php echo $idpendidikan; ?>" />
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    	    <a href="<?php echo site_url('_40_pendidikan') ?>" class="btn btn-default">Cancel</a>
    	</form>
    <!-- </body>
</html> -->
