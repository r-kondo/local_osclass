<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
<meta charset="utf-8">
<title><?php echo meta_title(); ?></title>
<?php if( meta_description() != '' ) { ?>
<meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>
<?php if( meta_keywords() != '' ) { ?>
<meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
<?php } ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if(osc_is_ad_page()) { ?>
<!-- Open Graph Tags -->
<meta property="og:title" content="<?php echo osc_item_title(); ?>" />
<meta property="og:image" content="<?php if( osc_count_item_resources() ) { ?><?php echo osc_resource_url(); ?><?php } ?>" />
<meta property="og:description" content="<?php echo osc_highlight( strip_tags( osc_item_description() ), 120 ) ; ?>" />
<!-- /Open Graph Tags -->
<?php } ?>
<?php if( osc_get_preference('g_webmaster', 'flatter_theme') != null) { ?>
<meta name="google-site-verification" content="<?php echo osc_get_preference("g_webmaster", "flatter_theme"); ?>" />
<?php } ?>
<?php if( osc_get_canonical() != '' ) { ?><link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/><?php } ?>
<link rel="shortcut icon" href="<?php echo osc_current_web_theme_url('favicon.ico'); ?>">
<link href="<?php echo osc_current_web_theme_url('css/bootstrap.min.css'); ?>?ver=3.3.5" rel="stylesheet" type="text/css" />
<link href="<?php echo osc_current_web_theme_url('css/style.css'); ?>?ver=<?php echo $info['version']; ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo osc_current_web_theme_url('css/mobilenav.css'); ?>" />
<?php $getColorScheme = flatter_def_color(); ?>
<?php osc_enqueue_style(''.$getColorScheme.'green', osc_current_web_theme_url('css/'.$getColorScheme.'.css')); ?>
<?php if(osc_get_preference('anim', 'flatter_theme') !='0') { ?>
<link href="<?php echo osc_current_web_theme_url('css/animate.min.css'); ?>" rel="stylesheet" type="text/css" />
<?php } ?>
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('css/owl.carousel.css'); ?>" type="text/css" media="screen" />
<link href="<?php echo osc_current_web_theme_url('css/responsivefix.css'); ?>" rel="stylesheet" type="text/css" />

<!-- Header Hook -->
<?php osc_run_hook('header'); ?>
<!-- /Header Hook -->

<?php if(osc_get_preference('custom_css', 'flatter_theme', "UTF-8") !='') { ?>
<style type="text/css">
	<?php echo osc_get_preference('custom_css', 'flatter_theme', "UTF-8"); ?>
</style>
<?php } ?>
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="<?php flatter_body_class(); ?>">
	<a href="#" class="scrollToTop"><span class="fa fa-chevron-up fa-2x"></span></a>
	<nav class="dd-spmenu dd-spmenu-vertical dd-spmenu-left bg" id="dd-spmenu-s1">
    	<ul>
        	<li><a class="whover" href="<?php echo osc_base_url(); ?>"><?php _e('Home', 'flatter'); ?></a></li>
			<?php while( osc_has_static_pages() ) { ?>
            <li><a class="whover" href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a></li>
            <?php } osc_reset_static_pages();  ?>
            <li><a class="whover" href="<?php echo osc_contact_url(); ?>"><?php _e('Contact us', 'flatter'); ?></a></li>
            <?php if ( osc_count_web_enabled_locales() > 1) { ?>
			<?php osc_goto_first_locale(); ?>
            <li class="navbar-right dropdown"><a class="whover"><strong>Change language <i class="fa fa-angle-down fa-lg"></i></strong></a>
            <?php $i = 0;  ?>
                <?php while ( osc_has_web_enabled_locales() ) { 
                if (osc_locale_code()!=osc_current_user_locale()) { ?>
                <li><a class="whover" id="<?php echo osc_locale_code(); ?>" rel="nofollow" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><i class="fa fa-angle-right"></i> <?php echo osc_locale_name(); ?></a></li><?php if( $i == 0 ) { echo ""; } ?>
                    <?php $i++; ?>
                <?php } } ?>
            </li>
            <?php } ?>
        </ul>
    </nav>
    <nav class="dd-spmenu dd-spmenu-vertical dd-spmenu-right bg" id="dd-spmenu-s2">
    	<h4><?php _e('Welcome', 'flatter'); ?>, <span><?php if( osc_is_web_user_logged_in() ) { ?><?php echo osc_logged_user_name(); ?><?php } else { ?><?php _e('Guest', 'flatter'); ?><?php } ?></span></h4>
    	<ul>
        	<?php if( osc_is_web_user_logged_in() ) { ?>
            <li><a class="whover" href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'flatter'); ?></a></li>
            <li><a class="whover" href="<?php echo osc_user_list_items_url(); ?>"><?php _e('My listings', 'flatter'); ?></a></li>
            <li><a class="whover" href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'flatter'); ?></a></li>
            <?php } else { ?>
            <li><a class="whover" href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'flatter') ; ?></a></li>
			<?php if(osc_user_registration_enabled()) { ?>
            <li><a class="whover" href="<?php echo osc_register_account_url() ; ?>"><?php _e('Register', 'flatter'); ?></a></li>
            <?php }; ?>
            <?php } ?>
        </ul>
	</nav>
    
    <div class="container"> 
    <div id="smart-navigation" class="visible-xs row">
    	<div class="col-xs-3">
        	<a href="#" class="toggle-menu menu-left push-body smenu clr"><i class="fa fa-bars"></i></a>
        </div>
        <div class="col-xs-6">
        	<div class="brand clr"><a href="<?php echo osc_base_url(); ?>"><?php echo logo_header(); ?></a></div>
        </div>
        <div class="col-xs-3">
        	<a href="#" class="toggle-menu menu-right push-body smenu clr pull-right">
			<?php if( osc_is_web_user_logged_in() ) { ?>
				<?php dd_userpic();?>
			<?php } else { ?>
            	<i class="fa fa-user"></i>
			<?php } ?>
            </a>
        </div>
    </div>
    </div>
    
    <div class="navbar navbar-default navbar-static-top hidden-xs" role="navigation">
      <div class="container"> 
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"><?php _e("Toggle navigation", 'flatter');?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand clr" href="<?php echo osc_base_url(); ?>"><?php echo logo_header(); ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          	<li class="dropdown catmenu hidden-xs"><a href="<?php echo osc_search_url(); ?>" class="dropdown-toggle" data-toggle="dropdown"><?php _e("Categories", 'flatter');?> <span class="caret"></span></a>
              <ul class="dropdown-menu multi-level" role="menu">
                <?php if ( osc_count_categories() >= 0 ) { ?>
				<?php while ( osc_has_categories() ) { ?>
                	<li class="<?php echo osc_category_slug() ; ?> dropdown-submenu"><a class="category" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?> <span>(<?php echo osc_category_total_items() ; ?>)</span></a> 
                    	<?php if ( osc_count_subcategories() > 0 ) { if (osc_count_subcategories() > $count_max) { $count_max = osc_count_subcategories();} ?> 
                            <ul class="dropdown-menu">               
                            <?php while ( osc_has_subcategories() ) { ?>
                               <li><a class="cat_<?php echo osc_category_id(); ?>" href="<?php echo osc_search_category_url(); ?>"><?php echo osc_category_name(); ?> <span>(<?php echo osc_category_total_items() ; ?>)</span></a>
                               </li>
                            <?php } ?>
                            </ul>
                     	<?php } ?>
                    </li>
                <?php } ?> 
                <?php } ?>
              </ul>
            </li>
            <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
            <li class="publish hidden-xs"><a class="btn-sclr" href="<?php echo osc_item_post_url() ; ?>"><?php _e("Publish your ad for free", 'flatter');?></a></li>
            <?php } ?>
          </ul>
          
          <ul class="nav navbar-nav pull-right" id="navright">
            <?php if( osc_users_enabled() ) { ?>
			<?php if( osc_is_web_user_logged_in() ) { ?>
                <li class="dropdown profilepic">
                	<a class="dropdown-toggle" data-toggle="dropdown" href="">
                    <?php dd_userpic();?>
                	<?php echo osc_logged_user_name(); ?>&nbsp;&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'flatter'); ?></a></li>
                        <li><a href="<?php echo osc_user_list_items_url(); ?>"><?php _e('My listings', 'flatter'); ?></a></li>
                        <li><a href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'flatter'); ?></a></li>
                    </ul>
                </li>
                <?php if (function_exists("mdh_messenger_widget")) { ?>
                <li><?php mdh_messenger_widget(); ?></li>
                <?php } ?>
            <?php } else { ?>
                <li><a href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'flatter') ; ?></a></li>
                <?php if(osc_user_registration_enabled()) { ?>
                <li><a href="<?php echo osc_register_account_url() ; ?>"><?php _e('Register', 'flatter'); ?></a></li>
                <?php }; ?>
            <?php } ?>
            <?php } ?>
            <?php if ( osc_count_web_enabled_locales() > 1) { ?>
				<?php osc_goto_first_locale(); ?>
                <li class="navbar-right dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-globe"></i>&nbsp;&nbsp;<?php $lcode = osc_get_current_user_locale(); echo $lcode['s_short_name']; ?>&nbsp;&nbsp;<span class="caret"></span></a>
                <?php $i = 0;  ?>
                    <ul class="dropdown-menu" role="menu">
                    <?php while ( osc_has_web_enabled_locales() ) { 
                    if (osc_locale_code()!=osc_current_user_locale()) { ?>
                    <li><a id="<?php echo osc_locale_code(); ?>" rel="nofollow" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><?php echo osc_locale_name(); ?></a></li><?php if( $i == 0 ) { echo ""; } ?>
                        <?php $i++; ?>
                    <?php } } ?>
                    </ul>
                </li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
    	<div class="publish visible-xs"><a class="btn-sclr" href="<?php echo osc_item_post_url() ; ?>"><?php _e("Publish your ad for free", 'flatter');?></a></div>
    <?php } ?>
    <!-- Navbar -->
    
    <?php if (osc_show_flash_message()) { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 notification">
                <?php osc_show_flash_message(); ?>
            </div>
        </div>
    </div>
    <?php } ?>