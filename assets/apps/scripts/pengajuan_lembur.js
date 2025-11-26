window.PENGAJUAN_LEMBUR = (function($) {

    return {

        elTable : '#datatables',
        elTableServer : '#datatable_ajax',
        urlGetData : window.APP.siteUrl + 'pengajuan_lembur/datalist',

        elPortlet : '.portlet',
        elForm : '.form-pengajuan_lembur',
        elBtnList : '.btnList',
        elBtnDelete : '.btnDelete',
        elBtnApprove : '.btnApprove',
        elBtnReject : '.btnReject',
        elBtnPayed : '.btnPayed',
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

        handleApproveData : function() {
            var parentThis = this;
            $(parentThis.elBtnApprove).click(function() {
                if(confirm('Apakah anda ingin approval karyawan ini ?')) {
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
                                    parentThis.initLoad_approve($(this));
                                }, 1000);
                            }
                        }
                    });
                }
                
            });
        },

        handleRejectData : function() {
            var parentThis = this;
            $(parentThis.elBtnReject).click(function() {
                if(confirm('Apakah anda ingin not approval karyawan ini ?')) {
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
                                    parentThis.initLoad_reject($(this));
                                }, 1000);
                            }
                        }
                    });
                }
                
            });
        },

        handlePayedData : function() {
            var parentThis = this;
            $(parentThis.elBtnPayed).click(function() {
                if(confirm('Apakah karyawan sudah di bayar ?')) {
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
                                    parentThis.initLoad_payed($(this));
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
            var url = window.APP.siteUrl + 'pengajuan_lembur/index';
            Layout.loadAjaxContent(url, btn);
        },

        initLoad_approve : function(btn) {
            var url = window.APP.siteUrl + 'pengajuan_lembur/index';
            Layout.loadAjaxContent(url, btn);
        },

        initLoad_reject : function(btn) {
            var url = window.APP.siteUrl + 'pengajuan_lembur/index';
            Layout.loadAjaxContent(url, btn);
        },

        initLoad_payed : function(btn) {
            var url = window.APP.siteUrl + 'pengajuan_lembur/event_pembayaran';
            Layout.loadAjaxContent(url, btn);
        }
    }

})(jQuery);