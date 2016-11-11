<?php

/*
*  gwtb_cpt_css_admin_action
*
*  This function changes the custom-css variable
*
*  @type    function
*  @date    11/11/16
*  @since   0.0.00
*
*  @param   N/A
*  @return  N/A
*/
add_action( 'admin_action_gwtb_cpt_css', 'gwtb_cpt_css_admin_action' );
function gwtb_cpt_css_admin_action(){
	if ( !current_user_can( 'manage_options' ) && wp_verify_nonce($retrieved_nonce))
  {
    wp_die( 'You are not allowed to be on this page.' );
  }
	update_option('gwtb-css', $_POST['custom-css-field']);

	wp_redirect(  admin_url( 'admin.php?page=gwtb-css') );
  exit;

}

/*
*  gwtb_admin_css_menu
*
*  This function adds a page layout for the gwtb_admin_css_menu function
*
*  @type    function
*  @date    11/11/16
*  @since   0.0.00
*
*  @param   N/A
*  @return  N/A
*/
function gwtb_admin_css_menu(){
	$menu = add_submenu_page( 'gwtoolbelt', 'Custom CSS', 'Custom CSS', 'manage_options', 'gwtb-css', 'gwtb_css_init' );
}
add_action( 'admin_menu', 'gwtb_admin_css_menu', 3 );

/*
*  gwtb_css_init
*
*  This function adds a view for the gwtb_admin_css_menu function
*
*  @type    function
*  @date    11/11/16
*  @since   0.0.00
*
*  @param   N/A
*  @return  N/A
*/

function gwtb_css_init(){
	include(dirname(__FILE__) . '/css-view.php');
}





