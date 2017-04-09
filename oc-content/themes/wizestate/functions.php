<?php
define('OSCLASSWIZARDS_THEME_VERSION', '1.0.2');
define('OSCLASSWIZARDS_THEME_FOLDER', 'wizestate');
if( !osc_get_preference('keyword_placeholder', 'osclasswizards_theme') ) {
	osc_set_preference('keyword_placeholder', osc_esc_html(__('ie. PHP Programmer', OSCLASSWIZARDS_THEME_FOLDER)), 'osclasswizards_theme');
}
osc_register_script('jquery', osc_current_web_theme_url('js/jquery.min.js'));
osc_register_script('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.pack.js'), array('jquery'));
osc_enqueue_style('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.css'));
osc_enqueue_script('fancybox');

osc_enqueue_style('font-awesome', osc_current_web_theme_url('css/font-awesome/css/font-awesome.min.css'));
// used for date/dateinterval custom fields
osc_enqueue_script('php-date');
if(!OC_ADMIN) {
	osc_enqueue_style('fine-uploader-css', osc_assets_url('js/fineuploader/fineuploader.css'));
	osc_enqueue_style('osclasswizards-fine-uploader-css', osc_current_web_theme_url('css/ajax-uploader.css'));
}
osc_enqueue_script('jquery-fineuploader');

if( !osc_get_preference('sub_cat_limit', 'osclasswizards_theme') ) {
	osc_set_preference('sub_cat_limit', 5, 'osclasswizards_theme');
}

if( !osc_get_preference('locations_input_as', 'osclasswizards_theme') ) {
	osc_set_preference('locations_input_as', 'text', 'osclasswizards_theme');
}	
if( !osc_get_preference('premium_listings_shown_home', 'osclasswizards_theme') ) {
	osc_set_preference('premium_listings_shown_home', 6, 'osclasswizards_theme');
}
if( !osc_get_preference('premium_listings_shown', 'osclasswizards_theme') ) {
	osc_set_preference('premium_listings_shown', 6, 'osclasswizards_theme');
}

if( !osc_get_preference('title_minimum_length', 'osclasswizards_theme') ) {
	osc_set_preference('title_minimum_length', 1, 'osclasswizards_theme');
}	

if( !osc_get_preference('description_minimum_length', 'osclasswizards_theme') ) {
	osc_set_preference('description_minimum_length', 3, 'osclasswizards_theme');
}

if( !osc_get_preference('items_shown_map', 'osclasswizards_theme') ) {
	osc_set_preference('items_shown_map', 20, 'osclasswizards_theme');
}
if( osc_get_preference('first_load_cat_icons', 'osclasswizards_theme_cat_icons') == "" ){
	osc_set_preference('cat-icons-1', 'SHOPPING-CART', 'osclasswizards_theme_cat_icons');
	osc_set_preference('cat-icons-2', 'CAR', 'osclasswizards_theme_cat_icons');
	osc_set_preference('cat-icons-3', 'BULLHORN', 'osclasswizards_theme_cat_icons');
	osc_set_preference('cat-icons-4', 'HOME', 'osclasswizards_theme_cat_icons');
	osc_set_preference('cat-icons-5', 'WRENCH', 'osclasswizards_theme_cat_icons');
	osc_set_preference('cat-icons-6', 'USERS', 'osclasswizards_theme_cat_icons');
	osc_set_preference('cat-icons-7', 'HEART', 'osclasswizards_theme_cat_icons');
	osc_set_preference('cat-icons-8', 'SUITCASE', 'osclasswizards_theme_cat_icons');
	
	osc_set_preference('first_load_cat_icons', 'loaded', 'osclasswizards_theme_cat_icons');
}
if( !osc_get_preference('theme_color_mode', 'osclasswizards_theme') ) {
	osc_set_preference('theme_color_mode', 'green', 'osclasswizards_theme');
}
if( !osc_get_preference('theme_color', 'osclasswizards_theme') ) {
	osc_set_preference('theme_color', '#77c04b', 'osclasswizards_theme');
}
if( !osc_get_preference('facebook-url', 'osclasswizards_theme') ) {
	osc_set_preference('facebook-url', 'https://www.facebook.com/osclasswizards', 'osclasswizards_theme');
}
if( !osc_get_preference('facebook-width', 'osclasswizards_theme') ) {
	osc_set_preference('facebook-width', 340, 'osclasswizards_theme');
}
if( !osc_get_preference('facebook-height', 'osclasswizards_theme') ) {
	osc_set_preference('facebook-height', 400, 'osclasswizards_theme');
}
osc_reset_preferences();
if( !function_exists('osclasswizards_theme_install') ) {
	function osclasswizards_theme_install() {
		osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'osclasswizards_theme');
		osc_set_preference('version', OSCLASSWIZARDS_THEME_VERSION, 'osclasswizards_theme');
		osc_set_preference('premium_listings_slider', 1, 'osclasswizards_theme');
		osc_set_preference('defaultShowAs@all', 'list', 'osclasswizards_theme');
		osc_set_preference('defaultShowAs@search', 'list');
		osc_set_preference('show_sub_cat', '1', 'osclasswizards_theme');
		osc_set_preference('sub_cat_limit', 5, 'osclasswizards_theme');
		osc_set_preference('theme_color', '#77c04b', 'osclasswizards_theme');
		osc_reset_preferences();
	}
}
if( !function_exists('osclasswizards_theme_update') ) {
	function osclasswizards_theme_update() {
		osc_delete_preference('default_logo', 'osclasswizards_theme');

		$logo_prefence = osc_get_preference('logo', 'osclasswizards_theme');
		$logo_name     = 'osclasswizards_logo';
		$temp_name     = WebThemes::newInstance()->getCurrentThemePath() . 'images/logo.jpg';
		if( file_exists( $temp_name ) && !$logo_prefence) {

			$img = ImageResizer::fromFile($temp_name);
			$ext = $img->getExt();
			$logo_name .= '.'.$ext;
			$img->saveToFile(osc_uploads_path().$logo_name);
			@unlink($temp_name);
			osc_set_preference('logo', $logo_name, 'osclasswizards_theme');
		}
		osc_reset_preferences();
	}
}
if(!function_exists('check_install_osclasswizards_theme')) {
	function check_install_osclasswizards_theme() {
		$current_version = osc_get_preference('version', 'osclasswizards_theme');
		//check if current version is installed or need an update<
		if( !$current_version ) {
			osclasswizards_theme_install();
		} else if($current_version < OSCLASSWIZARDS_THEME_VERSION){
			osclasswizards_theme_update();
		}
	}
}

if(!function_exists('osclasswizards_add_body_class_construct')) {
	function osclasswizards_add_body_class_construct($classes){
		$osclasswizardsBodyClass = osclasswizardsBodyClass::newInstance();
		$classes = array_merge($classes, $osclasswizardsBodyClass->get());
		return $classes;
	}
}
if(!function_exists('osclasswizards_body_class')) {
	function osclasswizards_body_class($echo = true){
		osc_add_filter('osclasswizards_bodyClass','osclasswizards_add_body_class_construct');
		$classes = osc_apply_filter('osclasswizards_bodyClass', array());
		if($echo && count($classes)){
			echo 'class="'.implode(' ',$classes).'"';
		} else {
			return $classes;
		}
	}
}
if(!function_exists('osclasswizards_add_body_class')) {
	function osclasswizards_add_body_class($class){
		$osclasswizardsBodyClass = osclasswizardsBodyClass::newInstance();
		$osclasswizardsBodyClass->add($class);
	}
}
if(!function_exists('osclasswizards_nofollow_construct')) {
	function osclasswizards_nofollow_construct() {
		echo '<meta name="robots" content="noindex, nofollow, noarchive" />' . PHP_EOL;
		echo '<meta name="googlebot" content="noindex, nofollow, noarchive" />' . PHP_EOL;

	}
}
if( !function_exists('osclasswizards_follow_construct') ) {
	function osclasswizards_follow_construct() {
		echo '<meta name="robots" content="index, follow" />' . PHP_EOL;
		echo '<meta name="googlebot" content="index, follow" />' . PHP_EOL;

	}
}
if( !function_exists('logo_header') ) {
	function logo_header() {
		 $logo = osc_get_preference('logo','osclasswizards_theme');
		 $html = '<a href="'.osc_base_url().'"><img border="0" alt="' . osc_page_title() . '" src="' . osclasswizards_logo_url() . '"></a>';
		 if( $logo!='' && file_exists( osc_uploads_path() . $logo ) ) {
			return $html;
		 } else {
			return '<a href="'.osc_base_url().'">'.osc_page_title().'</a>';
		}
	}
}
if( !function_exists('homepage_image') ) {
	function homepage_image() {
		 $logo = osc_get_preference('homeimage','osclasswizards_theme');
		 $html = '<img border="0" alt="' . osc_page_title() . '" src="' . osclasswizards_homeimage_url() . '">';
		 if( $logo!='' && file_exists( osc_uploads_path() . $logo ) ) {
			return $html;
		 } else {
			return false;
		}
	}
}
if( !function_exists('osclasswizards_favicon_url') ) {
	function osclasswizards_favicon_url() {
		$logo = osc_get_preference('favicon','osclasswizards_theme');
		if( $logo ) {
			return osc_uploads_url($logo);
		}
		else
		{
			return osc_current_web_theme_url('images/favicon.png'); 
		}
	}
}
if( !function_exists('osclasswizards_logo_url') ) {
	function osclasswizards_logo_url() {
		$logo = osc_get_preference('logo','osclasswizards_theme');
		if( $logo ) {
			return osc_uploads_url($logo);
		}
		return false;
	}
}
if( !function_exists('osclasswizards_homeimage_url') ) {
	function osclasswizards_homeimage_url() {
		$logo = osc_get_preference('homeimage','osclasswizards_theme');
		if( $logo ) {
			return osc_uploads_url($logo);
		}
		return false;
	}
}
if( !function_exists('osclasswizards_draw_item') ) {
	function osclasswizards_draw_item($class = false,$admin = false, $premium = false) {
		$filename = 'loop-single';
		if($premium){
			$filename .='-premium';
		}
		require WebThemes::newInstance()->getCurrentThemePath().$filename.'.php';
	}
}


if( !function_exists('osclasswizards_draw_categories_list') ) {
	function osclasswizards_draw_categories_list(){ ?>
<?php if(!osc_is_home_page()){ echo '<div class="resp-wrapper">'; } ?>

<h1 class="title"><?php _e('Categories', OSCLASSWIZARDS_THEME_FOLDER);?></h1>
<div class="row wizards block_row">
<?php
//cell_3
$total_categories   = osc_count_categories();
$col1_max_cat       = ceil($total_categories/1);
osc_goto_first_category();
$catcount	=	0;
while ( osc_has_categories() ) {
?>
<ul class="item col-sm-6 col-md-3 grid_list">
<li>
<section class="listings">
<h2><i class="fa fa-<?php echo osclasswizards_category_icon( osc_category_id() ); ?>"></i>
<?php
	$_slug      = osc_category_slug();
	$_url       = osc_search_category_url();
	$_name      = osc_category_name();
	$_total_items = osc_category_total_items();

?>
  <?php if($_total_items > 0) { ?>
  <a class="category <?php echo $_slug; ?>" href="<?php echo $_url; ?>"><?php echo $_name ; ?></a> <span><?php echo $_total_items ; ?></span>
  <?php } else { ?>
  <a class="category <?php echo $_slug; ?>" href="#"><?php echo $_name ; ?></a> <span><?php echo $_total_items ; ?></span>
  <?php } ?>
</h2>
<?php if((osc_get_preference('show_sub_cat', 'osclasswizards_theme') == '1')){?>
	<?php if ( osc_count_subcategories() > 0 ){ $m=1; ?>
	<ul>
	  <?php while ( osc_has_subcategories() ) { if( $m<=(osc_get_preference('sub_cat_limit', 'osclasswizards_theme'))){?>
	  <li>
		<?php if( osc_category_total_items() > 0 ) { ?>
		<a class="category sub-category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a> <span>(<?php echo osc_category_total_items() ; ?>)</span>
		<?php } else { ?>
		<a class="category sub-category <?php echo osc_category_slug() ; ?>" href="#"><?php echo osc_category_name() ; ?></a> <span>(<?php echo osc_category_total_items() ; ?>)</span>
		<?php } ?>
	  </li>
	  <?php } $m++; } if($m>(osc_get_preference('sub_cat_limit', 'osclasswizards_theme'))+1) {?>
	  <li class="last"><a href="<?php echo $_url; ?>"><strong><?php _e('See All listings...', OSCLASSWIZARDS_THEME_FOLDER);?></strong></a></li>
	  <?php } ?>
	</ul>
	<?php } ?> 
<?php } ?>
</section>
</li>
</ul>
<?php
}
?>
</div>
<?php
	}
}
if( !function_exists('osclasswizards_search_number') ) {
	function osclasswizards_search_number() {
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
if( !function_exists('osclasswizards_item_title') ) {
	function osclasswizards_item_title() {
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
if( !function_exists('osclasswizards_item_description') ) {
	function osclasswizards_item_description() {
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
		$lang['item_add']               = __('Publish a listing', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['item_edit']              = __('Edit your listing', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['item_send_friend']       = __('Send to a friend', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['item_contact']           = __('Contact publisher', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['search']                 = __('Search results', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['search_pattern']         = __('Search results: %s', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['user_dashboard']         = __('Dashboard', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['user_dashboard_profile'] = __("%s's profile", OSCLASSWIZARDS_THEME_FOLDER);
		$lang['user_account']           = __('Account', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['user_items']             = __('Listings', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['user_alerts']            = __('Alerts', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['user_profile']           = __('Update account', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['user_change_email']      = __('Change email', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['user_change_username']   = __('Change username', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['user_change_password']   = __('Change password', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['login']                  = __('Login', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['login_recover']          = __('Recover password', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['login_forgot']           = __('Change password', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['register']               = __('Create a new account', OSCLASSWIZARDS_THEME_FOLDER);
		$lang['contact']                = __('Contact', OSCLASSWIZARDS_THEME_FOLDER);
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
			'name' => __('Public Profile', OSCLASSWIZARDS_THEME_FOLDER),
			 'url' => osc_user_public_profile_url(),
		   'class' => 'opt_publicprofile'
		);
		$options[] = array(
			'name'  => __('Listings', OSCLASSWIZARDS_THEME_FOLDER),
			'url'   => osc_user_list_items_url(),
			'class' => 'opt_items'
		);
		$options[] = array(
			'name' => __('Alerts', OSCLASSWIZARDS_THEME_FOLDER),
			'url' => osc_user_alerts_url(),
			'class' => 'opt_alerts'
		);
		$options[] = array(
			'name'  => __('Account', OSCLASSWIZARDS_THEME_FOLDER),
			'url'   => osc_user_profile_url(),
			'class' => 'opt_account'
		);
		$options[] = array(
			'name'  => __('Change email', OSCLASSWIZARDS_THEME_FOLDER),
			'url'   => osc_change_user_email_url(),
			'class' => 'opt_change_email'
		);
		$options[] = array(
			'name'  => __('Change username', OSCLASSWIZARDS_THEME_FOLDER),
			'url'   => osc_change_user_username_url(),
			'class' => 'opt_change_username'
		);
		$options[] = array(
			'name'  => __('Change password', OSCLASSWIZARDS_THEME_FOLDER),
			'url'   => osc_change_user_password_url(),
			'class' => 'opt_change_password'
		);
		$options[] = array(
			'name'  => __('Delete account', OSCLASSWIZARDS_THEME_FOLDER),
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
osclasswizards.user = {};
osclasswizards.user.id = '<?php echo osc_user_id(); ?>';
osclasswizards.user.secret = '<?php echo osc_user_field("s_secret"); ?>';
</script>
<?php }
	}
	osc_add_hook('header', 'user_info_js');
}
function osclasswizards_add_google_fonts(){
	if(osclasswizards_google_fonts_body())
		echo "<link href='http://fonts.googleapis.com/css?family=".osclasswizards_google_fonts_body().":100, 300, 400, 700' rel='stylesheet' type='text/css'>";
	if(osclasswizards_google_fonts_heading())
		echo "<link href='http://fonts.googleapis.com/css?family=".osclasswizards_google_fonts_heading().":100, 300, 400, 700' rel='stylesheet' type='text/css'>";
echo "<style>body {
font-family: '".str_replace('+',' ',osclasswizards_google_fonts_body())."', sans-serif;	
}
h1, h2, h3, h4, h5, h6{
		font-family: '".str_replace('+',' ',osclasswizards_google_fonts_heading())."', sans-serif;	
	}

</style>";
}
function theme_osclasswizards_actions_admin() {
	if( Params::getParam('file') == 'oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php' ) {
		if( Params::getParam('donation') == 'successful' ) {
			osc_set_preference('donation', '1', 'osclasswizards_theme');
			osc_reset_preferences();
		}
	}
	switch( Params::getParam('action_specific') ) {
		case('settings'):
			osc_set_preference('welcome_message',  trim(Params::getParam('welcome_message', false, false, false)), 'osclasswizards_theme');
			osc_set_preference('footer_message',  trim(Params::getParam('footer_message', false, false, false)), 'osclasswizards_theme');
			
			osc_add_flash_ok_message(__('Theme settings updated correctly', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php'));
		break;
		case('templates_home'):
			osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'osclasswizards_theme');
			osc_set_preference('premium_listings_slider', ((Params::getParam('premium_listings_slider'))? '1' : '0'), 'osclasswizards_theme');
			osc_set_preference('premium_listings_shown_home', Params::getParam('premium_listings_shown_home'), 'osclasswizards_theme');
			osc_set_preference('show_sub_cat', ((Params::getParam('show_sub_cat'))? '1' : '0'), 'osclasswizards_theme');
			osc_set_preference('sub_cat_limit', Params::getParam('sub_cat_limit'), 'osclasswizards_theme');

			osc_add_flash_ok_message(__('Templates settings updated correctly', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			osc_redirect_to(osc_admin_render_theme_url( 'oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#templates' ));
			break;
		case('templates_search'):
			osc_set_preference('premium_listings_shown', Params::getParam('premium_listings_shown'), 'osclasswizards_theme');
			osc_add_flash_ok_message(__('Templates settings updated correctly', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			osc_redirect_to(osc_admin_render_theme_url( 'oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#templates' ));break;
		case('templates_item_post'):
			$locations_input_as	=	Params::getParam('locations_input_as', 'osclasswizards_theme');
			$locations_required	=	Params::getParam('locations_required', 'osclasswizards_theme');
			$category_multiple_selects	=	Params::getParam('category_multiple_selects', 'osclasswizards_theme');
			osc_set_preference('title_minimum_length', Params::getParam('title_minimum_length', 'osclasswizards_theme'), 'osclasswizards_theme');
			osc_set_preference('description_minimum_length', Params::getParam('description_minimum_length', 'osclasswizards_theme'), 'osclasswizards_theme');
			osc_set_preference('locations_input_as', $locations_input_as, 'osclasswizards_theme');
			osc_set_preference('locations_required', ($locations_required ? '1' : '0'), 'osclasswizards_theme');
			osc_set_preference('category_multiple_selects', ($category_multiple_selects ? '1' : '0'), 'osclasswizards_theme');

			osc_add_flash_ok_message(__('Templates settings updated correctly', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			osc_redirect_to(osc_admin_render_theme_url( 'oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#templates' ));
		break;
		case('ads_mgmt'):
			osc_set_preference('header-728x90',         trim(Params::getParam('header-728x90', false, false, false)),                  'osclasswizards_theme');
			osc_set_preference('homepage-728x90',       trim(Params::getParam('homepage-728x90', false, false, false)),                'osclasswizards_theme');
			osc_set_preference('home_sidebar_ad',       trim(Params::getParam('home_sidebar_ad', false, false, false)),                'osclasswizards_theme');
			osc_set_preference('sidebar-300x250',       trim(Params::getParam('sidebar-300x250', false, false, false)),                'osclasswizards_theme');
			osc_set_preference('search-results-top-728x90',     trim(Params::getParam('search-results-top-728x90', false, false, false)),          'osclasswizards_theme');
			osc_set_preference('search-results-middle-728x90',  trim(Params::getParam('search-results-middle-728x90', false, false, false)),       'osclasswizards_theme');

			osc_add_flash_ok_message(__('Ads management updated correctly', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			osc_redirect_to(osc_admin_render_theme_url( 'oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#ads' ));
		break;
		case('categories_icons'):
			$catsIcons  = Params::getParam('cat-icons');
			foreach($catsIcons as $catId => $iconName)
			{
				osc_set_preference('cat-icons-'.$catId, $iconName, 'osclasswizards_theme_cat_icons');
			}
			osc_add_flash_ok_message(__('Category icons settings updated correctly', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			osc_redirect_to(osc_admin_render_theme_url( 'oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#category-icons' ));
		break;
		case('theme_style'):	
			$color_mode  = Params::getParam('theme_color_mode');
			osc_set_preference('theme_color_mode', $color_mode, 'osclasswizards_theme');
			osc_set_preference('wiz_body_fonts', Params::getParam('body_fonts'), 'osclasswizards_theme');
			osc_set_preference('wiz_heading_fonts', Params::getParam('heading_fonts'), 'osclasswizards_theme');
			
			$rtl_view	=	Params::getParam('rtl_view', 'osclasswizards_theme');
			osc_set_preference('rtl_view', ($rtl_view ? '1' : '0'), 'osclasswizards_theme');
			osc_set_preference('custom_css', trim(Params::getParam('custom_css', false, false, false)), 'osclasswizards_theme');
			
			osc_add_flash_ok_message(__('Theme style settings updated correctly', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			osc_redirect_to(osc_admin_render_theme_url( 'oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php' ));
		break;
		case('banner'):	
			osc_set_preference('banner-title',         trim(Params::getParam('banner-title', false, false, false)),                  'osclasswizards_theme');

			osc_add_flash_ok_message(__('Banner settings updated correctly', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			osc_redirect_to(osc_admin_render_theme_url( 'oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#banner' ));
		break;
		case('facebook'):	
			osc_set_preference('facebook-url',         trim(Params::getParam('facebook-url', false, false, false)),                  'osclasswizards_theme');
			osc_set_preference('facebook-width',       trim(Params::getParam('facebook-width', false, false, false)),                'osclasswizards_theme');
			osc_set_preference('facebook-height',         trim(Params::getParam('facebook-height', false, false, false)),                  'osclasswizards_theme');
			osc_set_preference('facebook-hidecover',       trim(Params::getParam('facebook-hidecover', false, false, false)),                'osclasswizards_theme');
			osc_set_preference('facebook-showface',       trim(Params::getParam('facebook-showface', false, false, false)),                'osclasswizards_theme');
			osc_set_preference('facebook-showpost',       trim(Params::getParam('facebook-showpost', false, false, false)),                'osclasswizards_theme');
			osc_set_preference('facebook-showitem',       trim(Params::getParam('facebook-showitem', false, false, false)),                'osclasswizards_theme');
			osc_set_preference('facebook-showsearch',       trim(Params::getParam('facebook-showsearch', false, false, false)),                'osclasswizards_theme');

			osc_add_flash_ok_message(__('Facebook Page settings updated correctly', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			osc_redirect_to(osc_admin_render_theme_url( 'oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#facebook' ));
		break;
		case('upload_favicon'):
			$package = Params::getFiles('favicon');
			if( $package['error'] == UPLOAD_ERR_OK ) {
				$img = ImageResizer::fromFile($package['tmp_name']);
				$ext = $img->getExt();
				$logo_name     = 'favicon';
				$logo_name    .= '.'.$ext;
				$path = osc_uploads_path() . $logo_name ;
				$img->saveToFile($path);

				osc_set_preference('favicon', $logo_name, 'osclasswizards_theme');

				osc_add_flash_ok_message(__('The favicon image has been uploaded correctly', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			} else {
				osc_add_flash_error_message(__("An error has occurred, please try again", OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			}
			osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#image-uploads'));
		break;
		
		case('remove_favicon'):
			$logo = osc_get_preference('favicon','osclasswizards_theme');
			$path = osc_uploads_path() . $logo ;
			if(file_exists( $path ) ) {
				@unlink( $path );
				osc_delete_preference('favicon','osclasswizards_theme');
				osc_reset_preferences();
				osc_add_flash_ok_message(__('The favicon image has been removed', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			} else {
				osc_add_flash_error_message(__("Image not found", OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			}
			osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#image-uploads'));
		break;
		
		case('upload_logo'):
			$package = Params::getFiles('logo');
			if( $package['error'] == UPLOAD_ERR_OK ) {
				$img = ImageResizer::fromFile($package['tmp_name']);
				$ext = $img->getExt();
				$logo_name     = 'logo';
				$logo_name    .= '.'.$ext;
				$path = osc_uploads_path() . $logo_name ;
				$img->saveToFile($path);

				osc_set_preference('logo', $logo_name, 'osclasswizards_theme');

				osc_add_flash_ok_message(__('The logo image has been uploaded correctly', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			} else {
				osc_add_flash_error_message(__("An error has occurred, please try again", OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			}
			osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#image-uploads'));
		break;
		
		case('remove'):
			$logo = osc_get_preference('logo','osclasswizards_theme');
			$path = osc_uploads_path() . $logo ;
			if(file_exists( $path ) ) {
				@unlink( $path );
				osc_delete_preference('logo','osclasswizards_theme');
				osc_reset_preferences();
				osc_add_flash_ok_message(__('The logo image has been removed', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			} else {
				osc_add_flash_error_message(__("Image not found", OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			}
			osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#image-uploads'));
		break;
	
		case('upload_homeimage'):
			$package = Params::getFiles('homeimage');
			if( $package['error'] == UPLOAD_ERR_OK ) {
				$img = ImageResizer::fromFile($package['tmp_name']);
				$ext = $img->getExt();
				$logo_name     = 'banner';
				$logo_name    .= '.'.$ext;
				$path = osc_uploads_path() . $logo_name ;
				$img->saveToFile($path);

				osc_set_preference('homeimage', $logo_name, 'osclasswizards_theme');

				osc_add_flash_ok_message(__('The banner image has been uploaded correctly', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			} else {
				osc_add_flash_error_message(__("An error has occurred, please try again", OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			}
			osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#image-uploads'));
		break;
		
		case('remove_homeimage'):
			$logo = osc_get_preference('homeimage','osclasswizards_theme');
			$path = osc_uploads_path() . $logo ;
			if(file_exists( $path ) ) {
				@unlink( $path );
				osc_delete_preference('homeimage','osclasswizards_theme');
				osc_reset_preferences();
				osc_add_flash_ok_message(__('The banner image has been removed', OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			} else {
				osc_add_flash_error_message(__("Image not found", OSCLASSWIZARDS_THEME_FOLDER), 'admin');
			}
			osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php#image-uploads'));
		break;		
	}
}
function osclasswizards_redirect_user_dashboard()
{
	if( (Rewrite::newInstance()->get_location() === 'user') && (Rewrite::newInstance()->get_section() === 'dashboard') ) {
		header('Location: ' .osc_user_list_items_url());
		exit;
	}
}
function osclasswizards_delete() {
	Preference::newInstance()->delete(array('s_section' => OSCLASSWIZARDS_THEME_FOLDER));
}

osc_add_hook('init', 'osclasswizards_redirect_user_dashboard', 2);
osc_add_hook('init_admin', 'theme_osclasswizards_actions_admin');
osc_add_hook('theme_delete_osclasswizards', 'osclasswizards_delete');
osc_admin_menu_appearance(__('OsclassWizards', OSCLASSWIZARDS_THEME_FOLDER), osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php'), 'settings_osclasswizards');

check_install_osclasswizards_theme();
if(osc_is_home_page()){
osc_add_hook('inside-main','osclasswizards_draw_categories_list');
} 
if(osc_is_home_page() || osc_is_search_page()){
osclasswizards_add_body_class('has-searchbox');
}

function osclasswizards_sidebar_category_search($catId = null)
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

osclasswizards_print_sidebar_category_search($aCategories, $catId);
}

function osclasswizards_print_sidebar_category_search($aCategories, $current_category = null, $i = 0)
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
		echo '<li><a href="'.osc_esc_html(osc_update_search_url(array('sCategory'=>null, 'iPage'=>null))).'">'.__('All categories', OSCLASSWIZARDS_THEME_FOLDER)."</a></li>";
	}
	foreach($c as $key => $value) {
?>
<li> <a id="cat_<?php echo osc_esc_html($value['pk_i_id']);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $value['pk_i_id'], 'iPage'=>null))); ?>">
<?php if(isset($current_category) && $current_category == $value['pk_i_id']){ echo '<strong>'.$value['s_name'].'</strong>'; }
			else{ echo $value['s_name']; } ?>
</a> </li>
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
<li><a href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=>null, 'iPage'=>null))); ?>">
<?php _e('All categories', OSCLASSWIZARDS_THEME_FOLDER); ?>
</a></li>
<?php } ?>
<li> <a id="cat_<?php echo osc_esc_html($c['pk_i_id']);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $c['pk_i_id'], 'iPage'=>null))); ?>">
<?php if(isset($current_category) && $current_category == $c['pk_i_id']){ echo '<strong>'.$c['s_name'].'</strong>'; }
				  else{ echo $c['s_name']; } ?>
</a>
<?php osclasswizards_print_sidebar_category_search($aCategories, $current_category, $i); ?>
</li>
<?php if($i==1) { ?>
<?php } ?>
</ul>
<?php
}
}

//item post form validate
function osclasswizards_item_post_form_validate(){
?>
<script type="text/javascript">
//form validate
$(document).ready(function(){
	$('#regionId, #cityId').removeAttr('disabled');
});
$('form[name=item]').validate({
	rules: {
		catId: {
			required: true,
			digits: true
		},
		'title[<?php echo osc_current_user_locale();?>]': {
			required:true,
			minlength:<?php echo osclasswizards_title_minimum_length();?>
		},
		'description[<?php echo osc_current_user_locale();?>]': {
			minlength:<?php echo osclasswizards_description_minimum_length();?>
		},
		price: {
			maxlength: 50
		},
		currency: "required",
		"photos[]": {
			accept: "png,gif,jpg,jpeg"
		},
		contactName: {
			required: true,
			minlength: 3,
			maxlength: 35
		},
		contactEmail: {
			required: true,
			email: true
		},
		countryId:{
			required: <?php echo osclasswizards_locations_required(); ?>
		},
		region: {
			required: <?php echo osclasswizards_locations_required(); ?>,
			minlength: 3,
			maxlength: 100
		},
		city: {
			required: <?php echo osclasswizards_locations_required(); ?>,
			minlength: 3,
			maxlength: 100
		}
		<?php if(osclasswizards_locations_input_as()=='select'){ ?>
		,
		regionId: {
			required: <?php echo osclasswizards_locations_required(); ?>
		},
		cityId: {
			required: <?php echo osclasswizards_locations_required(); ?>
		}
		<?php } ?>
		
	},
	messages: {
		catId: {
		required: "<?php echo osc_esc_js(__("Choose one category", OSCLASSWIZARDS_THEME_FOLDER)); ?>."
		},
		'title[<?php echo osc_current_user_locale();?>]': {
			required: "<?php echo osc_esc_js(__("Title: this field is required", OSCLASSWIZARDS_THEME_FOLDER)); ?>.",
			minlength: "<?php echo osc_esc_js(__("Title too short", OSCLASSWIZARDS_THEME_FOLDER)); ?>."
		},
		'description[<?php echo osc_current_user_locale();?>]': {
			minlength: "<?php echo osc_esc_js(__("Description too short", OSCLASSWIZARDS_THEME_FOLDER)); ?>."
		},
		price: {
			maxlength: "<?php echo osc_esc_js(__("Price: no more than 50 characters", OSCLASSWIZARDS_THEME_FOLDER)); ?>."
		},
		currency: "<?php echo osc_esc_js(__("Currency: make your selection", OSCLASSWIZARDS_THEME_FOLDER)); ?>.",
		"photos[]": {
			accept: "<?php echo osc_esc_js(__("Photo: must be png,gif,jpg,jpeg", OSCLASSWIZARDS_THEME_FOLDER)); ?>."
		},
		contactName: {
			required: "<?php echo osc_esc_js(__("Name: this field is required", OSCLASSWIZARDS_THEME_FOLDER)); ?>.",
			minlength: "<?php echo osc_esc_js(__("Name: enter at least 3 characters", OSCLASSWIZARDS_THEME_FOLDER)); ?>.",
			maxlength: "<?php echo osc_esc_js(__("Name: no more than 35 characters", OSCLASSWIZARDS_THEME_FOLDER)); ?>."
		},
		contactEmail: {
			required: "<?php echo osc_esc_js(__("Email: this field is required", OSCLASSWIZARDS_THEME_FOLDER)); ?>.",
			email: "<?php echo osc_esc_js(__("Invalid email address", OSCLASSWIZARDS_THEME_FOLDER)); ?>."
		},
		countryId: {
			required: "<?php echo osc_esc_js(__("Please select a country", OSCLASSWIZARDS_THEME_FOLDER)); ?>."
		},
		region: {
			required: "<?php echo osc_esc_js(__("Region: this field is required", OSCLASSWIZARDS_THEME_FOLDER)); ?>.",
			minlength: "<?php echo osc_esc_js(__("Region: enter at least 3 characters", OSCLASSWIZARDS_THEME_FOLDER)); ?>.",
			maxlength: "<?php echo osc_esc_js(__("Region: no more than 100 characters", OSCLASSWIZARDS_THEME_FOLDER)); ?>."
		},
		city: {
			required: "<?php echo osc_esc_js(__("City: this field is required", OSCLASSWIZARDS_THEME_FOLDER)); ?>.",
			minlength: "<?php echo osc_esc_js(__("City: enter at least 3 characters", OSCLASSWIZARDS_THEME_FOLDER)); ?>.",
			maxlength: "<?php echo osc_esc_js(__("City: no more than 100 characters", OSCLASSWIZARDS_THEME_FOLDER)); ?>."
		}
		<?php if(osclasswizards_locations_input_as()=='select'){ ?>
		,
		regionId: {
			required: "<?php echo osc_esc_js(__("Region: this field is required", OSCLASSWIZARDS_THEME_FOLDER)); ?>."
		},
		cityId: {
			required: "<?php echo osc_esc_js(__("City: this field is required", OSCLASSWIZARDS_THEME_FOLDER)); ?>."
		}
		<?php } ?>
	},
	errorLabelContainer: "#error_list",
	wrapper: "li",
	invalidHandler: function(form, validator) {
		$('html,body').animate({ scrollTop: $('h1').offset().top }, { duration: 250, easing: 'swing'});
	},
	submitHandler: function(form){
		$('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
		setTimeout("$('button[type=submit], input[type=submit]').removeAttr('disabled')", 5000);
		form.submit();
	}
});
</script>
<?php
}

if(osc_is_publish_page() || osc_is_edit_page() ){
osc_add_hook('footer', 'osclasswizards_item_post_form_validate');
}

class osclasswizardsBodyClass
{
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

if( !function_exists('osc_uploads_url') ){
function osc_uploads_url($item = ''){
	return osc_base_url().'oc-content/uploads/'.$item;
}
}
function osclasswizards_premium_listings_slider(){
return osc_get_preference('premium_listings_slider', 'osclasswizards_theme');
}
function osclasswizards_premium_listings_shown_home(){
return osc_get_preference('premium_listings_shown_home', 'osclasswizards_theme');
}
function osclasswizards_title_minimum_length(){
return osc_get_preference('title_minimum_length', 'osclasswizards_theme');
}
function osclasswizards_description_minimum_length(){
return osc_get_preference('description_minimum_length', 'osclasswizards_theme');
}
function osclasswizards_premium_listings_shown(){
return osc_get_preference('premium_listings_shown', 'osclasswizards_theme');
}
function osclasswizards_locations_input_as(){
return osc_get_preference('locations_input_as', 'osclasswizards_theme');
}
function osclasswizards_locations_required(){
return (osc_get_preference('locations_required', 'osclasswizards_theme') == '1')? 'true': 'false';
}

function osclasswizards_regions_select($name, $id, $label){
    $name = osc_esc_html($name);
    $id = osc_esc_html($id);
    $label = osc_esc_html($label);
    
$aRegions = Region::newInstance()->listAll(); 
if(count($aRegions) > 0 ) { 
	$html  = '<select name="'.$name.'" id="'.$id.'">';
	$html .= '<option value="" id="sRegionSelect">'.$label.'</option>';
	foreach($aRegions as $region) { 
		$html .= '<option value="'. $region['pk_i_id'].'">'. $region['s_name'].'</option>';
	} 
	$html .= '</select>';
} 
echo $html;
}
function osclasswizards_cities_select($name, $id, $label){
    $name = osc_esc_html($name);
    $id = osc_esc_html($id);
    $label = osc_esc_html($label);
    
$html  = '<select name="'.$name.'" id="'.$id.'">';
$html .= '<option value="" id="sCitySelect">'.$label.'</option>';
if(osc_count_list_cities() > 0 ) {
	while(osc_has_list_cities() ) { 
		$html .= '<option value="'. osc_list_city_name().'">'. osc_list_city_name().'</option>';
	}
}
$html .= '</select>';

echo $html;
}
function osclasswizards_category_icon($catId){
$icon = osc_esc_html( strtolower(osc_get_preference('cat-icons-'.$catId, 'osclasswizards_theme_cat_icons') ) );
if($icon!="")
return strtolower($icon);
else
return "home";
}
function osclasswizards_theme_color_mode()
{
return osc_get_preference('theme_color_mode', 'osclasswizards_theme');

}

function osclasswizards_google_fonts_body()
{
return trim(osc_get_preference('wiz_body_fonts', 'osclasswizards_theme'));

}
function osclasswizards_google_fonts_heading()
{
return trim(osc_get_preference('wiz_heading_fonts', 'osclasswizards_theme'));

}
if(!function_exists('osclasswizards_geo_ip')){
function osclasswizards_geo_ip($item) {
$itemId = $item['pk_i_id'];
$aItem = Item::newInstance()->findByPrimaryKey($itemId);
$sAddress = (isset($aItem['s_address']) ? $aItem['s_address'] : '');
$sCity = (isset($aItem['s_city']) ? $aItem['s_city'] : '');
$sRegion = (isset($aItem['s_region']) ? $aItem['s_region'] : '');
$sCountry = (isset($aItem['s_country']) ? $aItem['s_country'] : '');
$address = sprintf('%s, %s, %s, %s', $sAddress, $sCity, $sRegion, $sCountry);
$response = osc_file_get_contents(sprintf('http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false', urlencode($address)));
$jsonResponse = json_decode($response);

if (isset($jsonResponse->results[0]->geometry->location) && count($jsonResponse->results[0]->geometry->location) > 0) 		{
	$location = $jsonResponse->results[0]->geometry->location;
	$lat = $location->lat;
	$lng = $location->lng;

	ItemLocation::newInstance()->update (array('d_coord_lat' => $lat
		,'d_coord_long' => $lng)
		,array('fk_i_item_id' => $itemId));
}
}
}
osc_add_hook('posted_item', 'osclasswizards_geo_ip');
osc_add_hook('edited_item', 'osclasswizards_geo_ip');
function osclasswizards_facebook_like_box(){
?>
<div class="fb-page" data-href="<?php echo osc_esc_html( osc_get_preference('facebook-url', 'osclasswizards_theme') ); ?>" data-width="<?php echo osc_esc_html( osc_get_preference('facebook-width', 'osclasswizards_theme') ); ?>" data-height="<?php echo osc_esc_html( osc_get_preference('facebook-height', 'osclasswizards_theme') ); ?>" data-hide-cover="<?php echo (osc_esc_html( osc_get_preference('facebook-hidecover', 'osclasswizards_theme')) == "1" ) ? "true":"false"; ?>" data-show-facepile="<?php echo (osc_esc_html( osc_get_preference('facebook-showface', 'osclasswizards_theme')) == "1" ) ? "true":"false"; ?>" data-show-posts="<?php echo (osc_esc_html( osc_get_preference('facebook-showpost', 'osclasswizards_theme')) == "1" ) ? "true":"false"; ?>"></div>
<?php
}
function osclasswizards_footer_css(){
osclasswizards_add_google_fonts();
$custom_css = trim(osc_get_preference('custom_css', 'osclasswizards_theme'));
if( $custom_css != "" ){
	echo "<style>";
	echo $custom_css;
	echo "</style>";
}
}
osc_add_hook('footer', 'osclasswizards_footer_css');

function osclasswizards_footer_js(){
echo '<script type="text/javascript" src="'.osc_current_web_theme_js_url('main.js').'"></script>';
}
osc_add_hook('footer', 'osclasswizards_footer_js');
function is_realEstate_enabled(){
if(class_exists('ModelRealEstate'))
	return true;
else
	return false;
}
function osclasswizards_realEstate_garages($id){
if( is_realEstate_enabled() ){
	$detail = ModelRealEstate::newInstance()->getAttributes( $id );

	if(!empty( $detail['i_num_garages'] ))
	{
		return $detail['i_num_garages'];
	}else{
		return "0";
	}
}
return;
}
function osclasswizards_realEstate_bathrooms($id){
if( is_realEstate_enabled() ){
	$detail = ModelRealEstate::newInstance()->getAttributes( $id );
	
	if(!empty( $detail['i_num_bathrooms'] ))
	{
		return $detail['i_num_bathrooms'];
	}else{
		return "0";
	}
}
return;
}
function osclasswizards_realEstate_floors($id){
if( is_realEstate_enabled() ){
	$detail = ModelRealEstate::newInstance()->getAttributes( $id );
	
	if(!empty( $detail['i_num_floors'] ))
	{
		return $detail['i_num_floors'];
	}else{
		return "0";
	}
}
return;
}
function osclasswizards_realEstate_rooms($id){
if( is_realEstate_enabled() ){
	$detail = ModelRealEstate::newInstance()->getAttributes( $id );
	
	if(!empty( $detail['i_num_rooms'] ))
	{
		return $detail['i_num_rooms'];
	}else{
		return "0";
	}
}
return;
}
function osclasswizards_realEstate_area($id){
if( is_realEstate_enabled() ){
	$detail = ModelRealEstate::newInstance()->getAttributes( $id );
	
	if(!empty( $detail['i_plot_area'] ))
	{
		return $detail['i_plot_area']."/m<sup>2</sup>";
	}else{
		return "0/m<sup>2</sup>";
	}
}
return;
}
function osclasswizards_realEstate_type($id){
if( is_realEstate_enabled() ){
	$detail = ModelRealEstate::newInstance()->getAttributes( $id );
	
	if(!empty( $detail['e_type'] ))
	{
		if($detail['e_type'] == "FOR SALE") $type = osc_esc_html(__('SALE', OSCLASSWIZARDS_THEME_FOLDER)); else $type = osc_esc_html(__('RENT', OSCLASSWIZARDS_THEME_FOLDER));
		return $type;
	}
}
return false;
}
?>