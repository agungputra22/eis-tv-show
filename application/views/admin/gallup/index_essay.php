<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-gallup" method="post" action="<?php echo site_url('gallup/doInput_essay') ?>">
                    <div class="form-body">
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover" id="datatables">
                                <thead>
                                    <tr role="row" class="bg-primary">
                                        <th width="20"> NO. </th>
                                        <th width="80"> Pertanyaan </th>
                                        <th width="100"> Keterangan </th>
                                        <th width="50"> Status </th>
                                        <th width="250"> Jawaban Karyawan </th>
                                    </tr>
                                </thead>
                                <tbody> 
                                <?php
                                $no = 1;
                                foreach ($listdata as $row) {
                                ?>
                                <tr>
                                    <td> <?php echo $no ?> </td>
                                    <td> <?php echo $row['pertanyaan'] ?> </td>
                                    <td> <?php echo $row['ket_pertanyaan'] ?> </td>
                                    <td align="center">
                                        <?php
                                        if ($row['status'] == 0) {
                                            echo "SCORING";
                                        } else {
                                            echo "NO SCORING";
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <input type="hidden" name="id[]" value="<?php echo $row['id'] ?>">
                                        <input type="hidden" name="nik_baru" value="<?php echo users('nik_baru') ?>">
                                        <input type="hidden" name="jabatan" value="<?php echo users('jabatan_struktur') ?>">
                                        <textarea name="jawaban[]" class="form-control" required rows="3"></textarea>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <?php
                                    if (empty($jawaban)) {
                                        ?>
                                        <button type="submit" class="btn blue btn-block"> Simpan</button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="submit" class="btn blue btn-block" disabled='disabled'>Sudah Melakukan Survey</button>
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
    window.GALLUP.handleSendData();
</script>