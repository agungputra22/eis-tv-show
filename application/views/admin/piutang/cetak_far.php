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
            <td colspan="4" height="20">PT. TIRTA VARIA INTIPRATAMA</td>
        </tr>
        <tr bgcolor="grey">
            <td colspan="4" align="center"><strong>FORM APPROVAL REQUEST</strong></td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td width="250" valign="top">
                <table>
                    <tr>
                        <td>KEPADA</td> <td>:</td>
                        <td>Dept. ADM & CC</td>
                    </tr>
                    <tr>
                        <td>TANGGAL</td> <td>:</td>
                        <td><?php echo DateToIndo($edit['tanggal_far']); ?></td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>PEMOHON</td> <td>:</td>
                        <td><?php echo $edit['nama_karyawan_struktur']; ?></td>
                    </tr>
                    <tr>
                        <td>NIK</td> <td>:</td>
                        <td><?php echo $edit['nik_baru']; ?></td>
                    </tr>
                    <tr>
                        <td>JABATAN</td> <td>:</td>
                        <td><?php echo $edit['jabatan_karyawan']; ?></td>
                    </tr>
                    <tr>
                        <td>DEPO</td> <td>:</td>
                        <td><?php echo $edit['lokasi_hrd']; ?></td>
                    </tr>
                    <tr>
                        <td>STATUS KARYAWAN</td> <td>:</td>
                        <td><?php echo $edit['perusahaan_struktur']; ?></td>
                    </tr>
                    <tr>
                        <td>LAMA KERJA</td> <td>:</td>
                        <td>
                            <?php 
                            echo beda_waktu($edit['join_date_struktur'], date('Y-m-d'), '%y Tahun %m Bulan'); ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr bgcolor="grey">
            <td colspan="2" align="center"><strong>JENIS PERMOHONAN</strong></td>
        </tr>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <td>1. </td> <td>PINJAMAN</td> <td>:</td>
                        <td><?php echo $edit['type']; ?></td>
                    </tr>
                    <tr>
                        <td>2. </td> <td>JUMLAH</td> <td>:</td>
                        <td><?php echo 'Rp'. number_format($edit['nominal'], 0, ",", "."); ?></td>
                    </tr>
                    <tr>
                        <td>3. </td> <td>LATAR BELAKANG</td> <td>:</td>
                        <td><?php echo $edit['type']; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr bgcolor="grey">
            <td height="10" align="center"><strong>DEPO / DEPARTEMEN</strong></td>
            <td height="10" align="center"><strong>PUSAT</strong></td>
        </tr>
        <tr>
            <td>
                <table align="center">
                    <tr>
                        <td align="center"><small>PEMOHON,</small><br>
                            <img style="width: 80px;" src="<?php echo base_url().'../eis/uploads/qr/violance/4172.png'?>">
                        <td align="center"><small>DIBUAT OLEH,</small><br>
                            <img style="width: 80px;" src="<?php echo base_url().'../eis/uploads/qr/violance/4172.png'?>">
                        </td>
                        <td align="center"><small>DISETUJUI OLEH,</small><br>
                            <img style="width: 80px;" src="<?php echo base_url().'../eis/uploads/qr/violance/4172.png'?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><u><small>Nama Karyawan</small></u></td>
                        <td align="center"><u><small><?php echo $edit['nama_karyawan_struktur']; ?></small></u></td>
                        <td align="center"><u><small>TB ARZA INDRAJAYA</small></u></td>
                    </tr>
                    <tr>
                        <td align="center"><small><?php echo $edit['jabatan_karyawan']; ?></small></td>
                        <td align="center"><small><?php echo $edit['jabatan_karyawan']; ?></small></td>
                        <td align="center"><small>KEPALA DEPO</small></td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <input type="checkbox" name="" checked> DISETUJUI
                        </td>
                        <td>
                            <input type="checkbox" name="" checked> DISETUJUI
                        </td>
                    </tr>
                    <tr>
                        <td> <input type="text" name="" value="<?php echo 'Rp'. number_format($edit['nominal'], 0, ",", "."); ?>"></td>
                        <td> <input type="text" name="" value="<?php echo 'Rp'. number_format($edit['nominal'], 0, ",", "."); ?>"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name=""> DITOLAK <br>
                        </td>
                        <td>
                            <input type="checkbox" name=""> DITOLAK <br>
                        </td>
                    </tr>
                    <tr>
                        <td align="center"> <img style="width: 80px;" src="<?php echo base_url().'../eis/uploads/qr/violance/4172.png'?>"> </td>
                        <td align="center"> <img style="width: 80px;" src="<?php echo base_url().'../eis/uploads/qr/violance/4172.png'?>"> </td>
                    </tr>
                    <tr>
                        <td align="center"><u><small>ROBIAH</small></u></td>
                        <td align="center"><u><small>SANDRA YULIANA</small></u></td>
                    </tr>
                    <tr>
                        <td align="center"><small>OPERATION ASSISTANT MANAGER</small></td>
                        <td align="center"><small>FINANCE & ACCOUNTING MANAGER</small></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr bgcolor="grey">
            <td colspan="2" align="center">DIISI OLEH FINANCE & ACCOUNTING MANAGER</td>
        </tr>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <td>PERMOHONAN DITERIMA TANGGAL</td> <td>:</td>
                        <td>05 Februari 2024</td>
                    </tr>
                    <tr>
                        <td>DIPOTONG MULAI BULAN </td> <td>:</td>
                    </tr>
                    <tr>
                        <td>Gaji</td> <td>:</td>
                        <td><b>Rp. </b></td>
                    </tr>
                    <tr>
                        <td></td> <td>:</td>
                        <td><b>Rp. </b></td>
                    </tr>
                    <tr>
                        <td height="30"></td>
                    </tr>
                    <tr>
                        <td>Insentif</td> <td>:</td>
                        <td><b>Rp. </b></td>
                    </tr>
                    <tr>
                        <td></td> <td>:</td>
                        <td><b>Rp. </b></td>
                    </tr>
                    <tr>
                        <td height="30"></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td> <td>:</td>
                    </tr>
                    <tr>
                        <td height="30"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr bgcolor="grey">
            <td colspan="2" align="center" height="10"></td>
        </tr>
        <tr>
            <td>Catatan : </td>
        </tr>
    </table>
    </div>
</body>
</html>