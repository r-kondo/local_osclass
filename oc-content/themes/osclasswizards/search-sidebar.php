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
     $category = __get("category");
     if(!isset($category['pk_i_id']) ) {
         $category['pk_i_id'] = null;
     }

?>

<div class="col-sm-4 col-md-3">
  <aside id="sidebar" class="sidebar_search">
    <h2 id="show_filters">
      <?php _e('Show Filters', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
      <i class="fa fa-th-list"></i> </h2>
    <div id="filters_shown">
      <div class="block">
        <h2>
          <?php _e('Advanced Search', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
        </h2>
        <section>
          <div class="filters">
            <form action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf">
              <input type="hidden" name="page" value="search"/>
              <input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
              <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting() ; echo $allowedTypesForSorting[osc_search_order_type()]; ?>" />
              <?php foreach(osc_search_user() as $userId) { ?>
              <input type="hidden" name="sUser[]" value="<?php echo $userId; ?>"/>
              <?php } ?>
              <fieldset class="first">
                <h3>
                  <?php _e('Your search', OSCLASSWIZARDS_THEME_FOLDER); ?>
                </h3>
                <div class="row">
                  <input class="input-text" type="text" name="sPattern"  id="query" value="<?php echo osc_esc_html(osc_search_pattern()); ?>" />
                </div>
              </fieldset>
			  <?php if(osc_get_preference('show_search_country', 'osclasswizards_theme') == '1'){?>
              <fieldset>
                <h3>
                  <?php _e('Country', OSCLASSWIZARDS_THEME_FOLDER); ?>
                </h3>
                <div>
				 <?php osclasswizards_countries_select('sCountry', 'sCountry', __('Select a country', OSCLASSWIZARDS_THEME_FOLDER), osc_esc_html(Params::getParam('sCountry')));?>
                </div>
              </fieldset>
			  <?php } ?>
			    <fieldset>
                <h3>
                  <?php _e('Region', OSCLASSWIZARDS_THEME_FOLDER); ?>
                </h3>
                <div>
					<?php osclasswizards_regions_select('sRegion', 'sRegion', __('Select a region', OSCLASSWIZARDS_THEME_FOLDER), osc_esc_html(osc_search_region())) ; ?>
                </div>
              </fieldset>
			  <fieldset>
                <h3>
                  <?php _e('City', OSCLASSWIZARDS_THEME_FOLDER); ?>
                </h3>
                <div>
                    <?php osclasswizards_cities_select('sCity', 'sCity', __('Select a city', OSCLASSWIZARDS_THEME_FOLDER), osc_esc_html(osc_search_city())) ; ?>
                </div>
              </fieldset>

              <?php if( osc_images_enabled_at_items() ) { ?>
              <fieldset>
                <h3>
                  <?php _e('Show only', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
                </h3>
                <div class="checkbox">
                  <input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked' : ''); ?> />
                  <label for="withPicture">
                    <?php _e('listings with pictures', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
                  </label>
                </div>
              </fieldset>
              <?php } ?>
              <?php if( osc_price_enabled_at_items() ) { ?>
              <fieldset>
                <div class="price-slice">
                  <h3>
                    <?php _e('Price', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
                  </h3>
                  <ul class="row">
                    <li class="col-md-6"> <span>
                      <?php _e('Min', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
                      :</span>
                      <input class="input-text" type="text" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="6" maxlength="6" />
                    </li>
                    <li class="col-md-6"> <span>
                      <?php _e('Max', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
                      :</span>
                      <input class="input-text" type="text" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="6" maxlength="6" />
                    </li>
                  </ul>
                </div>
              </fieldset>
              <?php } ?>
              <div class="plugin-hooks">
                <?php
            if(osc_search_category_id()) {
                osc_run_hook('search_form', osc_search_category_id()) ;
            } else {
                osc_run_hook('search_form') ;
            }
            ?>
              </div>
              <?php
        $aCategories = osc_search_category();
        foreach($aCategories as $cat_id) { ?>
              <input type="hidden" name="sCategory[]" value="<?php echo osc_esc_html($cat_id); ?>"/>
              <?php } ?>
              <div class="actions">
                <button type="submit" class="btn btn-success">
                <?php _e('Apply', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
                </button>
              </div>
            </form>
          </div>
        </section>
      </div>
      <div class="block mobile_hide_cat">
        <h2>
          <?php _e('Refine category', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
        </h2>
        <section>
          <div class="search_filter">
            <?php osclasswizards_sidebar_category_search($category['pk_i_id']); ?>
          </div>
        </section>
      </div>
    </div>
    <div class="block mobile_hide">
      <h2>
        <?php _e('Subscribe to this search', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
      </h2>
      <section>
        <?php osc_alert_form(); ?>
      </section>
    </div>
    <?php 
	if( osc_get_preference('facebook-showsearch', 'osclasswizards_theme') == "1"){
		?>
    <div class="block mobile_hide">
      <section>
        <div class="fb_box">
          <?php
		osclasswizards_facebook_like_box();?>
        </div>
      </section>
    </div>
    <?php
	}
  ?>
  </aside>
</div>
