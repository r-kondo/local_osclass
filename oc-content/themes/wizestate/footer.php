</div>
</div>
<?php osc_run_hook('after-main'); ?>
</div>
<?php osc_show_widgets('footer');?>

<footer id="footer">
  <div class="container">
    <div class="footer">
      <ul>
        <?php if( osc_users_enabled() ) { ?>
        <?php if( osc_is_web_user_logged_in() ) { ?>
        <li> <?php echo sprintf(__('Hi %s', OSCLASSWIZARDS_THEME_FOLDER), osc_logged_user_name() . '!'); ?> &#10072; <strong><a href="<?php echo osc_user_dashboard_url(); ?>">
          <?php _e('My account', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a></strong> <a href="<?php echo osc_user_logout_url(); ?>">
          <?php _e('Logout', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a> </li>
        <?php } else { ?>
        <li> <a href="<?php echo osc_user_login_url(); ?>">
          <?php _e('Login', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a></li>
        <?php if(osc_user_registration_enabled()) { ?>
        <li> <a href="<?php echo osc_register_account_url(); ?>">
          <?php _e('Register for a free account', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a> </li>
        <?php } ?>
        <?php } ?>
        <?php } ?>
        <?php
        osc_reset_static_pages();
        while( osc_has_static_pages() ) { ?>
        <li> <a href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a> </li>
        <?php
        }
        ?>
        <li> <a href="<?php echo osc_contact_url(); ?>">
          <?php _e('Contact', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a> </li>
        <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
        <li> <a href="<?php echo osc_item_post_url_in_category(); ?>">
          <?php _e("Publish your ad for free", OSCLASSWIZARDS_THEME_FOLDER);?>
          </a> </li>
        <?php } ?>
      </ul>
     <div class="copyright">
		<?php if(osc_get_preference('footer_message','osclasswizards_theme')){ echo osc_get_preference('footer_message','osclasswizards_theme'); }
		else{
            echo sprintf(__('Free Real Estate Osclass theme by <a target="_blank" title="osclasswizards" href="%s">OsclassWizards</a>',OSCLASSWIZARDS_THEME_FOLDER), 'http://www.osclasswizards.com/');
		}?>
     </div>
    </div>
  </div>
</footer>
<?php osc_run_hook('footer'); ?>
<?php if(osc_is_home_page() || osc_is_ad_page() || osc_is_search_page()){ ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=498033263566934&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php } ?>
</body></html>