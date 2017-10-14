<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2014 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
?>

<div id="sidebar">
  <?php if( osc_get_preference('sidebar-300x250', 'osclasswizards_theme') != '') {?>
  <div class="ads_300"> <?php echo osc_get_preference('sidebar-300x250', 'osclasswizards_theme'); ?> </div>
  <?php } ?>
  <h1 class="title">
    <?php _e("Contact publisher", OSCLASSWIZARDS_THEME_FOLDER); ?>
  </h1>
  <div id="contact" class="widget-box form-container form-vertical">
    <?php if( osc_item_is_expired () ) { ?>
    <p class="alert_user">
      <?php _e("The listing is expired. You can't contact the publisher.", OSCLASSWIZARDS_THEME_FOLDER); ?>
    </p>
    <?php } else if( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
    <p class="alert_user">
      <?php _e("It's your own listing, you can't contact the publisher.", OSCLASSWIZARDS_THEME_FOLDER); ?>
    </p>
    <?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
    <p class="alert_user">
      <?php _e("You must log in or register a new account in order to contact the advertiser", OSCLASSWIZARDS_THEME_FOLDER); ?>
    </p>
    <p class="contact_button"> <strong><a href="<?php echo osc_user_login_url(); ?>">
      <?php _e('Login', OSCLASSWIZARDS_THEME_FOLDER); ?>
      </a></strong> <strong><a href="<?php echo osc_register_account_url(); ?>">
      <?php _e('Register for a free account', OSCLASSWIZARDS_THEME_FOLDER); ?>
      </a></strong> </p>
    <?php } else { ?>
    <?php if( osc_item_user_id() != null ) { ?>
    <div class="user-card">
      <figure><img class="img-responsive" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_user_email() ) ) ); ?>?s=400&d=<?php echo osc_current_web_theme_url('images/default.gif') ; ?>" /></figure>
    </div>
    <h3 class="name">
	  <i class="fa fa-user"></i>
      <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php echo osc_item_contact_name(); ?></a></h3>
    <?php } else { ?>
    <h3 class="name"><i class="fa fa-user"></i><?php printf('%s', osc_item_contact_name()); ?></h3>
    <?php } ?>
    <?php if( osc_item_show_email() ) { ?>
    <p class="email"><?php printf(__('E-mail: %s', OSCLASSWIZARDS_THEME_FOLDER), osc_item_contact_email()); ?></p>
    <?php } ?>
    <?php if ( osc_user_phone() != '' ) { ?>
    <p class="phone"><i class="fa fa-phone"></i><?php printf('%s', osc_user_phone()); ?></p>
    <?php } ?>
    <ul id="error_list">
    </ul>
    <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form" <?php if(osc_item_attachment()) { echo 'enctype="multipart/form-data"'; };?> >
      <?php osc_prepare_user_info(); ?>
      <input type="hidden" name="action" value="contact_post" />
      <input type="hidden" name="page" value="item" />
      <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
      <div class="form-group">
        <label class="control-label" for="yourName">
          <?php _e('Your name', OSCLASSWIZARDS_THEME_FOLDER); ?>
          :</label>
        <div class="controls">
          <?php ContactForm::your_name(); ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label" for="yourEmail">
          <?php _e('Your e-mail address', OSCLASSWIZARDS_THEME_FOLDER); ?>
          :</label>
        <div class="controls">
          <?php ContactForm::your_email(); ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label" for="phoneNumber">
          <?php _e('Phone number', OSCLASSWIZARDS_THEME_FOLDER); ?>
          (
          <?php _e('optional', OSCLASSWIZARDS_THEME_FOLDER); ?>
          ):</label>
        <div class="controls">
          <?php ContactForm::your_phone_number(); ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label" for="message">
          <?php _e('Message', OSCLASSWIZARDS_THEME_FOLDER); ?>
          :</label>
        <div class="controls textarea">
          <?php ContactForm::your_message(); ?>
        </div>
      </div>
      <?php if(osc_item_attachment()) { ?>
      <div class="form-group">
        <label class="control-label" for="attachment">
          <?php _e('Attachment', OSCLASSWIZARDS_THEME_FOLDER); ?>
          :</label>
        <div class="controls">
          <?php ContactForm::your_attachment(); ?>
        </div>
      </div>
      <?php }; ?>
      <div class="form-group">
        <div class="controls">
          <?php osc_run_hook('item_contact_form', osc_item_id()); ?>
          <?php if( osc_recaptcha_public_key() ) { ?>
          <script type="text/javascript">
                            var RecaptchaOptions = {
                                theme : 'custom',
                                custom_theme_widget: 'recaptcha_widget'
                            };
                        </script>
          <style type="text/css"> 
div#recaptcha_widget, div#recaptcha_image > img { width:280px; } 
</style>
          <div id="recaptcha_widget">
            <div id="recaptcha_image"><img /></div>
            <span class="recaptcha_only_if_image">
            <?php _e('Enter the words above',OSCLASSWIZARDS_THEME_FOLDER); ?>
            :</span>
            <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
            <div><a href="javascript:Recaptcha.showhelp()">
              <?php _e('Help', OSCLASSWIZARDS_THEME_FOLDER); ?>
              </a></div>
          </div>
          <?php } ?>
          <?php osc_show_recaptcha(); ?>
          <button type="submit" class="btn btn-success">
          <?php _e("Send", OSCLASSWIZARDS_THEME_FOLDER);?>
          </button>
        </div>
      </div>
    </form>
    <?php ContactForm::js_validation(); ?>
    <?php } ?>
  </div>
  
    <?php 
	if( osc_get_preference('facebook-showitem', 'osclasswizards_theme') == "1"){
		?>
		<div class="block_list facebook">
			<?php osclasswizards_facebook_like_box(); ?>
		</div>
	<?php
	}
  ?>
  
</div>
