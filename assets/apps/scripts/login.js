window.LOGIN = (function($) {

	return {
		elLoginForm	: '.login-form',
		elInputIcon : '.form-group',
		urlAdmin : window.APP.siteUrl + 'admin',

		// handle login
        handleLogin : function() {

            var parentThis = this;

            $(parentThis.elLoginForm).validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block text-danger', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                	username : 'username harus diisi',
                	password : 'password harus diisi'
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element.closest(parentThis.elInputIcon));
                }
            });

            $(parentThis.elLoginForm).ajaxForm({
                dataType : 'json',
                beforeSend : function() {
                    App.startPageLoading({animate: true});
                },
                success : function(response) {
                    // notif
                    toastr.options = {
	                    closeButton: true,
	                    debug: false,
	                    positionClass: 'toast-top-right',
	                    onclick: null
	                };
	               	toastr[response.status](response.message, response.status);
                    // $.notify(response.message, response.status);
                    App.stopPageLoading();
                    
                    // redirect to list berita jika success
                    if(response.status == 'success') {    
                        window.location.href = parentThis.urlAdmin;
                    }
                }
            });

        }
	}

})(jQuery);

window.LOGIN.handleLogin();