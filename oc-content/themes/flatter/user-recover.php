<?php
    // meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');

    flatter_add_body_class('recover');
	osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php');
?>
<div class="registerbox">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
        	<div class="login-register">
            <h2><?php _e('Recover your password', 'flatter'); ?></h2>
            <ul id="error_list"></ul>
            <form action="<?php echo osc_base_url(true); ?>" name="recover" method="post" >
                <input type="hidden" name="page" value="login" />
                <input type="hidden" name="action" value="recover_post" />
                <div class="form-group">
                    <input type="text" name="s_email" class="form-control" id="s_email" placeholder="<?php _e('E-mail', 'flatter'); ?>" />
                </div>
                <div class="form-group">
                	<?php echo responsive_recaptcha(); ?>
					<?php osc_show_recaptcha('recover'); ?>
                </div>
                <div class="clearfix">
                    <button type="submit" class="btn btn-clr rbtn"><?php _e("Send me a new password", 'flatter');?></button>
                </div>
            </form>
            </div>
            </div>
		</div>
    </div>
</div>            
<script>
$(document).ready(function(){
	$("form[name=recover]").validate({
		rules: {
			s_email: {
				required: true,
				email: true
			}
		},
		messages: {
                s_email: {
                    required: "Email: this field is required.",
                    email: "Invalid email address."
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
<?php osc_current_web_theme_path('footer.php') ; ?>