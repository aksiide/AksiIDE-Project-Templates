<?php
/**
 * @license GNU/GPL
 * @link       http://kioss.com
 * @author     Luri Darmawan <kioss.com>
 * @category   Zikula_3rdParty_Modules
 * @package    Store
 *
 */

/**
 * Form handler for create and edit.
 */
class %module.name%_Handler_Edit extends Zikula_Form_AbstractHandler{
	/**
	 * User id.
	 * When set this handler is in edit mode.
	 * @var integer
	 */
	private $_id;
	
	private $_user;

	/**
	 * Setup form.
	 * @param Zikula_Form_View $view Current Zikula_Form_View instance.
	 * @return boolean
	 */
	public function initialize(Zikula_Form_View $view){
		if (!SecurityUtil::checkPermission('%module.name%::', '::', ACCESS_ADD) ) {
    	throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
    	//return LogUtil::registerPermissionError();
    }
		$lsS   = FormUtil::getPassedValue('aku', isset($args['aku']) ? $args['aku'] : null, 'GET');

    $view->assign( $_REQUEST);
    $view->assign( "variabel1", "isi variabel");
		return true;
	}

	/**
	 * Handle form submission.
	 *
	 * @param Zikula_Form_View $view  Current Zikula_Form_View instance.
	 * @param array            &$args Args.
	 *
	 * @return boolean
	 */
	public function handleCommand(Zikula_Form_View $view, &$args){
		// check for valid form
		if (!$view->isValid()) {
				//return false;
		}
    $lsURL = ModUtil::url('%module.name%', 'user','edit');


    if ($args['commandName'] == 'cancel') {
    	return $view->redirect( $lsURL);
    }
    if ($args['commandName'] != 'save') {
    	return $view->redirect( $lsURL);
    }

		$laData = $view->getValues();


    // your code


		//echo "--<pre>";print_r( $laData);die;

    //$this->setVars($data); --> simpan ke registry module
    LogUtil::registerStatus($this->__('Done! configuration updated.'));

		return $view->redirect( $lsURL);
	}


	//usage: if result is boolean --> $varname = (bool)$this->getFormValue('YesNo', false);
  private function getFormValue($key, $default){
  	//return isset($this->formValues[$key]) ? $this->formValues[$key] : $default;
    return FormUtil::getPassedValue( $key, $default, 'GETPOST', FILTER_SANITIZE_STRING);
  }


}

