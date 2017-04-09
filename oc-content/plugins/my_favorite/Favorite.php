<?php

class Favorite extends DAO
{
    private static $instance;

    public static function newInstance() 
    {
      if( !self::$instance instanceof self ) {
        self::$instance = new self ;
      }
      return self::$instance ;
    }

    function __construct() 
    {
      parent::__construct();
      $this->setTableName('t_favorite') ;
      $this->setPrimaryKey('pk_i_id') ;
      $this->setFields( array('pk_i_id', 'fk_i_user_id', 'vote_user_id') ) ;
    }
    
    public function getTable_favorite() {
      return DB_TABLE_PREFIX.'t_favorite' ;
    }
    
    public function getTable_favorite_config() {
      return DB_TABLE_PREFIX.'t_favorite_config' ;
    }
    
    public function getTable_user() {
      return DB_TABLE_PREFIX.'t_user' ;
    }
    
    public function getTable_item() {
      return DB_TABLE_PREFIX.'t_item' ;
    }
    
    public function update_favorite_config($val, $type)
    {
        $data = array('val' => $val);
        $where = array('type' => $type);
        
        $this->dao->update($this->getTable_favorite_config(), $data, $where);
    }

    public function get_favorite_config($type)
    {
        $this->dao->select();
        $this->dao->from($this->getTable_favorite_config());
        $this->dao->where('type', $type);
        $rs = $this->dao->get();
        
        if(($rs !== false) && ($rs->numRows() === 1)) {
            return $rs->row();
        } else {
            return array();
        }
    }

    public function insert_favorite($hoiku_id, $user_id, $item_id)
    {
      $data = array(
        'fk_i_user_id' => $hoiku_id,
        'vote_user_id' => $user_id,
        'fk_i_item_id' => $item_id,
      );

      return $this->dao->insert( $this->getTable_favorite(), $data);
    }
    
    public function delete_favorite($hoiku_id, $user_id)
    {
      $where = array(
        'fk_i_user_id' => $hoiku_id,
        'vote_user_id' => $user_id,
      );

      return $this->dao->delete( $this->getTable_favorite(), $where);
    }
    
    public function get_favorite_users($hoiku_id)
    {
        $limit = $this->get_favorite_config('disp_num')["val"];

        $this->dao->select();
        $this->dao->from($this->getTable_favorite() . ' as ft');
        $this->dao->join($this->getTable_user() . ' as ut', 'ft.vote_user_id = ut.pk_i_id', 'LEFT');
        $this->dao->where('fk_i_user_id', $hoiku_id);
        $this->dao->limit($limit);
        $rs = $this->dao->get();
        
        return $rs->result();
    }
    
    public function get_all_favorite_users($hoiku_id)
    {   
        $this->dao->select();
        $this->dao->from($this->getTable_favorite() . ' as ft');
        $this->dao->join($this->getTable_user() . ' as ut', 'ft.vote_user_id = ut.pk_i_id', 'LEFT');
        $this->dao->where('fk_i_user_id', $hoiku_id);
        $rs = $this->dao->get();
        
        return $rs->result();
    }
    
    public function get_favorite_hoiku($user_id)
    {   
        $this->dao->select();
        $this->dao->from($this->getTable_favorite() . ' as ft');
        $this->dao->join($this->getTable_user() . ' as ut', 'ft.vote_user_id = ut.pk_i_id', 'LEFT');
        $this->dao->where('vote_user_id', $user_id);
        $rs = $this->dao->get();
        
        return $rs->result();
    }
    
    public function get_favorite_match($hoiku_id, $user_id)
    {
        $where = array('fk_i_user_id' => $hoiku_id, 'vote_user_id' => $user_id);
        
        $this->dao->select();
        $this->dao->from($this->getTable_favorite());
        $this->dao->where($where);
        $result = $this->dao->get();
        
        return $result->result();
    }
}
