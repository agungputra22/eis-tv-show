<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form ">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-red"></i>
                    <span class="caption-subject font-red sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <?php
                        if (empty($submit)) {
                            ?>
                            
                            <?php
                        } else {
                            ?>
                            <a href="<?php echo site_url('resign/index_histori') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                            <i class="icon-layers font-green"></i> Histori Pengajuan </a>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form role="form" class="form-resign" method="post" action="<?php echo site_url('resign/doInput') ?>">
                    <div class="form-body">                     
                        <div class="form-group form-md-line-input form-md-floating-label has-error">
                            <select name="tipikal_resign" id="tipikal_resign" class="form-control" required>
                                <option value=""></option>
                                <option value="Case">Case</option>
                                <option value="Non Case">Non Case</option>
                            </select>
                            <label for="form_control_1">Tipikal Resign</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label has-error">
                            <select name="alasan_resign" id="alasan_resign" class="form-control" required>
                            <option value=""></option>
                            </select>
                            <label for="form_control_1">Alasan Resign</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label has-error">
                            <label for="form_control_1">Tanggal Efektif Resign</label>
                            <!-- <input type="date" class="form-control" id="tanggal_resign" name="tanggal_resign" required min="<?php echo date('Y-m-d', strtotime('+1 month', strtotime(date('Y-m-d')))); ?>"> -->
                            <input type="date" class="form-control" id="tanggal_resign" name="tanggal_resign" required >
                            <input type="hidden" name="no_pengajuan" class="form-control" placeholder="Enter No" value="<?php echo $pengajuan;?>" readonly="">
                            <span class="help-block">Some help goes here...</span>
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label has-error">
                            <textarea class="form-control" name="ketarangan" id="keterangan" rows="3" required></textarea>
                            <label for="form_control_1">Keterangan Resign</label>
                            <span class="help-block">Some help goes here...</span>
                        </div>

                        <div class="form-group form-md-line-input form-md-floating-label has-error">
                            <label for="form_control_1">Upload Surat Resign</label>
                            <input type="file" name="dokumen" class="form-control" required>
                            <span class="help-block">Some help goes here...</span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    if (empty($submit)) {
                                        ?>
                                        <button type="submit" class="btn dark btn-block">SUBMIT</button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="submit" class="btn dark btn-block" disabled='disabled'>Anda Telah Melakukan Pengajuan Resign</button>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/resign.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.RESIGN.handleSendData();

    $(document).ready(function(){ 
        $('#tipikal_resign').change(function(){ 
            var id=$(this).val();
            var tanggal = new Date();
            var tanggal_2 = new Date(tanggal.setMonth(tanggal.getMonth()+1));
            $.ajax({
                url : "<?php echo site_url('resign/get_sub_resign');?>",
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){
                     
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].alasan_resign+'>'+data[i].alasan_resign+'</option>';
                    }
                    $('#alasan_resign').html(html);

                }
            });

            if (id == 'Case') {
                $("#tanggal_resign").attr({
                   "min" : tanggal.getFullYear() + '-' + ('0' + (tanggal.getMonth())).slice(-2) + '-' + ('0' + tanggal.getDate()).slice(-2)
                });
            } else {
                $("#tanggal_resign").attr({
                   "min" : tanggal_2.getFullYear() + '-' + ('0' + (tanggal_2.getMonth() + 1)).slice(-2) + '-' + ('0' + tanggal_2.getDate()).slice(-2)
                });
            }

            return false;
        });          
    });
</script>