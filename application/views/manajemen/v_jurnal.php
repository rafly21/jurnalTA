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
        // var_dump($data);
        $no=1;
        foreach($data as $a) {?>
        <?php
          // $fakultas = $this->M_Jurnal->getFakultas($a->id_fak);
          // $departemen = $this->M_Jurnal->getDepartemen($a->id_dept);
          // $lembaga = $this->M_Jurnal->getlembaga($a->id_lembaga);
          // $lab = $this->M_Jurnal->getlab($a->id_lab);
          //var_dump($departemen);die();

          $penerbit = $this->M_Jurnal->getPenerbitJurnal($a->id_jurnal);
          $pengindeks= $this->M_Jurnal->getJurnalPengindeks($a->id_jurnal);
          $detail = $this->M_Jurnal->detail_data($a->id_jurnal);
          $bulan_terbit = $this->M_Jurnal->getBulanTerbit($a->id_jurnal);
          // var_dump($pengindeks);
        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><font size="4px"><div class="label label-default"><?php echo $a->judul ?></div></font></td>
          <td><?php echo $a->singkatan ?></td>
          <td><?=$penerbit->nama?></td>
          <td><?php echo $a->nama ?></td>
          <td colspan="3">
            <a href="#mDetailJurnal<?=$a->id_jurnal?>"data-toggle="modal" data-target="#mDetailJurnal<?=$a->id_jurnal?>" class="btn btn-default"><b>Detail Jurnal</b></a>
            &nbsp;
            <a href="<?php echo base_url('jurnal'.$a->id_jurnal); ?>" class="btn btn-info"><b>Edit</b></a>
            &nbsp;
            <a href="<?php echo base_url('jurnal'.$a->id_jurnal); ?>" class="btn btn-danger"><b>Delete</b></a>

          </td>



          </tr>
          <div class="modal fade" id="mDetailJurnal<?=$a->id_jurnal?>" style="padding-right: 17px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Jurnal <?=$a->judul?> </h4>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <label class="col-sm-4">
                          Judul
                      </label>
                      <label class="col-sm-8">
                          <?=$detail->judul?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                          Nomor Jurnal
                      </label>
                      <label class="col-sm-8">
                          <?=$detail->no_jurnal?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                          Portal
                      </label>
                      <label class="col-sm-8">
                          <?=$detail->nama_portal?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                          URL Portal
                      </label>
                      <label class="col-sm-8">
                          <?=$detail->base_url.'/'.$detail->url?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                          Penerbit
                      </label>
                      <label class="col-sm-8">
                        <?=$penerbit->nama?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                          Singkatan
                      </label>
                      <label class="col-sm-8">
                        <?=$detail->singkatan?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                          Pengelola
                      </label>
                      <label class="col-sm-8">
                        <?=$a->nama?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                          Sponsor
                      </label>
                      <label class="col-sm-8">
                        <?=$detail->sponsor?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                          P-Issn
                      </label>
                      <label class="col-sm-8">
                        <?=$detail->p_issn?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                          E-Issn
                      </label>
                      <label class="col-sm-8">
                        <?=$detail->e_issn?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                          Berbahasa Inggris?
                      </label>
                      <label class="col-sm-8">
                        <?=$detail->english === '1' ? "Ya" : "Tidak" ?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                          MpgUndip?
                      </label>
                      <label class="col-sm-8">
                        <?=$detail->english === '1' ? "Ya" : "Tidak" ?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                        DOI
                      </label>
                      <label class="col-sm-8">
                        <?=$detail->doi?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                        Tahun Mulai
                      </label>
                      <label class="col-sm-8">
                        <?=$detail->thn_mulai?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                        Bulan Terbit
                      </label>
                      <label class="col-sm-8">
                        <?= $bulan_terbit?>
                      </label>
                  </div>
                  <div class="row">
                      <label class="col-sm-4">
                        Terbit Terakhir
                      </label>
                      <label class="col-sm-8">
                        <?= $detail->terbit_terakhir?>
                      </label>
                  </div>
                  <?php foreach ($pengindeks as $p): ?>
                    <div class="row">
                        <label class="col-sm-4">
                          <?=$p->nama?>
                        </label>
                        <label class="col-sm-8">
                          <?= $p->url_pengindeks?>
                        </label>
                    </div>
                  <?php endforeach; ?>


               </div>
              <div class="modal-footer">
                <button type="button" aria-label="Close" class="btn btn-primary" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
          </div>
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
