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
.list-group {
	padding-left: 0;
	margin-bottom: 0px;
}
#footer, section#footerme {
    margin-top: 0px;
}
input.btn.btn-primary.depans {
	border-radius: 0px;
}
.horbar-bevel,
#ads11,
.ad-footers {
	display: none;
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
<div class="intro" style="background-image:url(<?php echo osc_current_web_theme_url('images/cover.jpg') ; ?>);">
	<div class="tables ari100">
		<div class="tables-cell ari100">
			<div class="container text-center">
				<h1 class="intro-title animated fadeInDown"><?php echo osc_get_preference('slider1-royal', 'royal'); ?></h1>
				<p class="sub animateme fittext3 animated fadeIn">
					<?php echo osc_get_preference('slider2-royal', 'royal'); ?> </p>
				<div class="row search-row animated fadeInUp">
					<form action="<?php echo osc_base_url(true); ?>" method="get" role="search" class="nocsrf">
						<input type="hidden" name="page" value="search" />
						<fieldset>
							<div class="col-lg-3 col-sm-3 search-col relative locationicon">
								<input type="text" name="sPattern" class="form-control" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'royal'), 'royal')); ?>" value="" /> </div>
							<div class="col-lg-3 col-sm-3 search-col relative">
								<?php chosen_select_standard() ; ?> </div>
							<div class="col-lg-3 col-sm-3 search-col relative">
								<?php royal_regions_select('sRegion', 'sRegion', __('Select a region...', 'royal')) ; ?> </div>
							<div class="col-lg-3 col-sm-3">
								<div class="row">
									<input type="submit" class="btn btn-primary depans" value="<?php echo osc_esc_html(__('Search','royal')); ?>"> </div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="ads10">
	<div class="container">
		<center><?php echo osc_get_preference('header-728x90', 'royal'); ?> </center>
	</div>
</div>
<?php if(osc_get_preference('phone-us', 'royal')=="yes" ) { ?>
<div class="container">
	<?php echo osc_get_preference('memo-us', 'royal'); ?> </div>
<?php } ?>
<div class="container">
<div class="row">
<div class="col-md-12 homecon topper">
                        <?php osc_goto_first_category(); ?>
                        <?php while( osc_has_categories()) { ?>
                        <a href="<?php echo osc_search_category_url() ; ?>">
                            <div class="ari-45 col-md-2">
                                <div class="categorys color-<?php echo osc_category_id() ; ?>"><?php if(osc_get_preference('icon_view', 'royal_theme')=="1" ) { ?><i class="fa fa-<?php echo royals_category_icon( osc_category_id() ); ?> icoser"></i> <?php } else{ ?> <img src="<?php echo osc_current_web_theme_url() ; ?>images/category/<?php echo osc_category_id() ; ?>.png" class="icos <?php echo osc_category_slug() ; ?>"><?php } ?>
                                    <h4><?php echo osc_category_name() ; ?></h4> 
                                </div>
                            </div>
                        </a>
                        <?php } ?> </div>
</div></div>
<?php osc_current_web_theme_path(''.osc_get_preference('katalog-royal', 'royal'). '.php') ; ?>