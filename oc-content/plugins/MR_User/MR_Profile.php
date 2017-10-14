<?php
/**
 * mothereseプロフィールのカスタムフィールドを管理するクラス
 */

abstract class MR_Profile extends DAO 
{

    private static $errors;
    private static $profile;

    public function __construct()
    {
        parent::__construct();
    }

    public function import($file)
    {
        $path = osc_plugin_resource($file);
        $sql  = file_get_contents($path);

        if(!$this->dao->importSQL($sql)) {
            throw new Exception( __('Error importing the database structure of the jobboard plugin', 'jobboard'));
        }
    }

    public function get_profile($user_id)
    {
        if(!self::$profile || self::$profile['fk_i_user_id'] != $user_id) {
            $this->update_self_profile($user_id);
        }
        return self::$profile;
    }


    /**
     * メンバ変数の$profileデータを最新にする
     */
    protected function update_self_profile($user_id)
    {
        $this->dao->select($this->getFields());
        $this->dao->from($this->getTableName());
        $this->dao->where('fk_i_user_id', $user_id);
        $rs = $this->dao->get();
        if(($rs !== false) && ($rs->numRows() === 1)) {
            self::$profile = $rs->row();
        }
    }

    public function save_profile($user_id, $profile)
    {
        //フィールドが存在する値のみを使用
        foreach($profile as $key => $val) {
            if($key !== 'fk_i_user_id' && in_array($key, $this->getFields())) {
                $db_profile[$key] = htmlspecialchars(trim($val));
            }
        }
        $this->update_self_profile($user_id);
        if(self::$profile) {
            $this->update_profile($user_id, $db_profile);
        } else {
            $this->insert_profile($user_id, $db_profile);
        }

        $this->save_images($user_id);
    }

    protected function update_profile($user_id, $profile)
    {
        $this->dao->update($this->getTableName(), $profile, array('fk_i_user_id' => $user_id));
    }

    protected function insert_profile($user_id, $profile)
    {
        $profile['fk_i_user_id'] = $user_id;
        $rs = $this->dao->insert($this->getTableName(), $profile);
    }

    protected function get_image_ext($tmp_name)
    {
        $ext = array_search(
            mime_content_type($tmp_name),
            array(
                'gif' => 'image/gif',
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
            ),
            true
        );
        return $ext;
    }

    abstract public function validate($posts);


    /**
     * エラー文
     */
    protected function validate_file($key) 
    {
        if(isset($_FILES[$key]['tmp_name'])) {
            if (!isset($_FILES[$key]['error']) || !is_int($_FILES[$key]['error'])) {
                $this->set_file_error($key . '_path');
            }
            switch ($_FILES[$key]['error']) {
                case UPLOAD_ERR_OK: // OK
                    break;
                case UPLOAD_ERR_NO_FILE:   // ファイル未選択
                    break;
                case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
                case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過 (設定した場合のみ)
                    $this->set_size_over_error($key . '_path');
                    break;
                default:
                    $this->set_file_error($key . '_path');
            }
            if(!$this->get_image_ext($_FILES[$key]['tmp_name'])) {
                $this->set_ext_error($key . '_path');
            }
        }
    }
    public function get_errors()
    {
        return self::$errors;
    }

    protected function set_require_error($key)
    {
        self::$errors[$key] = 'を入力してください';
    }
    
    protected function set_date_error($key)
    {
        self::$errors[$key] = 'は有効な日付ではありません。';
    }

    protected function set_phone_error($key)
    {
        self::$errors[$key] = 'は有効な電話番号ではありません。';
    }

    protected function set_file_error($key)
    {
        self::$errors[$key] = 'のアップロードに失敗しました。';
    }

    protected function set_size_over_error($key)
    {
        self::$errors[$key] = 'のサイズが大きすぎます。';
    }

    protected function set_ext_error($key)
    {
        self::$errors[$key] = 'の拡張子が不正です。';
    }

    protected function set_value_error($key)
    {
        self::$errors[$key] = 'は有効な値ではありません。';
    }

    public function uninstall()
    {
        //debug用
        $this->dao->query('DROP TABLE ' . $this->getTableName());
    }
   
}
