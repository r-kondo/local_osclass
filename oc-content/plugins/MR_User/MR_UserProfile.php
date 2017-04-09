<?php
/**
 * motherese利用者のカスタムフィールドを管理するクラス
 */

class MR_UserProfile extends MR_Profile
{

    private static $instance;
    private static $errors;
    private static $profile;


    public static function newInstance()
    {
        if(!self::$instance instanceof self) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('t_user_profile');
        $this->setPrimaryKey('fk_i_user_id');
        $this->setFields(array('fk_i_user_id', 'company_name', 'sex', 'birthday', 'ice_phone', 'ice_relationship', 'image_path', 'room_image_path_1', 'room_image_path_2', 'room_image_path_3', 'room_image_path_4', 'room_image_path_5', 'station_line', 'station_name', 'station_walk'));

    }

    public function validate($posts)
    {
        self::$errors = array();
        //company_name
        if(!osc_validate_text($posts['company_name'], 1, true)) {
            $this->set_require_error('company_name');
        }

        //sex 
        if($posts['sex'][$num] != 1 && $posts['sex'][$num] != 2) {
            $this->set_value_error('sex');
        }

        //birthday
        if(!preg_match('/^([1-9][0-9]{3})-(0[1-9]{1}|1[0-2]{1})-(0[1-9]{1}|[1-2]{1}[0-9]{1}|3[0-1]{1})$/', $posts['birthday'])) {
            $this->set_require_error('birthday');
        }
        $birthday = explode('-', $posts['birthday']);
        if(!checkdate((int)$birthday[1], (int)$birthday[2], (int)$birthday[0])) {
            $this->set_date_error('birthday');
        }

        //ice_phone
        if(!osc_validate_phone($posts['ice_phone'], 10, true)) {
            $this->set_phone_error('ice_phone');
        }

        //ice_relationship
        if(!osc_validate_text($posts['ice_relationship'], 1, true)) {
            $this->set_require_error('ice_relationship');
        }

        //station_line
        if(!osc_validate_text($posts['station_line'], 1, true)) {
            $this->set_require_error('station_line');
        }

        //station_name
        if(!osc_validate_text($posts['station_name'], 1, true)) {
            $this->set_require_error('station_name');
        }

        //station_walk
        if(!osc_validate_number($posts['station_walk'], true)) {
            $this->set_require_error('station_walk');
        }

        //image
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
            $this->validate_file('image');   
        } else if($_FILES['image']['error'] == 1) {
            $this->set_size_over_error('image_path');
        }

        //room_image
        for($i = 1; $i < 6; $i++) {
            if(is_uploaded_file($_FILES["room_image_{$i}"]['tmp_name'])) {
                $this->validate_file("room_image_{$i}");
            } else if($_FILES["room_image_{$i}"]['error'] == 1) {
            $this->set_size_over_error('room_image_path');
            }
        }
    }


    public function save_images($user_id)
    {
        var_dump($_FILES);
        $image_dir = osc_content_path() . 'uploads/profiles';
        $room_dir = osc_content_path() . 'uploads/rooms';

        //ディレクトリの作成
        if(!file_exists($image_dir)) {
            mkdir($image_dir, 0777);
        }
        if(!file_exists($room_dir)) {
            mkdir($room_dir, 0777);
        }
        //image_path
        try{
            if(is_uploaded_file($_FILES['image']['tmp_name'])) {
                $file_name = sprintf('%s.%s',
                    sha1_file($_FILES['image']['tmp_name']),
                    $this->get_image_ext($_FILES['image']['tmp_name']));
                move_uploaded_file($_FILES['image']['tmp_name'], $image_dir . '/' . $file_name);
                $this->dao->update($this->getTableName(), array('image_path' => $file_name), array('fk_i_user_id' => $user_id));
            }
        }catch(Exception $e) {
            $this->set_file_error('image');
        }

        //room_image_path
        for($i = 1; $i < 6; $i++) {
            try{
                if(is_uploaded_file($_FILES["room_image_{$i}"]['tmp_name'])) {
                    $file_name = sprintf('%s.%s',
                        sha1_file($_FILES["room_image_{$i}"]['tmp_name']),
                        $this->get_image_ext($_FILES["room_image_{$i}"]['tmp_name']));
                    move_uploaded_file($_FILES["room_image_{$i}"]['tmp_name'], $room_dir . '/' . $file_name);
                    $this->dao->update($this->getTableName(), array("room_image_path_{$i}" => $file_name), array('fk_i_user_id' => $user_id));

                }
            } catch(Exception $e) {
                $this->set_file_error("room_image_{$i}");
            }
        }
    }

    public function delete_room_image($user_id, $i)
    {
        $this->dao->update($this->getTableName(), array("room_image_path_{$i}" => ''), array('fk_i_user_id' => $user_id));
    }

}
