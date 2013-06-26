<?php
%header%

function %module.name%_tables(){
  global $Aksi;
  $tables = array();

	// Full table definition
	$tables['%module.id%_contohtable'] = '%module.id%_contohtable';
	$tables['%module.id%_contohtable_column'] = array(
			'id'               => 'id',
			'name'             => 'name',
			'description'      => 'description',
			'price'            => 'price',
			'allowcomments'    => 'allowcomments',
			'from'             => 'ffrom', //not a typo! from is a reserved sql word
			'to'               => 'tto', //not a typo! to is a reserved sql word
			'update_by'        => 'update_by',
			'update_date'      => 'update_date',
			'id_status'        => 'id_status'
	);
	$tables['%module.id%_contohtable_column_def'] = array(
			"id"               => 'I NOTNULL AUTO PRIMARY',
			'name'             => 'C(255) DEFAULT NULL',
			'description'      => 'XL NOTNULL',
			'price'            => "N(10.2)  DEFAULT 0",
			'allowcomments'    => 'I1 NOTNULL DEFAULT 0',
			'from'             => 'T DEFAULT NULL',
			'to'               => 'T DEFAULT NULL',
			"update_by"        => "I  DEFAULT 0",
			"update_date"      => "T",
			"id_status"        => "I1(4)  DEFAULT 1",
	);


  return $tables;
}


