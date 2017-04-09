<?php if(!osc_is_web_user_logged_in()) { ?>
    <div>
        <p>先にログインしてください</p>
    </div>
<?php } else { ?>

<div class="container">
    <div class=row>
        <div class="col-md-3">
            <?php echo osc_private_user_menu( get_user_menu() ); ?>
            <center class="ads-right"><?php echo osc_get_preference('sidebar-160x600', 'royal'); ?></center>
        </div>
        <div class="col-md-9">
            <?php if(!is_sitter(osc_logged_user_id())) { ?>
                <h2>お気に入り一覧</h2>
                <p>あなたが登録したお気に入りの一覧です</p>
                <?php disp_favorite_hoikulist(osc_logged_user_id()); ?>
            <?php } else { ?>
                <h2>お気に入り一覧</h2>
                <p>あなたをお気に入り登録した利用者一覧です</p>
                <?php disp_favorite_userlist(osc_logged_user_id()); ?>
            <?php } ?>
<?php } ?>
        </div>
    </div>
</div>