<table border="1">
    <tr>
      <th bgcolor="yellow"> NO. </th>
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
          <td> <?php echo $row['badgenumber'] ?> </td>
          <td> <?php echo $row['name'] ?> </td>
          <td> <?php echo $row['jabatan_struktur'] ?> </td>
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
      <td bgcolor="blue"> TLT </td> <td>Terlambat</td>
      <td bgcolor="blue"> DN </td> <td>Dinas</td>
      <td bgcolor="blue"> TL </td> <td>Tidak Lengkap</td>
    </tr>
</table>