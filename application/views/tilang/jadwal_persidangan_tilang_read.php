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
        <h2 style="margin-top:0px">Jadwal Persidangan Tilang</h2>
        <table class="table">
	    <tr><td>Nomor Perkara</td><td><?php echo $nomor_perkara; ?></td></tr>
	    <tr><td>Terdakwa</td><td><?php echo $terdakwa; ?></td></tr>
	    <tr><td>Hakim</td><td><?php echo $hakim; ?></td></tr>
	    <tr><td>Pp</td><td><?php echo $pp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tilang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->