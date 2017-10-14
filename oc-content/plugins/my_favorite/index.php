<?php
/*
Plugin Name: MY FAVORITE
Plugin URI: https://lachelier.com/
Description: motherese専用。お気に入り登録を管理するプラグイン。MR USER に依存性あり。
Version: 1.0.0
Author: LachelierLLP
Author URI: https://lachelier.com
Short Name: MY_FAVORITE
Plugin update URI: https://lachelier.com
 */

require_once dirname( __FILE__ ) . '/Favorite.php';

osc_enqueue_style('fv-style', osc_base_url() . 'oc-content/plugins/my_favorite/css/favorite.css');

function my_favorite_install()
{
    //テーブル作成
    $conn = getConnection() ;
    $conn->autocommit(false);
    try {
        $path = osc_plugin_resource('my_favorite/struct.sql'); //sqlファイルのパス
        $sql = file_get_contents($path);
        $conn->osc_dbImportSQL($sql);
        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage();
    }
    $conn->autocommit(true);
}
 
function my_favorite_uninstall()
{
    //テーブル削除
    $conn = getConnection() ;
    $conn->autocommit(false);
    try {
//        $conn->osc_dbExec('DROP TABLE %st_favorite', DB_TABLE_PREFIX);
        $conn->osc_dbExec('DROP TABLE %st_favorite_config', DB_TABLE_PREFIX);
        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        echo $e->getMessage();
    }
    $conn->autocommit(true);
}

function my_favorite_configuration()
{
    osc_admin_render_plugin( osc_plugin_path( dirname(__FILE__) ) . '/admin/configure.php' );
}

function set_disp_num()
{
     Favorite::newInstance()->update_favorite_config(Params::getParam('display_num'), 'disp_num');
}

function get_disp_num()
{
    $result = Favorite::newInstance()->get_favorite_config('disp_num');
    return $result["val"];
}

function add_favorite_button($hoiku_id, $user_id, $item_id)
{
    if (is_favorite($hoiku_id, $user_id)) {
        echo '<p>' .
                '<button id="post_favorite" type="button" class="btn btn-warning fv-btn">お気に入り解除</button>' .
             '</p>';
    } else {
        echo '<p>' .
                '<button id="post_favorite" type="button" class="btn btn-warning fv-btn add_favorite">この保育者のファンになる</button>' .
             '</p>';
    }
    
    echo '<script>' .
            '$("#post_favorite").on("click", function(){' .
                'var self = this;' .
                'var action = ($(self).hasClass("add_favorite")) ? "add" : "delete";' . 
                '$(self).prop("disabled", true);' .
                'var url = "/oc-content/plugins/my_favorite/ajax.php";' .
                'var param = {hoiku:' . $hoiku_id . ',user:' . $user_id . ',item:' . $item_id . ',action: action' . '};' .
    
                '$.ajax({' .
                        'url: url,' .
                        'type: "POST",' .
                        'data: param' .
                '}).done(function(data, status, xhr){' .
                    'console.log("ok");' .
                    'if(data["status"] == "insert"){' .
                        '$(self).text("お気に入り解除");' .
                        '$(self).removeClass("add_favorite");' .
                    '}else{' .
                        '$(self).text("この保育者のファンになる");' .
                        '$(self).addClass("add_favorite");' .
                    '}' .
                '}).fail(function(xhr, status, error){' .
                    'console.log("ng");' .
                '}).always(function(xhr, status, error){' .
                    '$(self).prop("disabled", false);' .
                '});' .
            '});' .
         '</script>';
}

function is_favorite($hoiku_id, $user_id)
{   
    $result = Favorite::newInstance()->get_favorite_match($hoiku_id, $user_id);
    
    if (count($result) == 0) {
        return false;
    } else {
        return true;
    }
}

function disp_favorite_users($hoiku_id)
{
    $result = Favorite::newInstance()->get_favorite_users($hoiku_id);
    $result_all = Favorite::newInstance()->get_all_favorite_users($hoiku_id);
    $remain_num = intval(count($result_all)) - intval(count($result)); 
   
    echo '<div class="fv-list-wrap"><ul>';
    echo '<h2>この保育者をお気に入りのご利用者様</h2>';
    if (count($result) > 0) {
        foreach ($result as $user) {
            
            //公開プロフィールの画像表示用
            $profile = mr_user($user["pk_i_id"]);

            echo '<li>' .
                    '<a href="' . osc_user_public_profile_url($user["vote_user_id"]) . '">';
            if($profile['image_path']) {
                $filename = $profile['image_path'];
            
                echo '<img src="/oc-content/uploads/profiles/' . $filename . '" class="img-circle">';
            } else { 
                echo '<a href="' . osc_user_public_profile_url($user["vote_user_id"]) . '">' .
                            '<img src="' . osc_current_web_theme_url() . '/images/user_default.gif" class="img-circle">';

            }
            echo '</a>' .
                    '</li>';
        }
        if ($remain_num > 0) {
            echo '<li class="fv-num-circle">+' . $remain_num . '名</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>お気に入り登録者はいません</p>';
    }
    echo '</div>';
}

/**
 * 何かを考慮してこの関数をつくったが、忘れた
 */
function get_favorite_users_count($hoiku_id)
{
    $conn = getConnection();
    $result = $conn->osc_dbFetchResults("SELECT * FROM %st_favorite as ft LEFT JOIN  %st_user as ut ON ft.vote_user_id = ut.pk_i_id WHERE`fk_i_user_id` = %d", DB_TABLE_PREFIX, DB_TABLE_PREFIX, $hoiku_id);
    return count($result);
}

function osc_user_favorite_url()
{
          return osc_route_url('my-favorite');
}

function disp_favorite_hoikulist($user_id)
{
    $conn = getConnection();
    $result = $conn->osc_dbFetchResults("SELECT * FROM %st_favorite as ft LEFT JOIN %st_user as ut ON ft.fk_i_user_id = ut. pk_i_id WHERE`vote_user_id` = %d", DB_TABLE_PREFIX, DB_TABLE_PREFIX, $user_id);
    
    if (count($result) > 0) {
        echo '<ul>';
        foreach ($result as $user) {
            View::newInstance()->_exportVariableToView('item', Item::newInstance()->findByPrimaryKey($user["fk_i_item_id"]));
            echo '<li>' .
                    '<a href="' . osc_item_url() . '">' .
                        $user["s_name"] .
                    '</a>' .
                 '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>お気に入りは登録はありません。</p>';
    }
}

function disp_favorite_userlist($hoiku_id)
{
    $result = Favorite::newInstance()->get_favorite_users($hoiku_id);
    $result_all = Favorite::newInstance()->get_all_favorite_users($hoiku_id);
    $remain_num = intval(count($result_all)) - intval(count($result)); 
   
    if (count($result) > 0) {
        echo '<ul>';
        foreach ($result as $user) {
            View::newInstance()->_exportVariableToView('item', Item::newInstance()->findByPrimaryKey($user["fk_i_item_id"]));
            echo '<li>' .
                    '<a href="' . osc_user_public_profile_url($user["pk_i_id"]) . '">' .
                        $user["s_name"] .
                    '</a>' .
                 '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>お気に入りは登録はありません。</p>';
    }
}

function fv_user_menu_link(){
  echo '<li><a href="' . osc_route_url('my-favorite') .'" >お気に入り</a></li>'; 
}
osc_add_hook('user_menu', 'fv_user_menu_link');

// Register hooks
osc_register_plugin(osc_plugin_path(__FILE__), 'my_favorite_install');
osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'my_favorite_uninstall');
osc_add_hook(osc_plugin_path(__FILE__)."_configure", 'my_favorite_configuration');

// Add route
osc_add_route('my-favorite', 'my-favorite', 'my-favorite', osc_plugin_folder(__FILE__).'user/favorite.php', false);
