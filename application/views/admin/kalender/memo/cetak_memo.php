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

        .email {
            color: blue;
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
                <td colspan="3" align="center"><u><strong>INTERNAL MEMO</strong></u></td>
            </tr>
            <tr>
                <?php
                $bulan = date('n');
                $romawi = getRomawi($bulan);
                $tahun = date ('Y');
                $no = $edit['id'];
                echo "<td colspan='4' align='center'><small>No. $no/HRD&QMS-TVIP/IM/$romawi/$tahun<br></small></td>";
                
                ?>
            </tr>
        </table>
        <br>
    </div>
    <table>
        <tr>
            <td>Revisi </td> <td>:</td>
            <td>00</td>
        </tr>
        <tr>
            <td>To</td> <td>:</td>
            <td>All Karyawan</td>
        </tr>
        <tr>
            <td>Perihal</td> <td>:</td>
            <td><?php echo $edit['name'] ?></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td>Dengan Hormat, </td>
        </tr>

        <tr>
            <td class="justify"><br>Bersama ini kami sampaikan untuk dikoordinasikan dengan Departemen terkait mengenai ketentuan perihal <b><?php echo $edit['name'] ?></b> sebagai berikut : <br></td>
        </tr>

        <tr>
            <td class="justify">
                <ol>
                    <li>
                        Aktifitas  karyawan pusat pada tanggal <b><?php echo DateToIndo(date($edit['birth_date'])); ?></b> diliburkan dan masuk kembali pada tanggal <b><?php echo DateToIndo(date('Y-m-d', strtotime('+1 days', strtotime($edit['birth_date'])))); ?></b>
                    </li>
                    <br>
                    <li>
                        Aktifitas Sales & Marketing, Pusat dan Depo pada tanggal <b><?php echo DateToIndo(date($edit['birth_date'])); ?></b> mengenai libur akan diatur oleh Departemen <b>Sales & Marketing</b>
                    </li>
                    <br>
                    <li>
                        Aktifitas Fleet & Distribution, Officeboy Pusat dan Depo pada tanggal <b><?php echo DateToIndo(date($edit['birth_date'])); ?></b> mengenai libur akan diatur oleh Departemen <b>Fleet & Distribution and General Affair</b>
                    </li>
                    <br>
                    <li>
                        Aktifitas Warehouse Operation pada tanggal <b><?php echo DateToIndo(date($edit['birth_date'])); ?></b> mengenai libur akan diatur oleh Departemen <b>Warehouse Operation</b> sesuai dengan jadwal supply, dan diperhitungkan lembur dari pukul 00.00 – 24.00 WIB
                    </li>
                    <br>
                    <li>
                        Aktifitas Admin Depo pada tanggal <b><?php echo DateToIndo(date($edit['birth_date'])); ?></b> mengenai libur akan diatur oleh Departemen <b>Finance Accounting & Purchasing</b>
                    </li>
                    <br>
                    <li>
                        Aktifitas Supply dan Pool pada tanggal <b><?php echo DateToIndo(date($edit['birth_date'])); ?></b> mengenai libur akan diatur oleh Departemen <b>Supply Chain & MRT TBK</b> sesuai dengan jadwal supply
                    </li>
                    <br>
                    <li>
                        Data lembur depo wajib dikirim ke HRD ditujukan kepada :
                        <ul>
                            <li><u class="email">Ari.hermawan@tvip.co.id</u> (HRD & QMS Manager)</li>
                            <li><u class="email">Hr.personnel@tvip.co.id</u> (Personnel & Rewards Staff)</li>
                            <li><u class="email">Hr.spv.personnel@tvip.co.id</u> (Personnel & Rewards Spv)</li>
                        </ul>
                    </li>
                    <br>
                    <li>
                        Form yang dipergunakan (terlampir) dengan sheet :
                        <ul>
                            <li>SPL vs Realisasi SPL</li>
                            <li>Plan vs Realisasi Supply</li>
                            <li>Plan vs Realisasi Sales</li>
                        </ul>
                    </li>
                    <br>
                    <li>
                        Lembur tanggal <b><?php echo DateToIndo(date($edit['birth_date'])); ?></b>
                        <ul>
                            <li>Untuk Surat Perintah Lembur dikirimkan max. H-1 sebelum pelaksanaan lembur, paling lambat pukul 15.00 WIB <b>(<?php echo DateToIndo(date('Y-m-d', strtotime('-1 days', strtotime($edit['birth_date'])))); ?>)</b> dengan mengisi form terlampir diatas untuk bagian planning yang berwarna biru</li>
                            <li>Untuk pelaporan realisasi lembur max. 3 hari setelah pelaksanaan lembur (H+3) dan paling lambat pukul 12.00 WIB <b>(<?php echo DateToIndo(date('Y-m-d', strtotime('+3 days', strtotime($edit['birth_date'])))); ?>)</b> dengan mengisi form terlampir diatas dan melanjutkan pada bagian realisasi</li>
                            <li>Bagi depo yang tidak mengirimkan laporan sesuai ketentuan diatas, <b>maka lembur tidak bisa dibayarkan</b></li>
                        </ul>
                    </li>
                    <br> <br>
                    <li>
                        Upah lembur dibayarkan pada tanggal <b>15 <?php echo DateToIndo(date('Y-m', strtotime('+1 month', strtotime($edit['birth_date'])))); ?></b> (sesuai ketentuan lembur, bahwa lembur dibayarkan setiap tanggal 15 bulan berikutnya. <br><b>Contoh</b> : Lembur hari besar antara tanggal 01 – 31 Januari 2019 dibayarkan pada tanggal 15 Februari 2019
                    </li>
                </ol>
            </td>
        </tr>

        <tr>
            <td class="justify">Demikian pemberitahuan ini kami sampaikan untuk dilaksanakan sebagaimana mestinya. Atas perhatiannya dan kerjasamanya kami ucapkan terima kasih.</td>
        </tr>

        <tr>
            <td>
                <small><br>Jakarta, …………………… 
                <?php
                    $tahun = date ('Y');
                    echo $tahun;
                ?><br><br><br><br><br>
                </small>
            </td>
        </tr>
        <tr>
            <td><u><small>ARDIANSYAH SS</small></u></td>
        </tr>

        <tr>
            <td><small>HRD & QMS Manager</small></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td><small>CC</small></td> <td>:</td> <td>Direksi</td>
        </tr>
        <tr>
            <td></td> <td></td> <td>All Kepala Departemen</td>
        </tr>
    </table>
</body>
</html>