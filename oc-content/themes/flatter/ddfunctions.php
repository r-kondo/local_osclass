<?php 
/* Location Search*/
function location(){
$conn = getConnection(); $aStates = $conn->osc_dbFetchResults("SELECT * FROM %st_country ", DB_TABLE_PREFIX);
   if (count($aStates) >= 0 ) { ?>
	<select id="countryId" name="sCountry" class="form-control">
		<option value=""><?php _e("Select a country..."); ?></option>
		<?php foreach($aStates as $state) { ?> 
		<option value="<?php echo $state['pk_c_code']; ?>"><?php echo $state['s_name'] ; ?></option>
		<?php } ?>
	</select>
	 <br />
	<?php }
 $aRegions = Region::newInstance()->listAll();
	 if(count($aRegions) >= 0 ) { ?>
  
	<select id="regionId" name="sRegion" class="form-control">
		<option value=""><?php _e("Select a region..."); ?></option>
		<?php foreach($aRegions as $region) { ?>
		<option id="idregioni"  value="<?php echo $region['pk_i_id']; ?>"<?php if(Params::getParam('sRegion') == $region['pk_i_id']) { ?>selected<?php } ?>><?php echo $region['s_name']; ?></option>
		<?php } ?>
	</select>
   
	<?php } ?>
	 <br />
	 
	<?php $aCities = City::newInstance()->getByRegion($cityId);
	if (count($aCities) >= 0 ) {?>
	
	<select name="sCity" id="cityId" class="form-control"> 
		<option value=""><?php _e("Select a city..."); ?></option>
		<?php foreach($aCities as $city) { ?>      
		<option value="<?php echo $city['pk_i_id']; ?>"<?php if(Params::getParam('sCity') == $city['pk_i_id']) { ?>selected<?php } ?>><?php echo $city['s_name'] ; ?></option>
		<?php } ?>
	</select>
 
<?php } ?> 
   
<script>
$(document).ready(function(){
	$("#countryId").off('change').on("change",function(){
		var self = $(this);
		var pk_c_code = self.val();
		var url = '<?php echo osc_base_url(true)."?page=ajax&action=regions&countryId="; ?>' + pk_c_code;
		var result = '';

		if(pk_c_code != '') {

			setProcessingSelectText(self);
			setProcessingSelectText($("#regionId"));
			self.attr('disabled',true);

			$("#regionId").prop('disabled',true);
			$("#cityId").prop('disabled',true);

			$.ajax({
				type: "POST",
				url: url,
				dataType: 'json',
				success: function(data){
					var length = data.length;

					if(length > 0) {

						result += '<option value=""><?php echo osc_esc_js(__("Select a region...")); ?></option>';
						for(key in data) {
							result += '<option value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
						}

						$("input#regionId").remove();
						$("#region").before('<select class="form-control" name="regionId" id="regionId" ></select>');
						$("#region").remove();

						$("input#cityId").remove();
						$("#city").before('<select class="form-control" name="cityId" id="cityId" ></select>');
						$("#city").remove();

						$("#regionId").val("");

						setRegionEvent();
					} else {

						$("#regionId").before('<input class="form-control" type="text" name="region" id="region" />');
						$("#regionId").after('<input class="form-control" id="regionId" type="hidden" name="regionId" value="">');
						$("#regionId").remove();

						$("#cityId").before('<input class="form-control" type="text" name="city" id="city" />');
						$("#cityId").after('<input class="form-control" id="cityId" type="hidden" name="cityId" value="">');
						$("#cityId").remove();

					}

					self.attr('disabled',false);
					$("#regionId").prop('disabled',false);
					$("#cityId").prop('disabled',false);
					$("#regionId").html(result);
					$("#cityId").html('<option selected value=""><?php _e("Select a city..."); ?></option>');

					setNormalSelectText(self);
					setNormalSelectText($("#regionId"));
				}
			});

		} else {

			// add empty select
			$("#region").before('<select class="form-control" name="regionId" id="regionId" ><option value=""><?php echo osc_esc_js(__("Select 1a region...")); ?></option></select>');
			$("#region").remove();

			$("#city").before('<select class="form-control" name="cityId" id="cityId" ><option value=""><?php echo osc_esc_js(__("Select a city...")); ?></option></select>');
			$("#city").remove();

			if( $("#regionId").length > 0 ){
				$("#regionId").html('<option value=""><?php echo osc_esc_js(__("Select a region...")); ?></option>');
			} else {
				$("#region").before('<select class="form-control" name="regionId" id="regionId" ><option value=""><?php echo osc_esc_js(__("Select a region...")); ?></option></select>');
				$("#region").remove();
			}
			if( $("#cityId").length > 0 ){
				$("#cityId").html('<option value=""><?php echo osc_esc_js(__("Select a city...")); ?></option>');
			} else {
				$("#city").before('<select name="cityId" class="form-control" id="cityId" ><option value=""><?php echo osc_esc_js(__("Select a city...")); ?></option></select>');
				$("#city").remove();
			}

			$("#regionId").attr('disabled',true);
			$("#cityId").attr('disabled',true);
		}

	});

	if( $("#regionId").prop('value') == "") {
		$("#cityId").prop('disabled',true);
	} else {
		setRegionEvent();
	}

	if($("#countryId").length != 0) {
		if( $("#countryId").prop('type').match(/select-one/) ) {
			if( $("#countryId").prop('value') == "") {
				$("#regionId").prop('disabled',true);
			}
		}
	}


});

function setRegionEvent(){
	$("#regionId").off('change').on("change",function(){
		var self = $(this);
		var pk_c_code = self.val();

		<?php if(OC_ADMIN) { ?>
		var url = '<?php echo osc_admin_base_url(true)."?page=ajax&action=cities&regionId="; ?>' + pk_c_code;
		<?php } else { ?>
		var url = '<?php echo osc_base_url(true)."?page=ajax&action=cities&regionId="; ?>' + pk_c_code;
		<?php }; ?>

		var result = '';

		if(pk_c_code != '') {

			setProcessingSelectText(self);
			setProcessingSelectText($("#cityId"));
			self.attr('disabled',true);
			$("#cityId").attr('disabled',true);

			$.ajax({
				type: "POST",
				url: url,
				dataType: 'json',
				success: function(data){
					var length = data.length;
					if(length > 0) {
						result += '<option selected value=""><?php echo osc_esc_js(__("Select a city...")); ?></option>';
						for(key in data) {
							result += '<option value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
						}

						$("#city").before('<select class="form-control" name="cityId" id="cityId" ></select>');
						$("#city").remove();
					} else {
						result += '<option value=""><?php echo osc_esc_js(__('No results')); ?></option>';
						$("#cityId").before('<input type="text" class="form-control" name="city" id="city" />');
						$("#cityId").remove();
					}
					$("#cityId").html(result);

					setNormalSelectText(self);
					setNormalSelectText($("#cityId"));
					$("#cityId").attr('disabled',false);
					self.attr('disabled',false);
				}
			});
		} else {
			$("#cityId").prop('disabled',true);
		}
	});
}

function setProcessingSelectText($elem){
	var current_text = $elem.find('option').eq(0).text();
	$elem.data('text-select',current_text).find('option').eq(0).text('<?php _e('Loading...', 'flatter'); ?>');
}

function setNormalSelectText($elem){
	$elem.find('option').eq(0).text($elem.data('text-select'));
}
</script>
<?php }
function RegisterValidation() { ?>
<script type="text/javascript">
    $(document).ready(function(){
        // Code for form validation
        $("form[name=register]").validate({
            rules: {
                s_name: {
                    required: true
                },
                s_email: {
                    required: true,
                    email: true
                },
                s_password: {
                    required: true,
                    minlength: 5
                },
                s_password2: {
                    required: true,
                    minlength: 5,
                    equalTo: "#s_password"
                }
            },
            messages: {
                s_name: {
                    required: "<?php _e("Name: this field is required"); ?>."
                },
                s_email: {
                    required: "<?php _e("Email: this field is required"); ?>.",
                    email: "<?php _e("Invalid email address"); ?>."
                },
                s_password: {
                    required: "<?php _e("Password: this field is required"); ?>.",
                    minlength: "<?php _e("Password: enter at least 5 characters"); ?>."
                },
                s_password2: {
                    required: "<?php _e("Second password: this field is required"); ?>.",
                    minlength: "<?php _e("Second password: enter at least 5 characters"); ?>.",
                    equalTo: "<?php _e("Passwords don't match"); ?>."
                }
            },
            //errorLabelContainer: "#error_list",
            //wrapper: "li",
            invalidHandler: function(form, validator) {
                $('html,body').animate({ scrollTop: $('h2').offset().top }, { duration: 250, easing: 'swing'});
            },
            submitHandler: function(form){
                $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                form.submit();
            }
        });
    });
</script>
<?php } 
function LoginValidation() { ?>
<script type="text/javascript">
    $(document).ready(function(){
        // Code for form validation
        $("form[name=login]").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "<?php _e("Email: this field is required"); ?>.",
                    email: "<?php _e("Invalid email address"); ?>."
                },
                password: {
                    required: "<?php _e("Password: this field is required"); ?>."
                }
            },
            //errorLabelContainer: "#error_list",
            //wrapper: "li",
            invalidHandler: function(form, validator) {
                $('html,body').animate({ scrollTop: $('h2').offset().top }, { duration: 250, easing: 'swing'});
            },
            submitHandler: function(form){
                $('button[type=submit], input[type=submit]').prop('disabled', 'disabled');
                form.submit();
            }
        });
    });
</script>
<?php } 
function CommentValidation() { ?>
<script type="text/javascript">
    $(document).ready(function(){
        // Code for form validation
        $("form[name=comment_form]").validate({
            rules: {
				authorName: {
                    required: true
                },
                authorEmail: {
                    required: true,
                    email: true
                },
                body: {
                    required: true
                }
            },
            messages: {
				authorName: {
                    required: "<?php _e("Name: this field is required"); ?>."
                },
                authorEmail: {
                    required: "<?php _e("Email: this field is required"); ?>.",
                    email: "<?php _e("Invalid email address"); ?>."
                },
                body: {
                    required: "<?php _e("Comment: this field is required"); ?>."
                }
            },
            //errorLabelContainer: "#error_list",
            //wrapper: "li",
            invalidHandler: function(form, validator) {
                $('html,body').animate({ scrollTop: $('.post-comments').offset().top }, { duration: 250, easing: 'swing'});
            },
            submitHandler: function(form){
                $('button[type=submit], input[type=submit]').prop('disabled', 'disabled');
                form.submit();
            }
        });
    });
</script>
<?php }
function SellerValidation() { ?>
<script type="text/javascript">
    $(document).ready(function(){
        // Code for form validation
        $("form[name=contact_form]").validate({
            rules: {
				yourName: {
                    required: true
                },
                message: {
                    required: true,
                    minlength: 10
                },
                yourEmail: {
                    required: true,
                    email: true
                }
            },
            messages: {
                yourName: {
                    required: "Name: this field is required."
                },
				yourEmail: {
                    required: "Email: this field is required.",
                    email: "Invalid email address."
                },
                message: {
                    required: "Message: this field is required.",
                    minlength: "Message: length is too short"
                }
            },
            
            invalidHandler: function(form, validator) {
                $('html,body').animate({ scrollTop: $('#sidebar').offset().top }, { duration: 250, easing: 'swing'});
            },
            submitHandler: function(form){
                $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                form.submit();
            }
        });
    });
</script>
<?php }
function ContactValidation() { ?>
<script type="text/javascript">
    $(document).ready(function(){
        // Code for form validation
        $("form[name=contact_form]").validate({
            rules: {
                yourName: {
                    required: true
                },
				message: {
                    required: true,
                    minlength: 10
                },
                yourEmail: {
                    required: true,
                    email: true
                }
            },
            messages: {
				yourName: {
                    required: "Name: this field is required."
                },
                yourEmail: {
                    required: "Email: this field is required.",
                    email: "Invalid email address."
                },
                message: {
                    required: "Message: this field is required.",
                    minlength: "Message: length is too short"
                }
            },
            //errorLabelContainer: "#error_list",
            //wrapper: "li",
            invalidHandler: function(form, validator) {
                $('html,body').animate({ scrollTop: $('h2').offset().top }, { duration: 250, easing: 'swing'});
            },
            submitHandler: function(form){
                $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                form.submit();
            }
        });
    });
</script>
<?php }
function dd_printpdf() {
	if (function_exists("show_printpdf")) {
		show_printpdf();
	}
}
function dd_qrcode() {
	if (function_exists("show_qrcode")) {
		show_qrcode();
	}
}
function dd_embedyoutube() {
	if (function_exists("youtube_item_detail")) {
		youtube_item_detail();
	} 
} 
function dd_picupload() {
 	if (function_exists("profile_picture_upload")) {
  		profile_picture_upload();
    } else { ?>
     <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_user_email() ) ) ); ?>?s=120&d=<?php echo osc_current_web_theme_url('images/user-default.jpg') ; ?>" class="img-responsive" />
<?php } } 
function dd_userpic() {
	if (function_exists("profile_picture_show")) {
  		current_user_picture();
     } else {?>
     <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_logged_user_email() ) ) ); ?>?s=20&d=<?php echo osc_current_web_theme_url('images/user-default.jpg'); ?>" />
<?php } }

function dd_commentpic() {
	if (function_exists("profile_picture_show")) {
 		comment_picture_show();
	} else { ?>
    <a href="<?php echo osc_user_public_profile_url(osc_comment_user_id()); ?>"><img class="img-responsive" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_comment_author_email() ) ) ); ?>?s=60&d=<?php echo osc_current_web_theme_url('images/user-default.jpg'); ?>" /></a>
<?php } } 
function dd_profilepic() {
	if (function_exists("profile_picture_show")) {
  		profile_picture_show();
 	} else { ?>
    <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_item_contact_email() ) ) ); ?>?s=80&d=<?php echo osc_current_web_theme_url('images/user-default.jpg') ; ?>" />
<?php } } 
function responsive_recaptcha() { ?>
<script type="text/javascript">
 var RecaptchaOptions = {
	theme : 'custom',
	custom_theme_widget: 'responsive_recaptcha'
 };
</script>

<div id="responsive_recaptcha" style="display:none">
	<div id="recaptcha_image"></div>
	<div class="recaptcha_only_if_incorrect_sol" style="color:red"><?php _e("Incorrect, please try again", 'flatter'); ?></div>
	<label class="solution">
		<!--<span class="recaptcha_only_if_image">Type the two words:</span>
		<span class="recaptcha_only_if_audio">Enter the numbers you hear:</span>-->
		<input type="text" id="recaptcha_response_field" class="form-control" placeholder="<?php _e("Enter the words above", 'flatter'); ?>" name="recaptcha_response_field" />
	</label>
	<div class="options">
		<a href="javascript:Recaptcha.reload()" id="icon-reload"><i class="fa fa-refresh"></i>&nbsp;&nbsp;<?php _e("Reload", 'flatter'); ?></a>
		<a class="recaptcha_only_if_image" href="javascript:Recaptcha.switch_type('audio')" id="icon-audio"><i class="fa fa-volume-up"></i>&nbsp;&nbsp;<?php _e("Audio", 'flatter'); ?></a>
		<a class="recaptcha_only_if_audio" href="javascript:Recaptcha.switch_type('image')" id="icon-image"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;<?php _e("Image", 'flatter'); ?></a>
		<a href="javascript:Recaptcha.showhelp()" id="icon-help"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;<?php _e("Help", 'flatter'); ?></a>
	</div>
</div>
<?php } ?>