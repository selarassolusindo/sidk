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
        <h2 style="margin-top:0px">T45_desa List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('_45_desa/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('_45_desa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('_45_desa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title "><?php echo $_caption; ?></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-shopping" style="margin-bottom: 10px">
                            <thead>
                                <tr>
                                    <th class="text-right">No.</th>
                            		<th>Kecamatan</th>
                            		<th>Nama</th>
                            		<th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($_45_desa_data as $_45_desa)
                                {
                                ?>
                                <tr>
                        			<td class="text-right" width="80px"><?php echo ++$start ?></td>
                        			<!-- <td><?php echo $_45_desa->kecamatan_id ?></td> -->
                                    <td><?php echo $_45_desa->namaKecamatan ?></td>
                        			<td><?php echo $_45_desa->nama ?></td>
                        			<!-- <td style="text-align:center" width="200px">
                        				<?php
                        				echo anchor(site_url('_45_desa/read/'.$_45_desa->id),'Read');
                        				echo ' | ';
                        				echo anchor(site_url('_45_desa/update/'.$_45_desa->id),'Update');
                        				echo ' | ';
                        				echo anchor(site_url('_45_desa/delete/'.$_45_desa->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                        				?>
                        			</td> -->
                                    <td class="td-actions text-right">
                                        <a href="<?php echo site_url('_45_desa/read/'.$_45_desa->id); ?>" type="button" rel="tooltip" class="btn btn-info">
                                            <i class="material-icons">pageview</i>
                                        </a>
                                        <a href="<?php echo site_url('_45_desa/update/'.$_45_desa->id); ?>" type="button" rel="tooltip" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="<?php echo site_url('_45_desa/delete/'.$_45_desa->id); ?>" type="button" rel="tooltip" class="btn btn-danger" onclick="javascript: return confirm('Are You Sure ?')">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                    		    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('_45_desa/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('_45_desa/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
