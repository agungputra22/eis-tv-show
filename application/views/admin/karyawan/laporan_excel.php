<table border="1">
    <tr>
      <th>No</th>
      <th>NIK Lama</th>
      <th>NIK Baru</th>
      <th>Nama Karyawan</th>
      <th>Job Title Name</th>
      <th>Service Periode</th>
      <th>Start Date</th>
      <th>Join Date</th>
      <th>Kantor Type</th>
      <th>Kontrak Start</th>
      <th>Kontrak End</th>
      <th>Job Level Name</th>
      <th>Nama Departement</th>
      <th>Nama Kantor Cabang</th>
      <th>Nama Kantor</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Umur</th>
      <th>Kelamin</th>
      <th>Status Pernikahan</th>
      <th>Golongan Darah</th>
      <th>Agama</th>
      <th>Telp Rumah</th>
      <th>No Hp</th>
      <th>Alamat Rumah</th>
      <th>Alamat Tempat Tinggal</th>
      <th>Email</th>
      <th>Education Status</th>
      <th>Education Level Name</th>
      <th>Education Major Name</th>
      <th>Institution Name</th>
      <th>No BPJS Kesehatan</th>
      <th>No BPJS Ketenagakerjaan</th>
      <th>No NPWP</th>
      <th>Id Type</th>
      <th>Id Number</th>
      <th>Status Karyawan</th>
    </tr>
    <?php
    $no=1;
    $total=0;
    foreach ($record->result() as $r)
    {
        echo "<tr>
              <td width='10'>$no</td>
              <td width='160'>$r->badgenumber_old</td>
              <td width='160'>$r->badgenumber</td>
              <td width='160'>$r->name</td>
              <td width='160'>$r->job_title_name</td>
              <td width='160'>$r->service_periode</td>
              <td width='160'>$r->start_date</td>
              <td width='160'>$r->join_date</td>
              <td width='160'>$r->type_kantor</td>
              <td width='160'>$r->kontrak_start</td>
              <td width='160'>$r->kontrak_end</td>
              <td width='160'>$r->jabatan_id</td>
              <td width='160'>$r->departement_id</td>
              <td width='160'>$r->depo_id</td>
              <td width='160'>$r->nama_kantor</td>
              <td width='160'>$r->tempat_lahir</td>
              <td width='160'>$r->tanggal_lahir</td>
              <td width='160'>$r->umur</td>
              <td width='160'>$r->kelamin</td>
              <td width='160'>$r->status</td>
              <td width='160'>$r->gol_darah</td>
              <td width='160'>$r->agama</td>
              <td width='160'>$r->original_phone</td>
              <td width='160'>$r->mobile_phone</td>
              <td width='160'>$r->residential_street</td>
              <td width='160'>$r->original_street</td>
              <td width='160'>$r->email</td>
              <td width='160'>$r->education_status</td>
              <td width='160'>$r->education_level_name</td>
              <td width='160'>$r->education_major_name</td>
              <td width='160'>$r->institution_name</td>
              <td width='160'>$r->no_bpjs_kes</td>
              <td width='160'>$r->no_bpjs_tk</td>
              <td width='160'>$r->no_npwp</td>
              <td width='160'>$r->id_type</td>
              <td width='160'>$r->id_number</td>
              <td width='160'>$r->status_karyawan</td>
              </tr>";
        $no++;
    }
    ?>
</table>