<!DOCTYPE html>
<html>
  <?php $this->load->view('pengelola/p_head') ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('pengelola/p_header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('pengelola/p_leftbar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="box">

        <div class="box-body" style="background-color:rgb(238, 238, 238);">
          <header class="jumbotron my-4">
            <h1 class="display-3">SELAMAT DATANG <span class="hidden-xs"><?php
            if (!empty($this->session->userdata())){
              echo $this->session->userdata('name') ;

            }


            ?></span></h1>
            <p class="lead">Untuk mengakses sistem dapat melalui sidebar disamping,  </p>
          <p class="lead">  atau klik tombol dibawah untuk menampilkan jurnal yang anda kelola </p>
            <a href="<?php echo base_url('jurnal-p'); ?>" class="btn btn-primary btn-lg">Call to action!</a>
          </header>
        </div><!-- /.box-body -->

  </div><!-- /.box -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('pengelola/p_footer') ?>
</body>
</html>
