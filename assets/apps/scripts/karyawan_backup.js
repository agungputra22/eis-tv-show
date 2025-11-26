window.KARYAWAN_BACKUP = (function($) {

    return {

        elTable : '#datatables',
        elTableServer : '#datatable_ajax',
        urlGetData : window.APP.siteUrl + 'karyawan_backup/datalist',

        elPortlet : '.portlet',
        elForm : '.form-karyawan_backup',
        elBtnList : '.btnList',
        elBtnDelete : '.btnDelete',
        elBtnF1 : '.btnF1',
        elBtnF4 : '.btnF4',
        elBtnChange : '.btnChange',

        // kirim data
        handleSendData : function() {
            var parentThis = this;

            $(parentThis.elForm).validate({
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
                    if(response.status == 'success') {    
                        setTimeout(function() {
                            $(parentThis.elBtnList).click();
                        }, 1000);
                    }
                }
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
                                    parentThis.initLoad($(this));
                                }, 1000);
                            }
                        }
                    });
                }
                
            });
        },

        handleF1 : function() {
            var parentThis = this;
            $(parentThis.elBtnF1).click(function() {
                if(confirm('Apakah anda ingin submit F1 ?')) {
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
                                    parentThis.initLoad_f1($(this));
                                }, 1000);
                            }
                        }
                    });
                }
                
            });
        },

        handleF4 : function() {
            var parentThis = this;
            $(parentThis.elBtnF4).click(function() {
                if(confirm('Apakah anda ingin submit F4 ?')) {
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
                                    parentThis.initLoad_f4($(this));
                                }, 1000);
                            }
                        }
                    });
                }
                
            });
        },

        handleChange : function() {
            var parentThis = this;
            $(parentThis.elBtnChange).click(function() {
                if(confirm('Reset password akun ini?')) {
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
                                    parentThis.initLoad($(this));
                                }, 1000);
                            }
                        }
                    });
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

        // initial table
        initTable : function() {
            var parentThis = this;
            $(parentThis.elTable).dataTable({
                "bStateSave" : true,
                "pagingType": "bootstrap_extended"
            });
        },

        initLoad : function(btn) {
            var url = window.APP.siteUrl + 'karyawan_backup/index';
            Layout.loadAjaxContent(url, btn);
        },

        initLoad_f1 : function(btn) {
            var url = window.APP.siteUrl + 'karyawan_backup/index_security';
            Layout.loadAjaxContent(url, btn);
        },

        initLoad_f4 : function(btn) {
            var url = window.APP.siteUrl + 'karyawan_backup/index_security';
            Layout.loadAjaxContent(url, btn);
        }
    }

})(jQuery);