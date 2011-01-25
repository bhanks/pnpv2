<?php
header('Content-type: text/xml'); 
require_once( '../../../../../wp-load.php' );
echo '<?xml version="1.0" encoding="utf-8" ?>
<portfolio>'; 


if($_GET['showcat']=='true'){
	echo('<categories>');
	$cats=pexeto_get_taxonomy_children('portfolio_category', $_GET['catId']);
	for($i=0; $i<count($cats); $i++){
		echo('<category id="'.$cats[$i]->term_id.'">'.$cats[$i]->name.'</category>');
	}
	echo('</categories>');
}


echo '<items>';

$args= array(
    'posts_per_page' =>-1, 
	'post_type' => 'Portfolio'
);

if($_GET['catId']!='-1'){
	$slug=pexeto_get_taxonomy_slug($_GET['catId']);
	$args['portfolio_category']=$slug;
}

if($_GET['order']=='custom'){
	$args['orderby']='menu_order';
	$args['order']='asc';
}else{
	$args['orderby']='date';
	$args['order']='desc';
}
	
	
query_posts($args);
	
	if(have_posts()) {
		 while (have_posts()) {
		 	the_post(); 
		 	$xml = '<item>';
			$xml.= '<ptitle>'.get_the_title().'</ptitle>';		
			

			$preview=get_post_meta($post->ID, 'preview_value', true);
			$thumbnail=get_post_meta($post->ID, 'thumbnail_value', true);			
			$xml.= '<preview>'.$preview.'</preview>';
			$xml.= '<thumbnail>'.$thumbnail.'</thumbnail>';
			$xml.= '<ptitle>'. get_the_title() .'</ptitle>';	
		 	$terms=wp_get_post_terms($post->ID, 'portfolio_category');
			$term_string='';
			foreach($terms as $term){
				$term_string.=($term->term_id).',';
			}
			$term_string=substr($term_string, 0, strlen($term_string)-1); 
			$xml.= '<category>'. $term_string .'</category>';		
			$xml.= '<description><![CDATA['.get_post_meta($post->ID, 'description_value', true).']]></description>';
			$action=get_post_meta($post->ID, 'action_value', true);
			$xml.= '<action>'. $action .'</action>';
			$customlink=get_post_meta($post->ID, 'custom_value', true);
			$xml.= '<customlink>'.$customlink.'</customlink>';
			$xml.= '<permalink>'.get_permalink().'</permalink>';
			$xml.= '</item>';
			echo $xml;
		}
	}
	
echo '</items>';	
echo '</portfolio>';