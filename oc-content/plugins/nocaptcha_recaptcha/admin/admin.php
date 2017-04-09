<?php 

if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.');
if ( !OC_ADMIN ) exit('User access is not allowed.'); 

  if( "save_options" == Params::getParam('plugin_action') ) {
		
		$flash_error = '';
			
			if ( !Params::getParam('site_key') ) {
				osc_add_flash_error_message( __('Site Key empty.', 'nocaptcha_recaptcha'), 'admin');
            } else {
				osc_set_preference('site_key', Params::getParam('site_key'), 'plugin-anr_nocaptcha');
			}
			if ( !Params::getParam('secret_key') ) {
				osc_add_flash_error_message( __('Secret Key empty.', 'nocaptcha_recaptcha'), 'admin');
            } else {
				osc_set_preference('secret_key', Params::getParam('secret_key'), 'plugin-anr_nocaptcha');
			}
			if ( 'dark' == Params::getParam('theme') ) {
                osc_set_preference('theme', 'dark', 'plugin-anr_nocaptcha');
            } else {
				osc_set_preference('theme', 'light', 'plugin-anr_nocaptcha');
			}
			if ( 'compact' == Params::getParam('size') ) {
                osc_set_preference('size', 'compact', 'plugin-anr_nocaptcha');
            } else {
				osc_set_preference('size', 'normal', 'plugin-anr_nocaptcha');
			}
			if ( !Params::getParam('error_message') ) {
				osc_add_flash_error_message( __('Error message empty.', 'nocaptcha_recaptcha'), 'admin');
            } else {
				osc_set_preference('error_message', Params::getParam('error_message'), 'plugin-anr_nocaptcha');
			}
            
			osc_set_preference('loggedin_hide', Params::getParam('loggedin_hide'), 'plugin-anr_nocaptcha', 'BOOLEAN');
			osc_set_preference('no_js', Params::getParam('no_js'), 'plugin-anr_nocaptcha', 'BOOLEAN');
			osc_set_preference('admin_login', Params::getParam('admin_login'), 'plugin-anr_nocaptcha', 'BOOLEAN');
			osc_set_preference('login', Params::getParam('login'), 'plugin-anr_nocaptcha', 'BOOLEAN');
			osc_set_preference('registration', Params::getParam('registration'), 'plugin-anr_nocaptcha', 'BOOLEAN');
			osc_set_preference('new', Params::getParam('new'), 'plugin-anr_nocaptcha', 'BOOLEAN');
			osc_set_preference('contact', Params::getParam('contact'), 'plugin-anr_nocaptcha', 'BOOLEAN');
			osc_set_preference('contact_listing', Params::getParam('contact_listing'), 'plugin-anr_nocaptcha', 'BOOLEAN');
			osc_set_preference('send_friend', Params::getParam('send_friend'), 'plugin-anr_nocaptcha', 'BOOLEAN');
			osc_set_preference('comment', Params::getParam('comment'), 'plugin-anr_nocaptcha', 'BOOLEAN');

			osc_set_preference('language', Params::getParam('language'), 'plugin-anr_nocaptcha');
			
            osc_add_flash_ok_message(__('Options has been updated', 'nocaptcha_recaptcha'), 'admin');

			osc_reset_preferences();
			ob_end_clean();

			osc_redirect_to(osc_route_admin_url('anr-admin-settings'));

        }
?>
	  <style>
			input[type='text'] {
				width: 100%;
			}
		</style>
<?php
	  $languages = array(
							__( 'Auto Detect', 'nocaptcha_recaptcha' )         	=> '',
							__( 'Arabic', 'nocaptcha_recaptcha' )              	=> 'ar',
							__( 'Bulgarian', 'nocaptcha_recaptcha' )           	=> 'bg',
							__( 'Catalan', 'nocaptcha_recaptcha' )             	=> 'ca',
							__( 'Chinese (Simplified)', 'nocaptcha_recaptcha' )	=> 'zh-CN',
							__( 'Chinese (Traditional)', 'nocaptcha_recaptcha' ) => 'zh-TW',
							__( 'Croatian', 'nocaptcha_recaptcha' )           	=> 'hr',
							__( 'Czech', 'nocaptcha_recaptcha' )             	=> 'cs',
							__( 'Danish', 'nocaptcha_recaptcha' )             	=> 'da',
							__( 'Dutch', 'nocaptcha_recaptcha' )              	=> 'nl',
							__( 'English (UK)', 'nocaptcha_recaptcha' )         => 'en-GB',
							__( 'English (US)', 'nocaptcha_recaptcha' )         => 'en',
							__( 'Filipino', 'nocaptcha_recaptcha' )				=> 'fil',
							__( 'Finnish', 'nocaptcha_recaptcha' ) 				=> 'fi',
							__( 'French', 'nocaptcha_recaptcha' )           	=> 'fr',
							__( 'French (Canadian)', 'nocaptcha_recaptcha' )   	=> 'fr-CA',
							__( 'German', 'nocaptcha_recaptcha' )   			=> 'de',
							__( 'German (Austria)', 'nocaptcha_recaptcha' )		=> 'de-AT',
							__( 'German (Switzerland)', 'nocaptcha_recaptcha' ) => 'de-CH',
							__( 'Greek', 'nocaptcha_recaptcha' )           		=> 'el',
							__( 'Hebrew', 'nocaptcha_recaptcha' )             	=> 'iw',
							__( 'Hindi', 'nocaptcha_recaptcha' )             	=> 'hi',
							__( 'Hungarain', 'nocaptcha_recaptcha' )            => 'hu',
							__( 'Indonesian', 'nocaptcha_recaptcha' )         	=> 'id',
							__( 'Italian', 'nocaptcha_recaptcha' )         		=> 'it',
							__( 'Japanese', 'nocaptcha_recaptcha' )				=> 'ja',
							__( 'Korean', 'nocaptcha_recaptcha' ) 				=> 'ko',
							__( 'Latvian', 'nocaptcha_recaptcha' )           	=> 'lv',
							__( 'Lithuanian', 'nocaptcha_recaptcha' )   		=> 'lt',
							__( 'Norwegian', 'nocaptcha_recaptcha' )   			=> 'no',
							__( 'Persian', 'nocaptcha_recaptcha' )           	=> 'fa',
							__( 'Polish', 'nocaptcha_recaptcha' )   			=> 'pl',
							__( 'Portuguese', 'nocaptcha_recaptcha' )   		=> 'pt',
							__( 'Portuguese (Brazil)', 'nocaptcha_recaptcha' )  => 'pt-BR',
							__( 'Portuguese (Portugal)', 'nocaptcha_recaptcha' )=> 'pt-PT',
							__( 'Romanian', 'nocaptcha_recaptcha' )         	=> 'ro',
							__( 'Russian', 'nocaptcha_recaptcha' )         		=> 'ru',
							__( 'Serbian', 'nocaptcha_recaptcha' )				=> 'sr',
							__( 'Slovak', 'nocaptcha_recaptcha' ) 				=> 'sk',
							__( 'Slovenian', 'nocaptcha_recaptcha' )           	=> 'sl',
							__( 'Spanish', 'nocaptcha_recaptcha' )   			=> 'es',
							__( 'Spanish (Latin America)', 'nocaptcha_recaptcha' )=> 'es-419',
							__( 'Swedish', 'nocaptcha_recaptcha' )           	=> 'sv',
							__( 'Thai', 'nocaptcha_recaptcha' )   				=> 'th',
							__( 'Turkish', 'nocaptcha_recaptcha' )   			=> 'tr',
							__( 'Ukrainian', 'nocaptcha_recaptcha' )   			=> 'uk',
							__( 'Vietnamese', 'nocaptcha_recaptcha' )   		=> 'vi'
							
							);
							
		$locations = array(	 
							__( 'Admin Login (No need to edit any file).', 'nocaptcha_recaptcha' )   	=> 'admin_login',
							__( 'Login Form', 'nocaptcha_recaptcha' )   		=> 'login',
							__( 'Registration Form', 'nocaptcha_recaptcha' )   	=> 'registration',
							__( 'New listing Form', 'nocaptcha_recaptcha' )   	=> 'new',
							__( 'Web contact Form', 'nocaptcha_recaptcha' )  	=> 'contact',
							__( 'Contact listing Form', 'nocaptcha_recaptcha' ) => 'contact_listing',
							__( 'Send to a friend Form', 'nocaptcha_recaptcha' )=> 'send_friend',
							__( 'Comment Form', 'nocaptcha_recaptcha' )			=> 'comment'
									
							);
									
	  ?>

	  	 <h2 class="render-title"><?php _e("noCaptcha reCaptcha Settings", 'nocaptcha_recaptcha'); ?></h2>
          <form method="post" action="<?php echo osc_admin_base_url(true); ?>">
		  <input type="hidden" name="page" value="plugins" />
          <input type="hidden" name="action" value="renderplugin" />
          <?php if(osc_version()<320) { ?>
          <input type="hidden" name="file" value="nocaptcha_recaptcha/admin/admin.php" />
          <?php } else { ?>
          <input type="hidden" name="route" value="anr-admin-settings" />
          <?php }; ?>
          <input type="hidden" name="plugin_action" value="save_options" />
          <table>
          <thead>
          	<tr>
				<th width = "50%"><?php _e("Setting", 'nocaptcha_recaptcha'); ?></th>
				<th width = "50%"><?php _e("Value", 'nocaptcha_recaptcha'); ?></th>
			</tr>
          </thead>
          	<tr>
				<td><?php _e("Site Key", 'nocaptcha_recaptcha'); ?><br/><small><a href="https://www.google.com/recaptcha/admin" target="_blank"><?php _e("Get From Google", 'nocaptcha_recaptcha'); ?></a></small></td>
				<td><input type="text" name="site_key" value="<?php echo osc_esc_html(anr_get_option("site_key")); ?>" /></td>
			</tr>
		  	<tr>
				<td><?php _e("Secret key", 'nocaptcha_recaptcha'); ?><br/><small><a href="https://www.google.com/recaptcha/admin" target="_blank"><?php _e("Get From Google", 'nocaptcha_recaptcha'); ?></a></small></td>
				<td><input type="text" name="secret_key" value="<?php echo osc_esc_html(anr_get_option("secret_key")); ?>" /></td>
			</tr>
		  	<tr>
				<td><?php _e("Language", 'nocaptcha_recaptcha'); ?></td>
				<td><select name="language">
		  
		 			<?php foreach ( $languages as $language => $code ) { ?>
		  
		  				<option <?php if(anr_get_option("language") == $code){echo 'selected="selected"';}?> value="<?php echo $code;?>"><?php echo $language;?></option>
		  			<?php } ?>
		  
		  			</select></td>
			</tr>
		  	<tr>
				<td><?php _e("Theme", 'nocaptcha_recaptcha'); ?></td>
				<td><select name="theme">
		  
		   				<option <?php if(anr_get_option("theme") == "light"){echo 'selected="selected"';}?> value="light"><?php _e("Light",'nocaptcha_recaptcha');?></option>
		   				<option <?php if(anr_get_option("theme") == "dark"){echo 'selected="selected"';}?> value="dark"><?php _e("Dark",'nocaptcha_recaptcha');?></option>
		   
		 			</select></td>
			</tr>
			<tr>
				<td><?php _e("Size", 'nocaptcha_recaptcha'); ?></td>
				<td><select name="size">
		  
		   				<option <?php if(anr_get_option("size") == "normal"){echo 'selected="selected"';}?> value="normal"><?php _e("Normal",'nocaptcha_recaptcha');?></option>
		   				<option <?php if(anr_get_option("size") == "compact"){echo 'selected="selected"';}?> value="compact"><?php _e("Compact",'nocaptcha_recaptcha');?></option>
		   
		 			</select></td>
			</tr>
		  	<tr>
				<td><?php _e("Error Message", 'nocaptcha_recaptcha'); ?></td>
				<td><input type="text" name="error_message" value="<?php echo osc_esc_html(anr_get_option("error_message", "ERROR: Please solve Captcha correctly.")); ?>" /></td>
			</tr>
		  
		  	<tr>
				<td><?php _e("Show Captcha on", 'nocaptcha_recaptcha'); ?></td>
				<td>
		  
		 			<?php foreach ( $locations as $location => $slug ) { ?>
		  
		  				<ul colspan="2"><input type="checkbox" name="<?php echo $slug; ?>" value="1" <?php if(anr_get_option($slug) == "1"){echo 'checked="checked"';}?> /> <?php echo $location; ?></ul>
		  			<?php } ?>
		  
		 		</td>
			</tr>

		  	<tr>
		  		<td colspan="2"><input type="checkbox" name="loggedin_hide" value="1" <?php if(anr_get_option("loggedin_hide") == "1"){echo 'checked="checked"';}?> /> <?php _e("Hide Captcha for logged in users?",'nocaptcha_recaptcha');?></td>
		 	</tr>
		 	<tr>
				<td colspan="2"><input type="checkbox" name="no_js" value="1" <?php if(anr_get_option("no_js") == "1"){echo 'checked="checked"';}?>/> <?php _e("Show captcha if javascript disabled?",'nocaptcha_recaptcha');?><br/><small><?php _e("If JavaScript is a requirement for your site, we advise that you do NOT check this",'nocaptcha_recaptcha');?></small></td></tr>
          	<tr>
		  		<td colspan="2"><span><input class="btn btn-submit" type="submit" name="anr-admin-settings-submit" value="<?php echo osc_esc_html("Save changes",'nocaptcha_recaptcha');?>" /></span></td>
			</tr>
          </table>
		  </form>

<div style="padding: 20px;">
    <h2 class="render-title"><?php _e("How it works", 'nocaptcha_recaptcha'); ?></h2>

    <p><?php _e("You can add noCaptcha reCaptcha at:", 'nocaptcha_recaptcha'); ?></p>

    <ul style="line-height: 30px;">
        <li>- <?php _e("Admin Login (No need to edit any file).", 'nocaptcha_recaptcha'); ?></li>
		<li>- <?php _e("New listing form.", 'nocaptcha_recaptcha'); ?></li>
		<li>- <?php _e("User login form.", 'nocaptcha_recaptcha'); ?></li>
        <li>- <?php _e("User registration form.", 'nocaptcha_recaptcha'); ?></li>
        <li>- <?php _e("Web contact form.", 'nocaptcha_recaptcha'); ?></li>
        <li>- <?php _e("Contact listing form.", 'nocaptcha_recaptcha'); ?></li>
        <li>- <?php _e("'Send to a friend' listing form.", 'nocaptcha_recaptcha'); ?></li>
		<li>- <?php _e("Comment form.", 'nocaptcha_recaptcha'); ?></li>
    </ul>

    <p><?php _e("First, you need to fill and save noCaptcha reCaptcha credentials in this page,
        If you don't have an account, you can create a new one here", 'nocaptcha_recaptcha'); ?> <a target="blank" href="https://www.google.com/recaptcha/admin"><?php _e("https://www.google.com/recaptcha/admin/", 'nocaptcha_recaptcha'); ?></a></p>

    <p><?php _e("Second, you will need to paste the following line of code before the submit form button.", 'nocaptcha_recaptcha'); ?></p>
    <br>
    <code><?php echo osc_esc_html('<?php osc_run_hook("anr_captcha_form_field"); ?>'); ?></code>
    <br>

    <pre>
<?php echo osc_esc_html('<form>

    ...

    	<?php osc_run_hook("anr_captcha_form_field"); ?>
	
    	<button type="submit" value="Save"/>
</form>'); ?>
    </pre>
    <br>
    <br>
    <p style="font-size: 18px;"><b><?php _e('IMPORTANT NOTE:', 'nocaptcha_recaptcha'); ?></b><br><?php _e('Only tick mark in "show captcha on" where you added code in theme file. eg. you added code in login form than tick only "login form". other keep untick.you can add all of them.', 'nocaptcha_recaptcha'); ?><br />
	<?php _e('Use new site key and public key.', 'nocaptcha_recaptcha'); ?><br />
	<?php _e('Remove reCAPTCHA Public key and Private key from Settings > Spam and Bots.', 'nocaptcha_recaptcha'); ?></p>
    <br>
    <br>

    <h2 class="render-title"><?php _e('FAQ', 'nocaptcha_recaptcha'); ?></h2>

    <h3><?php _e('More noCaptcha reCaptcha information, change language, ...', 'nocaptcha_recaptcha'); ?></h3>
    <p><?php _e('See above form', 'nocaptcha_recaptcha'); ?></p>

    <br>
    <hr/>

    <br>
    <h2 class="render-title"><?php _e('Change recaptcha by noCaptcha reCaptcha, Bender theme example', 'nocaptcha_recaptcha'); ?></h2>

    <h3><?php _e("New listing (oc-content/bender/item-post.php) Bender theme", 'nocaptcha_recaptcha'); ?></h3>

    <?php _e("Find and replace this code. if not exist, simply add the replace part inside", 'nocaptcha_recaptcha'); ?> <?php echo osc_esc_html("<form>"); ?>

    <pre>
<?php echo osc_esc_html('
			<?php if( osc_recaptcha_items_enabled() ) { ?>
                              <div class="controls">
                                    <?php osc_show_recaptcha(); ?>
                                </div>
                            <?php }?>'); ?>
    </pre>

    <?php _e("replace by", 'nocaptcha_recaptcha'); ?>

    <pre><?php echo osc_esc_html('<?php osc_run_hook("anr_captcha_form_field"); ?>'); ?></pre>

    <h3><?php _e("User registration (oc-content/bender/user-register.php) Bender theme", 'nocaptcha_recaptcha'); ?></h3>

    <?php _e("Find and replace this code. it not exist, simply add the replace part inside", 'nocaptcha_recaptcha'); ?> <?php echo osc_esc_html("<form>"); ?>

    <pre>
    <?php echo osc_esc_html("<?php osc_show_recaptcha('register'); ?>"); ?>
    </pre>

    <?php _e("replace by", 'nocaptcha_recaptcha'); ?>

    <pre><?php echo osc_esc_html('<?php osc_run_hook("anr_captcha_form_field"); ?>'); ?></pre>

    <h3><?php _e('All theme files', 'nocaptcha_recaptcha'); ?></h3>
    <ul style="line-height: 30px;">
        <li><?php _e("New listing                     (oc-content/bender/item-post.php)        Bender theme", 'nocaptcha_recaptcha'); ?></li>
		<li><?php _e("User login               		  (oc-content/bender/user-login.php)       Bender theme", 'nocaptcha_recaptcha'); ?></li>
        <li><?php _e("User registration               (oc-content/bender/user-register.php)    Bender theme", 'nocaptcha_recaptcha'); ?></li>
        <li><?php _e("Web contact page                (oc-content/bender/contact.php)          Bender theme", 'nocaptcha_recaptcha'); ?></li>
        <li><?php _e("Contact listing page            (oc-content/bender/item-sidebar.php)     Bender theme", 'nocaptcha_recaptcha'); ?></li>
        <li><?php _e("'Send to a friend' listing page (oc-content/bender/item-send-friend.php) Bender theme", 'nocaptcha_recaptcha'); ?></li>
		<li><?php _e("Comment form (oc-content/bender/item.php) 							Bender theme", 'nocaptcha_recaptcha'); ?></li>
    </ul>
</div>