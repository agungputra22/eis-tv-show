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
                <strong class="header">ANALISA JABATAN</strong>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td width="120" class="judul">1. Departemen</td> <td class="isi uppercase"><?php echo $edit['nama_departement'] ?></td>
        </tr>
        <tr>
            <td class="judul">2. Nama Jabatan</td> <td class="isi uppercase"><?php echo $edit['jabatan_karyawan'] ?></td>
        </tr>
        <tr>
            <td class="judul">3. Level Jabatan</td> <td class="isi uppercase"><?php echo $edit['level_jabatan'] ?></td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td class="judul">4. Job Summary (Ikhtisar Jabatan) </td>
        </tr>
        <tr>
            <td class="isi"><?php echo $deskripsi['deskripsi'] ?></td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td class="judul">5. Alur Proses per Jabatan</td>
        </tr>
        <tr>
            <td class="isi">adalah berisi gambaran aktivitas bagi pemegang jabatan mulai dari input, proses / aktivitas sampai dengan output (hasil )</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="isi">
                    <tr>
                        <th>Input</th>
                        <th>Proses</th>
                        <th>Output</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($proses as $row_proses) {
                    ?>
                    <tr>
                        <td><?php echo $row_proses['input'] ?></td>
                        <td><?php echo $row_proses['proses'] ?></td>
                        <td><?php echo $row_proses['output'] ?></td>
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
            <td class="judul">6. Analisa Beban Kerja</td>
        </tr>
        <tr>
            <td class="isi">adalah berisi uraian tugas dan analisa beban kerja dari pemegang jabatan dalam melakukan aktivitas pekerjaannya</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="isi">
                    <tr>
                        <th width="20">NO</th>
                        <th width="450">Detail Job Description</th>
                        <th width="20">Hour</th>
                        <th colspan="2" width="100">Remarks</th>
                    </tr>
                    <tr>
                        <th colspan="4">DAILY BASIC</th>
                        <th width="20">25</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($analisa_1 as $row_1) {
                    ?>
                    <tr>
                        <td><?php echo $no ?> </td>
                        <td><?php echo $row_1['detail_deskripsi'] ?></td>
                        <td><?php echo $row_1['jam'] ?></td>
                        <td colspan="2"><?php echo $row_1['keterangan'] ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                    <tr>
                        <td colspan="2">DAILY - SUB TOTAL HOURS PER MONTH</td>
                        <td><?php echo round($analisa_1_sum['sum_1']) ?></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <th colspan="4">WEEKLY BASIC</th>
                        <th>4</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($analisa_2 as $row_2) {
                    ?>
                    <tr>
                        <td><?php echo $no ?> </td>
                        <td><?php echo $row_2['detail_deskripsi'] ?></td>
                        <td><?php echo $row_2['jam'] ?></td>
                        <td colspan="2"><?php echo $row_2['keterangan'] ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                    <tr>
                        <td colspan="2">WEEKLY - SUB TOTAL HOURS PER MONTH</td>
                        <td><?php echo round($analisa_2_sum['sum_2']) ?></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <th colspan="4">MONTYLY BASIC</th>
                        <th>1</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($analisa_3 as $row_3) {
                    ?>
                    <tr>
                        <td><?php echo $no ?> </td>
                        <td><?php echo $row_3['detail_deskripsi'] ?></td>
                        <td><?php echo $row_3['jam'] ?></td>
                        <td colspan="2"><?php echo $row_3['keterangan'] ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                    <tr>
                        <td colspan="2">MONTHLY - SUB TOTAL HOURS PER MONTH</td>
                        <td><?php echo round($analisa_3_sum['sum_3']) ?></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="5" height="10"></td>
                    </tr>
                    <tr>
                        <td colspan="2">TOTAL MAN HOURS PER MONTH</td>
                        <td><?php echo (round($analisa_1_sum['sum_1']) + round($analisa_2_sum['sum_2']) + round($analisa_3_sum['sum_3'])) ?></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2">TOTAL WORK HOURS PER MONTH</td>
                        <td>176</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2">TOTAL MAN POWER NEEDED</td>
                        <td><?php echo round((round($analisa_1_sum['sum_1']) + round($analisa_2_sum['sum_2']) + round($analisa_3_sum['sum_3'])) / 176, 2) ?></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2">MPP ACC</td>
                        <td><?php echo $edit['mpp'] ?></td>
                        <td colspan="2"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td class="judul">7. Resiko Kerja</td>
        </tr>
        <tr>
            <td class="isi">adalah berisi identifikasi potensi penyakit atau kecelakaan kerja yang akan timbul akibat dari aktivitas pemegang jabatan</td>
        </tr>
        <tr>
            <td>
                <table width="100%" border="1" class="isi">
                    <tr>
                        <th width="20">No</th>
                        <th width="300">Nama Penyakit / Jenis Kecelakaan Kerja</th>
                        <th width="300">Penyebab</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($resiko as $row_resiko) {
                    ?>
                    <tr>
                        <td><?php echo $no ?> </td>
                        <td><?php echo $row_resiko['nama_penyakit'] ?></td>
                        <td><?php echo $row_resiko['penyebab'] ?></td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
    <br> <br>
    Jakrta, <?php echo DateToIndo(date('Y-m-d')); ?>
    <table border="1" width="100%">
        <tr align="center">
            <td>Dibuat oleh,</td>
            <td>Diverifikasi oleh,</td>
            <td colspan="3">Diketahui oleh,</td>
            <td>Disetujui oleh,</td>
        </tr>
        <tr>
            <td height="70"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr align="center">
            <td></td>
            <td>DIAN ATMA RIYANTI</td>
            <td></td>
            <td>ARI HERMAWAN</td>
            <td>SANDRA YULIANA</td>
            <td>VICTOR ADIGUNA</td>
        </tr>
        <tr align="center">
            <td><b>Supervisor / Asst.Man</b></td>
            <td><b>ODIR & PR Spv</b></td>
            <td><b>Ka. Departement</b></td>
            <td><b>HRD MANAGER</b></td>
            <td><b>FA & PC Manager</b></td>
            <td><b>General Manager</b></td>
        </tr>
    </table>
</body>
</html>