<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <div class="image">
          <img src="<?php echo base_url(); ?>assets/dist/img/header_111.jpg" alt="User Image">
        </div>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h2 style="margin-top:0px">Jawal persidangan pidana</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pidana/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pidana/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pidana'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nomor Perkara</th>
		<th>Terdakwa</th>
		<th>Hakim</th>
		<th>Pp</th>
		<th>Jpu</th>
		<th>Agenda</th>
		<th>Action</th>
            </tr><?php
            foreach ($pidana_data as $pidana)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pidana->nomor_perkara ?></td>
			<td><?php echo $pidana->terdakwa ?></td>
			<td><?php echo $pidana->hakim ?></td>
			<td><?php echo $pidana->pp ?></td>
			<td><?php echo $pidana->jpu ?></td>
			<td><?php echo $pidana->agenda ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pidana/read/'.$pidana->no),'Read'); 
				echo ' | '; 
				echo anchor(site_url('pidana/update/'.$pidana->no),'Update'); 
				echo ' | '; 
				echo anchor(site_url('pidana/delete/'.$pidana->no),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('pidana/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pidana/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->