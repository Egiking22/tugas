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
        <h2>Jadwal_persidangan_perdata List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nomor Perkara</th>
		<th>Pihak</th>
		<th>Hakim</th>
		<th>Pp</th>
		<th>Keterngan</th>
		
            </tr><?php
            foreach ($perdata_data as $perdata)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $perdata->nomor_perkara ?></td>
		      <td><?php echo $perdata->pihak ?></td>
		      <td><?php echo $perdata->hakim ?></td>
		      <td><?php echo $perdata->pp ?></td>
		      <td><?php echo $perdata->keterngan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>