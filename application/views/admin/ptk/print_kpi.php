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
                <strong class="header">KPI (Key Performance Indicator)</strong>
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
            <td class="judul" align="center"><b>KUANTITATIF</b></td>
        </tr>
        <tr>
            <td class="isi">adalah berisi sasaran / target dari pemegang jabatan yang harus dicapai dalam melakukan aktivitas pekerjaannya dan dilakukan pengukuran secara periodik.</td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1" class="isi">
        <tr>
            <th> No. </th>
            <th> Uraian </th>
            <th> Evaluasi Periodik </th>
            <th> Bobot* </th>
            <th> Target </th>
        </tr>
        <?php
        $no = 1;
        foreach ($kuantitatif as $row) {
        ?>
        <tr>
            <td width="20"><?php echo $no ?></td>
            <td><?php echo $row['deskripsi'] ?></td>
            <td><?php echo $row['evaluasi'] ?></td>
            <td><?php echo $row['bobot'] ?></td>
            <td><?php echo $row['target'] ?></td>
        </tr>
        <?php
        $no++;
        }
        ?>
    </table>
    Keterangan : * = bila menggunakan bobot
    </br>
    </br>
    <table width="100%" border="1">
        <tr>
            <td class="judul" align="center"><b>KUALITATIF</b></td>
        </tr>
        <tr>
            <td class="isi">adalah berisi sasaran / target dari pemegang jabatan yang perlu dilakukan dalam meminimalisir / mengantisifasi atas ketidaksesuaian.</td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1" class="isi">
        <tr>
            <th> No. </th>
            <th> Uraian </th>
        </tr>
        <?php
        $no = 1;
        foreach ($kualitatif as $row) {
        ?>
        <tr>
            <td width="20"><?php echo $no ?></td>
            <td><?php echo $row['deskripsi'] ?></td>
        </tr>
        <?php
        $no++;
        }
        ?>
    </table>
</body>
</html>