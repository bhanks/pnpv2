<?php

$themename = "Anthology";
$shortname = "anthology";

$functions_path= TEMPLATEPATH . '/functions/';
add_action('admin_menu', 'mytheme_add_admin');

/* INCLUDE THE FUNCTIONS FILES */
require_once ($functions_path.'general.php');  //some main common functions
require_once ($functions_path.'sidebars.php');  //the sidebar functionality
require_once ($functions_path.'options.php');  //the theme options functionality
require_once ($functions_path.'portfolio.php');  //portfolio functionality
require_once ($functions_path.'comments.php');  //the comments functionality
require_once ($functions_path.'meta.php');  //adds the custom meta fields to the posts and pages
require_once ($functions_path.'shortcodes.php');  //the shortcodes functionality


function admin_head_add()
{
	$path= get_bloginfo('template_url').'/functions/';
	if(isset($_GET['page']) && $_GET['page']=='functions.php'){
		
	 
		echo '<script type="text/javascript" src="'.$path.'script/jquery-1.4.js"></script>';
		echo '<script type="text/javascript" src="'.$path.'script/jquery-ui.js"></script>';
		echo '<script type="text/javascript" src="'.$path.'script/ajaxupload.js"></script>';
		echo '<script type="text/javascript" src="'.$path.'script/options.js"></script>';
		echo '<script type="text/javascript" src="'.$path.'script/colorpicker.js"></script>';
		
		$uploadsdir=wp_upload_dir();
		$uploadsurl=$uploadsdir[url];
		
		echo '<script type="text/javascript">jQuery(document).ready(function($){
			pexetoOptions.loadUploader(jQuery("#thumbUpload"), "'.$path.'upload-handler.php", "'.$uploadsurl.'");
			pexetoOptions.loadUploader(jQuery("#thumUploadBig"), "'.$path.'upload-handler.php", "'.$uploadsurl.'");
			pexetoOptions.loadUploader(jQuery("#nivoUpload"), "'.$path.'upload-handler.php", "'.$uploadsurl.'");
		});</script>';
	}
	
	echo '<link rel="stylesheet" href="'.$path.'css/admin_style.css" type="text/css" charset="utf-8" />';
	echo '<link rel="stylesheet" href="'.$path.'css/colorpicker.css" type="text/css" charset="utf-8" />';

}


	add_action('admin_head', 'admin_head_add');


/**
 * Add the Theme Options Page
 */
function mytheme_add_admin() {

	global $themename, $shortname, $options;

	foreach ($options as $value) {
		if(get_option($value['id'])=='' && isset($value['std'])){
			update_option( $value['id'], $value['std']);
		}
	}

	if ( $_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

				foreach ($options as $value) {
					if( isset( $_REQUEST[ $value['id'] ] ) ) { 
						update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
					} else { 
						delete_option( $value['id'] ); 
					} 
				}
					header("Location: themes.php?page=functions.php&saved=true");
					die;

		} else if( 'reset' == $_REQUEST['action'] ) {

			foreach ($options as $value) {
				delete_option( $value['id'] ); }
				header("Location: themes.php?page=functions.php&reset=true");
				die;

		}
	}


	add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

?>