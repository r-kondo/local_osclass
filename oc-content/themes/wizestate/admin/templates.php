<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>

<h2 class="render-title"><?php _e('Templates Settings', OSCLASSWIZARDS_THEME_FOLDER); ?></h2>
<div id="tabs-templates">
<ul>
    <li><a href="#templates-home"><?php _e('Home',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
    <li><a href="#templates-search"><?php _e('Search',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
	<li><a href="#templates-item-post"><?php _e('Item Post',OSCLASSWIZARDS_THEME_FOLDER);?></a></li>
</ul>
<div id="templates-home"><?php include 'templates-home.php'; ?></div>
<div id="templates-search"><?php include 'templates-search.php'; ?></div>
<div id="templates-item-post"><?php include 'templates-item-post.php';?></div>
</div>