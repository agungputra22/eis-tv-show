<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url() ?>assets/apps/css/custom.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body {
            font-family: Trebuchet MS, Verdana, Segoe, sans-serif;
            font-size: 11pt;
        }

        .perusahaan {
            font-family: Tahoma, Verdana, Segoe, sans-serif;
            font-size: 16pt;
        }

        .perusahaan {
            font-family: Tahoma, Verdana, Segoe, sans-serif;
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
    <table width="100%">
        <tr class="header">
            <td>
                <img width="90" height="80" src="<?php echo base_url($this->config->item('img_path').'logo_tvip.jpeg') ?>">
            </td>
            <td colspan="2" align="center" class="uppercase">
                <strong>PT. TIRTA VARIA INTIPRATAMA</strong><br>
                <small>Jl. Kedoya Raya No.1 Kebon Jeruk - Jakarta Barat 11520</small><br>
                <small>Tlp : 021 – 58354526 - 7 / 5802851 Fax : 021 - 58350026</small>
            </td>
            <td>
                <img width="130" height="100" src="<?php echo base_url($this->config->item('img_path').'sgs.png') ?>">
            </td>
        </tr>
    </table>
    <table width="100%">
        <tr bgcolor="black">
            <td colspan="4" bgcolor="black"> <hr size="2px" color="black"> </td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td colspan="4" align="center"><u><strong>SURAT PENUNJUKAN PEJABAT SEMENTARA</strong></u></td>
        </tr>
        <tr>
            <small>
                <?php
                    $bulan = date('n');
                    $romawi = getRomawi($bulan);
                    $tahun = date ('Y');
                    $no = $edit['no_pengajuan'];
                    echo "<td colspan='4' align='center'><small>No. $no/HRD-TVIP/SPJS/$romawi/$tahun<br></small></td>";
                ?>
            </small>
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td colspan="4" class="justify">Sesuai dengan adanya pengajuan perubahan data karyawan dengan No. 
                <?php
                    $bulan = date('n');
                    $romawi = getRomawi($bulan);
                    $tahun = date ('Y');
                    $no = $edit['no_pengajuan'];
                    echo "$no/HRD-TVIP/IM/$romawi/$tahun";
                ?>
            mengenai proses <b>Penunjukan Pejabat Sementara (Pjs)</b>, maka dengan ini kami informasikan untuk proses <b>Masa On the Job Training (OJT)</b> karyawan berikut :<br><br></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><strong>NAMA KARYAWAN : <?php echo $edit['nama_karyawan_mutasi'] ?></strong></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><strong>NIK KARYAWAN : <?php echo $edit['nik_lama'] ?></strong></td>
        </tr>
    </table>
    <br>
    <table width="80%" border="1" align="center">
        <tr>
            <td align="center">Keterangan</td> 
            <td align="center" width="200">Sebelumnya</td>
            <td align="center" width="200">Baru</td>
        </tr>
        <tr>
            <td align="center">Jabatan</td> 
            <td align="center"><?php echo $edit['jabatan_awal'] ?></td>
            <td align="center"><?php echo $edit['jabatan_baru'] ?></td>
        </tr>
        <tr>
            <td align="center">Lokasi</td> 
            <td align="center"><?php echo $edit['lokasi_awal'] ?></td>
            <td align="center"><?php echo $edit['lokasi_baru'] ?></td>
        </tr>
    </table>
    <br><br>    
    <table>
        <tr>
            <?php
                $permintaan = $edit['permintaan'];
                if ($permintaan == 'promosi') {
                    ?>
                    <td colspan="4" class="justify">Masa Pjs tersebut efektif sejak tanggal <?php echo DateToIndo(date($edit['tanggal_efektif_pjs'])); ?> s/d <?php echo DateToIndo(date('Y-m-d', strtotime('+6 MONTH -1 DAY', strtotime($edit['tanggal_efektif_pjs'])))); ?><br><br></td>
                    <?php
                }
                if ($permintaan <> 'promosi') {
                    ?>
                    <td colspan="4" class="justify">Masa Pjs tersebut efektif sejak tanggal <?php echo DateToIndo(date($edit['tanggal_efektif_pjs'])); ?> s/d <?php echo DateToIndo(date('Y-m-d', strtotime('+6 MONTH -1 DAY', strtotime($edit['tanggal_efektif_pjs'])))); ?><br><br></td>
                    <?php
                }
            ?>
        </tr>
        <tr>
            <td colspan="4" class="justify">Penunjukan tersebut diatas bertujuan untuk melakukan pemenuhan terkait kebutuhan pada posisi tersebut di atas dan sekaligus dalam rangka pengembangan karyawan. Untuk segala hak yang terkait dengan penunjukan diatas dapat dilampirkan dengan menggunakan Form Usulan Hak Karyawan (FRM.HRD.02). <br><br></td>
        </tr>
        <tr>
            <td colspan="4" class="justify">Jika setelah di lakukan evaluasi selama masa PJS tersebut karyawan dinyatakan tidak memenuhi kualifikasi, maka untuk usulan hak dikembalikan ke posisi sebelumnya.<br><br></td>
        </tr>
        <tr>
            <td colspan="4" class="justify">Demikian Surat Penunjukan Pjs ini disampaikan, atas perhatian dan kerjasamanya diucapkan terima kasih.<br><br></td>
        </tr>
        <tr>
            <td>
                Jakarta,&nbsp;
                <?php
                    $tahun = DateToIndo(date('Y-m-d'));
                    echo $tahun;
                ?><br><br><br><br><br>
            </td>
        </tr>
    </table>
    <table width="95%" align="center">
        <tr>
            <td align="left">Diajukan oleh,<br><br><br><br><br></td>
            <td align="right">Diketahui oleh,<br><br><br><br><br></td>
        </tr>

        <tr>
            <td><u><?php echo $edit['nama_karyawan_struktur'] ?></u></td>
            <td align="right"></td>
        </tr>

        <tr>
            <td><?php echo $edit['jabatan_karyawan'] ?></td>
            <td align="right">HRD Manager</td>
        </tr>
    </table>
    </div>
</body>
</html>