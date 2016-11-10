<?php

/*
*  gwtb_cpt_add_button_admin_action
*
*  Creates Custom post types
*
*  @type    function
*  @date    11/09/16
*  @since   0.0.00
*
*  @param   N/A
*  @return  N/A
*/

add_action( 'admin_action_gwtb_cpt_add_button', 'gwtb_cpt_add_button_admin_action' );

function gwtb_cpt_add_button_admin_action(){
	if ( !current_user_can( 'manage_options' ) && wp_verify_nonce($retrieved_nonce))
  {
    wp_die( 'You are not allowed to be on this page.' );
  }

  $cpts = get_option('gwtb-cpt');

  if($cpts){
  	$cpts_count = count($cpts) - 1;
  	$cpt_id = $cpts[$cpts_count]['id'] + 1;

	} else {
		$cpt_id = '0';
	}

		$cpts[$cpt_id]['slug'] = 'new-cpt';
		$cpts[$cpt_id]['id'] = $cpt_id;
		$cpts[$cpt_id]['single'] = 'New CPT';
		$cpts[$cpt_id]['plural'] = 'New CPTs';
		$cpts[$cpt_id]['icon'] = 'dashicons-admin-post';

		$cpts[$cpt_id]['public'] = false;
		$cpts[$cpt_id]['hierarchial'] = false;
		$cpts[$cpt_id]['archive'] = false;

		$cpts[$cpt_id]['title'] = false;
		$cpts[$cpt_id]['editor'] = false;
		$cpts[$cpt_id]['author'] = false;
		$cpts[$cpt_id]['thumbnail'] = false;
		$cpts[$cpt_id]['excerpt'] = false;
		$cpts[$cpt_id]['comments'] = false;
		$cpts[$cpt_id]['page-attributes'] = false;

	  //unset($cpts);

	  update_option('gwtb-cpt', $cpts);

	  wp_redirect(  admin_url( 'admin.php?page=gwtb-cpt') );
  exit;
}

/*
*  gwtb_cpt_add_button_admin_action
*
*  Creates Custom post types
*
*  @type    function
*  @date    11/09/16
*  @since   0.0.00
*
*  @param   N/A
*  @return  N/A
*/

add_action( 'admin_action_gwtb_cpt_update', 'gwtb_cpt_update_admin_action' );

function gwtb_cpt_update_admin_action(){
	if ( !current_user_can( 'manage_options' ) && wp_verify_nonce($retrieved_nonce))
  {
    wp_die( 'You are not allowed to be on this page.' );
  }

  $cpts = get_option('gwtb-cpt');

  $response = $_POST;

  foreach($cpts as $cpt){
  	$cpt_id = $cpt['id'];

  	if($cpts[$cpt_id]['slug'] !== strtolower($response[$cpt_id]['slug'])){
			$cpts[$cpt_id]['slug'] = strtolower($response[$cpt_id]['slug']);
		}
		if($cpts[$cpt_id]['single'] !== $response[$cpt_id]['single']){
			$cpts[$cpt_id]['single'] = $response[$cpt_id]['single'];
		}
		if($cpts[$cpt_id]['plural'] !== $response[$cpt_id]['plural']){
			$cpts[$cpt_id]['plural'] = $response[$cpt_id]['plural'];
		}
		if($cpts[$cpt_id]['icon'] !== $response[$cpt_id]['icon']){
			$cpts[$cpt_id]['icon'] = $response[$cpt_id]['icon'];
		}
		if($cpts[$cpt_id]['public'] !== $response[$cpt_id]['public']){
			$cpts[$cpt_id]['public'] = $response[$cpt_id]['public'];
		}
		if($cpts[$cpt_id]['hierarchial'] !== $response[$cpt_id]['hierarchial']){
			$cpts[$cpt_id]['hierarchial'] = $response[$cpt_id]['hierarchial'];
		}
		if($cpts[$cpt_id]['archive'] !== $response[$cpt_id]['archive']){
			$cpts[$cpt_id]['archive'] = $response[$cpt_id]['archive'];
		}
		if($cpts[$cpt_id]['title'] !== $response[$cpt_id]['title']){
			$cpts[$cpt_id]['title'] = $response[$cpt_id]['title'];
		}
		if($cpts[$cpt_id]['editor'] !== $response[$cpt_id]['editor']){
			$cpts[$cpt_id]['editor'] = $response[$cpt_id]['editor'];
		}
		if($cpts[$cpt_id]['author'] !== $response[$cpt_id]['author']){
			$cpts[$cpt_id]['author'] = $response[$cpt_id]['author'];
		}
		if($cpts[$cpt_id]['thumbnail'] !== $response[$cpt_id]['thumbnail']){
			$cpts[$cpt_id]['thumbnail'] = $response[$cpt_id]['thumbnail'];
		}
		if($cpts[$cpt_id]['excerpt'] !== $response[$cpt_id]['excerpt']){
			$cpts[$cpt_id]['excerpt'] = $response[$cpt_id]['excerpt'];
		}
		if($cpts[$cpt_id]['comments'] !== $response[$cpt_id]['comments']){
			$cpts[$cpt_id]['comments'] = $response[$cpt_id]['comments'];
		}
		if($cpts[$cpt_id]['page-attributes'] !== $response[$cpt_id]['page-attributes']){
			$cpts[$cpt_id]['page-attributes'] = $response[$cpt_id]['page-attributes'];
		}

  }

  update_option('gwtb-cpt', $cpts);
	wp_redirect(  admin_url( 'admin.php?page=gwtb-cpt') );
  exit;

}

/*
*  gwtb_cpt_delete_admin_action
*
*  Deletes Custom post types
*
*  @type    function
*  @date    11/09/16
*  @since   0.0.00
*
*  @param   N/A
*  @return  N/A
*/

add_action( 'admin_action_gwtb_cpt_delete', 'gwtb_cpt_delete_admin_action' );

function gwtb_cpt_delete_admin_action(){
	if ( !current_user_can( 'manage_options' ) && wp_verify_nonce($retrieved_nonce))
  {
    wp_die( 'You are not allowed to be on this page.' );
  }

  $cpts = get_option('gwtb-cpt');

  $delete_id = $_POST['id'];

  unset($cpts[$delete_id]);


 update_option('gwtb-cpt', $cpts);
	wp_redirect(  admin_url( 'admin.php?page=gwtb-cpt') );
  exit;

}
