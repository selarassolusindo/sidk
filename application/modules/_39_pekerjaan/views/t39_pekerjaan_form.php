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
        <h2 style="margin-top:0px">T39_pekerjaan <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
    	    <div class="form-group">
                <label for="varchar">Pekerjaan <?php echo form_error('Pekerjaan') ?></label>
                <input type="text" class="form-control" name="Pekerjaan" id="Pekerjaan" placeholder="Pekerjaan" value="<?php echo $Pekerjaan; ?>" />
            </div>
    	    <input type="hidden" name="idpekerjaan" value="<?php echo $idpekerjaan; ?>" />
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    	    <a href="<?php echo site_url('_39_pekerjaan') ?>" class="btn btn-default">Cancel</a>
    	</form>
    <!-- </body>
</html> -->
