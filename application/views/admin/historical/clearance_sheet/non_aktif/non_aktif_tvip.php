<!DOCTYPE html>
<html>
<head>
    <title>edit Paklaring</title>
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
                <img width="70" height="70" src="<?php echo base_url($this->config->item('img_path').'logo_tvip.jpeg') ?>">
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
                    echo "<td colspan='4'><small>$no/HRD&QMS-TVIP/SK/$romawi/$tahun<br></small></td>";
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
            <td colspan="4">Kepada Yth,</td>
        </tr>
        <tr>
            <td colspan="4">Bapak Kepala Dinas Tenaga Kerja<br><br></td>
        </tr>
        <tr>
            <td colspan="4">Dengan Hormat<br><br></td>
        </tr>
        <tr>
            <td colspan="4">Sebagai salah satu persyaratan <b>Pencairan Saldo Jaminan Hari Tua BPJS Ketenagakerjaan</b>. <br>Dengan ini menerangkan bahwa:<br><br></td>
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
    <table width="100%">
        <tr>
            <td class="justify" colspan="2">Adalah  benar  pernah  bekerja  di PT. Tirta Varia Intipratama sejak tanggal <?php echo DateToIndo(date($edit['tanggal_bergabung_clearance'])); ?> Dan terhitung mulai tanggal <?php echo DateToIndo(date($edit['tanggal_resign_clearance'])); ?> yang bersangkutan <b>mengundurkan diri dan sudah tidak aktif bekerja</b> di PT. Tirta Varia Intipratama.<br><br></td>
        </tr>

        <tr>
            <td colspan="2">Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.<br><br><br><br></td> <br>
        </tr>

        <tr>
            <td><small>Serang, ……………………</small></td>
        </tr>

        <tr>
            <td><small>PT. Tirta Varia Intipratama</small><br><br><br><br><br></td>
            <td colspan="3"><b>Mengetahui</b><br><br><br><br><br></td>
        </tr>

        <tr>
            <td><u><small>ARI HERMAWAN</small></u></td>
            <td colspan="3"><u><small>SUDIN</small></u></td>
        </tr>

        <tr>
            <td><small>HRD & QMS Manager</small></td>
        </tr>
    </table>
    
</body>
</html>