<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
<?php osc_current_web_theme_path('common/head.php') ; ?>
</head>

<body <?php osclasswizards_body_class(); ?>>
<span id="back-top"> <a href="#top"><i class="fa fa-chevron-up"></i></a> </span>
<header id="header">
  <div class="top_links">
    <div class="container">
      <div class="language">
        <?php ?>
        <?php if ( osc_count_web_enabled_locales() > 1) { ?>
        <?php osc_goto_first_locale(); ?>
        <i class="fa fa-globe"></i>
        <?php _e('Language: ', OSCLASSWIZARDS_THEME_FOLDER); ?>
        <span> <strong>
        <?php $local = osc_get_current_user_locale(); echo $local['s_name']; ?>
        <i class="fa fa-caret-down"></i> </strong> </span>
        <ul>
          <?php $i = 0;  ?>
          <?php while ( osc_has_web_enabled_locales() ) { ?>
          <li><a <?php if(osc_locale_code() == osc_current_user_locale() ) echo "class=active"; ?> id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><?php echo osc_locale_name(); ?></a></li>
          <?php if( $i == 0 ) { echo ""; } ?>
          <?php $i++; ?>
          <?php } ?>
        </ul>
        <?php } ?>
      </div>
      <p class="welcome-message"><?php echo osc_get_preference('welcome_message', 'osclasswizards_theme'); ?></p>
      <ul>
        <?php if( osc_is_static_page() || osc_is_contact_page() ){ ?>
        <li class="search"><a class="ico-search icons" data-bclass-toggle="display-search"></a></li>
        <li class="cat"><a class="ico-menu icons" data-bclass-toggle="display-cat"></a></li>
        <?php } ?>
        <?php if( osc_users_enabled() ) { ?>
        <?php if( osc_is_web_user_logged_in() ) { ?>
        <li class="first logged"> <span><i class="fa fa-user"></i> <?php echo sprintf(__('Hi %s', OSCLASSWIZARDS_THEME_FOLDER), osc_logged_user_name() . '!'); ?> </span> &#10072; <strong><a href="<?php echo osc_user_dashboard_url(); ?>">
          <?php _e('My account', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a></strong> &#10072; <i class="fa fa-sign-out"></i> <a href="<?php echo osc_user_logout_url(); ?>">
          <?php _e('Logout', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a> </li>
        <?php } else { ?>
        <li><a id="login_open" href="<?php echo osc_user_login_url(); ?>"> <i class="fa fa-lock"></i>
          <?php _e('Login', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
          </a></li>
        <?php if(osc_user_registration_enabled()) { ?>
        <li><a href="<?php echo osc_register_account_url() ; ?>"> <i class="fa fa-user"></i>
          <?php _e('Register for a free account', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a></li>
        <?php }; ?>
        <?php } ?>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="main_header" id="main_header">
    <div class="container">
      <div id="logo"> <?php echo logo_header(); ?> <span id="description"><?php echo osc_page_description(); ?></span> </div>
      <div class="publish">
        <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
        <a class="btn btn-success" href="<?php echo osc_item_post_url_in_category() ; ?>"> <i class="fa fa-pencil-square-o"></i>
        <?php _e('Publish your ad for free', OSCLASSWIZARDS_THEME_FOLDER);?>
        </a>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php 
	if( osc_is_home_page() ) {
	?>
  <div id="header_map">
    <?php
			if(homepage_image()) { 
				echo homepage_image(); 
			} else {
			
				echo '<img src="'.osc_current_web_theme_url('images/banner.jpg').'" />';

			} 
         ?>
    <form action="<?php echo osc_base_url(true); ?>" id="main_search" method="get" class="search nocsrf" >
      <div class="container">
        <input type="hidden" name="page" value="search"/>
        <div class="main-search">
          <h2><?php echo  osc_get_preference('banner-title', 'osclasswizards_theme') ; ?></h2>
          <div class="form-filters">
            <div class="row">
              <div class="col-md-4">
                <div class="cell">
                  <input type="text" name="sPattern" id="query" class="input-text" value="" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'osclasswizards_theme'), OSCLASSWIZARDS_THEME_FOLDER)); ?>" />
                </div>
              </div>
              <div class="col-md-2">
                <?php  if ( osc_count_categories() ) { ?>
                <div class="cell selector">
                  <?php osc_categories_select('sCategory', null, osc_esc_html(__('Select a category', OSCLASSWIZARDS_THEME_FOLDER))) ; ?>
                </div>
                <?php  } ?>
              </div>
              <div class="col-md-2">
                <div class="cell selector">
                  <?php osclasswizards_regions_select('sRegion', 'sRegion', __('Select a region', OSCLASSWIZARDS_THEME_FOLDER)) ; ?>
                </div>
              </div>
              <div class="col-md-2">
                <div class="cell selector">
                  <?php osclasswizards_cities_select('sCity', 'sCity', __('Select a city', OSCLASSWIZARDS_THEME_FOLDER)) ; ?>
                </div>
              </div>
              <div class="col-md-2">
                <div class="cell reset-padding">
                  <div class="cell">
                    <button class="btn btn-success btn_search"> <i class="fa fa-search"></i> <span class="showLabel">
                    <?php _e("Search", OSCLASSWIZARDS_THEME_FOLDER);?>
                    </span> </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="message-seach"></div>
        </div>
      </div>
    </form>
  </div>
  <?php
		
	} 
?>
  <?php osc_show_widgets('header'); ?>
</header>
<div class="wrapper-flash">
  <?php
        $breadcrumb = osc_breadcrumb('&raquo;', false, get_breadcrumb_lang());
        if( $breadcrumb !== '') { ?>
  <div class="breadcrumb">
    <div class="container"> <?php echo $breadcrumb; ?> </div>
  </div>
  <div class="container">
    <div class="error_list">
      <?php
        }
    ?>
      <?php osc_show_flash_message(); ?>
    </div>
  </div>
</div>
<?php osc_run_hook('before-content'); ?>
<div class="wrapper" id="content">
<div class="container">
<?php if( osc_get_preference('header-728x90', 'osclasswizards_theme') !=""){ ?>
<div class="ads_header ads-headers"> <?php echo osc_get_preference('header-728x90', 'osclasswizards_theme'); ?> </div>
<?php } ?>
<div id="main">
