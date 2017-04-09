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

    osc_enqueue_script('jquery-validate');
?>
<div class="col-md-3">
    <div class="panel2">
        <style>
        .list-group-item {
            border: 1px solid #dddddd;
        }
        </style>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="<?php echo osc_contact_url(); ?>"><?php _e("Contact", 'royal'); ?></a>
            </li>
            <?php osc_reset_static_pages(); ?>
            <?php while( osc_has_static_pages() ) { ?>
            <li class="list-group-item">
                <a href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a>
            </li>
            <?php } ?> 
        </ul>
    </div>
</div>