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
        <h2 style="margin-top:0px">T37_hubungan <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
    	    <div class="form-group">
                <label for="varchar">Hubungan <?php echo form_error('Hubungan') ?></label>
                <input type="text" class="form-control" name="Hubungan" id="Hubungan" placeholder="Hubungan" value="<?php echo $Hubungan; ?>" />
            </div>
    	    <input type="hidden" name="idhubungan" value="<?php echo $idhubungan; ?>" />
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    	    <a href="<?php echo site_url('_37_hubungan') ?>" class="btn btn-default">Cancel</a>
    	</form>
    <!-- </body>
</html> -->
