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
<style>body {
  padding-top: 0px;
}
select#royal_sCategory_chosen {
  border-radius: 0px;
}
.form-control {

  border-left: 1px solid #ddd;
}


</style>
<!-- header -->
<div class="header">
<nav class="navbar   navbar-site navbar-default" role="navigation">
<div class="container">
<div class="navbar-header">
<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only"><?php _e("Toggle navigation", 'royal'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
<a href="<?php echo osc_base_url(); ?>" class="navbar-brand logo logo-title"><?php echo logo_header(); ?></a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<?php if(osc_users_enabled()) { ?>
                <?php if( osc_is_web_user_logged_in() ) { ?>
                <li><a href="<?php echo osc_user_dashboard_url(); ?>"><?php echo sprintf(__('Hi %s', 'royal'), osc_logged_user_name() . '!'); ?></a></li>
                <li><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e("My account", 'royal'); ?></a></li>
                <li><a href="<?php echo osc_user_logout_url(); ?>"><?php _e("Logout", 'royal'); ?></a></li>
                <?php } else { ?>
                <?php if(osc_user_registration_enabled()) { ?>
               			<li><a href="<?php echo osc_register_account_url(); ?>"><?php _e("Register", 'royal'); ?></a></li>
                <?php }; ?>
                	<li><a href="<?php echo osc_user_login_url(); ?>"><?php _e("Login", 'royal'); ?></a></li>
                <?php } ?>
<?php } ?>

</ul>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<!-- メニュー表示(footerと同等) -->
	<?php osc_reset_static_pages(); ?>
	<?php while( osc_has_static_pages() ) { ?>
		<li><a href="<?php echo osc_static_page_url(); ?>">
	<?php echo osc_static_page_title(); ?> </a></li>
	<?php } ?>
	<?php if(osc_get_preference('blog-links', 'royal')!='' ) { ?>
		<li><a target="_blank" href="<?php echo osc_get_preference('blog-links', 'royal'); ?>"><?php echo osc_get_preference('blog-text', 'royal'); ?></a></li>
	<?php } ?>
</ul>
</div>
</div>
</nav>
</div>
<div class="horbar-bevel"></div>

<!-- ads -->
<div id="ads11"><div class="container">
<center><?php echo osc_get_preference('header-728x90', 'royal'); ?></center>
</div>
</div>
<!-- breadcrumb -->
<div id="ari"><div class="container">
<?php
    osc_show_widgets('header');

    $breadcrumb = osc_breadcrumb('&raquo;', false);
    if( $breadcrumb != '') { ?>
    <div class="col-md-12">
        <?php echo $breadcrumb; ?>
        <div class="clear"></div>
    </div>
<?php
    }
?>
</div></div>
<!-- flash -->
<div id="vera"><div class="container">
<div class="forcemessages-inline">
    <?php osc_show_flash_message(); ?>
</div>
</div></div>
<!-- content -->