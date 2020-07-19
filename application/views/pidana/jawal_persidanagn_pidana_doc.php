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
        <h2>Jawal_persidanagn_pidana List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nomor Perkara</th>
		<th>Terdakwa</th>
		<th>Hakim</th>
		<th>Pp</th>
		<th>Jpu</th>
		<th>Agenda</th>
		
            </tr><?php
            foreach ($pidana_data as $pidana)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pidana->nomor_perkara ?></td>
		      <td><?php echo $pidana->terdakwa ?></td>
		      <td><?php echo $pidana->hakim ?></td>
		      <td><?php echo $pidana->pp ?></td>
		      <td><?php echo $pidana->jpu ?></td>
		      <td><?php echo $pidana->agenda ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>