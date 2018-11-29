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
            Tambah Lab
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url()?>Lab">Tambah Lab</a></li>
          </ol>
        </section>
      </div>
    </head>
    <section class="content">


       <form class="form-horizontal" action="<?php echo base_url("lab/insert")?>" method="post">
                    <div class="form-group">
                      <label for="judul" class="col-sm-2 control-label">Nama Lab : </label>
                      <div class="col-md-9">
                        <input class="form-control" name="nama_lab" placeholder="Nama Lab" value="<?php echo set_value('nama_lab'); ?>"type="text"/>
                        <?php if(form_error('nama_lab')) : ?>
                          <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <?php echo form_error('nama_lab'); ?>
                          </div>
                        <?php endif ?>
                      </div>

                    </div>


                           <!-- <a onclick="return confirmSave()"> -->
                             <button type="submit" class="btn btn-info center-block" style="padding-left: 20%; padding-right: 20%;"><b>Tambah Lab</b></button>
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
