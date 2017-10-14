<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>

<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="ads_mgmt" />

    <h2 class="render-title"><?php _e('Ads Management', OSCLASSWIZARDS_THEME_FOLDER); ?></h2>
    <div class="form-row">
        <div class="form-label"></div>
        <div class="form-controls">
            <p><?php _e('In this section you can configure your site to display ads and start generating revenue.', OSCLASSWIZARDS_THEME_FOLDER); ?><br/><?php _e('If you are using an online advertising platform, such as Google Adsense, copy and paste here the provided code for ads.', OSCLASSWIZARDS_THEME_FOLDER); ?></p>
        </div>
    </div>
    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label"><?php _e('Header Ad', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;"name="header-728x90"><?php echo osc_esc_html( osc_get_preference('header-728x90', 'osclasswizards_theme') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the top of your website.', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Homepage Ad', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="homepage-728x90"><?php echo osc_esc_html( osc_get_preference('homepage-728x90', 'osclasswizards_theme') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will appear at the bottom of your site\'s home page.', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Homepage Sidebar Ad', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="home_sidebar_ad"><?php echo osc_esc_html( osc_get_preference('home_sidebar_ad', 'osclasswizards_theme') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will appear at the sidebar of your site\'s home page (only for sidebar layout).', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Search results Ad (top of the page)', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="search-results-top-728x90"><?php echo osc_esc_html( osc_get_preference('search-results-top-728x90', 'osclasswizards_theme') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on top of the search results of your site.', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Search results Ad (bottom of the page)', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="search-results-middle-728x90"><?php echo osc_esc_html( osc_get_preference('search-results-middle-728x90', 'osclasswizards_theme') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown among the search results of your site.', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Sidebar Ad', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="sidebar-300x250"><?php echo osc_esc_html( osc_get_preference('sidebar-300x250', 'osclasswizards_theme') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the right sidebar of your website, on the product detail page.', OSCLASSWIZARDS_THEME_FOLDER); ?></div>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" value="<?php echo osc_esc_html(__('Save changes', OSCLASSWIZARDS_THEME_FOLDER)); ?>" class="btn btn-submit">
            </div>
        </div>
    </fieldset>
</form>





