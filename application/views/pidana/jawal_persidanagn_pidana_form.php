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
        <h2 style="margin-top:0px">Jawal persidangan pidana <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nomor Perkara <?php echo form_error('nomor_perkara') ?></label>
            <input type="text" class="form-control" name="nomor_perkara" id="nomor_perkara" placeholder="Nomor Perkara" value="<?php echo $nomor_perkara; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Terdakwa <?php echo form_error('terdakwa') ?></label>
            <input type="text" class="form-control" name="terdakwa" id="terdakwa" placeholder="Terdakwa" value="<?php echo $terdakwa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hakim <?php echo form_error('hakim') ?></label>
            <input type="text" class="form-control" name="hakim" id="hakim" placeholder="Hakim" value="<?php echo $hakim; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pp <?php echo form_error('pp') ?></label>
            <input type="text" class="form-control" name="pp" id="pp" placeholder="Pp" value="<?php echo $pp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jpu <?php echo form_error('jpu') ?></label>
            <input type="text" class="form-control" name="jpu" id="jpu" placeholder="Jpu" value="<?php echo $jpu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Agenda <?php echo form_error('agenda') ?></label>
            <input type="text" class="form-control" name="agenda" id="agenda" placeholder="Agenda" value="<?php echo $agenda; ?>" />
        </div>
	    <input type="hidden" name="no" value="<?php echo $no; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pidana') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->