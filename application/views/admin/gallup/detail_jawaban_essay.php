<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span> &nbsp;
                    <a href="<?php echo site_url('gallup/index_essay_spv') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
                <div class="actions">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <tr>
                            <td colspan="2">Nilai Assesment Job Desc & KPI</td>
                        </tr>
                        <tr>
                            <td>A</td> <td>Sangat Memahami</td>
                        </tr>
                        <tr>
                            <td>B</td> <td>Memahami</td>
                        </tr>
                        <tr>
                            <td>C</td> <td>Cukup Memahami</td>
                        </tr>
                        <tr>
                            <td>D</td> <td>Kurang Memahami</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-gallup" method="post" action="<?php echo site_url('gallup/doInput_penilaian_essay') ?>">
                    <div class="form-body">
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover" id="datatables">
                                <thead>
                                    <tr role="row" class="bg-primary">
                                        <th width="20"> NO. </th>
                                        <th width="50"> NIK </th>
                                        <th width="50"> Nama </th>
                                        <th width="100"> Pertanyaan </th>
                                        <th width="100"> Keterangan Pertanyaan </th>
                                        <th width="100"> Jawaban </th>
                                        <th width="100"> Penilaian </th>
                                    </tr>
                                </thead>
                                <tbody> 
                                <?php
                                $no = 1;
                                foreach ($listdata as $row) {
                                ?>
                                <tr>
                                    <td> <?php echo $row['no_pertanyaan'] ?> </td>
                                    <td> <?php echo $row['nik_baru'] ?> </td>
                                    <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                                    <td> <?php echo $row['pertanyaan'] ?> </td>
                                    <td> <?php echo $row['ket_pertanyaan'] ?> </td>
                                    <td> <?php echo $row['jawaban'] ?> </td>
                                    <td align="center">
                                        <input type="hidden" name="id[]" value="<?php echo $row['id_jawaban'] ?>">
                                        <input type="hidden" name="nik_baru" value="<?php echo $row['nik_baru'] ?>">
                                        <input type="hidden" name="nama_karyawan_struktur[]" value="<?php echo $row['nama_karyawan_struktur'] ?>">
                                        <input type="hidden" name="no_pertanyaan[]" value="<?php echo $row['no_pertanyaan'] ?>">
                                        <input type="hidden" name="pertanyaan[]" value="<?php echo $row['pertanyaan'] ?>">
                                        <input type="hidden" name="ket_pertanyaan[]" value="<?php echo $row['ket_pertanyaan'] ?>">
                                        <input type="hidden" name="jawaban[]" value="<?php echo $row['jawaban'] ?>">
                                        <select name="angka_mutu_atasan[]" class="form-control" required>
                                            <option value="0">-- Pilih Nilai --</option>
                                            <option value="4">A</option>
                                            <option value="3">B</option>
                                            <option value="2">C</option>
                                            <option value="1">D</option>
                                        </select>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    &nbsp; &nbsp;
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <?php
                                    if ($penilaian['angka_mutu_atasan'] == null) {
                                        ?>
                                        <button type="submit" class="btn blue btn-block">Submit Penilaian</button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="submit" class="btn blue btn-block" disabled='disabled'>Sudah Melakukan Penilaian</button>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/gallup.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.GALLUP.handleSendDataPenilaian();
</script>