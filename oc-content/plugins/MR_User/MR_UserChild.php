<?php
/**
 * motherese利用者の子どもに関するカスタムフィールドを管理するクラス
 */

class MR_UserChild extends DAO 
{
    
    private static $instance;
    private static $errors;
    private static $children;

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
        $this->setTableName('t_user_child_profile');
        $this->setPrimaryKey('fk_i_user_id');
        $this->setFields(array('fk_i_user_id', 'name', 'birthday', 'sex', 'personality'));

    }

    public function get_children($user_id)
    {
        if(!self::$children || self::$children[0]['fk_i_user_id'] != $user_id) {
            $this->update_self_children($user_id);
        }
        return self::$children;

    }

    private function update_self_children($user_id)
    {
        $this->dao->select($this->getFields());
        $this->dao->from($this->getTableName());
        $this->dao->where('fk_i_user_id', $user_id);
        $rs = $this->dao->get();
        if($rs !== false) {
            self::$children = $rs->result();
        }
    }

    public function save_children($user_id, $children)
    {   
        //一旦登録済みデータ削除
        $this->delete_children($user_id);

        //フィールドが存在する値のみを使用
        if(is_array($children['child_name'])) {
            foreach($children['child_name'] as $num => $val) {
                if($val) {
                    $db_child = array();
                    $db_child['name'] = $val;
                    $db_child['birthday'] = $children['child_birthday'][$num];
                    $db_child['sex'] = $children['child_sex'][$num];
                    $db_child['personality'] = $children['child_personality'][$num];
                    $this->insert_child($user_id, $db_child);
                }
            }
        }
    }

    private function delete_children($user_id)
    {
        $this->dao->delete($this->getTableName(), array('fk_i_user_id' => $user_id));
    }

    private function insert_child($user_id, $child)
    {
        $child['fk_i_user_id'] = $user_id;
        $rs = $this->dao->insert($this->getTableName(), $child);
    }

    public function validate($posts)
    {
        self::$errors = array();
        $child_count = 0;

        foreach($posts['child_name'] as $num => $val) {
            //nameが存在したら他の項目も確認する
            if(osc_validate_text($val, 1, true)) { 
                $child_count++;

                //birthday
                if(!preg_match('/^([1-9][0-9]{3})-(0[1-9]{1}|1[0-2]{1})-(0[1-9]{1}|[1-2]{1}[0-9]{1}|3[0-1]{1})$/', $posts['child_birthday'][$num])) {
                    $this->set_require_error('child_birthday');
                }
                $birthday = explode('-', $posts['child_birthday'][$num]);
                if(!checkdate((int)$birthday[1], (int)$birthday[2], (int)$birthday[0])) {
                    $this->set_date_error('child_birthday');
                }


                //sex
                if($posts['child_sex'][$num] != 1 && $posts['child_sex'][$num] != 2) {
                    $this->set_value_error('child_sex');
                }

                //personality       
                if(!osc_validate_text($posts['child_personality'][$num], 1, true)) {
                    $this->set_require_error('child_personality');
                }
            }

        }
        if(!$child_count) {
            $this->set_require_error('child_name');
        }

    }

    /**
     * エラー文
     */
    public function get_errors()
    {
        return self::$errors;
    }

    private function set_require_error($key)
    {
        self::$errors[$key] = 'を入力してください';
    }

    private function set_date_error($key)
    {
        self::$errors[$key] = 'は有効な日付ではありません。';
    }

    private function set_value_error($key)
    {
        self::$errors[$key] = 'は有効な値ではありません。';
    }

    public function uninstall()
    {
        //debug用
        $this->dao->query('DROP TABLE ' . $this->getTableName());
    }
}
