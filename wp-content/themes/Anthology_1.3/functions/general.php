<?php

/* ------------------------------------------------------------------------*
 * SET THE THUMBNAILS
 * ------------------------------------------------------------------------*/

$pexeto_separator='|*|';

if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 200, 200 );
	add_image_size('post_box_img', 574, 250, true);
}


/**
 * Prints the post thumbnail.
 * @param $type the type of the thumbnail- used if WP version is higher than 2.9.
 * @param $class the class of the thumbnail image- used of WP version is lower than 2.9.
 * @param $post the post
 */
function print_post_thumbnail($type, $class, $post){
	if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) {
		//this is WP 2.9 or higher, use the built in post thumbnail function
		the_post_thumbnail($type);
	}elseif(!function_exists('has_post_thumbnail') && get_post_meta($post->ID, "thumbnail_value", $single = true)!=''){
		//this is WP version earlier than 2.9, show the thumbnail from the custom field
		?>
<img
	src="<?php echo(get_post_meta($post->ID, "thumbnail_value", $single = true));?>"
	class="<?php echo($class); ?>" alt="" />
		<?php }
}

/**
 * Prints the pagination. Checks whether the WP-Pagenavi plugin is installed and if so, calls
 * the function for pagination of this plugin. If not- shows prints the previous and next post links.
 */
function print_pagination(){
	if(function_exists('wp_pagenavi')){
	 wp_pagenavi();
	}else{?>
<div id="blog_nav_buttons" class="navigation">
<div class="alignleft"><?php previous_posts_link('<span>&laquo;</span> '.get_opt('_previous_text')) ?>
</div>
<div class="alignright"><?php next_posts_link(get_opt('_next_text').' <span>&raquo;</span>') ?>
</div>
</div>
	<?php
	}
}



/**
 * Returns an array containing a group of JavaScript file URLs that are needed for a selected functionality
 * @param $groupname the name of the group
 */
function get_scripts($groupname){
	switch($groupname){
		case('portfolio'):{
			$easing_script=get_bloginfo('template_directory').'/script/jquery-easing.js';
			$portfolio_script=get_bloginfo('template_directory').'/script/portfolio-previewer.js';
			return array($portfolio_script, $easing_script);
		}break;
		case('gallery'):{
			$easing_script=get_bloginfo('template_directory').'/script/jquery-easing.js';
			$portfolio_script=get_bloginfo('template_directory').'/script/portfolio-setter.js';
			return array($portfolio_script, $easing_script);
		}break;
	}
}



add_action( 'init', 'register_pexeto_menus' );

function register_pexeto_menus() {
	register_nav_menus(
		array(
			'pexeto_main_menu' => __( 'Main Menu' )
		)
	);
}