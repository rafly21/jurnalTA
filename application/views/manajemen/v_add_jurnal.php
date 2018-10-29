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
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url()?>jurnal">Jurnal Terdaftar</a></li>
          </ol>
        </section>
      </div>
    </head>
    <section class="content">


       <form class="form-horizontal" action="<?php echo base_url('jurnal/submit_jurnal')?>" method="post">
                    <div class="form-group">
                      <label for="judul" class="col-sm-2 control-label">Judul : </label>
                      <div class="col-md-9">
                        <input class="form-control" name="judul" placeholder="Judul" type="text" required/>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Nomor Jurnal : </label>
                      <div class="col-md-9">
                        <input class="form-control" name="nomorjurnal" placeholder="Nomor Jurnal" type="text" required/>
                      </div>
                      </div>

                      <div class="form-group">
                    <label for="#" class="col-sm-2 control-label">Portal : </label>
                      <div class="col-md-9">
                    <select class="form-control " name="portal" >
                      <option >-- Pilih Portal --</option>
                 <?php
                 foreach ($portal as $a){?>
                   <option value='<?=$a->id_portal?>'><?=$a->nama_portal?> </option>
               <?php  }
                 ?>
                    </select>
                  </div>
                  </div>

                  <div class="form-group">
                   <label for="inputpassword" class="col-sm-2 control-label">URL Portal : </label>
                   <div class="col-md-9">
                     <input class="form-control" name="urlportal" placeholder="URL" type="text" required/>
                   </div>
                   </div>

                      <div class="form-group">
                    <label for="inputpassword" class="col-sm-2 control-label">Penerbit : </label>
                      <div class="col-md-9">
                    <select class="form-control" name="penerbit" id="penerbit">
                      <option >-- Pilih Penerbit --</option>
                      <option value="fakultas">Fakultas</option>
                      <option value="departemen">Departemen</option>
                      <option value="lab">Lab</option>
                      <option value="lembaga">Lembaga</option>
                    </select>
                  </br>
                    <select class="form-control select2" name="id_penerbit" id="auto-penerbit">
                      <option>-- pilih penerbit --</option>
                    </select>
                  </div>
                  </div>

                      <div class="form-group">
                       <label for="#" class="col-sm-2 control-label">Sponsor : </label>
                       <div class="col-md-9">
                         <input class="form-control" name="sponsor" placeholder="sponsor" type="text" required/>
                       </div>
                       </div>

                       <div class="form-group">
                     <label for="inputpassword" class="col-sm-2 control-label">Pengelola : </label>
                       <div class="col-md-9">
                     <select class="form-control select2" name="pengelola">
                       <option >-- Pilih Pengelola --</option>
                  <?php
                  foreach ($pengelola as $p){?>
                    <option value='<?=$p->id_pengelola?>'><?=$p->nama?> </option>

                <?php  }
                  ?>
                     </select>
                   </div>
                   </div>

                     <div class="form-group">
                      <label for="inputemail" class="col-sm-2 control-label">Singkatan : </label>
                      <div class="col-md-9">
                        <input class="form-control" name="singkatan" placeholder="Singkatan" type="text" required/>

                       </div>
                      </div>

                     <div class="form-group">
                     <label for="inputtelepon" class="col-sm-2 control-label">p-issn : </label>
                     <div class="col-md-9">
                       <input class="form-control" name="pissn" placeholder="p-issn" type="text" required/>

                      </div>
                     </div>

                     <div class="form-group">
                     <label for="inputtelepon" class="col-sm-2 control-label">e-issn : </label>
                     <div class="col-md-9">
                       <input class="form-control" name="eissn" placeholder="e-issn" type="text" required/>

                      </div>
                     </div>

                     <div class="form-group">
                        <label for="#" class="col-sm-2 control-label">english : </label>
                       <div class="col-md-9 ">
                         <div class="radio">
                           <label>
                             <input type="radio" name="english" value="true" checked="">
                             YA
                           </label>
                           &nbsp; &nbsp;
                           <label>
                             <input type="radio" name="english"  value="false">
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
                        <input type="radio" name="mpgundip"  value="true" checked="">
                        YA
                      </label>
                      &nbsp; &nbsp;
                      <label>
                        <input type="radio" name="mpgundip"  value="false">
                        TIDAK
                      </label>
                    </div>

                  </div>
               </div>
               <div class="form-group">
                <label for="#" class="col-sm-2 control-label">DOI : </label>
                <div class="col-md-9">
                  <input class="form-control" name="doi" placeholder="DOI" type="text" required/>
                </div>
                </div>
                <div class="form-group">
                 <label for="#" class="col-sm-2 control-label">Tahun Mulai : </label>
                 <div class="col-md-9">
                   <input class="form-control" name="thnmulai" placeholder="Tahun Mulai" type="text" required/>
                 </div>
                 </div>

                 <div class="form-group">
               <label for="inputpassword" class="col-sm-2 control-label">Bulan Terbit : </label>
                 <div class="col-md-9">
               <select class="form-control select2" name="blnterbit[]" multiple data-placeholder='Bulan Terbit' >
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
               </div>
               </div>
               <div class="form-group">
                <label for="#" class="col-sm-2 control-label">Terbit Terakhir : </label>
                <div class="col-md-9">
                  <input class="form-control" name="terbitakhir" placeholder="Terbit Terakhir" type="text" required/>
                </div>
                </div>
                <div class="form-group">
                 <label for="#" class="col-sm-2 control-label">Jumlah No.Terakhir : </label>
                 <div class="col-md-9">
                   <input class="form-control" name="noterakhir" placeholder="Jumlah No.Terakhir" type="text" required/>
                 </div>
                 </div>

                 <div class="form-group">
               <label for="#" class="col-sm-2 control-label">Pengindeks : </label>
                 <div class="col-md-9">
               <select class="form-control select2" name="pengindeks[]" multiple data-placeholder="Pengindeks" id='pengindeks'>

                  <?php foreach ($pengindeks as $a){?>
                    <option value='<?=$a->id_pengindeks?>'><?=$a->nama?> </option>
                  <?php  } ?>

               </select>
               <div id="field-pengindeks"></div>
             </div>
             </div>

             <div class="form-group">
                <label for="#" class="col-sm-2 control-label">Terakreditasi : </label>
               <div class="col-md-9 ">
                 <div class="radio">
                   <label>
                     <input type="radio" class="radio-akreditasi" name="akreditasi" id="aky" value="ya">
                     YA
                   </label>
                   &nbsp; &nbsp;
                   <label>
                     <input type="radio" class="radio-akreditasi" name="akreditasi" id="akn" value="tidak">
                     TIDAK
                   </label>
                 </div>
               </div>
             </div>
             <div id="akreditasi" class="hidden">
               <div class="form-group">
                <label for="#" class="col-sm-2 control-label">SK Akreditasi : </label>
                <div class="col-md-9">
                  <input class="form-control" name="sk" placeholder="SK" type="text" required/>
                </div>
                </div>
                <div class="form-group">
                 <label for="#" class="col-sm-2 control-label">Tanggal Mulai SK : </label>
                 <div class="col-md-9">
                   <input class="form-control" name="mulaisk" placeholder="SK" type="date" required/>
                 </div>
                 </div>
                 <div class="form-group">
                  <label for="#" class="col-sm-2 control-label">Tanggal Penetapan SK : </label>
                  <div class="col-md-9">
                    <input class="form-control" name="tetapsk" placeholder="SK" type="date" required/>
                  </div>
                  </div>
                  <div class="form-group">
                   <label for="#" class="col-sm-2 control-label">Tanggal Berakhir SK : </label>
                   <div class="col-md-9">
                     <input class="form-control" name="akhirsk" placeholder="SK" type="date" required/>
                   </div>
                   </div>

                 <div class="form-group">
                  <label for="#" class="col-sm-2 control-label">Peringkat SINTA : </label>
                  <div class="col-md-9">
                    <input class="form-control" name="peringkatsinta" placeholder="SK" type="text" required/>
                  </div>
                  </div>
                  </div>
                  <div class="form-group">
                   <label for="#" class="col-sm-2 control-label">URL SINTA : </label>
                   <div class="col-md-9">
                     <input class="form-control" name="urlsinta" placeholder="SK" type="text" required/>
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
