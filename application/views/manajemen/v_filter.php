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
                    <option value='<?=$a->id_portal?>' <?=isset($_GET['portal']) && $_GET['portal'] === $a->id_portal ? 'selected' : '';?>><?=$a->nama_portal?> </option>
                  <?php  } ?>

                </select>
                <!-- <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ayxm-container"><span class="select2-selection__rendered" id="select2-ayxm-container" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Akreditasi</label>
                <select class="form-control select2 select2-hidden-accessible" name ="akreditasi" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="undefined" selected="selected">--Pilih Tingkat Akreditasi--</option>
                  <option value="S1" <?=isset($_GET['akreditasi']) && $_GET['akreditasi'] === "S1" ? 'selected' : '';?>>S1</option>
                  <option value="S2" <?=isset($_GET['akreditasi']) && $_GET['akreditasi'] === "S2" ? 'selected' : '';?>>S2</option>
                  <option value="S3" <?=isset($_GET['akreditasi']) && $_GET['akreditasi'] === "S3" ? 'selected' : '';?>>S3</option>
                  <option value="S4" <?=isset($_GET['akreditasi']) && $_GET['akreditasi'] === "S4" ? 'selected' : '';?>>S4</option>
                  <option value="S5" <?=isset($_GET['akreditasi']) && $_GET['akreditasi'] === "S5" ? 'selected' : '';?>>S5</option>
                  <option value="S6" <?=isset($_GET['akreditasi']) && $_GET['akreditasi'] === "S6" ? 'selected' : '';?>>S6</option>
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
                    <option value='<?=$a->id_fak?>' <?=isset($_GET['penerbit']) && $_GET['penerbit'] === $a->id_fak ? 'selected' : '';?>><?=$a->nama_fak?> </option>
                  <?php  } ?>

                </select>
                <!-- <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 517.5px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Tahun Mulai</label>
                <select class="form-control select2 select2-hidden-accessible" name="tahun_mulai" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="undefined" selected="selected">--Pilih Tahun Mulai--</option>
                  <option value='<?=date('Y')?>' <?=isset($_GET['tahun_mulai']) && $_GET['tahun_mulai'] === date('Y') ? 'selected' : '';?>><?=date('Y')?></option>
                  <option value='<?=date('Y')-1?>' <?=isset($_GET['tahun_mulai']) && $_GET['tahun_mulai'] === date('Y')-1 ? 'selected' : '';?>><?=date('Y')-1?></option>
                  <option value='<?=date('Y')-2?>' <?=isset($_GET['tahun_mulai']) && $_GET['tahun_mulai'] === date('Y')-2 ? 'selected' : '';?>><?=date('Y')-2?></option>
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
                    <option value="1"  <?=isset($_GET['blnterbit']) && in_array("1", $_GET['blnterbit']) ? 'selected' : '';?>>Januari</option>
                    <option value="2" <?=isset($_GET['blnterbit']) && in_array("2", $_GET['blnterbit']) ? 'selected' : '';?>>Februari</option>
                    <option value="3" <?=isset($_GET['blnterbit']) && in_array("3", $_GET['blnterbit']) ? 'selected' : '';?>>Maret</option>
                    <option value="4" <?=isset($_GET['blnterbit']) && in_array("4", $_GET['blnterbit']) ? 'selected' : '';?>>April</option>
                    <option value="5" <?=isset($_GET['blnterbit']) && in_array("5", $_GET['blnterbit']) ? 'selected' : '';?>>Mei</option>
                    <option value="6" <?=isset($_GET['blnterbit']) && in_array("6", $_GET['blnterbit']) ? 'selected' : '';?>>Juni</option>
                    <option value="7" <?=isset($_GET['blnterbit']) && in_array("7", $_GET['blnterbit']) ? 'selected' : '';?>>Juli</option>
                    <option value="8" <?=isset($_GET['blnterbit']) && in_array("8", $_GET['blnterbit']) ? 'selected' : '';?>>Agustus</option>
                    <option value="9" <?=isset($_GET['blnterbit']) && in_array("9", $_GET['blnterbit']) ? 'selected' : '';?>>September</option>
                    <option value="10" <?=isset($_GET['blnterbit']) && in_array("10", $_GET['blnterbit']) ? 'selected' : '';?>>Oktober</option>
                    <option value="11" <?=isset($_GET['blnterbit']) && in_array("11", $_GET['blnterbit']) ? 'selected' : '';?>>November</option>
                    <option value="12" <?=isset($_GET['blnterbit']) && in_array("12", $_GET['blnterbit']) ? 'selected' : '';?>>Desember</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Indeksasi</label>
                  <select class="form-control select2 select2-hidden-accessible" name="pengindeks[]" multiple data-placeholder="Pengindeks" id='pengindeks' style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <?php foreach ($pengindeks as $a){?>
                      <option value='<?=$a->id_pengindeks?>' <?=isset($_GET['pengindeks']) && in_array($a->id_pengindeks, $_GET['pengindeks']) ? 'selected' : '';?>><?=$a->nama?></option>
                    <?php  } ?>
                  </select>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Bahasa</label>
                <select class="form-control select2 select2-hidden-accessible" name="bahasa" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option value="undefined" selected="selected">--Pilih Bahasa--</option>
                  <option value="0"  <?=isset($_GET['bahasa']) && $_GET['bahasa'] === "0" ? 'selected' : '';?>>Bahasa Indonesia</option>
                  <option value="1" <?=isset($_GET['bahasa']) && $_GET['bahasa'] === "1" ? 'selected' : '';?>>Bahasa Inggris</option>
                </select>
               </div>
               <div class="row clearfix">
                 <div class="col-xs-6">
                    <div class="form-group">
                     <label>DOI</label>
                     <select class="form-control select2 select2-hidden-accessible" name="DOI" style="width: 100%;" tabindex="-1" aria-hidden="true">
                       <option value="undefined" selected="selected">--OPSI--</option>
                       <option value="yes" <?=isset($_GET['DOI']) && $_GET['DOI'] === "yes" ? 'selected' : '';?>>YA</option>
                       <option value="no" <?=isset($_GET['DOI']) && $_GET['DOI'] === "no" ? 'selected' : '';?>>TIDAK</option>
                     </select>
                    </div>
                 </div>
                 <div class="col-xs-6">
                   <div class="form-group">
                     <label>E-ISSN</label>
                     <select class="form-control select2 select2-hidden-accessible" name="eissn" style="width: 100%;" tabindex="-1" aria-hidden="true">
                       <option value="undefined" selected="selected">--OPSI--</option>
                       <option value="yes" <?=isset($_GET['eissn']) && $_GET['eissn'] === "yes" ? 'selected' : '';?>>YA</option>
                       <option value="no" <?=isset($_GET['eissn']) && $_GET['eissn'] === "no" ? 'selected' : '';?>>TIDAK</option>
                     </select>
                    </div>
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
