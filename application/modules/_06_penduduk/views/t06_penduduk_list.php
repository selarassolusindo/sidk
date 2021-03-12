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
        <h2 style="margin-top:0px">T06_penduduk List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('_06_penduduk/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('_06_penduduk/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('_06_penduduk'); ?>" class="btn btn-default">Reset</a>
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
                            		<!-- <th>NoUrut</th> -->
                            		<th>Nama</th>
                            		<th>NIK</th>
                            		<!-- <th>JenisKelamin</th>
                            		<th>TempatLahir</th>
                            		<th>TanggalLahir</th>
                            		<th>Agama</th>
                            		<th>Pendidikan</th>
                            		<th>Pekerjaan</th>
                            		<th>StatusKawin</th>
                            		<th>HubunganKeluarga</th>
                            		<th>WargaNegara</th>
                            		<th>NoPaspor</th>
                            		<th>NoKitasKitap</th>
                            		<th>NamaAyah</th>
                            		<th>NamaIbu</th>
                            		<th>Idinduk</th>
                            		<th>Idkk</th>
                            		<th>Iduser</th>
                            		<th>Created At</th>
                            		<th>Updated At</th> -->
                            		<th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($_06_penduduk_data as $_06_penduduk)
                                {
                                ?>
                                <tr>
                        			<td width="80px"><?php echo ++$start ?></td>
                        			<!-- <td><?php echo $_06_penduduk->NoUrut ?></td> -->
                        			<td><?php echo $_06_penduduk->Nama ?></td>
                        			<td><?php echo $_06_penduduk->NIK ?></td>
                        			<!-- <td><?php echo $_06_penduduk->JenisKelamin ?></td>
                        			<td><?php echo $_06_penduduk->TempatLahir ?></td>
                        			<td><?php echo $_06_penduduk->TanggalLahir ?></td>
                        			<td><?php echo $_06_penduduk->Agama ?></td>
                        			<td><?php echo $_06_penduduk->Pendidikan ?></td>
                        			<td><?php echo $_06_penduduk->Pekerjaan ?></td>
                        			<td><?php echo $_06_penduduk->StatusKawin ?></td>
                        			<td><?php echo $_06_penduduk->HubunganKeluarga ?></td>
                        			<td><?php echo $_06_penduduk->WargaNegara ?></td>
                        			<td><?php echo $_06_penduduk->NoPaspor ?></td>
                        			<td><?php echo $_06_penduduk->NoKitasKitap ?></td>
                        			<td><?php echo $_06_penduduk->NamaAyah ?></td>
                        			<td><?php echo $_06_penduduk->NamaIbu ?></td>
                        			<td><?php echo $_06_penduduk->idinduk ?></td>
                        			<td><?php echo $_06_penduduk->idkk ?></td>
                        			<td><?php echo $_06_penduduk->iduser ?></td>
                        			<td><?php echo $_06_penduduk->created_at ?></td>
                        			<td><?php echo $_06_penduduk->updated_at ?></td> -->
                        			<!-- <td style="text-align:center" width="200px">
                        				<?php
                        				echo anchor(site_url('_06_penduduk/read/'.$_06_penduduk->idpenduduk),'Read');
                        				echo ' | ';
                        				echo anchor(site_url('_06_penduduk/update/'.$_06_penduduk->idpenduduk),'Update');
                        				echo ' | ';
                        				echo anchor(site_url('_06_penduduk/delete/'.$_06_penduduk->idpenduduk),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                        				?>
                        			</td> -->
                                    <!-- <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btn-info btn-simple">
                                            <i class="material-icons">person</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td> -->
                                    <td class="td-actions text-right">
                                        <a href="<?php echo site_url('_06_penduduk/read/'.$_06_penduduk->idpenduduk); ?>" type="button" rel="tooltip" class="btn btn-info">
                                            <i class="material-icons">pageview</i>
                                        </a>
                                        <a href="<?php echo site_url('_06_penduduk/update/'.$_06_penduduk->idpenduduk); ?>" type="button" rel="tooltip" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="<?php echo site_url('_06_penduduk/delete/'.$_06_penduduk->idpenduduk); ?>" type="button" rel="tooltip" class="btn btn-danger" onclick="javascript: return confirm('Are You Sure ?')">
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
		<?php echo anchor(site_url('_06_penduduk/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('_06_penduduk/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
