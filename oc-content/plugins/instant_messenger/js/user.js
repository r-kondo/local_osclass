$(document).ready(function(){

  // TOOLTIPS IN USER ACCOUNT
  Tipped.create('.im-has-tooltip', { maxWidth: 200, radius: false });
  Tipped.create('.im-has-tooltip-left', { maxWidth: 200, radius: false } );


  // FORM VALIDATION
  $('form.im-form-validate').validate({
    rules: {
      "im-from-user-name": {
        required: true,
        minlength: 3
      },
      
      "im-from-user-email": {
        required: true,
        email: true
      },
      
      "im-title": {
        required: true,
        minlength: 2
      },
      
      "im-message": {
        required: true,
        minlength: 2
      }
    },
    
    messages: {
      "im-from-user-name": {
        required: "Your Name: This field is required, enter your name please.",
        minlength: "Your Name: Name is too short, enter at least 3 characters."
      },
      
      "im-from-user-email": {
        required: "Your Email: This field is required, enter your email please.",
        email: "Your Email: Address your have entered is not in valid format."
      },
      
      "im-title": {
        required: "Title: Please enter title of this converstation.",
        minlength: "Title: Title is too short, enter at least 2 characters."
      },
      
      "im-message": {
        required: "Message: This field is required, please enter your message.",
        minlength: "Message: Enter at least 2 characters."
      },
    },
    
    wrapper: "li",
    errorLabelContainer: "#im-error-list",
    invalidHandler: function(form, validator) {
      $('html,body').animate({ scrollTop: $('#im-error-list').offset().top - 100 }, { duration: 250, easing: 'swing'});
    },
    submitHandler: function(form){
      $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
      form.submit();
    }
  });

});