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
              Edit Password
              <small>User Management</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#"> User Management</a></li>
              <li class="active">Edit Password</li>
            </ol>
          </section>
        </div>
      </head>

      <section class="content">
         <form class="form-horizontal" action="<?php echo base_url()?>kelola_pengelola">
                  <div class="box-header with-border">
                    <h1 class="box-title"><font color="black" fill="black">Back to User Management</font></h1>
                    <button class="btn btn-success fa fa-angle-double-left margin pull-left"></button>
                  </div>
                </form>
              <?php foreach ($record as $key => $value): ?>
                <form class="form-horizontal" action="<?php echo base_url('kelola_pengelola/update_pass/'.$value->id_user)?>" method="post">
                             <div class="form-group">
                              <label for="inputpassword" class="col-sm-2 control-label">New Password : </label>
                              <div class="col-md-9">
                                <input type="password" class="form-control"  name="inputpassword" placeholder="Input your new password here" required/>
                              </div>
                              </div>
                              <div>
                                <!-- <a onclick="return confirmSave()"> -->
                                  <button type="submit" class="btn btn-info center-block" style="padding-left: 20%; padding-right: 20%;"><b>Change Password</b></button>
                                <!-- </a> -->
                              </div>
                    </form>

              <?php endforeach; ?>

  </div>
  <?php $this->load->view('manajemen/man_footer.php')?>
</div>
<!-- ./wrapper -->
</body>

</html>
