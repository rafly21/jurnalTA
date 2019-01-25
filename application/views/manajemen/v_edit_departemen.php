
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
            Edit Departemen
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url()?>dept">Departemen</a></li>
          </ol>
        </section>
      </div>
    </head>
    <section class="content">
      <form class="form-horizontal" action="<?php echo base_url()?>dept">
          <div class="box-header with-border">
            <h1 class="box-title"><font color="black" fill="black">Kembali</font></h1>
            <button class="btn btn-success fa fa-angle-double-left margin pull-left"></button>
          </div>
        </form>

       <form class="form-horizontal" action="<?php echo base_url("dept/update_dept/".$departemen->id_dept)?>" method="post">
                    <div class="form-group">
                      <label for="judul" class="col-sm-2 control-label">Nama Departemen : </label>
                      <div class="col-md-9">
                        <input class="form-control" name="nama" placeholder="Nama Departemen" value="<?php echo $departemen->nama_dept; ?>"type="text"/>
                        <?php if(form_error('nama')) : ?>
                          <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <?php echo form_error('nama'); ?>
                          </div>
                        <?php endif ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="judul" class="col-sm-2 control-label">Fakultas : </label>
                      <div class="col-md-9">
                        <select class="form-control " name="fakultas" >
                          <option >-- Pilih Fakultas --</option>
                          <?php foreach ($fakultas as $a){?>
                            <option value='<?=$a->id_fak?>' <?= $departemen->id_fak === $a->id_fak ? 'selected' : '';?>><?=$a->nama_fak?> </option>
                          <?php  } ?>
                        </select>
                        <?php if(form_error('fakultas')) : ?>
                          <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <?php echo form_error('fakultas'); ?>
                          </div>
                        <?php endif ?>
                      </div>
                    </div>


                           <!-- <a onclick="return confirmSave()"> -->
                             <button type="submit" class="btn btn-info center-block" style="padding-left: 20%; padding-right: 20%;"><b>Tambah Departemen</b></button>
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
