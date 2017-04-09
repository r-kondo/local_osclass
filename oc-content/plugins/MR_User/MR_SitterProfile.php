<?php
/**
 * motherese保育者のカスタムフィールドを管理するクラス
 */

class MR_SitterProfile extends MR_Profile
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
        $this->setTableName('t_sitter_profile');
        $this->setPrimaryKey('fk_i_user_id');
        $this->setFields(array('fk_i_user_id', 'sex', 'birthday', 'ice_phone', 'ice_relationship', 'image_path', 'test_image_path', 'comment_image_path', 'nursery_exp', 'kindy_exp', 'childcare_exp', 'childcare_num'));

    }

    public function save_images($user_id)
    {
        $dirs = array(
            'image' => osc_content_path() . 'uploads/profiles',
            'test_image' => osc_content_path() . 'uploads/tests',
            'comment_image' =>  osc_content_path() . 'uploads/comments'
        );

        foreach($dirs as $key => $dir) {

            //ディレクトリの作成
            if(!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            try {
                if(is_uploaded_file($_FILES[$key]['tmp_name'])) {
                    $file_name = sprintf('%s.%s',
                        sha1_file($_FILES[$key]['tmp_name']),
                        $this->get_image_ext($_FILES[$key]['tmp_name']));
                        move_uploaded_file($_FILES[$key]['tmp_name'], $dir . '/' . $file_name);
                $this->dao->update($this->getTableName(), array("{$key}_path" => $file_name), array('fk_i_user_id' => $user_id));
                }

            } catch(Exception $e) {
                $this->set_file_error($key);
            }
        }

    }

    public function validate($posts)
    {
        self::$errors = array();

        /*
        //sex 
        if($posts['sex'][$num] != 1 && $posts['sex'][$num] != 2) {
            $this->set_value_error('sex');
        }*/

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

        //image
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
            $this->validate_file('image');   
        } else if($_FILES['image']['error'] == 1) {
            $this->set_size_over_error('image_path');
        }

        //test_image
        if(is_uploaded_file($_FILES['test_image']['tmp_name'])) {
            $this->validate_file('test_image');   
        } else if($_FILES['test_image']['error'] == 1) {
            $this->set_size_over_error('test_image_path');
        }

        //comment_image
        if(is_uploaded_file($_FILES['comment_image']['tmp_name'])) {
            $this->validate_file('comment_image');   
        } else if($_FILES['comment_image']['error'] == 1) {
            $this->set_size_over_error('comment_image_path');
        }
    }
  
}
