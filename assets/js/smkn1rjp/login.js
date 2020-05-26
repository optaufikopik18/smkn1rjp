$.validator.setDefaults({
    errorClass: 'help-block',
    highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('has-error');
    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('has-error');
    }
  });

$(document).ready(function() {
	$("#formlogin").validate({
		rules: {
          username: {
            required: true
          },
          password: {
            required: true
          },
          captcha: {
            required: true
          }
        },
        messages: {
          username: {
            required: 'Isi username terlebih dahulu.'
          },
          password: {
            required: 'Isi password terlebih dahulu.'
          },
          captcha: {
            required: 'Isi captcha terlebih dahulu.'
          }
        },
	});
});