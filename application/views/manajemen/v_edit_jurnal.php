<?php
  if(!isset($penerbit) || empty($penerbit)) {
      if(!empty(set_value('id_penerbit'))) {
          $penerbit = set_value('id_penerbit');
      } else {
          $penerbit = "";
      }
  }

  // if(validation_errors())
  // {
  //   echo validation_errors('<span class="error">', '</span>');
  // }

  $id_penerbit = $jurnal->id_jenis;

  // var_dump($skJurnal);
  // die();

?>
<!DOCTYPE html>
<html>
 <?php $this->load->view('manajemen/man_head')?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
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
            Edit Jurnal
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>jurnal"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Jurnal </li>
          </ol>
        </section>
      </div>
    </head>
    <section class="content">
      <form class="form-horizontal" action="<?php echo base_url()?>jurnal">
          <div class="box-header with-border">
            <h1 class="box-title"><font color="black" fill="black">Kembali</font></h1>
            <button class="btn btn-success fa fa-angle-double-left margin pull-left"></button>
          </div>
        </form>

       <form class="form-horizontal" action="<?php echo base_url('jurnal/update_jurnal/'.$jurnal->id_jurnal)?>" method="post">
          <div class="form-group">
            <label for="judul" class="col-sm-2 control-label">Judul : </label>
            <div class="col-md-9">
              <input class="form-control" name="judul" value="<?= set_value('judul') ? set_value('judul') : $jurnal->judul; ?>" placeholder="Judul" type="text" required/>
              <?php if(form_error('nama')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('judul'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-sm-2 control-label">Nomor Jurnal : </label>
            <div class="col-md-9">
              <input class="form-control" name="nomorjurnal" value="<?= set_value('nomorjurnal') ? set_value('nomorjurnal') : $jurnal->no_jurnal; ?>" placeholder="Nomor Jurnal" type="text" required/>
              <?php if(form_error('nomorjurnal')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('nomorjurnal'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">Portal : </label>
            <div class="col-md-9">
              <?php if(!empty(set_value('portal'))):?>
                <select class="form-control " name="portal" required id="select-portal">
                  <option value="0" selected >-- Pilih Portal --</option>
                  <?php foreach ($portal as $a){?>
                    <option value='<?=$a->id_portal?>' <?=set_value('portal') === $a->id_portal ? 'selected' : '';?>><?=$a->nama_portal?> </option>
                  <?php  } ?>
                </select>
              <?php else:?>
                <select class="form-control " name="portal" id="select-portal">
                  <option value="0" selected >-- Pilih Portal --</option>
                  <?php foreach ($portal as $a){?>
                    <option value='<?=$a->id_portal?>' <?=$jurnal->id_portal === $a->id_portal ? 'selected' : '';?>><?=$a->nama_portal?> </option>
                  <?php  } ?>
                </select>
              <?php endif;?>
              <?php if(form_error('portal')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('portal'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputpassword" class="col-sm-2 control-label">URL Portal : </label>
            <div class="col-md-9">

              <input class="form-control" name="urlportal" value="<?= set_value('urlportal') ? set_value('urlportal') : $jurnal->url?>" placeholder="URL" type="text" required/>
              <span class="help-block" id="portal-help"><?= $jurnal->id_portal === '4' ? "Mohon isikan full URL, contoh <b>https://ejournal.undip.ac.id/index.php/medianers</b>." : "Cukup diisi slash terakhir, contoh https://ejournal.undip.ac.id/index.php/medianers, cukup ditulis <b>'medianers'</b> saja " ?></span>
              <?php if(form_error('urlportal')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('urlportal'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputpassword" class="col-sm-2 control-label">Penerbit : </label>
            <div class="col-md-9">
              <?php if(!empty(set_value('penerbit'))):?>
                <select class="form-control" name="penerbit" id="penerbit">
                  <option value="0" selected>-- Pilih Penerbit --</option>
                  <option value="fakultas" <?=set_value('penerbit') === 'fakultas' ? 'selected' : ''?>>Fakultas</option>
                  <option value="departemen" <?=set_value('penerbit') === 'departemen' ? 'selected' : ''?>>Departemen</option>
                  <option value="lab" <?=set_value('penerbit') === 'lab' ? 'selected' : ''?>>Lab</option>
                  <option value="lembaga" <?=set_value('penerbit') === 'lembaga' ? 'selected' : ''?>>Lembaga</option>
                </select>
              <?php else:?>
                <select class="form-control" name="penerbit" id="penerbit">
                  <option value="0" selected>-- Pilih Penerbit --</option>
                  <option value="fakultas" <?=$jurnal->jenis_penerbit === 'fakultas' ? 'selected' : ''?>>Fakultas</option>
                  <option value="departemen" <?=$jurnal->jenis_penerbit === 'departemen' ? 'selected' : ''?>>Departemen</option>
                  <option value="lab" <?=$jurnal->jenis_penerbit === 'lab' ? 'selected' : ''?>>Lab</option>
                  <option value="lembaga" <?=$jurnal->jenis_penerbit === 'lembaga' ? 'selected' : ''?>>Lembaga</option>
                </select>
              <?php endif;?>
              <?php if(form_error('penerbit')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('penerbit'); ?>
                </div>
              <?php endif ?>
              <br>
              <select class="form-control select2" name="id_penerbit" id="auto-penerbit">
                  <option value="<?=$jurnal->id_jenis?>"><?=$penerbit->nama?></option>
              </select>
              <?php if(form_error('id_penerbit')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('id_penerbit'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">Sponsor : </label>
            <div class="col-md-9">
              <input class="form-control" name="sponsor" value="<?= set_value('sponsor') ? set_value('sponsor') :$jurnal->sponsor; ?>" placeholder="sponsor" type="text" />
              <?php if(form_error('sponsor')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('sponsor'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputpassword" class="col-sm-2 control-label">Ketua Editor : </label>
            <div class="col-md-9">
              <select class="form-control select2jurnal" name="pengelola" id="hiya">
                <?php foreach ($pengelola as $p){?>
                    <?php if(!empty(set_value('pengelola'))) :?>
                        <option value='<?=$p->id_pengelola?>' <?=set_value('pengelola') === $p->id_pengelola ? 'selected' : ''?> data-img="<?=base_url($p->foto)?>"><?=$p->nama?> </option>
                    <?php else:?>
                        <option value='<?=$p->id_pengelola?>' <?=$jurnal->id_pengelola === $p->id_pengelola ? 'selected' : ''?> data-img="<?=base_url($p->foto)?>"><?=$p->nama?> </option>
                    <?php endif;?>
                <?php  } ?>
              </select>
              <?php if(form_error('pengelola')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('pengelola'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputemail" class="col-sm-2 control-label">Singkatan : </label>
            <div class="col-md-9">
              <input class="form-control" name="singkatan" value="<?= set_value('singkaatan') ? set_value('singkaatan') : $jurnal->singkatan; ?>" placeholder="Singkatan" type="text" required/>
              <?php if(form_error('singkatan')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('singkatan'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputtelepon" class="col-sm-2 control-label">p-issn : </label>
            <div class="col-md-9">
              <input class="form-control" name="pissn" value="<?= set_value('pissn') ? set_value('pissn') : $jurnal->p_issn; ?>" placeholder="p-issn" type="text" />
              <?php if(form_error('pissn')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('pissn'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputtelepon" class="col-sm-2 control-label">e-issn : </label>
            <div class="col-md-9">
              <input class="form-control" name="eissn" value="<?= set_value('eissn') ? set_value('eissn') : $jurnal->e_issn; ?>" placeholder="e-issn" type="text" />
              <?php if(form_error('eissn')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('eissn'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">english : </label>
            <div class="col-md-9 ">
                <?php if(!empty(set_value('english'))) :?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="english" value="1" <?=set_value('english') === "1" ? 'checked' : ''?>>
                            YA
                        </label>
                        &nbsp; &nbsp;
                        <label>
                            <input type="radio" name="english"  value="0" <?=set_value('english') === "0" ? 'checked' : ''?>>
                            TIDAK
                        </label>
                    </div>
                <?php else: ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="english" value="1" <?=$jurnal->english === "1" ? 'checked' : ''?>>
                            YA
                        </label>
                        &nbsp; &nbsp;
                        <label>
                            <input type="radio" name="english"  value="0" <?=$jurnal->english === "0" ? 'checked' : ''?>>
                            TIDAK
                        </label>
                    </div>
                <?php endif;?>
            </div>
          </div>
          <div class="form-group">
              <label for="#" class="col-sm-2 control-label">MpgUndip : </label>
              <div class="col-md-9 ">
                <?php if(!empty(set_value('mpgundip'))) :?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="mpgundip" value="1" <?=set_value('mpgundip') === "1" ? 'checked' : ''?>>
                            YA
                        </label>
                        &nbsp; &nbsp;
                        <label>
                            <input type="radio" name="mpgundip"  value="0" <?=set_value('mpgundip') === "0" ? 'checked' : ''?>>
                            TIDAK
                        </label>
                    </div>
                <?php else: ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="mpgundip" value="1" <?=$jurnal->mpgundip === "1" ? 'checked' : ''?>>
                            YA
                        </label>
                        &nbsp; &nbsp;
                        <label>
                            <input type="radio" name="mpgundip"  value="0" <?=$jurnal->mpgundip === "0" ? 'checked' : ''?>>
                            TIDAK
                        </label>
                    </div>
                <?php endif;?>
              </div>
          </div>
          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">DOI : </label>
            <div class="col-md-9">
              <input class="form-control" name="doi" value="<?= set_value('doi') ? set_value('doi') : $jurnal->doi; ?>" placeholder="DOI" type="text" />
              <?php if(form_error('doi')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('doi'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>
          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">Tahun Mulai : </label>
            <div class="col-md-9">
              <input class="form-control" name="thnmulai" value="<?= set_value('thnmulai') ? set_value('thnmulai') : $jurnal->thn_mulai; ?>" placeholder="Tahun Mulai" type="text" required/>
              <?php if(form_error('thnmulai')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('thnmulai'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>
          <div class="form-group">
            <label for="inputpassword" class="col-sm-2 control-label">Bulan Terbit : </label>
            <div class="col-md-9">
              <select class="form-control select2" name="blnterbit[]" multiple data-placeholder='Bulan Terbit' >
                <option value="1" <?=in_array('1', set_select('bulanterbit[]') ? set_select('bulanterbit[]') : $bulan_terbit) ? 'selected' : ''?>>Januari</option>
                <option value="2" <?=in_array('2', set_select('bulanterbit[]') ? set_select('bulanterbit[]') : $bulan_terbit) ? 'selected' : ''?>>Februari</option>
                <option value="3" <?=in_array('3', set_select('bulanterbit[]') ? set_select('bulanterbit[]') : $bulan_terbit) ? 'selected' : ''?>>Maret</option>
                <option value="4" <?=in_array('4', set_select('bulanterbit[]') ? set_select('bulanterbit[]') : $bulan_terbit) ? 'selected' : ''?>>April</option>
                <option value="5" <?=in_array('5', set_select('bulanterbit[]') ? set_select('bulanterbit[]') : $bulan_terbit) ? 'selected' : ''?>>Mei</option>
                <option value="6" <?=in_array('6', set_select('bulanterbit[]') ? set_select('bulanterbit[]') : $bulan_terbit) ? 'selected' : ''?>>Juni</option>
                <option value="7" <?=in_array('7', set_select('bulanterbit[]') ? set_select('bulanterbit[]') : $bulan_terbit) ? 'selected' : ''?>>Juli</option>
                <option value="8" <?=in_array('8', set_select('bulanterbit[]') ? set_select('bulanterbit[]') : $bulan_terbit) ? 'selected' : ''?>>Agustus</option>
                <option value="9" <?=in_array('9', set_select('bulanterbit[]') ? set_select('bulanterbit[]') : $bulan_terbit) ? 'selected' : ''?>>September</option>
                <option value="10" <?=in_array('10', set_select('bulanterbit[]') ? set_select('bulanterbit[]') : $bulan_terbit) ? 'selected' : ''?>>Oktober</option>
                <option value="11" <?=in_array('11', set_select('bulanterbit[]') ? set_select('bulanterbit[]') : $bulan_terbit) ? 'selected' : ''?>>November</option>
                <option value="12" <?=in_array('12', set_select('bulanterbit[]') ? set_select('bulanterbit[]') : $bulan_terbit) ? 'selected' : ''?>>Desember</option>
              </select>
              <?php if(form_error('blnterbit[]')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('blnterbit[]'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>
          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">Terbit Terakhir : </label>
            <div class="col-md-9">
              <input class="form-control" name="terbitakhir" value="<?= set_value('terbitakhir') ? set_value('terbitakhir') : $jurnal->terbit_terakhir; ?>" placeholder="Terbit Terakhir" type="text" required/>
              <?php if(form_error('terbitakhir')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('terbitakhir'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>
          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">Jumlah No.Terakhir : </label>
            <div class="col-md-9">
              <input class="form-control" name="noterakhir" value="<?= set_value('noterakhir') ? set_value('noterakhir') : $jurnal->no_terakhir; ?>" placeholder="Jumlah No.Terakhir" type="text" required/>
              <?php if(form_error('noterakhir')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('noterakhir'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">Pengindeks : </label>
            <div class="col-md-9">
              <select class="form-control select2" name="pengindeks[]" multiple data-placeholder="Pengindeks" id='pengindeks'>
                <?php foreach ($pengindeks as $a){?>
                  <option value='<?=$a->id_pengindeks?>' <?=in_array($a->id_pengindeks, set_select('pengindeks[]') ? set_select('pengindeks[]') : $jurnal_pengindeks_id) ? 'selected' : ''?>><?=$a->nama?></option>
                <?php  } ?>
              </select>
            <div id="field-pengindeks">
                <?php if($jurnal_pengindeks !== null) { foreach($jurnal_pengindeks as $jp) :?>
                  <input class="form-control" name="url_pengindeks[<?=url_title($jp->nama, 'underscore', true)?>]" id="<?=url_title("url pengindeks ".$jp->nama, 'underscore', true)?>" placeholder="URL <?=$jp->nama?>" value="<?=$jp->url_pengindeks?>" type="text" style="margin-top:5px; margin-bottom:5px;" />
                <?php endforeach; }?>
            </div>
            </div>
          </div>

          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">Terakreditasi : </label>
            <div class="col-md-9 ">

                <div class="radio">
                  <label>
                    <input type="radio" class="radio-akreditasi" name="akreditasi"  value="<?=$skJurnal !== null ? "true": "false"?>" checked= "checked" >
                     <?=$skJurnal !== null ? "Ya": "Tidak"?>
                  </label>

                </div>
            </div>
          </div>
          <div id="akreditasi">
            <?php if($skJurnal !== null):?>
                <div class="form-group">
                  <label for="#" class="col-sm-2 control-label">SK Akreditasi : </label>
                  <div class="col-md-9">
                    <select class="form-control select2" disabled name="sk" data-placeholder="SK" id="sk" required>
                      <option>-- Pilih SK --</option>
                      <?php foreach ($sk as $s){?>
                        <option value="<?=$s->id_sk?>" <?=$s->id_sk === $skJurnal->id_sk ? 'selected' : '';?>><?=$s->no_sk?></option>
                      <?php  } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="#" class="col-sm-2 control-label">Peringkat SINTA : </label>
                  <div class="col-md-9">
                    <select class="form-control select2" name="peringkatsinta" disabled data-placeholder="Peringkat SINTA" id="peringkatsinta" required>
                      <option>-- Pilih Peringkat SINTA --</option>
                      <option value="S1" <?= $skJurnal->peringkat_sinta === 'S1' ? 'selected' : ''; ?> >S1</option>
                      <option value="S2" <?= $skJurnal->peringkat_sinta === 'S2' ? 'selected' : ''; ?> >S2</option>
                      <option value="S3" <?= $skJurnal->peringkat_sinta === 'S3' ? 'selected' : ''; ?> >S3</option>
                      <option value="S4" <?= $skJurnal->peringkat_sinta === 'S4' ? 'selected' : ''; ?> >S4</option>
                      <option value="S5" <?= $skJurnal->peringkat_sinta === 'S5' ? 'selected' : ''; ?> >S5</option>
                      <option value="S6" <?= $skJurnal->peringkat_sinta === 'S6' ? 'selected' : ''; ?> >S6</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="#" class="col-sm-2 control-label">Tanggal Mulai SK</label>
                  <div class="col-md-9">
                    <input class="form-control" name="mulaisk" disabled value="<?= set_value('mulaisk') ? set_value('mulaisk') : $skJurnal->tanggal_mulai; ?>" placeholder="SK" type="date" required/>
                    <?php if(form_error('mulaisk')) : ?>
                      <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <?php echo form_error('mulaisk'); ?>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="#" class="col-sm-2 control-label">Tanggal Berakhir SK</label>
                  <div class="col-md-9">
                    <input class="form-control" name="akhirsk" disabled  value="<?= set_value('akhirsk') ? set_value('akhirsk') : $skJurnal->tanggal_berakhir; ?>" placeholder="SK" type="date" required/>
                    <?php if(form_error('akhirsk')) : ?>
                      <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <?php echo form_error('akhirsk'); ?>
                      </div>
                    <?php endif ?>
                  </div>
                </div>
            <?php endif;?>
          </div>
          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">URL SINTA : </label>
            <div class="col-md-9">
              <input class="form-control" name="urlsinta" value="<?= set_value('urlsinta') ? set_value('urlsinta') : $jurnal->url_sinta; ?>" placeholder="Url Sinta" type="text" />
              <span class="help-block">Contoh : http://sinta2.ristekdikti.go.id/journals/detail/?id=918</span>
              <?php if(form_error('urlsinta')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('urlsinta'); ?>
                </div>
              <?php endif ?>
            </div>
          </div>
        <div>
        <!-- <a onclick="return confirmSave()"> -->
          <button type="submit" class="btn btn-info center-block" style="padding-left: 20%; padding-right: 20%;"><b>Edit Jurnal</b></button>
        <!-- </a> -->
      </div>
    </form>
    </section>
</div>

<?php $this->load->view('manajemen/man_footer.php')?>
</div>
<!-- ./wrapper -->
</body>
</html>
