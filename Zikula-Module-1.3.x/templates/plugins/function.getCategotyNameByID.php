<?php

/**
 * Zikula_View function to display the current date and time
 *
 * Example
 * {getCategotyNameByID id=123123}
 *
 *
 * @return string
 */
function smarty_function_getCategotyNameByID($params, Zikula_View $view) {
  $piID = isset($params['id']) ? $params['id'] : 0;
  $laCategory = CategoryUtil::getCategoryByID( $piID);

	return $laCategory[ "name"];
}
