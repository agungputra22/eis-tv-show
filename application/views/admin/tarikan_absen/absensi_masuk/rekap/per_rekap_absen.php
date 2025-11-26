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
<table border="1" cellpadding="0" cellspacing="0">
    <tr>
      <th rowspan="2"> NO. </th>
      <th rowspan="2"> NIK </th>
      <th rowspan="2"> Nama Karyawan </th>
      <th rowspan="2"> Jabatan </th>
      <th rowspan="2"> Departement </th>
      <th rowspan="2"> Tanggal Bergabung </th>
      <th colspan="11"> Keterangan </th>
      <th rowspan="2"> Total Kehadiran </th>
    </tr>
    <tr>
      <?php
      //looping 
      $n = 0;
      do {
        $arr_tgl[$n] = $tgl_skr->format("Y-m-d");
        $tgl_skr->modify("+1 day");
        $n++;
      } while ($tgl_lalu >= $tgl_skr);
      ?>
      <td>HD</td>
      <td>DN</td>
      <td>AL</td>
      <td>CD</td>
      <td>CU</td>
      <td>CK</td>
      <td>LI</td>
      <td>SA</td>
      <td>TD</td>
      <td>TL</td>
      <td>PC</td>
    </tr>
    <?php
      $no = 1;
      foreach ($record as $row) {
      ?>
      <tr>
          <td> <?php echo $no ?> </td>
          <td> <?php echo $row['nik'] ?> </td>
          <td> <?php echo $row['name'] ?> </td>
          <td> <?php echo $row['jabatan_karyawan'] ?> </td>
          <td> <?php echo $row['dept_struktur'] ?> </td>
          <td> <?php echo $row['join_date_struktur'] ?> </td>
          <?php
          $hd = 0;
          $dn = 0;
          $al = 0;
          $cd = 0;
          $cu = 0;
          $ck = 0;
          $li = 0;
          $sa = 0;
          $td_f1 = 0;
          $td_f4 = 0;
          $tlt = 0;
          $pc = 0;
          foreach ($arr_tgl as $k => $v) {
            # code...
            $ket = getabsensi($row['nik'], $v);
            if ($ket == "HD") {
              $hd = $hd + 1;
            }
            if ($ket == "DN") {
              $dn = $dn + 1;
            }
            if ($ket == "") {
              $al = $al + 1;
            }
            if ($ket == "CD") {
              $cd = $cd + 1;
            }
            if ($ket == "CU") {
              $cu = $cu + 1;
            }
            if ($ket == "CK") {
              $ck = $ck + 1;
            }
            if ($ket == "Libur") {
              $li = $li + 1;
            }
            if ($ket == "SA") {
              $sa = $sa + 1;
            }
            if ($ket == "TD F1") {
              $td_f1 = $td_f1 + 1;
            }
            if ($ket == "TD F4") {
              $td_f4 = $td_f4 + 1;
            }
            if ($ket == "TL") {
              $tlt = $tlt + 1;
            }
            if ($ket == "PC") {
              $pc = $pc + 1;
            }
            
          }
          ?>
          <td><?php echo $hd ?></td>
          <td><?php echo $dn ?></td>
          <td><?php echo $al ?></td>
          <td><?php echo $cd ?></td>
          <td><?php echo $cu ?></td>
          <td><?php echo $ck ?></td>
          <td><?php echo $li ?></td>
          <td><?php echo $sa ?></td>
          <td>
            <?php  
              $hasil = $td_f1+$td_f4;
              echo $hasil;
            ?>
          </td>
          <td><?php echo $tlt ?></td>
          <td><?php echo $pc ?></td>
          <td>
            <?php  
              $hasil = $hd+$dn+$td_f1+$td_f4+$tlt+$pc;
              echo $hasil;
            ?>
          </td>
    <?php
      $no++;
      }
    ?>
</table>