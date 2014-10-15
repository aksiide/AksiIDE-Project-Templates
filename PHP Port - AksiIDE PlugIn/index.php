<?php
//error_reporting( 0);
require_once "includes/libplugin.php";


/**
 * %module.name%
 * @param  ___
 * @return ___
 */

class %module.name% extends AksiIDEPlugin {
	private static $instance;

	public function init() {
		//$this->rPluginInfo['name']." is running... ";
    $this->rPluginInfo[ 'name'] = '%project.name%';
    $this->rPluginInfo[ 'version'] = '0.0.0';
    $this->rPluginInfo[ 'vendor'] = 'AksiIDE.com';

    // create plugin menu
    $this->AddFunction( '%project.name%', array( 'name'=>'ExampleForm'));

    return json_encode( $this->rPluginInfo);
	}
	public function variable_list( $args = array()) {
    // add variable
    $this->AddVariable( 'Full Name', array( 'name'=>'name')); // default --> editarea
    $this->AddVariable( 'Date', array( 'name'=>'the_date', 'type'=>'date'));
    $this->AddVariable( 'Amount', array( 'name'=>'amount', 'type'=>'integer'));
    $this->AddVariable( 'Combo Selection', array( 'name'=>'combo', 'type'=>'select', 'value'=>'1', 'options'=>'Best|Good|Average|Poor'));
    $this->AddVariable( 'File Name', array( 'name'=>'filename', 'type'=>'file'));
		$this->AddVariable( 'Directory', array( 'name'=>'directory', 'type'=>'dir'));
    $this->AddVariable( 'Note', array( 'name'=>'note', 'type'=>'text'));

  	$laResult[ 'err'] = 0;
  	$laResult[ 'variable'] = $this->rVariable;
    return json_encode( $laResult);
	}

  public function ExampleForm(){
  	global $aParameter;
    $lsParameter = print_r( $aParameter, true);
  	$laResult[ 'err'] = 0;
    $laResult[ 'msg'] = "This is %project.name%"
    	. "\n\nwe receive this value :" . $lsParameter
    	. "\n\nref: file 'index.php', line 40-48";
    return json_encode( $laResult);
  }

}

$PlugIn = new %module.name%(0);
echo $PlugIn->$sFunctionName( );




