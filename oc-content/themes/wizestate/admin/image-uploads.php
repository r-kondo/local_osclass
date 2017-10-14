<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>

<h2 class="render-title">
  <?php _e('Image Uploads', OSCLASSWIZARDS_THEME_FOLDER); ?>
</h2>
<div id="tabs-image-uploads">
  <ul>
    <li><a href="#logo">
      <?php _e('Logo',OSCLASSWIZARDS_THEME_FOLDER);?>
      </a></li>
    <li><a href="#favicon">
      <?php _e('Favicon',OSCLASSWIZARDS_THEME_FOLDER);?>
      </a></li>
    <li><a href="#banner">
      <?php _e('Banner',OSCLASSWIZARDS_THEME_FOLDER);?>
      </a></li>
  </ul>
  <div id="logo">
    <?php include 'image-uploads-logo.php'; ?>
  </div>
  <div id="favicon">
    <?php include 'image-uploads-favicon.php'; ?>
  </div>
  <div id="banner">
    <?php include 'image-uploads-banner.php'; ?>
  </div>
</div>
