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

wp_register_script('hp_jquery', '//code.jquery.com/jquery-3.2.1.min.js');
wp_enqueue_script('hp_jquery');
wp_register_script('hp_popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
wp_enqueue_script('hp_popper');
wp_register_script('hp_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
wp_enqueue_script('hp_bootstrap');
wp_register_style('hp_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
wp_enqueue_style('hp_bootstrap');
wp_register_style('hp_fa', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css');
wp_enqueue_style('hp_fa');
wp_register_style('hp_bootstrap_table', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css');
wp_enqueue_style('hp_bootstrap_table');
wp_register_script('hp_bootstrap_table', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js');
wp_enqueue_script('hp_bootstrap_table_loc');
wp_register_script('hp_bootstrap_table_loc', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-it-IT.min.js');
wp_enqueue_script('hp_bootstrap_table');
//wp_register_script('hp_jquery_table', '//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js');
//wp_enqueue_script('hp_jquery_table');
//wp_register_style('hp_jquery_table', '//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css');
//wp_enqueue_style('hp_jquery_table');
wp_register_style('hp_style', plugins_url('style.css',__FILE__ ));
wp_enqueue_style('hp_style');


function hp_plugin_menu() {
    
    remove_menu_page( 'index.php' );                  //Dashboard
    remove_menu_page( 'jetpack' );                    //Jetpack* 
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'upload.php' );                 //Media
    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'plugins.php' );                //Plugins
    remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'tools.php' );                  //Tools
    remove_menu_page( 'options-general.php' );        //Settings
  
    
    add_menu_page( 'Highway Patrol Settings', 'Highway Patrol', 'manage_options', 'hp-menu', 'hp_plugin_options');
    add_submenu_page( 'hp-menu', 'Strade', 'Strade', 'manage_options', 'hp-menu-highways', 'hp_highways_options');
    add_submenu_page( 'hp-menu', 'Squadre', 'Squadre', 'manage_options', 'hp-menu-teams', 'hpMenuModels');
}

function hp_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
    
    global $wpdb;
    $highways_tbl = $wpdb->prefix . "highways";
    $highways = $wpdb->get_results( "SELECT * FROM $highways_tbl" );
    
    require('home.php');
}

function hp_highways_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
    require('highways.php');
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