<?php

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

		$cpts[$cpt_id]['slug'] = 'New CPT';
		$cpts[$cpt_id]['id'] = $cpt_id;
		$cpts[$cpt_id]['single'] = '';
		$cpts[$cpt_id]['plural'] = '';

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

	  // unset($cpts);

	  update_option('gwtb-cpt', $cpts);

	  wp_redirect(  admin_url( 'admin.php?page=gwtb-cpt') );
  exit;
}