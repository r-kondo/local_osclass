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
?>
<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('admin/css/jquery.switchButton.css');?>">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('admin/css/admin.main.css');?>">

<div class="credit-osclasswizards log_main_head"> <a href="http://www.osclasswizards.com/" target="_blank" class="wizard_logo"> <img src="<?php echo osc_current_web_theme_url('admin/img/logo.png');?>" alt="Premium osclass themes" title="Premium osclass themes" /> </a>
  <div class="follow">
    <ul>
      <li>Follow us:</li>
      <li><a href="https://www.facebook.com/osclasswizards" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
      <li><a href="https://twitter.com/osclasswizards" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
      <li><a href="https://plus.google.com/112391938966018193484" target="_blank" title="google plus"><i class="fa fa-google-plus"></i></a></li>
    </ul>
  </div>
  <div class="donate">
    <form name="_xclick" action="https://www.paypal.com/in/cgi-bin/webscr" method="post" class="nocsrf">
      <input type="hidden" name="cmd" value="_donations">
      <input type="hidden" name="business" value="webgig.sagar@gmail.com">
      <input type="hidden" name="item_name" value="OsclassWizards Theme">
      <input type="hidden" name="currency_code" value="USD">
      <input type="hidden" name="lc" value="US" />
      <div id="flashmessage" >
        <p>
          <select name="amount" class="select-box-medium">
            <option value="10" selected>10$</option>
            <option value="5">5$</option>
            <option value="">
            <?php _e('Custom', OSCLASSWIZARDS_THEME_FOLDER); ?>
            </option>
          </select>
          <input type="submit" class="btn btn-mini" name="submit" value="<?php echo osc_esc_html(__('Donate', OSCLASSWIZARDS_THEME_FOLDER)); ?>">
        </p>
      </div>
    </form>
  </div>
</div>
<div id="tabs" class="wizards_tab wiz_main_tabs">
  <ul>
    <li><a href="#general"><?php _e('General',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
    <li><a href="#theme-style"><?php _e('Theme Style',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
    <li><a href="#templates"><?php _e('Templates',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
    <li><a href="#logo"><?php _e('Header Logo',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
    <li><a href="#favicon"><?php _e('Favicon',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
    <li><a href="#banner"><?php _e('Banner',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
    <li><a href="#category-icons"><?php _e('Category Icons',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
    <li><a href="#ads"><?php _e('Ads Management',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
    <li><a href="#facebook"><?php _e('Facebook Page',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
    <li><a href="#documentation"><?php _e('Documentation',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
  </ul>
  <div id="general">
    <h2 class="render-title">
      <?php _e('Theme settings', OSCLASSWIZARDS_THEME_FOLDER); ?>
    </h2>
    <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php'); ?>" method="post" class="nocsrf">
      <input type="hidden" name="action_specific" value="settings" />
      <fieldset>
        <div class="form-horizontal">
          <div class="form-row">
            <div class="form-label">
              <?php _e('Welcome message', OSCLASSWIZARDS_THEME_FOLDER); ?>
            </div>
            <div class="form-controls">
              <textarea style="height: 50px; width: 500px;" name="welcome_message"><?php echo osc_get_preference('welcome_message', 'osclasswizards_theme'); ?></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-label">
              <?php _e('Show lists as', OSCLASSWIZARDS_THEME_FOLDER); ?>
            </div>
            <div class="form-controls">
              <select name="defaultShowAs@all">
                <option value="gallery" <?php if((osclasswizards_default_show_as()) == 'gallery'){ echo 'selected="selected"'; } ?>>
                <?php echo osc_esc_html(__('Grid',OSCLASSWIZARDS_THEME_FOLDER)); ?>
                </option>
                <option value="list" <?php if((osclasswizards_default_show_as()) == 'list'){ echo 'selected="selected"'; } ?>>
                <?php echo osc_esc_html(__('List',OSCLASSWIZARDS_THEME_FOLDER)); ?>
                </option>
              </select>
            </div>
          </div>
        </div>
      </fieldset>
      <div class="form-actions">
        <input type="submit" value="<?php echo osc_esc_html(__('Save changes', OSCLASSWIZARDS_THEME_FOLDER)); ?>" class="btn btn-submit btn-success">
      </div>
    </form>
  </div>
  <div id="theme-style">
    <?php include 'theme-style.php'; ?>
  </div>
  <div id="templates">
    <?php include 'templates.php'; ?>
  </div>
  <div id="logo">
    <?php include 'header.php'; ?>
  </div>
  <div id="favicon">
    <?php include 'favicon.php'; ?>
  </div>
  <div id="banner">
    <?php include 'homeimage.php'; ?>
  </div>
  <div id="category-icons">
    <?php include 'category-icons.php'; ?>
  </div>
  <div id="ads">
    <?php include 'ads.php'; ?>
  </div>
  <div id="facebook">
    <?php include 'facebook.php'; ?>
  </div> 
  <div id="documentation">
    <?php include 'documentation.php'; ?>
  </div>
  <address class="wizards_address">
	<span>&copy; 2016 <a target="_blank" title="osclasswizards" href="http://www.osclasswizards.com/">OsclassWizards</a>. All rights reserved.</span>
  </p>
  </address>
</div>
<script src="<?php echo osc_current_web_theme_url('admin/js/jquery.switchButton.js');?>"></script>
<script src="<?php echo osc_current_web_theme_url('admin/js/jquery.admin.js');?>"></script>
