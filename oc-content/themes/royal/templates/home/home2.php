<?php
    /*
     *       Royal Multipurpose Osclass Themes
     *       
     *       Copyright (C) 2016 OSCLASS.me
     * 
     *       This is Royal Multipurpose Osclass Themes with Single License
     *  
     *       This program is a commercial software. Copying or distribution without a license is not allowed.
     *         
     *       If you need more licenses for this software. Please read more here <http://www.osclass.me/osclass-me-license/>.
     */
?>
<style>
.horbar-bevel,
.ad-footers {
    display: none;
}
#footer, section#footerme {
    margin-top: 0px;
}
</style>
<?php if(osc_get_preference( 'phone-us', 'royal')=="yes" ) { ?>
<div class="container">
    <?php echo osc_get_preference( 'memo-us', 'royal'); ?> </div>
<?php } ?>
<div class="container">
    <div id="main">
        <div class="ari">
            <h2><?php _e('Categories', 'royal') ; ?></h2> </div>
        <?php osc_goto_first_category() ; ?>
        <?php if(osc_count_categories ()> 0) { ?>
        <div class="row">
            <?php while ( osc_has_categories() ) { ?>
            <ul class="col-xs-6 col-md-3 ulfa">
                <li>
                    <section class="kategori">
                        <h2>
                                    <?php View::newInstance()->_erase('subcategories'); echo osc_category_name() ; ?> <span><?php echo osc_category_total_items() ; ?></span></h2>
                        <ul>
                            <?php if ( osc_count_subcategories()> 0 ) { $m=1; ?>
                            <?php while ( osc_has_subcategories() ) { if( $m<=6){?>
                            <?php if( osc_category_total_items()> 0 ) { ?>
                            <li>
                                <a class="category sub-category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>">
                                    <?php echo osc_category_name() ; ?> (
                                    <?php echo osc_category_total_items() ; ?>)</a>
                            </li>
                            <?php } else { ?>
                            <li>
                                <a class="category sub-category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>">
                                    <?php echo osc_category_name() ; ?> (
                                    <?php echo osc_category_total_items() ; ?>)</a>
                            </li>
                            <?php } ?>
                            <?php } $m++; } if($m>5) {?>
                            <li class="last"><a href="<?php echo osc_search_category_url() ; ?>"><strong><?php _e('View more...', 'royal'); ?></strong></a> </li>
                            <?php } ?>
                            <?php } ?> </ul>
                    </section>
                </li>
            </ul>
            <?php } ?> 
      </div>
        <?php } ?> 
  </div>
</div>
<?php osc_current_web_theme_path(''.osc_get_preference('katalog-royal', 'royal'). '.php') ; ?>