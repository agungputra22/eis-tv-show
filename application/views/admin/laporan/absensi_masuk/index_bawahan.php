<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> NIK </th>
                                <th> Nama </th>
                                <th> Jabatan </th>
                                <th> Departement </th>
                                <th> Lokasi </th>
                                <th> Aksi </th>
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
                            <td> <?php echo $row['dept_struktur'] ?> </td>
                            <td> <?php echo $row['lokasi_hrd'] ?> </td>
                            <td align="center">
                                <a href="<?php echo site_url('absensi_masuk/detail_absen/'.$row['nik_baru']) ?>" class="text-primary ajaxify"><i class="fa fa-eye">View Absen</i></a> &nbsp;
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

            <!-- Tampilan Modal -->
            <div class="modal" id="myModal" role="dialog" style="margin-top: 5%">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <form action="<?php echo site_url('tarikan_absen/query_harian') ?>" method="POST" id="form_query" class="filterform">
                        <div class="modal-header">
                            <h3 align="center" id="title_modal">Export Absensi Harian</h3>
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
                                    <select name="jabatan_struktur" id="jabatan_struktur" class="bs-select form-control" data-live-search="true" data-size="8">
                                        <option value="">-- Pilih Jabatan --</option>
                                        <?php
                                            foreach ($jabatan as $p)
                                            {
                                                $no_jabatan_karyawan=$p->no_jabatan_karyawan;
                                                $jabatan_karyawan=$p->jabatan_karyawan;
                                        ?>
                                            <option value="<?=$no_jabatan_karyawan;?>">
                                                <?=$jabatan_karyawan;?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4" id="menu-customer">
                                    <label>Departement</label><br>
                                    <input type="text" name="dept_struktur" class="form-control" readonly="" value="<?php echo users('dept_struktur'); ?>">
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

<script src="<?php echo base_url('assets/apps/scripts/tarikan_absen.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.TARIKAN_ABSEN.filterAbsen();
    window.TARIKAN_ABSEN.initTable();
    window.TARIKAN_ABSEN.handleBootstrapSelect();
</script>