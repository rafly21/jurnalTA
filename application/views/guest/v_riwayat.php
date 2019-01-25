<!DOCTYPE html
<html>
  <?php $this->load->view('guest/head') ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('guest/header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('guest/leftbar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <head>

    <!-- Content Header (Page header) -->
    <div class="bar">

    <section class="content-header">
      <h1>
      RIWAYAT SK
      <small>EJournal Universitas Diponegoro</small>

  </h1>
  <ol class="breadcrumb">
      <li><a href="<?php echo base_url('/home'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Riwayat SK</li>
  </ol>
    </section>
    <br>
  </div>
</head>
    <!-- Main content -->
    <section class="content">
      <form class="form-horizontal" action="<?php echo base_url()?>jurnal_guest/acr">
          <div class="box-header with-border">
            <h1 class="box-title"><font color="black" fill="black">Kembali</font></h1>
            <button class="btn btn-success fa fa-angle-double-left margin pull-left"></button>
          </div>
        </form>

      <!-- Info boxes -->
      <?php if (count($riwayatsk)>0){       ?>
  <div class="box">
  <div class="box-header with-border">
    <table id="tes5" class="table table-bordered table-striped scroll" style="background-color:white;">
      <thead>
        <tr>
          <th>Riwayat SK  </th>
          <th>No.SK</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal berakhir</th>
          <th>Peringkat SINTA</th>


        </tr>
      </thead>
      <tbody>
        <?php
        // var_dump($riwayatsk);
        $n= count($riwayatsk);
        foreach($riwayatsk as $key => $a) {?>
          <tr>
            <td><?php echo $key === 0 ? "SK Terbaru" : "SK ke-".$n ?></td>
            <td><?php echo $a->no_sk ?></div></font></td>
            <td><?php echo $a->tanggal_mulai ?></td>
            <td><?php echo $a->tanggal_berakhir ?></td>
            <td> <?php echo $a->peringkat_sinta ?></td>
            <td>

            </td>

          </tr>

          <?php $n--; } ?>


</table>
  </div>
  <div class="box-body">
  </div><!-- /.box-body -->
  <div class="box-footer">
  </div><!-- /.box-footer-->
</div><!-- /.box -->
<?php }else {?>
<div class="box">

<div class="box-body">
<p><b> JURNAL BELUM TERAKREDITASI</b></p>
</div><!-- /.box-body -->
</div><!-- /.box-body -->

<?php }?>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('guest/footer') ?>
</body>
</html>
