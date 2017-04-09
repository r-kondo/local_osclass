<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
<?php osc_current_web_theme_path('common/head.php') ; ?>
</head><body <?php azzurro_body_class(); ?>>


<div class="container text-center  vista_header">
<?php echo osc_get_preference('header-728x90', 'azzurro'); ?>
</div>


<div id="header">
<div class="clear"></div>
<div class="wrapper headmenu">
<div id="logo">
<?php echo logo_header(); ?></div>
<ul class="nav">
<?php if( osc_is_static_page() || osc_is_contact_page() ){ ?>
<li class="search"><a class="ico-search icons" data-bclass-toggle="display-search"></a></li>
<li class="cat"><a class="ico-menu icons" data-bclass-toggle="display-cat"></a></li>
<?php } ?><?php if( osc_users_enabled() ) { ?>
<?php if( osc_is_web_user_logged_in() ) { ?>
<li class="hiuser"><span><?php echo sprintf(__('Hi %s', 'azzurro'), osc_logged_user_name() . '! '); ?> 
</li><li class="account">
<strong><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'azzurro'); ?></a></strong> 
</li><li class="logout">
<a href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'azzurro'); ?></a>
</li>
<?php } else { ?>
<li class="login"><a id="login_open" href="<?php echo osc_user_login_url(); ?>"><?php _e('Sign In', 'azzurro') ; ?></a></li>
<?php if(osc_user_registration_enabled()) { ?>
<li class="register"><a href="<?php echo osc_register_account_url() ; ?>"><?php _e('Register', 'azzurro'); ?></a></li>
<?php }; ?>
<?php } ?>
<?php } ?>
<?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
<li class="publish"><a href="<?php echo osc_item_post_url_in_category() ; ?>"><?php _e("Publish Free Ad", 'azzurro');?></a></li>
<?php } ?>
</ul>
</div>
<?php if( osc_is_home_page() || osc_is_static_page() || osc_is_contact_page() ) { ?>
<form action="<?php echo osc_base_url(true); ?>" method="get" class="search wrapper" <?php /* onsubmit="javascript:return doSearch();"*/ ?>>
<input type="hidden" name="page" value="search"/>
<div class="main-search">
<div class="cell">
<input type="text" name="sPattern" id="query" class="input-text" value="" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'azzurro_theme'), 'azzurro')); ?>" />
</div>
<?php  if ( osc_count_categories() ) { ?>
<div class="cell selector">
</div>
<div class="cell reset-padding">
<?php  } else { ?>
<div class="cell">
<?php  } ?>
<button class="ui-button ui-button-big js-submit"><?php _e("Search", 'azzurro');?></button>
</div>
</div>
<div id="message-seach"></div>
</form>
<?php } ?>
</div>
<?php osc_show_widgets('header'); ?>
<div class="wrapper wrapper-flash">
<?php
$breadcrumb = osc_breadcrumb('&raquo;', false, get_breadcrumb_lang());
if( $breadcrumb !== '') { ?>
<div class="breadcrumb">
<?php echo $breadcrumb; ?>
<div class="clear"></div>
</div>
<?php }?>
<?php osc_show_flash_message(); ?>
</div>

<?php osc_run_hook('before-content'); ?>
<div class="wrapper" id="content">
<!-- /Carrousel and css home ad -->
<?php if( osc_is_home_page()) { ?> 
<div class="slider">
  <?php if (function_exists('carousel')) {carousel();} ?>
<?php if (function_exists('osc_slider')) {osc_slider();} ?>

</div>
               
<?php }?>
<?php osc_run_hook('before-main'); ?>

<div id="main">
<?php osc_run_hook('inside-main'); ?>

 
