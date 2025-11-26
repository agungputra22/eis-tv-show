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
                        <div class="container">
                          <form action="<?php echo site_url('karyawan_shift/import') ?>" method="post" id="import_form" enctype="multipart/form-data">

                             <p><label>Pilih File Excel</label>

                             <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>

                             <br />

                             <input type="submit" id="import" name="import" value="Import" class="btn btn-info" />

                          </form>

                          <br />

                          <div class="table-responsive" id="customer_data">

                          </div>

                        </div>
                    </table>
                </div>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/karyawan_shift.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN_SHIFT.initTable();
    
    $(document).ready(function(){ 

      function load_data(){

        $.ajax({

          url:"<?=base_url('karyawan_shift/fetch')?>",

          method:"POST",

          success:function(data){

            $('#customer_data').html(data);

            console.log(data);

          }

        })

      }

      load_data();

     

      $('#import_form').on('submit', function(event){

        event.preventDefault();

        $.ajax({

          url:"<?=base_url('karyawan_shift/import')?>",

          method:"POST",

          data:new FormData(this),

          contentType:false,

          cache:false,

          processData:false,

          success:function(data){

            $('#file').val('');

            load_data();

          }

        })

      });

    });

</script>