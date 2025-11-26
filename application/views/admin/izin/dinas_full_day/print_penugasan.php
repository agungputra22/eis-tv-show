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
    <table width="100%">
        <tr>
            <td colspan="4" align="center"><u><strong>SURAT TUGAS</strong></u></td>
        </tr>
        <tr>
            <small>
                <?php
                    $bulan = date('n');
                    $romawi = getRomawi($bulan);
                    $tahun = date ('Y');
                    $no = $edit['no_pengajuan_full_day'];
                    $kode = $edit['kode_departement'];
                    echo "<td colspan='4' align='center'><small>No. $no/$kode/ST/$romawi/$tahun<br><br></small></td>";
                ?>
            </small>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td valign="top" colspan="4">Saya yang bertanda tangan dibawah ini :</td>
        </tr>
        <tr>
            <td colspan="4" height="10"></td>
        </tr>
        <tr>
            <td>&nbsp; &nbsp; &nbsp;</td>
            <td>Nama</td>
            <td>: <?php echo $atasan['nama_karyawan_struktur']; ?></td>
        </tr>
        <tr>
            <td>&nbsp; &nbsp; &nbsp;</td>
            <td>Jabatan</td>
            <td>: <?php echo $atasan['jabatan_karyawan']; ?></td>
        </tr>
        <tr>
            <td colspan="4" height="10"></td>
        </tr>
        <tr>
            <td valign="top" colspan="4">
                Menerangkan bahwa sehubungan dengan adanya kebutuhan terkait operasional perusahaan, maka dengan ini menugaskan saudara : 
            </td>
        </tr>
        <tr>
            <td colspan="4" height="10"></td>
        </tr>
        <tr>
            <td>&nbsp; &nbsp; &nbsp;</td>
            <td>Nama Lengkap</td>
            <td>: <?php echo $edit['nama_karyawan_struktur']; ?></td>
        </tr>
        <tr>
            <td>&nbsp; &nbsp; &nbsp;</td>
            <td>NIK</td>
            <td>: <?php echo $edit['nik_baru']; ?></td>
        </tr>
        <tr>
            <td>&nbsp; &nbsp; &nbsp;</td>
            <td>Depo / Lokasi</td>
            <td>: <?php echo $edit['lokasi_struktur']; ?></td>
        </tr>
        <tr>
            <td>&nbsp; &nbsp; &nbsp;</td>
            <td>Jabatan</td>
            <td>: <?php echo $edit['jabatan_karyawan']; ?></td>
        </tr>
        <tr>
            <td>&nbsp; &nbsp; &nbsp;</td>
            <td>Kegiatan Penugasan</td>
            <td>: <?php echo $edit['ket_tambahan']; ?></td>
        </tr>
        <tr>
            <td>&nbsp; &nbsp; &nbsp;</td>
            <td>Periode Penugasan</td>
            <td>: 
                <?php
                    if ($tgl_awal['start_full_day'] != $tgl_akhir['start_full_day']) {
                        echo DateToIndo($tgl_awal['start_full_day']).' s/d '.DateToIndo($tgl_akhir['start_full_day']);
                    } else {
                        echo DateToIndo($edit['start_full_day']);
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="4" height="10"></td>
        </tr>
        <tr>
            <td valign="top" colspan="4">
                Demikian surat penugasan ini dibuat untuk dapat dilaksanakan sebagaimana mestinya. Atas perhatian dan kerjasamanya kami ucapkan terima kasih.
            </td>
        </tr>
        <tr>
            <td valign="top" colspan="4">
                
            </td>
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td>Dikeluarkan</td>
            <td>: Jakarta</td>
        </tr>
        <tr>
            <td>Pada tanggal</td>
            <td>: <?php echo DateToIndo(date("Y-m-d")); ?></td>
        </tr>
    </table>
    <br>
    <br>
    <table width="95%" align="center">
        <tr>
            <td align="left">Pemberi Tugas,<br><br><br><br><br></td>
            <td align="right">Diketahui oleh,<br><br><br><br><br></td>
        </tr>

        <tr>
            <td><u><?php echo $atasan['nama_karyawan_struktur'] ?></u></td>
            <td align="right"></td>
        </tr>

        <tr>
            <td><?php echo $atasan['jabatan_karyawan'] ?></td>
            <td align="right">HRD Manager</td>
        </tr>
    </table>
    </div>
</body>
</html>