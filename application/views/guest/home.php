<!DOCTYPE html>
<html>
  <?php $this->load->view('guest/head') ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('guest/header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('guest/leftbar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      SELAMAT DATANG DI SISTEM INFORMASI EJOURNAL UNDIP
  </h1>
  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
  </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="box">
      <div class="box-header with-border">
          <h3 class="box-title"></h3>
          <div class="box-tools pull-right">

          </div>
      </div>
      <div class="box-body">
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count ($datajurnal)?>  </h3>

              <p>JURNAL TERDAFTAR</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url ('./jurnal_guest') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count ($dataacr)?>  </h3>

              <p>JURNAL TERAKREDITASI</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url ('jurnal_guest/acr') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count ($dataeng)?>  </h3>

              <p>JURNAL BAHASA INGGRIS</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url ('jurnal_guest/eng') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>JURNAL NON-AKREDITASI</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
       </div><!-- /.box-body -->
      <div class="box-footer">

      </div>

      <!-- /.box-footer-->
  </div><!-- /.box -->
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
    <div class="col-md-6">
      <div class="box box-danger">
        <div class="box-body">
          <div id="jurnalSintaFakultas" style="width:100%; height:315px;"></div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <!-- <div class="box-header with-border">
          <h3 class="box-title">Jumlah Jurnal </h3>
        </div> -->
        <div class="box-body">
          <div id="jurnalPenerbitSinta" style="width:100%; height:315px;"></div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('guest/footer') ?>
</body>
</html>
