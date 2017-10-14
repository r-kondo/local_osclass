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

/**

DEFINES

*/
    define('AZZURRO_THEME_VERSION', '1.1.4');
	    if( (string)osc_get_preference('keyword_placeholder', 'azzurro_theme')=="" ) {
        Params::setParam('keyword_placeholder', __('ie. PHP Programmer', 'azzurro_theme') ) ;
    }
    osc_register_script('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.pack.js'), array('jquery'));
    osc_enqueue_style('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.css'));
    osc_enqueue_script('fancybox');

    osc_enqueue_style('font-awesome', osc_current_web_theme_url('css/font-awesome-4.1.0/css/font-awesome.min.css'));
    // used for date/dateinterval custom fields
    osc_enqueue_script('php-date');
    if(!OC_ADMIN) {
        osc_enqueue_style('fine-uploader-css', osc_assets_url('js/fineuploader/fineuploader.css'));
        osc_enqueue_style('azzurro-fine-uploader-css', osc_current_web_theme_url('css/ajax-uploader.css'));
    }
    osc_enqueue_script('jquery-fineuploader');


/**

FUNCTIONS

*/

    // install options
    if( !function_exists('azzurro_theme_install') ) {
        function azzurro_theme_install() {
            osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'azzurro_theme');
            osc_set_preference('version', AZZURRO_THEME_VERSION, 'azzurro_theme');
            osc_set_preference('footer_link', '1', 'azzurro_theme');
            osc_set_preference('donation', '0', 'azzurro_theme');
            osc_set_preference('defaultShowAs@all', 'list', 'azzurro_theme');
            osc_set_preference('defaultShowAs@search', 'list');
			osc_set_preference('defaultLocationShowAs', 'dropdown', 'azzurro_theme'); // dropdown / autocomplete
            osc_reset_preferences();
        }
    }
    // update options
    if( !function_exists('azzurro_theme_update') ) {
        function azzurro_theme_update() {
            //osc_set_preference('version', AZZURRO_THEME_VERSION, 'azzurro_theme');
            osc_delete_preference('default_logo', 'azzurro_theme');

            $logo_prefence = osc_get_preference('logo', 'azzurro_theme');
            $logo_name     = 'azzurro_logo';
            $temp_name     = WebThemes::newInstance()->getCurrentThemePath() . 'images/azzurro-logo.jpg';
            if( file_exists( $temp_name ) && !$logo_prefence) {

                $img = ImageResizer::fromFile($temp_name);
                $ext = $img->getExt();
                $logo_name .= '.'.$ext;
                $img->saveToFile(osc_uploads_path().$logo_name);
                @unlink($temp_name);
                osc_set_preference('logo', $logo_name, 'azzurro_theme');
            }
            osc_reset_preferences();
        }
    }
    if(!function_exists('check_install_azzurro_theme')) {
        function check_install_azzurro_theme() {
            $current_version = osc_get_preference('version', 'azzurro_theme');
            //check if current version is installed or need an update<
            if( !$current_version ) {
                azzurro_theme_install();
            } else if($current_version < AZZURRO_THEME_VERSION){
                azzurro_theme_update();
            }
        }
    }



    if(!function_exists('azzurro_add_body_class_construct')) {
        function azzurro_add_body_class_construct($classes){
            $azzurroBodyClass = azzurroBodyClass::newInstance();
            $classes = array_merge($classes, $azzurroBodyClass->get());
            return $classes;
        }
    }
    if(!function_exists('azzurro_body_class')) {
        function azzurro_body_class($echo = true){
            /**
            * Print body classes.
            *
            * @param string $echo Optional parameter.
            * @return print string with all body classes concatenated
            */
            osc_add_filter('azzurro_bodyClass','azzurro_add_body_class_construct');
            $classes = osc_apply_filter('azzurro_bodyClass', array());
            if($echo && count($classes)){
                echo 'class="'.implode(' ',$classes).'"';
            } else {
                return $classes;
            }
        }
    }
    if(!function_exists('azzurro_add_body_class')) {
        function azzurro_add_body_class($class){
            /**
            * Add new body class to body class array.
            *
            * @param string $class required parameter.
            */
            $azzurroBodyClass = azzurroBodyClass::newInstance();
            $azzurroBodyClass->add($class);
        }
    }
    if(!function_exists('azzurro_nofollow_construct')) {
        /**
        * Hook for header, meta tags robots nofollos
        */
        function azzurro_nofollow_construct() {
            echo '<meta name="robots" content="noindex, nofollow, noarchive" />' . PHP_EOL;
            echo '<meta name="googlebot" content="noindex, nofollow, noarchive" />' . PHP_EOL;

        }
    }
    if( !function_exists('azzurro_follow_construct') ) {
        /**
        * Hook for header, meta tags robots follow
        */
        function azzurro_follow_construct() {
            echo '<meta name="robots" content="index, follow" />' . PHP_EOL;
            echo '<meta name="googlebot" content="index, follow" />' . PHP_EOL;

        }
    }
    /* logo */
    if( !function_exists('logo_header') ) {
        function logo_header() {
             $logo = osc_get_preference('logo','azzurro_theme');
             $html = '<a href="'.osc_base_url().'"><img alt="' . osc_page_title() . ' - Osclass Italia Theme - Azzurro By AntarcticaThemes" src="' . azzurro_logo_url() . '"></a>';
             if( $logo!='' && file_exists( osc_uploads_path() . $logo ) ) {
                return $html;
             } else {
                return '<a href="'.osc_base_url().'">'.osc_page_title().'</a>';
            }
        }
    }
    /* logo */
    if( !function_exists('azzurro_logo_url') ) {
        function azzurro_logo_url() {
            $logo = osc_get_preference('logo','azzurro_theme');
            if( $logo ) {
                return osc_uploads_url($logo);
            }
            return false;
        }
    }
    if( !function_exists('azzurro_draw_item') ) {
        function azzurro_draw_item($class = false,$admin = false, $premium = false) {
            $filename = 'loop-single';
            if($premium){
                $filename .='-premium';
            }
            require WebThemes::newInstance()->getCurrentThemePath().$filename.'.php';
        }
    }
    if( !function_exists('azzurro_show_as') ){
        function azzurro_show_as(){

            $p_sShowAs    = Params::getParam('sShowAs');
            $aValidShowAsValues = array('list', 'gallery');
            if (!in_array($p_sShowAs, $aValidShowAsValues)) {
                $p_sShowAs = azzurro_default_show_as();
            }

            return $p_sShowAs;
        }
    }
    if( !function_exists('azzurro_default_show_as') ){
        function azzurro_default_show_as(){
            return getPreference('defaultShowAs@all','azzurro_theme');
        }
    }
	   if( !function_exists('azzurro_default_location_show_as') ){
        function azzurro_default_location_show_as(){
            return osc_get_preference('defaultLocationShowAs','azzurro_theme');
        }
    }
    if( !function_exists('azzurro_draw_categories_list') ) {
        function azzurro_draw_categories_list(){ ?>
        <?php if(!osc_is_home_page()){ echo '<div class="resp-wrapper">'; } ?>
         <?php
         //cell_3
        $total_categories   = osc_count_categories();
        $col1_max_cat       = ceil($total_categories/3);

         osc_goto_first_category();
         $i      = 0;

         while ( osc_has_categories() ) {
         ?>
        <?php
            if($i%$col1_max_cat == 0){
                if($i > 0) { echo '</div>'; }
                if($i == 0) {
                   echo '<div class="cell_3 first_cel">';
                } else {
                    echo '<div class="cell_3">';
                }
            }
        ?>
        <ul class="r-list">
             <li>
                 <h2>
                    <?php
                    $_slug      = osc_category_slug();
                    $_url       = osc_search_category_url();
                    $_name      = osc_category_name();
                    $_total_items = osc_category_total_items();
                    if ( osc_count_subcategories() > 0 ) { ?>
                    <span class="collapse resp-toogle"><i class="fa fa-caret-right fa-lg"></i></span>
                    <?php } ?>
                    <a class="category <?php echo $_slug; ?>" href="<?php echo $_url; ?>"><?php echo $_name ; ?></a> <span>(<?php echo $_total_items ; ?>)</span>
                 </h2>
                 <?php if ( osc_count_subcategories() > 0 ) { ?>
                   <ul>
                         <?php while ( osc_has_subcategories() ) { ?>
                             <li>
                             <?php if( osc_category_total_items() > 0 ) { ?>
                                 <a class="category sub-category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a> <span>(<?php echo osc_category_total_items() ; ?>)</span>
                             <?php } else { ?>
                                 <a class="category sub-category <?php echo osc_category_slug() ; ?>" href="#"><?php echo osc_category_name() ; ?></a> <span>(<?php echo osc_category_total_items() ; ?>)</span>
                             <?php } ?>
                             </li>
                         <?php } ?>
                   </ul>
                 <?php } ?>
             </li>
        </ul>
        <?php
                $i++;
            }
            echo '</div>';
        ?>
        <?php if(!osc_is_home_page()){ echo '</div>'; } ?>
        <?php
        }
    }
    if( !function_exists('azzurro_search_number') ) {
        /**
          *
          * @return array
          */
        function azzurro_search_number() {
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
    if( !function_exists('azzurro_item_title') ) {
        function azzurro_item_title() {
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
    if( !function_exists('azzurro_item_description') ) {
        function azzurro_item_description() {
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
            $mSearch->limit('0', '3');

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
            $mSearch->limit('0', '3');

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
            $lang['item_add']               = __('Publish a listing', 'azzurro');
            $lang['item_edit']              = __('Edit your listing', 'azzurro');
            $lang['item_send_friend']       = __('Send to a friend', 'azzurro');
            $lang['item_contact']           = __('Contact publisher', 'azzurro');
            $lang['search']                 = __('Search results', 'azzurro');
            $lang['search_pattern']         = __('Search results: %s', 'azzurro');
            $lang['user_dashboard']         = __('Dashboard', 'azzurro');
            $lang['user_dashboard_profile'] = __("%s's profile", 'azzurro');
            $lang['user_account']           = __('Account', 'azzurro');
            $lang['user_items']             = __('Listings', 'azzurro');
            $lang['user_alerts']            = __('Alerts', 'azzurro');
            $lang['user_profile']           = __('Update account', 'azzurro');
            $lang['user_change_email']      = __('Change email', 'azzurro');
            $lang['user_change_username']   = __('Change username', 'azzurro');
            $lang['user_change_password']   = __('Change password', 'azzurro');
            $lang['login']                  = __('Login', 'azzurro');
            $lang['login_recover']          = __('Recover password', 'azzurro');
            $lang['login_forgot']           = __('Change password', 'azzurro');
            $lang['register']               = __('Create a new account', 'azzurro');
            $lang['contact']                = __('Contact', 'azzurro');
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
                header("Location: ".osc_user_list_items_url(), TRUE,301);
            }
        }
        osc_add_hook('init', 'user_dashboard_redirect');
    }

    if( !function_exists('get_user_menu') ) {
        function get_user_menu() {
            $options   = array();
            $options[] = array(
                'name' => __('Public Profile'),
                 'url' => osc_user_public_profile_url(),
               'class' => 'opt_publicprofile'
            );
            $options[] = array(
                'name'  => __('Listings', 'azzurro'),
                'url'   => osc_user_list_items_url(),
                'class' => 'opt_items'
            );
            $options[] = array(
                'name' => __('Alerts', 'azzurro'),
                'url' => osc_user_alerts_url(),
                'class' => 'opt_alerts'
            );
            $options[] = array(
                'name'  => __('Account', 'azzurro'),
                'url'   => osc_user_profile_url(),
                'class' => 'opt_account'
            );
            $options[] = array(
                'name'  => __('Change email', 'azzurro'),
                'url'   => osc_change_user_email_url(),
                'class' => 'opt_change_email'
            );
            $options[] = array(
                'name'  => __('Change username', 'azzurro'),
                'url'   => osc_change_user_username_url(),
                'class' => 'opt_change_username'
            );
            $options[] = array(
                'name'  => __('Change password', 'azzurro'),
                'url'   => osc_change_user_password_url(),
                'class' => 'opt_change_password'
            );
            $options[] = array(
                'name'  => __('Delete account', 'azzurro'),
                'url'   => '#',
                'class' => 'opt_delete_account'
            );

            return $options;
        }
    }

    if( !function_exists('delete_user_js') ) {
        function delete_user_js() {
            $location = Rewrite::newInstance()->get_location();
            $section  = Rewrite::newInstance()->get_section();
            if( ($location === 'user' && in_array($section, array('dashboard', 'profile', 'alerts', 'change_email', 'change_username',  'change_password', 'items'))) || (Params::getParam('page') ==='custom' && Params::getParam('in_user_menu')==true ) ) {
                osc_enqueue_script('delete-user-js');
            }
        }
        osc_add_hook('header', 'delete_user_js', 1);
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
    azzurro.user = {};
    azzurro.user.id = '<?php echo osc_user_id(); ?>';
    azzurro.user.secret = '<?php echo osc_user_field("s_secret"); ?>';
</script>
            <?php }
        }
        osc_add_hook('header', 'user_info_js');
    }

    function theme_azzurro_actions_admin() {
        //if(OC_ADMIN)
        if( Params::getParam('file') == 'oc-content/themes/azzurro/admin/settings.php' ) {
            if( Params::getParam('donation') == 'successful' ) {
                osc_set_preference('donation', '1', 'azzurro_theme');
                osc_reset_preferences();
            }
        }

        switch( Params::getParam('action_specific') ) {
            case('settings'):
                $footerLink  = Params::getParam('footer_link');

                osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'azzurro_theme');
                osc_set_preference('footer_link', ($footerLink ? '1' : '0'), 'azzurro_theme');
                osc_set_preference('defaultShowAs@all', Params::getParam('defaultShowAs@all'), 'azzurro_theme');
                osc_set_preference('defaultShowAs@search', Params::getParam('defaultShowAs@all'));
                osc_set_preference('defaultLocationShowAs', Params::getParam('defaultLocationShowAs'), 'azzurro_theme');
                osc_set_preference('header-728x90',         trim(Params::getParam('header-728x90', false, false, false)),                  'azzurro');
                osc_set_preference('homepage-728x90',       trim(Params::getParam('homepage-728x90', false, false, false)),                'azzurro');
                osc_set_preference('sidebar-300x250',       trim(Params::getParam('sidebar-300x250', false, false, false)),                'azzurro');
                osc_set_preference('search-results-top-728x90',     trim(Params::getParam('search-results-top-728x90', false, false, false)),          'azzurro');
                osc_set_preference('search-results-middle-728x90',  trim(Params::getParam('search-results-middle-728x90', false, false, false)),       'azzurro');

                osc_add_flash_ok_message(__('Theme settings updated correctly', 'azzurro'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/azzurro/admin/settings.php'));
            break;
            case('upload_logo'):
                $package = Params::getFiles('logo');
                if( $package['error'] == UPLOAD_ERR_OK ) {
                    $img = ImageResizer::fromFile($package['tmp_name']);
                    $ext = $img->getExt();
                    $logo_name     = 'azzurro_logo';
                    $logo_name    .= '.'.$ext;
                    $path = osc_uploads_path() . $logo_name ;
                    $img->saveToFile($path);

                    osc_set_preference('logo', $logo_name, 'azzurro_theme');

                    osc_add_flash_ok_message(__('The logo image has been uploaded correctly', 'azzurro'), 'admin');
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again", 'azzurro'), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/azzurro/admin/header.php'));
            break;
            case('remove'):
                $logo = osc_get_preference('logo','azzurro_theme');
                $path = osc_uploads_path() . $logo ;
                if(file_exists( $path ) ) {
                    @unlink( $path );
                    osc_delete_preference('logo','azzurro_theme');
                    osc_reset_preferences();
                    osc_add_flash_ok_message(__('The logo image has been removed', 'azzurro'), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found", 'azzurro'), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/azzurro/admin/header.php'));
            break;
        }
    }

    function azzurro_redirect_user_dashboard()
    {
        if( (Rewrite::newInstance()->get_location() === 'user') && (Rewrite::newInstance()->get_section() === 'dashboard') ) {
            header('Location: ' .osc_user_list_items_url());
            exit;
        }
    }

    function azzurro_delete() {
        Preference::newInstance()->delete(array('s_section' => 'azzurro'));
    }

    osc_add_hook('init', 'azzurro_redirect_user_dashboard', 2);
    osc_add_hook('init_admin', 'theme_azzurro_actions_admin');
    osc_add_hook('theme_delete_azzurro', 'azzurro_delete');
    osc_admin_menu_appearance(__('Header logo', 'azzurro'), osc_admin_render_theme_url('oc-content/themes/azzurro/admin/header.php'), 'header_azzurro');
    osc_admin_menu_appearance(__('Theme settings', 'azzurro'), osc_admin_render_theme_url('oc-content/themes/azzurro/admin/settings.php'), 'settings_azzurro');
/**

TRIGGER FUNCTIONS

*/
check_install_azzurro_theme();
if(osc_is_home_page()){
    osc_add_hook('sidebar-catmain-azzurro','azzurro_draw_categories_list');
} else if( osc_is_static_page() || osc_is_contact_page() ){
    osc_add_hook('before-content','azzurro_draw_categories_list');
}

if(osc_is_home_page() || osc_is_search_page()){
    azzurro_add_body_class('has-searchbox');
}


function azzurro_sidebar_category_search($catId = null)
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

    azzurro_print_sidebar_category_search($aCategories, $catId);
}

function azzurro_print_sidebar_category_search($aCategories, $current_category = null, $i = 0)
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
            echo '<li><a href="'.osc_esc_html(osc_update_search_url(array('sCategory'=>null, 'iPage'=>null))).'">'.__('All categories', 'azzurro')."</a></li>";
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
        <li><a href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=>null, 'iPage'=>null))); ?>"><?php _e('All categories', 'azzurro'); ?></a></li>
        <?php } ?>
            <li>
                <a id="cat_<?php echo osc_esc_html($c['pk_i_id']);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $c['pk_i_id'], 'iPage'=>null))); ?>">
                <?php if(isset($current_category) && $current_category == $c['pk_i_id']){ echo '<strong>'.$c['s_name'].'</strong>'; }
                      else{ echo $c['s_name']; } ?>
                </a>
                <?php azzurro_print_sidebar_category_search($aCategories, $current_category, $i); ?>
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
class azzurroBodyClass
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
if( !function_exists('osc_uploads_url')) {
    function osc_uploads_url($item = '') {
        $logo = osc_get_preference('logo', 'azzurro_theme');
        if ($logo != '' && file_exists(osc_uploads_path() . $logo)) {
            $path = str_replace(ABS_PATH, '', osc_uploads_path() . '/');
            return osc_base_url() . $path . $item;
        }
    }
}    

/** 
statcount

*/

    function azzurro_statcount() {
 require 'stat-counter.php';
 

}
    osc_add_hook('footer', 'azzurro_statcount');



/*

    ads  SEARCH

 */
function search_vista_listing_top_azzu_fn() {
    if(osc_get_preference('search-results-top-728x90', 'azzurro')!='') {
        echo '<div class="clear"></div>' . PHP_EOL;
        echo '<div class="vista_728">' . PHP_EOL;
        echo osc_get_preference('search-results-top-728x90', 'azzurro');
        echo '</div>' . PHP_EOL;
    }
}
//osc_add_hook('search_vista_listing_top', 'search_vista_listing_top_azzu_fn');

function search_vista_listing_medium_azzu_fn() {
    if(osc_get_preference('search-results-middle-728x90', 'azzurro')!='') {
        echo '<div class="clear"></div>' . PHP_EOL;
        echo '<div class="vista_728">' . PHP_EOL;
        echo osc_get_preference('search-results-middle-728x90', 'azzurro');
        echo '</div>' . PHP_EOL;
    }
}
osc_add_hook('search_vista_listing_medium', 'search_vista_listing_medium_azzu_fn');

?>
