<?php


/* ------------------------------------------------------------------------*
 * REGISTER THE PORTFOLIO CUSTOM POST TYPE
 * ------------------------------------------------------------------------*/

if($wp_version>=3.0){
	//IT IS VERSION 3.0 OR HIGHER

	add_theme_support('menus');

	function post_type_portfolio() {
		
		$labels = array(
    'name' => _x('Portfolio', 'portfolio name'),
    'singular_name' => _x('Portfolio Item', 'portfolio type singular name'),
    'add_new' => _x('Add New', 'portfolio'),
    'add_new_item' => __('Add New Item'),
    'edit_item' => __('Edit Item'),
    'new_item' => __('New Portfolio Item'),
    'view_item' => __('View Item'),
    'search_items' => __('Search Portfolio Items'),
    'not_found' =>  __('No portfolio items found'),
    'not_found_in_trash' => __('No portfolio items found in Trash'), 
    'parent_item_colon' => ''
  );
		
		register_post_type( 'Portfolio',
		array( 'labels' => $labels,
	         'public' => true,  
	         'show_ui' => true,  
	         'capability_type' => 'post',  
	         'hierarchical' => false,  
	         'rewrite' => array('slug'=>'/Portfolio','with_front'=>false),
			 'taxonomies' => array('portfolio_category', 'post_tag'),
	         'supports' => array('title', 'editor', 'thumbnail', 'comments', 'page-attributes') ) );
		register_taxonomy_for_object_type('post_tag', 'Portfolio');

		register_taxonomy("portfolio_category", 
					    	array("Portfolio"), 
					    	array(	"hierarchical" => true, 
					    			"label" => "Portfolio Categories", 
					    			"singular_label" => "Portfolio Categories", 
					    			"rewrite" => true,
					    			"query_var" => true
					    		));  
	}

	add_action('init', 'post_type_portfolio');
}



add_filter('manage_edit-Portfolio_columns', 'portfolio_columns');
function portfolio_columns($columns) {
    $columns['category'] = 'Portfolio Category';
    return $columns;
}

add_action('manage_posts_custom_column',  'portfolio_show_columns');
function portfolio_show_columns($name) {
    global $post;
    switch ($name) {
        case 'category':
            $cats = get_the_term_list( $post->ID, 'portfolio_category', '', ', ', '' );
            echo $cats;
    }
}




/**
 * Gets a list of custom taxomomies by type
 * @param $type the type of the taxonomy
 */
function pexeto_get_taxonomies($type){
	global $wpdb;
	
	$res = $wpdb->get_results($wpdb->prepare("SELECT t.term_id, t.name, t.slug FROM $wpdb->terms as t LEFT JOIN $wpdb->term_taxonomy tt ON t.term_id=tt.term_id WHERE tt.taxonomy=%s;", $type));
	return $res;
}

function pexeto_get_taxonomy_slug($term_id){
	global $wpdb;
	
	$res = $wpdb->get_results($wpdb->prepare("SELECT slug FROM $wpdb->terms WHERE term_id=%s LIMIT 1;", $term_id));
	$res=$res[0];
	return $res->slug;
}

function pexeto_get_taxonomy_children($type, $parent_id){
	global $wpdb;
	
	if($parent_id!='-1'){
		$res = $wpdb->get_results($wpdb->prepare("SELECT t.term_id, t.name, t.slug FROM $wpdb->terms as t LEFT JOIN $wpdb->term_taxonomy tt ON t.term_id=tt.term_id WHERE tt.taxonomy=%s AND tt.parent=%s;", $type, $parent_id));
	}else{
		$res = $wpdb->get_results($wpdb->prepare("SELECT t.term_id, t.name, t.slug FROM $wpdb->terms as t LEFT JOIN $wpdb->term_taxonomy tt ON t.term_id=tt.term_id WHERE tt.taxonomy=%s;", $type));
	}
	return $res;
}