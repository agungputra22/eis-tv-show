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
                <img width="80" height="70" src="<?php echo base_url($this->config->item('img_path').'logo_mrt.png') ?>">
            </td>
            <td align="center" class="uppercase">
                <strong>CV. METRO RAYA TRANS</strong><br>
                <small>Kp. Tlajung RT. 004 RW 002, Desa Wanaherang Gunung Putri<br>Bogor, Jawa Barat</small><br>
                <small>Telp : (021) 8686 2773 / (021) 9865 9983</small><br>
            </td>
            <td>
                <img width="80" height="50" src="<?php echo base_url($this->config->item('img_path').'blank.png') ?>">
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
                    echo "<td colspan='4' align='center'><small>No. $no/HRD&QMS-MRT/SKK/$romawi/$tahun<br></small></td>";
                ?>
            </small>
        </tr>
        <tr>
            <td colspan="2"><br>Yang bertanda tangan di bawah ini menerangkan bahwa :<br></td>
        </tr>
    </table>
    <table>
        <tr>
            <td>Nama</td> <td>:</td>
            <td><?php echo $edit['nama_clearance'] ?> </td>
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
            <td>Pool</td> <td>:</td>
            <td><?php echo $edit['depo_clearance'] ?></td>
        </tr>
        <tr>
            <td colspan="3" class="justify"><br>Adalah  benar  pernah  bermitra  di CV. Metro Raya Trans sejak tanggal <?php echo DateToIndo(date($edit['tanggal_bergabung_clearance'])); ?> Dan terhitung mulai tanggal <?php echo DateToIndo(date($edit['tanggal_resign_clearance'])); ?> yang bersangkutan mengundurkan diri dan sudah tidak aktif bermitra di CV. Metro Raya Trans.<br><br></td>
        </tr>

        <tr>
            <td colspan="3">Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.<br><br><br><br><br><br></td> <br>
        </tr>

        <tr>
            <td colspan="3" align="right"><small>Bogor , ……………………</small></td>
        </tr>

        <tr>
            <td colspan="3" align="right"><small>CV. Metro Raya Trans<br><br><br><br><br></small></td>
        </tr>

        <tr>
            <td colspan="3" align="right"><u><small>IBRAHIM ADI SANTOSO</small></u></td>
        </tr>

        <tr>
            <td colspan="3" align="right"><small>Direktur</small></td>
        </tr>
    </table>
    
</body>
</html>