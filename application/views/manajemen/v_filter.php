<div class="box box-default" id="filter-box-widget" style="display:none;">
        <div class="box-header with-border">
          <h3 class="box-title">Filter Data Jurnal</h3>

          <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div> -->
        </div>
        <!-- /.box-header -->
        <form method="get" action="<?=base_url('jurnal/filter')?>">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Portal</label>
                <select class="form-control select2 select2-hidden-accessible" name="portal" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="undefined" selected>-- Pilih Portal --</option>
                  <?php foreach ($portal as $a){?>
                    <option value='<?=$a->id_portal?>' <?=set_value('portal') === $a->id_portal ? 'selected' : '';?>><?=$a->nama_portal?> </option>
                  <?php  } ?>

                </select>
                <!-- <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ayxm-container"><span class="select2-selection__rendered" id="select2-ayxm-container" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Akreditasi</label>
                <select class="form-control select2 select2-hidden-accessible" name ="akreditasi" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="undefined" selected="selected">--Pilih Tingkat Akreditasi--</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
                  <option value="S4">S4</option>
                  <option value="S5">S5</option>
                  <option value="S6">S6</option>
                </select>
                <!-- <span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-labelledby="select2-yo39-container"><span class="select2-selection__rendered" id="select2-yo39-container" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Fakultas Penerbit</label>
                <select class="form-control select2 select2-hidden-accessible" name="penerbit"  data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="undefined" selected>-- Fakultas Penerbit --</option>
                  <?php foreach ($fakultas as $a){?>
                    <option value='<?=$a->id_fak?>' <?=set_value('portal') === $a->id_fak ? 'selected' : '';?>><?=$a->nama_fak?> </option>
                  <?php  } ?>

                </select>
                <!-- <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 517.5px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Tahun Mulai</label>
                <select class="form-control select2 select2-hidden-accessible" name="tahun_mulai" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="undefined" selected="selected">--Pilih Tahun Mulai--</option>
                  <option><?=date('Y')?></option>
                  <option><?=date('Y')-1?></option>
                  <option><?=date('Y')-2?></option>
                </select>
                <!-- <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-4n1w-container"><span class="select2-selection__rendered" id="select2-4n1w-container" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Bulan Terbit</label>
                  <select class="form-control select2 select2-hidden-accessible" name="blnterbit[]" multiple data-placeholder='Bulan Terbit' style="width: 100%;" tabindex="-1" aria-hidden="true">
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

                <!-- <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 517.5px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Bahasa</label>
                <select class="form-control select2 select2-hidden-accessible" name="bahasa" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="undefined" selected="selected">--Pilih Bahasa--</option>
                  <option value="0">Bahasa Indonesia</option>
                  <option value="1">Bahasa Inggris</option>
                </select>
               </div>
            </div>



            <div class="col-md-6">
              <div class="form-group">
                <label>Indeksasi</label>
                <select class="form-control select2" name="pengindeks[]" multiple data-placeholder="Pengindeks" id='pengindeks'>
                  <?php foreach ($pengindeks as $a){?>
                    <option value='<?=$a->id_pengindeks?>'><?=$a->nama?></option>
                  <?php  } ?>
                </select>

                <!-- <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 517.5px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
              </div>
            </div>

            <div class="col-md-6">
              <div class="col-xs-6" style='padding-left:0'>
                <div class="form-group">
                  <label>DOI</label>
                  <select class="form-control select2 select2-hidden-accessible" name="DOI" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option value="undefined" selected="selected">--OPSI--</option>
                    <option value="yes">YA</option>
                    <option value="no">TIDAK</option>
                  </select>
                 </div>
              </div>
              <div class="col-xs-6" style='padding-left:0'>
                <div class="form-group">
                  <label>E-ISSN</label>
                  <select class="form-control select2 select2-hidden-accessible" name="eissn" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option value="undefined" selected="selected">--OPSI--</option>
                    <option value="yes">YA</option>
                    <option value="no">TIDAK</option>
                  </select>
                 </div>
              </div>
              </div>





            <!-- /.col -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Terapkan</button>
        </div>
          </form>
      </div>
