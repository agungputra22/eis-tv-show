<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url() ?>assets/apps/css/custom.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body {
            font-family: Times New Roman, Verdana, Segoe, sans-serif;
            font-size: 11pt;
        }

        .header {
            font-family: Times New Roman, Verdana, Segoe, sans-serif;
            font-size: 20pt;
        }

        .judul {
            font-family: Times New Roman, Verdana, Segoe, sans-serif;
            font-size: 10pt;
        }

        .isi {
            font-family: Times New Roman, Verdana, Segoe, sans-serif;
            font-size: 9pt;
        }

        div {
            margin-right: 40px;
            margin-left: 40px;
        }
    </style>
</head>
<body onload="window.print()">
    <!-- <div> -->
    <table width="100%" border="1">
        <tr class="header">
            <td rowspan="2" align="center">
                <img width="90" height="80" src="<?php echo base_url($this->config->item('img_path').'logo_tvip.jpeg') ?>">
            </td>
            <td colspan="2" align="center" class="uppercase">
                <strong class="header">PT. TIRTA VARIA INTIPRATAMA</strong>
            </td>
        </tr>
        <tr>
             <td colspan="2" align="center" class="uppercase">
                <strong class="header">JOB DESCRIPTION</strong>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td width="120" class="judul">Departemen</td> <td class="isi uppercase"><?php echo $edit['nama_departement'] ?></td>
        </tr>
        <tr>
            <td class="judul">Nama Jabatan</td> <td class="isi uppercase"><?php echo $edit['jabatan_karyawan'] ?></td>
        </tr>
        <tr>
            <td class="judul">Level Jabatan</td> <td class="isi uppercase"><?php echo $edit['level_jabatan'] ?></td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td class="judul">1. TUGAS DAN TANGGUNG JAWAB</td>
        </tr>
        <tr>
            <td class="isi">Adalah berisi uraian tugas dan tanggung jawab dari pemegang jabatan dalam melakukan aktivitas pekerjaannya, bisa tugas dan tanggung jawab harian maupun berkala.</td>
        </tr>
        <tr>
            <td>
                <table width="100%" class="isi">
                    <?php
                    $no = 1;
                    foreach ($tugas as $row) {
                    ?>
                    <tr>
                        <td width="20"><?php echo $no ?></td>
                        <td><?php echo $row['tugas'] ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td class="judul">2. WEWENANG</td>
        </tr>
        <tr>
            <td class="isi">Adalah berisi wewenang yang diberikan kepada pemegang jabatan dalam melaksanakan tugas dan tanggung jawabnya dan halhal apa saja yang diberikan kepada pemegang jabatan ini tetapi tidak diberikan kepada jabatan lainnya.</td>
        </tr>
        <tr>
            <td>
                <table width="100%" class="isi">
                    <?php
                    $no = 1;
                    foreach ($wewenang as $row) {
                    ?>
                    <tr>
                        <td width="20"><?php echo $no ?></td>
                        <td><?php echo $row['keterangan'] ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td class="judul">3. HUBUNGAN KERJA</td>
        </tr>
        <tr>
            <td class="isi">Adalah berisi dengan siapa saja pemegang jabatan berhubungan / bekerja sama untuk kelancaran tugasnya baik didalam maupun diluar perusahaan.</td>
        </tr>
        <tr>
            <td class="isi"><b>Internal Perusahaan</b> (Didalam lingkungan PT. TVIP & Strategic Business Unit / SBU )</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="isi">
                    <tr>
                        <th width="20">NO. </th>
                        <th>Berhubungan Dengan Pihak</th>
                        <th>Tujuan Dalam Berhubungan</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($internal as $row) {
                    ?>
                    <tr>
                        <td width="20"><?php echo $no ?></td>
                        <td><?php echo $row['pihak'] ?></td>
                        <td><?php echo $row['tujuan'] ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </table>
            </td>
        </tr>
        <tr>
            <td class="isi"><b>Eksternal Perusahaan</b> (Didalam lingkungan PT. TVIP & Strategic Business Unit / SBU )</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="isi">
                    <tr>
                        <th width="20">NO. </th>
                        <th>Berhubungan Dengan Pihak</th>
                        <th>Tujuan Dalam Berhubungan</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($eksternal as $row) {
                    ?>
                    <tr>
                        <td width="20"><?php echo $no ?></td>
                        <td><?php echo $row['pihak'] ?></td>
                        <td><?php echo $row['tujuan'] ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td class="judul">4. PELAPORAN</td>
        </tr>
        <tr>
            <td class="isi">Adalah berisi laporan yang dibuat oleh pemegang jabatan sebagai pelaporan hasil dari tugas pekerjaannya.</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="isi">
                    <tr>
                        <th width="200">PERIODE PELAPORAN</th>
                        <th>NAMA LAPORAN</th>
                        <th>DITUJUKAN KEPADA</th>
                    </tr>
                    <tr>
                        <td>Harian</td>
                        <td><?php echo $pelaporan['laporan_harian'] ?></td>
                        <td><?php echo $pelaporan['kepada_harian'] ?></td>
                    </tr>
                    <tr>
                        <td>Bulanan</td>
                        <td><?php echo $pelaporan['laporan_bulanan'] ?></td>
                        <td><?php echo $pelaporan['kepada_bulanan'] ?></td>
                    </tr>
                    <tr>
                        <td>Tahunan</td>
                        <td><?php echo $pelaporan['laporan_tahunan'] ?></td>
                        <td><?php echo $pelaporan['kepada_tahunan'] ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td class="judul">5. SPESIFIKASI JABATAN</td>
        </tr>
        <tr>
            <td class="isi">adalah berisi persyaratan yang harus dipenuhi oleh pemegang jabatan.</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="isi">
                    <tr>
                        <th colspan="2">SPESIFIKASI</th>
                    </tr>
                    <tr>
                        <td>PENDIDIKAN FORMAL (MINIMAL)</td>
                        <td><?php echo $spesifikasi['pendidikan'] ?></td>
                    </tr>
                    <tr>
                        <td>NILAI RATA-RATA / IPK (MINIMAL)</td>
                        <td><?php echo $spesifikasi['nilai'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">PENGALAMAN :</td>
                    </tr>
                    <tr>
                        <td>Fresh Graduate</td>
                        <td><?php echo $spesifikasi['pengalaman_lulus'] ?></td>
                    </tr>
                    <tr>
                        <td>Jurusan sesuai dengan bidang pekerjaan</td>
                        <td><?php echo $spesifikasi['pengalaman_sesuai'] ?></td>
                    </tr>
                    <tr>
                        <td>Jurusan tidak sesuai dengan bidang pekerjaan</td>
                        <td><?php echo $spesifikasi['pengalaman_tidak_sesuai'] ?></td>
                    </tr>
                    <tr>
                        <td>JENIS KELAMIN</td>
                        <td><?php echo $spesifikasi['jenis_kelamin'] ?></td>
                    </tr>
                    <tr>
                        <td>USIA</td>
                        <td><?php echo $spesifikasi['usia'] ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="isi">
                    <tr>
                        <th colspan="3">STANDAR KOMPETENSI</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="isi">adalah berisi standar pengetahuan dan keterampilan yang harus dimiliki pemegang jabatan untuk dapat berhasil dalam melaksanakan tugasnya.</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="isi">
                    <tr>
                        <td>PENDIDIKAN FORMAL (MINIMAL)</td>
                        <td><?php echo $spesifikasi['pendidikan'] ?></td>
                    </tr>
                    <tr>
                        <td>NILAI RATA-RATA / IPK (MINIMAL)</td>
                        <td><?php echo $spesifikasi['nilai'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">PENGALAMAN :</td>
                    </tr>
                    <tr>
                        <td>Fresh Graduate</td>
                        <td><?php echo $spesifikasi['pengalaman_lulus'] ?></td>
                    </tr>
                    <tr>
                        <td>Jurusan sesuai dengan bidang pekerjaan</td>
                        <td><?php echo $spesifikasi['pengalaman_sesuai'] ?></td>
                    </tr>
                    <tr>
                        <td>Jurusan tidak sesuai dengan bidang pekerjaan</td>
                        <td><?php echo $spesifikasi['pengalaman_tidak_sesuai'] ?></td>
                    </tr>
                    <tr>
                        <td>JENIS KELAMIN</td>
                        <td><?php echo $spesifikasi['jenis_kelamin'] ?></td>
                    </tr>
                    <tr>
                        <td>USIA</td>
                        <td><?php echo $spesifikasi['usia'] ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td class="judul" colspan="2">6. STRUKTUR ORGANISASI</td>
        </tr>
        <tr>
            <td class="isi" colspan="2">Data Terlampir.</td>
        </tr>
        <tr>
            <td>Tanggal : <?php echo DateToIndo(date('Y-m-d')); ?></td>
            <td width="200">Revisi : </td>
        </tr>
    </table>
    <br> <br>
    <table border="1" width="100%">
        <tr align="center">
            <td>Dibuat oleh,</td>
            <td>Diverifikasi oleh,</td>
            <td>Diketahui oleh,</td>
            <td>Disetujui oleh,</td>
        </tr>
        <tr>
            <td height="70"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr align="center">
            <td height="10"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr align="center">
            <td height="10"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    * Approval job desc menyesuaikan dengan Standar dokumen No.SD.HRD.08 - Standart Approval Job Desc
</body>
</html>