<?php
%header%

class %module.name%_Api_Admin extends Zikula_AbstractApi{

	/**
   * get available admin panel links
   *
   * @return array array of admin links
   */
	public function getlinks(){
        $links = array();

        if (SecurityUtil::checkPermission('%module.name%::', '::', ACCESS_EDIT)) {
            $links[] = array(
                'url' => ModUtil::url('%module.name%', 'admin', 'main'),
                'text' => $this->__('Example Dropdown'),
                'class' => 'z-icon-es-view',
                'links' => array(
                    array('url'  => ModUtil::url('%module.name%', 'user', 'sitemap'),
                          'text' => $this->__('Sitemap')),
                    array('url'  => ModUtil::url('%module.name%', 'user', 'extlist'),
                          'text' => $this->__('Extended')),
                    array('url'  => ModUtil::url('%module.name%', 'user', 'pagelist'),
                          'text' => $this->__('Complete')),
                    array('url'  => ModUtil::url('%module.name%', 'user', 'categories'),
                          'text' => $this->__('Category list')),
                    array('url'  => ModUtil::url('%module.name%', 'admin', 'deletedpages'),
                          'text' => $this->__('Restore pages')),
                ));
        }
        if (SecurityUtil::checkPermission('%module.name%::', '::', ACCESS_ADD)) {
            $links[] = array(
                'url'   => ModUtil::url('%module.name%', 'admin', 'newPage'),
                'text'  => $this->__('Add new'),
                'class' => 'z-icon-es-new');
        }
        if (SecurityUtil::checkPermission('%module.name%::', '::', ACCESS_ADMIN)) {
            $links[] = array(
                'url'   => ModUtil::url('%module.name%', 'admin', 'settings'),
                'text'  => $this->__('Settings'),
                'class' => 'z-icon-es-config');
            $links[] = array(
                'url'   => ModUtil::url('%module.name%', 'admin', 'upgradecontenttypes'),
                'text'  => $this->__('Upgrade StoreTypes'),
                'class' => 'z-icon-es-gears');
            $links[] = array(
                'url'   => ModUtil::url('%module.name%', 'admin', 'migrate'),
                'text'  => $this->__('Migrate Data'),
                'class' => 'z-icon-es-regenerate');
        }

        return $links;
	}

	public function getStyleClasses($args) {
		$classes = array();
		$userClasses = $this->getVar('styleClasses');
		$userClasses = explode("\n", $userClasses);

		foreach ($userClasses as $class) {
			list($value, $text) = explode('|', $class);
			$value = trim($value);
			$text = trim($text);
			if (!empty($text) && !empty($value)) {
				$classes[] = array('text' => $text, 'value' => $value);
			}
		}

		return $classes;
	}

	/**
	 * perform a StoreType upgrade on all modules
	 * @param string $modname (optional and unused at the moment)
	 */
	public function upgradecontenttypes($modname=null){
		if ($modname == null) {
			$modules = ModUtil::getModules();
			$count = 0;
			foreach ($modules as $module) {
				// there is no need to upgrade Store StoreTypes because they are done on module upgrade.
				if ($module['name'] <> '%module.name%') {
						$count += Store_Installer::updateStoreType($module['name']);
				}
			}
		} else {
			$count = Store_Installer::updateStoreType($modname);
		}
		return $count;
	}
}

