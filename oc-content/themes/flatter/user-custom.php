<?php
    osc_add_hook('header','flatter_nofollow_construct');

    flatter_add_body_class('userpage user-custom');
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }
    osc_current_web_theme_path('header.php') ;
	?>

    <div id="columns">
        <div class="container">
            <div class="row">
            	<div class="col-md-3">
					<?php osc_run_hook('before-main'); ?>
                </div>
                <div class="col-md-9">
                	<?php osc_render_file(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php osc_current_web_theme_path('footer.php'); ?>