<!DOCTYPE html
<html>
  <?php $this->load->view('manajemen/man_head') ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('manajemen/man_header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('manajemen/man_leftbar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <head>
      <?php if($this->session->flashdata('success_msg')) : ?>
          <div class="alert alert-success alert-dismissible" style="margin-bottom:10px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses !</h4>
            <?= $this->session->flashdata('success_msg') ?>
          </div>
      <?php endif ?>
      <?php if($this->session->flashdata('error_msg')) : ?>
        <div class="alert alert-danger alert-dismissible" style="margin-bottom:10px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Gagal !</h4>
          <?= $this->session->flashdata('error_msg') ?>
        </div>
      <?php endif ?>
    <!-- Content Header (Page header) -->
    <div class="bar">

    <section class="content-header">
      <h1>
      RIWAYAT SK
      <small>EJournal Universitas Diponegoro</small>

  </h1>
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url('/jurnal'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Riwayat SK</li>
  </ol>
    </section>
  </div>
</head>
    <!-- Main content -->
    <section class="content">
      <form class="form-horizontal" action="<?php echo base_url()?>jurnal">
          <div class="box-header with-border">
            <h1 class="box-title"><font color="black" fill="black">Kembali</font></h1>
            <button class="btn btn-success fa fa-angle-double-left margin pull-left"></button>
          </div>
        </form>
      <div class="box box-defailt">
            <div class="box-header with-border">
              <h3 class="box-title">Perbarui SK Jurnal</h3>
            </div>
            <div class="box-body">
              <form method='post' action="<?php echo base_url('jurnal/riwayat/create'); ?>">
                <input type="hidden" name="jurnal" value="<?=$jurnal?>">
              <div class="row">
                <div class="col-xs-2">
                  <label for="">Pilih SK</label>
                </div>
                <div class="col-xs-5">
                  <select class="form-control select2" name="sk" data-placeholder="SK" id="sk" required>
                    <option>-- Pilih SK --</option>
                    <?php foreach ($sk as $s){?>
                      <option value="<?=$s->id_sk?>"><?=$s->no_sk?></option>
                    <?php  } ?>
                  </select>
                </div>
                <div class="col-xs-5">
                  <input type="submit" class="btn btn-primary" value="Perbarui">
                </div>

              </div>
            </form>
            </div>
            <!-- /.box-body -->
          </div>

      <!-- Info boxes -->
      <div class="box">
      <div class="box-header with-border">
        <table id="tes5" class="table table-bordered table-striped scroll" style="background-color:white;">
          <thead>
            <tr>
              <th>Riwayat SK  </th>
              <th>No.SK</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal berakhir</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // var_dump($data);
            $n= count($riwayatsk);
            foreach($riwayatsk as $key => $a) {?>
              <tr>
                <td><?php echo $key === 0 ? "SK Terbaru" : "SK ke-".$n ?></td>
                <td><?php echo $a->no_sk ?></div></font></td>
                <td><?php echo $a->tanggal_mulai ?></td>
                <td><?php echo $a->tanggal_berakhir ?></td>
              </tr>
              <?php $n--; } ?>


</table>
      </div>
      <div class="box-body">
      </div><!-- /.box-body -->
      <div class="box-footer">
      </div><!-- /.box-footer-->
  </div><!-- /.box -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('manajemen/man_footer') ?>
</body>
</html>
