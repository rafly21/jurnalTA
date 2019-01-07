<table id="download" class="table table-bordered table-striped scroll" style="background-color:white;">
<thead>
  <tr>
    <th>No.</th>
    <th>Judul</th>
    <th>Singkatan</th>
    <th>Penerbit</th>
    <th>Pengelola</th>
    <th>Nomor Jurnal </th>
    <th>Portal </th>
    <th>URL Portal </th>
    <th>Sponsor </th>
    <th>P-Issn </th>
    <th>E-Issn </th>
    <th>Berbahasa Inggris? </th>
    <th>MpgUndip? </th>
    <th>DOI </th>
    <th>Tahun Mulai </th>
    <th>Bulan Terbit </th>
    <th>Frekuensi </th>
    <th>Terbit Terakhir </th>
    <?php foreach ($indeks as $key => $p) :?>
      <th><?= $p->nama?></th>
    <?php endforeach; ?>
    <th>SK </th>
    <th>Peringkat SINTA </th>
    <th>URL SINTA </th>

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
    $skJurnal = $this->M_Jurnal->getSkJurnal($a->id_jurnal);
    $riwayatsk = $this->M_Jurnal->getSkJurnal($a->id_jurnal , true );

    // var_dump($pengindeks);
  ?>
  <tr>
    <td><?php echo $no++ ?></td>
    <td><font size="4px"><div class="label label-default"><?php echo $a->judul ?></div></font></td>
    <td><?php echo $a->singkatan ?></td>
    <td><?=$penerbit->nama?></td>
    <td><?php echo $a->nama ?></td>
    <td><?php echo $detail->no_jurnal ?></td>
    <td><?php echo $detail->nama_portal ?></td>
    <td><?php echo $detail->base_url.$detail->url ?></td>
    <td><?php echo $detail->sponsor ?></td>
    <td><?php echo $detail->p_issn ?></td>
    <td><?php echo $detail->e_issn ?></td>
    <td><?php echo $detail->english === '1' ? "Ya" : "Tidak" ?></td>
    <td><?php echo $detail->english === '1' ? "Ya" : "Tidak" ?></td>
    <td><?php echo $detail->doi ?></td>
    <td><?php echo $detail->thn_mulai ?></td>
    <td><?php echo $bulan_terbit ?></td>
    <td><?php echo count(explode(',',$bulan_terbit)) ?></td>
    <td><?php echo $detail->terbit_terakhir ?></td>
    <?php foreach ($indeks as $key => $p) :?>
      <td><?= !empty($pengindeks) && $pengindeks[0]->nama === $indeks[$key]->nama ? $pengindeks[0]->url_pengindeks : '' ;?></td>
    <?php endforeach; ?>
    <td><?php echo isset($skJurnal->no_sk) ? $skJurnal->no_sk : ''  ?></td>
    <td><?php echo $detail->peringkat_sinta ?></td>
    <td><?php echo $detail->url_sinta ?></td>
    </tr>
  <?php } ?>
</tbody>
</table>
