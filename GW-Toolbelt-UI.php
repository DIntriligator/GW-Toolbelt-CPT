<?php
/*
Plugin Name: GW Toolbelt UI
GitHub Plugin URI: DIntriligator/GW-Toolbelt-UI
GitHub Plugin URI: https://github.com/DIntriligator/GW-Toolbelt-UI
Description: A plugin that will allow a developer to manipulate the settings on the main plugin
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
	include(dirname(__FILE__) . 'cpt/admin-cpt.php');
}

