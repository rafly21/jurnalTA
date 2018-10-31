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
              Jurnal Terdaftar
              <small>EJournal Universitas Diponegoro</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="Manajemen"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Jurnal Terdaftar </li>
            </ol>
          </section>
        </br>

        </div>
      </head>
      <section class="content">
            <a href="<?php echo base_url('./jurnal/add_jurnal'); ?>" class="btn btn-success"><b>Tambah Jurnal</b></a>
      </br>
      </br>
      <table id="tableuser" class="table table-bordered table-striped scroll" style="background-color:white;">
      <thead>
        <tr>
          <th>No.</th>
          <th>Judul</th>
          <th>Singkatan</th>
          <th>Penerbit</th>
          <th>Pengelola</th>
          <th style="padding-right:220px;">Opsi </th>
        </tr>
      </thead>
      <tbody>


        <?php
        $no=1;
        foreach($data as $a) {?>
      <?php
        $fakultas = $this->M_Jurnal->getFakultas($a->id_fak);
        $departemen = $this->M_Jurnal->getDepartemen($a->id_dept);
        $lembaga = $this->M_Jurnal->getlembaga($a->id_lembaga);
        $lab = $this->M_Jurnal->getlab($a->id_lab);
         //var_dump($departemen);die();
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><font size="4px"><div class="label label-default"><?php echo $a->judul ?></div></font></td>
          <td><?php echo $a->singkatan ?></td>
          <td>
            <?php
              if($lab != false){ echo $lab[0]->nama_lab;}else{ echo "-";}
              if($lembaga != false){ echo $lembaga[0]->nama_lembaga;}else{ echo "-";}
              if($fakultas != false){ echo $fakultas[0]->nama_fak;}else{ echo "-";}
              if($departemen != false){ echo $departemen[0]->nama_dept;}else{ echo "-";}
            ?></td>
          <td><?php echo $a->nama ?></td>
          <td colspan="3">
            <a href="<?php echo base_url('jurnal'.$a->id_jurnal); ?>" class="btn btn-default"><b>Detail Jurnal</b></a>
            &nbsp;
            <a href="<?php echo base_url('jurnal'.$a->id_jurnal); ?>" class="btn btn-info"><b>Edit</b></a>
            &nbsp;
            <a href="<?php echo base_url('jurnal'.$a->id_jurnal); ?>" class="btn btn-danger"><b>Delete</b></a>

          </td>


          <!-- <td colspan="3">
            <a href="<?php echo base_url('kelola_pengelola/edit_user/'.$a->id_user); ?>" class="btn btn-info"><b>Edit</b></a>
            <a href="<?php echo base_url('kelola_pengelola/delete_user/'.$a->id_user);?>" class="btn btn-danger" onClick="return confirmDelete();" ><b>Delete</b></a>
            <a href="<?php echo base_url('kelola_pengelola/edit_pass/'.$a->id_user); ?>" class="btn btn-default"><b>Change Password</b></a>
          </td> -->
          </tr>

        <?php } ?>
      </tbody>
      </table>
      <?php
      // var_dump($data1);
      ?><br><?php
       ?>

      </section>
  </div>

  <?php $this->load->view('manajemen/man_footer')?>
</div>
<!-- ./wrapper -->
</body>
</html>
