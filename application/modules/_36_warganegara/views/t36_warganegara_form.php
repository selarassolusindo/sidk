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
        <h2 style="margin-top:0px">T36_warganegara <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
    	    <div class="form-group">
                <label for="varchar">Warga Negara <?php echo form_error('WargaNegara') ?></label>
                <input type="text" class="form-control" name="WargaNegara" id="WargaNegara" placeholder="WargaNegara" value="<?php echo $WargaNegara; ?>" />
            </div>
    	    <input type="hidden" name="idwarganegara" value="<?php echo $idwarganegara; ?>" />
    	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    	    <a href="<?php echo site_url('_36_warganegara') ?>" class="btn btn-default">Cancel</a>
    	</form>
    <!-- </body>
</html> -->
