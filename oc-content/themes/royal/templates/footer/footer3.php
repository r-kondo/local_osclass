<?php
    /*
     *       Royal Responsive Osclass Themes
     *       
     *       Copyright (C) 2016 OSCLASS.me
     * 
     *       This is Royal Osclass Themes with Single License
     *  
     *       This program is a commercial software. Copying or distribution without a license is not allowed.
     *         
     *       If you need more licenses for this software. Please read more here <http://www.osclass.me/osclass-me-license/>.
     */
?>
<section id="footerme">
    <div class="footer-tops">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
            <div class="footer">
              <div class="container">
                <div class="clearfix">
                  <div class="footer-logo"><a href="<?php echo osc_base_url(); ?>" alt="<?php echo osc_page_title() ; ?>" title="<?php echo osc_page_title() ; ?>">
                            <?php echo logo_header(); ?> </a>
<ul class="pagese">
                            <?php if(osc_get_preference('facebook-us', 'royal')!='' ) { ?>
                            <li>
                                <div class="icon-box">
                                    <a target="_blank" class="btn btn-circle btn-lg-light btn-sm" href="<?php echo osc_get_preference('facebook-us', 'royal'); ?>"> <i class="fa fa-facebook-square text-dark"></i></a>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if(osc_get_preference('twitter-us', 'royal')!='' ) { ?>
                            <li>
                                <div class="icon-box"><a target="_blank" class="btn btn-circle btn-lg-light btn-sm" href="<?php echo osc_get_preference('twitter-us', 'royal'); ?>"><i class="fa fa-twitter-square text-dark"></i></a> </div>
                            </li>
                            <?php } ?>
                             <?php if(osc_get_preference('instagram-us', 'royal')!='' ) { ?>
                            <li>
                                <div class="icon-box">
                                    <a target="_blank" class="btn btn-circle btn-lg-light btn-sm" href="<?php echo osc_get_preference('instagram-us', 'royal'); ?>"> <i class="fa fa-instagram text-dark"></i> </a>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if(osc_get_preference('gplus-us', 'royal')!='' ) { ?>
                            <li>
                                <div class="icon-box"> <a target="_blank" class="btn btn-circle btn-lg-light btn-sm" href="<?php echo osc_get_preference('gplus-us', 'royal'); ?>"><i class="fa fa-google-plus-square text-dark"></i></a> </div>
                            </li>
                            <?php } ?>
                            <?php if(osc_get_preference('linkedin-us', 'royal')!='' ) { ?>
                            <li>
                                <div class="icon-box"> <a target="_blank" class="btn btn-circle btn-lg-light btn-sm" href="<?php echo osc_get_preference('linkedin-us', 'royal'); ?>"><i class="fa fa-linkedin-square text-dark"></i></a> </div>
                            </li>
                            <?php } ?> </ul>
</div>
                  <dl class="footer-nav">
                    <dt class="nav-title"><?php echo osc_get_preference('judul1-royal', 'royal'); ?></dt>
                     <?php echo osc_get_preference('widget1-royal', 'royal'); ?>
                    
                  </dl>
                  <dl class="footer-nav">
                    <dt class="nav-title"><?php echo osc_get_preference('judul2-royal', 'royal'); ?></dt>
                     <?php echo osc_get_preference('widget2-royal', 'royal'); ?>
                   
                  </dl>
                  <dl class="footer-nav">
                    <dt class="nav-title"><?php echo osc_get_preference('judul3-royal', 'royal'); ?></dt>
                    <?php echo osc_get_preference('widget3-royal', 'royal'); ?>
                  </dl>
                  <dl class="footer-nav">
                    <dt class="nav-title"><?php echo osc_get_preference('judul4-royal', 'royal'); ?></dt>
                    <?php echo osc_get_preference('widget4-royal', 'royal'); ?>
                  </dl>
                </div>
                <div class="footes"><li><a href="<?php echo osc_base_url() ; ?>"><?php _e("Home", 'royal') ; ?></a> </li>
                        <li>
                            <a href="<?php echo osc_contact_url(); ?>"><?php _e("Contact", 'royal'); ?></a>
                        </li>
                        <?php osc_reset_static_pages(); ?>
                        <?php while( osc_has_static_pages() ) { ?>
                        <li>
                            <a href="<?php echo osc_static_page_url(); ?>">
                                <?php echo osc_static_page_title(); ?> </a>
                        </li>
                        <?php } ?>
                       <?php if(osc_get_preference('blog-links', 'royal')!='' ) { ?>
                            <li><a style="margin-right:10px;" target="_blank" href="<?php echo osc_get_preference('blog-links', 'royal'); ?>"><?php echo osc_get_preference('blog-text', 'royal'); ?></a></li>
                            <?php } ?> </div>
              <?php if ( osc_count_web_enabled_locales()> 1) { ?>
          <?php osc_goto_first_locale(); ?>
          <ul class="negara">
            <li class="layang">
              <?php _e("Language", 'royal') ; ?>
            </li>
            <?php $i=0 ; ?>
            <?php while ( osc_has_web_enabled_locales() ) { ?>
            <li <?php if( $i==0 ) { echo "class='first'"; } ?>><a id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><img src="<?php echo osc_current_web_theme_url() ; ?>/images/language/<?php echo osc_locale_code(); ?>.png"></a>
            </li>
            <?php $i++; ?>
            <?php } ?> </ul>
          <?php } ?> 
            <div class="footer-copyright text-center"><?php echo osc_get_preference('copyright-royal', 'royal'); ?></div>
              </div>
            </div>
          </div>
            </div>
        </div>
    </div>
</section>