<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th rowspan="2">No. </th>
            <th rowspan="2">Nama Perusahaan</th>
            <th rowspan="2">Jabatan Awal</th>
            <th colspan="2">Jabatan Awal</th>
            <th rowspan="2">Jabatan Akhir</th>
            <th colspan="2">Jabatan Akhir</th>
            <th rowspan="2">Tahun Keluar</th>
            <th rowspan="2">Alasan Keluar</th>
            <th rowspan="2">Gaji Terakhir</th>
            <th rowspan="2">Telp. Perusahaan</th>
            <th rowspan="2">Nama Atasan</th>
            <th rowspan="2">Nama Referensi</th>
            <th rowspan="2">Kontak Referensi</th>
          </tr>
          <tr>
            <th> Start </th>
            <th> End </th>
            <th> Start </th>
            <th> End </th>
          </tr>
        </thead>
        <tbody id="detail_cart">
            <?php
            $no = 1;
            foreach ($listdata as $row) {
            ?>
            <tr>
                <td> <?php echo $no ?> </td>
                <td> <?php echo $row['nama_perusahaan'] ?> </td>
                <td> <?php echo $row['jabatan_awal'] ?> </td>
                <td> <?php echo $row['jabatan_awal_start'] ?> </td>
                <td> <?php echo $row['jabatan_awal_end'] ?> </td>
                <td> <?php echo $row['jabatan_akhir'] ?> </td>
                <td> <?php echo $row['jabatan_akhir_start'] ?> </td>
                <td> <?php echo $row['jabatan_akhir_end'] ?> </td>
                <td> <?php echo $row['tahun_keluar'] ?> </td>
                <td> <?php echo $row['alasan_keluar'] ?> </td>
                <td> <?php echo $row['gaji_terakhir'] ?> </td>
                <td> <?php echo $row['no_telp_perusahaan'] ?> </td>
                <td> <?php echo $row['nama_atasan'] ?> </td>
                <td> <?php echo $row['nama_referensi'] ?> </td>
                <td> <?php echo $row['no_kontak_referensi'] ?> </td>
            </tr>
            <?php
            $no++;
            }
            ?>
        </tbody>
    </table>
</div>