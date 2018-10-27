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
            Tambah Lembaga
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


       <form class="form-horizontal" action="<?php echo base_url()?>tambah_pengelola/submit_user" method="post">
                    <div class="form-group">
                      <label for="inputusername" class="col-sm-2 control-label">Username : </label>
                      <div class="col-md-9">
                        <input class="form-control" name="inputusername" placeholder="Username" type="text" required/>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="inputpassword" class="col-sm-2 control-label">Password : </label>
                      <div class="col-md-9">
                        <input class="form-control" name="inputpassword" placeholder="Password" type="password" required/>
                      </div>
                      </div>

      <!-- <input class="form-control" name="inputuser" type="hidden" value="auth" > -->

                     <div class="form-group">
                      <label for="inputnama" class="col-sm-2 control-label">Nama : </label>
                      <div class="col-md-9">
                        <input class="form-control" name="inputnama" placeholder="Nama" type="text" required/>
                      </div>
                      </div>

                     <div class="form-group">
                      <label for="inputemail" class="col-sm-2 control-label">Email : </label>
                      <div class="col-md-9">
                        <input class="form-control" name="inputemail" placeholder="Email" type="text" required/>

                       </div>
                      </div>

                      <div class="form-group">
                      <label for="inputtelepon" class="col-sm-2 control-label">Telepon : </label>
                      <div class="col-md-9">
                        <input class="form-control" name="inputtelepon" placeholder="Telepon" type="text" required/>

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
