<?php
%header%

Class %module.name%Controller extends AppController {

	public $name = '%module.name%';

	public function index( ) {

		//sengaja dikosongi
	}

  // access this from url:
  // http://yoururl/yourpage/%module.name%/about
	public function about( ) {
		$data = array(
			'projectname' => '%project.name%',
			'modulename' => '%module.name%',
			'generator' => 'AksiIDE',
		);
		$this->set( $data );
	}


}

