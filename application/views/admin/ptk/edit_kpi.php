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
                <form role="form" class="form-horizontal form-ptk" method="post" action="<?php echo site_url('ptk/doInput_kpi_all') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Departemen</label>
                            <div class="col-md-4">
                                <input type="hidden" class="form-control input-circle" name="no_jabatan_karyawan" id="no_jabatan_karyawan" placeholder="Enter text" required readonly="" value="<?php echo $edit['no_jabatan_karyawan'] ?>">
                                <input type="text" class="form-control input-circle" name="nama_departement" placeholder="Enter text" required readonly="" value="<?php echo $edit['nama_departement'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Jabatan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" required readonly="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Level Jabatan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" required readonly="" value="<?php echo $edit['level_jabatan'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tahun</label>
                            <div class="col-md-4">
                                <select name="tahun" class="form-control input-circle" required>
                                    <option value="">-- Pilih Tahun --</option>
                                    <?php
                                        for ($i=2020; $i <= 2030 ; $i++) { 
                                            ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        &nbsp; &nbsp;
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>KUANTITATIF</b></label><br>
                            &nbsp; &nbsp; &nbsp; adalah berisi sasaran / target dari pemegang jabatan yang harus dicapai dalam melakukan aktivitas pekerjaannya dan dilakukan pengukuran secara periodik
                        </div>
                        <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah Data </a></div>
                        <br><br>
                        <table class="table table-bordered" id="dynamic_field_kuantitatif">
                          <thead>
                            <tr role="row" class="bg-primary">
                                <td align="center"> Uraian </td>
                                <td align="center" width="300"> Evaluasi Periodik </td>
                                <td align="center" width="100"> Bobot* </td>
                                <td align="center" width="100"> Target </td>
                                <td align="center"> Aksi </td>
                            </tr>
                          </thead>
                          <tbody id="show_data">

                          </tbody>
                        </table>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; Keterangan : * = bila menggunakan bobot
                        </div>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>KUALITATIF</b></label> <br>
                            &nbsp; &nbsp; &nbsp; adalah berisi sasaran / target dari pemegang jabatan yang perlu dilakukan dalam meminimalisir / mengantisifasi atas ketidaksesuaian.
                        </div>
                        <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAddKual"><span class="fa fa-plus"></span> Tambah Data </a></div>
                        <br><br>
                        <table class="table table-bordered" id="dynamic_field_kualitif">
                          <thead>
                            <tr role="row" class="bg-primary">
                                <td align="center"> Deskripsi </td>
                                <td align="center"> Aksi </td>
                            </tr>
                          </thead>
                          <tbody id="show_data_kual">

                          </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('ptk/index_kpi') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Kuantitatif</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body"> 
            <input name="jabatan" id="jabatan" class="form-control" type="hidden" placeholder="No. Pesanan" value="<?php echo $edit['no_jabatan_karyawan'] ?>" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Deskripsi 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Enter Deskripsi" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik 
                
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi" id="evaluasi">
                        <option>-- Pilih Evaluasi --</option>
                        <?php
                        foreach (kategori_ipp($id) as $key => $level) {
                            echo "<option value=\"$key\">$level</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Bobot</label>
                <div class="col-xs-3">
                    <input name="bobot" id="bobot" class="form-control" type="number" min="0" max="100" required>
                </div>

                <label class="control-label col-xs-2" >Target</label>
                <div class="col-xs-3">
                    <input name="target" id="target" class="form-control" type="number" min="0" max="100" required>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_simpan">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Kuantitatif</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input name="id_edit" id="id_edit" class="form-control" type="hidden" placeholder="No. Pesanan" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Deskripsi 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="deskripsi_edit" id="deskripsi_edit" rows="3" placeholder="Enter Deskripsi" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik 
                
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_edit" id="evaluasi_edit">
                      <option>-- Pilih Evaluasi --</option>
                      <?php
                      foreach (kategori_ipp($id) as $key => $level) {
                          echo "<option value=\"$key\">$level</option>";
                      }
                      ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Bobot</label>
                <div class="col-xs-3">
                    <input name="bobot_edit" id="bobot_edit" class="form-control" type="number" min="0" max="100" required>
                </div>

                <label class="control-label col-xs-2" >Target</label>
                <div class="col-xs-3">
                    <input name="target_edit" id="target_edit" class="form-control" type="number" min="0" max="100" required>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_update">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL EDIT-->

<!--MODAL HAPUS-->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Kuantitatif</h4>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input type="hidden" name="id" id="textid" value="">
            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data ini?</p></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL HAPUS-->

<!-- MODAL ADD KUALITATIF -->
<div class="modal fade" id="ModalaAddKual" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Kualitatif</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body"> 
            <input name="jabatan_kual" id="jabatan_kual" class="form-control" type="hidden" placeholder="No. Pesanan" value="<?php echo $edit['no_jabatan_karyawan'] ?>" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Deskripsi 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="deskripsi_kual" id="deskripsi_kual" rows="3" placeholder="Enter Deskripsi" required></textarea>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_simpan_kual">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL ADD KUALITATIF-->

<!-- MODAL EDIT KUALITATIF -->
<div class="modal fade" id="ModalaEditKual" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Kualitatif</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input name="id_edit_kual" id="id_edit_kual" class="form-control" type="hidden" placeholder="No. Pesanan" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Deskripsi 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="deskripsi_edit_kual" id="deskripsi_edit_kual" rows="3" placeholder="Enter Deskripsi" required></textarea>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_update_kual">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL EDIT KUALITATIF-->

<!--MODAL HAPUS KUALITATIF-->
<div class="modal fade" id="ModalHapusKual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Kualitatif</h4>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input type="hidden" name="id" id="textid_kual" value="">
            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data ini?</p></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button class="btn_hapus_kual btn btn-danger" id="btn_hapus_kual">Hapus</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL HAPUS KUALITATIF-->

<script src="<?php echo base_url('assets/apps/scripts/ptk.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PTK.handleSendData();

    $(document).ready(function(){
        tampil_data_order_detail(); //pemanggilan fungsi tampil barang.
        tampil_data_kualitatif(); // pemanggilan data kualitatif

        $('#mydata').dataTable();

        //fungsi tampil barang
        function tampil_data_order_detail(){
            var no_jabatan_karyawan=$('#no_jabatan_karyawan').val();
            $.ajax({
                type  : 'GET',
                url   : '<?=base_url('ptk/data_all_kpi')?>',
                async : true,
                dataType : 'json',
                data : {no_jabatan_karyawan:no_jabatan_karyawan},
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                            '<td>'+data[i].deskripsi+'</td>'+
                            '<td>'+data[i].evaluasi+'</td>'+
                            '<td align="center">'+data[i].bobot+'%</td>'+
                            '<td align="center">'+data[i].target+'%</td>'+
                            '<td style="text-align:center;">'+
                                '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id+'">Edit</a>'+' '+
                                '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id+'">Hapus</a>'+
                            '</td>'+
                        '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }

        //Simpan Barang
        $('#btn_simpan').on('click',function(){
            var jabatan=$('#jabatan').val();
            var deskripsi=$('#deskripsi').val();
            var evaluasi=$('#evaluasi').val();
            var bobot=$('#bobot').val();
            var target=$('#target').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('ptk/doInput_kpi')?>",
                dataType : "JSON",
                data : {jabatan:jabatan, deskripsi:deskripsi, evaluasi:evaluasi, bobot:bobot, target:target},
                success: function(data){
                    $('[name="deskripsi"]').val("");
                    $('[name="evaluasi"]').val("");
                    $('[name="bobot"]').val("");
                    $('[name="target"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_order_detail();
                }
            });
            return false;
        });

        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?=base_url('ptk/get_detail_kpi')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id, deskripsi, evaluasi, bobot, target){
                        $('#ModalaEdit').modal('show');
                        $('[name="id_edit"]').val(data.id);
                        $('[name="deskripsi_edit"]').val(data.deskripsi);
                        $('[name="evaluasi_edit"]').val(data.evaluasi);
                        $('[name="bobot_edit"]').val(data.bobot);
                        $('[name="target_edit"]').val(data.target);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id=$('#id_edit').val();
            var deskripsi=$('#deskripsi_edit').val();
            var evaluasi=$('#evaluasi_edit').val();
            var bobot=$('#bobot_edit').val();
            var target=$('#target_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('ptk/doUpdate_kpi')?>",
                dataType : "JSON",
                data : {id:id, deskripsi:deskripsi , evaluasi:evaluasi, bobot:bobot, target:target},
                success: function(data){
                    $('[name="id_edit"]').val("");
                    $('[name="deskripsi_edit"]').val("");
                    $('[name="evaluasi_edit"]').val("");
                    $('[name="bobot_edit"]').val("");
                    $('[name="target_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_order_detail();
                }
            });
            return false;
        });

        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="id"]').val(id);
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var id=$('#textid').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('ptk/hapus_detail_kpi')?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                    $('#ModalHapus').modal('hide');
                    tampil_data_order_detail();
                    tampil_sum_order_detail();
                }
            });
            return false;
        });

        //fungsi tampil kualitatif
        function tampil_data_kualitatif(){
            var no_jabatan_karyawan=$('#no_jabatan_karyawan').val();
            $.ajax({
                type  : 'GET',
                url   : '<?=base_url('ptk/data_all_kpi_kual')?>',
                async : true,
                dataType : 'json',
                data : {no_jabatan_karyawan:no_jabatan_karyawan},
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                            '<td>'+data[i].deskripsi+'</td>'+
                            '<td style="text-align:center;">'+
                                '<a href="javascript:;" class="btn btn-info btn-xs item_edit_kual" data="'+data[i].id+'">Edit</a>'+' '+
                                '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_kual" data="'+data[i].id+'">Hapus</a>'+
                            '</td>'+
                        '</tr>';
                    }
                    $('#show_data_kual').html(html);
                }

            });
        }

        //Simpan Barang
        $('#btn_simpan_kual').on('click',function(){
            var jabatan=$('#jabatan_kual').val();
            var deskripsi=$('#deskripsi_kual').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('ptk/doInput_kpi_kual')?>",
                dataType : "JSON",
                data : {jabatan:jabatan, deskripsi:deskripsi},
                success: function(data){
                    $('[name="deskripsi"]').val("");
                    $('#ModalaAddKual').modal('hide');
                    tampil_data_kualitatif();
                }
            });
            return false;
        });

        //GET UPDATE KUALITATIF
        $('#show_data_kual').on('click','.item_edit_kual',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?=base_url('ptk/get_detail_kpi_kual')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id, deskripsi){
                        $('#ModalaEditKual').modal('show');
                        $('[name="id_edit_kual"]').val(data.id);
                        $('[name="deskripsi_edit_kual"]').val(data.deskripsi);
                    });
                }
            });
            return false;
        });

        //UPDATE KUALITATIF
        $('#btn_update_kual').on('click',function(){
            var id=$('#id_edit_kual').val();
            var deskripsi=$('#deskripsi_edit_kual').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('ptk/doUpdate_kpi_kual')?>",
                dataType : "JSON",
                data : {id:id, deskripsi:deskripsi},
                success: function(data){
                    $('[name="id_edit_kual"]').val("");
                    $('[name="deskripsi_edit_kual"]').val("");
                    $('#ModalaEditKual').modal('hide');
                    tampil_data_kualitatif();
                }
            });
            return false;
        });

        //GET HAPUS
        $('#show_data_kual').on('click','.item_hapus_kual',function(){
            var id=$(this).attr('data');
            $('#ModalHapusKual').modal('show');
            $('[name="id"]').val(id);
        });

        //Hapus Barang
        $('#btn_hapus_kual').on('click',function(){
            var id=$('#textid_kual').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('ptk/hapus_detail_kpi_kual')?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                    $('#ModalHapusKual').modal('hide');
                    tampil_data_kualitatif();
                }
            });
            return false;
        });

    });

</script>