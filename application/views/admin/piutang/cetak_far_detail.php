<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url() ?>assets/apps/css/custom.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body {
            font-family: Tahoma, Verdana, Segoe, sans-serif;
            font-size: 10pt;
        }

        .header {
            font-size: 12pt;
        }

        .justify { 
            text-align: justify;
        }
        div {
            margin-right: 40px;
            margin-left: 40px;
        }
    </style>
</head>
<body onload="window.print()">
    <div>
    <table width="100%" border="1">
        <tr>
            <td colspan="4" height="20"></td>
        </tr>
        <tr bgcolor="grey">
            <td colspan="4" align="center"><strong>SKEMA PEMBEBANAN <?php echo $edit['no_pengajuan']; ?> BULAN <?php echo BulanPengajuan($edit['tanggal_far']); ?></strong></td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <thead>
            <tr role="row" class="bg-primary">
                <th>NO. </th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Join Date</th>
                <th>Nominal</th>
                <th>Cicilan</th>
            </tr>
        </thead>
        <tbody> 
        <?php
        $no = 1;
        foreach ($listdata as $row) {
        ?>
        <tr>
            <td> <?php echo $no ?> </td>
            <td> <?php echo $row['nik_baru'] ?> </td>
            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
            <td> <?php echo $row['perusahaan_struktur'] ?> </td>
            <td> <?php echo $row['join_date_struktur'] ?> </td>
            <td> <?php echo number_format($row['piutang'], 0, ",", ".") ?> </td>
            <td> <?php echo $row['cicilan'] ?> </td>
        </tr>
        <?php
        $no++;
        }
        ?>
        </tbody>
    </table>
    </div>
</body>
</html>