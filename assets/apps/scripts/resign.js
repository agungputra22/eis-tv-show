window.RESIGN = (function($) {

    return {

        elTable : '#datatables',
        elTableDaily : '#datatables_daily',
        elTableWeekly : '#datatables_weekly',
        elTableMonthly : '#datatables_monthly',
        elTableResiko : '#datatables_resiko',
        elTableServer : '#datatable_ajax',
        urlGetData : window.APP.siteUrl + 'resign/datalist',

        elPortlet : '.portlet',
        elForm : '.form-resign',
        elFormUpdate : '.form-resign-serah-terima',
        elBtnList : '.btnList',
        elBtnDelete : '.btnDelete',
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
                            parentThis.initLoad($(this));
                        }, 1000);
                    }
                }
            });
        },

        // kirim data
        handleSendData_Approve : function() {
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
                            parentThis.initLoadApprove($(this));
                        }, 1000);
                    }
                }
            });
        },

        // kirim data
        handleSendData_Approve2 : function() {
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
                            parentThis.initLoadApprove2($(this));
                        }, 1000);
                    }
                }
            });
        },

        handleSendDataUpdate : function() {
            var parentThis = this;

            $(parentThis.elFormUpdate).validate({
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
            $(parentThis.elFormUpdate).ajaxForm({
                dataType : 'json',
                beforeSend : function() {
                    // block UI
                    $(parentThis.elFormUpdate).closest('.portlet').block({
                        message: '<h4>Harap tunggu..</h4>'
                    });
                },
                success : function(response) {
                    $(parentThis.elFormUpdate).closest('.portlet').unblock();
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
                            parentThis.initLoadSerahTerima($(this));
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

        initTableDaily : function() {
            var parentThis = this;
            $(parentThis.elTableDaily).dataTable({
                "bStateSave" : true,
                "pagingType": "bootstrap_extended"
            });
        },

        initTableWeekly : function() {
            var parentThis = this;
            $(parentThis.elTableWeekly).dataTable({
                "bStateSave" : true,
                "pagingType": "bootstrap_extended"
            });
        },

        initTableMonthly : function() {
            var parentThis = this;
            $(parentThis.elTableMonthly).dataTable({
                "bStateSave" : true,
                "pagingType": "bootstrap_extended"
            });
        },

        initTableResiko : function() {
            var parentThis = this;
            $(parentThis.elTableResiko).dataTable({
                "bStateSave" : true,
                "pagingType": "bootstrap_extended"
            });
        },

        initLoad : function(btn) {
            var url = window.APP.siteUrl + 'resign/index';
            Layout.loadAjaxContent(url, btn);
        },

        initLoadApprove : function(btn) {
            var url = window.APP.siteUrl + 'resign/approve';
            Layout.loadAjaxContent(url, btn);
        },

        initLoadApprove2 : function(btn) {
            var url = window.APP.siteUrl + 'resign/approve_level_2';
            Layout.loadAjaxContent(url, btn);
        },

        initLoadSerahTerima : function(btn) {
            var url = window.APP.siteUrl + 'resign/index_serah_terima';
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