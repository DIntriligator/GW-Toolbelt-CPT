<?php
/*
Plugin Name: GW Toolbelt CPT
GitHub Plugin URI: DIntriligator/GW-Toolbelt-CPT
GitHub Plugin URI: https://github.com/DIntriligator/GW-Toolbelt-CPT
Description: A Group of plugins aimed at making the development of wordpress plugins easier. This main plugin will serve as a hub for all of the others
Author: Graphics Westchester
Version: 0.0.00
*/

//include functions page
include(dirname(__FILE__) . '/cpt-functions.php');

/*
*  gwtb_admin_cpt_menu
*
*  This function adds a Custom Post Types UI section to view the status of addon settings.
*
*  @type    function
*  @date    11/09/16
*  @since   0.0.00
*
*  @param   N/A
*  @return  N/A
*/

function gwtb_admin_cpt_menu(){
	$menu = add_submenu_page( 'gwtoolbelt', 'Custom Post Types', 'Custom Post Types', 'manage_options', 'gwtb-cpt', 'gwtb_cpt_init' );
}
add_action( 'admin_menu', 'gwtb_admin_cpt_menu', 3 );

/*
*  gwtb_admin_cpt_menu
*
*  This function adds a page layout for the gwtb_admin_cpt_menu function
*
*  @type    function
*  @date    11/09/16
*  @since   0.0.00
*
*  @param   N/A
*  @return  N/A
*/

function gwtb_cpt_init(){
	include(dirname(__FILE__) . '/admin-cpt.php');
}

/*
*  gwbt_enqueue_cpt_admin_scripts
*
*  Enqeues cpt scripts
*
*  @type    function
*  @date    11/09/16
*  @since   0.0.00
*
*  @param   $hook a unique hook for a page
*  @return  N/A
*/

function gwbt_enqueue_cpt_admin_scripts($hook) {


  wp_enqueue_script( 'admin_menu_scripts', plugin_dir_url(__FILE__) . '/scripts.js');
}
add_action( 'admin_enqueue_scripts', 'gwbt_enqueue_cpt_admin_scripts' );
