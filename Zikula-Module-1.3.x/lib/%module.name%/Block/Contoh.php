<?php
%header% 

include_once("system/Theme/lib/vendor/Mobile_Detect.php");

class %module.name%_Block_Contoh extends Zikula_Controller_AbstractBlock {

	public function init(){
		// Security
		SecurityUtil::registerPermissionSchema('%module.name%:ContohBlock:', 'Block title::');
  }

  public function info()   {
		return array('module'          => '%module.name%',
								 'text_type'       => $this->__('Contoh'),
								 'text_type_long'  => $this->__('Contoh in a block'),
								 'allow_multiple'  => true,
								 'form_content'    => false,
								 'form_refresh'    => false,
								 'show_preview'    => true,
								 'admin_tableless' => true);
  }

	public function display($blockinfo) {
	// security check
	$this->throwForbiddenUnless(SecurityUtil::checkPermission('%module.name%:ContohBlock:', "$blockinfo[title]::", ACCESS_READ), LogUtil::getErrorMsgPermission());

	// Break out options from our content field
	$vars = BlockUtil::varsFromContent($blockinfo['content']);
	// --- Setting of the Defaults
	if (!isset($vars['usecaching'])) {
		$vars['usecaching'] = false;
	}
	if (!isset($vars['checkinmenu'])) {
		$vars['checkinmenu'] = true;
	}

		$numitems = 15;
		$detect = new Mobile_Detect();
    $lsMobile = $detect->isMobile() ? "-mobile" : '';

		// decode the query string (works with and without shorturls)
		System::queryStringDecode();
		$query['module'] = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'notcontent';
		$query['func'] = isset($_REQUEST['func']) ? $_REQUEST['func'] : 'notview';
		$query['pid'] = isset($_REQUEST['pid']) ? $_REQUEST['pid'] : 0;

		$lsContent = "contoh isi block";
		// your code


		$this->view->assign( 'sContent', $lsContent);
		$blockinfo[ 'content'] = $this->view->fetch( "block/contoh$lsMobile.tpl");
		return BlockUtil::themeBlock($blockinfo);
	}

	public function modify($blockinfo)	{
		return "ok";
		return $this->view->fetch('block/Contoh_modify.tpl');
	}

	function update($blockinfo) {
		$vars = BlockUtil::varsFromContent($blockinfo['content']);
		$vars['usecaching'] = (bool)FormUtil::getPassedValue('usecaching', false, 'POST');
		$vars['checkinmenu'] = (bool)FormUtil::getPassedValue('checkinmenu', true, 'POST');
		$blockinfo['content'] = BlockUtil::varsToContent($vars);

		// clear the block cache
		$this->view->clear_cache('block/contoh.tpl');

		return $blockinfo;
    }
}
