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
      <td>ATL</td>
      <td>TLT</td>
      <td>PC</td>
    </tr>
    <?php
      $no = 1;
      foreach ($record as $row) {
      ?>
      <tr>
          <td> <?php echo $no ?> </td>
          <td> <?php echo $row['badgenumber'] ?> </td>
          <td> <?php echo $row['name'] ?> </td>
          <td> <?php echo $row['jabatan_struktur'] ?> </td>
          <td> <?php echo $row['dept_struktur'] ?> </td>
          <td> <?php echo $row['join_date_struktur'] ?> </td>
          <?php
          $hd = 0;
          $atl = 0;
          $tlt = 0;
          $al = 0;
          foreach ($arr_tgl as $k => $v) {
            # code...
            $ket = getabsensi($row['badgenumber'], $v);
            if ($ket == "HD") {
              $hd = $hd + 1;
            }
            if ($ket == "ATL") {
              $atl = $atl + 1;
            }
            if ($ket == "TLT") {
              $tlt = $tlt + 1;
            }
            if ($ket == "") {
              $al = $al + 1;
            }
          }
          ?>
          <td><?php echo $hd ?></td>
          <td>0</td>
          <td><?php echo $al ?></td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td><?php echo $atl ?></td>
          <td><?php echo $tlt ?></td>
          <td>0</td>
    <?php
      $no++;
      }
    ?>
</table>