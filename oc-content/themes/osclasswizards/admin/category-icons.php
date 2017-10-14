<?php 
/**
* Admin menu page for Categories Icons settings
*
*/
?>
<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<?php 
	$conn = getConnection(); 
    $categories = Category::newInstance()->toTreeAll();
 ?>

<h2 class="render-title">
  <?php _e('Categories Icons', OSCLASSWIZARDS_THEME_FOLDER); ?>
</h2>
<div class="form-row">
  <div class="form-label"></div>
  <div class="form-controls">
    <p>
      <?php _e('Choose custom icons for categories. The items from the category will take the related icons in google map.', OSCLASSWIZARDS_THEME_FOLDER); ?>
      <br/>
      <?php _e('We use <a style="color: #018be3; text-decoration: none;" title="Visit Font Awesome site for help" target="_blank" href="http://fortawesome.github.io/Font-Awesome/3.2.1/icons/">Font Awesome Icons.</a> Just type icon name omitting <strong>"icon-"</strong> eg. home or car.', OSCLASSWIZARDS_THEME_FOLDER); ?>
    </p>
  </div>
</div>
<form id="categories-icons" action="<?php echo osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php');?>" method="post" enctype="multipart/form-data" class="nocsrf">
  <input type="hidden" name="action_specific" value="categories_icons" />
  <fieldset>
    <div class="cats">
      <?php foreach($categories as $c) { ?>
      <h3><strong>
        <?php _e($c['s_name'], OSCLASSWIZARDS_THEME_FOLDER); ?>
        </strong>&nbsp;&nbsp;&nbsp;<i id="icon-<?php echo $c['pk_i_id'];?>" class="fa fa-<?php echo osclasswizards_category_icon( $c['pk_i_id'] ); ?>"></i></h3>
      <div class="inner">
        <div class="form-controls">
          <label>
            <?php _e($c['s_name'], OSCLASSWIZARDS_THEME_FOLDER); ?>
          </label>
          <input type="text" class="xlarge" name="cat-icons[<?php echo $c['pk_i_id']; ?>]" value="<?php echo osc_esc_html( osc_get_preference('cat-icons-'.$c['pk_i_id'], 'osclasswizards_theme_cat_icons') ); ?>" cat-id="<?php echo $c['pk_i_id'];?>" />
          &nbsp;&nbsp;&nbsp;<i id="icon-<?php echo $c['pk_i_id'];?>" class="fa fa-<?php echo osclasswizards_category_icon( $c['pk_i_id'] ); ?>"></i> </div>
        <?php if(!empty($c['categories'])) { ?>
        <?php foreach($c['categories'] as $cc) { ?>
        <div class="form-controls">
          <label>
            <?php _e($cc['s_name'], OSCLASSWIZARDS_THEME_FOLDER); ?>
          </label>
          <input type="text" class="xlarge" name="cat-icons[<?php echo $cc['pk_i_id']; ?>]" value="<?php echo osc_esc_html( osc_get_preference('cat-icons-'.$cc['pk_i_id'], 'osclasswizards_theme_cat_icons') ); ?>" cat-id="<?php echo $cc['pk_i_id'];?>"  />
          &nbsp;&nbsp;&nbsp;<i id="icon-<?php echo $cc['pk_i_id'];?>" class="fa fa-<?php echo osclasswizards_category_icon( $cc['pk_i_id'] ); ?>"></i> </div>
        <?php } ?>
        <?php } ?>
      </div>
      <?php } ?>
    </div>
    <div class="form-actions">
      <input id="button" type="submit" value="<?php echo osc_esc_html(__('Save changes',OSCLASSWIZARDS_THEME_FOLDER)); ?>" class="btn btn-submit">
    </div>
  </fieldset>
</form>
