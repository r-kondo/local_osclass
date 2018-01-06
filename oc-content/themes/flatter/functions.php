<?php
/**
Required theme functions
**/
include 'ddfunctions.php';
	
define('FLATTER_THEME_VERSION', '2.1.0');

/* Search placeholder */
if( !osc_get_preference('keyword_placeholder', 'flatter_theme') ) {
	osc_set_preference('keyword_placeholder', __('What are you looking for?', 'flatter'), 'flatter_theme');
}
/* Premium Count */
if( !osc_get_preference('premium_count', 'flatter_theme') ) {
	osc_set_preference('premium_count', __('5', 'flatter'), 'flatter_theme');
}

/* Promo Text */
if( !osc_get_preference('fpromo_text', 'flatter_theme') ) {
	osc_set_preference('fpromo_text', __('Post your ad Today. It&rsquo;s totally free!', 'flatter'), 'flatter_theme');
}
/* Useful Information */
if( !osc_get_preference('usefulinfo_msg', 'flatter_theme') ) {
	osc_set_preference('usefulinfo_msg', __('<ul><li>Avoid scams by acting locally or paying with PayPal</li><li>Never pay with Western Union, Moneygram or other anonymous payment services</li><li>Don\'t buy or sell outside of your country. Don\'t accept cashier cheques from outside your country</li><li>This site is never involved in any transaction, and does not handle payments, shipping, guarantee transactions, provide escrow services, or offer "buyer protection" or "seller certification"</li></ul>', 'flatter'), 'flatter_theme');
}

/* Address Map */
if( !osc_get_preference('address_map', 'flatter_theme') ) {
	osc_set_preference('address_map', __('Disneyland, Anaheim, CA, United States', 'flatter'), 'flatter_theme');
}

/* Landing Popup */
if( !osc_get_preference('pop_heading', 'flatter_theme') ) {
	osc_set_preference('pop_heading', __('Popup heading', 'flatter'), 'flatter_theme');
}
if( !osc_get_preference('landing_pop', 'flatter_theme') ) {
	osc_set_preference('landing_pop', __('Popup content here', 'flatter'), 'flatter_theme');
}
	
/* Category Icons */
function category_icons() {
  $i = 0; while ( osc_has_categories() ) { ?>
	<div class="form-group">
		<label class="col-sm-2"><span><i class="<?php echo osc_esc_html( osc_get_preference('cat_icon_'.osc_category_id(), 'flatter_theme') ); ?> fa-lg"></i></span>&nbsp;&nbsp;<?php echo osc_category_name();?></label>
		<div class="col-sm-3">
		<input type="text" class="form-control" name="cat_icon_<?php echo osc_category_id();?>" value="<?php echo osc_esc_html( osc_get_preference('cat_icon_'.osc_category_id(), 'flatter_theme') ); ?>">
		</div>
   </div>
   <?php if( !osc_get_preference('cat_icon_'.osc_category_id(), 'flatter_theme') ) {
	osc_set_preference('cat_icon_'.osc_category_id(), __('fa fa-star', 'flatter'), 'flatter_theme');}
   $i++; } }
	
/**
JQUERY FUNCTIONS
**/
osc_remove_script('jquery'); // Remove osclass default(old version) jquery
osc_register_script('jquery', osc_current_web_theme_url('js/jquery/jquery-1.11.2.min.js')); // Add new version(1.11.2) of jquery

//osc_register_script('jquery-ui', osc_current_web_theme_url('js/jquery-ui/jquery-ui.min.js')); // Add new version(1.11.4) of jquery-ui
osc_enqueue_script('jquery-ui');
osc_enqueue_style('jquery-ui', osc_current_web_theme_url('js/jquery-ui/jquery-ui.min.css'));

// used for date/dateinterval custom fields
osc_enqueue_script('php-date');
if(!OC_ADMIN) {
	osc_enqueue_style('fine-uploader-css', osc_assets_url('js/fineuploader/fineuploader.css'));
	osc_enqueue_style('flatter-fine-uploader-css', osc_current_web_theme_url('css/ajax-uploader.css'));
}
if ( osc_is_publish_page() || osc_is_edit_page()) {
osc_enqueue_script('jquery-fineuploader');
}


/**
FUNCTIONS
**/
    // install options
    if( !function_exists('flatter_theme_install') ) {
        function flatter_theme_install() {
            osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'flatter_theme');
            osc_set_preference('version', FLATTER_THEME_VERSION, 'flatter_theme');
            osc_set_preference('footer_link', '1', 'flatter_theme');
			osc_set_preference('facebook_likebox', '1', 'flatter_theme');
			osc_set_preference('contact_enable', '1', 'flatter_theme');
			osc_set_preference('google_adsense', '0', 'flatter_theme');
			osc_set_preference('subscribe_show', '1', 'flatter_theme');
			osc_set_preference('geo_ads', '1', 'flatter_theme');
			osc_set_preference('anim', '1', 'flatter_theme');
			osc_set_preference('usefulinfo_show', '1', 'flatter_theme');
			osc_set_preference('pop_enable', '0', 'flatter_theme');
			osc_set_preference('location_input', '0', 'flatter_theme');
			
			osc_set_preference('position1_enable', '0', 'flatter_theme');
			osc_set_preference('position2_enable', '0', 'flatter_theme');
			osc_set_preference('position3_enable', '0', 'flatter_theme');
			osc_set_preference('position4_enable', '0', 'flatter_theme');
			osc_set_preference('position5_enable', '0', 'flatter_theme');
			osc_set_preference('position6_enable', '0', 'flatter_theme');
			osc_set_preference('position7_enable', '0', 'flatter_theme');
			osc_set_preference('position8_enable', '0', 'flatter_theme');
			osc_set_preference('position9_enable', '0', 'flatter_theme');
			osc_set_preference('position10_enable', '0', 'flatter_theme');
			
			osc_set_preference('position1_hide', '1', 'flatter_theme');
			osc_set_preference('position2_hide', '1', 'flatter_theme');
			osc_set_preference('position3_hide', '1', 'flatter_theme');
			osc_set_preference('position4_hide', '1', 'flatter_theme');
			osc_set_preference('position5_hide', '1', 'flatter_theme');
			osc_set_preference('position6_hide', '1', 'flatter_theme');
			osc_set_preference('position7_hide', '1', 'flatter_theme');
			osc_set_preference('position8_hide', '1', 'flatter_theme');
			osc_set_preference('position9_hide', '1', 'flatter_theme');
			osc_set_preference('position10_hide', '1', 'flatter_theme');
			
			osc_set_preference('premium_count', Params::getParam('premium_count'), 'flatter_theme');
			osc_set_preference('terms_link', Params::getParam('terms_link'), 'flatter_theme');
			osc_set_preference('privacy_link', Params::getParam('privacy_link'), 'flatter_theme');
			osc_set_preference('facebook_page', Params::getParam('facebook_page'), 'flatter_theme');
			osc_set_preference('twitter_page', Params::getParam('twitter_page'), 'flatter_theme');
			osc_set_preference('gplus_page', Params::getParam('gplus_page'), 'flatter_theme');
			osc_set_preference('pinterest_page', Params::getParam('pinterest_page'), 'flatter_theme');
			osc_set_preference('g_analytics', Params::getParam('g_analytics'), 'flatter_theme');
			osc_set_preference('g_webmaster', Params::getParam('g_webmaster'), 'flatter_theme');
			osc_set_preference('fpromo_text', Params::getParam('fpromo_text'), 'flatter_theme');
			osc_set_preference('fcwidget_title', Params::getParam('fcwidget_title'), 'flatter_theme');
			
			osc_set_preference('custom_css', Params::getParam('custom_css'), false, 'flatter_theme');
			osc_set_preference('landing_pop', Params::getParam('landing_pop'), false, 'flatter_theme');
			osc_set_preference('pop_heading', Params::getParam('pop_heading'), false, 'flatter_theme');
			
			osc_set_preference('position1_content', Params::getParam('position1_content'), false, 'flatter_theme');
			osc_set_preference('position2_content', Params::getParam('position2_content'), false, 'flatter_theme');
			osc_set_preference('position3_content', Params::getParam('position3_content'), false, 'flatter_theme');
			osc_set_preference('position4_content', Params::getParam('position4_content'), false, 'flatter_theme');
			osc_set_preference('position5_content', Params::getParam('position5_content'), false, 'flatter_theme');
			osc_set_preference('position6_content', Params::getParam('position6_content'), false, 'flatter_theme');
			osc_set_preference('position7_content', Params::getParam('position7_content'), false, 'flatter_theme');
			osc_set_preference('position8_content', Params::getParam('position8_content'), false, 'flatter_theme');
			osc_set_preference('position9_content', Params::getParam('position9_content'), false, 'flatter_theme');
			osc_set_preference('position10_content', Params::getParam('position10_content'), false, 'flatter_theme');
			
			osc_set_preference('contact_address', false, 'flatter_theme');
			osc_set_preference('usefulinfo_msg', false, 'flatter_theme');
			osc_set_preference('address_map', false, 'flatter_theme');
			
			osc_set_preference('adsense_sidebar', false, 'flatter_theme');
			osc_set_preference('adsense_listing', false, 'flatter_theme');
			osc_set_preference('adsense_searchtop', false, 'flatter_theme');
			osc_set_preference('adsense_searchbottom', false, 'flatter_theme');
			osc_set_preference('adsense_searchside', false, 'flatter_theme');
			
			osc_set_preference('fcwidget_content', false, 'fcwidget_content');
			
			$i = 0; while ( osc_has_categories() ) { 
			osc_set_preference('cat_icon_'.osc_category_id(), Params::getParam('cat_icon_'.osc_category_id()), 'flatter_theme');
  			$i++; }
            osc_set_preference('defaultShowAs@all', 'list', 'flatter_theme');
            osc_set_preference('defaultShowAs@search', 'list');
			osc_set_preference('defaultColor@all', 'green', 'flatter_theme');
            osc_reset_preferences();
        }
    }
    // update options
    if( !function_exists('flatter_theme_update') ) {
        function flatter_theme_update() {
            //osc_set_preference('version', FLATTER_THEME_VERSION, 'flatter_theme');
            osc_delete_preference('default_logo', 'flatter_theme');

            $logo_prefence = osc_get_preference('logo', 'flatter_theme');
            $logo_name     = 'flatter_logo';
            $temp_name     = WebThemes::newInstance()->getCurrentThemePath() . 'images/logo.jpg';
            if( file_exists( $temp_name ) && !$logo_prefence) {

                $img = ImageResizer::fromFile($temp_name);
                $ext = $img->getExt();
                $logo_name .= '.'.$ext;
                $img->saveToFile(osc_uploads_path().$logo_name);
                @unlink($temp_name);
                osc_set_preference('logo', $logo_name, 'flatter_theme');
            }
            osc_reset_preferences();
        }
    }
    if(!function_exists('check_install_flatter_theme')) {
        function check_install_flatter_theme() {
            $current_version = osc_get_preference('version', 'flatter_theme');
            //check if current version is installed or need an update<
            if( !$current_version ) {
                flatter_theme_install();
            } else if($current_version < FLATTER_THEME_VERSION){
                flatter_theme_update();
            }
        }
    }

    if(!function_exists('flatter_add_body_class_construct')) {
        function flatter_add_body_class_construct($classes){
            $flatterBodyClass = flatterBodyClass::newInstance();
            $classes = array_merge($classes, $flatterBodyClass->get());
            return $classes;
        }
    }
    if(!function_exists('flatter_body_class')) {
        function flatter_body_class($echo = true){
            /**
            * Print body classes.
            *
            * @param string $echo Optional parameter.
            * @return print string with all body classes concatenated
            */
            osc_add_filter('flatter_bodyClass','flatter_add_body_class_construct');
            $classes = osc_apply_filter('flatter_bodyClass', array());
            if($echo && count($classes)){
                echo ''.implode(' ',$classes).'';
            } else {
                return $classes;
            }
        }
    }
    if(!function_exists('flatter_add_body_class')) {
        function flatter_add_body_class($class){
            /**
            * Add new body class to body class array.
            *
            * @param string $class required parameter.
            */
            $flatterBodyClass = flatterBodyClass::newInstance();
            $flatterBodyClass->add($class);
        }
    }
    if(!function_exists('flatter_nofollow_construct')) {
        /**
        * Hook for header, meta tags robots nofollos
        */
        function flatter_nofollow_construct() {
            echo '<meta name="robots" content="noindex, nofollow, noarchive" />' . PHP_EOL;
            echo '<meta name="googlebot" content="noindex, nofollow, noarchive" />' . PHP_EOL;

        }
    }
    if( !function_exists('flatter_follow_construct') ) {
        /**
        * Hook for header, meta tags robots follow
        */
        function flatter_follow_construct() {
            echo '<meta name="robots" content="index, follow" />' . PHP_EOL;
            echo '<meta name="googlebot" content="index, follow" />' . PHP_EOL;

        }
    }
    /* logo edited by DD */
    if( !function_exists('logo_header') ) {
        function logo_header() {
             $logo = osc_get_preference('logo','flatter_theme');
             $html = '<div class="logoimg"><img border="0" alt="' . osc_page_title() . '" src="' . flatter_logo_url() . '"></div>';
             if( $logo!='' && file_exists( osc_uploads_path() . $logo ) ) {
                return $html;
             } else {
                return '<div class="logoname">'.osc_page_title().'</div>';
            }
        }
    }
    /* logo */
    if( !function_exists('flatter_logo_url') ) {
        function flatter_logo_url() {
            $logo = osc_get_preference('logo','flatter_theme');
            if( $logo ) {
                return osc_uploads_url($logo);
            }
            return false;
        }
    }
    if( !function_exists('flatter_draw_item') ) {
        function flatter_draw_item($class = false,$admin = false, $premium = false) {
            $filename = 'loop-single';
            if($premium){
                $filename .='-premium';
            }
            require WebThemes::newInstance()->getCurrentThemePath().$filename.'.php';
        }
    }
    if( !function_exists('flatter_show_as') ){
        function flatter_show_as(){

            $p_sShowAs    = Params::getParam('sShowAs');
            $aValidShowAsValues = array('list', 'gallery');
            if (!in_array($p_sShowAs, $aValidShowAsValues)) {
                $p_sShowAs = flatter_default_show_as();
            }

            return $p_sShowAs;
        }
    }
    if( !function_exists('flatter_default_show_as') ){
        function flatter_default_show_as(){
            return getPreference('defaultShowAs@all','flatter_theme');
        }
    }
	if( !function_exists('flatter_def_color') ){
        function flatter_def_color(){
            return getPreference('defaultColor@all','flatter_theme');
        }
    }
    if( !function_exists('flatter_draw_categories_list') ) {
        function flatter_draw_categories_list() { ?>
         <?php
         //cell_3
        $total_categories   = osc_count_categories();
        $col1_max_cat       = ceil($total_categories/4);

         osc_goto_first_category();
         $i      = 0;

         while ( osc_has_categories() ) {
         ?>
        <?php
            if($i%$col1_max_cat == 0){
                if($i > 0) { echo '</div>'; }
                if($i == 0) {
                   echo '<div class="col-md-3 col-sm-6 col-xs-12 first_cel">';
                } else {
                    echo '<div class="col-md-3 col-sm-6 col-xs-12">';
                }
            }
        ?>
        <div class="cat-single">
        <div class="pull-left">
            <a class="<?php echo osc_category_slug(); ?>" href="<?php echo osc_search_category_url(); ?>"><i class="<?php echo osc_esc_html( osc_get_preference('cat_icon_'.osc_category_id(), 'flatter_theme') ); ?> fa-2x sclr"></i></a>
        </div>
        <ul class="category">
             <li>
                 <h4 class="clr">
                    <a class="<?php echo osc_category_slug(); ?>" href="<?php echo osc_search_category_url(); ?>"><?php echo osc_category_name(); ?> </a>
                 </h4>
                 <p class="hidden-xs"><?php echo osc_category_description(); ?></p>
                 <?php if ( osc_count_subcategories() > 0 ) { ?>
                   <ul class="sub-categories">
                         <?php while ( osc_has_subcategories() ) { ?>
                             <li>
                             <a class="<?php echo osc_category_slug(); ?>" href="<?php echo osc_search_category_url(); ?>"><?php echo osc_category_name(); ?> (<?php echo osc_category_total_items() ; ?>)</a>
                             </li>
                         <?php } ?>
                   </ul>
                 <?php } ?>
             </li>
        </ul>
        </div>
        <?php
                $i++;
            }
            echo '</div>';
        ?>
        <?php
        }
    }
    if( !function_exists('flatter_search_number') ) {
        /**
          *
          * @return array
          */
        function flatter_search_number() {
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
    /*
     * Helpers used at view
     */
    if( !function_exists('flatter_item_title') ) {
        function flatter_item_title() {
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
    if( !function_exists('flatter_item_description') ) {
        function flatter_item_description() {
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
    if( !function_exists('related_listings') ) {
        function related_listings() {
            View::newInstance()->_exportVariableToView('items', array());

            $mSearch = new Search();
            $mSearch->addCategory(osc_item_category_id());
            $mSearch->addRegion(osc_item_region());
            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id < %s ", DB_TABLE_PREFIX, osc_item_id()));
            $mSearch->limit('0', '6');

            $aItems      = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems == 6 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);

            $mSearch = new Search();
            $mSearch->addCategory(osc_item_category_id());
            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id != %s ", DB_TABLE_PREFIX, osc_item_id()));
            $mSearch->limit('0', '6');

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

    if( !function_exists('osc_is_contact_page') ) {
        function osc_is_contact_page() {
            if( Rewrite::newInstance()->get_location() === 'contact' ) {
                return true;
            }

            return false;
        }
    }

    if( !function_exists('get_breadcrumb_lang') ) {
        function get_breadcrumb_lang() {
            $lang = array();
            $lang['item_add']               = __('Publish a listing', 'flatter');
            $lang['item_edit']              = __('Edit your listing', 'flatter');
            $lang['item_send_friend']       = __('Send to a friend', 'flatter');
            $lang['item_contact']           = __('Contact publisher', 'flatter');
            $lang['search']                 = __('Search results', 'flatter');
            $lang['search_pattern']         = __('Search results: %s', 'flatter');
            $lang['user_dashboard']         = __('Dashboard', 'flatter');
            $lang['user_dashboard_profile'] = __("%s's profile", 'flatter');
            $lang['user_account']           = __('Account', 'flatter');
            $lang['user_items']             = __('Listings', 'flatter');
            $lang['user_alerts']            = __('Alerts', 'flatter');
            $lang['user_profile']           = __('Update account', 'flatter');
            $lang['user_change_email']      = __('Change email', 'flatter');
            $lang['user_change_username']   = __('Change username', 'flatter');
            $lang['user_change_password']   = __('Change password', 'flatter');
            $lang['login']                  = __('Login', 'flatter');
            $lang['login_recover']          = __('Recover password', 'flatter');
            $lang['login_forgot']           = __('Change password', 'flatter');
            $lang['register']               = __('Create a new account', 'flatter');
            $lang['contact']                = __('Contact', 'flatter');
            return $lang;
        }
    }

    if(!function_exists('user_dashboard_redirect')) {
        function user_dashboard_redirect() {
            $page   = Params::getParam('page');
            $action = Params::getParam('action');
            if($page=='user' && $action=='dashboard') {
                if(ob_get_length()>0) {
                    ob_end_flush();
                }
                header("Location: ".osc_user_profile_url(), TRUE,301);
            }
        }
        osc_add_hook('init', 'user_dashboard_redirect');
    }

    if( !function_exists('get_user_menu') ) {
        function get_user_menu() {
            $options   = array();
            /*$options[] = array(
                'name' => __('Public Profile'),
                 'url' => osc_user_public_profile_url(),
               'class' => 'opt_publicprofile'
            );*/
			$options[] = array(
                'name'  => __('Account', 'flatter'),
                'url'   => osc_user_profile_url(),
                'class' => 'opt_account'
            );
            $options[] = array(
                'name'  => __('Listings', 'flatter'),
                'url'   => osc_user_list_items_url(),
                'class' => 'opt_items'
            );
            $options[] = array(
                'name' => __('Alerts', 'flatter'),
                'url' => osc_user_alerts_url(),
                'class' => 'opt_alerts'
            );
            
            /*$options[] = array(
                'name'  => __('Change email', 'flatter'),
                'url'   => osc_change_user_email_url(),
                'class' => 'opt_change_email'
            );
            $options[] = array(
                'name'  => __('Change username', 'flatter'),
                'url'   => osc_change_user_username_url(),
                'class' => 'opt_change_username'
            );
            $options[] = array(
                'name'  => __('Change password', 'flatter'),
                'url'   => osc_change_user_password_url(),
                'class' => 'opt_change_password'
            );*/
            $options[] = array(
                'name'  => __('Logout', 'flatter'),
                'url'   => osc_user_logout_url(),
                //'class' => 'opt_delete_account'
            );

            return $options;
        }
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
    flatter.user = {};
    flatter.user.id = '<?php echo osc_user_id(); ?>';
    flatter.user.secret = '<?php echo osc_user_field("s_secret"); ?>';
</script>
            <?php }
        }
        osc_add_hook('header', 'user_info_js');
    }

    function theme_flatter_actions_admin() {
        //if(OC_ADMIN)
        switch( Params::getParam('action_specific') ) {
            case('settings'):
				$googleCode  = Params::getParam('google_analytics');
				$googleWebmaster  = Params::getParam('google_webmaster');
				$contactEnable  = Params::getParam('contact_enable');
				$subscribeShow = Params::getParam('subscribe_show');
				$geoAds = Params::getParam('geo_ads');
				$Anim = Params::getParam('anim');
				$usefulInfo = Params::getParam('usefulinfo_show');
				$popEnable = Params::getParam('pop_enable');
				$locationInput	= Params::getParam('location_input');
				
				osc_set_preference('subscribe_show', ($subscribeShow ? '1' : '0'), 'flatter_theme');
				osc_set_preference('geo_ads', ($geoAds ? '1' : '0'), 'flatter_theme');
				osc_set_preference('anim', ($Anim ? '1' : '0'), 'flatter_theme');
				osc_set_preference('usefulinfo_show', ($usefulInfo ? '1' : '0'), 'flatter_theme');
				osc_set_preference('usefulinfo_msg', Params::getParam('usefulinfo_msg', false, false), 'flatter_theme');
			
                osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'flatter_theme');
				osc_set_preference('fpromo_text', Params::getParam('fpromo_text'), 'flatter_theme');
				osc_set_preference('premium_count', Params::getParam('premium_count'), 'flatter_theme');
                osc_set_preference('defaultShowAs@all', Params::getParam('defaultShowAs@all'), 'flatter_theme');
                osc_set_preference('defaultShowAs@search', Params::getParam('defaultShowAs@all'));
				osc_set_preference('defaultColor@all', Params::getParam('defaultColor@all'), 'flatter_theme');
				osc_set_preference('contact_enable', ($contactEnable ? '1' : '0'), 'flatter_theme');
				osc_set_preference('contact_address', Params::getParam('contact_address', false, false), 'flatter_theme');
				osc_set_preference('address_map', Params::getParam('address_map', false, false), 'flatter_theme');
				osc_set_preference('google_analytics', ($googleCode ? '1' : '0'), 'flatter_theme');
				osc_set_preference('g_analytics', Params::getParam('g_analytics'), 'flatter_theme');
				osc_set_preference('google_webmaster', ($googleWebmaster ? '1' : '0'), 'flatter_theme');
				osc_set_preference('g_webmaster', Params::getParam('g_webmaster'), 'flatter_theme');
				osc_set_preference('custom_css', Params::getParam('custom_css', false, false), 'flatter_theme');
				
				osc_set_preference('location_input', ($locationInput ? '1' : '0'), 'flatter_theme');
				osc_set_preference('pop_enable', ($popEnable ? '1' : '0'), 'flatter_theme');
				osc_set_preference('pop_heading', Params::getParam('pop_heading'), 'flatter_theme');
				osc_set_preference('landing_pop', Params::getParam('landing_pop', false, false), 'flatter_theme');
				
                osc_add_flash_ok_message(__('Theme settings updated correctly', 'flatter'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'));
            break;
			case('page_settings'):
				
				osc_set_preference('terms_link', Params::getParam('terms_link'), 'flatter_theme');
				osc_set_preference('privacy_link', Params::getParam('privacy_link'), 'flatter_theme');
				osc_set_preference('facebook_page', Params::getParam('facebook_page'), 'flatter_theme');
				osc_set_preference('twitter_page', Params::getParam('twitter_page'), 'flatter_theme');
				osc_set_preference('gplus_page', Params::getParam('gplus_page'), 'flatter_theme');
				osc_set_preference('pinterest_page', Params::getParam('pinterest_page'), 'flatter_theme');

                osc_add_flash_ok_message(__('Page / Social links updated correctly', 'flatter'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php#page'));
            break;
			case('category_settings'):
				$i = 0; while ( osc_has_categories() ) { 
				osc_set_preference('cat_icon_'.osc_category_id(), Params::getParam('cat_icon_'.osc_category_id()), 'flatter_theme');
  				$i++; }

                osc_add_flash_ok_message(__('Category icons updated correctly', 'flatter'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php#category'));
            break;
			case('adsense_settings'):
				$adsenseEnable  = Params::getParam('google_adsense');
				
				osc_set_preference('google_adsense', ($adsenseEnable ? '1' : '0'), 'flatter_theme');
				osc_set_preference('adsense_sidebar', Params::getParam('adsense_sidebar', false, false), 'flatter_theme');
				osc_set_preference('adsense_listing', Params::getParam('adsense_listing', false, false), 'flatter_theme');
				osc_set_preference('adsense_searchtop', Params::getParam('adsense_searchtop', false, false), 'flatter_theme');
				osc_set_preference('adsense_searchbottom', Params::getParam('adsense_searchbottom', false, false), 'flatter_theme');
				osc_set_preference('adsense_searchside', Params::getParam('adsense_searchside', false, false), 'flatter_theme');

                osc_add_flash_ok_message(__('Adsense settings updated correctly', 'flatter'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php#adsense'));
            break;
			case('footer_settings'):
				$facebookLink  = Params::getParam('facebook_likebox');
				$footerLink  = Params::getParam('footer_link');
				
				osc_set_preference('facebook_likebox', ($facebookLink ? '1' : '0'), 'flatter_theme');
                osc_set_preference('footer_link', ($footerLink ? '1' : '0'), 'flatter_theme');
				
				osc_set_preference('fcwidget_title', Params::getParam('fcwidget_title'), 'flatter_theme');
				osc_set_preference('fcwidget_content', Params::getParam('fcwidget_content', false, false), 'flatter_theme');

                osc_add_flash_ok_message(__('Widgets updated correctly', 'flatter'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php#footerwidget'));
            break;
			case('other_settings'):
				$position1  = Params::getParam('position1_enable');
				$position2  = Params::getParam('position2_enable');
				$position3  = Params::getParam('position3_enable');
				$position4  = Params::getParam('position4_enable');
				$position5  = Params::getParam('position5_enable');
				$position6  = Params::getParam('position6_enable');
				$position7  = Params::getParam('position7_enable');
				$position8  = Params::getParam('position8_enable');
				$position9  = Params::getParam('position9_enable');
				$position10  = Params::getParam('position10_enable');
				
				$positionhide1  = Params::getParam('position1_hide');
				$positionhide2  = Params::getParam('position2_hide');
				$positionhide3  = Params::getParam('position3_hide');
				$positionhide4  = Params::getParam('position4_hide');
				$positionhide5  = Params::getParam('position5_hide');
				$positionhide6  = Params::getParam('position6_hide');
				$positionhide7  = Params::getParam('position7_hide');
				$positionhide8  = Params::getParam('position8_hide');
				$positionhide9  = Params::getParam('position9_hide');
				$positionhide10  = Params::getParam('position10_hide');
				
				osc_set_preference('position1_enable', ($position1 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position2_enable', ($position2 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position3_enable', ($position3 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position4_enable', ($position4 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position5_enable', ($position5 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position6_enable', ($position6 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position7_enable', ($position7 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position8_enable', ($position8 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position9_enable', ($position9 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position10_enable', ($position10 ? '1' : '0'), 'flatter_theme');
				
				osc_set_preference('position1_hide', ($positionhide1 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position2_hide', ($positionhide2 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position3_hide', ($positionhide3 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position4_hide', ($positionhide4 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position5_hide', ($positionhide5 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position6_hide', ($positionhide6 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position7_hide', ($positionhide7 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position8_hide', ($positionhide8 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position9_hide', ($positionhide9 ? '1' : '0'), 'flatter_theme');
				osc_set_preference('position10_hide', ($positionhide10 ? '1' : '0'), 'flatter_theme');
				
				osc_set_preference('position1_content', Params::getParam('position1_content', false, false), 'flatter_theme');
				osc_set_preference('position2_content', Params::getParam('position2_content', false, false), 'flatter_theme');
				osc_set_preference('position3_content', Params::getParam('position3_content', false, false), 'flatter_theme');
				osc_set_preference('position4_content', Params::getParam('position4_content', false, false), 'flatter_theme');
				osc_set_preference('position5_content', Params::getParam('position5_content', false, false), 'flatter_theme');
				osc_set_preference('position6_content', Params::getParam('position6_content', false, false), 'flatter_theme');
				osc_set_preference('position7_content', Params::getParam('position7_content', false, false), 'flatter_theme');
				osc_set_preference('position8_content', Params::getParam('position8_content', false, false), 'flatter_theme');
				osc_set_preference('position9_content', Params::getParam('position9_content', false, false), 'flatter_theme');
				osc_set_preference('position10_content', Params::getParam('position10_content', false, false), 'flatter_theme');

                osc_add_flash_ok_message(__('Settings updated correctly', 'flatter'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php#others'));
            break;
            case('upload_logo'):
                $package = Params::getFiles('logo');
                if( $package['error'] == UPLOAD_ERR_OK ) {
                    $img = ImageResizer::fromFile($package['tmp_name']);
                    $ext = $img->getExt();
                    $logo_name     = 'flatter_logo';
                    $logo_name    .= '.'.$ext;
                    $path = osc_uploads_path() . $logo_name ;
                    $img->saveToFile($path);

                    osc_set_preference('logo', $logo_name, 'flatter_theme');

                    osc_add_flash_ok_message(__('The logo image has been uploaded correctly', 'flatter'), 'admin');
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again", 'flatter'), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php#logo'));
            break;
            case('remove'):
                $logo = osc_get_preference('logo','flatter_theme');
                $path = osc_uploads_path() . $logo ;
                if(file_exists( $path ) ) {
                    @unlink( $path );
                    osc_delete_preference('logo','flatter_theme');
                    osc_reset_preferences();
                    osc_add_flash_ok_message(__('The logo image has been removed', 'flatter'), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found", 'flatter'), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php#logo'));
            break;
        }
    }

    function flatter_redirect_user_dashboard()
    {
        if( (Rewrite::newInstance()->get_location() === 'user') && (Rewrite::newInstance()->get_section() === 'dashboard') ) {
            header('Location: ' .osc_user_profile_url());
            exit;
        }
    }

    function flatter_delete() {
        Preference::newInstance()->delete(array('s_section' => 'flatter'));
    }

    osc_add_hook('init', 'flatter_redirect_user_dashboard', 2);
    osc_add_hook('init_admin', 'theme_flatter_actions_admin');
    osc_add_hook('theme_delete_flatter', 'flatter_delete');
    //osc_admin_menu_appearance(__('Header logo', 'flatter'), osc_admin_render_theme_url('oc-content/themes/flatter/admin/header.php'), 'header_flatter');
    osc_admin_menu_appearance(__('Flatter Settings', 'flatter'), osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'), 'settings_flatter');
	//osc_add_admin_menu_page( __('Flatter', 'flatter'), osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'), 'settings_flatter' );
	
/**

TRIGGER FUNCTIONS

*/
check_install_flatter_theme();
/*if(osc_is_home_page()){
    osc_add_hook('inside-main','flatter_draw_categories_list');
} else if( osc_is_static_page() || osc_is_contact_page() ){
    osc_add_hook('before-content','flatter_draw_categories_list');
}

if(osc_is_home_page() || osc_is_search_page()){
    flatter_add_body_class('has-searchbox');
}*/


function flatter_sidebar_category_search($catId = null)
{
    $aCategories = array();
    if($catId==null) {
        $aCategories[] = Category::newInstance()->findRootCategoriesEnabled();
    } else {
        // if parent category, only show parent categories
        $aCategories = Category::newInstance()->toRootTree($catId);
        end($aCategories);
        $cat = current($aCategories);
        // if is parent of some category
        $childCategories = Category::newInstance()->findSubcategoriesEnabled($cat['pk_i_id']);
        if(count($childCategories) > 0) {
            $aCategories[] = $childCategories;
        }
    }

    if(count($aCategories) == 0) {
        return "";
    }

    flatter_print_sidebar_category_search($aCategories, $catId);
}

function flatter_print_sidebar_category_search($aCategories, $current_category = null, $i = 0)
{
    $class = '';
    if(!isset($aCategories[$i])) {
        return null;
    }

    if($i===0) {
        $class = 'class="category"';
    }

    $c   = $aCategories[$i];
    $i++;
    if(!isset($c['pk_i_id'])) {
        echo '<ul '.$class.'>';
        if($i==1) {
            echo '<li><a href="'.osc_esc_html(osc_update_search_url(array('sCategory'=>null, 'iPage'=>null))).'">'.__('All categories', 'flatter')."</a></li>";
        }
        foreach($c as $key => $value) {
    ?>
            <li>
                <a id="cat_<?php echo osc_esc_html($value['pk_i_id']);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $value['pk_i_id'], 'iPage'=>null))); ?>">
                <?php if(isset($current_category) && $current_category == $value['pk_i_id']){ echo '<strong>'.$value['s_name'].'</strong>'; }
                else{ echo $value['s_name']; } ?>
                </a>

            </li>
    <?php
        }
        if($i==1) {
        echo "</ul>";
        } else {
        echo "</ul>";
        }
    } else {
    ?>
    <ul <?php echo $class;?>>
        <?php if($i==1) { ?>
        <li><a href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=>null, 'iPage'=>null))); ?>"><?php _e('All categories', 'flatter'); ?></a></li>
        <?php } ?>
            <li>
                <a id="cat_<?php echo osc_esc_html($c['pk_i_id']);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $c['pk_i_id'], 'iPage'=>null))); ?>">
                <?php if(isset($current_category) && $current_category == $c['pk_i_id']){ echo '<strong>'.$c['s_name'].'</strong>'; }
                      else{ echo $c['s_name']; } ?>
                </a>
                <?php flatter_print_sidebar_category_search($aCategories, $current_category, $i); ?>
            </li>
        <?php if($i==1) { ?>
        <?php } ?>
    </ul>
<?php
    }
}

/**

CLASSES

*/
class flatterBodyClass
{
    /**
    * Custom Class for add, remove or get body classes.
    *
    * @param string $instance used for singleton.
    * @param array $class.
    */
    private static $instance;
    private $class;

    private function __construct()
    {
        $this->class = array();
    }

    public static function newInstance()
    {
        if (  !self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function add($class)
    {
        $this->class[] = $class;
    }
    public function get()
    {
        return $this->class;
    }
}

/**
HELPERS
*/
if( !function_exists('osc_uploads_url') ){
    function osc_uploads_url($item = ''){
        return osc_base_url().'oc-content/uploads/'.$item;
    }
}
/**
PREMIUM CURRENCY by ERIC
*/
function osc_format_premium_price() {
	$price=osc_premium_field("i_price") ;
	if ($price == null) return osc_apply_filter ('item_price_null', __('Check with seller') ) ;
	if ($price == 0) return osc_apply_filter ('item_price_zero', __('Free') ) ;

	$price = $price/1000000;

	$currencyFormat = osc_locale_currency_format();
	$currencyFormat = str_replace('{NUMBER}', number_format($price, osc_locale_num_dec(), osc_locale_dec_point(), osc_locale_thousands_sep()), $currencyFormat);
	$currencyFormat = str_replace('{CURRENCY}', osc_premium_currency_symbol(), $currencyFormat);
	return osc_apply_filter('item_price', $currencyFormat );
}
/**
THEME VERSION
**/
$info = WebThemes::newInstance()->loadThemeInfo(osc_theme());

/**
THEME SETTINGS BUTTONS
**/
function editBtn() { ?>
 <script>
 $(document).ready(function(){
 $('.current-theme .theme-description').append("<br/><br/><a href='<?php echo osc_admin_render_theme_url('oc-content/themes/flatter/admin/settings.php'); ?>' class='btn btn-green'><?php _e('Flatter Settings', 'flatter'); ?></a> <a class='btn btn-blue' target='_blank' href='http://www.drizzlethemes.com/forums'><?php _e('Help', 'flatter'); ?></a>"
);
 });
 </script>
 <?php }
 osc_add_hook('admin_header','editBtn', 10);
?>
