window.PERFORMANCE = (function($) {

    return {

        elTable : '#datatables',
        elTablePointB : '#datatables_point_b',
        elTablePointC : '#datatables_point_c',
        elTablePointD : '#datatables_point_d',
        elTablePointE : '#datatables_point_e',
        elTablePointF : '#datatables_point_f',
        elTableServer : '#datatable_ajax',
        urlGetData : window.APP.siteUrl + 'performance/datalist',

        elPortlet : '.portlet',
        elForm : '.form-performance',
        elFormUpdateTT : '.form-performance-update-tt',
        elFormUpdateUserTT : '.form-performance-user-tt',
        elFormUpdateUserIPP : '.form-performance-user-ipp',
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
                        }, 1000);
                    }
                }
            });
        },

        // kirim data Update TT
        handleSendDataUpdateTT : function() {
            var parentThis = this;

            $(parentThis.elFormUpdateTT).validate({
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
            $(parentThis.elFormUpdateTT).ajaxForm({
                dataType : 'json',
                beforeSend : function() {
                    // block UI
                    $(parentThis.elFormUpdateTT).closest('.portlet').block({
                        message: '<h4>Harap tunggu..</h4>'
                    });
                },
                success : function(response) {
                    $(parentThis.elFormUpdateTT).closest('.portlet').unblock();
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
                            parentThis.initLoadUpdateTT($(this));
                        }, 1000);
                    }
                }
            });
        },

        // kirim data Update User Target Terukur
        handleSendDataUpdateUser : function() {
            var parentThis = this;

            $(parentThis.elFormUpdateUserTT).validate({
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
            $(parentThis.elFormUpdateUserTT).ajaxForm({
                dataType : 'json',
                beforeSend : function() {
                    // block UI
                    $(parentThis.elFormUpdateUserTT).closest('.portlet').block({
                        message: '<h4>Harap tunggu..</h4>'
                    });
                },
                success : function(response) {
                    $(parentThis.elFormUpdateUserTT).closest('.portlet').unblock();
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
                            parentThis.initLoadUpdateUserTT($(this));
                        }, 1000);
                    }
                }
            });
        },

        // kirim data Update User IPP
        handleSendDataUpdateUserIPP : function() {
            var parentThis = this;

            $(parentThis.elFormUpdateUserIPP).validate({
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
            $(parentThis.elFormUpdateUserIPP).ajaxForm({
                dataType : 'json',
                beforeSend : function() {
                    // block UI
                    $(parentThis.elFormUpdateUserIPP).closest('.portlet').block({
                        message: '<h4>Harap tunggu..</h4>'
                    });
                },
                success : function(response) {
                    $(parentThis.elFormUpdateUserIPP).closest('.portlet').unblock();
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
                            parentThis.initLoadUpdateUserIPP($(this));
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

        initTablePointB : function() {
            var parentThis = this;
            $(parentThis.elTablePointB).dataTable({
                "bStateSave" : true,
                "pagingType": "bootstrap_extended"
            });
        },

        initTablePointC : function() {
            var parentThis = this;
            $(parentThis.elTablePointC).dataTable({
                "bStateSave" : true,
                "pagingType": "bootstrap_extended"
            });
        },

        initTablePointD : function() {
            var parentThis = this;
            $(parentThis.elTablePointD).dataTable({
                "bStateSave" : true,
                "pagingType": "bootstrap_extended"
            });
        },

        initTablePointE : function() {
            var parentThis = this;
            $(parentThis.elTablePointE).dataTable({
                "bStateSave" : true,
                "pagingType": "bootstrap_extended"
            });
        },

        initTablePointF : function() {
            var parentThis = this;
            $(parentThis.elTablePointF).dataTable({
                "bStateSave" : true,
                "pagingType": "bootstrap_extended"
            });
        },

        initLoad : function(btn) {
            var url = window.APP.siteUrl + 'performance/index';
            Layout.loadAjaxContent(url, btn);
        },

        initLoadUpdateTT : function(btn) {
            var url = window.APP.siteUrl + 'performance/index_perbulan';
            Layout.loadAjaxContent(url, btn);
        },

        initLoadUpdateUserTT : function(btn) {
            var url = window.APP.siteUrl + 'performance/index_target_terukur';
            Layout.loadAjaxContent(url, btn);
        },

        initLoadUpdateUserIPP : function(btn) {
            var url = window.APP.siteUrl + 'performance/index_ipp';
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