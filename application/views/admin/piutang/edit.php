<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('piutang/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-piutang-detail" method="post" action="<?php echo site_url('piutang/doUpdate') ?>">
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
                                <input type="date" name="tanggal_far" class="form-control" placeholder="Enter Tanggal" value="<?php echo $edit['tanggal_far'] ?>" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jumlah Piutang
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nominal" id="nominal" class="form-control" value="<?php echo $edit['nominal'] ?>" placeholder="Enter Nominal" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select class="form-control" name="type" id="type" required="">
                                    <option value="">-- Pilih Jenis --</option>
                                    <?php
                                    foreach (type_piutang($id) as $key => $level) {
                                        $s = ($key==$edit['type'] ? "selected" : "");
                                        echo "<option value=\"$key\" $s>$level</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="keterangan" class="form-control" placeholder="Enter Keterangan" rows="4" required><?php echo $edit['keterangan'] ?></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Update</button>
                                <a href="<?php echo site_url('piutang/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah Data</a></div>
                <br><br>
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th style="color: white;" bgcolor="grey">NIK</th>
                        <th style="color: white;" bgcolor="grey">Nama</th>
                        <th style="color: white;" bgcolor="grey">Jabatan</th>
                        <th style="color: white;" bgcolor="grey">Nominal</th>
                        <th style="color: white;" bgcolor="grey">Cicilan</th>
                        <th style="color: white; text-align: center" bgcolor="grey">Aksi</th>
                    </tr>
                    <tbody id="show_data">

                    </tbody>
                </table>
                <br><br>
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
        <h3 class="modal-title" id="myModalLabel">Tambah Detail</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body"> 
            <div class="form-group">
                <label class="control-label col-xs-3" >No. FAR</label>
                <div class="col-xs-9">
                    <input name="no_far" id="no_far" class="form-control" type="text" placeholder="No. Pesanan" value="<?php echo $edit['no_pengajuan'] ?>" required readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Cari
                
                </label>
                <div class="col-xs-9">
                    <select name="nik_cari" id="nik_cari" class="bs-select form-control" data-live-search="true" data-size="8">
                        <option value="">-- Pilih Karyawan --</option>
                        <?php
                        foreach ($data_karyawan as $k)
                        {
                            echo "<option value='$k->nik_baru'>$k->nama_karyawan_struktur ($k->nik_baru)</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">NIK 
                
                </label>
                <div class="col-xs-9">
                    <input type="text" name="nik_tampil" class="form-control" placeholder="Enter NIK Karyawan" readonly="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Nama 
                
                </label>
                <div class="col-xs-9">
                    <input type="text" name="nama_karyawan_shift" class="form-control" placeholder="Enter Nama Karyawan" readonly="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Jabatan 
                
                </label>
                <div class="col-xs-9">
                    <input type="hidden" name="jabatan_karyawan_shift" class="form-control" placeholder="Enter Jabatan" readonly="">
                    <input type="text" name="kode_karyawan_shift" class="form-control" placeholder="Enter Jabatan" readonly="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Lokasi 
                
                </label>
                <div class="col-xs-9">
                    <input type="text" name="lokasi_karyawan_shift1" class="form-control" placeholder="Enter Lokasi" readonly="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Nominal
                
                </label>
                <div class="col-xs-4">
                    <input type="text" name="piutang" id="piutang" class="form-control" placeholder="" min="0">
                </div>

                <label class="control-label col-xs-2">Cicilan
                
                </label>
                <div class="col-xs-3">
                    <input type="number" name="cicilan" id="cicilan" class="form-control" placeholder="Nominal" min="0">
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
        <h3 class="modal-title" id="myModalLabel">Edit Order Detail</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-3" >No. Pesanan</label>
                <div class="col-xs-9">
                    <input name="id_edit" id="id_edit2" class="form-control" type="hidden" placeholder="No. Pesanan" required readonly>
                    <input name="no_pesanan_edit" id="no_pesanan_edit" class="form-control" type="text" placeholder="No. Pesanan" required readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">NIK 
                
                </label>
                <div class="col-xs-9">
                    <input type="text" name="nik_tampil" id="nik_tampil" class="form-control" placeholder="Enter NIK Karyawan" readonly="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Nama 
                
                </label>
                <div class="col-xs-9">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter Nama Karyawan" readonly="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Jabatan 
                
                </label>
                <div class="col-xs-9">
                    <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Enter Jabatan" readonly="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Lokasi 
                
                </label>
                <div class="col-xs-9">
                    <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Enter Lokasi" readonly="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Nominal
                
                </label>
                <div class="col-xs-4">
                    <input type="text" name="piutang_edit" id="piutang_edit" class="form-control" placeholder="" min="0">
                </div>

                <label class="control-label col-xs-2">Cicilan
                
                </label>
                <div class="col-xs-3">
                    <input type="number" name="cicilan_edit" id="cicilan_edit" class="form-control" placeholder="Nominal" min="0">
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
        <h4 class="modal-title" id="myModalLabel">Hapus Order Detail</h4>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input type="hidden" name="id" id="textid" value="">
            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus Order ini?</p></div>
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

<script src="<?php echo base_url('assets/apps/scripts/piutang.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PIUTANG.handleSendDataDetail('.form-piutang-detail');
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
                            '<td width="180" style="text-align:center;">'+
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
            var no_far=$('#no_far').val();
            var nik_cari=$('#nik_cari').val();
            var piutang=$('#piutang').val();
            var type=$('#type').val();
            var cicilan=$('#cicilan').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('piutang/simpan_order_detail')?>",
                dataType : "JSON",
                data : {no_far:no_far , nik:nik_cari, piutang:piutang, type:type, cicilan:cicilan},
                success: function(data){
                    $('[name="nik_cari"]').val("");
                    $('[name="piutang"]').val("");
                    $('[name="cicilan"]').val("");
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
                url  : "<?=base_url('piutang/get_order_detail')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id, no_pesanan, nik, qty, harga, diskon, total){
                        $('#ModalaEdit').modal('show');
                        $('[name="id_edit"]').val(data.id);
                        $('[name="no_pesanan_edit"]').val(data.no_far);
                        $('[name="nik_tampil"]').val(data.nik_baru);
                        $('[name="nama"]').val(data.nama_karyawan_struktur);
                        $('[name="jabatan"]').val(data.jabatan_karyawan);
                        $('[name="lokasi"]').val(data.lokasi_hrd);
                        $('[name="piutang_edit"]').val(data.piutang);
                        $('[name="cicilan_edit"]').val(data.cicilan);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id=$('#id_edit2').val();
            var piutang=$('#piutang_edit').val();
            var cicilan=$('#cicilan_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('piutang/update_order_detail')?>",
                dataType : "JSON",
                data : {id:id, piutang:piutang , cicilan:cicilan},
                success: function(data){
                    $('[name="id_edit"]').val("");
                    $('[name="piutang_edit"]').val("");
                    $('[name="cicilan_edit"]').val("");
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
                url  : "<?=base_url('piutang/hapus_order_detail')?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                    $('#ModalHapus').modal('hide');
                    tampil_data_order_detail();
                }
            });
            return false;
        });

    });

    var nominal = document.getElementById("nominal");
    nominal.addEventListener("keyup", function(e) {
      nominal.value = formatRupiah(this.value, "Rp. ");
    });

    var nominal_tambah = document.getElementById("piutang");
    nominal_tambah.addEventListener("keyup", function(e) {
      nominal_tambah.value = formatRupiah(this.value, "Rp. ");
    });

    var nominal_edit = document.getElementById("piutang_edit");
    nominal_edit.addEventListener("keyup", function(e) {
      nominal_edit.value = formatRupiah(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
      }

      return rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      // return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

    $("#nik_cari").change(function () {
        if ($(this).val() != "") {
        var nik_cari=$('#nik_cari').val();
            $.ajax({
                url: "<?=base_url('piutang/tampil')?>",
                method: "POST",
                data: { 'nik_baru': nik_cari },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nik_tampil']").val(value.nik_baru);
                        $("input[name='nama_karyawan_shift']").val(value.nama_karyawan_struktur);
                        $("input[name='jabatan_karyawan_shift']").val(value.jabatan_struktur);
                        $("input[name='kode_karyawan_shift']").val(value.jabatan_karyawan);
                        $("input[name='lokasi_karyawan_shift1']").val(value.lokasi_hrd);
                    });
                },
            });
        }
    })

</script>