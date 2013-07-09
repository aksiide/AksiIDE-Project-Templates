<?php
%header%

require_once DataUtil::formatForOS( "modules/%module.name%/config.app.php");
include_once DataUtil::formatForOS( 'modules/%module.name%/lib/%module.name%/vendor/lib.php');
include_once("system/Theme/lib/vendor/Mobile_Detect.php");

/**
 * This is the User controller class providing navigation and interaction functionality.
 */
class %module.name%_Controller_User extends Zikula_AbstractController {
  /*
  function __construct($objectId){
  	parent::__construct($objectId);
  }
  */

  // bypass illegal parameter to 'main'
	function __call($method, $args){
		$lsMethod = __METHOD__;
		//$lsFungsi = __FUNCTION__;
    return $this->main( $args);
	}

	/**
	 * This method is the default function.
	 * Called whenever the module's Admin area is called without defining arguments.
	 * @param array $args Array.
	 * @return string|boolean Output.
	 */
	public function main( $args){
  	global $Aksi;
		$now = DateUtil::getDatetime();
		$lsUserName = UserUtil::getVar( 'uname');
		$liUID = UserUtil::getVar( 'uid');

    $lsLanguage = ZLanguage::getLanguageCode();
    $dom = ZLanguage::getModuleDomain('%module.name%');
    $lsBahasa = __('bahasa', $dom);

    // example: get parsing variable
		$psVariabel = FormUtil::getPassedValue('variablename', '', 'GETPOST', FILTER_SANITIZE_STRING);

    // example: get table structur
		$dbtables = DBUtil::getTables();
		$pageTable = $dbtables['%module.id%_contohtable'];
		$pageColumn = $dbtables['%module.id%_contohtable_column'];
		
		$pageColumn = DBUtil::_getAllColumns( '%module.id%_contohtable');
		//$pageColumn = DBUtil::getColumnsArray( '%module.name%_contohtable');

    // example: execute direct query sql
		$lsSQL = 'SELECT name FROM %module.id%_contohtable';
		$dbresult = DBUtil::executeSQL( $lsSQL);
		$objectArray = DBUtil::marshallObjects($dbresult);
		
		// count
		/*
		$lsSQL = "select count(*) from $pageTable";
		$count = DBUtil::selectScalar($lsSQL);
		*/
		
		// insert
		/*
		$pageData[ "name"] = "juuud";
		$newPage = DBUtil::insertObject($pageData, 'namatable_prakiraan');
		*/

    $lsMobile = "";
    $detect = new Mobile_Detect();
    $lsMobile = $detect->isMobile() ? "-mobile" : '';

    $lbAdmin = SecurityUtil::checkPermission( '%module.name%::', '::', ACCESS_ADMIN);
    $this->view->assign( 'bAdmin', $lbAdmin);

		$this->view->assign( 'date', $now);
		$this->view->assign( 'uname', $lsUserName);
		$this->view->assign( 'uid', $liUID);
		return $this->view->fetch( "user/main$lsMobile.tpl");
	}

	/**
	 * Create or edit record.
	 *
	 * @return string|boolean Output.
	 */
	public function edit( $args){
		global $Aksi;
		if (!SecurityUtil::checkPermission( '%module.name%::', '::', ACCESS_ADD)) {
			return LogUtil::registerPermissionError(ModUtil::url( '%module.name%', 'user', 'main'));
		}

    // see file handler at folder "%module.name%/lib/%module.name%/Handler/Edit.php"

		$form = FormUtil::newForm( '%module.name%', $this);
		return $form->execute( '%module.name%_user_edit.tpl', new %module.name%_Handler_Edit());
	}
		
		
	public function view( $args) {
		global $Aksi;
		if (!SecurityUtil::checkPermission( '%module.name%::', '::', ACCESS_READ)) {
				return LogUtil::registerPermissionError(ModUtil::url( '%module.name%', 'user', 'lihat'));
		}
		$now = DateUtil::getDatetime();
		$psUserName = UserUtil::getVar( 'uname');
		$liUID = UserUtil::getVar( 'uid');

    $lsObject = FormUtil::getPassedValue( 'id', '', 'GETPOST', FILTER_SANITIZE_STRING);
    $lsVariabel = print_r( $_REQUEST, true);

		$this->view->assign( 'date', $now);
		$this->view->assign( 'uname', $psUserName);
		$this->view->assign( 'uid', $liUID);
		$this->view->assign( 'variabel', $lsVariabel);
		return $this->view->fetch( "user/lihat.tpl");
	}
	
	

}
