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
$locales   = __get('locales');
    $user = osc_user();
    osc_enqueue_style('jquery-ui-custom', osc_current_web_theme_styles_url('jquery-ui/jquery-ui-1.8.20.custom.css'));
    osc_enqueue_script('jquery-validate');
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('common/head.php'); ?>
        <?php if( osc_count_items() == 0 || Params::getParam('iPage') > 0 || stripos($_SERVER['REQUEST_URI'], 'search') )  { ?>
            <meta name="robots" content="noindex, nofollow" />
            <meta name="googlebot" content="noindex, nofollow" />
        <?php } else { ?>
            <meta name="robots" content="index, follow" />
            <meta name="googlebot" content="index, follow" />
        <?php } ?>
    </head>
    <body>
    <?php osc_current_web_theme_path( 'header.php'); ?>
    <div id="content" class="container">
        <?php osc_current_web_theme_path('search-sidebar.php'); ?>
        <div class="col-md-9 nita">
            <div class="row list-group-item">
                <div id="list_head">
                    <div class="inner">
                        <div class="row">
                            <div class="col-md-12 actions">
                                <h3 class="refin"><?php echo search_title(); ?></h3>
                                       <div class="hola"><?php echo osc_category_description($locale = ""); ?></div>
                                        <div class="refine"><?php $spubcat = get_categoriesroyal(); ?>
					<?php if (!isset($spubcat[2]) && !isset($spubcat[1]) && isset($spubcat[0])) { ?>
						<?php ;
							foreach(get_subcategories() as $subcat) {
								
								echo "<li><span><a href='".$subcat["url"]."'><span>".$subcat["s_name"]."</span></a> <span class='color'>" . get_category_num_items($subcat) . "</span></span></li>";
								
							} }?></div>
                                <div class="list">
                                    <div class="user_type">
                                        <div class="search_num"><b><?php $search_number = royal_search_number();printf(__('%1$d - %2$d of %3$d listings', 'royal'), $search_number['from'], $search_number['to'], $search_number['of']); ?></b> </div>
                                        <div class="all <?php if(Params::getParam('sCompany') == '' or Params::getParam('sCompany') == null) { ?>active<?php } ?>"><span><?php _e("All",'royal'); ?></span>
                                            <div class="force_down"></div>
                                        </div>
                                        <div class="personal <?php if(Params::getParam('sCompany') == '0') { ?>active<?php } ?>"><span><?php _e("Personal",'royal'); ?></span> </div>
                                        <div class="firm <?php if(Params::getParam('sCompany') == '1') { ?>active<?php } ?>"><span><?php _e("Company",'royal'); ?></span> </div>
                                    </div>
                                </div>
                                <div class="btn-group btn-sm pull-left"> <a title="<?php echo osc_esc_html(__('Show As Galery','royal')); ?>" class="btn btn-primary btn-sm " href="<?php echo osc_update_search_url(array('sShowAs'=> 'gallery')); ?>"><span class="fa fa-th" aria-hidden="true"></span></a> <a title="<?php echo osc_esc_html(__('Show As List','royal')); ?>" class="btn btn-primary btn-sm " href="<?php echo osc_update_search_url(array('sShowAs'=> 'list')); ?>"><span class="fa fa-th-list" aria-hidden="true"></span></a> </div>
                                <!--     START sort by       -->
                                <div class="btn-group btn-sm pull-right">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <?php _e("Sort by", 'royal'); ?><span class="caret"></span> </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php $i=0 ; ?>
                                        <?php $orders=osc_list_orders(); foreach($orders as $label=> $params) { $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
                                        <?php if(osc_search_order()==$params['sOrder'] && osc_search_order_type()==$orderType) { ?>
                                        <li>
                                            <a class="current" href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>">
                                                <?php echo $label; ?> </a>
                                        </li>
                                        <?php } else { ?>
                                        <li>
                                            <a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>">
                                                <?php echo $label; ?> </a>
                                        </li>
                                        <?php } ?>
                                        <?php if ($i !=count($orders)-1) { ?> <span></span>
                                        <?php } ?>
                                        <?php $i++; ?>
                                        <?php } ?> 
                                     </ul>
                                </div>
                                
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <?php if(osc_count_items()==0 ) { ?>
                <p class="empty">
                    <?php printf(__('There are no results matching %s', 'royal'), osc_search_pattern()); ?> </p>
                <?php } else { ?>
                <?php osc_run_hook('search_ads_listing_top1'); ?>
                <?php require(osc_search_show_as()=='list' ? 'search_list.php' : 'search_gallery.php'); ?>
                <div class="paginate">
                    <?php echo osc_search_pagination(); ?> </div>
                <?php } ?>
                <div class="clear"></div>
                <?php $footerLinks=osc_search_footer_links(); ?>
                <ul class="footer-links">
                    <?php foreach($footerLinks as $f) { View::newInstance()->_exportVariableToView('footer_link', $f); ?>
                    <?php if($f['total'] < 3) continue; ?>
                    <li>
                        <a href="<?php echo osc_footer_link_url(); ?>">
                            <?php echo osc_footer_link_title(); ?> </a>
                    </li>
                    <?php } ?> 
                </ul>
                <div class="clear"></div>
            </div>
        </div>
</div>
<?php osc_current_web_theme_path('footer.php'); ?>
                        <script>
				$(document).ready(function() {
					$('.user_type div').click(function() {
						if($(this).hasClass('all')) {
							$('input#sCompany').val('');
						}
						
						if($(this).hasClass('personal')) {
							$('input#sCompany').val(0);
						}
						
						if($(this).hasClass('firm')) {
							$('input#sCompany').val(1);
						}
						
						$('.srcc').click();
					});
                                        $(".flashmessage .ico-close").click(function(){$(this).parent().hide();});
				});
			</script>
    </body>
</html>