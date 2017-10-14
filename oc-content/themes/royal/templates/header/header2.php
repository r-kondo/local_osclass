<?php
    /*
     *       Royal Multipurpose Osclass Themes
     *       
     *       Copyright (C) 2017 OSCLASS.me
     * 
     *       This is Royal Multipurpose Osclass Themes with Single License
     *  
     *       This program is a commercial software. Copying or distribution without a license is not allowed.
     *         
     *       If you need more licenses for this software. Please read more here <http://www.osclass.me/osclass-me-license/>.
     */
?>
<link rel="stylesheet" href="<?php echo osc_current_web_theme_styles_url('mega.css') ; ?>">
<style>.navbar-right {
  margin-top: 0px;
}
.navbar-nav>li>a {
  height: inherit;
}</style>
<header id='header'>
    <section id="top-menu-block">
        <div class="container">
            <div class="col-md-12">
                <section id="register-login-block-top">
                    <ul class="ajax-register-links inline">
                        <?php if(osc_users_enabled()) { ?>
                        <?php if( osc_is_web_user_logged_in() ) { ?>
                        <li class="first logged">
                            <!-- Split button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo sprintf(__( '%s', 'royal'), osc_logged_user_name() . '!'); ?> <span class="caret"></span> </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo osc_user_list_items_url() ; ?>"><span class="fa fa-th-list" aria-hidden="true"></span> <?php _e("Your listings", 'royal') ; ?></a> </li>
                                    <li><a href="<?php echo osc_user_profile_url() ; ?>"><span class="fa fa-user" aria-hidden="true"></span> <?php _e("My account", 'royal') ; ?></a> </li>
                                    <li><a href="<?php echo osc_user_alerts_url() ; ?>"><span class="fa fa-warning" aria-hidden="true"></span> <?php _e("Your alerts", 'royal') ; ?></a> </li>
                                    <li><a href="<?php echo osc_change_user_email_url() ; ?>"><span class="fa fa-envelope" aria-hidden="true"></span> <?php _e("Modify e-mail", 'royal') ; ?></a> </li>
                                    <li><a href="<?php echo osc_change_user_password_url() ; ?>"><span class="fa fa-cog" aria-hidden="true"></span> <?php _e("Modify password", 'royal') ; ?></a> </li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo osc_user_logout_url() ; ?>"><span class="fa fa-power-off" aria-hidden="true"></span> <?php _e("Logout", 'royal') ; ?></a> </li>
                                </ul>
                            </div>
                            <a href="<?php echo osc_user_logout_url(); ?>">
                                <?php _e("Logout", 'royal'); ?> </a>
                        </li>
                        <?php } else { ?>
                        <li class="first">
                            <a href="<?php echo osc_user_login_url(); ?>" title="Login" class="btn btn-primary">
                                <?php _e("Login", 'royal'); ?> </a>
                        </li>
                        <?php if(osc_user_registration_enabled()) { ?>
                        <li class="last">
                            <a href="<?php echo osc_register_account_url() ; ?>" class="btn btn-success">
                                <?php _e("Register", 'royal') ; ?> </a>
                        </li>
                        <?php }; ?> 
                        <?php } ?>
<li><a type="button" class="btn btn-warning smalll" data-toggle="modal" data-target="#cari2">
                            <?php _e("Search", 'royal') ; ?> <i class="fa fa-search"></i> </a></li>
<li><a type="button" class="btn btn-warning bigg" data-toggle="modal" data-target="#cari2"> <i class="fa fa-search"></i> </a></li>
</ul>
                        <?php } ?>
                        
                        
                        <!-- Modal -->
                        <div class="modal fade" id="cari2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                        <h4 class="modal-title" id="myModalLabel"><?php _e("Search", 'royal') ; ?></h4> </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div style="padding:20px;" class="breadcrumb">
                                                    <form action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf">
                                                        <input type="hidden" name="page" value="search" />
                                                        <input type="hidden" name="sOrder" value="<?php echo osc_esc_html(osc_search_order()); ?>" />
                                                        <input type="hidden" name="iOrderType" value="" />
                                                        <?php foreach(osc_search_user() as $userId) { ?>
                                                        <input type="hidden" name="sUser[]" value="<?php echo osc_esc_html($userId); ?>" />
                                                        <?php } ?>
                                                        <fieldset class="box location">
                                                            <div class="form-group">
                                                                <label for="sCity">
                                                                    <?php _e("Your Search", 'royal'); ?> </label>
                                                                <input type="text" name="sPattern" class="form-control" id="query" value="<?php echo osc_esc_html( osc_search_pattern() ); ?>" /> </div>
                                                            <div class="form-group">
                                                                <label for="sCity">
                                                                    <?php _e("Categories", 'royal'); ?> </label>
                                                                <?php chosen_select_standard() ; ?> </div>
                                                            <div class="form-group">
                                                                <label for="sRegion">
                                                                    <?php _e("Location", 'royal'); ?> </label>
                                                                <input type="text" id="sRegion" name="sRegion" class="form-control" value="<?php echo osc_esc_html( osc_search_region() ); ?>" /> </div>
                                                        </fieldset>
                                                        <div class="form-group smalll">
                                                            <?php if( osc_images_enabled_at_items() ) { ?>
                                                            <label for="bPic">
                                                                <?php _e("Show only", 'royal'); ?> </label>
                                                            <br>
                                                            <div class="checkboxes">
                                                                <ul>
                                                                    <li>
                                                                        <input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked="checked"' : ''); ?> />
                                                                        <p id="withPicture" for="withPicture">
                                                                            <?php _e("Show only listings with pictures", 'royal'); ?> </p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <?php } ?> </div>
                                                        <div class="form-group price-slice smalll">
                                                            <?php if( osc_price_enabled_at_items() ) { ?>
                                                            <label for="sCity">
                                                                <?php _e("Price", 'royal'); ?> </label>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <?php _e("Min", 'royal'); ?>
                                                                        <input type="text" class="form-control" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="6" maxlength="6" /> </div>
                                                                    <div class="col-md-6">
                                                                        <?php _e("Max", 'royal'); ?>
                                                                        <input type="text" class="form-control" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="6" maxlength="6" /> </div>
                                                                </div>
                                                                <?php } ?> </div>
                                                        </div>
                                                        <?php if(osc_search_category_id()) { osc_run_hook( 'search_form', osc_search_category_id()); } else { osc_run_hook( 'search_form'); } ?>
                                                        <button style="width:100%;" class="btn btn-success" type="submit">
                                                            <?php _e("Apply", 'royal'); ?> </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          </div>
                    </div>
                </section>
                <div class="top-social-icons"> <a href="<?php echo osc_item_post_url_in_category() ; ?>" class="btn btn-primary" title="<?php _e(" Publish your ad for free ", 'royal'); ?>"><i class="fa fa-plus"></i> <?php _e("Publish your ad for free", 'royal'); ?></a> </div>
                </div>
            </div>
    </section>
    <div class="menu-royal2">
        <div class='container'>
            <nav class='navbar navbar-default' id='nav' role='navigation'>
                <div class='navbar-header'>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only"><?php _e("Toggle navigation", 'royal'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <div class="logo">
                        <a class="navbar-brand" href="<?php echo osc_base_url(); ?>" alt="<?php echo osc_page_title() ; ?>" title="<?php echo osc_page_title() ; ?>">
                            <?php echo logo_header(); ?> </a>
                    </div>
                </div>
                <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                    <ul class='nav navbar-nav navbar-right'>
                        <li>
                            <a href='<?php echo osc_base_url(); ?>'> <span>
                       <?php _e("Home", 'royal') ; ?>
                     
                    </span> </a>
                        </li>
                        <li class='dropdown'>
                            <a class='dropdown-toggle' data-delay='50' data-hover='dropdown' data-toggle='dropdown' href='#'> <span>
                      <?php _e("Pages", 'royal') ; ?>
                      <i class='fa fa-angle-down'></i>
                    </span> </a>
                            <ul class='dropdown-menu' role='menu'>
                                <?php osc_reset_static_pages(); ?>
                                <?php while( osc_has_static_pages() ) { ?>
                                <li>
                                    <a href="<?php echo osc_static_page_url(); ?>">
                                        <?php echo osc_static_page_title(); ?> </a>
                                </li>
                                <?php } ?> </ul>
                        </li>
                        <li class='dropdown mega-dropdown'>
                            <a class='dropdown-toggle' data-delay='50' data-hover='dropdown' data-toggle='dropdown' href='#'> <span>
                      <?php _e("Categories", 'royal') ; ?>
                      <i class='fa fa-angle-down'></i>
                    </span> </a>
                            <?php osc_goto_first_category() ; ?>
                            <?php if(osc_count_categories ()> 0) { ?>
                            <ul class="dropdown-menu mega-dropdown-menu masonry">
                                <?php while ( osc_has_categories() ) { ?>
                                <li class="item">
                                    <ul>
                                        <li class="dropdown-header">
                                            <?php View::newInstance()->_erase('subcategories'); echo osc_category_name() ; ?></li>
                                        <?php if ( osc_count_subcategories()> 0 ) { $m=1; ?>
                                        <?php while ( osc_has_subcategories() ) { if( $m<=6){?>
                                        <?php if( osc_category_total_items()> 0 ) { ?>
                                        <li>
                                            <a class="category sub-category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>">
                                                <?php echo osc_category_name() ; ?> (
                                                <?php echo osc_category_total_items() ; ?>) </a>
                                        </li>
                                        <?php } else { ?>
                                        <li>
                                            <a class="category sub-category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>">
                                                <?php echo osc_category_name() ; ?> (
                                                <?php echo osc_category_total_items() ; ?>)</a>
                                        </li>
                                        <?php } ?>
                                        <?php } $m++; } if($m>5) {?>
                                        <li class="last"><a href="<?php echo osc_search_category_url() ; ?>"><strong><?php _e("View more...", 'royal'); ?></strong></a> </li>
                                        <?php } ?>
                                        <?php } ?> </ul>
                                </li>
                                <?php } ?> </ul>
                            <?php } ?> </li>
                        <li class='dropdown mega-dropdown'>
                            <a class='dropdown-toggle' data-delay='50' data-hover='dropdown' data-toggle='dropdown' href='#'> <span>
                      <?php _e("Location", 'royal') ; ?>
                      <i class='fa fa-angle-down'></i>
                    </span> </a>
                            <?php if ( !View::newInstance()->_exists('list_contries') ) { View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '>=', 'region_name ASC') ) ; } if( osc_count_list_regions() ) { ?>
                            <ul class="dropdown-menu mega-dropdown-menu row">
                                <?php while( osc_has_list_regions() ) { ?>
                                <li class="col-sm-2 col-xs-6">
                                    <ul>
                                        <li class="dropdown-header"> </li>
                                        <li onclick="parent.location='<?php echo osc_search_url( array( 'sRegion' => osc_list_region_id() ) ) ; ?>'">
                                            <a href="<?php echo osc_search_url( array( 'sRegion' => osc_list_region_id() ) ) ; ?>">
                                                <?php echo osc_list_region_name() ; ?> (
                                                <?php echo osc_list_region_items() ; ?>)</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?> </ul>
                            <?php } ?> </li>
                        <li>
                            <a href='<?php echo osc_contact_url(); ?>'> <span>
                      <?php _e("Contact", 'royal'); ?>
                      
                    </span> </a>
                        </li>
                        <?php if(osc_get_preference('blog-links', 'royal')!='' ) { ?>
                        <li><a target="_blank" href="<?php echo osc_get_preference('blog-links', 'royal'); ?>"><span><?php echo osc_get_preference('blog-text', 'royal'); ?></span></a></li>
                            <?php } ?> 
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<div class="container">
    <center id="ads11">
        <?php echo osc_get_preference('header-728x90', 'royal'); ?> </center>
</div>
<?php osc_show_widgets('header'); $breadcrumb=osc_breadcrumb('&raquo;', false); if( $breadcrumb !='' ) { ?>
<div class="ulfa container">
    <?php echo $breadcrumb; ?>
    <div class="clear"></div>
</div>
<?php } ?>
<div class="container forcemessages-inline">
    <?php osc_show_flash_message(); ?> </div>