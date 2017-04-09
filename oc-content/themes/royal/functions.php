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

    define('ROYAL_THEME_VERSION', '1.6.0');
    osc_enqueue_style('font-awesome', osc_current_web_theme_url('css/css/font-awesome.min.css'));
    osc_enqueue_script('php-date');

    if( !OC_ADMIN ) {
        if( !function_exists('add_close_button_action') ) {
            function add_close_button_action(){
                echo '<script type="text/javascript">';
                    echo '$(".flashmessage .ico-close").click(function(){';
                        echo '$(this).parent().hide();';
                    echo '});';
                echo '</script>';
            }
            osc_add_hook('footer', 'add_close_button_action');
        }
    }

if( !osc_get_preference('google_fonts', 'royal_theme') ) {
		osc_set_preference('google_fonts', 'Actor', 'royal_theme');
	}

function royal_add_google_fonts(){
	echo "<link href='https://fonts.googleapis.com/css?family=".royal_google_fonts()."' rel='stylesheet' type='text/css'>";
	echo "<style>body, .thumbnail .caption,h1, h2, h3, h4, h5, h6, .listings h2 a, .listing-attr .currency-value, input[type=text], input[type=password], textarea, select, div.fancy-select div.trigger, .main-search label {
	font-family: '".str_replace('+',' ',royal_google_fonts())."', sans-serif;
}
</style>";
	}	

    function theme_royal_actions_admin() {
        if( Params::getParam('file') == 'oc-content/themes/royal/admin/settings.php' ) {
            if( Params::getParam('donation') == 'successful' ) {
                osc_set_preference('donation', '1', 'royal');
                osc_reset_preferences();
            }
        }

        switch( Params::getParam('action_specific') ) {
            case('settings'):
                $font_view   =	Params::getParam('font_view', 'royal_theme');
                $footerLink  = Params::getParam('footer_link');
                $defaultLogo = Params::getParam('default_logo');
                $sect77_view   =   Params::getParam('sect77_view', 'royal_theme');
                $sect4_view   =   Params::getParam('sect4_view', 'royal_theme');
                $multi_view   =   Params::getParam('multi_view', 'royal_theme');
                $sect5_view   =   Params::getParam('sect5_view', 'royal_theme');

                osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'royal');
                osc_set_preference('footer_link', ($footerLink ? '1' : '0'), 'royal');
                osc_set_preference('default_logo', ($defaultLogo ? '1' : '0'), 'royal');
                osc_set_preference('font_view', ($font_view ? '1' : '0'), 'royal_theme');
                osc_set_preference('sect4_view', ($sect4_view ? '1' : '0'), 'royal_theme');
                osc_set_preference('sect77_view', ($sect77_view ? '1' : '0'), 'royal_theme');
                osc_set_preference('multi_view', ($multi_view ? '1' : '0'), 'royal_theme');

                osc_set_preference('sect5_view', ($sect5_view ? '1' : '0'), 'royal_theme');
                osc_set_preference('google_fonts', Params::getParam('google_fonts'), 'royal_theme');
                osc_set_preference('header-royal',         trim(Params::getParam('header-royal', false, false, false)),                  'royal');
                osc_set_preference('home-royal',         trim(Params::getParam('home-royal', false, false, false)),                  'royal');
                osc_set_preference('katalog-royal',         trim(Params::getParam('katalog-royal', false, false, false)),                  'royal');
                osc_set_preference('footer-royal',         trim(Params::getParam('footer-royal', false, false, false)),                  'royal');

                osc_set_preference('single-royal',         trim(Params::getParam('single-royal', false, false, false)),                  'royal');
                osc_set_preference('color-royal',         trim(Params::getParam('color-royal', false, false, false)),                  'royal');
                osc_set_preference('copyright-royal',         trim(Params::getParam('copyright-royal', false, false, false)),                  'royal');
                osc_set_preference('company-us',         trim(Params::getParam('company-us', false, false, false)),                  'royal');
                osc_set_preference('email-us',         trim(Params::getParam('email-us', false, false, false)),                  'royal');
                osc_set_preference('phone-us',         trim(Params::getParam('phone-us', false, false, false)),                  'royal');
                osc_set_preference('price1-us',         trim(Params::getParam('price1-us', false, false, false)),                  'royal');
                osc_set_preference('price2-us',         trim(Params::getParam('price2-us', false, false, false)),                  'royal');
                osc_set_preference('price3-us',         trim(Params::getParam('price3-us', false, false, false)),                  'royal');
                osc_set_preference('price4-us',         trim(Params::getParam('price4-us', false, false, false)),                  'royal');
                osc_set_preference('price5-us',         trim(Params::getParam('price5-us', false, false, false)),                  'royal');                            
                
                osc_set_preference('price6-us',         trim(Params::getParam('price6-us', false, false, false)),                  'royal');
                osc_set_preference('price7-us',         trim(Params::getParam('price7-us', false, false, false)),                  'royal');
                osc_set_preference('price8-us',         trim(Params::getParam('price8-us', false, false, false)),                  'royal');
                osc_set_preference('price9-us',         trim(Params::getParam('price9-us', false, false, false)),                  'royal');
                osc_set_preference('price10-us',         trim(Params::getParam('price10-us', false, false, false)),                  'royal');  
                osc_set_preference('blog-text',         trim(Params::getParam('blog-text', false, false, false)),                  'royal');
                osc_set_preference('blog-links',         trim(Params::getParam('blog-links', false, false, false)),                  'royal');
                osc_set_preference('price11-us',         trim(Params::getParam('price11-us', false, false, false)),                  'royal');
                osc_set_preference('price12-us',         trim(Params::getParam('price12-us', false, false, false)),                  'royal');
                osc_set_preference('price13-us',         trim(Params::getParam('price13-us', false, false, false)),                  'royal');
                osc_set_preference('price14-us',         trim(Params::getParam('price14-us', false, false, false)),                  'royal');
                osc_set_preference('price15-us',         trim(Params::getParam('price15-us', false, false, false)),                  'royal'); 

                osc_set_preference('brand1-link',         trim(Params::getParam('brand1-link', false, false, false)),                  'royal');
                osc_set_preference('brand2-link',         trim(Params::getParam('brand2-link', false, false, false)),                  'royal');
                osc_set_preference('brand3-link',         trim(Params::getParam('brand3-link', false, false, false)),                  'royal');
                osc_set_preference('brand4-link',         trim(Params::getParam('brand4-link', false, false, false)),                  'royal');
                osc_set_preference('brand5-link',         trim(Params::getParam('brand5-link', false, false, false)),                  'royal');
                osc_set_preference('brand6-link',         trim(Params::getParam('brand6-link', false, false, false)),                  'royal');
                osc_set_preference('brand7-link',         trim(Params::getParam('brand7-link', false, false, false)),                  'royal');
                osc_set_preference('brand8-link',         trim(Params::getParam('brand8-link', false, false, false)),                  'royal');
   
                osc_set_preference('widget1-royal',         trim(Params::getParam('widget1-royal', false, false, false)),                  'royal');
                osc_set_preference('widget2-royal',         trim(Params::getParam('widget2-royal', false, false, false)),                  'royal');
                osc_set_preference('address-us',         trim(Params::getParam('address-us', false, false, false)),                  'royal');
                osc_set_preference('judul1-royal',         trim(Params::getParam('judul1-royal', false, false, false)),                  'royal');
                osc_set_preference('judul2-royal',         trim(Params::getParam('judul2-royal', false, false, false)),                  'royal');
                osc_set_preference('judul3-royal',         trim(Params::getParam('judul3-royal', false, false, false)),                  'royal');
                osc_set_preference('judul4-royal',         trim(Params::getParam('judul4-royal', false, false, false)),                  'royal');
                osc_set_preference('widget3-royal',         trim(Params::getParam('widget3-royal', false, false, false)),                  'royal');
                osc_set_preference('widget4-royal',         trim(Params::getParam('widget4-royal', false, false, false)),                  'royal');

                osc_set_preference('memo-us',         trim(Params::getParam('memo-us', false, false, false)),                  'royal');
                osc_set_preference('ari-us',         trim(Params::getParam('ari-us', false, false, false)),                  'royal');
                osc_set_preference('vera-us',         trim(Params::getParam('vera-us', false, false, false)),                  'royal');
                osc_set_preference('slider1-royal',         trim(Params::getParam('slider1-royal', false, false, false)),                  'royal');
                osc_set_preference('slider2-royal',         trim(Params::getParam('slider2-royal', false, false, false)),                  'royal');
                osc_set_preference('slider3-royal',         trim(Params::getParam('slider3-royal', false, false, false)),                  'royal');
                osc_set_preference('slider12-link',         trim(Params::getParam('slider12-link', false, false, false)),                  'royal');
                osc_set_preference('slider22-link',         trim(Params::getParam('slider22-link', false, false, false)),                  'royal');
                osc_set_preference('slider32-link',         trim(Params::getParam('slider32-link', false, false, false)),                  'royal');
                osc_set_preference('slider42-link',         trim(Params::getParam('slider42-link', false, false, false)),                  'royal');
                osc_set_preference('facebook-us',         trim(Params::getParam('facebook-us', false, false, false)),                  'royal');
                osc_set_preference('instagram-us',         trim(Params::getParam('instagram-us', false, false, false)),                  'royal');
                osc_set_preference('twitter-us',         trim(Params::getParam('twitter-us', false, false, false)),                  'royal');
                osc_set_preference('gplus-us',         trim(Params::getParam('gplus-us', false, false, false)),                  'royal');
                osc_set_preference('linkedin-us',         trim(Params::getParam('linkedin-us', false, false, false)),                  'royal');
                osc_set_preference('wl-us',         trim(Params::getParam('wl-us', false, false, false)),                  'royal');
                osc_set_preference('fb-code',         trim(Params::getParam('fb-code', false, false, false)),                  'royal');
                osc_set_preference('back-color',         trim(Params::getParam('back-color', false, false, false)),                  'royal');

                osc_set_preference('defaultShowAs@all', Params::getParam('defaultShowAs@all'), 'royal_theme');
                osc_set_preference('defaultShowAs@search', Params::getParam('defaultShowAs@all'));

                osc_set_preference('popular-royal',         trim(Params::getParam('popular-royal', false, false, false)),                  'royal');
                osc_set_preference('theme-color',         trim(Params::getParam('theme-color', false, false, false)),                  'royal');

                osc_set_preference('a-color',         trim(Params::getParam('a-color', false, false, false)),                  'royal');
                osc_set_preference('b-color',         trim(Params::getParam('b-color', false, false, false)),                  'royal');
                osc_set_preference('a2-color',         trim(Params::getParam('a2-color', false, false, false)),                  'royal');
                osc_set_preference('product-royal',         trim(Params::getParam('product-royal', false, false, false)),                  'royal');
                osc_set_preference('premium-royal',         trim(Params::getParam('premium-royal', false, false, false)),                  'royal');

                osc_set_preference('tos-me',         trim(Params::getParam('tos-me', false, false, false)),                  'royal');
                osc_set_preference('header-728x90',         trim(Params::getParam('header-728x90', false, false, false)),                  'royal');
                osc_set_preference('homepage-728x90',       trim(Params::getParam('homepage-728x90', false, false, false)),                'royal');
                osc_set_preference('sidebar-160x600',       trim(Params::getParam('sidebar-160x600', false, false, false)),                'royal');
                osc_set_preference('sidebar-300x250',       trim(Params::getParam('sidebar-300x250', false, false, false)),                'royal');

                osc_set_preference('search-results-top-728x90',     trim(Params::getParam('search-results-top-728x90', false, false, false)),          'royal');
                osc_set_preference('premiumads_num_royal',  trim(Params::getParam('premiumads_num_royal', false, false, false)),       'royal');
                osc_add_flash_ok_message(__('Theme settings updated correctly', 'royal'), 'admin');
                header('Location: ' . osc_admin_render_theme_url('oc-content/themes/royal/admin/settings.php')); exit;
            break;

//upload
			case('up_category'):
			$package = Params::getFiles('set_image');
			$idt = $_POST['id_category'];
			if( $package['error'] == UPLOAD_ERR_OK ) {
				if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/category/".$idt.".png" ) ) {
					osc_add_flash_ok_message(__('The image has been uploaded correctly', 'royal'), 'admin');
                    } else {
					osc_add_flash_error_message(__("An error has occurred, please try again", 'royal'), 'admin');
				}
                } else {
				osc_add_flash_error_message(__("An error has occurred, please try again", 'royal'), 'admin');
			}
			header('Location: ' . osc_admin_render_theme_url('oc-content/themes/royal/admin/images.php')); exit;
            break;		
			//remove
			case('remove_category'):
			$id_remove = $_POST['id_remove'];
			if(file_exists (osc_themes_path() . 'royal/images/category/' . $id_remove . '.png') ) {
				@unlink(osc_themes_path() . 'royal/images/category/' . $id_remove . '.png') ;
				osc_add_flash_ok_message(__('The image has been removed', 'royal'), 'admin');
                } else {
				osc_add_flash_error_message(__("Image not found", 'royal'), 'admin');
			}
			header('Location: ' . osc_admin_render_theme_url('oc-content/themes/royal/admin/images.php')); exit;
            break;
            
       
        }
    }
if( !function_exists('royal_show_as') ){
        function royal_show_as(){

            $p_sShowAs    = Params::getParam('sShowAs');
            $aValidShowAsValues = array('list', 'gallery');
            if (!in_array($p_sShowAs, $aValidShowAsValues)) {
                $p_sShowAs = royal_default_show_as();
            }

            return $p_sShowAs;
        }
    }
    if( !function_exists('royal_default_show_as') ){
        function royal_default_show_as(){
            return getPreference('defaultShowAs@all','royal_theme');
        }
    }

 if( !function_exists('royal_search_number') ) {
        /**
          *
          * @return array
          */
        function royal_search_number() {
            $search_from = ((osc_search_page() * osc_default_results_per_page_at_search()) + 1);
            $search_to   = ((osc_search_page() + 1) * osc_default_results_per_page_at_search());
            if( $search_to > osc_search_total_items() ) {
                $search_to = osc_search_total_items();
            }

            return array(
                'from' => $search_from,
                'to'   => $search_to,
                'of'   => osc_search_total_items()
            );
        }
    }

if( !function_exists('royal_item_title') ) {
        function royal_item_title() {
            $title = osc_item_title();
            foreach( osc_get_locales() as $locale ) {
                if( Session::newInstance()->_getForm('title') != "" ) {
                    $title_ = Session::newInstance()->_getForm('title');
                    if( @$title_[$locale['pk_c_code']] != "" ){
                        $title = $title_[$locale['pk_c_code']];
                    }
                }
            }
            return $title;
        }
    }
    if( !function_exists('royal_item_description') ) {
        function royal_item_description() {
            $description = osc_item_description();
            foreach( osc_get_locales() as $locale ) {
                if( Session::newInstance()->_getForm('description') != "" ) {
                    $description_ = Session::newInstance()->_getForm('description');
                    if( @$description_[$locale['pk_c_code']] != "" ){
                        $description = $description_[$locale['pk_c_code']];
                    }
                }
            }
            return $description;
        }
    }



    if( !function_exists('logo_header') ) {
        function logo_header() {
            $html = '<img border="0" alt="'.osc_esc_html( osc_page_title() ).'" src="' . osc_current_web_theme_url('images/logo.jpg') . '" />';
            if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                return $html;
            } else if( osc_get_preference('default_logo', 'royal') && (file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/default-logo.jpg")) ) {
                return '<img border="0" alt="'.osc_esc_html( osc_page_title() ).'" src="' . osc_current_web_theme_url('images/default-logo.jpg') . '" />';
            } else {
                return osc_page_title();
            }
        }
    }

    // install update options
    if( !function_exists('royal_theme_install') ) {
        function royal_theme_install() {
            osc_set_preference('keyword_placeholder', __('ie. PHP Programmer', 'royal'), 'royal');
            osc_set_preference('version', '1.6.0', 'royal');
            osc_set_preference('footer_link', true, 'royal');
            osc_set_preference('donation', '0', 'royal');

            osc_set_preference('default_logo', '1', 'royal');
            osc_set_preference('home-royal', 'home1', 'royal');
            osc_set_preference('footer-royal', 'footer2', 'royal');
            osc_set_preference('google_fonts', 'Actor', 'royal_theme');
            osc_set_preference('price1-us', '<h3>Free</h3><p>per month</p>', 'royal');
            osc_set_preference('price2-us', '<h4>Publish Ads</h4><p>Publish ads for free</p>', 'royal');
            osc_set_preference('price3-us', '<li>30 days</li><li>max 5 images</li><li>Standart Listings</li>', 'royal');
            osc_set_preference('price4-us', 'Detail', 'royal');

            osc_set_preference('price6-us', '<h3>10 $</h3><p>per month</p>', 'royal');
            osc_set_preference('price7-us', '<h4>Premium Ads</h4><p>Premium ads for 30 days</p>', 'royal');
            osc_set_preference('price8-us', '<li>Premium Label</li><li>On Top Searching</li><li>More Buyer</li>', 'royal');
            osc_set_preference('price9-us', 'Detail', 'royal');

            osc_set_preference('price11-us', '<h3>5 $</h3><p>per month</p>', 'royal');
            osc_set_preference('price12-us', '<h4>Highlight</h4><p>Yellow background</p>', 'royal');
            osc_set_preference('price13-us', '<li>Background Highlight</li><li>Make unique</li><li>More buyer</li>', 'royal');
            osc_set_preference('price14-us', 'Detail', 'royal');
                        
            osc_set_preference('color-royal', 'default', 'royal');
            osc_set_preference('email-us', 'yes', 'royal');
            osc_set_preference('judul1-royal', 'widget title 1', 'royal');
            osc_set_preference('judul2-royal', 'widget title 2', 'royal');
            osc_set_preference('judul3-royal', 'widget title 3', 'royal');
            osc_set_preference('judul4-royal', 'widget title 4', 'royal');
            osc_set_preference('blog-text', 'Blogs', 'royal');
            osc_set_preference('widget1-royal', 'insert your widget', 'royal');
            osc_set_preference('widget2-royal', 'insert your widget', 'royal');
            osc_set_preference('widget3-royal', 'insert your widget', 'royal');
            osc_set_preference('widget4-royal', 'insert your widget', 'royal');

            osc_set_preference('slider1-royal', 'Welcome to Classified Site', 'royal');
            osc_set_preference('slider2-royal', 'Buy and sell product for fast easy and free', 'royal');
            osc_set_preference('slider3-royal', 'Buy and sell product for fast easy and free', 'royal');
            osc_set_preference('popular-royal', 'yes', 'royal');
            osc_set_preference('fb-us', 'none', 'royal');
            osc_set_preference('ari-us', 'container', 'royal');
            osc_set_preference('wl-us', 'none', 'royal');
            osc_set_preference('avatar-royal', 'no', 'royal');
            osc_set_preference('a-color', '#173199', 'royal');
            osc_set_preference('b-color', '#FA7722', 'royal');
            osc_set_preference('a2-color', '#555555', 'royal');
            osc_set_preference('theme-color', '#f8f8f8', 'royal');
            osc_set_preference('premium-royal', 'yes', 'royal');
            osc_set_preference('product-royal', 'yes', 'royal');
            osc_set_preference('phone-us', 'none', 'royal');
            osc_set_preference('header-royal', 'header1', 'royal');
             osc_set_preference('katalog-royal', 'slider', 'royal');
            osc_set_preference('single-royal', 'single3', 'royal');

            osc_set_preference('copyright-royal', 'Copyright 2016 Osclass.me', 'royal');
            osc_set_preference('premiumads_num_royal', '8', 'royal');
            osc_set_preference('sect77_view', '0', 'royal_theme');
            osc_set_preference('multi_view', '0', 'royal_theme');
            osc_set_preference('font_view', '1', 'royal_theme');
            osc_reset_preferences();
        }
    }


if( !function_exists('logo_footer') ) {
        function logo_footer() {

             $html = '<link href="' . osc_current_web_theme_url('images/favicon.jpg') . '" rel="shortcut icon">';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/favicon.jpg" ) ) {
                return $html;
             } else {
                return '<link href="' . osc_current_web_theme_url('images/favicon.png') . '" rel="shortcut icon">';

            }
        }
    }

if( !function_exists('logo_slider') ) {
        function logo_slider() {

             $html = ' <div class="item active"><a href="'.osc_get_preference('slider12-link', 'royal').'"><img src="' . osc_current_web_theme_url('images/slider.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

if( !function_exists('logo_slider_1') ) {
        function logo_slider_1() {

             $html = '<div class="item">
                    <a href="'.osc_get_preference('slider22-link', 'royal').'"><img src="' . osc_current_web_theme_url('images/slider-1.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider-1.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }



if( !function_exists('logo_slider_2') ) {
        function logo_slider_2() {

             $html = '<div class="item">
                    <a href="'.osc_get_preference('slider32-link', 'royal').'"><img src="' . osc_current_web_theme_url('images/slider-2.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider-2.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

if( !function_exists('logo_slider_3') ) {
        function logo_slider_3() {

             $html = '<div class="item">
                    <a href="'.osc_get_preference('slider42-link', 'royal').'"><img src="' . osc_current_web_theme_url('images/slider-3.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider-3.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
}

if( !function_exists('logo_cover_2') ) {
        function logo_cover_2() {

             $html = '<img src="' . osc_current_web_theme_url('images/cover.jpg') . '" />';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/cover.jpg" ) ) {
                return $html;
             } else {
                return '<img src="' . osc_current_web_theme_url('images/slider.jpg') . '" />';

            }
        }
    }

// slider images

if( !function_exists('logo_slider') ) {
        function logo_slider() {

             $html = '<div class="item"><a href="'.osc_get_preference('slider12-link', 'hero').'"><img title="'.osc_esc_html( osc_get_preference('slider1-us', 'hero') ).'" alt="'.osc_esc_html( osc_get_preference('slider1-us', 'hero') ).'" src="' . osc_current_web_theme_url('images/slider/slider11.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider/slider11.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

if( !function_exists('logo_slider_1') ) {
        function logo_slider_1() {

             $html = '<div class="item"><a href="'.osc_get_preference('slider22-link', 'hero').'"><img title="'.osc_esc_html( osc_get_preference('slider2-us', 'hero') ).'" alt="'.osc_esc_html( osc_get_preference('slider2-us', 'hero') ).'" src="' . osc_current_web_theme_url('images/slider/slider22.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider/slider22.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

if( !function_exists('logo_slider_2') ) {
        function logo_slider_2() {

             $html = '<div class="item"><a href="'.osc_get_preference('slider32-link', 'hero').'"><img title="'.osc_esc_html( osc_get_preference('slider3-us', 'hero') ).'" alt="'.osc_esc_html( osc_get_preference('slider3-us', 'hero') ).'" src="' . osc_current_web_theme_url('images/slider/slider33.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider/slider33.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }
if( !function_exists('logo_slider_3') ) {
        function logo_slider_3() {

             $html = '<div class="item"><a href="'.osc_get_preference('slider42-link', 'hero').'"><img title="'.osc_esc_html( osc_get_preference('slider4-us', 'hero') ).'" alt="'.osc_esc_html( osc_get_preference('slider4-us', 'hero') ).'" src="' . osc_current_web_theme_url('images/slider/slider44.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider/slider44.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

// background images

if( !function_exists('logo_slider_4') ) {
        function logo_slider_4() {

             $html = '<img src="' . osc_current_web_theme_url('css/img/background.jpg') . '" />';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "css/img/background.jpg" ) ) {
                return $html;
             } else {
                return '<img src="' . osc_current_web_theme_url('css/img/0.jpg') . '" />';

            }
        }
    }

//brand images

if( !function_exists('brand_1') ) {
        function brand_1() {

             $html = '<div class="item"><a href="'.osc_get_preference('brand1-link', 'royal').'"><img src="' . osc_current_web_theme_url('images/brand/1.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/1.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

if( !function_exists('brand_2') ) {
        function brand_2() {

             $html = '<div class="item"><a href="'.osc_get_preference('brand2-link', 'royal').'"><img src="' . osc_current_web_theme_url('images/brand/2.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/2.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

if( !function_exists('brand_3') ) {
        function brand_3() {

             $html = '<div class="item"><a href="'.osc_get_preference('brand3-link', 'royal').'"><img src="' . osc_current_web_theme_url('images/brand/3.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/3.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

if( !function_exists('brand_4') ) {
        function brand_4() {

             $html = '<div class="item"><a href="'.osc_get_preference('brand4-link', 'royal').'"><img src="' . osc_current_web_theme_url('images/brand/4.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/4.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

if( !function_exists('brand_5') ) {
        function brand_5() {

             $html = '<div class="item"><a href="'.osc_get_preference('brand5-link', 'royal').'"><img src="' . osc_current_web_theme_url('images/brand/5.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/5.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

if( !function_exists('brand_6') ) {
        function brand_6() {

             $html = '<div class="item"><a href="'.osc_get_preference('brand6-link', 'royal').'"><img src="' . osc_current_web_theme_url('images/brand/6.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/6.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

if( !function_exists('brand_7') ) {
        function brand_7() {

             $html = '<div class="item"><a href="'.osc_get_preference('brand7-link', 'royal').'"><img src="' . osc_current_web_theme_url('images/brand/7.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/7.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

if( !function_exists('brand_8') ) {
        function brand_8() {

             $html = '<div class="item"><a href="'.osc_get_preference('brand8-link', 'royal').'"><img src="' . osc_current_web_theme_url('images/brand/8.jpg') . '" /></a></div>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/brand/8.jpg" ) ) {
                return $html;
             } else {
                return '';

            }
        }
    }

function royal_regions_select($name, $id, $label)
{
	$aRegions = SelectRegion::newInstance()->listActive(); 
	if(count($aRegions) > 0 ) { 
		$html  = '<select class="ima" name="'.$name.'" id="'.$id.'">';
		$html .= '<option value="">'.$label.'</option>';
		foreach($aRegions as $region) { 
			$html .= '<option value="'. $region['s_name'].'">'. $region['s_name'].'</option>';
		} 
		$html .= '</select>';
	} 

	echo $html;
}


if( !function_exists('osc_search_number') ) {
        /**
          *
          * @return array
          */
        function osc_search_number() {
            $search_from = ((osc_search_page() * osc_default_results_per_page_at_search()) + 1);
            $search_to   = ((osc_search_page() + 1) * osc_default_results_per_page_at_search());
            if( $search_to > osc_search_total_items() ) {
                $search_to = osc_search_total_items();
            }

            return array(
                'from' => $search_from,
                'to'   => $search_to,
                'of'   => osc_search_total_items()
            );
        }
    }

 function chosen_select_standard() {
        View::newInstance()->_exportVariableToView('categories', Category::newInstance()->toTree() ) ;

        if( osc_count_categories() > 0 ) {
            echo '<select name="sCategory" class="anita" data-placeholder="'.osc_esc_html( __('Select a category', 'royal') ).'" class="ima">' ;
            echo '<option value="">' . __('Select a category', 'royal') . '</option>' ;
            while( osc_has_categories() ) {
                echo '<option class="opt1" value="'.osc_esc_html( osc_category_id() ).'">' . osc_category_name() . '</option>' ;
                if( osc_count_subcategories() > 0 ) {
                    while( osc_has_subcategories() ) {
                        echo '<option class="level-1" value="'.osc_esc_html( osc_category_id() ).'">&nbsp;&nbsp;&nbsp;' . osc_category_name() . '</option>' ;
                    }
                }
            }
            echo '</select>' ;
        }

        View::newInstance()->_erase('categories') ;
    }

    function chosen_select_optgroup() {
        View::newInstance()->_exportVariableToView('categories', Category::newInstance()->toTree() ) ;

        if( osc_count_categories() > 0 ) {
            echo '<select name="sCategory" id="royal_sCategory_chosen" data-placeholder="'.osc_esc_html( __('Select a category', 'royal') ).'" class="ima">' ;
            echo '<option>' . __('Select a category', 'royal') . '</option>' ;
            while( osc_has_categories() ) {
                echo '<optgroup label="' . osc_category_name() . '">' ;
                if( osc_count_subcategories() > 0 ) {
                    while( osc_has_subcategories() ) {
                        echo '<option value="'.osc_esc_html( osc_category_id() ).'">' . osc_category_name() . '</option>' ;
                    }
                }
                echo '</optgroup>' ;
            }
            echo '</select>' ;
        }

        View::newInstance()->_erase('categories') ;
    }

    function chosen_region_select() {
        View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '>=', 'region_name ASC') ) ;
 if( osc_count_list_regions() > 0 ) {
        
            echo '<select name="sRegion" id="royal_sCategory_chosen" class="ima" >' ;
            echo '<option value="">' . __('Select a region...', 'royal') . '</option>' ;
            while( osc_has_list_regions() ) {
                echo '<option value="'.osc_esc_html( osc_list_region_name() ).'">' . osc_list_region_name() . '</option>' ;
            }
            echo '</select>' ;
        }

        View::newInstance()->_erase('list_regions') ;
    }

    if( !function_exists('item_detail_location') ) {
        /*
         * @return array the list of location: starting with the address and finishing with the country
         */
        function item_detail_location() {
            $location = array() ;
            if( osc_item_address() != '' ) {
                $location[] = osc_item_address() ;
            }
            if( osc_item_city_area() != '' ) {
                $location[] = osc_item_city_area() ;
            }
            if( osc_item_city() != '' ) {
                $location[] = osc_item_city() ;
            }
            if( osc_item_region() != '' ) {
                $location[] = osc_item_region() ;
            }
            if( osc_item_country() != '' ) {
                $location[] = osc_item_country() ;
            }

            return $location ;
        }
    }

function royal_redirect_user_dashboard()
    {
        if( (Rewrite::newInstance()->get_location() === 'user') && (Rewrite::newInstance()->get_section() === 'dashboard') ) {
            header('Location: ' .osc_user_list_items_url());
            exit;
        }
}

//related listings
	if( !function_exists('related_listings') ) {
        function related_listings() {
		    $related_number = 6;
            View::newInstance()->_exportVariableToView('items', array());
			
            $mSearch = new Search();
            $mSearch->addCategory(osc_item_category_id());
            $mSearch->addRegion(osc_item_region());
            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id < %s ", DB_TABLE_PREFIX, osc_item_id()));
            $mSearch->limit(0, $related_number);
			
            $aItems      = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems == 3 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
			}
            unset($mSearch);
			
            $mSearch = new Search();
            $mSearch->addCategory(osc_item_category_id());
            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id != %s ", DB_TABLE_PREFIX, osc_item_id()));
            $mSearch->limit(0, $related_number);
			
            $aItems = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems > 0 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
			}
            unset($mSearch);
			
            return 0;
		}
	}


if( !function_exists('royal_show_flash_message') ) {
        function royal_show_flash_message() {
            $message = Session::newInstance()->_getMessage('pubMessages') ;

            if (isset($message['msg']) && $message['msg'] != '') {
                if( $message['type'] == 'ok' ) $message['type'] = 'success' ;
                echo '<div class="alert-message ' . $message['type'] . '">' ;
                echo '<a class="close" href="#">×</a>';
                echo '<p>' . $message['msg'] . '</p>';
                echo '</div>' ;

                Session::newInstance()->_dropMessage('pubMessages') ;
            }
        }
    }

function arabic_language_direction(){
		$rtllang = array('ar_SY','he_HE','fa_IR');
		if(in_array(osc_current_user_locale(), $rtllang)){
			return 'rtl';
		}else{
			return 'ltr';
		}
	}


if (royal_is_fineuploader()) {
    if (!OC_ADMIN) {
        osc_enqueue_style('fine-uploader-css', osc_current_web_theme_styles_url('fineuploader.css'));
    }
    osc_enqueue_script('jquery-fineuploader');
}

function royal_is_fineuploader() {
    return Scripts::newInstance()->registered['jquery-fineuploader'] && method_exists('ItemForm', 'ajax_photos');
}
//refine category
    if( !function_exists('get_categoriesroyal') ) {
        function get_categoriesroyal( ) {
            $location = Rewrite::newInstance()->get_location() ;
            $section  = Rewrite::newInstance()->get_section() ;
            
            if ( $location != 'search' ) {
                return false ;
			}
            
            $category_id = osc_search_category_id() ;
			
            if(count($category_id) > 1) {
                return false;
			}
            
			
            $category_id = (int) $category_id ;
            
            $categoriesroyal = Category::newInstance()->hierarchy($category_id) ;
            
            foreach($categoriesroyal as &$category) {
                $category['url'] = get_category_url($category) ;
			}
            
            return $categoriesroyal ;
		}
	}
	
	if( !function_exists('get_subcategories') ) {
		function get_subcategories( ) {
			$location = Rewrite::newInstance()->get_location() ;
			$section  = Rewrite::newInstance()->get_section() ;
			
			if ( $location != 'search' ) {
				return false ;
			}
            
			$category_id = osc_search_category_id() ;
            
			if(count($category_id) > 1) {
				return false ;
			}
            
			$category_id = (int) $category_id[0] ;
            
			$subCategories = Category::newInstance()->findSubcategories($category_id) ;
            
			foreach($subCategories as &$category) {
				$category['url'] = get_category_url($category) ;			 
			}
            
			return $subCategories ;
		}
	}
	
	if ( !function_exists('get_category_url') ) {
		function get_category_url( $category ) {
			$path = '';
			if ( osc_rewrite_enabled() ) {
                if ($category != '') {
                    $category = Category::newInstance()->hierarchy($category['pk_i_id']) ;
                    $sanitized_category = "" ;
                    for ($i = count($category); $i > 0; $i--) {
                        $sanitized_category .= $category[$i - 1]['s_slug'] . '/' ;
					}
                    $path = osc_base_url() . $sanitized_category ;
				}
				} else {
                $path = sprintf( osc_base_url(true) . '?page=search&sCategory=%d', $category['pk_i_id'] ) ;
			}
            
            return $path;
		}
	}
	
	if ( !function_exists('get_category_num_items') ) {
		function get_category_num_items( $category ) {
            $category_stats = CategoryStats::newInstance()->countItemsFromCategory($category['pk_i_id']) ;
            
            if( empty($category_stats) ) {
                return 0 ;
			}
            
            return $category_stats;
		}
	}

if( !function_exists('get_user_menu') ) {
        function get_user_menu() {
            $options   = array();
            if(osc_user_field('b_company') == 1) {
                $options = get_sitter_options();
            } else {
                $options = get_user_options();
            }
            /*
            $options[] = array(
                'name' => __('Public Profile', 'royal'),
                 'url' => osc_user_public_profile_url(),
               'class' => 'opt_publicprofile'
            );
            $options[] = array(
                'name'  => __('Listings', 'royal'),
                'url'   => osc_user_list_items_url(),
                'class' => 'opt_items'
            );
            $options[] = array(
                'name' => __('Your alerts', 'royal'),
                'url' => osc_user_alerts_url(),
                'class' => 'opt_alerts'
            );
            $options[] = array(
                'name'  => __('My account', 'royal'),
                'url'   => osc_user_profile_url(),
                'class' => 'opt_account'
            );
            $options[] = array(
                'name'  => __('Change your e-mail', 'royal'),
                'url'   => osc_change_user_email_url(),
                'class' => 'opt_change_email'
            );
            $options[] = array(
                'name'  => __('Change password', 'royal'),
                'url'   => osc_change_user_password_url(),
                'class' => 'opt_change_password'
            );*/
            $options[] = array(
                'name'  => __('Logout', 'royal'),
                'url'   => osc_user_logout_url(),
                'class' => 'opt_delete_account'
            );
            return $options;
        }
    }
    /**
     * 利用者メニュー
     */
    function get_user_options() {
        return array(
            array(
                'name' => 'プロフィールを編集',
                'url' => osc_user_profile_url(),
                'class' => 'opt_account'
            ),
            array(
                'name' => 'ご利用履歴',
                'url' => '',
                'class' => ''
            )
        );
    }

    /**
     * 保育者メニュー
     */
    function get_sitter_options() {
        return array(
            array(
                'name' => 'プロフィールを編集',
                'url' => osc_user_profile_url(),
                'class' => 'opt_items'
            ),
            array(
                'name' => 'お仕事履歴',
                'url' => '',
                'class' => ''
            )
        );
    }


    
    if( !function_exists('user_info_js') ) {
        function user_info_js() {
            $location = Rewrite::newInstance()->get_location();
            $section  = Rewrite::newInstance()->get_section();

            if( $location === 'user' && in_array($section, array('dashboard', 'profile', 'alerts', 'change_email', 'change_username',  'change_password', 'items')) ) {
                $user = User::newInstance()->findByPrimaryKey( Session::newInstance()->_get('userId') );
                View::newInstance()->_exportVariableToView('user', $user);
                ?>
<script type="text/javascript">
    royal.user = {};
    royal.user.id = '<?php echo osc_user_id(); ?>';
    royal.user.secret = '<?php echo osc_user_field("s_secret"); ?>';
</script>
            <?php }
        }
        osc_add_hook('header', 'user_info_js');
    }
    if(!function_exists('check_install_royal_theme')) {
        function check_install_royal_theme() {
            $current_version = osc_get_preference('version', 'royal');
            //check if current version is installed or need an update
            if( !$current_version ) {
                royal_theme_install();
            }
        }
    }
function royal_footer_css(){
	

	royal_add_google_fonts();
	}
osc_add_hook('footer', 'royal_footer_css');

function royal_google_fonts()
{
	return trim(osc_get_preference('google_fonts', 'royal_theme'));

}

//select category search
	function osc_categories_select_royal($name = 'sCategory', $category = null, $default_str = null) {
        if($default_str == null) $default_str = __('Select a category');
		if(is_array($category)) $category['pk_i_id'] = $category[0];
        CategoryForm::category_select(Category::newInstance()->toTree(), $category, $default_str, $name);
	}
	/*user type */
	function royal_user_type() {
		if(Params::getParam('sCompany') <> '' and Params::getParam('sCompany') <> null) {
			Search::newInstance()->addJoinTable( 'pk_i_id', DB_TABLE_PREFIX.'t_user', DB_TABLE_PREFIX.'t_item.fk_i_user_id = '.DB_TABLE_PREFIX.'t_user.pk_i_id', 'LEFT OUTER' ) ;
			
			if(Params::getParam('sCompany') == 1) {
				Search::newInstance()->addConditions(sprintf("%st_user.b_company = 1", DB_TABLE_PREFIX));
				} else {
				Search::newInstance()->addConditions(sprintf("coalesce(%st_user.b_company, 0) <> 1", DB_TABLE_PREFIX, DB_TABLE_PREFIX));
			}
		}
	}
	
	osc_add_hook('search_conditions', 'royal_user_type');


    function royal_delete() {
        Preference::newInstance()->delete(array('s_section' => 'royal'));
    }

    osc_add_hook('init', 'royal_redirect_user_dashboard', 2);
    osc_add_hook('init_admin', 'theme_royal_actions_admin');
    osc_add_hook('theme_delete_royal', 'royal_delete');
    osc_admin_menu_appearance(__('Royal Images', 'royal'), osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php'), 'royal');
    osc_admin_menu_appearance(__('Royal Images Icon', 'royal'), osc_admin_render_theme_url('oc-content/themes/royal/admin/images.php'), 'category_royal');
    osc_admin_menu_appearance(__('Royal Theme Settings', 'royal'), osc_admin_render_theme_url('oc-content/themes/royal/admin/settings.php'), 'settings_royal');
/**

TRIGGER FUNCTIONS

*/

    check_install_royal_theme();

    /* ads  SEARCH */
    function search_ads_listing_top_fn1() {
        if(osc_get_preference('search-results-top-728x90', 'royal')!='') {
            echo '<div class="clear"></div>' . PHP_EOL;
            echo '<div class="ads_728">' . PHP_EOL;
            echo osc_get_preference('search-results-top-728x90', 'royal');
            echo '</div>' . PHP_EOL;
        }
    }
    osc_add_hook('search_ads_listing_top1', 'search_ads_listing_top_fn1');

    function search_ads_listing_medium_fn1() {
        if(osc_get_preference('search-results-middle-728x90', 'royal')!='') {
            echo '<div class="clear"></div>' . PHP_EOL;
            echo '<div class="ads_728">' . PHP_EOL;
            echo osc_get_preference('search-results-middle-728x90', 'royal');
            echo '</div>' . PHP_EOL;
        }
    }
    osc_add_hook('search_ads_listing_medium1', 'search_ads_listing_medium_fn1');

	function mother_search_meta_name($slug) {
		$field = Field::newInstance()->findBySlug($slug);
		FieldForm::meta($field, true);
	}
	function mother_meta_slug_to_id($slug) {
		$field = Field::newInstance()->findBySlug($slug);
		return "meta[" . $field['pk_i_id'] . "]";
	}

	function mother_all_category_search() {
		$ret = "sCategory=";
		$category = Category::newInstance()->listAll();
		$count = 0;
		foreach ($category as $cat) {
			if ($count != 0) $ret .= ',';
			$ret .= $cat['pk_i_id'];
			$count += 1;
		}
		return $ret;
    }


    /* remove theme */
    function royal_delete_theme() {
osc_remove_preference('keyword_placeholder', 'royal');
osc_remove_preference('footer_link', 'royal');
osc_remove_preference('default_logo', 'royal');
osc_remove_preference('donation', 'royal');
osc_remove_preference('header-royal', 'royal');
osc_remove_preference('katalog-royal', 'royal');
osc_remove_preference('home-royal', 'royal'); 
osc_remove_preference('footer-royal', 'royal');
osc_remove_preference('single-royal', 'royal');
osc_remove_preference('color-royal', 'royal'); 
osc_remove_preference('copyright-royal', 'royal');
osc_remove_preference('widget1-royal', 'royal'); 
osc_remove_preference('widget2-royal', 'royal'); 
osc_remove_preference('widget3-royal', 'royal'); 
osc_remove_preference('widget4-royal', 'royal'); 
osc_remove_preference('company-us', 'royal'); 
osc_remove_preference('email-us', 'royal'); 
osc_remove_preference('phone-us', 'royal'); 
osc_remove_preference('address-us', 'royal'); 
osc_remove_preference('judul1-royal', 'royal');
osc_remove_preference('judul2-royal', 'royal');
osc_remove_preference('judul3-royal', 'royal');
osc_remove_preference('judul4-royal', 'royal');  
osc_remove_preference('memo-us', 'royal'); 
osc_remove_preference('ari-us', 'royal'); 
osc_remove_preference('theme-color', 'royal');
osc_remove_preference('vera-us', 'royal'); 
osc_remove_preference('slider1-royal', 'royal'); 
osc_remove_preference('slider2-royal', 'royal');
osc_remove_preference('slider12-link', 'royal'); 
osc_remove_preference('slider22-link', 'royal'); 
osc_remove_preference('slider32-link', 'royal'); 
osc_remove_preference('wl-us', 'royal');
osc_remove_preference('fb-code', 'royal'); 
osc_remove_preference('back-url', 'royal'); 
osc_remove_preference('back-rep', 'royal'); 
osc_remove_preference('back-pos', 'royal'); 
osc_remove_preference('tos-me', 'royal');
osc_remove_preference('popular-royal', 'royal');
osc_remove_preference('product-royal', 'royal');
osc_remove_preference('premium-royal', 'royal'); 
osc_remove_preference('back-color', 'royal'); 
osc_set_preference('defaultShowAs@all', 'list', 'royal_theme');
osc_set_preference('defaultShowAs@search', 'gallery');
osc_remove_preference('header-728x90', 'royal');
osc_remove_preference('homepage-728x90', 'royal');
osc_remove_preference('sidebar-160x600', 'royal');
osc_remove_preference('sidebar-300x250', 'royal');
osc_remove_preference('search-results-top-728x90', 'royal');
osc_remove_preference('premiumads_num_royal', 'royal'); 
    }
osc_add_hook('admin_page_header', 'theme_royal_admin_regions_message', 10);
?>
