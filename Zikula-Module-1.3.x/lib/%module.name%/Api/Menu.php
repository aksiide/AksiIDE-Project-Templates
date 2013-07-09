<?php
%header%


require_once DataUtil::formatForOS( "modules/%module.name%/config.app.php");

class %module.name%_Api_Menu extends Zikula_AbstractApi {

	public function get($args){
  	global $Aksi;
  	if ( !$Aksi[ "%module.name%.enable" ])
    	return false;

		$lsFileMenu  = __DIR__ . "/../menu.xml";
		//$lsFileMenu  = dirname(__FILE__)  . "/../menu.xml";
    if ( !file_exists( $lsFileMenu)){
    	return false;
    }

    $laResult = MyAksi_Util::ReadFile( $lsFileMenu);
    if ( $laResult[ "iErr"] > 0 ){
    	return false;
    }
    $lsXML = $laResult[ "aData"];

    //$laMenu = MyAksi_Util::xml2array( $lsXML);
    $laMenu = MyAksi_Arraytools::xml2array( $lsXML);

    //echo "<pre>";print_r( $laM);die;

    return $laMenu;
	}

}


