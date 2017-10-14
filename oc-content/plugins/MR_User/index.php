<?php
/*
Plugin Name: MR User
Plugin URI: https://lachelier.com/
Description: motherese専用。ユーザ関連をカスタマイズするプラグイン
Version: 1.0.0
Author: LachelierLLP
Author URI: https://lachelier.com
Short Name: MR_User
Plugin update URI: https://lachelier.com
 */
require_once dirname( __FILE__ ) . '/MR_Profile.php';
require_once dirname( __FILE__ ) . '/MR_SitterProfile.php';
require_once dirname( __FILE__ ) . '/MR_UserProfile.php';
require_once dirname( __FILE__ ) . '/MR_UserChild.php';

function mr_user_call_after_install()
{
    MR_UserProfile::newInstance()->import('MR_User/struct.sql');
}

function mr_user_call_after_uninstall()
{
    MR_UserProfile::newInstance()->uninstall();
    MR_UserChild::newInstance()->uninstall();
}

/**
 * プロフィール情報の検証
 */
function mr_user_edit($user_id)
{
    if(is_sitter($user_id)) {
        //保育者
        mr_sitter_save($user_id);
    } else {
        //利用者
        
        //画像の削除
        for($i = 1; $i < 5; $i++) {
            if(isset($_POST["delete_room_image_{$i}"]) && $_POST["delete_room_image_{$i}"]) {
                MR_UserProfile::newInstance()->delete_room_image($user_id, $i);
            }
        }
        mr_user_save($user_id, true);
    }
}

function mr_user_register($user_id)
{
    if(is_sitter($user_id)) {
        //保育者
        mr_sitter_save($user_id);
    } else {
        //利用者
        $userActions = new UserActions(false);
        $userActions->deactivate($user_id);
        mr_user_save($user_id, false);
    }
}



function is_sitter($user_id)
{
    $user = User::newInstance()->findByPrimaryKey($user_id);

    if(isset($user) && $user['b_company'] == 1) {
        return true;
    }
    return false;
}

/**
 * 入力されたデータを一時保管
 */
function mr_post_cache()
{
    if(is_session_started() === false) session_start();
    $posts = Params::getParamsAsArray();
    foreach($posts as $key => $post) {
        $_SESSION[$key] = $post;
    }
}

function is_session_started()
{
    if(php_sapi_name() !== 'cli') {
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE ? true : false;
        } else {
            return session_id() === '' ? false : true;
        }
    }
    return false;
}

function mr_post_cache_destroy()
{ 
    if(is_session_started() === false) session_start();   
 
    $posts = Params::getParamsAsArray();   
    foreach($posts as $key => $post) {
        unset($_SESSION[$key]);
    }
}

/**
 * 保育者情報の保存
 */
function mr_sitter_save($user_id)
{
    $posts = Params::getParamsAsArray();

    MR_SitterProfile::newInstance()->validate($posts);
    $errors = MR_SitterProfile::newInstance()->get_errors();
/*
    if(count($errors)) {
        foreach($errors as $key => $error) {
            $label = get_label($key);
            if(!$label) $label = $key;
            osc_add_flash_error_message($label . $error);
        }
    }*/
   
    /**
     * エラーのないものは保存
     */
    foreach($posts as $key => $post) {
        if(isset($errors[$key]) && $errors[$key]) unset($posts[$key]); 
    }

    MR_SitterProfile::newInstance()->save_profile($user_id, $posts);
    
    mr_post_cache_destroy();
}

/**
 * 利用者情報の保存
 */
function mr_user_save($user_id, $view_error=false)
{
    $posts = Params::getParamsAsArray();

    MR_UserProfile::newInstance()->validate($posts);
    $errors = MR_UserProfile::newInstance()->get_errors();

    MR_UserChild::newInstance()->validate($posts);
    $errors = array_merge($errors, MR_UserChild::newInstance()->get_errors());
    if($view_error) {
        if(count($errors)) {
            foreach($errors as $key => $error) {
                $label = get_label($key);
                if(!$label) $label = $key;
                osc_add_flash_error_message($label . $error);
            }
        }
    }
   
    /**
     * エラーのないものは保存
     */
    foreach($posts as $key => $post) {
        if(isset($errors[$key]) && $errors[$key]) unset($posts[$key]); 
    }

    MR_UserProfile::newInstance()->save_profile($user_id, $posts);
    MR_UserChild::newInstance()->save_children($user_id, $posts);

    mr_post_cache_destroy();
}


function get_label($key)
{
    $labels = array(
        'company_name' => '勤務先',
        'birthday' => '生年月日',
        'sex' => '性別',
        'ice_phone' => '緊急連絡先',
        'ice_relationship' => '緊急連絡先の続柄',

        'image_path' => 'プロフィール写真',
        'room_image_path' => '保育場所写真',

        'station_line' => '路線名',
        'station_name' => '駅名',
        'station_walk' => '駅からの徒歩時間',

        'child_name' => 'お子様の名前',
        'child_birthday' => 'お子様の生年月日',
        'child_sex' => 'お子様の性別',
        'child_personality' => 'お子様の性格',

        'test_image_path' => '筆記試験の回答内容',
        'comment_image_path' => '研修園・担当保育者からのコメント',
        'nursery_exp' => '保育園経験',
        'kindy_exp' => '幼稚園経験',
        'childcare_exp' => '子育て経験',
        'childcare_num' => '子育てした人数'
    );

    if(isset($labels[$key])) return $labels[$key];
    return '';
}

/**
 * テンプレート用関数
 */
function mr_sitter($user_id)
{
    if(!is_sitter($user_id)) return mr_user($user_id); //TODO:余力があれば直す。優先度低。
    return MR_SitterProfile::newInstance()->get_profile($user_id);
}
function mr_sitter_cfields($user_id)
{
    return MR_SitterProfile::newInstance()->get_cfields($user_id);
}
function mr_user($user_id)
{
    if(is_sitter($user_id)) return mr_sitter($user_id);
    return MR_UserProfile::newInstance()->get_profile($user_id);

}
function mr_children($user_id)
{
    return MR_UserChild::newInstance()->get_children($user_id);
}
function mr_children_count($user_id)
{
    $children = MR_UserChild::newInstance()->get_children($user_id);
    return count($children);
}
function form_sex($user=null)
{
    $value = isset($user['sex']) ? $user['sex'] : null;
    if(isset($_SESSION['sex']) && $_SESSION['sex']) $value = $_SESSION['sex'];
    echo "<label><input id='sex_male' name='sex' value='1' type='radio' ";
    if($value == 1) echo 'checked';
    echo ">男性</label> ";
    echo "<label><input id='sex_female' name='sex' value='2' type='radio' ";
    if($value == 2) echo 'checked';
    echo ">女性</label>";
}
function form_company_name($user=null)
{
    $value = isset($user['company_name']) ? $user['company_name'] : null;
    if(isset($_SESSION['company_name']) && $_SESSION['company_name']) $value = $_SESSION['company_name'];
    echo "<input id='company_name' type='text' name='company_name' value='{$value}'>";

}
function form_birthday($user=null)
{ 
    $value = isset($user['birthday']) ? $user['birthday'] : null;
    if(isset($_SESSION['birthday']) && $_SESSION['birthday']) $value = $_SESSION['birthday'];
    echo "<input id='birthday' type='date' name='birthday' value='{$value}'>";   
}
function form_ice_phone($user=null)
{
    $value = isset($user['ice_phone']) ? $user['ice_phone'] : null;
    if(isset($_SESSION['ice_phone']) && $_SESSION['ice_phone']) $value = $_SESSION['ice_phone'];
    echo "<input id='ice_phone' type='text' name='ice_phone' value='{$value}'>";
}
function form_ice_relationship($user=null)
{
    $value = isset($user['ice_relationship']) ? $user['ice_relationship'] : null;
    if(isset($_SESSION['ice_relationship']) && $_SESSION['ice_relationship']) $value = $_SESSION['ice_relationship'];
    echo "<input id='ice_relationship' type='text' name='ice_relationship' value='{$value}'>";
}
function form_station_line($user=null) 
{
    $value = isset($user['station_line']) ? $user['station_line'] : null;
    if(isset($_SESSION['station_line']) && $_SESSION['station_line']) $value = $_SESSION['station_line'];
    echo "<input id='station_line' type='text' name='station_line' class='with_txt' value='{$value}'>線";
}
function form_station_name($user=null) 
{
    $value = isset($user['station_name']) ? $user['station_name'] : null;
    if(isset($_SESSION['station_name']) && $_SESSION['station_name']) $value = $_SESSION['station_name'];
    echo "<input id='station_name' type='text' name='station_name' class='with_txt' value='{$value}'>駅";
}
function form_station_walk($user=null) 
{
    $value = isset($user['station_walk']) ? $user['station_walk'] : null;
    if(isset($_SESSION['station_walk']) && $_SESSION['station_walk']) $value = $_SESSION['station_walk'];
    echo "<input id='station_walk' type='number' name='station_walk' min=0 value='{$value}'>分";
}

function form_image($user=null)
{
    if(isset($user['image_path']) && $user['image_path']) {
        $dir = '/oc-content/uploads/profiles/';
        echo "<img src='{$dir}{$user['image_path']}'>";
    }
    echo "<input id='image' type='file' name='image'>";
}
function form_test_image($user=null)
{
    if(isset($user['test_image_path']) && $user['test_image_path']) {
        $dir = '/oc-content/uploads/tests/';
        echo "<img src='{$dir}{$user['test_image_path']}'>";
    }
    echo "<input id='test_image' type='file' name='test_image'>";
}
function form_comment_image($user=null)
{
    if(isset($user['comment_image_path']) && $user['comment_image_path']) {
        $dir = '/oc-content/uploads/comments/';
        echo "<img src='{$dir}{$user['comment_image_path']}'>";
    }
    echo "<input id='comment_image' type='file' name='comment_image'>";
}
function form_room_image($user=null, $num)
{
    $dir = '/oc-content/uploads/rooms/';
    if(isset($user["room_image_path_{$num}"]) && $image_path = $user["room_image_path_{$num}"]) {
        echo "<img src='{$dir}{$image_path}'><label><input type='checkbox' value='1' name='delete_room_image_{$num}'>削除</label>";
    } else {
        echo "<input id='room_image_{$num}' type='file' name='room_image_{$num}'>";
    }

}
function form_child_name($children=null, $num)
{
    $num--;
    $value = isset($children[$num]['name']) ? $children[$num]['name'] : null;
    if(isset($_SESSION['child_name'][$num]) && $_SESSION['child_name'][$num]) $value = $_SESSION['child_name'][$num];
    echo "<input id='child_name[{$num}]' type='text' name='child_name[{$num}]' class='with_txt' value='{$value}'>";
}
function form_child_birthday($children=null, $num)
{
    $num--;
    $value = isset($children[$num]['birthday']) ? $children[$num]['birthday'] : null;
    if(isset($_SESSION['child_birthday'][$num]) && $_SESSION['child_birthday'][$num]) $value = $_SESSION['child_birthday'][$num];
    echo "<input id='child_birthday[{$num}]' type='date' name='child_birthday[{$num}]' value='{$value}'>";
}
function form_child_sex($children=null, $num)
{
    $num--;
    $value = isset($children[$num]['sex']) ? $children[$num]['sex'] : null;
    if(isset($_SESSION['child_sex'][$num]) && $_SESSION['child_sex'][$num]) $value = $_SESSION['child_sex'][$num];
    echo "<label><input id='child_sex_boy[{$num}]' name='child_sex[{$num}]' value='1' type='radio' ";
    if($value == 1) echo 'checked';
    echo ">男の子</label> ";
    echo "<label><input id='child_sex_girl[{$num}]' name='child_sex[{$num}]' value='2' type='radio' ";
    if($value == 2) echo 'checked';
    echo ">女の子</label>";
}
function form_child_personality($children=null, $num)
{
    $num--;
    $value = isset($children[$num]['personality']) ? $children[$num]['personality'] : '';
    if(isset($_SESSION['child_personality'][$num]) && $_SESSION['child_personality'][$num]) $value = $_SESSION['child_personality'][$num];
    echo "<textarea id='child_personality[{$num}]' name='child_personality[{$num}]'>";
    echo $value;
    echo '</textarea>';
}
function form_nursery_exp($user=null)
{    
    $value = isset($user['nursery_exp']) ? $user['nursery_exp'] : null;
    if(isset($_SESSION['nursery_exp']) && $_SESSION['nursery_exp']) $value = $_SESSION['nursery_exp'];
    echo "<input type='number' name='nursery_exp' id='nursery_exp' value='{$value}'>年";
}
function form_kindy_exp($user=null)
{
    $value = isset($user['kindy_exp']) ? $user['kindy_exp'] : null;
    if(isset($_SESSION['kindy_exp']) && $_SESSION['kindy_exp']) $value = $_SESSION['kindy_exp'];
    echo "<input type='number' name='kindy_exp' id='kindy_exp' value='{$value}'>年";
}
function form_childcare_exp($user=null)
{
    $value = isset($user['childcare_exp']) ? $user['childcare_exp'] : null;
    if(isset($_SESSION['childcare_exp']) && $_SESSION['childcare_exp']) $value = $_SESSION['childcare_exp'];
    echo "<input type='number' name='childcare_exp' id='childcare_exp' value='{$value}'>年";
}   
function form_childcare_num($user=null)
{
    $value = isset($user['childcare_num']) ? $user['childcare_num'] : null;
    if(isset($_SESSION['childcare_num']) && $_SESSION['childcare_num']) $value = $_SESSION['childcare_num'];
    echo "<input type='number' name='childcare_num' id='childcare_num' value='{$value}'>名";
}

/**
 * 保育者時給フォーマット
 */
function mr_format_price($price) {
        if ($price === null) return osc_apply_filter ('item_price_null', __('Check with seller') );
        if ($price == 0) return osc_apply_filter ('item_price_zero', __('Free') );

        $symbol = '円/時';
        $price = $price/1000000;

        $currencyFormat = osc_locale_currency_format();
        $currencyFormat = str_replace('{NUMBER}', number_format($price), $currencyFormat);
        $currencyFormat = str_replace('{CURRENCY}', $symbol, $currencyFormat);
        return osc_apply_filter('item_price', $currencyFormat );
}

osc_register_plugin(osc_plugin_path(__FILE__), 'mr_user_call_after_install');
osc_add_hook(osc_plugin_path( __FILE__ ) . '_uninstall', 'mr_user_call_after_uninstall');
osc_add_hook('user_edit_completed', 'mr_user_edit');
osc_add_hook('user_register_completed', 'mr_user_register');
osc_add_hook('user_register_failed', 'mr_post_cache');

/*
//admin
function event_admin_menu()
{
//    osc_admin_menu_users('保育者一覧', osc_admin_render_plugin_url(osc_plugin_path(dirname(__FILE__)) . '/sitter_list.php'), 'sitter_list');
//     osc_admin_menu_users('利用者一覧', osc_admin_render_plugin_url(osc_plugin_path(dirname(__FILE__)) . '/user_list.php'), 'user_list');
       osc_admin_menu_users('保育者作成', osc_admin_render_plugin_url(osc_plugin_path(dirname(__FILE__)) . '/sitter_frm.php'), 'add_sitter'); 
}


function get_sitters()
{
    $users = User::newInstance()->search();
    if(isset($users['users'])) return $users['users'];
}

osc_add_hook('admin_menu_init', 'event_admin_menu');
 */
