<table border="1">
    <tr>
      <th> NO. </th>
      <th> NIK </th>
      <th> Nama </th>
      <th> Jabatan </th>
      <th> Lokasi </th>
      <th> Departement </th>
      <th> Tanggal Bergabung </th>
      <th> Tanggal Absen </th>
      <th> F1 </th>
      <th> F4 </th>
      <th colspan="2"> Jam Kerja </th>
      <th> Kategori </th>
      <th> Absensi </th>
      <th> Keterangan Absensi </th>
    </tr>
    <?php
      $no = 1;
      foreach ($record as $row) {
      ?>
      <tr>
          <td> <?php echo $no ?> </td>
          <td> <?php echo $row['nik_baru'] ?> </td>
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
      </tr>
      <?php
      $no++;
      }
    ?>
</table>