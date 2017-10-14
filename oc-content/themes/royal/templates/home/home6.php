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
#ads11,
.ad-footers {
    display: none;
}
#footer, section#footerme {
    margin-top: 0px;
}
.carousel-indicators .active {
    background-color: #2980b9;
}
li.active:after {
    opacity: 0;
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
.carousel-control.left span {
    padding: 15px;
}
.carousel-control.right span {
    padding: 15px;
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
.search-row-wrapper {
	display: none;
}
.form-control {
	border-bottom: #ddd 0px solid;
	border-right: #ddd 0px solid;
	border-left: 1px solid #ddd;
	border-top: #ddd 0px solid;
}
</style>
<div class="wrapper" style="position: relative;">
    <div class="<?php echo osc_get_preference('ari-us', 'royal'); ?>">
        <!-- Carousel -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 650px">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>
           
            <div class="carousel-inner">
                
                        <?php echo logo_slider(); ?>
                        <?php echo logo_slider_1(); ?>
                        <?php echo logo_slider_2(); ?>
                        <?php echo logo_slider_3(); ?>  
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="fa fa-chevron-left"></span> </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="fa fa-chevron-right"></span> </a>
        </div>
        <!-- /carousel -->
		<div class="row search-row animated fadeInUp" style="position: absolute;box-sizing: border-box;bottom: 100px;left: 0px;right: 0px;margin-left: auto;">
			<form action="<?php echo osc_base_url(true); ?>" method="get" role="search" class="nocsrf">
				<input type="hidden" name="page" value="search" />
				<fieldset>
					<div class="col-lg-3 col-sm-5 search-col" style="height: 48px;">
						<?php mother_search_meta_name("date"); ?>
					</div>
					<div class="col-lg-2 col-sm-5 search-col">
						<?php mother_search_meta_name("start"); ?>
					</div>
					<div class="col-lg-2 col-sm-5 search-col">
						<?php mother_search_meta_name("end"); ?>
					</div>
					<div class="col-lg-3 col-sm-5 search-col">
					<h6>ご利用目的</h6>
					<?php chosen_select_standard() ; ?> </div>
					<div class="col-lg-2 col-sm-5">
					<h6>　</h6>
						<div class="row">
						<input type="submit" class="btn btn-primary depans" value="探す" style="height: 48px;"> </div>
					</div>
				</fieldset>
			</form>
			<div class="row search-row " style="width: 600px;margin: 0px auto 0px;">
			<?php
				$search_page = "index.php?page=search&";
				$search_page .= mother_all_category_search();
				$search_link =  '<a href="' . $search_page . '&' . mother_meta_slug_to_id("e_today") . '=1">今日来られる</a>　|　';
				$search_link .= '<a href="' . $search_page . '&' . mother_meta_slug_to_id("e_tomorrow") . '=1">明日来られる</a>　|　';
				$search_link .= '<a href="' . $search_page . '&' . mother_meta_slug_to_id("regular") . '=1">定期で探す</a>　|　';
				$search_link .= '<a href="' . $search_page . '">条件から探す</a>　|　';
				$search_link .= '<a href="' . $search_page . '">>全てのサポーター</a>';
				echo $search_link;
			?>
			</div>
		</div>
<script>
  $(function() {
    $("#datepicker").datepicker();
  });
</script>

    </div>
</div>
<div id="ads10">
    <div class="container">
        <center>
            <?php echo osc_get_preference('header-728x90', 'royal'); ?> 
        </center>
    </div>
</div>
<?php if(osc_get_preference('phone-us', 'royal')=="yes" ) { ?>
<div class="container">
    <?php echo osc_get_preference('memo-us', 'royal'); ?> 
</div>
<?php } ?>
<div class="container">
<div class="row">
<div class="col-md-12 homecon topper">
                        <?php osc_goto_first_category(); 
                              $count = osc_count_categories();
                              $colmd = "col-md-3";
                              $index = 0;
                              if ($count < 4) {
                                  $offset = (12 - $count * 3) / 2;
                                  $colmd = $colmd . " col-md-offset-" . floor($offset);
                              }
                        ?>
                        <?php while( osc_has_categories()) { ?>
                        <a href="<?php echo osc_search_category_url() ; ?>">
                            <?php if ($index == 0) { ?>
                            <div class="<?php echo $colmd; ?>" style="padding: 0 0 0 0;">
                            <?php } else { ?>
                            <div class="col-md-3" style="padding: 0 0 0 0;">
                            <?php } 
                                $index += 1;
                            ?>
                                <div class="categorys"> <img src="<?php echo osc_current_web_theme_url() ; ?>images/category/<?php echo osc_category_id() ; ?>.png" class="icos <?php echo osc_category_slug() ; ?>" style="width: auto;max-height: 120px;height: 120px;">
                                    <!-- <h4><?php echo osc_category_name() ; ?></h4>  -->
                                </div>
                            </div>
                        </a>
                        <?php } ?> </div>
</div></div>

<?php osc_current_web_theme_path(''.osc_get_preference('katalog-royal', 'royal').'.php') ; ?>
