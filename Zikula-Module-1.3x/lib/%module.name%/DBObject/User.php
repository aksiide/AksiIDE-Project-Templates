<?php


class %module.name%_DBObject_User extends DBObjectArray {
	public function __construct($init = null, $key = 0, $field = null) {
  	parent::__construct();
    $this->_objType       = 'namatabel';
    $this->_objField      = 'id'; //-- gagal masuk ke variabel
    $this->_objPath       = 'namatabel';
    $this->_objKey        = 'id';

    /*
    $this->_objJoin[]     = array (
    	'join_table'          =>  'users',
      'join_field'          =>  'uname',
      'object_field_name'   =>  'username',
      'compare_field_table' =>  'update_by',
      'compare_field_join'  =>  'uid'
    );

    */


    $this->_init($init, $key, $this->_objField);

  }
}
