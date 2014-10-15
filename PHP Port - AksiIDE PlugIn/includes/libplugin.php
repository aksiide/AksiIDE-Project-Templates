<?php
/**
 * AksiIDEPlugin
 * @param  ___
 * @return ___
 */

global $sFunctionName, $aParameter;

$sFunctionName = @$argv[1];
$sFunctionName = isset($sFunctionName) ? ((string)$sFunctionName) : 'init';
$aParameter = Argv2Array( $argv); // get all parameter


class AksiIDEPlugin {
	private static $instance;
  public $rPluginInfo = array (
  	'name' => '',
    'version' => '0.0.0',
    'vendor' => 'AksiIDE.com',
    'variable' => array (
    ),
    'function_list' => array (
    ),
  );
  public $rVariable = array (
  );

	public function __construct( /* ... */ ) {

		//parent::__construct();
	}

	public function __destruct( ) {
	}

	// bypass illegal call/parameter
	function __call( $method, $args ) {

		//$lsMethod = __METHOD__;
		//$lsFunction = __FUNCTION__;
		return $this->main( $args );
	}

	public static function getInstance( ) {
		if ( !self::$instance ) {
			self::$instance = new self( );
		}
		return self::$instance;
	}

	public function Run( ) {
		echo json_encode( $this->rPluginInfo);
    return true;
	}

	public function main( $args ) {
	}

	public function variable_list( $args = array()) {
  	$laResult[ 'err'] = 0;
  	$laResult[ 'variable'] = $this->rVariable;
    return json_encode( $laResult);
	}

	public function AddVariable( $psVariableTitle, $paOption = array( ) ) {
  	$laVariable[ 'name'] = $paOption[ 'name'];
  	$laVariable[ 'title'] = $psVariableTitle;
    if (isset( $paOption[ 'type']) ) { $laVariable[ 'type'] = $paOption[ 'type']; }
    if (isset( $paOption[ 'value']) ) { $laVariable[ 'value'] = $paOption[ 'value']; }
    if (isset( $paOption[ 'options']) ) { $laVariable[ 'options'] = $paOption[ 'options']; }
    if (isset( $paOption[ 'note']) ) { $laVariable[ 'note'] = $paOption[ 'note']; }
		$this->rVariable[] = $laVariable;
  }

	public function AddFunction( $psFunctionTitle, $paOption = array( ) ) {
  	$laFunction[ 'name'] = $paOption[ 'name'];
  	$laFunction[ 'title'] = $psFunctionTitle;
		$this->rPluginInfo['function_list'][] = $laFunction;
	}
}

function Argv2Array( $paArgv){
	$laResult = array();
  if ( count( $paArgv) < 3) {
  	return $laResult;
    exit;
  }
  $liI = 0;
  foreach ($paArgv as $arg){
  	$liI++;
    if ($liI<3){ continue;}
    $lsS = explode("=", $arg);
    $lsValue = urldecode( $lsS[1]);
    $laResult[ $lsS[0] ] = $lsValue;
  }
  return $laResult;
}

function GenerateResult( $piErrorCode, $psMessage){
	$laResult = array();
	$laResult[ 'err'] = $piErrorCode;
  $laResult[ 'msg'] = $psMessage;
	return json_encode( $laResult);
}


