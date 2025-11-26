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
<?php
if ($edit['punishment_historical_violance']=='Surat Teguran') {
    $jangka = "3 (tiga)";
    $jenis = "Surat Teguran";
    $kode_jenis = "ST";
    $tingkat_jenis = "SP 1";
} elseif ($edit['punishment_historical_violance']=='Surat Peringatan 1') {
    $jangka = "6 (enam)";
    $jenis = "Surat Peringatan";
    $kode_jenis = "SP";
    $tingkat_jenis = "SP 2";
} elseif ($edit['punishment_historical_violance']=='Surat Peringatan 2') {
    $jangka = "6 (enam)";
    $jenis = "Surat Peringatan";
    $kode_jenis = "SP";
    $tingkat_jenis = "SP 3";
} elseif ($edit['punishment_historical_violance']=='Surat Peringatan 3') {
    $jangka = "6 (enam)";
    $jenis = "Surat Peringatan";
    $kode_jenis = "SP";
    $tingkat_jenis = "Karyawan";
} 
?>
<body onload="window.print()">
    <div class="header">
        <table width="100%">
            <tr>
                <td width="70">
                    <img width="70" height="70" src="<?php echo base_url($this->config->item('img_path').'ASA_LOGO.jpg') ?>">
                </td>
                <td align="center" class="uppercase">
                    <strong>PT. ADI SUKSES ABADI</strong><br>
                    <small>JL. Raya Cilegon Km. 9, No.68, Kramat Watu Serang</small><br>
                    <small>Phone : (0254)  - 230397, 230832</small>
                </td>
                <td width="60">
                </td>
            </tr>
            <tr>
                <td colspan="3"> <hr> </td>
            </tr>
            <tr>
                <td colspan="3" align="center"><u><strong><?php echo $edit['punishment_historical_violance'] ?></strong></u></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <small><?php echo $edit['no_surat'] ?></small>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <table width="100%">
        <tr>
            <td colspan="3"><?php echo $jenis ?> ini dibuat oleh perusahaan pada tanggal <?php echo DateToIndo(date("Y-m-d", strtotime($edit['submit_date']))) ?> dan diperuntukan kepada </td>
        </tr>
        <tr>
            <td>Nama</td> <td>:</td>
            <td><?php echo $edit['nama_karyawan_struktur'] ?></td>
        </tr>
        <tr>
            <td>NIK</td> <td>:</td>
            <td><?php echo $edit['nik_baru'] ?></td>
        </tr>
        <tr>
            <td>Tanggal Masuk</td> <td>:</td>
            <td><?php echo DateToIndo($edit['join_date_struktur']) ?></td>
        </tr>
        <tr>
            <td>Departemen</td> <td>:</td>
            <td class="uppercase"><?php echo $edit['dept_struktur'] ?></td>
        </tr>
        <tr>
            <td>Jabatan</td> <td>:</td>
            <td><?php echo $edit['jabatan_karyawan'] ?></td>
        </tr>
        <tr>
            <td>History Punishment</td> <td>:</td>
            <td><span class="caption-subject font-dark sbold uppercase"><?php echo $history['punishment_historical_violance'] ?></span></td>
        </tr>
        <tr>
            <td>Keterangan</td> <td>:</td>
            <td><span class="caption-subject font-dark sbold uppercase"><?php echo $history['warning_note_historical_violance'] ?></span></td>
        </tr>
        <tr>
            <td>Tanggal Berakhir Punishment</td> <td>:</td>
            <td><span class="caption-subject font-dark sbold uppercase">
                <?php 
                    if (empty($history['warning_end_historical_violance'])) {
                        echo '';
                    } else {
                        echo DateToIndo($history['warning_end_historical_violance']);
                    }
                ?></span></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td class="justify">Sehubungan dengan sikap indisipliner serta pelanggaran tata tertib perusahaan yang lakukan oleh saudara, yakni <br> <?php echo $edit['warning_note_historical_violance'] ?>.</td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td class="justify">Maka dari pertimbangan tersebut, perusahaan memberikan <?php echo $jenis ?> dengan ketentuan sebagai berikut :</td>
        </tr>
        <tr>
            <td class="justify">
                <ol>
                    <li>
                        <?php echo $jenis ?> ini akan berlaku <?php echo $jangka ?> bulan <b>terhitung mulai tanggal <?php echo DateToIndo($edit['warning_start_historical_violance']); ?></b>.
                    </li>
                    <br>
                    <li>
                        Apabila dalam kurun waktu <?php echo $jangka ?> bulan sejak diterbitkannya <?php echo $jenis ?> ini, saudara melakukan pelanggaran disiplin yang sama atau pelanggaran lainnya, maka perusahaan akan mengeluarkan <?php echo $tingkat_jenis ?></b>
                    </li>
                    <br>
                    <li>
                        Sanksi bertahap akan dilakukan oleh perusahaan apabila masih melakukan pelanggaran disiplin yang sama atau pelanggaran lainnya</b>
                    </li>
                    <br>
                    <li>
                        Diberikan waktu selama 7 (tujuh) hari sejak tanggal dikeluarkan <?php echo $kode_jenis ?> ini untuk melakukan sanggahan, jika lebih dari batas waktu tersebut maka <?php echo $kode_jenis ?> ini akan dicatatkan kedalam Sistem HRIS
                    </li>
                </ol>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td class="justify">Demikian <?php echo $jenis ?> ini diterbitkan agar menjadi perhatian saudara</td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td colspan="3">
                Jakarta,&nbsp;
                <?php echo DateToIndo(date("Y-m-d", strtotime($edit['date_update']))) ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">Mengetahui,</td>
        </tr>
        <tr>
            <?php
                if ($edit['status_hr_manager'] == 1) {
                    ?>
                        <td colspan="3">
                            <img style="width: 100px;" src="<?php echo base_url().'../eis/uploads/qr/violance/'.$edit['ttd_qr'];?>">
                        </td>
                    <?php
                } else {
                    ?>
                        <td colspan="3" height="100">
                        </td>
                    <?php
                }
            ?>
        </tr>
        <tr>
            <td colspan="3">Rahmat Iswanto</td>
        </tr>

        <tr>
            <td colspan="3">HRD Manager</td>
        </tr>
    </table>    
</body>
</html>