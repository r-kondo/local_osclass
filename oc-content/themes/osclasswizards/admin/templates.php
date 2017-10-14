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

<script>
  $(function() {
    $( "#tabs-templates" ).tabs();
});
</script>
<h2 class="render-title"><?php _e('Templates settings', OSCLASSWIZARDS_THEME_FOLDER); ?></h2>
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