<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>

<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="facebook" />
    <h2 class="render-title"><?php _e('Facebook Page Like Box Settings', OSCLASSWIZARDS_THEME_FOLDER); ?></h2>

    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label"><?php _e('Facebook Page URL', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
                    <textarea style="height: 50px; width: 500px;"name="facebook-url"><?php echo osc_esc_html( osc_get_preference('facebook-url', 'osclasswizards_theme') ); ?></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-label"><?php _e('Width', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls"><input type="number" name="facebook-width" value="<?php echo osc_esc_html( osc_get_preference('facebook-width', 'osclasswizards_theme') ); ?>"> pixel</div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Height', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls"><input type="number" name="facebook-height" value="<?php echo osc_esc_html( osc_get_preference('facebook-height', 'osclasswizards_theme') ); ?>"> pixel</div>
            </div>
					
            <div class="form-row">
                <div class="form-label"><?php _e('Hide Cover Photo', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
					<div class="form-label-checkbox">
						<input type="checkbox" class="switch" name="facebook-hidecover" value="1" <?php echo (osc_esc_html( osc_get_preference('facebook-hidecover', 'osclasswizards_theme')) == "1" ) ? "checked":""; ?>>
					</div>
				</div>
            </div>
			
            <div class="form-row">
                <div class="form-label"><?php _e("Show Friend's Faces", OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
					<div class="form-label-checkbox">
						<input type="checkbox" class="switch" name="facebook-showface" value="1" <?php echo (osc_esc_html( osc_get_preference('facebook-showface', 'osclasswizards_theme')) == "1") ? "checked":"" ; ?>>
					</div>
				</div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e("Show Page Posts", OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
					<div class="form-label-checkbox">
						<input type="checkbox" class="switch" name="facebook-showpost" value="1" <?php echo (osc_esc_html( osc_get_preference('facebook-showpost', 'osclasswizards_theme')) == "1") ? "checked":"" ; ?>>
					</div>
				</div>
            </div>
			<div class="form-row">
                <div class="form-label"><?php _e("Display On Item Sidebar", OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
					<div class="form-label-checkbox">
						<input type="checkbox" class="switch" name="facebook-showitem" value="1" <?php echo (osc_esc_html( osc_get_preference('facebook-showitem', 'osclasswizards_theme')) == "1") ? "checked":"" ; ?>>
					</div>
				</div>
            </div>			
            <div class="form-row">
                <div class="form-label"><?php _e("Display On Search Sidebar", OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
					<div class="form-label-checkbox">
						<input type="checkbox" class="switch" name="facebook-showsearch" value="1" <?php echo (osc_esc_html( osc_get_preference('facebook-showsearch', 'osclasswizards_theme')) == "1") ? "checked":"" ; ?>>
					</div>
				</div>
            </div>
			
            <div class="form-actions">
                <input type="submit" value="<?php echo osc_esc_html(__('Save changes', OSCLASSWIZARDS_THEME_FOLDER)); ?>" class="btn btn-submit">
            </div>
        </div>
    </fieldset>
</form>





