<!DOCTYPE html>
<html>
 <?php $this->load->view('pengelola/p_head')?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Header -->
  <?php $this->load->view('pengelola/p_header')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('pengelola/p_leftbar')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Main content -->
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
        <div class="bar">
          <section class="content-header">
            <h1>
              Daftar Jurnal Yang Dikelola
              <small>EJournal Universitas Diponegoro</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="Pengelola"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Daftar Jurnal Yang Dikelola</li>
            </ol>
          </section>
        </div>
      </head>

      <section class="content">
      </br>
      </br>
      <table id="tableuser" class="table table-bordered table-striped scroll" style="background-color:white;">
      <thead>
        <tr>
          <th>No.</th>
          <th>Judul</th>
          <th>Singkatan</th>
          <th>Penerbit</th>
          <th style="padding-right:220px;">Opsi </th>
        </tr>
      </thead>
      <tbody>
        <?php
        // var_dump($data);
        // die();
        $no=1;
        foreach($data as $a) {

          $penerbit = $this->M_Jurnal->getPenerbitJurnal($a->id_jurnal);

          ?>

        <tr>
          <td><?php echo $no++ ?></td>
          <td><font size="4px"><div class="label label-default"><?php echo $a->judul ?></div></font></td>
          <td><font size="4px"><div class="label label-default"><?php echo $a->singkatan ?></div></font></td>
          <td><font size="4px"><div class="label label-default"><?php echo $penerbit->nama ?></div></font></td>

         

          <td>
            <a href="<?php echo base_url('#'); ?>" class="btn btn-info"><b>Detail</b></a>
            &nbsp;
            <a href="<?php echo base_url('#'); ?>" class="btn btn-info"><b>Edit</b></a>

          </td>
          </tr>

        <?php } ?>
      </tbody>
      </table>
      </section>
  </div>

  <?php $this->load->view('pengelola/p_footer')?>
</div>
<!-- ./wrapper -->
</body>
</html>
