</div><!-- content -->
<?php osc_run_hook('after-main'); ?>
</div>
<div id="responsive-trigger"></div>
<!-- footer -->
<div class="clear"></div>
<?php osc_show_widgets('footer');?>
<div id="footer">
 <div class="wrapper">
  <ul class="resp-toogle">
<?php if( osc_users_enabled() ) { ?>
<?php if( osc_is_web_user_logged_in() ) { ?>
 <li>
  <?php echo sprintf(__('Hi %s', 'azzurro'), osc_logged_user_name() . '!'); ?>  &middot;
  <strong><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'azzurro'); ?></a></strong> &middot;
  <a href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'azzurro'); ?></a>
 </li>
<?php } else { ?>
 <li><a href="<?php echo osc_user_login_url(); ?>"><?php _e('Accedi', 'azzurro'); ?></a></li>
 <?php if(osc_user_registration_enabled()) { ?>
  <li><a href="<?php echo osc_register_account_url(); ?>"><?php _e('Registrati gratis', 'azzurro'); ?></a></li>
<?php } ?><?php } ?><?php } ?>

<?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
<li class="publish">
 <a href="<?php echo osc_item_post_url_in_category(); ?>"><?php _e("Pubblica un'annuncio gratis", 'azzurro');?></a>
</li>
<?php } ?>
</ul>  
<ul>
  <?php
  osc_reset_static_pages();
  while( osc_has_static_pages() ) { ?>
<li>
 <a href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a>
</li>
  <?php }?>
<li>
 <a href="<?php echo osc_contact_url(); ?>"><?php _e('Contact', 'azzurro'); ?></a>
</li>
  </ul>
<?php if( (!defined('MULTISITE') || MULTISITE==0) && osc_get_preference('footer_link', 'azzurro_themes') !== '0') {
echo'<div>'  . osc_page_title() . ' ';
echo ' '  .  _e('uses', 'azzurro')  . ' <a href="http://antarcticathemes.com/osclass/" target="_blank"><strong>Azzurro Theme</strong> by AntarcticA Themes</a> </div>';
}?>
  
<?php if ( osc_count_web_enabled_locales() > 1) { ?>
<?php osc_goto_first_locale(); ?>
<strong><?php _e('Language:', 'azzurro'); ?></strong>
<?php $i = 0;  ?>
<?php while ( osc_has_web_enabled_locales() ) { ?>
<span><a id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><?php echo osc_locale_name(); ?></a></span><?php if( $i == 0 ) { echo " &middot; "; } ?>
 <?php $i++; ?>
<?php } ?>
<?php } ?>
 </div>
</div>
<?php osc_run_hook('footer'); ?>
</body></html>
