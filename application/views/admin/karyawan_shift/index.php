<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <!-- <img width="60" height="60" src="<?php echo base_url($this->config->item('img_path').'karyawan_shift.jfif') ?>" alt="" /> -->
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <!-- <div class="actions">
                    <a data-toggle="modal" data-target="#myModal">
                        Filter Jadwal Shift Karyawan
                    </a>
                </div> -->
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th>No. </th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Departement</th>
                                <th>Tanggal</th>
                                <th>Jam Kerja</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo $row['kode_departement'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['tanggal_shift'])) ?> </td>
                            <td> <?php echo $row['waktu_masuk']. ' - ' .$row['waktu_keluar'] ?> </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tampilan Modal -->
            <div class="modal" id="myModal" role="dialog" style="margin-top: 5%">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <form action="<?php echo site_url('karyawan_shift/filter_shift') ?>" method="POST" id="forM_query" class="filterform">
                        <div class="modal-header">
                            <h3 align="center" id="title_modal">Shift Karyawan</h3>
                        </div>
                        <div class="modal-body" id="menu-body">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label>Depo</label><br>
                                    <select name="lokasi_struktur" class="form-control" id="lokasi_struktur">
                                    <option value="">-- Pilih Lokasi --</option>
                                        <?php
                                        foreach ($lokasi as $k)
                                        {
                                            echo "<option value='$k->depo_nama'>$k->depo_nama</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label>Jabatan</label>
                                    <select name="jabatan_struktur" id="jabatan_struktur" class="selectpicker show-tick form-control" data-live-search="true" data-width="80%">
                                        <option value="">-- Pilih Jabatan --</option>
                                        <?php
                                            foreach ($jabatan as $p)
                                            {
                                                $no_jabatan_karyawan=$p->no_jabatan_karyawan;
                                                $jabatan_karyawan=$p->jabatan_karyawan;
                                        ?>
                                            <option value="<?=$jabatan_karyawan;?>">
                                                <?=$jabatan_karyawan;?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4" id="menu-customer">
                                    <label>Departement</label><br>
                                    <select name="dept_struktur" class="form-control" id="dept_struktur">
                                    <option value="">-- Pilih Departement --</option>
                                        <?php
                                        foreach ($dept as $k)
                                        {
                                            echo "<option value='$k->nama_departement'>$k->nama_departement</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <label>NIK</label><br>
                                    <input type="text" name="nik_karyawan" class="form-control" placeholder="Enter Kode NIK">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Start Date</label><br>
                                    <input name="tanggal1" placeholder="DD-MM-YYYY" class="form-control" type="date" >
                                </div>
                                <div class="col-md-6">
                                    <label>End Date</label>
                                    <input name="tanggal2" placeholder="DD-MM-YYYY" class="form-control" type="date" >
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-refresh"></i> Process
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="dismiss_modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/karyawan_shift.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN_SHIFT.filterAbsen();
    window.KARYAWAN_SHIFT.initTable();
</script>
<script type="text/javascript">
    function reload_modal(id_modal)
    {
        $("#title_modal").html(id_modal);
        $("#menu-report option").remove();
        var report_list;
        switch(id_modal) {
            case "Report Harian":
            report_list = <?=$daily_report?>;
            break;
            case "Report Mingguan":
            report_list = <?=$weekly_report?>;
            break;
            case "Report Bulanan":
            report_list = <?=$monthly_report?>;
            break;
            default:
            report_list = null;
        }
        $.each(report_list, function(key, value){
            $("#menu-report").append("<option value='"+key+"'>"+value+"</option>");
        });
    }
</script>