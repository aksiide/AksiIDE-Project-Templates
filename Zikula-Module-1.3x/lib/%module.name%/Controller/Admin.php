<?php
%header%

/**
 * Administrator-initiated actions for the Legal module.
 */
class %module.name%_Controller_Admin extends Zikula_AbstractController{
	/**
	 * The main administration entry point.
	 * Redirects to the {@link modifyConfig()} function.
	 * @return void
	 */
	public function main()	{
		//$this->redirect(ModUtil::url($this->name, 'admin', 'modifyConfig'));
		$this->throwForbiddenUnless(SecurityUtil::checkPermission('%module.name%::', '::', ACCESS_EDIT), LogUtil::getErrorMsgPermission());

		// nyoba panggil library
    $args = array();
		%module.name%_Util::NamaFungsi( $args);
		
		$view = FormUtil::newForm('%module.name%', $this);
		return $view->execute('admin/main.tpl', new %module.name%_Form_Handler_Admin_Main($args));
		
	}

	public function modifyconfig()	{
		// Security check
		if (!SecurityUtil::checkPermission('%module.name%::', '::', ACCESS_ADMIN)) {
				throw new Zikula_Exception_Forbidden();
		}

		// get all groups
		$groups = ModUtil::apiFunc('Groups', 'user', 'getall');

		// add dummy group "all groups" on top
		array_unshift($groups, array('gid' => 0, 'name' => $this->__('All users')));

		// add dummy group "no groups" on top
		array_unshift($groups, array('gid' => -1, 'name' => $this->__('No groups')));

		// Assign all the module vars
		return $this->view->assign(ModUtil::getVar('legal'))
				->assign('groups', $groups)
				->fetch('legal_admin_modifyconfig.tpl');
	}

	public function updateconfig()	{
		// Security check
		if (!SecurityUtil::checkPermission($this->name . '::', '::', ACCESS_ADMIN)) {
				throw new Zikula_Exception_Forbidden();
		}

		// Confirm the forms authorisation key
		$this->checkCsrfToken();

		$this->registerStatus($this->__('Done! Saved module configuration.'));

		// This function generated no output, and so now it is complete we redirect
		// the user to an appropriate page for them to carry on their work
		$this->redirect(ModUtil::url($this->name, 'admin', 'main'));
	}
}
