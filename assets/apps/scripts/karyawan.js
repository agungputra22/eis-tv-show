window.KARYAWAN = (function($) {

    return {

        elTable : '#datatables',
        elTableServer : '#datatable_ajax',
        urlGetData : window.APP.siteUrl + 'karyawan/datalist',

        elPortlet : '.portlet',
        elBtnList : '.btnList',
        elBtnDelete : '.btnDelete',

        // kirim data
        handleSendData : function(FormName, Redirect = false) {
            var parentThis = this;
            $('#nik_baru').keyup(function() {
                console.log($(this).val());
                $('#hasil_nik').val(this.value);
                $('#hasil_nik_keluarga').val(this.value);
                $('#hasil_nik_anak').val(this.value);
                $('#hasil_nik_susunan').val(this.value);
                $('#hasil_nik_saudara').val(this.value);
                $('#hasil_nik_darurat').val(this.value);
                $('#hasil_nik_pendidikan').val(this.value);
                $('#hasil_nik_pelatihan').val(this.value);
                $('#hasil_nik_bahasa').val(this.value);
                $('#hasil_nik_keahlian').val(this.value);
                $('#hasil_nik_hobi').val(this.value);
                $('#hasil_nik_pengalaman_kerja').val(this.value);
                $('#hasil_nik_organisasi').val(this.value);
                $('#hasil_nik_minat').val(this.value);
                $('#hasil_nik_struktur').val(this.value);
            });

            $('#nama_karyawan_struktur').keyup(function() {
                console.log($(this).val());
                $('#nama_lengkap').val(this.value);
            });

            $(FormName).validate({
                errorElement : 'p',
                errorClass : 'help-block text-danger'
            });

            // ajaxform
            $(FormName).ajaxForm({
                dataType : 'json',
                beforeSend : function() {
                    // block UI
                    $(FormName).closest('.portlet').block({
                        message: '<h4>Harap tunggu..</h4>'
                    });
                },
                success : function(response) {
                    $(FormName).closest('.portlet').unblock();
                    toastr.options = {
                        closeButton: true,
                        debug: false,
                        positionClass: 'toast-top-right',
                        onclick: null
                    };
                    toastr[response.status](response.message, response.status);
                    $(FormName).find('button').attr('disabled','true');
                    // $('#nik_baru').attr('readonly', 'readonly');
                    $('#nama_lengkap').attr('readonly', 'readonly');
                    // redirect to list berita jika success
                    if(response.status == 'success' && Redirect == true) {    
                        setTimeout(function() {
                            parentThis.initLoad($(this));
                        }, 1000);
                    }
                }
            });
        },

        handleSendData_kerja : function(FormName, Redirect = false) {
            var parentThis = this;
            $('#nik_baru').keyup(function() {
                console.log($(this).val());
                $('#hasil_nik').val(this.value);
                $('#hasil_nik_keluarga').val(this.value);
                $('#hasil_nik_anak').val(this.value);
                $('#hasil_nik_susunan').val(this.value);
                $('#hasil_nik_saudara').val(this.value);
                $('#hasil_nik_darurat').val(this.value);
                $('#hasil_nik_pendidikan').val(this.value);
                $('#hasil_nik_pelatihan').val(this.value);
                $('#hasil_nik_bahasa').val(this.value);
                $('#hasil_nik_keahlian').val(this.value);
                $('#hasil_nik_hobi').val(this.value);
                $('#hasil_nik_pengalaman_kerja').val(this.value);
                $('#hasil_nik_organisasi').val(this.value);
                $('#hasil_nik_minat').val(this.value);
                $('#hasil_nik_struktur').val(this.value);
            });

            $('#nama_karyawan_struktur').keyup(function() {
                console.log($(this).val());
                $('#nama_lengkap').val(this.value);
            });

            $(FormName).validate({
                errorElement : 'p',
                errorClass : 'help-block text-danger'
            });

            // ajaxform
            $(FormName).ajaxForm({
                dataType : 'json',
                beforeSend : function() {
                    // block UI
                    $(FormName).closest('.portlet').block({
                        message: '<h4>Harap tunggu..</h4>'
                    });
                },
                success : function(response) {
                    $(FormName).closest('.portlet').unblock();
                    toastr.options = {
                        closeButton: true,
                        debug: false,
                        positionClass: 'toast-top-right',
                        onclick: null
                    };
                    toastr[response.status](response.message, response.status);
                    // $(FormName).find('button').attr('disabled','true');
                    // $('#nik_baru').attr('readonly', 'readonly');
                    // redirect to list berita jika success
                    if(response.status == 'success' && Redirect == true) {    
                        setTimeout(function() {
                            parentThis.initLoad($(this));
                        }, 1000);
                    }
                }
            });
        },

        // Edit data
        handleSendData_edit : function(FormName, Redirect = false) {
            var parentThis = this;
            $('#nik_baru').keyup(function() {
                console.log($(this).val());
                $('#hasil_nik').val(this.value);
                $('#hasil_nik_keluarga').val(this.value);
                $('#hasil_nik_anak').val(this.value);
                $('#hasil_nik_susunan').val(this.value);
                $('#hasil_nik_saudara').val(this.value);
                $('#hasil_nik_darurat').val(this.value);
                $('#hasil_nik_pendidikan').val(this.value);
                $('#hasil_nik_pelatihan').val(this.value);
                $('#hasil_nik_bahasa').val(this.value);
                $('#hasil_nik_keahlian').val(this.value);
                $('#hasil_nik_hobi').val(this.value);
                $('#hasil_nik_pengalaman_kerja').val(this.value);
                $('#hasil_nik_organisasi').val(this.value);
                $('#hasil_nik_minat').val(this.value);
                $('#hasil_nik_struktur').val(this.value);
            });

            $('#nama_karyawan_struktur').keyup(function() {
                console.log($(this).val());
                $('#nama_lengkap').val(this.value);
            });

            $(FormName).validate({
                errorElement : 'p',
                errorClass : 'help-block text-danger'
            });

            // ajaxform
            $(FormName).ajaxForm({
                dataType : 'json',
                beforeSend : function() {
                    // block UI
                    $(FormName).closest('.portlet').block({
                        message: '<h4>Harap tunggu..</h4>'
                    });
                },
                success : function(response) {
                    $(FormName).closest('.portlet').unblock();
                    toastr.options = {
                        closeButton: true,
                        debug: false,
                        positionClass: 'toast-top-right',
                        onclick: null
                    };
                    toastr[response.status](response.message, response.status);
                    $(FormName).find('button').attr('disabled','true');
                    // $('#nik_baru').attr('readonly', 'readonly');
                    $('#nama_lengkap').attr('readonly', 'readonly');
                    // redirect to list berita jika success
                    if(response.status == 'success' && Redirect == true) {    
                        setTimeout(function() {
                            parentThis.initLoad($(this));
                        }, 1000);
                    }
                }
            });
        },

        // Edit data Periode
        handleSendData_editperiode : function(FormName, Redirect = false) {
            var parentThis = this;
            $('#nik_baru').keyup(function() {
                console.log($(this).val());
                $('#hasil_nik').val(this.value);
                $('#hasil_nik_keluarga').val(this.value);
                $('#hasil_nik_anak').val(this.value);
                $('#hasil_nik_susunan').val(this.value);
                $('#hasil_nik_saudara').val(this.value);
                $('#hasil_nik_darurat').val(this.value);
                $('#hasil_nik_pendidikan').val(this.value);
                $('#hasil_nik_pelatihan').val(this.value);
                $('#hasil_nik_bahasa').val(this.value);
                $('#hasil_nik_keahlian').val(this.value);
                $('#hasil_nik_hobi').val(this.value);
                $('#hasil_nik_pengalaman_kerja').val(this.value);
                $('#hasil_nik_organisasi').val(this.value);
                $('#hasil_nik_minat').val(this.value);
                $('#hasil_nik_struktur').val(this.value);
            });

            $('#nama_karyawan_struktur').keyup(function() {
                console.log($(this).val());
                $('#nama_lengkap').val(this.value);
            });

            $(FormName).validate({
                errorElement : 'p',
                errorClass : 'help-block text-danger'
            });

            // ajaxform
            $(FormName).ajaxForm({
                dataType : 'json',
                beforeSend : function() {
                    // block UI
                    $(FormName).closest('.portlet').block({
                        message: '<h4>Harap tunggu..</h4>'
                    });
                },
                success : function(response) {
                    $(FormName).closest('.portlet').unblock();
                    toastr.options = {
                        closeButton: true,
                        debug: false,
                        positionClass: 'toast-top-right',
                        onclick: null
                    };
                    toastr[response.status](response.message, response.status);
                    $(FormName).find('button').attr('disabled','true');
                    // $('#nik_baru').attr('readonly', 'readonly');
                    $('#nama_lengkap').attr('readonly', 'readonly');
                    // redirect to list berita jika success
                    if(response.status == 'success' && Redirect == true) {    
                        setTimeout(function() {
                            parentThis.initLoadPeriode($(this));
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
            var url = window.APP.siteUrl + 'karyawan/index';
            Layout.loadAjaxContent(url, btn);
        },

        initLoad_simpan : function(btn) {
            var url = window.APP.siteUrl + 'karyawan/tambah';
            Layout.loadAjaxContent(url, btn);
        },

        initLoad_edit : function(btn) {
            var url = window.APP.siteUrl + 'karyawan/edit';
            Layout.loadAjaxContent(url, btn);
        },

        initLoadPeriode : function(btn) {
            var url = window.APP.siteUrl + 'karyawan/edit_detail';
            Layout.loadAjaxContent(url, btn);
        },

        loadPengalamankerja : function() {
            $('.reload-kerja').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url : window.APP.siteUrl + 'karyawan/tabel_pengalaman_kerja',
                    type : 'get',
                    beforeSend : function() {
                        // block UI
                        $("#pengalaman_kerja_all").html("<center>Harap tunggu...</center>");
                    },
                    success : function(response) {
                        $("#pengalaman_kerja_all").html(response);
                    }
                });
            });
        },

        savePengalamankerja: function() {
            var parentThis = this;
            $('.simpan-kerja').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url : window.APP.siteUrl + 'karyawan/doInput_pengalaman_kerja_all',
                    type : 'post',
                    dataType : 'json',
                    data : {
                        nik_baru : 'ada'
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
                        $(FormName).find('button').attr('disabled','true');
                        // $('#nik_baru').attr('readonly', 'readonly');
                        $('#nama_lengkap').attr('readonly', 'readonly');
                        // redirect to list berita jika success
                        if(response.status == 'success' && Redirect == true) {    
                            setTimeout(function() {
                                $(".reload-kerja").click();
                            }, 1000);
                        }
                    }
                });
            });
        }
        
    }

})(jQuery);