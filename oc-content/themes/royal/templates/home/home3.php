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
.space {
    height: 20px;
}
.ad-footers {
    display: none;
}
#footer, section#footerme {
    margin-top: 0px;
}
</style>
<div class="container">
    <div class="col-md-6 catico">
        <h5 id="anita" class="kir"><?php _e("Categories", 'royal');?>
</h5>
        <div class="cla">
        <ul class="lia-list-standard fadeInDown animated">
            <?php osc_goto_first_category(); ?>
            <?php while ( osc_has_categories() ) { ?>
            <a href="<?php echo osc_search_category_url() ; ?>">
                <li>
                    <div style="background:url(<?php echo osc_current_web_theme_url() ; ?>/images/category/<?php echo osc_category_id() ; ?>.png) no-repeat" class="icos <?php echo osc_category_slug() ; ?>"></div>
                    <a class="nams" href="<?php echo osc_search_category_url() ; ?>">
                        <?php echo osc_category_name() ; ?> </a>
                </li>
            </a>
            <?php } ?>
        </ul>
        </div>
        
           <?php if(osc_count_categories ()> 12) { ?>
            <div class='show-more hidden'><?php _e('View more...', 'royal'); ?> <i class="fa  fa-angle-double-down"></i></div>
<div class='show-less hidden'><?php _e('hide', 'royal'); ?> <i class="fa  fa-angle-double-up"></i></div>
            <?php } else { ?> 
            <?php } ?> 
           
        <div class="empty"></div>
    </div>
    <div class="col-md-6 prop">
        <div class="cinta">
        <h5 id="anita" class="kir"><?php _e("Region", 'royal');?>
</h5>
        <?php View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '>=') ) ; ?>
        <?php if(osc_count_list_regions()> 0 ) { ?>
        <?php while(osc_has_list_regions() ) { ?>
        <ul id="regions" class="col-x col-md-4 lia-list-standar fadeInDown animated">
            <li>
                <a href="<?php echo osc_search_url( array( 'sRegion' => osc_list_region_name() ) ) ; ?>">
                    <?php echo osc_list_region_name() ; ?> </a>
            </li>
        </ul>
        <?php } ?><?php } ?> </div>
        <?php if(osc_count_list_regions()> 48 ) { ?>
            <div class='show-mores hidden'><?php _e('View more...', 'royal'); ?> <i class="fa  fa-angle-double-down"></i></div>
<div class='show-lesss hidden'><?php _e('hide', 'royal'); ?> <i class="fa  fa-angle-double-up"></i></div>
            <?php } else { ?> 
            <?php } ?> 
</div>
</div>
<?php osc_current_web_theme_path(''.osc_get_preference('katalog-royal', 'royal').'.php') ; ?>

<script>
$(function(){
    
   $('.show-more').on('click', function(){
       $('.lia-list-standard li:gt(11)').show();
       $('.show-less').removeClass('hidden');
       $('.show-more').addClass('hidden');
    });

    $('.show-less').on('click', function(){
       $('.lia-list-standard li:gt(11)').hide();
       $('.show-more').removeClass('hidden');
       $('.show-less').addClass('hidden');
    });
    
    //Show only four items
    if ( $('.lia-list-standard li').length > 12 ) {
        /*$('.lia-list-standard li:gt(11)').hide();
        $('.show-more').removeClass('hidden');
        */
        
            $('.show-less').click();
    }

$('.show-mores').on('click', function(){
       $('.lia-list-standar li:gt(47)').show();
       $('.show-lesss').removeClass('hidden');
       $('.show-mores').addClass('hidden');
    });

    $('.show-lesss').on('click', function(){
       $('.lia-list-standar li:gt(47)').hide();
       $('.show-mores').removeClass('hidden');
       $('.show-lesss').addClass('hidden');
    });
    
    //Show only four items
    if ( $('.lia-list-standar li').length > 48 ) {
        /*$('.lia-list-standar li:gt(47)').hide();
        $('.show-mores').removeClass('hidden');
        */
        
            $('.show-lesss').click();
    }  
    
}

);
</script>