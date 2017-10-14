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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
<?php osc_current_web_theme_path('common/head.php') ; ?>
</head>

<body <?php osclasswizards_body_class(); ?>>
<header id="header">
  <div class="top_links">
    <div class="container">
      <div class="language">
        <?php ?>
        <?php if ( osc_count_web_enabled_locales() > 1) { ?>
        <?php osc_goto_first_locale(); ?>
        <strong>
        <?php _e('Language:', OSCLASSWIZARDS_THEME_FOLDER); ?>
        </strong> <span>
        <?php $local = osc_get_current_user_locale(); echo $local['s_name']; ?>
        <i class="fa fa-caret-down"></i></span>
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
      <?php if(osclasswizards_welcome_message()){ ?>
      <p class="welcome-message"><?php echo osclasswizards_welcome_message(); ?></p>
      <?php } ?>
      <ul>
        <?php if( osc_is_static_page() || osc_is_contact_page() ){ ?>
        <li class="search"><a class="ico-search icons" data-bclass-toggle="display-search"></a></li>
        <li class="cat"><a class="ico-menu icons" data-bclass-toggle="display-cat"></a></li>
        <?php } ?>
        <?php if( osc_users_enabled() ) { ?>
        <?php if( osc_is_web_user_logged_in() ) { ?>
        <li class="first logged"> <span><?php echo sprintf(__('Hi %s', OSCLASSWIZARDS_THEME_FOLDER), osc_logged_user_name() . '!'); ?> </span> &#10072; <strong><a href="<?php echo osc_user_dashboard_url(); ?>">
          <?php _e('My account', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a></strong> &#10072; <a href="<?php echo osc_user_logout_url(); ?>">
          <?php _e('Logout', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a> </li>
        <?php } else { ?>
        <li><a id="login_open" href="<?php echo osc_user_login_url(); ?>">
          <?php _e('Login', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
          </a></li>
        <?php if(osc_user_registration_enabled()) { ?>
        <li><a href="<?php echo osc_register_account_url() ; ?>">
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
      <h2 class="pull-right toggle"><i class="fa fa-align-justify"></i></h2>
      <ul class="links">
        <?php
        osc_reset_static_pages();
        while( osc_has_static_pages() ) { ?>
        <li> <a href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a> </li>
        <?php
        }
		osc_reset_static_pages();
        ?>
        <li> <a href="<?php echo osc_contact_url(); ?>">
          <?php _e('Contact', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a> </li>
      </ul>
      <div class="publish">
        <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
        <a class="btn btn-success" href="<?php echo osc_item_post_url_in_category() ; ?>">
        <?php _e('Publish your ad for free', OSCLASSWIZARDS_THEME_FOLDER);?>
        </a>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php 
	if( osc_is_home_page() ) {
		if(osc_get_preference('show_banner', 'osclasswizards_theme')=='1'){
			echo '<div id="header_map">';
			if(homepage_image()) { 
				echo homepage_image(); 
			} else {
			
				echo '<img src="'.osc_current_web_theme_url('images/banner.jpg').'" />';

			} 
			echo '</div>';
		}
?>
  <div class="banner_none" id="form_vh_map">
    <form action="<?php echo osc_base_url(true); ?>" id="main_search" method="get" class="search nocsrf" >
      <div class="container">
        <input type="hidden" name="page" value="search"/>
        <div class="main-search">
          <div class="form-filters">
            <div class="row">
              <?php $showCountry  = (osc_get_preference('show_search_country', 'osclasswizards_theme') == '1') ? true : false; ?>
              <div class="col-md-<?php echo ($showCountry)? '3' : '4'; ?>">
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
              <?php if($showCountry) { ?>
              <div class="col-md-2">
                <div class="cell selector">
                  <?php osclasswizards_countries_select('sCountry', 'sCountry', __('Select a country', OSCLASSWIZARDS_THEME_FOLDER));?>
                </div>
              </div>
              <?php } ?>
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
              <div class="col-md-<?php echo ($showCountry)? '1' : '2'; ?>">
                <div class="cell reset-padding">
                  <button  class="btn btn-success btn_search"><i class="fa fa-search"></i> <span <?php echo ($showCountry)? '' : 'class="showLabel"'; ?>><?php echo osc_esc_html(__("Search", OSCLASSWIZARDS_THEME_FOLDER));?></span> </button>
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
  <?php
        }
    ?>
  <?php osc_show_flash_message(); ?>
</div>
<?php osc_run_hook('before-content'); ?>
<div class="wrapper" id="content">
<div class="container">
<?php if( osc_get_preference('header-728x90', 'osclasswizards_theme') !=""){ ?>
<div class="ads_header ads-headers"> <?php echo osc_get_preference('header-728x90', 'osclasswizards_theme'); ?> </div>
<?php } ?>
<div id="main">
