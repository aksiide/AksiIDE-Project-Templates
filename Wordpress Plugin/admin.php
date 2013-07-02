<?php
add_action( 'admin_menu', '%module.name%_admin_menu' );
add_action('init', 'do_output_buffer');

function do_output_buffer() {
	ob_start();
}

function %module.name%_admin_menu() {
	if ( class_exists( 'Jetpack' ) ) {
		add_action( 'jetpack_admin_menu', '%module.name%_load_menu' );
	} else {
		%module.name%_load_menu();
	}
}


function %module.name%_load_menu() {
	if ( class_exists( 'Jetpack' ) ) {
	} else {
		//add_menu_page('%module.name% Configuration', '%module.name%', 'add_users', 'admin.php?page=%module.name%', '', plugins_url('%module.name%/images/icon-rating.png'), 6);
		add_menu_page(__('My Menu Page'), __('%project.name%'), 'edit_themes', '%module.name%-conf', '%module.name%_menu_render', plugins_url('%module.name%/images/icon.png'), 7);
    add_submenu_page('%module.name%-conf', __('My SubMenu Page'), __('Sub Menu 1'), 'edit_themes', 'sub-menu-one', '%module.name%_submenu_render');
    add_submenu_page('%module.name%-conf', __('My SubMenu Page'), __('Sub Menu 2'), 'edit_themes', 'sub-menu-two', '%module.name%_submenu_render');

	}
}


function %module.name%_conf(){
	if ( isset($_POST['submit']) ) {
  }
	echo "<h2>%module.name% Configuration</h2>";
  update_option( '%module.name%_active', 'true' );

}


function %module.name%_menu_render(){
    //include_once ( dirname (__FILE__) . '/admin/%module.name%-main.php' );
    $lsHTML = "<h1>Hellooo....</h1> this Menu generated by <a href='http://aksiide.com'>AksiIDE</a>";
    echo $lsHTML;
}


function %module.name%_submenu_render() {
    //require_once ( dirname (__FILE__) . '/lib/yourfile.php' );
    $lsHTML = "<h1>Hellooo....</h1> this SubMenu generated by <a href='http://aksiide.com'>AksiIDE</a>";
    echo $lsHTML;
}


