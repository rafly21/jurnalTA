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
            Edit Pengindeks
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url()?>pengindeks">Pengindeks</a></li>
          </ol>
        </section>
      </div>
    </head>
    <section class="content">
      <form class="form-horizontal" action="<?php echo base_url()?>pengindeks">
          <div class="box-header with-border">
            <h1 class="box-title"><font color="black" fill="black">Kembali</font></h1>
            <button class="btn btn-success fa fa-angle-double-left margin pull-left"></button>
          </div>
        </form>

       <form class="form-horizontal" action="<?php echo base_url("pengindeks/update/".$pengindeks->id_pengindeks)?>" method="post">
         <!-- <input type="hidden" name="id_pengindeks" value="<?php echo $pengindeks->id_pengindeks; ?>"> -->
                    <div class="form-group">
                      <label for="judul" class="col-sm-2 control-label">Nama Pengindeks : </label>
                      <div class="col-md-9">
                        <input class="form-control" name="nama" placeholder="Nama Pengindeks" value="<?php echo $pengindeks->nama; ?>"type="text"/>
                        <?php if(form_error('nama')) : ?>
                          <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <?php echo form_error('nama'); ?>
                          </div>
                        <?php endif ?>
                      </div>
                    </div>

              
                      <!-- <div class="form-group">
                       <label for="inputpassword" class="col-sm-2 control-label">Grade : </label>
                       <div class="col-md-9">
                         <input class="form-control" name="grade" placeholder="Grade" value="<?php echo set_value('grade'); ?>"type="text"/>
                         <?php if(form_error('grade')) : ?>
                         <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                             <?php echo form_error('grade'); ?>
                         </div>
                         <?php endif ?>
                       </div>
                       </div>
                       <div> -->
                           <!-- <a onclick="return confirmSave()"> -->
                             <button type="submit" class="btn btn-info center-block" style="padding-left: 20%; padding-right: 20%;"><b>edit pengindeks</b></button>
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
