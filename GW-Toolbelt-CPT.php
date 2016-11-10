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
*  gwtb_dashicons
*
*  A function that displays all icons
*
*  @type    function
*  @date    11/09/16
*  @since   0.0.00
*
*  @param   N/A
*  @return  N/A
*/

function gwtb_dashicons($index){
	//array of all dashicons
	$icons = [
	"dashicons-menu","dashicons-admin-site","dashicons-dashboard","dashicons-admin-post","dashicons-admin-media","dashicons-admin-links","dashicons-admin-page","dashicons-admin-comments","dashicons-admin-appearance","dashicons-admin-plugins","dashicons-admin-users","dashicons-admin-tools","dashicons-admin-settings","dashicons-admin-network","dashicons-admin-home","dashicons-admin-generic","dashicons-admin-collapse","dashicons-filter","dashicons-admin-customizer","dashicons-admin-multisite","dashicons-welcome-write-blog","dashicons-welcome-add-page","dashicons-welcome-view-site","dashicons-welcome-widgets-menus","dashicons-welcome-comments","dashicons-welcome-learn-more","dashicons-format-aside","dashicons-format-image","dashicons-format-gallery","dashicons-format-video","dashicons-format-status","dashicons-format-quote","dashicons-format-chat","dashicons-format-audio","dashicons-camera","dashicons-images-alt","dashicons-images-alt2","dashicons-video-alt","dashicons-video-alt2","dashicons-video-alt3","dashicons-media-archive","dashicons-media-audio","dashicons-media-code","dashicons-media-default","dashicons-media-document","dashicons-media-interactive","dashicons-media-spreadsheet","dashicons-media-text","dashicons-media-video","dashicons-playlist-audio","dashicons-playlist-video","dashicons-controls-play","dashicons-controls-pause","dashicons-controls-forward","dashicons-controls-skipforward","dashicons-controls-back","dashicons-controls-skipback","dashicons-controls-repeat","dashicons-controls-volumeon","dashicons-controls-volumeoff","dashicons-image-crop","dashicons-image-rotate","dashicons-image-rotate-left","dashicons-image-rotate-right","dashicons-image-flip-vertical","dashicons-image-flip-horizontal","dashicons-image-filter","dashicons-undo","dashicons-redo","dashicons-editor-bold","dashicons-editor-italic","dashicons-editor-ul","dashicons-editor-ol","dashicons-editor-quote","dashicons-editor-alignleft","dashicons-editor-aligncenter","dashicons-editor-alignright","dashicons-editor-insertmore","dashicons-editor-spellcheck","dashicons-editor-expand","dashicons-editor-contract","dashicons-editor-kitchensink","dashicons-editor-underline","dashicons-editor-justify","dashicons-editor-textcolor","dashicons-editor-paste-word","dashicons-editor-paste-text","dashicons-editor-removeformatting","dashicons-editor-video","dashicons-editor-customchar","dashicons-editor-outdent","dashicons-editor-indent","dashicons-editor-help","dashicons-editor-strikethrough","dashicons-editor-unlink","dashicons-editor-rtl","dashicons-editor-break","dashicons-editor-code","dashicons-editor-paragraph","dashicons-editor-table","dashicons-align-left","dashicons-align-right","dashicons-align-center","dashicons-align-none","dashicons-lock","dashicons-unlock","dashicons-calendar","dashicons-calendar-alt","dashicons-visibility","dashicons-hidden","dashicons-post-status","dashicons-edit","dashicons-trash","dashicons-sticky","dashicons-external","dashicons-arrow-up","dashicons-arrow-down","dashicons-arrow-right","dashicons-arrow-left","dashicons-arrow-up-alt","dashicons-arrow-down-alt","dashicons-arrow-right-alt","dashicons-arrow-left-alt","dashicons-arrow-up-alt2","dashicons-arrow-down-alt2","dashicons-arrow-right-alt2","dashicons-arrow-left-alt2","dashicons-sort","dashicons-leftright","dashicons-randomize","dashicons-list-view","dashicons-exerpt-view","dashicons-grid-view","dashicons-move","dashicons-share","dashicons-share-alt","dashicons-share-alt2","dashicons-twitter","dashicons-rss","dashicons-email","dashicons-email-alt","dashicons-facebook","dashicons-facebook-alt","dashicons-googleplus","dashicons-networking","dashicons-hammer","dashicons-art","dashicons-migrate","dashicons-performance","dashicons-universal-access","dashicons-universal-access-alt","dashicons-tickets","dashicons-nametag","dashicons-clipboard","dashicons-heart","dashicons-megaphone","dashicons-schedule","dashicons-wordpress","dashicons-wordpress-alt","dashicons-pressthis","dashicons-update","dashicons-screenoptions","dashicons-info","dashicons-cart","dashicons-feedback","dashicons-cloud","dashicons-translation","dashicons-tag","dashicons-category","dashicons-archive","dashicons-tagcloud","dashicons-text","dashicons-yes","dashicons-no","dashicons-no-alt","dashicons-plus","dashicons-plus-alt","dashicons-minus","dashicons-dismiss","dashicons-marker","dashicons-star-filled","dashicons-star-half","dashicons-star-empty","dashicons-flag","dashicons-warning","dashicons-location","dashicons-location-alt","dashicons-vault","dashicons-shield","dashicons-shield-alt","dashicons-sos","dashicons-search","dashicons-slides","dashicons-analytics","dashicons-chart-pie","dashicons-chart-bar","dashicons-chart-line","dashicons-chart-area","dashicons-groups","dashicons-businessman","dashicons-id","dashicons-id-alt","dashicons-products","dashicons-awards","dashicons-forms","dashicons-testimonial","dashicons-portfolio","dashicons-book","dashicons-book-alt","dashicons-download","dashicons-upload","dashicons-backup","dashicons-clock","dashicons-lightbulb","dashicons-microphone","dashicons-desktop","dashicons-laptop","dashicons-tablet","dashicons-smartphone","dashicons-phone","dashicons-index-card","dashicons-carrot","dashicons-building","dashicons-store","dashicons-album","dashicons-palmtree","dashicons-tickets-alt","dashicons-money","dashicons-smiley","dashicons-thumbs-up","dashicons-thumbs-down","dashicons-layout","dashicons-paperclip"
	];

	$output = '<div id="dashicon-selections'.$index.'" class="dashicon-selections">';
	foreach ($icons as $icon) {
		$output .= '<a href="#" class="dashicon-select-btn" data-icon="'.$icon.'" data-index="'.$index.'"><span class="dashicons '.$icon.'"></span></a>';
	}
	$output .= '</div>';

	echo $output;
}

