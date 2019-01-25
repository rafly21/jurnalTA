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
        <div class="bar">
          <section class="content-header">
            <h1>
              Manajemen Ketua Editor
              <small>EJournal Universitas Diponegoro</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="Manajemen"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Manajemen Ketua Editor</li>
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
          <th>Username</th>
          <th>Name</th>
          <th>Email</th>
          <th>Telepon</th>
          <th>Foto</th>

          <th style="padding-right:220px;">Opsi Ketua Editor</th>

        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        // var_dump($data);
        // die();
        foreach($data as $a) {?>
          <?php
            // $fakultas = $this->M_Jurnal->getFakultas($a->id_fak);
            // $departemen = $this->M_Jurnal->getDepartemen($a->id_dept);
            // $lembaga = $this->M_Jurnal->getlembaga($a->id_lembaga);
            // $lab = $this->M_Jurnal->getlab($a->id_lab);
            //var_dump($departemen);die();


            $detail = $this->M_users->getJurnalPengelola($a->id_user);


            // var_dump(count($riwayatsk));
          ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><font size="4px"><div class="label label-default"><?php echo $a->username ?></div></font></td>
          <td><?php echo $a->nama ?></td>
          <td><?php echo $a->email ?></td>
          <td><?php echo $a->telepon ?></td>
          <td><img src ="<?= $a->foto !== "" ? base_url($a->foto) : 'https://via.placeholder.com/100'?>" width="100"></img></td>



          <td colspan="3">
            <span data-toggle="tooltip" title="Jurnal Yang Dikelola" data-placement="top"><a href="#mDetailJurnal<?=$a->id_user?>" data-toggle="modal" data-target="#mDetailJurnal<?=$a->id_user?> " class="btn btn-sm btn-default "><i class="fa fa-bars" aria-hidden="true"></i></a></span>

            <a href="<?php echo base_url('kelola_pengelola/edit_user/'.$a->id_user); ?>" class="btn btn-info"><b>Edit</b></a>

            <a href="#mDelIndex<?=$a->id_user?>" data-toggle='modal' data-target='#mDelIndex<?=$a->id_user?>' class="btn btn-danger"><b>Delete</b></a>



            <a href="<?php echo base_url('kelola_pengelola/edit_pass/'.$a->id_user); ?>" class="btn btn-default"><b>Change Password</b></a>
          </td>
          </tr>
          <div class="modal fade" id='mDetailJurnal<?=$a->id_user;?>' style="padding-right:17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    Jurnal yang dikelola <?=$a->nama?>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <?php
                    $no=1;
                    // var_dump($data);
                    // die();
                    foreach($detail as $b) {?>
                    <label class="col-sm-4">Judul<?php $no++ ?></label>
                    <label class="col-sm-8"><?=$b->judul?></label>
                    <?php } ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="mDelIndex<?=$a->id_user?>" style="padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Hapus data</h4>
              </div>
              <div class="modal-body">
                <p> yakin mau hapus pengelola <?php echo $a->nama ?> ? </p>
              </div>
              <div class="modal-footer">
                <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Batal</button>
                <a href="<?php echo base_url('kelola_pengelola/delete_user/'.$a->id_user);?>" class="btn btn-danger"><b>Delete</b></a>
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
<script>
$(document).ready(function(){
    $('.tooltip').tooltip();
});
</script>
</body>
</html>
