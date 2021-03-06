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
            Edit SK
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url()?>lembaga">SK</a></li>
          </ol>
        </section>
      </div>
    </head>
    <section class="content">
      
      <form class="form-horizontal" action="<?php echo base_url()?>sk">
          <div class="box-header with-border">
            <h1 class="box-title"><font color="black" fill="black">Kembali</font></h1>
            <button class="btn btn-success fa fa-angle-double-left margin pull-left"></button>
          </div>
        </form>

       <form class="form-horizontal" action="<?php echo base_url("sk/update/".$sk->id_sk)?>" method="post">
         <div class="form-group">
           <label for="#" class="col-sm-2 control-label">No SK : </label>
           <div class="col-md-9">
             <input class="form-control" name="sk" value="<?php echo $sk->no_sk; ?>" placeholder="SK" type="text" required/>
             <?php if(form_error('sk')) : ?>
               <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <?php echo form_error('sk'); ?>
               </div>
             <?php endif ?>
           </div>
         </div>
         <div class="form-group">
           <label for="#" class="col-sm-2 control-label">Tanggal Mulai SK : </label>
           <div class="col-md-9">
             <input class="form-control" name="mulaisk" value="<?php echo $sk->tanggal_mulai ;?>" placeholder="SK" type="date" required/>
             <?php if(form_error('mulaisk')) : ?>
               <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <?php echo form_error('mulaisk'); ?>
               </div>
             <?php endif ?>
           </div>
         </div>
         <div class="form-group">
           <label for="#" class="col-sm-2 control-label">Tanggal Penetapan SK : </label>
           <div class="col-md-9">
             <input class="form-control" name="tetapsk" value="<?php echo $sk->tanggal_penetapan; ?>" placeholder="SK" type="date" required/>
             <?php if(form_error('tetapsk')) : ?>
               <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <?php echo form_error('tetapsk'); ?>
               </div>
             <?php endif ?>
           </div>
         </div>
         <div class="form-group">
           <label for="#" class="col-sm-2 control-label">Tanggal Berakhir SK : </label>
           <div class="col-md-9">
             <input class="form-control" name="akhirsk" value="<?php echo $sk->tanggal_berakhir; ?>" placeholder="SK" type="date" required/>
             <?php if(form_error('akhirsk')) : ?>
               <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <?php echo form_error('akhirsk'); ?>
               </div>
             <?php endif ?>
           </div>
         </div>
                           <!-- <a onclick="return confirmSave()"> -->
                             <button type="submit" class="btn btn-info center-block" style="padding-left: 20%; padding-right: 20%;"><b>Edit SK</b></button>
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
