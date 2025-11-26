<?php
$tgl_2 = strtotime($tanggal2);
$dtgl_2 = date("Y-m-d", $tgl_2);
 
//mendapatkan tgl 30 hari kemarin
$tgl_1 = strtotime($tanggal1);
$dtgl_1 = date("Y-m-d", $tgl_1);
 
$tgl_skr = new DateTime($dtgl_1);
$tgl_lalu = new DateTime($dtgl_2);

$cols = $tgl_skr->diff($tgl_lalu);
$c = $cols->days + 1;

$arr_tgl = array();
?>
<table border="1">
    <tr>
      <th bgcolor="yellow"> NO. </th>
      <th rowspan="<?php echo $c ?>"> 
        Tanggal Kalender
      </th>
      <th bgcolor="yellow"> NIK </th>
      <th bgcolor="yellow"> Nama </th>
      <th bgcolor="yellow"> Jabatan </th>
      <th bgcolor="yellow"> Lokasi </th>
      <th bgcolor="yellow"> Departement </th>
      <th bgcolor="yellow"> Tanggal Bergabung </th>
      <th bgcolor="yellow"> Tanggal Absen </th>
      <th bgcolor="yellow"> F1 </th>
      <th bgcolor="yellow"> F4 </th>
      <th colspan="2" bgcolor="yellow"> Jam Kerja </th>
      <th bgcolor="yellow"> Kategori </th>
      <th bgcolor="yellow"> Absensi </th>
      <th bgcolor="yellow"> Keterangan Absensi </th>
      <th bgcolor="yellow"> Keterlambatan </th>
    </tr>
    <?php
      $no = 1;
      foreach ($record as $row) {
      ?>
      <tr>
          <td> <?php echo $no ?> </td>
          <?php
          //looping 
          $n = 0;
          do {
            $arr_tgl[$n] = $tgl_skr->format("Y-m-d");
            echo '<td align="center">'.$tgl_skr->format("d").'</td>';
            $tgl_skr->modify("+1 day");
            $n++;
          } while ($tgl_lalu >= $tgl_skr);
          ?>
          <td> <?php echo $row['nik'] ?> </td>
          <td> <?php echo $row['name'] ?> </td>
          <td> <?php echo $row['jabatan_karyawan'] ?> </td>
          <td> <?php echo $row['lokasi_struktur'] ?> </td>
          <td> <?php echo $row['dept_struktur'] ?> </td>
          <td> <?php echo $row['join_date_struktur'] ?> </td>
          <td> <?php echo $row['tanggal_absen'] ?> </td>
          <td> <?php echo $row['F1'] ?> </td>
          <td> <?php echo $row['F4'] ?> </td>
          <td> <?php echo $row['waktu_masuk'] ?> </td>
          <td> <?php echo $row['waktu_keluar'] ?> </td>
          <td> <?php echo $row['kategori'] ?> </td>
          <td> <?php echo $row['absensi'] ?> </td>
          <td> <?php echo $row['ket_absensi'] ?> </td>
          <td> <?php echo $row['waktu_telat'] ?> </td>
      </tr>
      <?php
      $no++;
      }
    ?>
    <tr></tr> <tr></tr>
    <tr>
      <th bgcolor="yellow" colspan="8">Keterangan</th>
    </tr>
    <tr>
      <td bgcolor="blue"> PC </td> <td>Pulang Cepat</td>
      <td bgcolor="blue"> TL </td> <td>Terlambat</td>
      <td bgcolor="blue"> DN </td> <td>Dinas</td>
      <td bgcolor="blue"> TD </td> <td>Tidak Lengkap</td>
    </tr>
</table>