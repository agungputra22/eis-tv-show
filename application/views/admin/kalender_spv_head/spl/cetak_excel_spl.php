<table>
    <tr>
      <th colspan="3" align="left">PT TIRTA VARIA INTIPRATAMA</th>
    </tr>
    <tr>
      <th colspan="2" align="left">HUMAN RESOURCE</th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th colspan="2" align="left">Divisi</th>
      <th align="left">:</th>
    </tr>
    <tr>
      <th colspan="18">FORM LEMBUR - DEPO</th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th colspan="2" align="left">Divisi</th>
      <th align="left">:</th>
    </tr>
    <tr>
      <th colspan="2" align="left">Tanggal</th>
      <th align="left">:</th>
    </tr>
    <tr>
      <th colspan="2" align="left">Lembur Hari Besar</th>
      <th align="left">:</th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th colspan="2" align="left">I. Rencana Lembur</th>
    </tr>
</table>
<table border="1">
    <tr>
      <th rowspan="2">NO</th>
      <th rowspan="2">NIK</th>
      <th rowspan="2">NAMA</th>
      <th rowspan="2">JABATAN</th>
      <th rowspan="2">VARIAN</th>
      <th rowspan="2">STANDARD RITASI</th>
      <th colspan="2">JAM LEMBUR</th>
      <th>TOTAL</th>
      <th rowspan="2">PEKERJAAN</th>
      <th rowspan="2">REALISASI (UTK DRIVER & HELPER)</th>
      <th colspan="2">JAM LEMBUR</th>
      <th>TOTAL</th>
      <th rowspan="2">DASAR PERHITUNGAN LEMBUR</th>
      <th>NOMINAL</th>
      <th colspan="2">TANDA TANGAN</th>
    </tr>
    <tr>
      <th>AWAL</th>
      <th>AKHIR</th>
      <th>JAM</th>
      <th>AWAL</th>
      <th>AKHIR</th>
      <th>JAM</th>
      <th>LEMBURAN</th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <th colspan="18" align="left"></th>
    </tr>
    <?php
    $no = 1;
    foreach ($listdata as $row) {
    ?>
    <tr>
        <td> <?php echo $no ?> </td>
        <td> <?php echo $row['nik_shift'] ?> </td>
        <td> <?php echo $row['nama_karyawan_shift'] ?> </td>
        <td> <?php echo $row['jabatan_karyawan_shift'] ?> </td>
        <td> </td>
        <td> </td>
        <td> <?php echo $row['waktu_masuk'] ?> </td>
        <td> <?php echo $row['waktu_keluar'] ?> </td>
    </tr>
    <?php
    $no++;
    }
    ?>
    <tr>
      <th colspan="3">Sub Total Operasional</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th colspan="3"></th>
    </tr>
    <tr>
      <th colspan="3">Total</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th colspan="3"></th>
    </tr>
</table>
<br><br><br>
<table>
    <tr>
      <th colspan="3">Dibuat Oleh,</th><th></th><th></th><th></th>
      <th colspan="2">Diketahui Oleh,</th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th></th>
    </tr>
    <tr>
      <th colspan="3">Admin</th><th></th><th></th><th></th>
      <th colspan="2">Supervisor Admin</th>
    </tr>
</table>