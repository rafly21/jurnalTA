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
              <form method='post' action="<?php echo base_url('jurnal/riwayat/create'); ?>" class="form-horizontal">
                <input type="hidden" name="jurnal" value="<?=$jurnal?>">
              <!-- <div class="row"> -->
                <!-- <div class="col-xs-2">
                  <label for="">Pilih SK</label>
                </div>
                <div class="col-xs-5">
                  <select class="form-control select2" name="sk" data-placeholder="SK" id="sk" required>
                    <option>-- Pilih SK --</option>
                    <?php foreach ($sk as $s){?>
                      <option value="<?=$s->id_sk?>"><?=$s->no_sk?></option>
                    <?php  } ?>
                  </select>
                </div> -->
                <div class="form-group">
                  <label for="#" class="col-sm-2 control-label">Pilih SK </label>
                  <div class="col-md-9">
                    <select class="form-control select2" name="sk" data-placeholder="SK" id="sk" required>
                      <option>-- Pilih SK --</option>
                      <?php foreach ($sk as $s){?>
                        <option value="<?=$s->id_sk?>"><?=$s->no_sk?></option>
                      <?php  } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="#" class="col-sm-2 control-label">Peringkat SINTA </label>
                  <div class="col-md-9">
                    <select class="form-control select" name="peringkatsinta" data-placeholder="Peringkat SINTA" id="peringkatsinta" required>
                      <option>-- Pilih Peringkat SINTA --</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                      <option value="S4">S4</option>
                      <option value="S5">S5</option>
                      <option value="S6">S6</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="#" class="col-sm-2 control-label">Tanggal Mulai SK</label>
                  <div class="col-md-9">
                    <input class="form-control" name="tetapsk" value="<?=set_value('tetapsk')?>" placeholder="SK" type="date" required/>
                    <?php if(form_error('tetapsk')) : ?>
                      <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <?php echo form_error('tetapsk'); ?>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="#" class="col-sm-2 control-label">Tanggal Berakhir SK</label>
                  <div class="col-md-9">
                    <input class="form-control" name="akhirsk" value="<?=set_value('akhirsk')?>" placeholder="SK" type="date" required/>
                    <?php if(form_error('akhirsk')) : ?>
                      <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <?php echo form_error('akhirsk'); ?>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3 col-md-offset-2">
                    <input type="submit" class="btn btn-primary form-control" value="Submit">
                  </div>
                </div>

              <!-- </div> -->
            </form>
            </div>
            <!-- /.box-body -->
          </div>


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
              <th>OPSI</th>


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

                <a data-toggle="modal" data-target="#mDelJurnal<?=$a->id_sk_jurnal?>" href="#mDelJurnal<?=$a->id_sk_jurnal?>" class="btn btn-danger"><b>Delete</b></a>
                </td>

              </tr>
              <div class="modal fade" id="mDelJurnal<?=$a->id_sk_jurnal?>" style="padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Hapus data</h4>
                  </div>
                  <div class="modal-body">
                    <p> yakin mau hapus SK  ? </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">tutup</button>
                    <a href="<?php echo base_url ('jurnal/riwayat/delete/'.$a->id_sk_jurnal)?>" class="btn btn-danger"><b>Delete</b></a>
                  </div>
                </div>
              </div>
              </div>
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
      <!-- /.ro<w -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('manajemen/man_footer') ?>
</body>
</html>
