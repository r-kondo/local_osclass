<?php
require_once '../../../oc-load.php';
require_once dirname( __FILE__ ) . '/Favorite.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoiku_id = intval($_POST['hoiku']);
    $user_id = intval($_POST['user']);
    $item_id = intval($_POST['item']);
    $action = $_POST['action'];
    
    if (!is_sitter($user_id)) {
        if ($action == "add") {

            Favorite::newInstance()->insert_favorite($hoiku_id, $user_id, $item_id);

            $response = array(
                            "status" => "insert"
                        );
            $json_res = json_encode($response);

            header('Content-Type: application/json');
            echo $json_res;
            exit;
        } else {
            Favorite::newInstance()->delete_favorite($hoiku_id, $user_id);

            $response = array(
                            "status" => "delete"
                        );
            $json_res = json_encode($response);

            header('Content-Type: application/json');
            echo $json_res;
            exit;
        }
    }
    
}