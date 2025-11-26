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
    </style>
</head>
<body onload="window.print()">
    <table width="100%">
        <tr class="header">
            <td>
                <img width="80" height="70" src="<?php echo base_url($this->config->item('img_path').'logo_tvip.jpeg') ?>">
            </td>
            <td colspan="2" align="center" class="uppercase">
                <strong>PT. TIRTA VARIA INTIPRATAMA</strong><br>
                <small>Jl. Kedoya Raya No.1 Kebon Jeruk - Jakarta Barat 11520</small><br>
                <small>Tlp : 021 – 58354526 - 7 / 5802851 Fax : 021 - 58350026</small>
            </td>
            <td>
                <img width="60" height="50" src="<?php echo base_url($this->config->item('img_path').'sgs.png') ?>">
            </td>
        </tr>
        <tr>
            <td colspan="4"> <hr> </td>
        </tr>
        <tr>
            <td colspan="4" align="center"><u><strong>SURAT KETERANGAN KERJA</strong></u></td>
        </tr>
        <tr>
            <small>
                <?php
                    $bulan = date('n');
                    $romawi = getRomawi($bulan);
                    $tahun = date ('Y');
                    $no = $edit['id_clearance'];
                    echo "<td colspan='4' align='center'><small>No. $no/HRD&QMS-TVIP/SKK/$romawi/$tahun<br></small></td>";
                ?>
            </small>
        </tr>
        <tr>
            <td colspan="2"><br>Yang bertanda tangan di bawah ini menerangkan bahwa :<br><br></td>
        </tr>
    </table>
    <table>
        <tr>
            <td>Nama</td> <td>:</td>
            <td><?php echo $edit['nama_clearance'] ?></td>
        </tr>
        <tr>
            <td>NIK</td> <td>:</td>
            <td><?php echo $edit['nik_baru'] ?></td>
        </tr>
        <tr>
            <td>Jabatan</td> <td>:</td>
            <td><?php echo $edit['jabatan_clearance'] ?></td>
        </tr>

        <tr>
            <td>Departement</td> <td>:</td>
            <td><?php echo $edit['dept_clearance'] ?></td>
        </tr>

        <tr>
            <td>Lokasi</td> <td>:</td>
            <td><?php echo $edit['depo_clearance'] ?></td>
        </tr>
    </table>
    <table>
        <tr>
            <td colspan="4" class="justify">Adalah  benar  pernah  bekerja  di PT. Tirta Varia Intipratama sejak tanggal <?php echo DateToIndo(date($edit['tanggal_bergabung_clearance'])); ?> Dan terhitung mulai tanggal <?php echo DateToIndo(date($edit['tanggal_resign_clearance'])); ?> yang bersangkutan mengundurkan diri dan sudah tidak aktif bekerja di PT. Tirta Varia Intipratama.<br><br></td>
        </tr>

        <tr>
            <td colspan="4">Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.<br><br><br><br><br><br></td> <br>
        </tr>

        <tr>
            <td colspan="4" align="right"><small>Jakarta , ……………………</small></td>
        </tr>

        <tr>
            <td colspan="4" align="right"><small>PT. Tirta Varia Intipratama<br><br><br><br><br></small></td>
        </tr>

        <tr>
            <td colspan="4" align="right"><u><small>ARI HERMAWAN</small></u></td>
        </tr>

        <tr>
            <td colspan="4" align="right"><small>HRD & QMS Manager</small></td>
        </tr>
    </table>
    
</body>
</html>