window.TARIKAN_ABSEN = (function($) {

    return {

        elTable : '#datatables',
        elTableServer : '#datatable_ajax',
        urlGetData : window.APP.siteUrl + 'tarikan_absen/datalist',

        elPortlet : '.portlet',
        elForm : '.filterform',
        elForm_bulan : '.filterform_bulan',
        elForm_rekap : '.filterform_rekap',

        // kirim data
        filterAbsen : function() {
            var parentThis = this;
            var pageContent = $('.page-content .page-content-body');

            $(parentThis.elForm).submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url : $(this).attr('action'),
                    type : 'post',
                    data : $(this).serialize(),
                    beforeSend : function() {
                        // block UI
                        $(parentThis.elPortlet).block({
                            message: '<h4>Harap tunggu..</h4>'
                        });
                    },
                    success : function(response) {
                        $(parentThis.elPortlet).unblock();
                        $('#myModal').modal('hide');
                        pageContent.html(response);
                    }
                });
                
            });
        },

        filterAbsen_bulan : function() {
            var parentThis = this;
            var pageContent = $('.page-content .page-content-body');

            $(parentThis.elForm_bulan).submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url : $(this).attr('action'),
                    type : 'post',
                    data : $(this).serialize(),
                    beforeSend : function() {
                        // block UI
                        $(parentThis.elPortlet).block({
                            message: '<h4>Harap tunggu..</h4>'
                        });
                    },
                    success : function(response) {
                        $(parentThis.elPortlet).unblock();
                        $('#myModal_bulanan').modal('hide');
                        pageContent.html(response);
                    }
                });
                
            });
        },

        filterAbsen_rekap : function() {
            var parentThis = this;
            var pageContent = $('.page-content .page-content-body');

            $(parentThis.elForm_rekap).submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url : $(this).attr('action'),
                    type : 'post',
                    data : $(this).serialize(),
                    beforeSend : function() {
                        // block UI
                        $(parentThis.elPortlet).block({
                            message: '<h4>Harap tunggu..</h4>'
                        });
                    },
                    success : function(response) {
                        $(parentThis.elPortlet).unblock();
                        $('#myModal_absensi').modal('hide');
                        pageContent.html(response);
                    }
                });
                
            });
        },

        // initial table server side
        initTableServer : function() {
            var parentThis = this;
            var getUrl = $(parentThis.elTableServer).data('url');
            var getColmn = $(parentThis.elTableServer).data('columns');
            $(parentThis.elTableServer).dataTable({
                "bStateSave": true,
                "pagingType": "bootstrap_extended",
                "bFilter" : true,               
                "bLengthChange": true,
                // server side
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": getUrl,
                    "type": "POST"
                },
                //Set column definition initialisation properties.
                "columns": [
                    { "data" : getColmn[0].data, width : getColmn[0].width, "sClass" : getColmn[0].sClass },
                ]
            });
        },

        // initial table
        initTable : function() {
            var parentThis = this;
            $(parentThis.elTable).dataTable({
                "bStateSave" : true,
                "pagingType": "bootstrap_extended"
            });
        },

        initLoad : function(btn) {
            var url = window.APP.siteUrl + 'tarikan_absen/index';
            Layout.loadAjaxContent(url, btn);
        },

        handleBootstrapSelect : function() {
            $('.bs-select').selectpicker({
                iconBase: 'fa',
                tickIcon: 'fa-check'
            });
        }
    }

})(jQuery);