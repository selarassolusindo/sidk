<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T06_penduduk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NoUrut</th>
		<th>Nama</th>
		<th>NIK</th>
		<th>JenisKelamin</th>
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
		<th>Updated At</th>
		
            </tr><?php
            foreach ($_06_penduduk_data as $_06_penduduk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_06_penduduk->NoUrut ?></td>
		      <td><?php echo $_06_penduduk->Nama ?></td>
		      <td><?php echo $_06_penduduk->NIK ?></td>
		      <td><?php echo $_06_penduduk->JenisKelamin ?></td>
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
		      <td><?php echo $_06_penduduk->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>