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
        <h2 style="margin-top:0px">T05_warga List</h2> -->


        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('_05_warga/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('_05_warga/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('_05_warga'); ?>" class="btn btn-default">Reset</a>
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
                                <th>No.</th>
                        		<th>No. KK</th>
                        		<th>NIK</th>
                        		<th>Nama</th>
                        		<th>Agama</th>
                        		<th>Kewarganegaraan</th>
                        		<th>Tempat Lahir</th>
                        		<th>Tgl. Lahir</th>
                        		<th>Pendidikan</th>
                        		<th>Nama Orang Tua</th>
                        		<th>Gol. Darah</th>
                        		<th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($_05_warga_data as $_05_warga)
                            {
                                ?>
                                <tr>
                        			<td width="80px"><?php echo ++$start ?></td>
                        			<td><?php echo $_05_warga->NKK ?></td>
                        			<td><?php echo $_05_warga->NIK ?></td>
                        			<td><?php echo $_05_warga->Nama ?></td>
                        			<td><?php echo $_05_warga->idagama ?></td>
                        			<td><?php echo $_05_warga->idwn ?></td>
                        			<td><?php echo $_05_warga->TempatLahir ?></td>
                        			<td><?php echo $_05_warga->TanggalLahir ?></td>
                        			<td><?php echo $_05_warga->Pendidikan ?></td>
                        			<td><?php echo $_05_warga->OrangTua ?></td>
                        			<td><?php echo $_05_warga->Darah ?></td>
                        			<td style="text-align:center" width="200px">
                        				<?php
                        				echo anchor(site_url('_05_warga/read/'.$_05_warga->idwarga),'Read');
                        				echo ' | ';
                        				echo anchor(site_url('_05_warga/update/'.$_05_warga->idwarga),'Update');
                        				echo ' | ';
                        				echo anchor(site_url('_05_warga/delete/'.$_05_warga->idwarga),'Delete','onclick="return confirm(\'Are You Sure ?\')"');
                        				?>
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
        		<?php echo anchor(site_url('_05_warga/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        		<?php echo anchor(site_url('_05_warga/word'), 'Word', 'class="btn btn-primary"'); ?>
    	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
