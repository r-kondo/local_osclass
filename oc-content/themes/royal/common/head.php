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
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title><?php echo meta_title(); ?></title>
<meta name="title" content="<?php echo osc_esc_html(meta_title()); ?>" />
<?php if( meta_description() != '' ) { ?>
<meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>
<?php if( function_exists('meta_keywords') ) { ?>
<?php if( meta_keywords() != '' ) { ?>
<meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
<?php } ?>
<?php } ?>
<?php if( osc_get_canonical() != '' ) { ?>
<link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
<?php } ?>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Expires" content="Fri, Jan 01 1970 00:00:00 GMT" />
<?php echo logo_footer(); ?>

<script type="text/javascript">
    var fileDefaultText = '<?php echo osc_esc_js( __('No file selected', 'royal') ); ?>';
    var fileBtnText     = '<?php echo osc_esc_js( __('Choose File', 'royal') ); ?>';
</script>

<script src="<?php echo osc_current_web_theme_js_url('jquery.min.js') ; ?>"></script>
<link rel="stylesheet" href="<?php echo osc_current_web_theme_styles_url('animate.css') ; ?>">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_styles_url('owl.theme.css') ; ?>">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_styles_url('owl.carousel.css') ; ?>">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_styles_url('bootstrap.min.css') ; ?>">
<script src="<?php echo osc_current_web_theme_js_url('nprogress.js') ; ?>"></script>
<link rel="stylesheet" href="<?php echo osc_current_web_theme_styles_url('nprogress.css') ; ?>">
<script src="<?php echo osc_current_web_theme_js_url('bootstrap.min.js') ; ?>"></script>
<link rel="stylesheet" href="<?php echo osc_current_web_theme_styles_url('color/'.osc_get_preference('color-royal', 'royal').'.css') ; ?>">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_styles_url('style.css') ; ?>">

<?php if(osc_get_preference('font_view', 'royal_theme') == "1") { ?>
<?php osc_current_web_theme_path('common/media.php'); ?>
<?php } ?>
<?php if(arabic_language_direction()=='rtl'){ ?>
<link href="<?php echo osc_current_web_theme_url('css/rtl.css') ; ?>" rel="stylesheet" type="text/css" />
<?php } ?>

<?php
osc_enqueue_style('composer', osc_current_web_theme_styles_url('js_composer.css') );
osc_enqueue_style('chosen-css', osc_current_web_theme_js_url('chosen/chosen.css') );
osc_enqueue_style('jquery-ui-datepicker', osc_assets_url('css/jquery-ui/jquery-ui.css'));
osc_enqueue_style('font', osc_current_web_theme_styles_url('css/font-awesome.css') );

osc_register_script('global-theme-js', osc_current_web_theme_js_url('global.js'), 'jquery');

osc_enqueue_script('jquery-ui');
osc_run_hook('header');

FieldForm::i18n_datePicker();

?>
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->