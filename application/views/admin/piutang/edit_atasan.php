<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('piutang/index_atasan') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-piutang" method="post" action="<?php echo site_url('piutang/doUpdate_atasan') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="id_piutang" class="form-control" placeholder="Enter Id piutang" readonly="" value="<?php echo $edit['id'] ?>">
                                <input type="hidden" name="nik_baru" class="form-control" placeholder="Enter Id piutang" value="<?php echo users('nik_baru'); ?>">
                                <input type="hidden" name="submit_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No Pengajuan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_pengajuan" id="no_pengajuan" class="form-control" placeholder="Enter No" value="<?php echo $edit['no_pengajuan'] ?>" required readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal FAR
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_far" class="form-control" placeholder="Enter Tanggal" value="<?php echo $edit['tanggal_far'] ?>" required readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jumlah Piutang
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nominal" id="nominal" class="form-control" value="<?php echo $edit['nominal'] ?>" placeholder="Enter Nominal" required readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="type" id="type" class="form-control" value="<?php echo $edit['type'] ?>" placeholder="Enter type" required readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="keterangan" class="form-control" placeholder="Enter Keterangan" rows="4" readonly><?php echo $edit['keterangan'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Approval FAR
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="radio" name="status" value="1" required>Approved
                                <input type="radio" name="status" value="2">Not Approved
                            </div>
                        </div>

                        <br>
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th style="color: white;" bgcolor="grey">NIK</th>
                                <th style="color: white;" bgcolor="grey">Nama</th>
                                <th style="color: white;" bgcolor="grey">Jabatan</th>
                                <th style="color: white;" bgcolor="grey">Nominal</th>
                                <th style="color: white;" bgcolor="grey">Cicilan</th>
                            </tr>
                            <tbody id="show_data">

                            </tbody>
                        </table>
                        <br><br>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Submit</button>
                                <a href="<?php echo site_url('piutang/index_atasan') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/piutang.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PIUTANG.handleSendData();
    window.PIUTANG.handleBootstrapSelect();

    $(document).ready(function(){
        tampil_data_order_detail();   //pemanggilan fungsi tampil barang.

        $('#mydata').dataTable();

        //fungsi tampil barang
        function tampil_data_order_detail(){
            var no_pengajuan=$('#no_pengajuan').val();
            $.ajax({
                type  : 'GET',
                url   : '<?=base_url('piutang/data_order_detail')?>',
                async : true,
                dataType : 'json',
                data : {no_pengajuan:no_pengajuan},
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                            '<td>'+data[i].nik_baru+'</td>'+
                            '<td>'+data[i].nama_karyawan_struktur+'</td>'+
                            '<td>'+data[i].jabatan_karyawan+'</td>'+
                            '<td>'+data[i].piutang+'</td>'+
                            '<td>'+data[i].cicilan+'</td>'+
                        '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }

    });

</script>