<table border="1">
  <!-- Tampilan Header -->
  <tr>
    <td width="100" height="100" rowspan="4">
      <img width="100" height="100" src="<?php echo base_url($this->config->item('img_path').'logo_tvip.jpeg') ?>" alt="" />
    </td>
    <td colspan="11" rowspan="4" align="center">
      <h1><span>FORM PLANNING VS REALISASI LEMBUR</span></h1>
    </td>
    <td>Revisi</td> <td>00</td>
  </tr>
  <tr>
    <td>Tanggal Lembur</td> <td><?php echo DateToIndo($tanggal) ?></td>
  </tr>
  <tr>
    <td>Lembur Hari Besar</td> <td><?php echo $kegiatan ?></td>
  </tr>
  <tr>
    <td>Lokasi (Depo/Pool)</td> <td><?php echo $lokasi ?></td>
  </tr>
  <tr>
    <td colspan="8">I. Rencana Lembur</td>
    <td colspan="6">II. Realisasi Lembur</td>
  </tr>

  <!-- Tampilan Form Karyawan Lembur -->
  <tr>
    <td rowspan="2" align="center" bgcolor="blue">NO</td>
    <td rowspan="2" align="center" bgcolor="blue">NIK</td>
    <td rowspan="2" align="center" bgcolor="blue">NAMA</td>
    <td rowspan="2" align="center" bgcolor="blue">JABATAN</td>
    <td colspan="2" align="center" bgcolor="blue">JAM LEMBUR</td>
    <td align="center" bgcolor="blue">TOTAL</td>
    <td rowspan="2" align="center" bgcolor="blue">DETAIL AKTIFITAS</td>
    <td colspan="2" align="center" bgcolor="yellow">JAM LEMBUR</td>
    <td align="center" bgcolor="yellow">TOTAL</td>
    <td rowspan="2" align="center" bgcolor="yellow">DASAR PERHITUNGAN LEMBUR</td>
    <td align="center" bgcolor="yellow">NOMINAL</td>
    <td rowspan="2" align="center" bgcolor="yellow">TANDA TANGAN PENERIMA LEMBUR</td>
  </tr>
  <tr>
    <td align="center" bgcolor="blue">AWAL</td>
    <td align="center" bgcolor="blue">AKHIR</td>
    <td align="center" bgcolor="blue">JAM</td>
    <td align="center" bgcolor="yellow">AWAL</td>
    <td align="center" bgcolor="yellow">AKHIR</td>
    <td align="center" bgcolor="yellow">JAM</td>
    <td align="center" bgcolor="yellow">LEMBURAN</td>
  </tr>

  <!-- Data Karyawan -->
  <tr>
    <td colspan="14">A. Finance Accounting Purchasing</td>
  </tr>
  <?php
  $no = 1;
  foreach ($record as $row) {
  ?>
  <tr align="center">
      <td> <?php echo $no ?> </td>
      <td> <?php echo $row['nik_lembur'] ?> </td>
      <td> <?php echo $row['nama_karyawan_lembur'] ?> </td>
      <td> <?php echo $row['jabatan_karyawan_lembur'] ?> </td>
      <td> <?php echo $row['waktu_masuk'] ?> </td>
      <td> <?php echo $row['waktu_keluar'] ?> </td>
      <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
  </tr>
  <?php
  $no++;
  }
  ?>
  <tr>
    <td colspan="12">SUB TOTAL Finance</td>
    <td colspan="2">Rp. </td>
  </tr>

  <tr>
    <td colspan="14">B. General Affar</td>
  </tr>
  <?php
  $no = 1;
  foreach ($record_2 as $row) {
  ?>
  <tr align="center">
      <td> <?php echo $no ?> </td>
      <td> <?php echo $row['nik_lembur'] ?> </td>
      <td> <?php echo $row['nama_karyawan_lembur'] ?> </td>
      <td> <?php echo $row['jabatan_karyawan_lembur'] ?> </td>
      <td> <?php echo $row['waktu_masuk'] ?> </td>
      <td> <?php echo $row['waktu_keluar'] ?> </td>
      <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
  </tr>
  <?php
  $no++;
  }
  ?>
  <tr>
    <td colspan="12">SUB TOTAL GA</td>
    <td colspan="2">Rp. </td>
  </tr>

  <tr>
    <td colspan="14">C. Supply Chain</td>
  </tr>
  <?php
  $no = 1;
  foreach ($record_3 as $row) {
  ?>
  <tr align="center">
      <td> <?php echo $no ?> </td>
      <td> <?php echo $row['nik_lembur'] ?> </td>
      <td> <?php echo $row['nama_karyawan_lembur'] ?> </td>
      <td> <?php echo $row['jabatan_karyawan_lembur'] ?> </td>
      <td> <?php echo $row['waktu_masuk'] ?> </td>
      <td> <?php echo $row['waktu_keluar'] ?> </td>
      <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
  </tr>
  <?php
  $no++;
  }
  ?>
  <tr>
    <td colspan="12">SUB TOTAL Supply Chain</td>
    <td colspan="2">Rp. </td>
  </tr>

  <tr>
    <td colspan="14">D. Sales & Distribution</td>
  </tr>
  <?php
  $no = 1;
  foreach ($record_4 as $row) {
  ?>
  <tr align="center">
      <td> <?php echo $no ?> </td>
      <td> <?php echo $row['nik_lembur'] ?> </td>
      <td> <?php echo $row['nama_karyawan_lembur'] ?> </td>
      <td> <?php echo $row['jabatan_karyawan_lembur'] ?> </td>
      <td> <?php echo $row['waktu_masuk'] ?> </td>
      <td> <?php echo $row['waktu_keluar'] ?> </td>
      <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
  </tr>
  <?php
  $no++;
  }
  ?>
  <tr>
    <td colspan="12">SUB TOTAL SD</td>
    <td colspan="2">Rp. </td>
  </tr>

  <tr>
    <td colspan="14">E. Warehouse Operation </td>
  </tr>
  <?php
  $no = 1;
  foreach ($record_5 as $row) {
  ?>
  <tr align="center">
      <td> <?php echo $no ?> </td>
      <td> <?php echo $row['nik_lembur'] ?> </td>
      <td> <?php echo $row['nama_karyawan_lembur'] ?> </td>
      <td> <?php echo $row['jabatan_karyawan_lembur'] ?> </td>
      <td> <?php echo $row['waktu_masuk'] ?> </td>
      <td> <?php echo $row['waktu_keluar'] ?> </td>
      <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
  </tr>
  <?php
  $no++;
  }
  ?>
  <tr>
    <td colspan="12">SUB TOTAL Warehouse Operation</td>
    <td colspan="2">Rp. </td>
  </tr>
  <tr>
    <td colspan="14"></td>
  </tr>
  <tr>
    <td colspan="12" align="center">Total</td>
    <td colspan="2">Rp. </td>
  </tr>
</table>
<br><br><br>
<table>
  <tr>
    <td>Dibuat Oleh,</td>
    <td>Diketahui Oleh,</td>
    <td>Disetujui Oleh,</td>
    <td>Dicetak Oleh</td>
  </tr>
  <tr>
    <td><img src="<?php echo base_url($this->config->item('img_path').'approved.png') ?>" alt="" /></td>
    <td><img src="<?php echo base_url($this->config->item('img_path').'approved.png') ?>" alt="" /></td>
    <td><img src="<?php echo base_url($this->config->item('img_path').'paid.png') ?>" alt="" /></td>
    <td></td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td></td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td></td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td></td>
  </tr>
  <tr>
    <td>(_____________)</td>
    <td>(_____________)</td>
    <td>(_____________)</td>
    <td>(_____________)</td>
  </tr>
  <tr>
    <td>Supervisor / Head</td>
    <td>BM / Kepala. Dept</td>
    <td>FA & PC Manager</td>
    <td>Petty Cashier</td>
  </tr>
</table>
<br><br>

<!-- Tampilan Footer -->
<table>
  <tr>
    <td><b>Note :</b></td>
  </tr>
  <tr>
    <td colspan="14">- Untuk Divisi Admin Nominal Lemburan bisa berubah</td>
  </tr>
  <tr>
    <td colspan="14">- Jika Pengajuan Lembur dilakukan di Pusat, Kepala Departemen wajib memberikan Approval pada system lemburan dan jika pengajuan lembur dilakukan di Depo, maka BM wajib memberikan approval pada system Formulir Planning vs Realisasi Lemburpengajuan untuk Daftar Perintah Lembur.</td>
  </tr>
  <tr>
    <td colspan="14">- Approval dari Supervisor / Head, BM / Kepala Departement akan dilakukan dengan memberikan "APPROVED"</td>
  </tr>
  <tr>
    <td width="62" height="51"><img src="<?php echo base_url($this->config->item('img_path').'approved.png') ?>" alt="" /></td>
  </tr>
  <tr>
    <td colspan="14">- Approval dari Finance Accounting Purchasing Manager akan memberikan approved pada systen "PAID"</td>
  </tr>
  <tr>
    <td width="66" height="54"><img src="<?php echo base_url($this->config->item('img_path').'paid.png') ?>" alt="" /></td>
  </tr>
  <tr>
    <td colspan="14">- Petty Cashier akan menandatangani jika sudah ada Approved dari Supervisor/Head, BM / Kepala Departement dan approval "PAID" dari FAPC Manager. </td>
  </tr>
  <tr>
    <td colspan="14">- Si penerima Lembur, akan menandatangani Formulir Planning vs Realisasi Lembur (FRM.HRD.46) jika sudah mendapatkan hak lembur/dibayarkan.</td>
  </tr>
  <tr>
    <td colspan="14">- Formulir Planning vs Realisasi Lembur (FRM.HRD.46) melakukan upload pada system Lembur dan diarsip oleh Petty Cashier</td>
  </tr>
</table>