
<!DOCTYPE html>
<html>
  <?php $this->load->view('manajemen/man_head') ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('manajemen/man_header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('manajemen/man_leftbar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      JURNAL DALAM GRAFIK
  </h1>
  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
  </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-danger">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Jumlah Jurnal </h3>
            </div> -->
            <div class="box-body">
              <div id="machart" style="width:100%; height:315px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-body">
              <div id="penerbitJurnal" style="width:100%; height:315px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="box box-danger">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Jumlah Jurnal </h3>
            </div> -->
            <div class="box-body">
              <div id="jurnalSinta" style="width:100%; height:315px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-body">
            </div>
            <!-- /.box-body -->
          </div>
        </div> -->
      </div>
      <!-- Info boxes -->

  </div><!-- /.box -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('manajemen/man_footer') ?>
</body>
</html>
