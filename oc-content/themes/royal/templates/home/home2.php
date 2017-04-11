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
<style>
.horbar-bevel,
#ads11,
.ad-footers, .ad-footers {
    display: none;
}
#footer, section#footerme {
    margin-top: 0px;
}
.carousel-inner img {
    width: 100%;
}
.carousel-indicators {
    bottom: 70px;
}
.carousel {
    position: relative;
}
.carousel-inner {} .carousel-inner>.item>img,
.carousel-inner>.item>a>img {
    line-height: 1;
}
.carousel-control {
    width: 0;
}
.carousel-control.left,
.carousel-control.right {
    opacity: 1;
    filter: alpha(opacity=100);
    background-image: none;
    background-repeat: no-repeat;
    text-shadow: none;
}
.carousel-control .fa-chevron-left,
.carousel-control .fa-chevron-right,
.carousel-control .icon-prev,
.carousel-control .icon-next {
    position: absolute;
    top: 45%;
    z-index: 5;
    display: inline-block;
}
.carousel-control .fa-chevron-left,
.carousel-control .icon-prev {
    left: 0;
}
.carousel-control .fa-chevron-right,
.carousel-control .icon-next {
    right: 0;
}
.carousel-control.left span,
.carousel-control.right span {
    background-color: rgba(163, 163, 163, 0.2);
}
.carousel-control.left span:hover,
.carousel-control.right span:hover {
    opacity: .7;
    filter: alpha(opacity=70);
}
.header-text {
    position: absolute;
    top: 20%;
    left: 1.8%;
    right: auto;
    width: 96.66666666666666%;
    color: #fff;
}
.header-text h2 {
    color: #fff;
    font-size: 40px;
}
.header-text h2 span {
    background-color: rgba(44, 62, 80, 0.65);
    padding: 10px;
}
.header-text h3 span {
    background-color: #000;
    padding: 15px;
}
.btn-min-block {
    min-width: 170px;
    line-height: 26px;
}
.btn-theme {
    color: #fff;
    background-color: rgba(44, 62, 80, 0.66);
    border: 2px solid #fff;
    margin-right: 15px;
}
.btn-theme:hover {
    color: #fff;
    background-color: rgba(11, 42, 73, 0.75);
    border-color: #fff;
}
</style>
<div class="wrapper">
    <div class="<?php echo osc_get_preference('ari-us', 'royal'); ?>">
        <!-- Carousel -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
           
            <div class="carousel-inner">
                
                        <?php echo logo_slider(); ?>
                        <?php echo logo_slider_1(); ?>
                        <?php echo logo_slider_2(); ?> 
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="fa fa-chevron-left"></span> </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="fa fa-chevron-right"></span> </a>
        </div>
        <!-- /carousel -->
    </div>
</div>
<div id="ads10">
    <div class="container">
        <center>
            <?php echo osc_get_preference('header-728x90', 'royal'); ?> 
        </center>
    </div>
</div>
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
            <div class="masonry">
            <?php while ( osc_has_categories() ) { ?>
            <ul class="item ulfa">
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
            <?php } ?></div>
      </div>
        <?php } ?> 
  </div>
</div>
<?php osc_current_web_theme_path(''.osc_get_preference('katalog-royal', 'royal'). '.php') ; ?>