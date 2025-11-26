<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('daily_activity/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"><i class="icon-layers font-green"></i> Form Activity </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> <input type="checkbox" id="check-all"> </th>
                                <th> NO. </th>
                                <th> Submit Date </th>
                                <th> Jenis Lokasi </th>
                                <th> Lokasi </th>
                                <th> Keterangan </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> 
                                <input type="checkbox" class="check-item" name="sport" required="" value="<?php echo $row['id'] ?>"> 
                            </td>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo namahari($row['submit_date']). ', ' .DateToIndo(date($row['submit_date'])); ?> </td>
                            <td> 
                                <?php 
                                if ($row['status_lokasi'] == '0') {
                                    echo "External Lokasi";
                                } else {
                                    echo "Internal Lokasi";
                                }
                                ?>
                            </td>
                            <td> <?php echo $row['lokasi'] ?> </td>
                            <td> <?php echo $row['keterangan'] ?> </td>
                            <td align="center">
                                <a href="<?php echo site_url('daily_activity/edit/'.$row['id']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i></a> &nbsp;
                                <a data-url="<?php echo site_url('daily_activity/doDelete/') ?>" data-id="<?php echo $row['id'] ?>" class="text-danger btnDelete"><i class="fa fa-trash"></i></a> &nbsp;
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                        </tbody>
                    </table>
                    <hr>
                    <button type="button">SAVE ALL</button>
                </div>
                

                <form role="form" class="form-horizontal form-daily_activity" method="post" action="<?php echo site_url('daily_activity/doUpdate_all') ?>">
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Rekap Daily Activity </h4>
                          </div>
                          <div class="modal-body">
                                Apakah anda ingin Save All ? 
                                <input id="checkid" type="text" name="id_daily" required readonly></input>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/daily_activity.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.DAILY_ACTIVITY.initTable();

    $(document).ready(function() {
      $("button").click(function() {
        var favorite = [];
        $.each($("input[name='sport']:checked"), function() {
          favorite.push($(this).val());
        });
        $('#myModal').modal('show').on('shown.bs.modal', function() {
          $("#checkid").html("Sedang Maintanance: " + favorite.join(", "));
          $("input[name='id_daily']").val(favorite.join(", "));
        });
      });
    });

    $("#check-all").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
    });
</script>