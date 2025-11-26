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
    <div class="header">
        <table width="100%">
            <tr>
                <td>
                    <img width="70" height="70" src="<?php echo base_url($this->config->item('img_path').'logo_tvip.jpeg') ?>">
                </td>
                <td align="center" class="uppercase">
                    <strong>PT. TIRTA VARIA INTIPRATAMA</strong><br>
                    <small>Jl. Kedoya Raya No.1 Kebon Jeruk - Jakarta Barat 11520</small><br>
                    <small>Tlp : 021 – 58354526 - 7 / 5802851 Fax : 021 - 58350026</small>
                </td>
                <td>
                    <img width="60" height="50" src="<?php echo base_url($this->config->item('img_path').'sgs.png') ?>">
                </td>
            </tr>
            <tr>
                <td colspan="3"> <hr> </td>
            </tr>
            <tr>
                <td colspan="3" align="center"><u><strong><?php echo $edit['punishment_historical_violance'] ?></strong></u></td>
            </tr>
            <tr>
                <?php
                $bulan = date('n');
                $romawi = getRomawi($bulan);
                $tahun = date ('Y');
                $no = $edit['id_historical_violance'];
                if ($edit['punishment_historical_violance']=='Surat Teguran') {
                    # code...
                    echo "<td colspan='3' align='center'><small>No. $no/ST/$romawi/$tahun<br></small></td>";
                } elseif ($edit['punishment_historical_violance']=='Surat Peringatan 1') {
                    # code...
                    echo "<td colspan='3' align='center'><small>No. $no/SP/$romawi/$tahun<br></small></td>";
                } elseif ($edit['punishment_historical_violance']=='Surat Peringatan 2') {
                    # code...
                    echo "<td colspan='3' align='center'><small>No. $no/SP/$romawi/$tahun<br></small></td>";
                } elseif ($edit['punishment_historical_violance']=='Surat Peringatan 3') {
                    # code...
                    echo "<td colspan='3' align='center'><small>No. $no/SP/$romawi/$tahun<br></small></td>";
                }
                
                ?>
            </tr>
        </table>
    </div>
    <table width="100%">
        <tr>
            <td>Yang bertanda tangan dibawah ini, </td>
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
            <td>Jabatan</td> <td>:</td>
            <td><?php echo $edit['jabatan_karyawan'] ?></td>
        </tr>
        <tr>
            <td>Lokasi</td> <td>:</td>
            <td><?php echo $edit['lokasi_hrd'] ?></td>
        </tr>
        <tr>
            <td>Departement</td> <td>:</td>
            <td><?php echo $edit['dept_struktur'] ?></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td>Menerangkan bahwa, </td>
        </tr>

        <tr>
            <td class="justify">Telah melakukan tindakan yang tidak sejalan dengan kebijakan dan peraturan perusahaan berupa <b><?php echo $edit['pelanggaran_historical_violance'] ?></b> maka atas perbuatan tersebut saudara diberikan <b><?php echo $edit['punishment_historical_violance'] ?></b> yang berlaku untuk jangka waktu 
            <?php
            if ($edit['punishment_historical_violance']=='Surat Teguran') {
                    # code...
                    echo "3 (tiga)";
                } elseif ($edit['punishment_historical_violance']=='Surat Peringatan 1') {
                    # code...
                    echo "6 (enam)";
                } elseif ($edit['punishment_historical_violance']=='Surat Peringatan 2') {
                    # code...
                    echo "6 (enam)";
                } elseif ($edit['punishment_historical_violance']=='Surat Peringatan 3') {
                    # code...
                    echo "6 (enam)";
                } 
            ?> bulan terhitung sejak tanggal <?php echo DateToIndo(date($edit['warning_start_historical_violance'])); ?> s/d <?php echo DateToIndo(date($edit['warning_end_historical_violance'])); ?>. <br></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td align="center" class="uppercase">
                <small><b>COACHING & COUNSELING</b></small><br>
            </td>
        </tr>

        <tr>
            <td>Alasan Personnel yang di Coaching & Counseling :<hr><br><hr></td>
        </tr>

        <tr>
            <td>Penyebab : <?php echo $edit['warning_note_historical_violance'] ?><hr><br><hr></td>
        </tr>

        <tr>
            <td>Saran yang diberikan kepada karyawan : <hr><br><hr></td>
        </tr>

        <tr>
            <td>Komitmen karyawan : <hr><br><hr></td>
        </tr>

        <tr>
            <td><b>Catatan Sanksi Sebelumnya</b></td>
        </tr>
    </table>
    <table>
        <tr>
            <td>Jenis Sanksi </td> <td>:</td>
        </tr>
        <tr>
            <td>Jenis Pelanggaran </td> <td>:</td>
        </tr>
        <tr>
            <td>Masa Berlaku </td> <td>:</td>
        </tr>

    </table>
    <br>
    <tr>
        <td>
            <small>Jakarta, …………………… 
            <?php
                $tahun = date ('Y');
                echo $tahun;
            ?>
            </small>
        </td>
    </tr>
    <table border="1" align="center" width="100%">
        <tr>
            <td rowspan="2" align="center">Karyawan Ybs,</td>
            <td align="center">Diberikan Oleh,</td>
            <td align="center">Disetujui Oleh,</td>
            <td colspan="2" align="center">Diketahui Oleh,</td>
        </tr>
        <tr>
            <td align="center">Atasan Level 1*</td>
            <td align="center">Atasan Level 2*</td>
            <td align="center">IR Staff</td>
            <td align="center">HR Executive</td>
        </tr>
        <tr>
            <td align="center"><br><br><br><br><?php echo $edit['nama_karyawan_struktur'] ?></td>
            <td align="center"><br><br><br><br>....................</td>
            <td align="center"><br><br><br><br>....................</td>
            <td align="center"><br><br><br><br>....................</td>
            <td align="center"><br><br><br><br>....................</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>Atasan Level 1*     : Atasan langsung karyawan</td>
        </tr>
        <tr>
            <td>Atasan Level 2*    : Supervisi atasan langsung</td>
        </tr>
    </table>
</body>
</html>