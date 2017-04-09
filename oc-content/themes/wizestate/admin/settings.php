<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('admin/css/bootstrap-switch.min.css');?>">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('admin/css/admin.main.css');?>">

<div class="wizards_brand"> <a href="http://www.osclasswizards.com/" target="_blank" class="wizard_logo"> <img src="<?php echo osc_current_web_theme_url('admin/img/logo.png');?>" alt="Premium osclass themes" title="Premium osclass themes" /> </a>
  <div class="wizard_social">
    <ul>
      <li>Follow us:</li>
      <li><a href="https://www.facebook.com/osclasswizards" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
      <li><a href="https://twitter.com/osclasswizards" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
      <li><a href="https://plus.google.com/112391938966018193484" target="_blank" title="google plus"><i class="fa fa-google-plus"></i></a></li>
    </ul>
  </div>
  <div class="wizard_donate">
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
            <option value=""> <?php echo osc_esc_html(__('Custom', OSCLASSWIZARDS_THEME_FOLDER)); ?> </option>
          </select>
          <input type="submit" class="btn btn-mini" name="submit" value="<?php echo osc_esc_html(__('Donate', OSCLASSWIZARDS_THEME_FOLDER)); ?>">
        </p>
      </div>
    </form>
  </div>
</div>
<div id="tabs" class="wizards_tab">
  <ul>
    <li><a href="#general">
      <?php _e('General',OSCLASSWIZARDS_THEME_FOLDER);?>
      </a></li>
    <li><a href="#templates">
      <?php _e('Templates',OSCLASSWIZARDS_THEME_FOLDER);?>
      </a></li>
    <li><a href="#image-uploads">
      <?php _e('Image Uploads',OSCLASSWIZARDS_THEME_FOLDER);?>
      </a></li>
    <li><a href="#category-icons">
      <?php _e('Category Icons',OSCLASSWIZARDS_THEME_FOLDER);?>
      </a></li>
    <li><a href="#ads">
      <?php _e('Ads Management',OSCLASSWIZARDS_THEME_FOLDER);?>
      </a></li>
    <li><a href="#facebook">
      <?php _e('Facebook Page',OSCLASSWIZARDS_THEME_FOLDER);?>
      </a></li>
    <li><a href="#documentation">
      <?php _e('Documentation',OSCLASSWIZARDS_THEME_FOLDER);?>
      </a></li>
  </ul>
  <div id="general">
    <h2 class="render-title">
      <?php _e('General Settings', OSCLASSWIZARDS_THEME_FOLDER); ?>
    </h2>
    <div id="tabs-general">
      <ul>
        <li><a href="#general-theme-settings">
          <?php _e('Theme Settings',OSCLASSWIZARDS_THEME_FOLDER);?>
          </a></li>
        <li><a href="#general-theme-style">
          <?php _e('Theme Style',OSCLASSWIZARDS_THEME_FOLDER);?>
          </a></li>
      </ul>
      <div id="general-theme-style">
        <?php include 'theme-style.php'; ?>
      </div>
      <div id="general-theme-settings">
        <h2 class="render-title">
          <?php _e('Theme Settings', OSCLASSWIZARDS_THEME_FOLDER); ?>
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
                  <textarea style="height: 50px; width: 500px;" name="welcome_message"><?php echo (osc_get_preference('welcome_message', 'osclasswizards_theme')); ?></textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-label">
                  <?php _e('Footer message', OSCLASSWIZARDS_THEME_FOLDER); ?>
                </div>
                <div class="form-controls">
                  <textarea style="height: 50px; width: 500px;" name="footer_message"><?php echo  (osc_get_preference('footer_message', 'osclasswizards_theme')) ; ?></textarea>
                </div>
              </div>
            </div>
          </fieldset>
          <div class="form-actions">
            <input type="submit" value="<?php echo osc_esc_html(__('Save changes', OSCLASSWIZARDS_THEME_FOLDER)); ?>" class="btn btn-submit">
          </div>
        </form>
      </div>
    </div>
  </div>
  <div id="templates" class="tabContainer">
    <?php include 'templates.php'; ?>
  </div>
  <div id="image-uploads">
    <?php include 'image-uploads.php'; ?>
  </div>
  <div id="category-icons" class="tabContainer">
    <?php include 'category-icons.php'; ?>
  </div>
  <div id="ads" class="tabContainer">
    <?php include 'ads.php'; ?>
  </div>
  <div id="facebook" class="tabContainer">
    <?php include 'facebook.php'; ?>
  </div>
  <div id="documentation" class="tabContainer">
    <?php include 'documentation.php'; ?>
  </div>
  <address class="wizards_address">
  <span>&copy; 2015 <a target="_blank" title="osclasswizards" href="http://www.osclasswizards.com/">OsclassWizards</a>. All rights reserved.</span>
  </p>
  </address>
</div>
<script src="<?php echo osc_current_web_theme_url('admin/js/bootstrap-switch.min.js');?>"></script> 
<script src="<?php echo osc_current_web_theme_url('admin/js/jquery.admin.js');?>"></script>