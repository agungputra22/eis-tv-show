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
                <strong class="perusahaan">PT. TIRTA VARIA INTIPRATAMA</strong><br>
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
            <td colspan="4" align="center"><u><strong>SURAT KEPUTUSAN</strong></u></td>
        </tr>
        <tr>
            <small>
                <?php
                    $bulan = date('n');
                    $romawi = getRomawi($bulan);
                    $tahun = date ('Y');
                    $no = $edit['no_pengajuan'];
                    echo "<td colspan='4' align='center'><small>No. $no/HRD-TVIP/SK/$romawi/$tahun<br><br></small></td>";
                ?>
            </small>
        </tr>
        <tr>
            <td colspan="4" align="center"><small>TENTANG</small></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><strong><span class="caption-subject font-dark sbold uppercase"><?php echo $edit['permintaan'] ?></span></strong></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td valign="top">Menimbang</td><td valign="top">:</td>
            <td>
                <ol>
                    <li>Kebutuhan Perusahaan berkaitan dengan rencana perusahaan dalam upaya pengembangan dan kemajuan serta meningkatkan kinerja dan keseimbangan Perusahaan keseluruhan</li>
                    <li>Pembinaan dan Pengembangan Sumber Daya Manusia</li>
                    <li>Bahwa hal-hal yang tersebut didalam surat keputusan ini adalah untuk memenuhi Visi & Misi Perusahaan</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td colspan="4" align="center"><small><b>MEMUTUSKAN</b></small></td>
        </tr>
        <tr>
            <td valign="top">Pertama</td><td valign="top">:</td>
            <td>Me<?php echo $edit['permintaan'] ?>kan Karyawan atas nama dibawah ini<br><br></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><small><b>NAMA KARYAWAN : <?php echo $edit['nama_karyawan_mutasi'] ?></b></small></td>
        </tr>
    </table>
    <table width="80%" border="1" align="center">
        <tr>
            <td align="center">Keterangan</td> 
            <td align="center" width="200">Sebelumnya</td>
            <td align="center" width="200">Baru</td>
        </tr>
        <tr>
            <td align="center">NIK</td> 
            <td align="center"><?php echo $edit['nik_lama'] ?></td>
            <td align="center"><?php echo $edit['nik_baru'] ?></td>
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
            <td valign="top">Kedua</td><td valign="top">:</td>
            <td>Hal-hal lain yang terkait dengan Surat Keputusan ini akan diatur tersendiri<br><br></td>
        </tr>
        <tr>
            <td valign="top">Ketiga</td><td valign="top">:</td>
            <td>Keputusan ini berlaku terhitung mulai tanggal <?php echo DateToIndo(date($edit['tanggal_efektif_sk'])); ?><br><br></td>
        </tr>
        <tr>
            <td valign="top">Keempat</td><td valign="top">:</td>
            <td class="justify">Segala sesuatu yang berkaitan dengan surat keputusan ini apabila ternyata terdapat kekeliruan dalam penetapan ini akan ditinjau kembali dikemudian hari<br><br></td>
        </tr>
        <tr>
            <td valign="top">Kelima</td><td valign="top">:</td>
            <td>Hak dan Kewajiban diatur sesuai Standard & Prosedur Perusahaan<br><br><br><br></td>
        </tr>
        <tr>
            <td colspan="3">
                Jakarta,&nbsp;
                <?php
                    $tahun = DateToIndo(date('Y-m-d'));
                    echo $tahun;
                ?><br><br><br><br><br>
            </td>
        </tr>
        <tr>
            <td colspan="3"></td>
        </tr>

        <tr>
            <td colspan="3">HRD Manager</td>
        </tr>
    </table>
    </div>
</body>
</html>