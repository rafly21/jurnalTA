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
              Edit Pengelola
              <small></small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url()?>kelola_pengelola"> Manajemen Pengelola</a></li>
              <li class="active">Edit Pengelola</li>
            </ol>
          </section>
        </div>
      </head>


      <section class="content" >
        <form class="form-horizontal" action="<?php echo base_url()?>kelola_pengelola">
            <div class="box-header with-border">
              <h1 class="box-title"><font color="black" fill="black">Kembali</font></h1>
              <button class="btn btn-success fa fa-angle-double-left margin pull-left"></button>
            </div>
          </form>

          <form class="form-horizontal" action="<?php echo base_url()?>kelola_pengelola/update_user" method="post">
                <div class="form-group">
                  <label for="inputiduser" class="col-sm-2 control-label">Id User : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputiduser" readonly value="<?php echo $record['id_user']?>">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputnama" class="col-sm-2 control-label">Nama : </label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="inputnama" value="<?php echo $record['nama']?>" required/>
                  </div>
                  </div>

                  <div class="form-group">
                    <label for="inputemail" class="col-sm-2 control-label">Email : </label>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="inputemail" value="<?php echo $record['email']?>" required/>
                     </div>
                   </div>

                   <div class="form-group">
                     <label for="inputtelepon" class="col-sm-2 control-label">Telepon : </label>
                     <div class="col-md-9">
                       <input type="text" class="form-control" name="inputtelepon" value="<?php echo $record['no_telp']?>" required/>
                      </div>
                    </div>

                  <div>
                <!-- <a onclick="return confirmSave()"> -->
                  <button type="submit" class="btn btn-info center-block" style="padding-left: 20%; padding-right: 20%;"><b>Save Changes</b></button>
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
