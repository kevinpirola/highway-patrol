<?php
/*
    Plugin Name: Highway Patrol
    Plugin URI: http://instrumentsgenealogy.com
    Description: This plugins adds everything that is needed to handle your highway patrol (VVF).
    Author: Gianmarco Laggia
    Version: 0.1
    Author URI: http://instrumentsgenealogy.com
*/

add_action( 'admin_menu', 'hp_plugin_menu' );

function hp_plugin_menu() {
    add_menu_page( 'Highway Patrol Settings', 'Highway Patrol', 'manage_options', 'hp-menu', 'hp_plugin_options');
    add_submenu_page( 'hp-menu', 'Brands', 'Brands', 'manage_options', 'hp-menu-brands', 'hp_plugin_options');
    add_submenu_page( 'hp-menu', 'Models', 'Models', 'manage_options', 'hp-menu-models', 'hpMenuModels');
}

function hp_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}

function hpMenuModels(){
    if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
    ?>
<h1>Models</h1>
<p>Here goes the model list</p>
<div class="row" style="border: 1px solid red;">
    <div class="col-md-4" style="border: 1px solid green">o</div>
    <div class="col-md-4" style="border: 1px solid green">o</div>
</div>
    <?php
}

?>