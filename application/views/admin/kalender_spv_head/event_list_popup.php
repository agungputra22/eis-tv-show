<?php if(!empty($list)): ?>
	<div class="alert alert-info">
        <h4>Daftar Karyawan Lembur pada tanggal "<b><?=$tanggal_event?></b>":</h4>
    </div>
	<div class="table-responsive">
        <p class="popup-notice">NB: Silakan klik pada data <b>Jam Kerja</b> jika ingin merubahnya</p>
        <a id="btn-add-event" href="#"><span class="btn-add-event"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Karyawan</span></a> <br>
        <a href="<?php echo site_url('kalender/excel/'.$bulan_dan_tanggal) ?>" target='_blank' class="btn btn-xs text-success"><i class="fa fa-print"></i> Print SPKL</a>
		<table class="table table-bordered" id="event-list-table">
	        <tr>
	            <th>No</th>
                <th>NIK</th>
	            <th style="width: 30%;">Nama Karyawan Shift</th>
	            <th style="width: 40%;">Jabatan</th>
	            <th style="width: 30%;">Jam Kerja</th>
                <th>Aksi</th>
	        </tr>
            <?php
            $no = 1;
            foreach ($listdata as $row) {
            ?>
            <tr data-id="<?php echo $row['id_karyawan_shift'] ?>">
                <td> <?php echo $no ?> </td>
                <td> <?php echo $row['nik_shift'] ?>
                    <input type="hidden" name="id" id="id" value="<?php echo $row['id_karyawan_shift'] ?>">
                </td>
                <td> <?php echo $row['nama_karyawan_shift'] ?> </td>
                <td> <?php echo $row['jabatan_karyawan_shift'] ?> </td>
                <td class="editable-deksripsi" contenteditable="true" onBlur="saveToDatabase2(this,'jam_kerja','<?=$row['id_karyawan_shift']?>')" onClick="showEditName2(this);">
                    <select name="jam_kerja" id="jam_kerja" class="form-control editable-name" contenteditable="true" onBlur="saveToDatabase2(this,'jam_kerja','<?=$row['id_karyawan_shift']?>')" onClick="showEditName2(this);">
                    <option value=""><?php echo $row['waktu_masuk'].' - '.$row['waktu_keluar'] ?></option>
                        <?php
                        foreach ($jam_kerja as $k)
                        {
                            echo "<option value='$k->id_shifting'>$k->waktu_masuk - $k->waktu_keluar</option>";
                        }
                        ?>
                    <option value="OFF">OFF</option>
                    </select>
                </td>
                <td><i class="glyphicon glyphicon-trash delete" title="Delete"></i></td>
            </tr>
            <?php
            $no++;
            }
            ?>
	    </table>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){

            $('.editable-jam_kerja').on('keypress', function (e) {
                if(e.which === 13){
                    $(this).blur();
                }
            });
            $('.mydatepicker').mask('0000-00-00');
            $('.mydatepicker').focus(function(){
                $(this).attr('readonly',true);
            });

        });

        $('.delete').click(function(e){
            e.preventDefault();
            var row = $(this).parent().parent();
            var id = row.data('id');

            if(confirm('Apakah anda yakin ingin menghapus karyawan ini?')){
                $.ajax({
                    url: 'kalender/delete_event/',
                    type: "POST",
                    dataType: "html",
                    data: "id="+id,
                    success: function(response){
                        if(response === 'success'){
                            row.fadeOut('fast');
                        }else{
                            alert("Hapus gagal!");
                        }
                        console.log(response);
                    },
                    error: function(){
                        alert('Error occured on AJAX request! Please try again later.');
                    }
                });
            }else{
                return false;
            }
            return false;
        });

        function showEditName2(editableObj){
            $(editableObj).css("background","#EEEEEE");
        } 

        function showEditDate2(editableObj, id){
            $(editableObj).css("background","#EEEEEE");
            $(editableObj).datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                onSelect: function(dateText, inst) {
                    $(editableObj).parent().find('#birth-date-popup-for-'+id).val(dateText);
                    saveDateToDatabase2(editableObj, 'birth_date', id);
                }
            }).datepicker('show'); 
        } 

        function saveToDatabase2(editableObj, column, id){
            $(editableObj).css("background","#FFF url(assets/images/loadericon.gif) no-repeat right");
            var v = editableObj.innerHTML.trim();
            $.ajax({
                url: 'kalender/update_event/',
                type: "POST",
                data: {id: id, kolom: column, nilai: v},
                success: function(response){
                    if(response === 'success'){
                        $(editableObj).css("background","#FFF");
                    }else{
                        $(editableObj).css("background","#FFCDD2 url(assets/images/failed.png) no-repeat right");
                    }
                    console.log(response);
                },
                error: function(){
                    alert('Error occured on AJAX request! Please try again later.');
                }
            });
        }

        function saveDateToDatabase2(editableObj, column, id){
            $(editableObj).css("background","#FFF url(assets/images/loadericon.gif) no-repeat right");
            var v = $(editableObj).parent().find('#birth-date-popup-for-'+id).val();
            if(v != ""){
                $.ajax({
                    url: 'kalender/update_event/',
                    type: "POST",
                    data: {id: id, kolom: column, nilai: v},
                    success: function(response){
                        if(response === 'success'){
                            $(editableObj).css("background","#FFF");
                            if(v != ""){
                                updateAge2(id);
                            }
                        }else{
                            $(editableObj).css("background","#FFCDD2 url(assets/images/failed.png) no-repeat right");
                        }
                        console.log(response);
                    },
                    error: function(){
                        alert('Error occured on AJAX request! Please try again later.');
                    }
                });
            }
            else{
                $(editableObj).css("background","#FFF");
            }
        }

        function updateAge2(id){
            var age_content = $('#age-popup-for-'+id);
            age_content.css("background","#FFF url(assets/images/loadericon.gif) no-repeat right");
            $.ajax({
                url: 'kalender/get_age/',
                type: "POST",
                data: {id: id},
                success: function(response){
                    if(response !== ''){
                        age_content.css("background","#FFF");
                        age_content.html(response)
                    }else{
                        age_content.css("background","#FFCDD2 url(assets/images/failed.png) no-repeat right");
                    }
                    console.log(response);
                },
                error: function(){
                    alert('Error occured on AJAX request! Please try again later.');
                }
            });
        }
    </script>
<?php else: ?>
    <p class="popup-notice">Belum ada events untuk tanggal "<b><?=$tanggal_event?></b>"</p><br>
    <div class="alert alert-info">
        <h4>Daftar Karyawan Lembur pada tanggal "<b><?=$tanggal_event?></b>":</h4>
    </div>
    <div class="table-responsive">
        <form role="form" class="form-horizontal form-cuti_khusus" method="post" action="<?php echo site_url('cuti_khusus/doInput') ?>">
        <p class="popup-notice">NB: Silakan klik pada data <b>Jam Kerja</b> jika ingin merubahnya</p>
        <a id="btn-add-event" href="#"><span class="btn-add-event"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Karyawan</span></a> <br>
        <a href="<?php echo site_url('kalender/excel/'.$bulan_dan_tanggal) ?>" target='_blank' class="btn btn-xs text-success"><i class="fa fa-print"></i> Print SPKL</a>
        <table class="table table-bordered" id="event-list-table">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th style="width: 30%;">Nama Karyawan Shift</th>
                <th style="width: 40%;">Jabatan</th>
                <th style="width: 30%;">Jam Kerja</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($listdata as $row) {
            ?>
            <tr data-id="<?php echo $row['id_karyawan_shift'] ?>">
                <td> <?php echo $no ?> </td>
                <td> <?php echo $row['nik_shift'] ?>
                    <input type="hidden" name="id" id="id" value="<?php echo $row['id_karyawan_shift'] ?>">
                </td>
                <td> <?php echo $row['nama_karyawan_shift'] ?> </td>
                <td> <?php echo $row['jabatan_karyawan_shift'] ?> </td>
                <td class="editable-deksripsi" contenteditable="true" onBlur="saveToDatabase2(this,'jam_kerja','<?=$row['id_karyawan_shift']?>')" onClick="showEditName2(this);">
                    <select name="jam_kerja" id="jam_kerja" class="form-control editable-name" contenteditable="true" onBlur="saveToDatabase2(this,'jam_kerja','<?=$row['id_karyawan_shift']?>')" onClick="showEditName2(this);">
                    <option value=""><?php echo $row['waktu_masuk'].' - '.$row['waktu_keluar'] ?></option>
                        <?php
                        foreach ($jam_kerja as $k)
                        {
                            echo "<option value='$k->id_shifting'>$k->waktu_masuk - $k->waktu_keluar</option>";
                        }
                        ?>
                    <option value="OFF">OFF</option>
                    </select>
                </td>
                <td><i class="glyphicon glyphicon-trash delete" title="Delete"></i></td>
            </tr>
            <?php
            $no++;
            }
            ?>
        </table>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Pengajuan</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){

            $('.editable-jam_kerja').on('keypress', function (e) {
                if(e.which === 13){
                    $(this).blur();
                }
            });
            $('.mydatepicker').mask('0000-00-00');
            $('.mydatepicker').focus(function(){
                $(this).attr('readonly',true);
            });

        });

        $('.delete').click(function(e){
            e.preventDefault();
            var row = $(this).parent().parent();
            var id = row.data('id');

            if(confirm('Apakah anda yakin ingin menghapus karyawan ini?')){
                $.ajax({
                    url: 'kalender/delete_event/',
                    type: "POST",
                    dataType: "html",
                    data: "id="+id,
                    success: function(response){
                        if(response === 'success'){
                            row.fadeOut('fast');
                        }else{
                            alert("Hapus gagal!");
                        }
                        console.log(response);
                    },
                    error: function(){
                        alert('Error occured on AJAX request! Please try again later.');
                    }
                });
            }else{
                return false;
            }
            return false;
        });

        function showEditName2(editableObj){
            $(editableObj).css("background","#EEEEEE");
        } 

        function showEditDate2(editableObj, id){
            $(editableObj).css("background","#EEEEEE");
            $(editableObj).datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                onSelect: function(dateText, inst) {
                    $(editableObj).parent().find('#birth-date-popup-for-'+id).val(dateText);
                    saveDateToDatabase2(editableObj, 'birth_date', id);
                }
            }).datepicker('show'); 
        } 

        function saveToDatabase2(editableObj, column, id){
            $(editableObj).css("background","#FFF url(assets/images/loadericon.gif) no-repeat right");
            var v = editableObj.innerHTML.trim();
            $.ajax({
                url: 'kalender/update_event/',
                type: "POST",
                data: {id: id, kolom: column, nilai: v},
                success: function(response){
                    if(response === 'success'){
                        $(editableObj).css("background","#FFF");
                    }else{
                        $(editableObj).css("background","#FFCDD2 url(assets/images/failed.png) no-repeat right");
                    }
                    console.log(response);
                },
                error: function(){
                    alert('Error occured on AJAX request! Please try again later.');
                }
            });
        }

        function saveDateToDatabase2(editableObj, column, id){
            $(editableObj).css("background","#FFF url(assets/images/loadericon.gif) no-repeat right");
            var v = $(editableObj).parent().find('#birth-date-popup-for-'+id).val();
            if(v != ""){
                $.ajax({
                    url: 'kalender/update_event/',
                    type: "POST",
                    data: {id: id, kolom: column, nilai: v},
                    success: function(response){
                        if(response === 'success'){
                            $(editableObj).css("background","#FFF");
                            if(v != ""){
                                updateAge2(id);
                            }
                        }else{
                            $(editableObj).css("background","#FFCDD2 url(assets/images/failed.png) no-repeat right");
                        }
                        console.log(response);
                    },
                    error: function(){
                        alert('Error occured on AJAX request! Please try again later.');
                    }
                });
            }
            else{
                $(editableObj).css("background","#FFF");
            }
        }

        function updateAge2(id){
            var age_content = $('#age-popup-for-'+id);
            age_content.css("background","#FFF url(assets/images/loadericon.gif) no-repeat right");
            $.ajax({
                url: 'kalender/get_age/',
                type: "POST",
                data: {id: id},
                success: function(response){
                    if(response !== ''){
                        age_content.css("background","#FFF");
                        age_content.html(response)
                    }else{
                        age_content.css("background","#FFCDD2 url(assets/images/failed.png) no-repeat right");
                    }
                    console.log(response);
                },
                error: function(){
                    alert('Error occured on AJAX request! Please try again later.');
                }
            });
        }
    </script>
<?php endif; ?>

<script>
    
    $('#btn-add-event').click(function(e){
        e.preventDefault();
        
        showAddForm();
    });
    
    function showAddForm() {
        // show second modal
        $('#addformmodal').modal('toggle');
    
        // set value to hidden element in second modal
        var bdt = $('#addformmodal').find('#bulan-dan-tanggal');
        bdt.val('<?=$bulan_dan_tanggal?>');
    }
</script>
