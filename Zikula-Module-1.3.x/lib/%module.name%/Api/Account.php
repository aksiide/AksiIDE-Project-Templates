<?php
/**
 * Zikula Application Framework
 *
 * @copyright   (c) Zikula Development Team
 * @link        http://www.zikula.org
 * @category    Zikula_3rdParty_Modules
 * @generatedby AksiIDE
 * @url         http://kioss.com
 * @package     Content_Management
 * @subpackage  %module.name%
 */

class %module.name%_Api_Account extends Zikula_AbstractApi
{
    /**
     * Return an array of items to show in the your account panel
     *
     * @return   array
     */
    public function getall($args)
    {
        $items = array();
        $uname = (isset($args['uname'])) ? $args['uname'] : UserUtil::getVar('uname');
        // does this user exist?
        if(UserUtil::getIdFromName($uname)==false) {
            // user does not exist
            return $items;
        }

        // Create an array of links to return
        if (SecurityUtil::checkPermission( '%module.name%::', '::', ACCESS_COMMENT)) {
            $items[] = array('url'     => ModUtil::url('%module.name%', 'user', 'edit'),
                    'module'  => '%module.name%',
                    'title'   => $this->__('%project.name% Edit'),
                    'icon'    => 'news_add.gif'
            );
        }

        // if administrator
        if (SecurityUtil::checkPermission( '%module.name%::', '::', ACCESS_ADMIN)) {
            $items[] = array('url'     => ModUtil::url('%module.name%', 'admin', 'main'),
                    'module'  => '%module.name%',
                    'title'   => $this->__('%project.name% Administrator'),
                    'icon'    => 'admin.png'
            );


        }
        // Return the items
        return $items;
    }

}

