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

    // meta tag robots
    osc_add_hook('header','osclasswizards_follow_construct');

    osclasswizards_add_body_class('home');

	if(osclasswizards_show_as() == 'gallery'){
        $loop_template	=	'loop-grid.php';
		$listClass = 'listing-grid';
    }else{
		$loop_template	=	'loop-list.php';
		$listClass   = '';
	}
	
?>
<?php osc_current_web_theme_path('header.php') ; ?>
<?php

    osc_get_premiums(osclasswizards_premium_listings_shown_home());
	
    if(osc_count_premiums() > 0) {

?>

<h1 class="title">
  <?php _e('Premium Listings',OSCLASSWIZARDS_THEME_FOLDER);?>
</h1>
<div id="listing-card-list" class="listing-card-list listings_grid listings_grids">
  <ul class="row premium_slider">
    <?php
  $listcount = 1;
		while ( osc_has_premiums() ) {
	?>
    <?php $size = explode('x', osc_thumbnail_dimensions()); ?>
    <li class="listing-card premium col-md-3">
      <article class="loop_premium">
        <div class="figure">
          <figure>
            <?php if( osc_images_enabled_at_items() ) { ?>
            <?php if(osc_count_premium_resources()) { ?>
            <a class="listing-thumb" href="<?php echo osc_premium_url() ; ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>"><img class="img-responsive" src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>" width="<?php echo $size[0]; ?>" height="<?php echo $size[1]; ?>"></a>
            <?php } else { ?>
            <a class="listing-thumb" href="<?php echo osc_premium_url() ; ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>"><img class="img-responsive" src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>" width="<?php echo $size[0]; ?>" height="<?php echo $size[1]; ?>"></a>
            <?php } ?>
            <?php } ?>
            <span class="ribbon"> <i class="fa fa-star"></i> </span> </figure>
        </div>
        <div class="listing-attr">
          <h4><a href="<?php echo osc_premium_url() ; ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>"><?php echo osc_premium_title() ; ?></a></h4>
          <article> <span class="category"><i class="fa fa-<?php echo osclasswizards_category_icon( osc_premium_category_id() ); ?>"></i><?php echo osc_premium_category() ; ?></span> <span class="location"><i class="fa fa-map-marker"></i><?php echo osc_premium_city(); ?>
            <?php if(osc_premium_region()!='') { ?>
            (<?php echo osc_premium_region(); ?>)
            <?php } ?>
            </span> <span class="date"> <i class="fa fa-clock-o"></i> <?php echo osc_format_date(osc_premium_pub_date()); ?> </span> </article>
          <?php if( osc_price_enabled_at_items() ) { ?>
          <span class="currency-value"><?php echo osc_format_price(osc_premium_price(), osc_premium_currency_symbol()); ?></span>
          <?php } ?>
          <?php $admin = false; ?>
          <?php if($admin){ ?>
          <span class="admin-options"> <a href="<?php echo osc_premium_edit_url(); ?>" rel="nofollow">
          <?php _e('Edit item', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a> <span>|</span> <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', OSCLASSWIZARDS_THEME_FOLDER)); ?>')" href="<?php echo osc_premium_delete_url();?>" >
          <?php _e('Delete', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a>
          <?php if(osc_premium_is_inactive()) {?>
          <span>|</span> <a href="<?php echo osc_premium_activate_url();?>" >
          <?php _e('Activate', OSCLASSWIZARDS_THEME_FOLDER); ?>
          </a>
          <?php } ?>
          </span>
          <?php } ?>
        </div>
      </article>
    </li>
    <?php
		
  } 
  ?>
  </ul>
</div>
<?php
	}
 ?>
<?php osc_run_hook('inside-main'); ?>
<div class="content">
  <div class="title">
    <h1>
      <?php _e('Latest Listings', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
      <span class="sorting"> <a href="<?php echo osc_base_url(true); ?>?sShowAs=list" class="list-button <?php if(osclasswizards_show_as()=='list')echo "active"; ?>" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span> <i class="fa fa-th-list"></i> </span></a> <a href="<?php echo osc_base_url(true); ?>?sShowAs=gallery" class="grid-button <?php if(osclasswizards_show_as()=='gallery') echo "active"; ?>" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span> <i class="fa fa-th-large"></i></span></a> </span> </h1>
  </div>
  <div class="latest_ads">
    <?php if( osc_count_latest_items() == 0) { ?>
    <p class="empty">
      <?php _e("There aren't listings available at this moment", OSCLASSWIZARDS_THEME_FOLDER); ?>
    </p>
    <?php } else { ?>
    <?php
    View::newInstance()->_exportVariableToView("listType", 'latestItems');
    View::newInstance()->_exportVariableToView("listClass",$listClass);
	osc_current_web_theme_path($loop_template);
    ?>
    <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
    <p class="see_more_link"><a href="<?php echo osc_search_show_all_url() ; ?>"> <strong>
      <?php _e('See all listings', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
      &raquo;</strong></a> </p>
    <?php } ?>
    <?php } ?>
  </div>
  <?php if(osc_get_preference('show_popular', 'osclasswizards_theme') == '1'){?>
  <div id="tab_filter">
    <h2 class="title"> <?php echo sprintf(__('Popular in %s', OSCLASSWIZARDS_THEME_FOLDER), osc_page_title()) ; ?> </h2>
    <?php if(osclasswizards_show_popular_searches() ){ ?>
    <section id='Searches'>
      <div class="popular_cities">
        <?php $searches	=	osclasswizards_popular_searches( osclasswizards_popular_searches_limit() ); ?>
           <?php if(!empty($searches)){ ?>
        <ul>
          <?php foreach($searches as $search){?>
          <?php if($search['s_search'] !=""){?>
          <li><a href="<?php echo osc_search_url(array('sPattern' => $search['s_search'])); ?>"><?php echo  $search['s_search']; ?> <em>(<?php echo $search['total']; ?>)</em></a></li>
          <?php } ?>
          <?php } ?>
        </ul>
           <?php } ?>
      </div>
    </section>
    <?php } ?>
    <?php if(osclasswizards_show_popular_regions() ){ ?>
    <section id='Regions'>
      <div class="popular_regions">
        <?php $regions	=	osclasswizards_popular_regions(osclasswizards_popular_regions_limit()); ?>
         <?php if(!empty($regions)){ ?>
        <ul>
          <?php foreach($regions as $region => $count){?>
          <li><a href="<?php echo osc_search_url( array( 'sRegion' => $region ) ); ?>"><i class="fa fa-map-marker"></i><?php echo $region; ?> <em>(<?php echo $count; ?>)</em></a></li>
          <?php } ?>
        </ul>
          <?php } ?>
      </div>
    </section>
    <?php } ?>
    <?php if(osclasswizards_show_popular_cities() ){ ?>
    <section id='Cities'>
      <div class="popular_cities">
        <?php $cities	=	osclasswizards_popular_cities(osclasswizards_popular_cities_limit()); ?>
        <?php if(!empty($cities)){ ?>
        <ul>
          <?php foreach($cities as $city => $count){?>
          <li><a href="<?php echo osc_search_url( array( 'sCity' => $city ) ); ?>"><i class="fa fa-map-marker"></i><?php echo $city; ?> <em>(<?php echo $count; ?>)</em></a></li>
          <?php } ?>
        </ul>
        <?php } ?>
      </div>
    </section>
    <?php } ?>
  </div>
  <?php } ?>
  <?php if( osc_get_preference('homepage-728x90', 'osclasswizards_theme') != "") { ?>
  <div class="ads_home"> <?php echo osc_get_preference('homepage-728x90', 'osclasswizards_theme'); ?> </div>
  <?php } ?>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
