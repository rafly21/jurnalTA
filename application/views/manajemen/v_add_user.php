  <!DOCTYPE html>
<html>
   <?php $this->load->view('manajemen/man_head')?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('manajemen/man_header')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('manajemen/man_leftbar')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Main content -->
      <head>
        <div class="bar">
          <section class="content-header">
            <h1>
              Tambah Pengelola
              <small>Manajemen Pengelola</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#"> Manajemen Pengelola</a></li>
              <li class="active">Tambah Pengelola</li>
            </ol>
          </section>
        </div>
      </head>

      <section class="content">


         <form class="form-horizontal" action="<?php echo base_url()?>tambah_pengelola/submit_user" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="inputusername" class="col-sm-2 control-label">Username : </label>
                        <div class="col-md-9">
                          <input class="form-control" name="inputusername" value="<?=set_value('inputusername')?>" placeholder="Username" type="text" required/>
                          <?php if(form_error('inputusername')) : ?>
                            <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo form_error('inputusername'); ?>
                            </div>
                          <?php endif ?>
                        </div>
                      </div>

                       <div class="form-group">
                        <label for="inputpassword" class="col-sm-2 control-label">Password : </label>
                        <div class="col-md-9">
                          <input class="form-control" name="inputpassword" value="<?=set_value('inputpassword')?>"placeholder="Password" type="password" required/>
                          <?php if(form_error('inputpassword')) : ?>
                            <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo form_error('inputpassword'); ?>
                            </div>
                          <?php endif ?>
                        </div>
                        </div>

        <!-- <input class="form-control" name="inputuser" type="hidden" value="auth" > -->

                       <div class="form-group">
                        <label for="inputnama" class="col-sm-2 control-label">Nama : </label>
                        <div class="col-md-9">
                          <input class="form-control" name="inputnama" value="<?=set_value('inputnama')?>" placeholder="Nama" type="text" required/>
                          <?php if(form_error('inputnama')) : ?>
                            <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo form_error('inputnama'); ?>
                            </div>
                          <?php endif ?>
                        </div>
                        </div>

                       <div class="form-group">
                        <label for="inputemail" class="col-sm-2 control-label">Email : </label>
                        <div class="col-md-9">
                          <input class="form-control" name="inputemail" value="<?=set_value('inputemail')?>" placeholder="Email" type="text" required/>
                          <?php if(form_error('inputemail')) : ?>
                            <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo form_error('inputemail'); ?>
                            </div>
                          <?php endif ?>

                         </div>
                        </div>

                        <div class="form-group">
                        <label for="inputtelepon" class="col-sm-2 control-label">Telepon : </label>
                        <div class="col-md-9">
                          <input class="form-control" name="inputtelepon" value="<?=set_value('inputtelepon')?>" placeholder="Telepon" type="text" required/>

                          <?php if(form_error('inputtelepon')) : ?>
                            <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo form_error('inputtelepon'); ?>
                            </div>
                          <?php endif ?>
                         </div>
                       </div>
                       <div class="form-group">
                         <label for="inputfoto" class="col-sm-2 control-label">Foto : </label>

                         <div class="col-md-9">

                       <input type="file" name="foto" value="<?=set_value('foto')?>" size="20" />
                       <?php if(form_error('foto')) : ?>
                         <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                             <?php echo form_error('foto'); ?>
                         </div>
                       <?php endif ?>
                     </div>
                     </div>

                    <div>
                      <!-- <a onclick="return confirmSave()"> -->
                        <button type="submit" class="btn btn-info center-block" style="padding-left: 20%; padding-right: 20%;"><b>Add new user</b></button>
                      <!-- </a> -->
                    </div>

      </form>
      </section>
  </div>

  <?php $this->load->view('manajemen/man_footer.php')?>
</div>
<!-- ./wrapper -->
</body>
</html>
