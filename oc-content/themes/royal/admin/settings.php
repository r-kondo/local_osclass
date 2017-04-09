<?php
    /*
     *       Royal Multipurpose Osclass Themes
     *
     *       Copyright (C) 2016 OSCLASS.me
     *
     *       This is Royal Multipurpose Osclass Themes with Single License
     *
     *       This program is a commercial software. Copying or distribution without a license is not allowed.
     *
     *       If you need more licenses for this software. Please read more here <http://www.osclass.me/osclass-me-license/>.
     */
?>
<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<?php $google_fonts = osc_get_preference('google_fonts', 'royal_theme');?>
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('admin/css/jquery.switchButton.css');?>">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('admin/css/royal.css');?>">
<script src="<?php echo osc_current_web_theme_url('admin/js/jquery.switchButton.js');?>"></script>
<script src="<?php echo osc_current_web_theme_url('admin/jscolor/jscolor.js');?>"></script>
<script>
  $(function() {
    $( "#tabs" ).tabs();
	$("input[type=checkbox]").switchButton();
  });
 </script>
<div class="body">
    <div class="theme-royal">
        <div class="ari">
            <h2><?php _e('Royal', 'royal'); ?> <?php _e('Theme Settings', 'royal'); ?></h2> </div>
    </div>
    <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/settings.php'); ?>" method="post">
        <input type="hidden" name="action_specific" value="settings" />
        <fieldset>
            <div id="tabs">
                <ul>
                    <li><a href="#general"><i class="fa fa-gear"></i> <?php _e('General', 'royal'); ?></a> </li>
                    <li><a href="#product"><i class="fa fa-tag"></i> <?php _e('Product', 'royal'); ?></a> </li>
                    <li><a href="#widget"><i class="fa fa-pencil"></i> <?php _e('Widget', 'royal'); ?></a> </li>
                    <li><a href="#social"><i class="fa fa-facebook"></i> <?php _e('Social', 'royal'); ?></a> </li>
                    <li><a href="#ads"><i class="fa  fa-bullhorn"></i> <?php _e('Advertiser', 'royal'); ?></a> </li>
                    <li><a href="#slider"><i class="fa fa-film"></i> <?php _e('Slider', 'royal'); ?></a> </li>
                    <li><a href="#price"><i class="fa fa-money"></i> <?php _e('Price', 'royal'); ?></a> </li>
                    <li><a href="#custom"><i class="fa fa-wrench"></i> <?php _e('Custom', 'royal'); ?></a> </li>
                    <li><a href="#font"><i class="fa fa-bold"></i> <?php _e('Font and Color', 'royal'); ?></a> </li>
                    <li><a href="#plugins"><i class="fa fa-eyedropper"></i> <?php _e('Plugins', 'royal'); ?></a> </li>
                    <li><a href="#more"><i class="fa fa-gears"></i> <?php _e('More', 'royal'); ?></a> </li>
                </ul>
                <div id="general">
                    <h2 class="render-title"><?php _e('Theme Settings', 'royal'); ?></h2>
                    <div class="form-horizontal">
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Header Style', 'royal'); ?> </div>
                            <div class="form-controls">
                                <div class="cc-selector">
                                    <input id="header1" type="radio" name="header-royal" value="header1" <?php echo (osc_esc_html( osc_get_preference('header-royal', 'royal') )=="header1" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc header1" for="header1"></label>
                                    <input id="header2" type="radio" name="header-royal" value="header2" <?php echo (osc_esc_html( osc_get_preference('header-royal', 'royal') )=="header2" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc header2" for="header2"></label>
                                    <input id="header3" type="radio" name="header-royal" value="header3" <?php echo (osc_esc_html( osc_get_preference('header-royal', 'royal') )=="header3" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc header3" for="header3"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Home Style', 'royal'); ?> </div>
                            <div class="form-controls">
                                <div class="cc-selector">
                                    <input id="home1" type="radio" name="home-royal" value="home1" <?php echo (osc_esc_html( osc_get_preference('home-royal', 'royal') )=="home1" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc home1" for="home1"></label>
                                    <input id="home2" type="radio" name="home-royal" value="home2" <?php echo (osc_esc_html( osc_get_preference('home-royal', 'royal') )=="home2" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc home2" for="home2"></label>
                                    <input id="home3" type="radio" name="home-royal" value="home3" <?php echo (osc_esc_html( osc_get_preference('home-royal', 'royal') )=="home3" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc home3" for="home3"></label>
                                    <input id="home4" type="radio" name="home-royal" value="home4" <?php echo (osc_esc_html( osc_get_preference('home-royal', 'royal') )=="home4" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc home4" for="home4"></label>
                                    <input id="home5" type="radio" name="home-royal" value="home5" <?php echo (osc_esc_html( osc_get_preference('home-royal', 'royal') )=="home5" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc home5" for="home5"></label>
                                    <input id="home6" type="radio" name="home-royal" value="home6" <?php echo (osc_esc_html( osc_get_preference('home-royal', 'royal') )=="home6" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc home6" for="home6"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Footer Style', 'royal'); ?> </div>
                            <div class="form-controls">
                                <div class="cc-selector">
                                    <input id="footer1" type="radio" name="footer-royal" value="footer1" <?php echo (osc_esc_html( osc_get_preference('footer-royal', 'royal') )=="footer1" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc footer1" for="footer1"></label>
                                    <input id="footer2" type="radio" name="footer-royal" value="footer2" <?php echo (osc_esc_html( osc_get_preference('footer-royal', 'royal') )=="footer2" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc footer2" for="footer2"></label>
                                    <input id="footer3" type="radio" name="footer-royal" value="footer3" <?php echo (osc_esc_html( osc_get_preference('footer-royal', 'royal') )=="footer3" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc footer3" for="footer3"></label>
                                    <input id="footer4" type="radio" name="footer-royal" value="footer4" <?php echo (osc_esc_html( osc_get_preference('footer-royal', 'royal') )=="footer4" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc footer4" for="footer4"></label>
                                    </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Product Style', 'royal'); ?> </div>
                            <div class="form-controls">
                                <div class="cc-selector">
                                    <input id="single1" type="radio" name="single-royal" value="single1" <?php echo (osc_esc_html( osc_get_preference('single-royal', 'royal') )=="single1" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc single1" for="single1"></label>
                                    <input id="single2" type="radio" name="single-royal" value="single2" <?php echo (osc_esc_html( osc_get_preference('single-royal', 'royal') )=="single2" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc single2" for="single2"></label>
                                    <input id="single3" type="radio" name="single-royal" value="single3" <?php echo (osc_esc_html( osc_get_preference('single-royal', 'royal') )=="single3" )? "checked": ""; ?>/>
                                    <label class="drinkcard-cc single3" for="single3"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Katalog style', 'royal'); ?> </div>
                            <div class="form-controls">
                                <?php $katalog_royal=osc_esc_html( osc_get_preference('katalog-royal', 'royal') ); ?>
                                <select name="katalog-royal">
                                    <option value="slider" <?php if($katalog_royal=='slider' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('Slider', 'royal'); ?> </option>
                                    <option value="gallery" <?php if($katalog_royal=='gallery' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('Gallery', 'royal'); ?> </option>
                                </select>
                            </div>
                            <div class="form-controls">
                                <p>
                                    <?php _e('Select Katalog style template', 'royal'); ?> </p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Themes Style', 'royal'); ?> </div>
                            <div class="form-controls">
                                <?php $color_royal=osc_esc_html( osc_get_preference('color-royal', 'royal') ); ?>
                                <select name="color-royal">
                                    <option value="default" <?php if($color_royal=='default' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('default', 'royal'); ?> </option>
                                    <option value="vera" <?php if($color_royal=='vera' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('vera', 'royal'); ?> </option>
                                    <option value="facebook" <?php if($color_royal=='facebook' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('facebook', 'royal'); ?> </option>
                                    <option value="cerulean" <?php if($color_royal=='cerulean' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('cerulean', 'royal'); ?> </option>
                                    <option value="flatly" <?php if($color_royal=='flatly' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('flatly', 'royal'); ?> </option>
                                    <option value="united" <?php if($color_royal=='united' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('united', 'royal'); ?> </option>
                                    <option value="yeti" <?php if($color_royal=='yeti' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('yeti', 'royal'); ?> </option>
                                </select>
                            </div>
                            <div class="form-controls">
                                <p>
                                    <?php _e('Select themes style template', 'royal'); ?> </p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Search Placeholder', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="keyword_placeholder" value="<?php echo osc_esc_html( osc_get_preference('keyword_placeholder', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Footer Copyright', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="copyright-royal"><?php echo osc_esc_html( osc_get_preference('copyright-royal', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('Copyright text on footer.', 'royal'); ?> </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- # widget starts -->
                <div id="widget">
                    <h2 class="render-title"><?php _e('Widget settings', 'royal'); ?></h2>
                    <div class="form-horizontal">
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Title Widget', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="judul1-royal" value="<?php echo osc_esc_html( osc_get_preference('judul1-royal', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Widget on Footer 1', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="widget1-royal"><?php echo osc_esc_html( osc_get_preference('widget1-royal', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('You can add widget on footer with your custom widget ex: facebook widget or twitter widget.', 'royal'); ?> </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Title Widget', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="judul2-royal" value="<?php echo osc_esc_html( osc_get_preference('judul2-royal', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Widget on Footer 2', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="widget2-royal"><?php echo osc_esc_html( osc_get_preference('widget2-royal', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('You can add widget on footer with your custom widget ex: facebook widget or twitter widget.', 'royal'); ?> </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Title Widget', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="judul3-royal" value="<?php echo osc_esc_html( osc_get_preference('judul3-royal', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Widget on Footer 3', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="widget3-royal"><?php echo osc_esc_html( osc_get_preference('widget3-royal', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('You can add widget on footer with your custom widget ex: facebook widget or twitter widget.', 'royal'); ?> </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Title Widget', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="judul4-royal" value="<?php echo osc_esc_html( osc_get_preference('judul4-royal', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Widget on Footer 4', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="widget4-royal"><?php echo osc_esc_html( osc_get_preference('widget4-royal', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('You can add widget on footer with your custom widget ex: facebook widget or twitter widget.', 'royal'); ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
 <!-- # social starts -->
                <div id="social">
                    <h2 class="render-title"><?php _e('Social settings', 'royal'); ?></h2>
                    <div class="form-horizontal">
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Facebook Link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="facebook-us" placeholder="<?php echo osc_esc_html(__('http://facebook.com/osclass','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('facebook-us', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Twitter Link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="twitter-us" placeholder="<?php echo osc_esc_html(__('http://twitter.com/osclass','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('twitter-us', 'royal') ); ?>"> </div>
                        </div>
                         <div class="form-row">
                            <div class="form-label">
                                <?php _e('Instagram Link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="instagram-us" placeholder="<?php echo osc_esc_html(__('http://instagram.com/osclass','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('instagram-us', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Google plus link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="gplus-us" placeholder="<?php echo osc_esc_html(__('http://plus.google.com/osclass','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('gplus-us', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e( 'Linkedin link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="linkedin-us" placeholder="<?php echo osc_esc_html(__('http://linkedin.com/osclass','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('linkedin-us', 'royal') ); ?>"> </div>
                        </div>
                    </div>
                </div>
                <!-- # product starts -->
                <div id="product">
                    <h2 class="render-title"><?php _e('Product settings', 'royal'); ?></h2>
                    <div class="form-horizontal">
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Show lists as', 'royal'); ?> </div>
                            <div class="form-controls">
                                <select name="defaultShowAs@all">
                                    <option value="gallery" <?php if(royal_default_show_as()=='gallery' ){ echo 'selected="selected"' ;}?>>
                                        <?php _e('Gallery', 'royal'); ?> </option>
                                    <option value="list" <?php if(royal_default_show_as()=='list' ){ echo 'selected="selected"' ;}?>>
                                        <?php _e('List', 'royal'); ?> </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Item post multilanguages', 'royal'); ?> </div>
                            <div class="form-controls">
                                <div class="form-label-checkbox">
                                    <input type="checkbox" name="multi_view" value="1" <?php echo (osc_esc_html( osc_get_preference('multi_view', 'royal_theme') )=="1" )? "checked": ""; ?>>
                                    <br/>
                                    <div class="help-box">
                                        <?php _e('Activate', 'royal'); ?>
                                        <?php _e('Item post multilanguages', 'royal'); ?> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Latest Ads Display', 'royal'); ?> </div>
                            <div class="form-controls">
                                <div class="form-label-checkbox">
                                    <input type="checkbox" name="product-royal" value="yes" <?php echo (osc_esc_html( osc_get_preference('product-royal', 'royal') )=="yes" )? "checked": ""; ?>>
                                    <br/>
                                    <div class="help-box">
                                        <?php _e('Show or hide', 'royal'); ?>
                                        <?php _e('Latest Ads', 'royal'); ?> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Show Latest Ads', 'royal'); ?> </div>
                            <div class="form-controls">
                                <p>
                                    <?php _e('Setting latest Ads Show, on Admin>> show more>> settings>> general', 'royal'); ?> </p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Premium Ads Display', 'royal'); ?> </div>
                            <div class="form-controls">
                                <div class="form-label-checkbox">
                                    <input type="checkbox" name="premium-royal" value="yes" <?php echo (osc_esc_html( osc_get_preference('premium-royal', 'royal') )=="yes" )? "checked": ""; ?>>
                                    <br/>
                                    <div class="help-box">
                                        <?php _e('Show or hide', 'royal'); ?>
                                        <?php _e('Premium Ads', 'royal'); ?> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Show Premium Ads', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="premiumads_num_royal" placeholder="<?php echo osc_esc_html(__('8','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('premiumads_num_royal', 'royal') ); ?>"> </div>
                        </div>
<div class="form-row">
                            <div class="form-label">
                                <?php _e('Price table Display', 'royal'); ?> </div>
                            <div class="form-controls">
                                <div class="form-label-checkbox">
                                    <input type="checkbox" name="sect4_view" value="1" <?php echo (osc_esc_html( osc_get_preference( 'sect4_view', 'royal_theme') )=="1" )? "checked": ""; ?>>
                                    <br/>
                                    <div class="help-box">
                                        <?php _e('Show or hide', 'royal'); ?>
                                        <?php _e('Price table', 'royal'); ?> </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Brand Display', 'royal'); ?> </div>
                            <div class="form-controls">
                                <div class="form-label-checkbox">
                                    <input type="checkbox" name="sect5_view" value="1" <?php echo (osc_esc_html( osc_get_preference( 'sect5_view', 'royal_theme') )=="1" )? "checked": ""; ?>>
                                    <br/>
                                    <div class="help-box">
                                        <?php _e('Show or hide', 'royal'); ?>
                                        <?php _e('Brand slider', 'royal'); ?> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Footer info Display', 'royal'); ?> </div>
                            <div class="form-controls">
                                <div class="form-label-checkbox">
                                    <input type="checkbox" name="popular-royal" value="yes" <?php echo (osc_esc_html( osc_get_preference('popular-royal', 'royal') )=="yes" )? "checked": ""; ?>>
                                    <br/>
                                    <div class="help-box">
                                        <?php _e('Show or hide', 'royal'); ?>
                                        <?php _e('Latest Ads', 'royal'); ?> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="help-box">
                                <?php _e('Thumbnail size 320x240 set in oc-admin >> show more >> settings >> media ', 'royal'); ?> </div>
                        </div>
                    </div>
                </div>
                <!-- # ads starts -->
                <div id="ads">
                    <h2 class="render-title"><?php _e('Ads settings', 'royal'); ?></h2>
                    <div class="form-horizontal">
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Header Ads 728x90', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="header-728x90"><?php echo osc_esc_html( osc_get_preference('header-728x90', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('This ad will be shown at the top of your website. Note that the size of the ad has to be 728x90 pixels.', 'royal'); ?> </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Footer Ads 728x90', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="homepage-728x90"><?php echo osc_esc_html( osc_get_preference('homepage-728x90', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('This ad will be shown on the footer of your website. Note that the size of the ad has to be 728x90 pixels.', 'royal'); ?> </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Search results 728x90 (top of the page)', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="search-results-top-728x90"><?php echo osc_esc_html( osc_get_preference('search-results-top-728x90', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('This ad will be shown on top of the search results of your site. Note that the size of the ad has to be 728x90 pixels.', 'royal'); ?> </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Sidebar 160x600', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="sidebar-160x600"><?php echo osc_esc_html( osc_get_preference('sidebar-160x600', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('This ad will be shown at the right sidebar of your website. Note that the size of the ad has to be 160x600 pixels.', 'royal'); ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- # slider starts -->
                <div id="slider">
                    <h2 class="render-title"><?php _e('Slider Title and Links', 'royal'); ?></h2>
                    <div class="form-horizontal">
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Slider Mode', 'royal'); ?> </div>
                            <div class="form-controls">
                                <?php $slider_stl=osc_esc_html( osc_get_preference('ari-us', 'royal') ); ?>
                                <select name="ari-us">
                                    <option value="container" <?php if($slider_stl=='container' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('container', 'royal'); ?> </option>
                                    <option value="wrapper" <?php if($slider_stl=='wrapper' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('wrapper', 'royal'); ?> </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label"><b><?php _e('Welcome 1 text', 'royal'); ?></b> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="slider1-royal" placeholder="<?php echo osc_esc_html(__('welcome to classifieds','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('slider1-royal', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label"><b><?php _e('Welcome 2 text', 'royal'); ?></b> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="slider2-royal" placeholder="<?php echo osc_esc_html(__('welcome to classifieds','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('slider2-royal', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Slider 1 Link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="slider12-link" placeholder="http://your-link.com" value="<?php echo osc_esc_html( osc_get_preference('slider12-link', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Slider 2 Link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="slider22-link" placeholder="http://your-link.com" value="<?php echo osc_esc_html( osc_get_preference('slider22-link', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Slider 3 Link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="slider32-link" placeholder="http://your-link.com" value="<?php echo osc_esc_html( osc_get_preference('slider32-link', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Slider 4 Link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="slider42-link" placeholder="http://your-link.com" value="<?php echo osc_esc_html( osc_get_preference('slider42-link', 'royal') ); ?>"> </div>
                        </div>

                     <div class="form-row">
<h1 class="render-title separate-top"><?php _e('Brand Links', 'royal'); ?></h1> </div>
                        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/1.jpg" ) ) {?>

                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Brand Link', 'royal'); ?> <?php _e('1', 'royal'); ?></div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="brand1-link" placeholder="<?php echo osc_esc_html(__('http://your-link.com','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('brand1-link', 'royal') ); ?>"> </div>
                        </div><?php } ?>
                        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/2.jpg" ) ) {?>

                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Brand Link', 'royal'); ?> <?php _e('2', 'royal'); ?></div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="brand2-link" placeholder="<?php echo osc_esc_html(__('http://your-link.com','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('brand2-link', 'royal') ); ?>"> </div>
                        </div><?php } ?>
                        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/3.jpg" ) ) {?>

                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Brand Link', 'royal'); ?> <?php _e('3', 'royal'); ?></div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="brand3-link" placeholder="<?php echo osc_esc_html(__('http://your-link.com','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('brand3-link', 'royal') ); ?>"> </div>
                        </div><?php } ?>
                        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/4.jpg" ) ) {?>

                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Brand Link', 'royal'); ?> <?php _e('4', 'royal'); ?></div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="brand4-link" placeholder="<?php echo osc_esc_html(__('http://your-link.com','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('brand4-link', 'royal') ); ?>"> </div>
                        </div><?php } ?>
                        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/5.jpg" ) ) {?>

                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Brand Link', 'royal'); ?> <?php _e('5', 'royal'); ?></div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="brand5-link" placeholder="<?php echo osc_esc_html(__('http://your-link.com','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('brand5-link', 'royal') ); ?>"> </div>
                        </div><?php } ?>
                        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/6.jpg" ) ) {?>

                       <div class="form-row">
                            <div class="form-label">
                                <?php _e('Brand Link', 'royal'); ?> <?php _e('6', 'royal'); ?></div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="brand6-link" placeholder="<?php echo osc_esc_html(__('http://your-link.com','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('brand6-link', 'royal') ); ?>"> </div>
                        </div><?php } ?>
                        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/7.jpg" ) ) {?>

                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Brand Link', 'royal'); ?> <?php _e('7', 'royal'); ?></div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="brand7-link" placeholder="<?php echo osc_esc_html(__('http://your-link.com','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('brand7-link', 'royal') ); ?>"> </div>
                        </div><?php } ?>
                        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/8.jpg" ) ) {?>

                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Brand Link', 'royal'); ?> <?php _e('8', 'royal'); ?></div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="brand8-link" placeholder="<?php echo osc_esc_html(__('http://your-link.com','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('brand8-link', 'royal') ); ?>"> </div>
                        </div><?php } ?>
                    </div>
                </div>
                <!-- # custom starts -->
                <div id="custom">
                    <h2 class="render-title"><?php _e('Custom settings', 'royal'); ?></h2>
                    <div class="form-horizontal">
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Custom CSS', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="address-us"><?php echo osc_esc_html( osc_get_preference('address-us', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('you can costumize css.', 'royal'); ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- # price starts -->
                <div id="price">
                    <h2 class="render-title"><?php _e('Price settings', 'royal'); ?></h2>
                    <div class="form-horizontal">
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Price 1', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="price1-us"><?php echo osc_esc_html( osc_get_preference( 'price1-us', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('you can insert price here',  'royal'); ?> </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="form-label">
                                <?php _e('Description Price 1', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="price2-us"><?php echo osc_esc_html( osc_get_preference( 'price2-us', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('you can settings description price 1', 'royal'); ?> </div>
                            </div>
                        </div>
                              <div class="form-row">
                            <div class="form-label">
                                <?php _e('Content Price 1', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="price3-us"><?php echo osc_esc_html( osc_get_preference( 'price3-us', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('you can settings content price 1', 'royal'); ?> </div>
                            </div>
                        </div>
                      <div class="form-row">
                            <div class="form-label"><b><?php _e('Button text', 'royal'); ?></b> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="price4-us" placeholder="<?php echo osc_esc_html(__('Detail','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('price4-us', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Button Link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="price5-us" placeholder="<?php echo osc_esc_html(__('http://your-link.com','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('price5-us', 'royal') ); ?>"> </div>
                        </div>



 <div class="form-row">
                            <div class="form-label">
                                <?php _e('Price 2', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="price6-us"><?php echo osc_esc_html( osc_get_preference( 'price6-us', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('you can insert price 2', 'royal'); ?> </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="form-label">
                                <?php _e('Description Price 2', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="price7-us"><?php echo osc_esc_html( osc_get_preference( 'price7-us', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('you can settings description price 2', 'royal'); ?> </div>
                            </div>
                        </div>
                              <div class="form-row">
                            <div class="form-label">
                                <?php _e('Content Price 2', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="price8-us"><?php echo osc_esc_html( osc_get_preference('price8-us', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('you can settings content price 2', 'royal'); ?> </div>
                            </div>
                        </div>
                      <div class="form-row">
                            <div class="form-label"><b><?php _e('Button text', 'royal'); ?></b> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="price9-us" placeholder="<?php echo osc_esc_html(__('Detail','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('price9-us', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Button Link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="price10-us" placeholder="<?php echo osc_esc_html(__('http://your-link.com','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('price10-us', 'royal') ); ?>"> </div>
                        </div>

 <div class="form-row">
                            <div class="form-label">
                                <?php _e('Price 3', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="price11-us"><?php echo osc_esc_html( osc_get_preference( 'price11-us', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('you can settings price 3', 'royal'); ?> </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="form-label">
                                <?php _e('Description Price 3', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="price12-us"><?php echo osc_esc_html( osc_get_preference( 'price12-us', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('you can settings description price 3', 'royal'); ?> </div>
                            </div>
                        </div>
                              <div class="form-row">
                            <div class="form-label">
                                <?php _e('Content Price 3', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="price13-us"><?php echo osc_esc_html( osc_get_preference( 'price13-us', 'royal') ); ?></textarea>
                                <br/>
                                <br/>
                                <div class="help-box">
                                    <?php _e('you can settings content price 3', 'royal'); ?> </div>
                            </div>
                        </div>
                      <div class="form-row">
                            <div class="form-label"><b><?php _e('Button text', 'royal'); ?></b> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="price14-us" placeholder="<?php echo osc_esc_html(__('Detail','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('price14-us', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Button Link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="price15-us" placeholder="<?php echo osc_esc_html(__('http://your-link.com','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('price15-us', 'royal') ); ?>"> </div>
                        </div>


                    </div>
                </div>
                <!-- # font starts -->
                <div id="font">
                    <h2 class="render-title"><?php _e('Font and Color settings', 'royal'); ?></h2>
                    <div class="form-horizontal">
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Customize Panel', 'royal'); ?> </div>
                            <div class="form-controls">
                                <div class="form-label-checkbox">
                                    <input type="checkbox" name="font_view" value="1" <?php echo (osc_esc_html( osc_get_preference('font_view', 'royal_theme') )=="1" )? "checked": ""; ?>> </div>
                                <br/>
                                <div class="help-box">
                                    <?php _e('Switch on to activate custom font and color.', 'royal'); ?> </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Font Family', 'royal'); ?> </div>
                            <div class="form-controls">
                                <select name="google_fonts">
                                    <option value="Abel" <?php if($google_fonts=="Abel" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Abel', 'royal'); ?> </option>
                                    <option value="Abril+Fatface" <?php if($google_fonts=="Abril+Fatface" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Abril Fatface', 'royal'); ?> </option>
                                    <option value="Aclonica" <?php if($google_fonts=="Aclonica" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Aclonica', 'royal'); ?> </option>
                                    <option value="Actor" <?php if($google_fonts=="Actor" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Actor', 'royal'); ?> </option>
                                    <option value="Adamina" <?php if($google_fonts=="Adamina" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Adamina', 'royal'); ?> </option>
                                    <option value="Aguafina+Script" <?php if($google_fonts=="Aguafina+Script" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Aguafina Script', 'royal'); ?> </option>
                                    <option value="Aladin" <?php if($google_fonts=="Aladin" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Aladin', 'royal'); ?> </option>
                                    <option value="Aldrich" <?php if($google_fonts=="Aldrich" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Aldrich', 'royal'); ?> </option>
                                    <option value="Alice" <?php if($google_fonts=="Alice" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Alice', 'royal'); ?> </option>
                                    <option value="Alike+Angular" <?php if($google_fonts=="Alike+Angular" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Alike Angular', 'royal'); ?> </option>
                                    <option value="Alike" <?php if($google_fonts=="Alike" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Alike', 'royal'); ?> </option>
                                    <option value="Allan" <?php if($google_fonts=="Allan" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Allan', 'royal'); ?> </option>
                                    <option value="Allerta+Stencil" <?php if($google_fonts=="Allerta+Stencil" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Allerta Stencil', 'royal'); ?> </option>
                                    <option value="Allerta" <?php if($google_fonts=="Allerta" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Allerta', 'royal'); ?> </option>
                                    <option value="Amaranth" <?php if($google_fonts=="Amaranth" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Amaranth', 'royal'); ?> </option>
                                    <option value="Amatic+SC" <?php if($google_fonts=="Amatic+SC" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Amatic SC', 'royal'); ?> </option>
                                    <option value="Andada" <?php if($google_fonts=="Andada" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Andada', 'royal'); ?> </option>
                                    <option value="Andika" <?php if($google_fonts=="Andika" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Andika', 'royal'); ?> </option>
                                    <option value="Annie+Use+Your+Telescope" <?php if($google_fonts=="Annie+Use+Your+Telescope" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Annie Use Your Telescope', 'royal'); ?> </option>
                                    <option value="Anonymous+Pro" <?php if($google_fonts=="Anonymous+Pro" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Anonymous Pro', 'royal'); ?> </option>
                                    <option value="Antic" <?php if($google_fonts=="Antic" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Antic', 'royal'); ?> </option>
                                    <option value="Anton" <?php if($google_fonts=="Anton" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Anton', 'royal'); ?> </option>
                                    <option value="Arapey" <?php if($google_fonts=="Arapey" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Arapey', 'royal'); ?> </option>
                                    <option value="Arial" <?php if($google_fonts=="Arial" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Arial', 'royal'); ?> </option>
                                    <option value="Architects+Daughter" <?php if($google_fonts=="Architects+Daughter" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Architects Daughter', 'royal'); ?> </option>
                                    <option value="Arimo" <?php if($google_fonts=="Arimo" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Arimo', 'royal'); ?> </option>
                                    <option value="Artifika" <?php if($google_fonts=="Artifika" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Artifika', 'royal'); ?> </option>
                                    <option value="Arvo" <?php if($google_fonts=="Arvo" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Arvo', 'royal'); ?> </option>
                                    <option value="Asset" <?php if($google_fonts=="Asset" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Asset', 'royal'); ?> </option>
                                    <option value="Astloch" <?php if($google_fonts=="Astloch" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Astloch', 'royal'); ?> </option>
                                    <option value="Atomic+Age" <?php if($google_fonts=="Atomic+Age" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Atomic Age', 'royal'); ?> </option>
                                    <option value="Aubrey" <?php if($google_fonts=="Aubrey" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Aubrey', 'royal'); ?> </option>
                                    <option value="Bangers" <?php if($google_fonts=="Bangers" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Bangers', 'royal'); ?> </option>
                                    <option value="Bentham" <?php if($google_fonts=="Bentham" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Bentham', 'royal'); ?> </option>
                                    <option value="Bevan" <?php if($google_fonts=="Bevan" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Bevan', 'royal'); ?> </option>
                                    <option value="Bigshot+One" <?php if($google_fonts=="Bigshot+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Bigshot One', 'royal'); ?> </option>
                                    <option value="Bitter" <?php if($google_fonts=="Bitter" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Bitter', 'royal'); ?> </option>
                                    <option value="Black+Ops+One" <?php if($google_fonts=="Black+Ops+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Black Ops One', 'royal'); ?> </option>
                                    <option value="Bowlby+One+SC" <?php if($google_fonts=="Bowlby+One+SC" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Bowlby One SC', 'royal'); ?> </option>
                                    <option value="Bowlby+One" <?php if($google_fonts=="Bowlby+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Bowlby One', 'royal'); ?> </option>
                                    <option value="Brawler" <?php if($google_fonts=="Brawler" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Brawler', 'royal'); ?> </option>
                                    <option value="Bubblegum+Sans" <?php if($google_fonts=="Bubblegum+Sans" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Bubblegum Sans', 'royal'); ?> </option>
                                    <option value="Buda" <?php if($google_fonts=="Buda" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Buda', 'royal'); ?> </option>
                                    <option value="Butcherman+Caps" <?php if($google_fonts=="Butcherman+Caps" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Butcherman Caps', 'royal'); ?> </option>
                                    <option value="Cabin+Condensed" <?php if($google_fonts=="Cabin+Condensed" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Cabin Condensed', 'royal'); ?> </option>
                                    <option value="Cabin+Sketch" <?php if($google_fonts=="Cabin+Sketch" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Cabin Sketch', 'royal'); ?> </option>
                                    <option value="Cabin" <?php if($google_fonts=="Cabin" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Cabin', 'royal'); ?> </option>
                                    <option value="Cagliostro" <?php if($google_fonts=="Cagliostro" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Cagliostro', 'royal'); ?> </option>
                                    <option value="Calligraffitti" <?php if($google_fonts=="Calligraffitti" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Calligraffitti', 'royal'); ?> </option>
                                    <option value="Candal" <?php if($google_fonts=="Candal" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Candal', 'royal'); ?> </option>
                                    <option value="Cantarell" <?php if($google_fonts=="Cantarell" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Cantarell', 'royal'); ?> </option>
                                    <option value="Cardo" <?php if($google_fonts=="Cardo" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Cardo', 'royal'); ?> </option>
                                    <option value="Carme" <?php if($google_fonts=="Carme" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Carme', 'royal'); ?> </option>
                                    <option value="Carter+One" <?php if($google_fonts=="Carter+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Carter One', 'royal'); ?> </option>
                                    <option value="Caudex" <?php if($google_fonts=="Caudex" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Caudex', 'royal'); ?> </option>
                                    <option value="Cedarville+Cursive" <?php if($google_fonts=="Cedarville+Cursive" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Cedarville Cursive', 'royal'); ?> </option>
                                    <option value="Changa+One" <?php if($google_fonts=="Changa+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Changa One', 'royal'); ?> </option>
                                    <option value="Cherry+Cream+Soda" <?php if($google_fonts=="Cherry+Cream+Soda" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Cherry Cream Soda', 'royal'); ?> </option>
                                    <option value="Chewy" <?php if($google_fonts=="Chewy" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Chewy', 'royal'); ?> </option>
                                    <option value="Chicle" <?php if($google_fonts=="Chicle" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Chicle', 'royal'); ?> </option>
                                    <option value="Chivo" <?php if($google_fonts=="Chivo" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Chivo', 'royal'); ?> </option>
                                    <option value="Coda+Caption" <?php if($google_fonts=="Coda+Caption" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Coda Caption', 'royal'); ?> </option>
                                    <option value="Coda" <?php if($google_fonts=="Coda" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Coda', 'royal'); ?> </option>
                                    <option value="Comfortaa" <?php if($google_fonts=="Comfortaa" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Comfortaa', 'royal'); ?> </option>
                                    <option value="Coming+Soon" <?php if($google_fonts=="Coming+Soon" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Coming Soon', 'royal'); ?> </option>
                                    <option value="Contrail+One" <?php if($google_fonts=="Contrail+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Contrail One', 'royal'); ?> </option>
                                    <option value="Convergence" <?php if($google_fonts=="Convergence" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Convergence', 'royal'); ?> </option>
                                    <option value="Cookie" <?php if($google_fonts=="Cookie" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Cookie', 'royal'); ?> </option>
                                    <option value="Copse" <?php if($google_fonts=="Copse" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Copse', 'royal'); ?> </option>
                                    <option value="Corben" <?php if($google_fonts=="Corben" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Corben', 'royal'); ?> </option>
                                    <option value="Cousine" <?php if($google_fonts=="Cousine" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Cousine', 'royal'); ?> </option>
                                    <option value="Coustard" <?php if($google_fonts=="Coustard" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Coustard', 'royal'); ?> </option>
                                    <option value="Covered+By+Your+Grace" <?php if($google_fonts=="Covered+By+Your+Grace" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Covered By Your Grace', 'royal'); ?> </option>
                                    <option value="Crafty+Girls" <?php if($google_fonts=="Crafty+Girls" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Crafty Girls', 'royal'); ?> </option>
                                    <option value="Creepster+Caps" <?php if($google_fonts=="Creepster+Caps" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Creepster Caps', 'royal'); ?> </option>
                                    <option value="Crimson+Text" <?php if($google_fonts=="Crimson+Text" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Crimson Text', 'royal'); ?> </option>
                                    <option value="Crushed" <?php if($google_fonts=="Crushed" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Crushed', 'royal'); ?> </option>
                                    <option value="Cuprum" <?php if($google_fonts=="Cuprum" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Cuprum', 'royal'); ?> </option>
                                    <option value="Damion" <?php if($google_fonts=="Damion" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Damion', 'royal'); ?> </option>
                                    <option value="Dancing+Script" <?php if($google_fonts=="Dancing+Script" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Dancing Script', 'royal'); ?> </option>
                                    <option value="Dawning+of+a+New+Day" <?php if($google_fonts=="Dawning+of+a+New+Day" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Dawning of a New Day', 'royal'); ?> </option>
                                    <option value="Days+One" <?php if($google_fonts=="Days+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Days One', 'royal'); ?> </option>
                                    <option value="Delius+Swash+Caps" <?php if($google_fonts=="Delius+Swash+Caps" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Delius Swash Caps', 'royal'); ?> </option>
                                    <option value="Delius+Unicase" <?php if($google_fonts=="Delius+Unicase" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Delius Unicase', 'royal'); ?> </option>
                                    <option value="Delius" <?php if($google_fonts=="Delius" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Delius', 'royal'); ?> </option>
                                    <option value="Devonshire" <?php if($google_fonts=="Devonshire" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Devonshire', 'royal'); ?> </option>
                                    <option value="Didact+Gothic" <?php if($google_fonts=="Didact+Gothic" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Didact Gothic', 'royal'); ?> </option>
                                    <option value="Dorsa" <?php if($google_fonts=="Dorsa" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Dorsa', 'royal'); ?> </option>
                                    <option value="Dr+Sugiyama" <?php if($google_fonts=="Dr+Sugiyama" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Dr Sugiyama', 'royal'); ?> </option>
                                    <option value="Droid+Sans+Mono" <?php if($google_fonts=="Droid+Sans+Mono" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Droid Sans Mono', 'royal'); ?> </option>
                                    <option value="Droid+Sans" <?php if($google_fonts=="Droid+Sans" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Droid Sans', 'royal'); ?> </option>
                                    <option value="Droid+Serif" <?php if($google_fonts=="Droid+Serif" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Droid Serif', 'royal'); ?> </option>
                                    <option value="EB+Garamond" <?php if($google_fonts=="EB+Garamond" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('EB Garamond', 'royal'); ?> </option>
                                    <option value="Eater+Caps" <?php if($google_fonts=="Eater+Caps" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Eater Caps', 'royal'); ?> </option>
                                    <option value="Expletus+Sans" <?php if($google_fonts=="Expletus+Sans" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Expletus Sans', 'royal'); ?> </option>
                                    <option value="Fanwood+Text" <?php if($google_fonts=="Fanwood+Text" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Fanwood Text', 'royal'); ?> </option>
                                    <option value="Federant" <?php if($google_fonts=="Federant" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Federant', 'royal'); ?> </option>
                                    <option value="Federo" <?php if($google_fonts=="Federo" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Federo', 'royal'); ?> </option>
                                    <option value="Fjord+One" <?php if($google_fonts=="Fjord+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Fjord One', 'royal'); ?> </option>
                                    <option value="Fondamento" <?php if($google_fonts=="Fondamento" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Fondamento', 'royal'); ?> </option>
                                    <option value="Fontdiner+Swanky" <?php if($google_fonts=="Fontdiner+Swanky" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Fontdiner Swanky', 'royal'); ?> </option>
                                    <option value="Forum" <?php if($google_fonts=="Forum" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Forum', 'royal'); ?> </option>
                                    <option value="Francois+One" <?php if($google_fonts=="Francois+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Francois One', 'royal'); ?> </option>
                                    <option value="Gentium+Basic" <?php if($google_fonts=="Gentium+Basic" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Gentium Basic', 'royal'); ?> </option>
                                    <option value="Gentium+Book+Basic" <?php if($google_fonts=="Gentium+Book+Basic" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Gentium Book Basic', 'royal'); ?> </option>
                                    <option value="Geo" <?php if($google_fonts=="Geo" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Geo', 'royal'); ?> </option>
                                    <option value="Geostar+Fill" <?php if($google_fonts=="Geostar+Fill" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Geostar Fill', 'royal'); ?> </option>
                                    <option value="Geostar" <?php if($google_fonts=="Geostar" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Geostar', 'royal'); ?> </option>
                                    <option value="Give+You+Glory" <?php if($google_fonts=="Give+You+Glory" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Give You Glory', 'royal'); ?> </option>
                                    <option value="Gloria+Hallelujah" <?php if($google_fonts=="Gloria+Hallelujah" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Gloria Hallelujah', 'royal'); ?> </option>
                                    <option value="Goblin+One" <?php if($google_fonts=="Goblin+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Goblin One', 'royal'); ?> </option>
                                    <option value="Gochi+Hand" <?php if($google_fonts=="Gochi+Hand" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Gochi Hand', 'royal'); ?> </option>
                                    <option value="Goudy+Bookletter+1911" <?php if($google_fonts=="Goudy+Bookletter+1911" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Goudy Bookletter 1911', 'royal'); ?> </option>
                                    <option value="Gravitas+One" <?php if($google_fonts=="Gravitas+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Gravitas One', 'royal'); ?> </option>
                                    <option value="Gruppo" <?php if($google_fonts=="Gruppo" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Gruppo', 'royal'); ?> </option>
                                    <option value="Hammersmith+One" <?php if($google_fonts=="Hammersmith+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Hammersmith One', 'royal'); ?> </option>
                                    <option value="Herr+Von+Muellerhoff" <?php if($google_fonts=="Herr+Von+Muellerhoff" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Herr Von Muellerhoff', 'royal'); ?> </option>
                                    <option value="Holtwood+One+SC" <?php if($google_fonts=="Holtwood+One+SC" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Holtwood One SC', 'royal'); ?> </option>
                                    <option value="Homemade+Apple" <?php if($google_fonts=="Homemade+Apple" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Homemade Apple', 'royal'); ?> </option>
                                    <option value="IM+Fell+DW+Pica+SC" <?php if($google_fonts=="IM+Fell+DW+Pica+SC" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('IM Fell DW Pica SC', 'royal'); ?> </option>
                                    <option value="IM+Fell+DW+Pica" <?php if($google_fonts=="IM+Fell+DW+Pica" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('IM Fell DW Pica', 'royal'); ?> </option>
                                    <option value="IM+Fell+Double+Pica+SC" <?php if($google_fonts=="IM+Fell+Double+Pica+SC" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('IM Fell Double Pica SC', 'royal'); ?> </option>
                                    <option value="IM+Fell+Double+Pica" <?php if($google_fonts=="IM+Fell+Double+Pica" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('IM Fell Double Pica', 'royal'); ?> </option>
                                    <option value="IM+Fell+English+SC" <?php if($google_fonts=="IM+Fell+English+SC" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('IM Fell English SC', 'royal'); ?> </option>
                                    <option value="IM+Fell+English" <?php if($google_fonts=="IM+Fell+English" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('IM Fell English', 'royal'); ?> </option>
                                    <option value="IM+Fell+French+Canon+SC" <?php if($google_fonts=="IM+Fell+French+Canon+SC" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('IM Fell French Canon SC', 'royal'); ?> </option>
                                    <option value="IM+Fell+French+Canon" <?php if($google_fonts=="IM+Fell+French+Canon" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('IM Fell French Canon', 'royal'); ?> </option>
                                    <option value="IM+Fell+Great+Primer+SC" <?php if($google_fonts=="IM+Fell+Great+Primer+SC" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('IM Fell Great Primer SC', 'royal'); ?> </option>
                                    <option value="IM+Fell+Great+Primer" <?php if($google_fonts=="IM+Fell+Great+Primer" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('IM Fell Great Primer', 'royal'); ?> </option>
                                    <option value="Iceland" <?php if($google_fonts=="Iceland" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Iceland', 'royal'); ?> </option>
                                    <option value="Inconsolata" <?php if($google_fonts=="Inconsolata" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Inconsolata', 'royal'); ?> </option>
                                    <option value="Indie+Flower" <?php if($google_fonts=="Indie+Flower" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Indie Flower', 'royal'); ?> </option>
                                    <option value="Irish+Grover" <?php if($google_fonts=="Irish+Grover" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Irish Grover', 'royal'); ?> </option>
                                    <option value="Istok+Web" <?php if($google_fonts=="Istok+Web" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Istok Web', 'royal'); ?> </option>
                                    <option value="Jockey+One" <?php if($google_fonts=="Jockey+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Jockey One', 'royal'); ?> </option>
                                    <option value="Josefin+Sans" <?php if($google_fonts=="Josefin+Sans" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Josefin Sans', 'royal'); ?> </option>
                                    <option value="Josefin+Slab" <?php if($google_fonts=="Josefin+Slab" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Josefin Slab', 'royal'); ?> </option>
                                    <option value="Judson" <?php if($google_fonts=="Judson" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Judson', 'royal'); ?> </option>
                                    <option value="Julee" <?php if($google_fonts=="Julee" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Julee', 'royal'); ?> </option>
                                    <option value="Jura" <?php if($google_fonts=="Jura" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Jura', 'royal'); ?> </option>
                                    <option value="Just+Another+Hand" <?php if($google_fonts=="Just+Another+Hand" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Just Another Hand', 'royal'); ?> </option>
                                    <option value="Just+Me+Again+Down+Here" <?php if($google_fonts=="Just+Me+Again+Down+Here" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Just Me Again Down Here', 'royal'); ?> </option>
                                    <option value="Kameron" <?php if($google_fonts=="Kameron" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Kameron', 'royal'); ?> </option>
                                    <option value="Kelly+Slab" <?php if($google_fonts=="Kelly+Slab" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Kelly Slab', 'royal'); ?> </option>
                                    <option value="Kenia" <?php if($google_fonts=="Kenia" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Kenia', 'royal'); ?> </option>
                                    <option value="Knewave" <?php if($google_fonts=="Knewave" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Knewave', 'royal'); ?> </option>
                                    <option value="Kranky" <?php if($google_fonts=="Kranky" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Kranky', 'royal'); ?> </option>
                                    <option value="Kreon" <?php if($google_fonts=="Kreon" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Kreon', 'royal'); ?> </option>
                                    <option value="Kristi" <?php if($google_fonts=="Kristi" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Kristi', 'royal'); ?> </option>
                                    <option value="La+Belle+Aurore" <?php if($google_fonts=="La+Belle+Aurore" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('La Belle Aurore', 'royal'); ?> </option>
                                    <option value="Lancelot" <?php if($google_fonts=="Lancelot" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Lancelot', 'royal'); ?> </option>
                                    <option value="Lato" <?php if($google_fonts=="Lato" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Lato', 'royal'); ?> </option>
                                    <option value="League+Script" <?php if($google_fonts=="League+Script" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('League Script', 'royal'); ?> </option>
                                    <option value="Leckerli+One" <?php if($google_fonts=="Leckerli+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Leckerli One', 'royal'); ?> </option>
                                    <option value="Lekton" <?php if($google_fonts=="Lekton" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Lekton', 'royal'); ?> </option>
                                    <option value="Lemon" <?php if($google_fonts=="Lemon" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Lemon', 'royal'); ?> </option>
                                    <option value="Limelight" <?php if($google_fonts=="Limelight" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Limelight', 'royal'); ?> </option>
                                    <option value="Linden+Hill" <?php if($google_fonts=="Linden+Hill" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Linden Hill', 'royal'); ?> </option>
                                    <option value="Lobster+Two" <?php if($google_fonts=="Lobster+Two" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Lobster Two', 'royal'); ?> </option>
                                    <option value="Lobster" <?php if($google_fonts=="Lobster" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Lobster', 'royal'); ?> </option>
                                    <option value="Lora" <?php if($google_fonts=="Lora" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Lora', 'royal'); ?> </option>
                                    <option value="Love+Ya+Like+A+Sister" <?php if($google_fonts=="Love+Ya+Like+A+Sister" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Love Ya Like A Sister', 'royal'); ?> </option>
                                    <option value="Loved+by+the+King" <?php if($google_fonts=="Loved+by+the+King" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Loved by the King', 'royal'); ?> </option>
                                    <option value="Luckiest+Guy" <?php if($google_fonts=="Luckiest+Guy" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Luckiest Guy', 'royal'); ?> </option>
                                    <option value="Maiden+Orange" <?php if($google_fonts=="Maiden+Orange" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Maiden Orange', 'royal'); ?> </option>
                                    <option value="Mako" <?php if($google_fonts=="Mako" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Mako', 'royal'); ?> </option>
                                    <option value="Marck+Script" <?php if($google_fonts=="Marck+Script" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Marck Script', 'royal'); ?> </option>
                                    <option value="Marvel" <?php if($google_fonts=="Marvel" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Marvel', 'royal'); ?> </option>
                                    <option value="Mate+SC" <?php if($google_fonts=="Mate+SC" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Mate SC', 'royal'); ?> </option>
                                    <option value="Mate" <?php if($google_fonts=="Mate" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Mate', 'royal'); ?> </option>
                                    <option value="Maven+Pro" <?php if($google_fonts=="Maven+Pro" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Maven Pro', 'royal'); ?> </option>
                                    <option value="Meddon" <?php if($google_fonts=="Meddon" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Meddon', 'royal'); ?> </option>
                                    <option value="MedievalSharp" <?php if($google_fonts=="MedievalSharp" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('MedievalSharp', 'royal'); ?> </option>
                                    <option value="Megrim" <?php if($google_fonts=="Megrim" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Megrim', 'royal'); ?> </option>
                                    <option value="Merienda+One" <?php if($google_fonts=="Merienda+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Merienda One', 'royal'); ?> </option>
                                    <option value="Merriweather" <?php if($google_fonts=="Merriweather" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Merriweather', 'royal'); ?> </option>
                                    <option value="Metrophobic" <?php if($google_fonts=="Metrophobic" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Metrophobic', 'royal'); ?> </option>
                                    <option value="Michroma" <?php if($google_fonts=="Michroma" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Michroma', 'royal'); ?> </option>
                                    <option value="Miltonian+Tattoo" <?php if($google_fonts=="Miltonian+Tattoo" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Miltonian Tattoo', 'royal'); ?> </option>
                                    <option value="Miltonian" <?php if($google_fonts=="Miltonian" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Miltonian', 'royal'); ?> </option>
                                    <option value="Miss+Fajardose" <?php if($google_fonts=="Miss+Fajardose" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Miss Fajardose', 'royal'); ?> </option>
                                    <option value="Miss+Saint+Delafield" <?php if($google_fonts=="Miss+Saint+Delafield" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Miss Saint Delafield', 'royal'); ?> </option>
                                    <option value="Modern+Antiqua" <?php if($google_fonts=="Modern+Antiqua" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Modern Antiqua', 'royal'); ?> </option>
                                    <option value="Molengo" <?php if($google_fonts=="Molengo" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Molengo', 'royal'); ?> </option>
                                    <option value="Monofett" <?php if($google_fonts=="Monofett" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Monofett', 'royal'); ?> </option>
                                    <option value="Monoton" <?php if($google_fonts=="Monoton" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Monoton', 'royal'); ?> </option>
                                    <option value="Monsieur+La+Doulaise" <?php if($google_fonts=="Monsieur+La+Doulaise" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Monsieur La Doulaise', 'royal'); ?> </option>
                                    <option value="Montez" <?php if($google_fonts=="Montez" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Montez', 'royal'); ?> </option>
                                    <option value="Mountains+of+Christmas" <?php if($google_fonts=="Mountains+of+Christmas" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Mountains of Christmas', 'royal'); ?> </option>
                                    <option value="Mr+Bedford" <?php if($google_fonts=="Mr+Bedford" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Mr Bedford', 'royal'); ?> </option>
                                    <option value="Mr+Dafoe" <?php if($google_fonts=="Mr+Dafoe" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Mr Dafoe', 'royal'); ?> </option>
                                    <option value="Mr+De+Haviland" <?php if($google_fonts=="Mr+De+Haviland" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Mr De Haviland', 'royal'); ?> </option>
                                    <option value="Mrs+Sheppards" <?php if($google_fonts=="Mrs+Sheppards" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Mrs Sheppards', 'royal'); ?> </option>
                                    <option value="Muli" <?php if($google_fonts=="Muli" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Muli', 'royal'); ?> </option>
                                    <option value="Neucha" <?php if($google_fonts=="Neucha" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Neucha', 'royal'); ?> </option>
                                    <option value="Neuton" <?php if($google_fonts=="Neuton" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Neuton', 'royal'); ?> </option>
                                    <option value="News+Cycle" <?php if($google_fonts=="News+Cycle" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('News Cycle', 'royal'); ?> </option>
                                    <option value="Niconne" <?php if($google_fonts=="Niconne" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Niconne', 'royal'); ?> </option>
                                    <option value="Nixie+One" <?php if($google_fonts=="Nixie+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nixie One', 'royal'); ?> </option>
                                    <option value="Nobile" <?php if($google_fonts=="Nobile" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nobile', 'royal'); ?> </option>
                                    <option value="Nosifer+Caps" <?php if($google_fonts=="Nosifer+Caps" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nosifer Caps', 'royal'); ?> </option>
                                    <option value="Nothing+You+Could+Do" <?php if($google_fonts=="Nothing+You+Could+Do" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nothing You Could Do', 'royal'); ?> </option>
                                    <option value="Nova+Cut" <?php if($google_fonts=="Nova+Cut" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nova Cut', 'royal'); ?> </option>
                                    <option value="Nova+Flat" <?php if($google_fonts=="Nova+Flat" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nova Flat', 'royal'); ?> </option>
                                    <option value="Nova+Mono" <?php if($google_fonts=="Nova+Mono" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nova Mono', 'royal'); ?> </option>
                                    <option value="Nova+Oval" <?php if($google_fonts=="Nova+Oval" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nova Oval', 'royal'); ?> </option>
                                    <option value="Nova+Round" <?php if($google_fonts=="Nova+Round" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nova Round', 'royal'); ?> </option>
                                    <option value="Nova+Script" <?php if($google_fonts=="Nova+Script" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nova Script', 'royal'); ?> </option>
                                    <option value="Nova+Slim" <?php if($google_fonts=="Nova+Slim" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nova Slim', 'royal'); ?> </option>
                                    <option value="Nova+Square" <?php if($google_fonts=="Nova+Square" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nova Square', 'royal'); ?> </option>
                                    <option value="Numans" <?php if($google_fonts=="Numans" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Numans', 'royal'); ?> </option>
                                    <option value="Nunito" <?php if($google_fonts=="Nunito" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Nunito', 'royal'); ?> </option>
                                    <option value="Old+Standard+TT" <?php if($google_fonts=="Old+Standard+TT" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Old Standard TT', 'royal'); ?> </option>
                                    <option value="Open+Sans+Condensed" <?php if($google_fonts=="Open+Sans+Condensed" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Open Sans Condensed', 'royal'); ?> </option>
                                    <option value="Open+Sans" <?php if($google_fonts=="Open+Sans" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Open Sans', 'royal'); ?> </option>
                                    <option value="Orbitron" <?php if($google_fonts=="Orbitron" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Orbitron', 'royal'); ?> </option>
                                    <option value="Oswald" <?php if($google_fonts=="Oswald" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Oswald', 'royal'); ?> </option>
                                    <option value="Over+the+Rainbow" <?php if($google_fonts=="Over+the+Rainbow" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Over the Rainbow', 'royal'); ?> </option>
                                    <option value="Ovo" <?php if($google_fonts=="Ovo" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Ovo', 'royal'); ?> </option>
                                    <option value="PT+Sans+Caption" <?php if($google_fonts=="PT+Sans+Caption" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('PT Sans Caption', 'royal'); ?> </option>
                                    <option value="PT+Sans+Narrow" <?php if($google_fonts=="PT+Sans+Narrow" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('PT Sans Narrow', 'royal'); ?> </option>
                                    <option value="PT+Sans" <?php if($google_fonts=="PT+Sans" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('PT Sans', 'royal'); ?> </option>
                                    <option value="PT+Serif+Caption" <?php if($google_fonts=="PT+Serif+Caption" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('PT Serif Caption', 'royal'); ?> </option>
                                    <option value="PT+Serif" <?php if($google_fonts=="PT+Serif" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('PT Serif', 'royal'); ?> </option>
                                    <option value="Pacifico" <?php if($google_fonts=="Pacifico" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Pacifico', 'royal'); ?> </option>
                                    <option value="Passero+One" <?php if($google_fonts=="Passero+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Passero One', 'royal'); ?> </option>
                                    <option value="Patrick+Hand" <?php if($google_fonts=="Patrick+Hand" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Patrick Hand', 'royal'); ?> </option>
                                    <option value="Paytone+One" <?php if($google_fonts=="Paytone+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Paytone One', 'royal'); ?> </option>
                                    <option value="Permanent+Marker" <?php if($google_fonts=="Permanent+Marker" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Permanent Marker', 'royal'); ?> </option>
                                    <option value="Petrona" <?php if($google_fonts=="Petrona" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Petrona', 'royal'); ?> </option>
                                    <option value="Philosopher" <?php if($google_fonts=="Philosopher" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Philosopher', 'royal'); ?> </option>
                                    <option value="Piedra" <?php if($google_fonts=="Piedra" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Piedra', 'royal'); ?> </option>
                                    <option value="Pinyon+Script" <?php if($google_fonts=="Pinyon+Script" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Pinyon Script', 'royal'); ?> </option>
                                    <option value="Play" <?php if($google_fonts=="Play" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Play', 'royal'); ?> </option>
                                    <option value="Playfair+Display" <?php if($google_fonts=="Playfair+Display" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Playfair Display', 'royal'); ?> </option>
                                    <option value="Podkova" <?php if($google_fonts=="Podkova" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Podkova', 'royal'); ?> </option>
                                    <option value="Poller+One" <?php if($google_fonts=="Poller+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Poller One', 'royal'); ?> </option>
                                    <option value="Poly" <?php if($google_fonts=="Poly" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Poly', 'royal'); ?> </option>
                                    <option value="Pompiere" <?php if($google_fonts=="Pompiere" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Pompiere', 'royal'); ?> </option>
                                    <option value="Prata" <?php if($google_fonts=="Prata" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Prata', 'royal'); ?> </option>
                                    <option value="Prociono" <?php if($google_fonts=="Prociono" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Prociono', 'royal'); ?> </option>
                                    <option value="Puritan" <?php if($google_fonts=="Puritan" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Puritan', 'royal'); ?> </option>
                                    <option value="Quattrocento+Sans" <?php if($google_fonts=="Quattrocento+Sans" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Quattrocento Sans', 'royal'); ?> </option>
                                    <option value="Quattrocento" <?php if($google_fonts=="Quattrocento" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Quattrocento', 'royal'); ?> </option>
                                    <option value="Questrial" <?php if($google_fonts=="Questrial" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Questrial', 'royal'); ?> </option>
                                    <option value="Quicksand" <?php if($google_fonts=="Quicksand" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Quicksand', 'royal'); ?> </option>
                                    <option value="Radley" <?php if($google_fonts=="Radley" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Radley', 'royal'); ?> </option>
                                    <option value="Raleway" <?php if($google_fonts=="Raleway" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Raleway', 'royal'); ?> </option>
                                    <option value="Rammetto+One" <?php if($google_fonts=="Rammetto+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Rammetto One', 'royal'); ?> </option>
                                    <option value="Rancho" <?php if($google_fonts=="Rancho" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Rancho', 'royal'); ?> </option>
                                    <option value="Rationale" <?php if($google_fonts=="Rationale" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Rationale', 'royal'); ?> </option>
                                    <option value="Redressed" <?php if($google_fonts=="Redressed" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Redressed', 'royal'); ?> </option>
                                    <option value="Reenie+Beanie" <?php if($google_fonts=="Reenie+Beanie" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Reenie Beanie', 'royal'); ?> </option>
                                    <option value="Ribeye+Marrow" <?php if($google_fonts=="Ribeye+Marrow" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Ribeye Marrow', 'royal'); ?> </option>
                                    <option value="Ribeye" <?php if($google_fonts=="Ribeye" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Ribeye', 'royal'); ?> </option>
                                    <option value="Righteous" <?php if($google_fonts=="Righteous" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Righteous', 'royal'); ?> </option>
                                    <option value="Rochester" <?php if($google_fonts=="Rochester" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Rochester', 'royal'); ?> </option>
                                    <option value="Rock+Salt" <?php if($google_fonts=="Rock+Salt" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Rock Salt', 'royal'); ?> </option>
                                    <option value="Rokkitt" <?php if($google_fonts=="Rokkitt" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Rokkitt', 'royal'); ?> </option>
                                    <option value="Rosario" <?php if($google_fonts=="Rosario" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Rosario', 'royal'); ?> </option>
                                    <option value="Ruslan+Display" <?php if($google_fonts=="Ruslan+Display" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Ruslan Display', 'royal'); ?> </option>
                                    <option value="Salsa" <?php if($google_fonts=="Salsa" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Salsa', 'royal'); ?> </option>
                                    <option value="Sancreek" <?php if($google_fonts=="Sancreek" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Sancreek', 'royal'); ?> </option>
                                    <option value="Sansita+One" <?php if($google_fonts=="Sansita+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Sansita One', 'royal'); ?> </option>
                                    <option value="Satisfy" <?php if($google_fonts=="Satisfy" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Satisfy', 'royal'); ?> </option>
                                    <option value="Schoolbell" <?php if($google_fonts=="Schoolbell" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Schoolbell', 'royal'); ?> </option>
                                    <option value="Shadows+Into+Light" <?php if($google_fonts=="Shadows+Into+Light" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Shadows Into Light', 'royal'); ?> </option>
                                    <option value="Shanti" <?php if($google_fonts=="Shanti" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Shanti', 'royal'); ?> </option>
                                    <option value="Short+Stack" <?php if($google_fonts=="Short+Stack" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Short Stack', 'royal'); ?> </option>
                                    <option value="Sigmar+One" <?php if($google_fonts=="Sigmar+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Sigmar One', 'royal'); ?> </option>
                                    <option value="Signika+Negative" <?php if($google_fonts=="Signika+Negative" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Signika Negative', 'royal'); ?> </option>
                                    <option value="Signika" <?php if($google_fonts=="Signika" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Signika', 'royal'); ?> </option>
                                    <option value="Six+Caps" <?php if($google_fonts=="Six+Caps" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Six Caps', 'royal'); ?> </option>
                                    <option value="Slackey" <?php if($google_fonts=="Slackey" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Slackey', 'royal'); ?> </option>
                                    <option value="Smokum" <?php if($google_fonts=="Smokum" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Smokum', 'royal'); ?> </option>
                                    <option value="Smythe" <?php if($google_fonts=="Smythe" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Smythe', 'royal'); ?> </option>
                                    <option value="Sniglet" <?php if($google_fonts=="Sniglet" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Sniglet', 'royal'); ?> </option>
                                    <option value="Snippet" <?php if($google_fonts=="Snippet" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Snippet', 'royal'); ?> </option>
                                    <option value="Sorts+Mill+Goudy" <?php if($google_fonts=="Sorts+Mill+Goudy" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Sorts Mill Goudy', 'royal'); ?> </option>
                                    <option value="Special+Elite" <?php if($google_fonts=="Special+Elite" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Special Elite', 'royal'); ?> </option>
                                    <option value="Spinnaker" <?php if($google_fonts=="Spinnaker" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Spinnaker', 'royal'); ?> </option>
                                    <option value="Spirax" <?php if($google_fonts=="Spirax" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Spirax', 'royal'); ?> </option>
                                    <option value="Stardos+Stencil" <?php if($google_fonts=="Stardos+Stencil" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Stardos Stencil', 'royal'); ?> </option>
                                    <option value="Sue+Ellen+Francisco" <?php if($google_fonts=="Sue+Ellen+Francisco" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Sue Ellen Francisco', 'royal'); ?> </option>
                                    <option value="Sunshiney" <?php if($google_fonts=="Sunshiney" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Sunshiney', 'royal'); ?> </option>
                                    <option value="Supermercado+One" <?php if($google_fonts=="Supermercado+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Supermercado One', 'royal'); ?> </option>
                                    <option value="Swanky+and+Moo+Moo" <?php if($google_fonts=="Swanky+and+Moo+Moo" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Swanky and Moo Moo', 'royal'); ?> </option>
                                    <option value="Syncopate" <?php if($google_fonts=="Syncopate" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Syncopate', 'royal'); ?> </option>
                                    <option value="Tangerine" <?php if($google_fonts=="Tangerine" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Tangerine', 'royal'); ?> </option>
                                    <option value="Tenor+Sans" <?php if($google_fonts=="Tenor+Sans" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Tenor Sans', 'royal'); ?> </option>
                                    <option value="Terminal+Dosis" <?php if($google_fonts=="Terminal+Dosis" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Terminal Dosis', 'royal'); ?> </option>
                                    <option value="The+Girl+Next+Door" <?php if($google_fonts=="The+Girl+Next+Door" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('The Girl Next Door', 'royal'); ?> </option>
                                    <option value="Tienne" <?php if($google_fonts=="Tienne" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Tienne', 'royal'); ?> </option>
                                    <option value="Tinos" <?php if($google_fonts=="Tinos" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Tinos', 'royal'); ?> </option>
                                    <option value="Tulpen+One" <?php if($google_fonts=="Tulpen+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Tulpen One', 'royal'); ?> </option>
                                    <option value="Ubuntu+Condensed" <?php if($google_fonts=="Ubuntu+Condensed" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Ubuntu Condensed', 'royal'); ?> </option>
                                    <option value="Ubuntu+Mono" <?php if($google_fonts=="Ubuntu+Mono" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Ubuntu Mono', 'royal'); ?> </option>
                                    <option value="Ubuntu" <?php if($google_fonts=="Ubuntu" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Ubuntu', 'royal'); ?> </option>
                                    <option value="Ultra" <?php if($google_fonts=="Ultra" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Ultra', 'royal'); ?> </option>
                                    <option value="UnifrakturCook" <?php if($google_fonts=="UnifrakturCook" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('UnifrakturCook', 'royal'); ?> </option>
                                    <option value="UnifrakturMaguntia" <?php if($google_fonts=="UnifrakturMaguntia" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('UnifrakturMaguntia', 'royal'); ?> </option>
                                    <option value="Unkempt" <?php if($google_fonts=="Unkempt" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Unkempt', 'royal'); ?> </option>
                                    <option value="Unlock" <?php if($google_fonts=="Unlock" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Unlock', 'royal'); ?> </option>
                                    <option value="Unna" <?php if($google_fonts=="Unna" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Unna', 'royal'); ?> </option>
                                    <option value="VT323" <?php if($google_fonts=="VT323" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('VT323', 'royal'); ?> </option>
                                    <option value="Varela+Round" <?php if($google_fonts=="Varela+Round" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Varela Round', 'royal'); ?> </option>
                                    <option value="Varela" <?php if($google_fonts=="Varela" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Varela', 'royal'); ?> </option>
                                    <option value="Vast+Shadow" <?php if($google_fonts=="Vast+Shadow" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Vast Shadow', 'royal'); ?> </option>
                                    <option value="Vibur" <?php if($google_fonts=="Vibur" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Vibur', 'royal'); ?> </option>
                                    <option value="Vidaloka" <?php if($google_fonts=="Vidaloka" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Vidaloka', 'royal'); ?> </option>
                                    <option value="Volkhov" <?php if($google_fonts=="Volkhov" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Volkhov', 'royal'); ?> </option>
                                    <option value="Vollkorn" <?php if($google_fonts=="Vollkorn" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Vollkorn', 'royal'); ?> </option>
                                    <option value="Voltaire" <?php if($google_fonts=="Voltaire" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Voltaire', 'royal'); ?> </option>
                                    <option value="Waiting+for+the+Sunrise" <?php if($google_fonts=="Waiting+for+the+Sunrise" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Waiting for the Sunrise', 'royal'); ?> </option>
                                    <option value="Wallpoet" <?php if($google_fonts=="Wallpoet" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Wallpoet', 'royal'); ?> </option>
                                    <option value="Walter+Turncoat" <?php if($google_fonts=="Walter+Turncoat" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Walter Turncoat', 'royal'); ?> </option>
                                    <option value="Wire+One" <?php if($google_fonts=="Wire+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Wire One', 'royal'); ?> </option>
                                    <option value="Yanone+Kaffeesatz" <?php if($google_fonts=="Yanone+Kaffeesatz" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Yanone Kaffeesatz', 'royal'); ?> </option>
                                    <option value="Yellowtail" <?php if($google_fonts=="Yellowtail" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Yellowtail', 'royal'); ?> </option>
                                    <option value="Yeseva+One" <?php if($google_fonts=="Yeseva+One" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Yeseva One', 'royal'); ?> </option>
                                    <option value="Zeyada" <?php if($google_fonts=="Zeyada" ){ echo "selected='selected'" ; } ?>>
                                        <?php _e('Zeyada', 'royal'); ?> </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Background Color', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge color" name="back-color" value="<?php echo osc_esc_html( osc_get_preference('back-color', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Font a Color', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge color" name="a-color" value="<?php echo osc_esc_html( osc_get_preference('a-color', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Title and Price', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge color" name="b-color" value="<?php echo osc_esc_html( osc_get_preference('b-color', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Font Menu and Footer', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge color" name="a2-color" value="<?php echo osc_esc_html( osc_get_preference('a2-color', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Theme Color', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge color" name="theme-color" value="<?php echo osc_esc_html( osc_get_preference('theme-color', 'royal') ); ?>"> </div>
                        </div>
                    </div>
                </div>
                <!-- # plugins -->
                <div id="plugins">
                    <h2 class="render-title"><?php _e('Plugin settings', 'royal'); ?></h2>
                    <div class="form-horizontal">
                    <div class="form-row">
                            <div class="form-label">
                                <b><?php _e('Phone in Publish Ads', 'royal'); ?></b> </div>
                            <div class="form-controls">
                                <div class="form-label-checkbox">

                                    <div class="help-box">
                                        <p>
                                            <a style="color:red;">
                                                <?php _e('Warning', 'royal'); ?> </a>
                                            <?php _e('you must install phone plugin, before activate this features', 'royal'); ?><br><?php _e('Download here', 'royal'); ?> <a style="color:blue;" href="http://market.osclass.org/plugins/attributes/telephone-plugin_507" target="_blank">http://market.osclass.org/plugins/attributes/telephone-plugin_507</a> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label"><b><?php _e('Madhouse Avatar', 'royal'); ?></b> </div>

                            <div class="form-controls">
                                <p>
                                    <a style="color:red;">
                                        <?php _e('Warning', 'royal'); ?> </a>
                                    <?php _e('you must install madhouse avatar plugin, before activate madhouse avatar', 'royal'); ?> <br><?php _e('Download here', 'royal'); ?> <a target="_blank" href="http://market.osclass.org/plugins/user-management/madhouse-avatar_187" style="color:blue;">http://market.osclass.org/plugins/user-management/madhouse-avatar_187</a></p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label"><b><?php _e('HybridAuth', 'royal'); ?></b> </div>

                            <div class="form-controls">
                                <p>
                                    <a style="color:red;">
                                        <?php _e('Warning', 'royal'); ?> </a>
                                    <?php _e('you must install HybridAuth  plugin, before activate', 'royal'); ?><br><?php _e('Download here', 'royal'); ?>  <a target="_blank" href="http://market.osclass.org/plugins/social-networks/hybridauth_336" style="color:blue;">http://market.osclass.org/plugins/social-networks/hybridauth_336</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- # more starts -->
                <div id="more">

                    <div class="form-horizontal">
<h2 class="render-title"><?php _e('External links Menu', 'royal'); ?></h2>
                        <div class="form-row">
                            <div class="form-label"><b><?php _e('Menu text', 'royal'); ?></b> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="blog-text" placeholder="<?php echo osc_esc_html(__('Blogs','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('blog-text', 'royal') ); ?>"> </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Menu Link', 'royal'); ?> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="blog-links" placeholder="<?php echo osc_esc_html(__('http://your-link.com','royal')); ?>" value="<?php echo osc_esc_html( osc_get_preference('blog-links', 'royal') ); ?>"> </div>
                        </div>
                        <h1 class="render-title separate-top"><?php _e('More settings', 'royal'); ?></h1>
                        <div class="form-row">
                            <div class="form-label"><b><?php _e('Terms of Use', 'royal'); ?></b> </div>
                            <div class="form-controls">
                                <input type="text" class="xlarge" name="tos-me" placeholder="http://your-link.com" value="<?php echo osc_esc_html( osc_get_preference('tos-me', 'royal') ); ?>"> </div>
                            <div class="form-controls">
                                <p>
                                    <?php _e('create new pages TOS and copy url here', 'royal'); ?> </p>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-label"><b><?php _e('Custom Home HTML (display)', 'royal'); ?></b> </div>
                            <div class="form-controls">
                                <?php $ph_royal=osc_esc_html( osc_get_preference('phone-us', 'royal') ); ?>
                                <select name="phone-us">
                                    <option value="yes" <?php if($ph_royal=='yes' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('Yes', 'royal'); ?> </option>
                                    <option value="none" <?php if($ph_royal=='none' ){ echo 'selected="selected"' ; } ?>>
                                        <?php _e('No', 'royal'); ?> </option>
                                </select>
                            </div>
                            <div class="form-controls">
                                <p>
                                    <?php _e('you can customize html code on home', 'royal'); ?> </p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-label">
                                <?php _e('Custom Home HTML', 'royal'); ?> </div>
                            <div class="form-controls">
                                <textarea class="cantiki" name="memo-us" placeholder="<?php echo osc_esc_html(__('insert your text or html code','royal')); ?>"><?php echo osc_esc_html( osc_get_preference('memo-us', 'royal') ); ?></textarea>
                    <br/>
                    <div class="help-box"><?php _e('you can costumize html on home under slider.', 'royal'); ?></div>
                </div>
            </div>


                  </div>


		 </div>


          </div>

<div class="form-actions">
		<input type="submit" value="<?php echo osc_esc_html(__('Save changes', 'royal')); ?>" class="btn btn-submit"> </div>
        </fieldset>
    </form>
    </div>
    <div class="power">
        <p><?php _e('Royal', 'royal'); ?> <?php _e('version', 'royal'); ?> <?php _e('1.6.0', 'royal'); ?> | <?php _e('by', 'royal'); ?>
            <a title="<?php echo osc_esc_html(__('Royal','royal')); ?> <?php echo osc_esc_html(__('Themes Powered by OsclassDotMe','royal')); ?>" target="_blank" href="http://market.osclass.org/user/profile/2614">
                <?php _e('Osclass.Me', 'royal'); ?> </a>
        </p>
    </div>
