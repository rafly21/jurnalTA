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
      <div class="bar">
        <section class="content-header">
          <h1>
            Tambah Jurnal
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>jurnal"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Jurnal </li>
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

       <form class="form-horizontal" action="<?php echo base_url('jurnal/submit_jurnal')?>" method="post">
          <div class="form-group">
            <label for="judul" class="col-sm-2 control-label">Judul : </label>
            <div class="col-md-9">
              <input class="form-control" name="judul" value="<?=set_value('judul')?>" placeholder="Judul" type="text" required/>
              <?php if(form_error('judul')) : ?>
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
              <input class="form-control" name="nomorjurnal" value="<?=set_value('nomorjurnal')?>" placeholder="Nomor Jurnal" type="text" required/>
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
              <select class="form-control " name="portal" required id="select-portal">
                <option value="0" selected>-- Pilih Portal --</option>
                <?php foreach ($portal as $a){?>
                  <option value='<?=$a->id_portal?>' <?=set_value('portal') === $a->id_portal ? 'selected' : '';?>><?=$a->nama_portal?> </option>
                <?php  } ?>
              </select>
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
              <input class="form-control" name="urlportal" value="<?=set_value('urlportal')?>" placeholder="URL" type="text" required/>
              <span class="help-block" id="portal-help"> </span>
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
              <select class="form-control" name="penerbit" id="penerbit" required>
                <option value="kosong">-- Pilih Penerbit --</option>
                <option value="fakultas" <?=set_value('penerbit') === 'fakultas' ? 'selected' : ''?>>Fakultas</option>
                <option value="departemen" <?=set_value('penerbit') === 'departemen' ? 'selected' : ''?>>Departemen</option>
                <option value="lab" <?=set_value('penerbit') === 'lab' ? 'selected' : ''?>>Lab</option>
                <option value="lembaga" <?=set_value('penerbit') === 'lembaga' ? 'selected' : ''?>>Lembaga</option>
              </select>
              <?php if(form_error('penerbit')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('penerbit'); ?>
                </div>
              <?php endif ?>
              <br>
              <select class="form-control select2" name="id_penerbit" id="auto-penerbit" required>
                <option value="0" selected>-- pilih penerbit --</option>
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
              <input class="form-control" name="sponsor" value="<?=set_value('sponsor')?>" placeholder="sponsor" type="text" />
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
              <select class="form-control input-lg select2jurnal " name="pengelola" required id="hiya" style ='height:100px'>
                <option value="0" selected>-- Pilih Ketua Editor --</option>
                <?php foreach ($pengelola as $p){?>
                  <option value='<?=$p->id_pengelola?>' <?=set_value('pengelola') === $p->id_pengelola ? 'selected' : ''?> data-img="<?=base_url($p->foto)?>"><?=$p->nama?> </option>
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
              <input class="form-control" name="singkatan" value="<?=set_value('singkatan')?>" placeholder="Singkatan" type="text" required/>
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
              <input class="form-control" name="pissn" value="<?=set_value('pissn')?>" placeholder="p-issn" type="text" />
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
              <input class="form-control" name="eissn" value="<?=set_value('eissn')?>" placeholder="e-issn" type="text" />
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
              <div class="radio">
                <label>
                  <input type="radio" name="english" value="1" <?=set_value('english') === "1" ? 'checked' : ''?>>
                  YA
                </label>
                &nbsp; &nbsp;
                <label>
                  <input type="radio" name="english"  value="0" <?=set_value('english') ? (set_value('english') === "0" ? 'checked' : '') : 'checked'?>>
                  TIDAK
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
              <label for="#" class="col-sm-2 control-label">MpgUndip : </label>
              <div class="col-md-9 ">
                <div class="radio">
                  <label>
                    <input type="radio" name="mpgundip"  value="1" <?=set_value('mpgundip') === "1" ? 'checked' : ''?>>
                    YA
                  </label>
                  &nbsp; &nbsp;
                  <label>
                    <input type="radio" name="mpgundip"  value="0" <?=set_value('english') ? (set_value('english') === "0" ? 'checked' : '') : 'checked'?>>
                    TIDAK
                  </label>
                </div>
              </div>
          </div>
          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">DOI : </label>
            <div class="col-md-9">
              <input class="form-control" name="doi" value="<?=set_value('doi')?>" placeholder="DOI" type="text" />
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
              <input class="form-control" name="thnmulai" value="<?=set_value('thnmulai')?>" placeholder="Tahun Mulai" type="text" required/>
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
              <select class="form-control select2" name="blnterbit[]" multiple data-placeholder='Bulan Terbit' required >
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
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
              <input class="form-control" name="terbitakhir" value="<?=set_value('terbitakhir')?>" placeholder="Terbit Terakhir" type="text" required/>
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
              <input class="form-control" name="noterakhir" value="<?=set_value('noterakhir')?>" placeholder="Jumlah No.Terakhir" type="text" required/>
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
                  <option value='<?=$a->id_pengindeks?>'><?=$a->nama?></option>
                <?php  } ?>
              </select>
              <?php if(form_error('pengindeks[]')) : ?>
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo form_error('pengindeks[]'); ?>
                </div>
              <?php endif ?>
            <div id="field-pengindeks"></div>
            </div>
          </div>

          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">Terakreditasi : </label>
            <div class="col-md-9 ">
              <div class="radio">
                <label>
                  <input type="radio" class="radio-akreditasi" name="akreditasi" id="aky" value="true" <?=set_value('akreditasi') === "true" ? 'checked' : ''?>>
                  YA
                </label>
                &nbsp; &nbsp;
                <label>
                  <input type="radio" class="radio-akreditasi" name="akreditasi" id="akn" value="false" <?=set_value('akreditasi') ? (set_value('akreditasi') === "false" ? 'checked' : '') : 'checked'?>>
                  TIDAK
                </label>
              </div>
            </div>
          </div>
          <div id="akreditasi"></div>
          <div class="form-group">
            <label for="#" class="col-sm-2 control-label">URL SINTA : </label>
            <div class="col-md-9">
              <input class="form-control" name="urlsinta" value="<?=set_value('urlsinta')?>" placeholder="Url Sinta" type="text" />
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
          <button type="submit" class="btn btn-info center-block" style="padding-left: 20%; padding-right: 20%;"><b>Tambah Jurnal</b></button>
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
