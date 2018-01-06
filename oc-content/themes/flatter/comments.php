<?php if( osc_comments_enabled() ) { ?>
    <div id="comments">
            <h2><i class="fa fa-comments clr"></i> 
            <?php if ( osc_count_item_comments () <= 1 ) { ?>
                <?php echo osc_count_item_comments(); ?> <?php _e('Comment', 'flatter'); ?>
            <?php } else { ?>
                <?php echo osc_count_item_comments(); ?> <?php _e('Comments', 'flatter'); ?>
            <?php } ?>
            </h2>
        <?php if( osc_count_item_comments() >= 1 ) { ?>
            <div class="comments_list">
                <?php while ( osc_has_item_comments() ) { ?>
                    <div class="comment clearfix">
                        <div class="pull-left avatar">
                        	<?php dd_commentpic();?>
                        </div>
                        <div class="pull-left message">
                            <?php /*?><h5><a href="<?php echo osc_user_public_profile_url(osc_comment_user_id()); ?>"><?php echo osc_comment_author_name(); ?></a> <small><?php echo osc_format_date( osc_comment_pub_date() ); ?></small></h5><?php */?>
                            <?php if( osc_comment_user_id() != null ) { ?>
                            <h5><a href="<?php echo osc_user_public_profile_url(osc_comment_user_id()); ?>"><?php echo osc_comment_author_name(); ?></a> <small><?php echo osc_format_date( osc_comment_pub_date() ); ?></small></h5>
                            <?php } else { ?>
                            <h5><?php echo osc_comment_author_name(); ?> <small><?php echo osc_format_date( osc_comment_pub_date() ); ?></small></h5>
                            <?php } ?>
                            <p><?php echo nl2br( osc_comment_body() ); ?></p>
                            <?php if ( osc_comment_user_id() && (osc_comment_user_id() == osc_logged_user_id()) ) { ?>
                            <p><a rel="nofollow" class="btn-danger" href="<?php echo osc_delete_comment_url(); ?>" title="<?php _e('Delete your comment', 'flatter'); ?>"><i class="fa fa-times"></i> <?php _e('Delete', 'flatter'); ?></a></p>
                        <?php } ?>
                        </div>
                    </div><!-- Comment -->
                <?php } ?>
                <div class="paginate" style="text-align: right;">
                    <?php echo osc_comments_pagination(); ?>
                </div>
            </div><!-- Comments List -->
        <?php } else { ?>
        <div class="no-comments">
            <?php _e('No comments', 'flatter'); ?>
        </div>
        <?php } ?>
        <?php if( osc_reg_user_post_comments () && osc_is_web_user_logged_in() || !osc_reg_user_post_comments() ) { ?>

        <?php CommentValidation(); ?>
        
        <div class="post-comments">
            <div class="comment clearfix">
                    <div class="pull-left avatar">
                        <?php if (function_exists("profile_picture_show")) { ?>
							<?php current_user_picture(); ?>
                        <?php } else { ?>
                            <img class="img-responsive" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_logged_user_email() ) ) ); ?>?s=60&d=<?php echo osc_current_web_theme_url('images/user-default.jpg') ; ?>" />
                        <?php } ?>
                    </div>
                    <div class="pull-left message">
                    	<ul id="comment_error_list"></ul>
                        <form action="<?php echo osc_base_url(true); ?>" method="post" name="comment_form" id="comment_form">
                            <input type="hidden" name="action" value="add_comment" />
                            <input type="hidden" name="page" value="item" />
                            <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                            <?php if(osc_is_web_user_logged_in()) { ?>
                                <input type="hidden" name="authorName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                                <input type="hidden" name="authorEmail" value="<?php echo osc_logged_user_email();?>" />
                            <?php } else { ?>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="<?php _e('Your name', 'flatter'); ?>" value="" name="authorName" id="authorName">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="<?php _e('Your e-mail', 'flatter'); ?>" value="" name="authorEmail" id="authorEmail">
                                </div>
                            <?php } ?>
                            <h5><?php echo osc_logged_user_name(); ?></h5>
                            <div class="form-group">
                               <textarea class="form-control" placeholder="<?php _e('Leave your comment (spam and offensive messages will be removed)', 'flatter'); ?>" rows="5" name="body" id="body"></textarea>
                            </div>
                            <div class="actions">
                                <button class="btn btn-clr" type="submit"><?php _e('Send', 'flatter'); ?></button>
                            </div>
                        </form>
                    </div>
                </div><!-- Comment -->
        </div><!-- Comments Container -->
        <?php } else { ?>
        <div class="panel-footer"><?php _e("You must be logged in to comment", 'flatter'); ?>. <a href="<?php echo osc_user_login_url(); ?>"><?php _e("Login", 'flatter'); ?></a> <?php _e("or", 'flatter'); ?> <a href="<?php echo osc_register_account_url(); ?>"><?php _e("Register", 'flatter'); ?></a></div>
        <?php } ?>    
    </div>
<?php } ?>
<!-- Comments End -->