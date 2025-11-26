window.KARYAWAN_SHIFT = (function($) {

    return {

        elTable : '#datatables',
        elTableServer : '#datatable_ajax',
        urlGetData : window.APP.siteUrl + 'karyawan_shift/datalist',

        elPortlet : '.portlet',
        // elForm : '.filterform',
        elForm : '.form-karyawan_shift',
        elForm_range : '.form-karyawan_range',
        elBtnList : '.btnList',
        elBtnDelete : '.btnDelete',
        elBtnChange : '.btnChange',

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

        // kirim data
        handleSendData : function() {
            var parentThis = this;

            $(parentThis.elForm).validate({
                errorElement : 'p',
                errorClass : 'help-block text-danger'
            });

            // ajaxform
            $(parentThis.elForm).ajaxForm({
                dataType : 'json',
                beforeSend : function() {
                    // block UI
                    $(parentThis.elForm).closest('.portlet').block({
                        message: '<h4>Harap tunggu..</h4>'
                    });
                },
                success : function(response) {
                    $(parentThis.elForm).closest('.portlet').unblock();
                    toastr.options = {
                        closeButton: true,
                        debug: false,
                        positionClass: 'toast-top-right',
                        onclick: null
                    };
                    toastr[response.status](response.message, response.status);
                    // redirect to list berita jika success
                    // if(response.status == 'success') {    
                        // setTimeout(function() {
                        //     $(parentThis.elBtnList).click();
                        // }, 1000);
                    // }
                }
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

         handleDeleteData : function() {
            var parentThis = this;
            $(parentThis.elBtnDelete).click(function() {
                if(confirm('Apakah anda akan menghapus ini ?')) {
                    $.ajax({
                        url : $(this).data('url'),
                        type : 'post',
                        dataType : 'json',
                        data : {
                            id : $(this).data('id')
                        },
                        beforeSend : function() {
                            // block UI
                            $(parentThis.elPortlet).block({
                                message: '<h4>Harap tunggu..</h4>'
                            });
                        },
                        success : function(response) {
                            $(parentThis.elPortlet).unblock();
                            toastr.options = {
                                closeButton: true,
                                debug: false,
                                positionClass: 'toast-top-right',
                                onclick: null
                            };
                            toastr[response.status](response.message, response.status);
                            if(response.status == 'success') {    
                                setTimeout(function() {
                                    parentThis.initLoad_hapus($(this));
                                }, 1000);
                            }
                        }
                    });
                }
                
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
            var url = window.APP.siteUrl + 'karyawan_shift/index';
            Layout.loadAjaxContent(url, btn);
        },

        initLoad_simpan : function(btn) {
            var url = window.APP.siteUrl + 'karyawan_shift/tambah';
            Layout.loadAjaxContent(url, btn);
        },

        initLoad_edit : function(btn) {
            var url = window.APP.siteUrl + 'karyawan_shift/edit';
            Layout.loadAjaxContent(url, btn);
        },

        initLoad_range : function(btn) {
            var url = window.APP.siteUrl + 'karyawan_shift/range_tanggal';
            Layout.loadAjaxContent(url, btn);
        },

        initLoad_hapus : function(btn) {
            var url = window.APP.siteUrl + 'karyawan_shift/index_karyawan_shift';
            Layout.loadAjaxContent(url, btn);
        },

        loadPengalamankerja : function() {
            $('.reload-kerja').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url : window.APP.siteUrl + 'karyawan_shift/tabel_shift',
                    type : 'get',
                    beforeSend : function() {
                        // block UI
                        $("#karyawan_shift_all").html("<center>Harap tunggu...</center>");
                    },
                    success : function(response) {
                        $("#karyawan_shift_all").html(response);
                    }
                });
            });
        },

        savePengalamankerja: function() {
            var parentThis = this;
            // $('.simpan-kerja').click(function(e) {
            //     e.preventDefault();
                $('.form-data-shift').ajaxForm({
                    dataType : 'json',
                    beforeSend : function() {
                        // block UI
                        $(parentThis.elPortlet).block({
                            message: '<h4>Harap tunggu..</h4>'
                        });
                    },
                    success : function(response) {
                        $(parentThis.elPortlet).unblock();
                        toastr.options = {
                            closeButton: true,
                            debug: false,
                            positionClass: 'toast-top-right',
                            onclick: null
                        };
                        toastr[response.status](response.message, response.status);
                        // $(FormName).find('button').attr('disabled','true');
                        // $('#nik_baru').attr('readonly', 'readonly');
                        $('#nama_karyawan_shift').attr('readonly', 'readonly');
                        // redirect to list berita jika success
                        if(response.status == 'success' && Redirect == true) {    
                            setTimeout(function() {
                                $(".reload-kerja").click();
                            }, 1000);
                        }
                    }
                });
            // });
        },

        // kirim data Range
        handleSendData_Range : function() {
            var parentThis = this;

            $(parentThis.elForm_range).validate({
                errorElement : 'p',
                errorClass : 'help-block text-danger',
                rules : {
                    username : {
                        minlength : 5
                    },
                    password : {
                        minlength : 5
                    }
                }
            });

            // ajaxform
            $(parentThis.elForm_range).ajaxForm({
                dataType : 'json',
                beforeSend : function() {
                    // block UI
                    $(parentThis.elForm_range).closest('.portlet').block({
                        message: '<h4>Harap tunggu..</h4>'
                    });
                },
                success : function(response) {
                    $(parentThis.elForm_range).closest('.portlet').unblock();
                    toastr.options = {
                        closeButton: true,
                        debug: false,
                        positionClass: 'toast-top-right',
                        onclick: null
                    };
                    toastr[response.status](response.message, response.status);
                    // redirect to list berita jika success
                    if(response.status == 'success') {    
                        setTimeout(function() {
                            parentThis.initLoad_range($(this));
                        }, 1000);
                    }
                }
            });
        },

        handleBootstrapSelect : function() {
            $('.bs-select').selectpicker({
                iconBase: 'fa',
                tickIcon: 'fa-check'
            });
        }
        
    }

})(jQuery);