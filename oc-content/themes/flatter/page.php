<?php
    // meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');

    flatter_add_body_class('page');
    osc_current_web_theme_path('header.php') ;
?>
<div id="columns">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12 item-title">
        		<h2><?php echo osc_static_page_title(); ?></h2>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
            	<div id="content">
                	<?php echo osc_static_page_text(); ?>
                </div>
			</div>
        </div>
	</div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>