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
        <h2 style="margin-top:0px">T38_status <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
    	    <div class="form-group">
                <label for="varchar">Status <?php echo form_error('Status') ?></label>
                <input type="text" class="form-control" name="Status" id="Status" placeholder="Status" value="<?php echo $Status; ?>" />
            </div>
    	    <input type="hidden" name="idstatus" value="<?php echo $idstatus; ?>" />
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    	    <a href="<?php echo site_url('_38_status') ?>" class="btn btn-default">Cancel</a>
    	</form>
    <!-- </body>
</html> -->
