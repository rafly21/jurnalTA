<!DOCTYPE html>
<html>
 <?php $this->load->view('manajemen/man_head')?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Header -->
  <?php $this->load->view('manajemen/man_header')?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('manajemen/man_leftbar')?>
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
              Daftar Pengindeks
              <small>EJournal Universitas Diponegoro</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="Manajemen"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Manajemen Pengelola</li>
            </ol>
          </section>
        </div>
      </head>

      <section class="content">
        <a href="<?php echo base_url('./pengindeks/add_pengindeks'); ?>" class="btn btn-info"><b>Tambah Pengindeks</b></a>
      </br>
      </br>
      <table id="tableuser" class="table table-bordered table-striped scroll" style="background-color:white;">
      <thead>
        <tr>
          <th>no</th>
          <th>Pengindeks</th>
          <th>Tingkatan</th>
          <th>Grade</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // var_dump($data);
        // die();
        $no=1;
        foreach($data as $a) {?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><font size="4px"><div class="label label-default"><?php echo $a->nama ?></div></font></td>
          <td><?php echo $a->tingkatan ?></td>
          <td><?php echo $a->grade ?></td>




          <td colspan="3">
            <a href="<?php echo base_url('pengindeks/edit/'.$a->id_pengindeks); ?>" class="btn btn-info"><b>Edit</b></a>
            <a href="#mDelIndex<?=$a->id_pengindeks?>" data-toggle='modal' data-target='#mDelIndex<?=$a->id_pengindeks?>' class="btn btn-danger"><b>Delete</b></a>

          </td>
          </tr>
          <div class="modal fade" id="mDelIndex<?=$a->id_pengindeks?>" style="padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Hapus data</h4>
              </div>
              <div class="modal-body">
                <p> yakin mau hapus pengindeks <?php echo $a->nama ?> ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Batal</button>
                <a href="<?php echo base_url('pengindeks/delete/'.$a->id_pengindeks);?>" class="btn btn-danger"><b>Delete</b></a>
              </div>
            </div>
          </div>
          </div>
        <?php } ?>
      </tbody>
      </table>
      </section>
  </div>

  <?php $this->load->view('manajemen/man_footer')?>
</div>
<!-- ./wrapper -->
</body>
</html>
