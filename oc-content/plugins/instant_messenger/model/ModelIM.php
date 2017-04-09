<?php

class ModelIM extends DAO {
private static $instance;

public static function newInstance() {
  if( !self::$instance instanceof self ) {
    self::$instance = new self ;
  }
  return self::$instance ;
}

function __construct() {
  parent::__construct();
}

public function import($file) {
  $path = osc_plugin_resource($file);
  $sql = file_get_contents($path);
  if(!$this->dao->importSQL($sql)){ throw new Exception("Error importSQL::ModelIM<br>".$file.'<br>'.$path.'<br><br>Please check your database for if there are no plugin tables. <br>If any of those tables exists in your database, drop them!');} 
}
 
public function uninstall() {
  $this->dao->query('DROP TABLE '. $this->getTable_threads());
  $this->dao->query('DROP TABLE '. $this->getTable_messages());
}

public function getTable_threads() {
  return DB_TABLE_PREFIX.'t_im_threads' ;
}

public function getTable_messages() {
  return DB_TABLE_PREFIX.'t_im_messages' ;
}

public function getTable_Item() {
  return DB_TABLE_PREFIX.'t_item' ;
}

public function getTable_Page() {
  return DB_TABLE_PREFIX.'t_pages' ;
}

public function createThread( $item_id, $from_user_id, $from_user_name, $from_user_email, $to_user_id, $to_user_name, $to_user_email, $title, $flag ) {
  $aSet = array(
    'fk_i_item_id' => $item_id,
    'i_from_user_id' => $from_user_id,
    's_from_user_name' => $from_user_name,
    's_from_user_email' => $from_user_email,
    's_from_secret' => mb_generate_rand_string(10),
    'i_to_user_id' => $to_user_id,
    's_to_user_name' => $to_user_name,
    's_to_user_email' => $to_user_email,
    's_to_secret' => mb_generate_rand_string(10),
    's_title' => $title,
    'i_flag' => $flag
  );

  $this->dao->insert( $this->getTable_threads(), $aSet);
  return $this->dao->insertedId();
}


public function insertMessage( $thread_id, $type, $read, $message, $file, $email_sent ) {
  $aSet = array(
    'fk_i_thread_id' => $thread_id,
    'i_type' => $type,
    'i_read' => $read,
    'i_email_sent' => $email_sent,
    's_message' => $message,
    's_file' => $file
  );

  $this->updateThreadTimeByID( $thread_id );
  return $this->dao->insert( $this->getTable_messages(), $aSet);
}


public function countThreadsByUserId( $user_id = NULL ) {
  $this->dao->select('count(t2.i_thread_id) as i_count');
  $this->dao->from( $this->getTable_threads() . ' as t2' );

  if(isset($user_id) && $user_id <> '' && $user_id > 0) {
    $this->dao->where('t2.i_from_user_id = ' . $user_id . ' OR t2.i_to_user_id = ' . $user_id);
  }

  $result = $this->dao->get();
  if( !$result ) { return array(); }
  return $result->row();
}


public function getThreadsByUserId( $user_id = NULL, $limit = NULL, $offset = NULL ) {
  $this->dao->select('t.i_thread_id, t.fk_i_item_id, t.i_from_user_id, t.s_from_user_name, t.s_from_user_email, t.i_from_user_notify, t.i_to_user_id, t.s_to_user_name, t.s_to_user_email, t.i_to_user_notify, t.s_title, t.d_datetime, count(m.pk_i_id) as i_count, t.i_flag');

  $this->dao->from( $this->getTable_threads() . ' as t' );
  $this->dao->join( $this->getTable_messages() . ' as m', 't.i_thread_id = m.fk_i_thread_id', 'LEFT OUTER' );


  if(isset($user_id) && $user_id <> '' && $user_id > 0) {
    $this->dao->where('t.i_from_user_id = ' . $user_id . ' OR t.i_to_user_id = ' . $user_id);
  }

  $this->dao->groupby('t.i_thread_id, t.fk_i_item_id, t.i_from_user_id, t.s_from_user_name, t.s_from_user_email, t.i_from_user_notify, t.i_to_user_id, t.s_to_user_name, t.s_to_user_email, t.i_to_user_notify, t.s_title, t.i_flag');

  if(isset($limit) && $limit <> '' && $limit > 0 ) {
    if(isset($offset) && $offset <> '' && $offset > 0) {
      $this->dao->limit( $offset, $limit );
    } else {
      $this->dao->limit( $limit );
    }
  }


  $this->dao->orderby('t.d_datetime DESC');


  $result = $this->dao->get();
  if( !$result ) { return array(); }
  $prepare = $result->result();

  return $prepare;
}


public function getThreadsByItemId( $item_id, $user_id ) {
  $this->dao->select('t.i_thread_id, t.fk_i_item_id, t.i_from_user_id, t.s_from_user_name, t.s_from_user_email, t.i_from_user_notify, t.i_to_user_id, t.s_to_user_name, t.s_to_user_email, t.i_to_user_notify, t.s_title, t.d_datetime, count(m.pk_i_id) as i_count, t.i_flag');
  $this->dao->from( $this->getTable_threads() . ' as t' );
  $this->dao->join( $this->getTable_messages() . ' as m', 't.i_thread_id = m.fk_i_thread_id', 'LEFT OUTER' );

  $this->dao->where('t.fk_i_item_id = ' . $item_id . ' AND (t.i_from_user_id = ' . $user_id . ' OR t.i_to_user_id = ' . $user_id. ' )');

  $this->dao->groupby('t.i_thread_id, t.fk_i_item_id, t.i_from_user_id, t.s_from_user_name, t.s_from_user_email, t.i_from_user_notify, t.i_to_user_id, t.s_to_user_name, t.s_to_user_email, t.i_to_user_notify, t.s_title, t.i_flag');

  $this->dao->orderby('t.d_datetime DESC');

  $result = $this->dao->get();
  if( !$result ) { return array(); }
  $prepare = $result->result();
  return $prepare;
}


public function getThreadsByItemIdOnly( $item_id ) {
  $this->dao->select();
  $this->dao->from( $this->getTable_threads() );
  $this->dao->where('fk_i_item_id', $item_id);

  $result = $this->dao->get();
  if( !$result ) { return array(); }
  $prepare = $result->result();
  return $prepare;
}


public function getThreadsByUserIdOnly( $user_id ) {
  $this->dao->select();
  $this->dao->from( $this->getTable_threads() );
  $this->dao->where('i_from_user_id = ' . $user_id . ' OR i_to_user_id = ' . $user_id);

  $result = $this->dao->get();
  if( !$result ) { return array(); }
  $prepare = $result->result();
  return $prepare;
}


public function getThreadById( $id ) {
  $this->dao->select('t.i_thread_id, t.fk_i_item_id, t.i_from_user_id, t.s_from_user_name, t.s_from_user_email, t.s_from_secret, t.i_from_user_notify, t.i_to_user_id, t.s_to_user_name, t.s_to_user_email, t.s_to_secret, t.i_to_user_notify, t.s_title, t.d_datetime, count(m.pk_i_id) as i_count, t.i_flag');
  $this->dao->from( $this->getTable_threads() . ' as t' );
  $this->dao->join( $this->getTable_messages() . ' as m', 't.i_thread_id = m.fk_i_thread_id', 'LEFT OUTER' );

  $this->dao->where('t.i_thread_id', $id);
  $this->dao->groupby('t.i_thread_id, t.fk_i_item_id, t.i_from_user_id, t.s_from_user_name, t.s_from_user_email, t.s_from_secret, t.i_from_user_notify, t.i_to_user_id, t.s_to_user_name, t.s_to_user_email, t.s_to_secret, t.i_to_user_notify, t.s_title, t.i_flag');


  $result = $this->dao->get();
  if( !$result ) { return array(); }
  return $result->row();
}


public function getMessagesByThreadId( $thread_id ) {
  $this->dao->select();
  $this->dao->from( $this->getTable_messages() );

  $this->dao->where('fk_i_thread_id', $thread_id );

  $this->dao->orderby('d_datetime DESC');

  $result = $this->dao->get();
  if( !$result ) { return array(); }
  $prepare = $result->result();
  return $prepare;
}


public function getMessagesByThreadIdWithFile( $thread_id ) {
  $this->dao->select();
  $this->dao->from( $this->getTable_messages() );

  $this->dao->where('fk_i_thread_id', $thread_id );
  $this->dao->where('s_file <> ""' );

  $result = $this->dao->get();
  if( !$result ) { return array(); }
  $prepare = $result->result();
  return $prepare;
}


public function removeThreadsByDate( $datetime ) {
  $this->dao->query('DELETE FROM '. $this->getTable_threads() . ' WHERE d_datetime <= "' . $datetime . '"' );
}

public function removeThreadById( $thread_id ) {
  $this->dao->query('DELETE FROM '. $this->getTable_threads() . ' WHERE i_thread_id = ' . $thread_id );
}

public function removeThreadsByItemId( $item_id ) {
  $this->dao->query('DELETE FROM '. $this->getTable_threads() . ' WHERE fk_i_item_id = ' . $item_id );
}

public function removeThreadsByUserId( $user_id ) {
  $this->dao->query('DELETE FROM '. $this->getTable_threads() . ' WHERE i_from_user_id = ' . $user_id . ' OR i_to_user_id = ' . $user_id );
}

public function removeMessagesByThreadId( $thread_id ) {
  $this->dao->query('DELETE FROM '. $this->getTable_messages() . ' WHERE fk_i_thread_id = ' . $thread_id );
}


public function getLastMessageByThreadId( $thread_id ) {
  $this->dao->select();
  $this->dao->from( $this->getTable_messages() );

  $this->dao->where('fk_i_thread_id', $thread_id );

  $this->dao->orderby('d_datetime DESC');
  $this->dao->limit(1);

  $result = $this->dao->get();
  if( !$result ) { return array(); }
  return $result->row();
}



public function getMessagesByDate( $datetime ) {
  $this->dao->select();
  $this->dao->from( $this->getTable_messages() );

  $this->dao->where( 'd_datetime <= "' . $datetime .'"' );
  $this->dao->where( 's_file <> ""' );

  $result = $this->dao->get();
  if( !$result ) { return array(); }
  $prepare = $result->result();
  return $prepare;
}


public function countMessagesByUserId( $user_id ) {
  $this->dao->select('count(m.pk_i_id) as i_count');
  $this->dao->from( $this->getTable_threads() . ' as t' );
  $this->dao->join( $this->getTable_messages() . ' as m', 't.i_thread_id = m.fk_i_thread_id AND m.i_read = 0 AND (t.i_from_user_id = ' . $user_id . ' AND m.i_type = 1  OR  t.i_to_user_id = ' . $user_id . ' AND m.i_type = 0)', 'LEFT OUTER' );

  $result = $this->dao->get();
  if( !$result ) { return array(); }
  return $result->row();
}



public function getThreadIsRead( $thread_id, $user_id, $secret = NULL ) {
  $this->dao->select('coalesce(m.pk_i_id, 0) as pk_i_id, coalesce(m.i_read, 1) as i_read');
  $this->dao->from( $this->getTable_threads() . ' as t' );

  if( isset($secret) && $secret <> '' ) {
    $this->dao->join( $this->getTable_messages() . ' as m', 't.i_thread_id = m.fk_i_thread_id AND ((t.i_from_user_id = ' . $user_id . ' AND m.i_type = 1  OR  t.i_to_user_id = ' . $user_id . ' AND m.i_type = 0) OR (t.s_from_secret = "' . $secret . '" AND m.i_type = 1  OR  t.s_to_secret = "' . $secret . '" AND m.i_type = 0))', 'LEFT OUTER' );
  } else {
    $this->dao->join( $this->getTable_messages() . ' as m', 't.i_thread_id = m.fk_i_thread_id AND ((t.i_from_user_id = ' . $user_id . ' AND m.i_type = 1  OR  t.i_to_user_id = ' . $user_id . ' AND m.i_type = 0))', 'LEFT OUTER' );
  }

  $this->dao->where('t.i_thread_id', $thread_id );

  $this->dao->orderby('m.d_datetime DESC');
  $this->dao->limit(1);

  $result = $this->dao->get();
  if( !$result ) { return array(); }
  return $result->row();
}


public function getMessageById( $message_id ) {
  $this->dao->select();
  $this->dao->from( $this->getTable_messages() );

  $this->dao->where('pk_i_id', $message_id );

 
  $result = $this->dao->get();
  if( !$result ) { return array(); }
  return $result->row();
}


public function deleteMessageById( $message_id ) {
  return $this->dao->delete($this->getTable_messages(), array('pk_i_id' => $message_id ) ) ;
}


public function updateThreadTimeByID( $thread_id ) {
  $this->dao->query('UPDATE '. $this->getTable_threads() . ' SET d_datetime = current_timestamp WHERE i_thread_id = ' . $thread_id );
}

public function updateThreadFlag( $thread_id ) {
  $this->dao->query('UPDATE '. $this->getTable_threads() . ' SET i_flag = (i_flag*(-1) + 1) WHERE i_thread_id = ' . $thread_id );
}

public function deleteMessageAttachment( $message_id ) {
  $this->dao->query('UPDATE '. $this->getTable_messages() . ' SET s_file = "" WHERE pk_i_id = ' . $message_id );
}

public function updateThreadNotify( $thread_id, $user_id ) {
  $thread = $this->getThreadById( $thread_id );

  if( $thread['i_from_user_id'] == $user_id ) {

    // Update FROM user notify
    $this->dao->query('UPDATE '. $this->getTable_threads() . ' SET i_from_user_notify = (i_from_user_notify*(-1) + 1) WHERE i_thread_id = ' . $thread_id );
  } else {

    // Update TO user notify
    $this->dao->query('UPDATE '. $this->getTable_threads() . ' SET i_to_user_notify = (i_to_user_notify*(-1) + 1) WHERE i_thread_id = ' . $thread_id );
  }
}


public function updateMessagesRead( $thread_id, $type ) {
  $aSet = array(
    'i_read' => 1
  );

  $aWhere = array( 'fk_i_thread_id' => $thread_id, 'i_type' => $type );

  return $this->_update($this->getTable_messages(), $aSet, $aWhere);
}



public function updateThreadEmailFrom( $user_id, $new_mail ) {
  $aSet = array(
    's_from_user_email' => $new_mail
  );

  $aWhere = array( 'i_from_user_id' => $user_id );

  return $this->_update($this->getTable_threads(), $aSet, $aWhere);
}


public function updateThreadEmailTo( $user_id, $new_mail ) {
  $aSet = array(
    's_to_user_email' => $new_mail
  );

  $aWhere = array( 'i_to_user_id' => $user_id );

  return $this->_update($this->getTable_threads(), $aSet, $aWhere);
}


public function updateThreadEmail( $user_id, $new_mail ) {
  $this->updateThreadEmailFrom( $user_id, $new_mail );
  $this->updateThreadEmailTo( $user_id, $new_mail );
}



public function updateThreadUserIdFrom( $user_id, $email, $name ) {
  $aSet = array(
    'i_from_user_id' => $user_id,
    's_from_user_name' => $name
  );

  $aWhere = array( 's_from_user_email' => $email );

  return $this->_update($this->getTable_threads(), $aSet, $aWhere);
}


public function updateThreadUserIdTo( $user_id, $email, $name ) {
  $aSet = array(
    'i_to_user_id' => $user_id,
    's_to_user_name' => $name
  );

  $aWhere = array( 's_to_user_email' => $email );

  return $this->_update($this->getTable_threads(), $aSet, $aWhere);
}


public function updateThreadUserId( $user_id, $email, $name ) {
  $this->updateThreadUserIdFrom( $user_id, $email, $name );
  $this->updateThreadUserIdTo( $user_id, $email, $name );
}



public function getLastMessage( $thread_id, $type, $read, $email_sent = NULL ) {
  $this->dao->select();
  $this->dao->from( $this->getTable_messages() );

  $this->dao->where('fk_i_thread_id', $thread_id );
  $this->dao->where('i_type', $type );
  $this->dao->where('i_read', $read );

  if( isset($email_sent) && $email_sent <> '' ) {
    $this->dao->where('i_email_sent', $email_sent );
  }

  $this->dao->orderby('d_datetime DESC');
  $this->dao->limit(1);

  $result = $this->dao->get();
  if( !$result ) { return array(); }
  return $result->row();
}


public function getPages() {
  $this->dao->select('pk_i_id');
  $this->dao->from( $this->getTable_Page() );
  $this->dao->where('s_internal_name like "im_%"');

  $result = $this->dao->get();

  if( !$result ) { return array(); }
  $prepare = $result->result();
  return $prepare;
}


  

// update function
function _update($table, $values, $where) {
  $this->dao->from($table);
  $this->dao->set($values);
  $this->dao->where($where);
  return $this->dao->update();
}

// End of DAO Class
}
?>