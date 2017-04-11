<?php
    /*
     *       Royal Multipurpose Osclass Themes
     *       
     *       Copyright (C) 2017 OSCLASS.me
     * 
     *       This is Royal Multipurpose Osclass Themes with Single License
     *  
     *       This program is a commercial software. Copying or distribution without a license is not allowed.
     *         
     *       If you need more licenses for this software. Please read more here <http://www.osclass.me/osclass-me-license/>.
     */
?>
<div class="col-md-3 nita">
<div class="centerez"><a class="hidden-lg-up" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-bars fa-lg"></i> <?php _e("Sidebar", 'royal'); ?>
        </a></div>
    <div class="collapse" id="collapseOne">
    <div style="padding:5px;" class="sidebar3">
        <div class="dropp">
            <h4><?php _e("Categories", 'royal'); ?></h4>
            <div id="MainMenu">
                <div class="list-group panel categories">
                    <?php osc_goto_first_category() ; ?>
                    <?php if(osc_count_categories ()> 0) { ?>
                    <?php while ( osc_has_categories() ) { ?>
                    <a data-parent="#MainMenu" data-toggle="collapse" class="category 1 list-group-item list-group-item-warning collapsed caret-up-down" href="#category-<?php echo osc_category_id() ; ?>"><?php echo osc_category_name(); ?> <span class="fa fa-plus"></span> </a>
                    
                    <div class="collapse list-subgroups" id="category-<?php echo osc_category_id() ; ?>">

                        <?php if ( osc_count_subcategories()> 0 ) { ?>
                        <?php while ( osc_has_subcategories() ) { ?>
                        <?php if( osc_category_total_items()> 0 ) { ?>
                        <a class="list-group-item list-subgroup-item category sub-category" href="<?php echo osc_search_category_url() ; ?>">
                            <?php echo osc_category_name() ; ?> (
                            <?php echo osc_category_total_items() ; ?>)</a>
                        <?php } else { ?>
                        <a class="list-group-item list-subgroup-item category sub-category" href="<?php echo osc_search_category_url() ; ?>">
                            <?php echo osc_category_name() ; ?> (
                            <?php echo osc_category_total_items() ; ?>)</a>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?> 
                       <a class="list-group-item list-subgroup-item category sub-category" href="<?php echo osc_search_category_url() ; ?>"><?php _e("See all ads", 'royal'); ?> <?php echo osc_category_name() ; ?></a>
                    </div>
                    <?php } ?>
                    <?php } ?> 
              </div>
            </div>
            <h4 class="ser"><?php _e("Search", 'royal'); ?></h4>
            <div id="MainMenu">
                <a data-parent="#MainMenu" data-toggle="collapse" class="category 1 list-group-item list-group-item-warning caret-up-down" href="#carii" aria-expanded="true">
                    <?php _e("Search", 'royal'); ?> <span class="fa fa-chevron-down"></span> </a>
                <div class="list-subgroups collapse" id="carii" aria-expanded="true">
                    <form action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf">
                        <input type="hidden" name="page" value="search" />
                        <input type="hidden" name="sOrder" value="<?php echo osc_esc_html(osc_search_order()); ?>" />
                        <input type="hidden" name="sCompany" class="sCompany" id="sCompany" value="<?php echo Params::getParam('sCompany');?>" />
                        <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting(); echo osc_esc_html($allowedTypesForSorting[osc_search_order_type()]); ?>" />
                        <?php foreach(osc_search_user() as $userId) { ?>
                        <input type="hidden" name="sUser[]" value="<?php echo osc_esc_html($userId); ?>" />
                        <?php } ?>
                        <fieldset class="box location">
                            <div class="form-group">
                                <label for="sCity">
                                    <?php _e("Your Search", 'royal'); ?> </label>
                                <input type="text" name="sPattern" placeholder="<?php echo osc_esc_html( osc_get_preference('keyword_placeholder', 'royal') ); ?>" class="form-control" id="query" value="<?php echo osc_esc_html( osc_search_pattern() ); ?>" /> </div>
                            <div class="form-group">
                                <label for="sCity">
                                    <?php _e("Categories", 'royal'); ?> </label>
                                <?php if ( osc_count_categories() ) { ?>
                                <div class="cell selector">
                                    <?php if ( !osc_search_category() ) { ?>
                                    <?php osc_categories_select_royal( 'sCategory', null, __( 'Select a category', 'royal')); ?>
                                    <?php } else { ?>
                                    <?php osc_categories_select_royal( 'sCategory', osc_search_category_id(), __( 'Select a category', 'royal')); ?>
                                    <?php } ?> </div>
                                <?php } ?> </div>
                            <div class="form-group">
                                <label for="sRegion">
                                    <?php _e("Region", 'royal'); ?> </label>
                                <input type="text" id="sRegion" name="sRegion" class="form-control" value="<?php echo osc_esc_html( osc_search_region() ); ?>" /> </div>
                            <div class="form-group">
                                <label for="sCity">
                                    <?php _e("City", 'royal'); ?> </label>
                                <input type="text" id="sCity" name="sCity" class="form-control" value="<?php echo osc_esc_html( osc_search_city() ); ?>" /> </div>
                        </fieldset>
                        <?php if( osc_images_enabled_at_items() ) { ?>
                        <div class="form-group">
                            <label for="bPic">
                                <?php _e("Show only", 'royal'); ?> </label>
                            <br>
                            <div class="checkboxes">
                                <ul>
                                    <li>
                                        <input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked="checked"' : ''); ?> />
                                        <p id="withPicture" for="withPicture">
                                            <?php _e("Show only listings with pictures", 'royal'); ?> </p>
                                    </li>
                                </ul>
                            </div>
                          </div><?php } ?>
                        <?php if( osc_price_enabled_at_items() ) { ?>
                        <div class="form-group price-slice">
                            <label for="sCity">
                                <?php _e("Price", 'royal'); ?> </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <?php _e("Min", 'royal'); ?>
                                        <input type="text" class="form-control" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="6" maxlength="6" /> </div>
                                    <div class="col-md-6">
                                        <?php _e("Max", 'royal'); ?>
                                        <input type="text" class="form-control" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="6" maxlength="6" /> </div>
                                </div>
                            </div>
                        </div><?php } ?> 
                        <?php if(osc_search_category_id()) { osc_run_hook( 'search_form', osc_search_category_id()); } else { osc_run_hook( 'search_form'); } ?>
                        <button style="width:100%;" class="btn btn-success srcc" type="submit">
                            <?php _e("Apply", 'royal'); ?> </button>
                    </form>
                </div>
            </div>
            <h4 class="ser"><?php _e("Location", 'royal'); ?></h4>
            <div id="MainMenu">
                <?php if ( !View::newInstance()->_exists('list_contries') ) { View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '>=', 'region_name ASC') ) ; } if( osc_count_list_regions() ) { ?>
                <div class="list-group panel categories">
                    <a data-parent="#MainMenu" data-toggle="collapse" class="category 1 list-group-item list-group-item-warning caret-up-down" href="#location" aria-expanded="true">
                        <?php _e("Location", 'royal'); ?> <span class="fa fa-chevron-down"></span> </a>
                    <div class="list-subgroups collapse" id="location" aria-expanded="true">
                        <?php while( osc_has_list_regions() ) { ?>
                        <a class="list-group-item list-subgroup-item category sub-category" href="<?php echo osc_search_url( array( 'sRegion' => osc_list_region_id() ) ) ; ?>">
                            <?php echo osc_list_region_name() ; ?> (
                            <?php echo osc_list_region_items() ; ?>)</a>
                        <?php } ?> </div> </div>
                    <?php } ?>
            </div>
        </div>
        <?php osc_alert_form(); ?>
        <center class="ads-right">
            <?php echo osc_get_preference('sidebar-160x600', 'royal'); ?> </center>
    </div>
</div>
</div>