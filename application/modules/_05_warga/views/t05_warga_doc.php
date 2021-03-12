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
        <h2>T05_warga List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NKK</th>
		<th>NoUrut</th>
		<th>NIK</th>
		<th>Nama</th>
		<th>Idagama</th>
		<th>Idwn</th>
		<th>TempatLahir</th>
		<th>TanggalLahir</th>
		<th>Pendidikan</th>
		<th>OrangTua</th>
		<th>Darah</th>
		<th>Idusers</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($_05_warga_data as $_05_warga)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $_05_warga->NKK ?></td>
		      <td><?php echo $_05_warga->NoUrut ?></td>
		      <td><?php echo $_05_warga->NIK ?></td>
		      <td><?php echo $_05_warga->Nama ?></td>
		      <td><?php echo $_05_warga->idagama ?></td>
		      <td><?php echo $_05_warga->idwn ?></td>
		      <td><?php echo $_05_warga->TempatLahir ?></td>
		      <td><?php echo $_05_warga->TanggalLahir ?></td>
		      <td><?php echo $_05_warga->Pendidikan ?></td>
		      <td><?php echo $_05_warga->OrangTua ?></td>
		      <td><?php echo $_05_warga->Darah ?></td>
		      <td><?php echo $_05_warga->idusers ?></td>
		      <td><?php echo $_05_warga->created_at ?></td>
		      <td><?php echo $_05_warga->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>