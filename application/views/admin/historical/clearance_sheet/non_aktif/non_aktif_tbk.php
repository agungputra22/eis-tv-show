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
    </style>
</head>
<body onload="window.print()">
    <table width="100%">
        <tr class="header">
            <td>
                <img width="80" height="70" src="<?php echo base_url($this->config->item('img_path').'logo_tbk.png') ?>">
            </td>
            <td colspan="2" align="center" class="uppercase">
                <strong>CV. TERANG BERKAT KARUNIA</strong><br>
                <small>JL. Raya Sukabumi KP. Cimande Hilir RT. 001 RW. 004 Cimande Hilir, Caringin<br>Bogor, Jawa Barat</small><br>
                <small>Telp : (0251) 8246458</small>
            </td>
            <td>
                <img width="80" height="50" src="<?php echo base_url($this->config->item('img_path').'blank.png') ?>">
            </td>
        </tr>
        <tr>
            <td colspan="4"> <hr> </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <small>No
                </small>
            </td>
            <td> : </td>
            <small>
                <?php
                    $bulan = date('n');
                    $romawi = getRomawi($bulan);
                    $tahun = date ('Y');
                    $no = $edit['id_clearance'];
                    echo "<td colspan='4'><small>$no/HRD&QMS-TBK/SK/$romawi/$tahun<br></small></td>";
                ?>
            </small>
        </tr>
        <tr>
            <td>
                <small>Lamp
                </small>
            </td>
            <td> : </td>
            <td>
                <small>1 (satu) Rangkap
                </small>
            </td>
        </tr>
        <tr>
            <td>
                <small>Hal
                </small>
            </td>
            <td> : </td>
            <td>
                <small>Keterangan Non Aktif Kerja
                </small>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td colspan="2">Kepada Yth,</td>
        </tr>
        <tr>
            <td colspan="2">Bapak Kepala Dinas Tenaga Kerja<br><br></td>
        </tr>
        <tr>
            <td colspan="2">Dengan Hormat<br><br></td>
        </tr>
        <tr>
            <td colspan="4">Sebagai salah satu persyaratan <b>Pencairan Saldo Jaminan Hari Tua BPJS Ketenagakerjaan</b>.<br> Dengan ini menerangkan bahwa:<br><br></td>
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
    </table>
    <table>
        <tr>
            <td colspan="4">Adalah  benar  pernah  bekerja  di CV. Terang Berkat Karunia sejak tanggal <?php echo DateToIndo(date($edit['tanggal_bergabung_clearance'])); ?> Dan terhitung mulai tanggal <?php echo DateToIndo(date($edit['tanggal_resign_clearance'])); ?> yang bersangkutan <b>mengundurkan diri dan sudah tidak aktif bekerja</b> di CV. Terang Berkat Karunia.<br><br></td>
        </tr>

        <tr>
            <td colspan="3">Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.<br><br><br><br></td> <br>
        </tr>

        <tr>
            <td colspan="4" align="left"><small>Bogor , ……………………</small></td>
        </tr>

        <tr>
            <td colspan="3"><small>CV. Terang Berkat Karunia</small><br><br><br><br><br></td>
            <td><b>Mengetahui</b><br><br><br><br><br></td>
        </tr>

        <tr>
            <td colspan="3"><u><small>IBRAHIM ADI SANTOSO</small></u></td>
            <td><u><small>SUDIN</small></u></td>
        </tr>

        <tr>
            <td colspan="4" align="left"><small>Direktur</small></td>
        </tr>
    </table>
    
</body>
</html>