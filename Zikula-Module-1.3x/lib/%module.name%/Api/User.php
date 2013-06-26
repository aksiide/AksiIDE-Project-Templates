<?php
%header%

class %module.name%_Api_User extends Zikula_AbstractApi {
	const STATUS_PUBLISHED = 0;

	public function lists($args){
		//if (isset($args['objectid'])) {
		//	$args['sid'] = $args['objectid'];
		//}
		
		$lsWhere = $this->generateWhere($args);

		//$item = DBUtil::selectObject('store_product', $where, null, $permFilter, null, $args['SQLcache']);
		//$item = DBUtil::selectFieldArray('store_product', 'urltitle', $where, $orderby);
		//$item = DBUtil::selectObjectArrayFilter('store_product', $where, $orderby, 1, 2, '', $permChecker, $this->getCatFilter($args));
		//$items = DBUtil::selectObjectArray('store_product', $where, $orderBy, $args['startnum']-1, $args['numitems'], $args['index'], $permFilter);

		$laData = DBUtil::selectObjectArray('%module.id%_contohtable', $where);
		//print_r( $laData);
		//echo "sdadsadsd";
		//die;
	}

  /**
   * generate where query from arg
   */
  protected function generateWhere($args) {
  	$lsWhere = "";
		$tables = DBUtil::getTables();
		$lsProduct_Column = $tables['mygallery_images_column'];
		$queryargs = array();

    if (isset($args['id'])) {
    	$lsID = DataUtil::formatForStore($args['id']);
    	$queryargs[] = "(id = $lsID)";
    }
    if (isset($args['status_id'])) {
    	$liStatus = DataUtil::formatForStore($args['status_id']);
    	$queryargs[] = "(status_id = $liStatus)";
    }

    if (count($queryargs) > 0) {
    	$lsWhere = implode(' AND ', $queryargs);
    }
    return $lsWhere;
  }

}
