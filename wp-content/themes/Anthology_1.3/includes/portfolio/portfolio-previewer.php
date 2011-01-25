<?php
header('Content-type: text/xml'); 
require_once( '../../../../../wp-load.php' );
echo '<?xml version="1.0" encoding="utf-8" ?>
<portfolio>
	<settings>
		<more>'.get_opt('_more_projects_text').'</more>
		<prev>'.get_opt('_previous_text').'</prev> 
		<next>'.get_opt('_next_text').'</next> 
	</settings>';


echo '<items>';

$args= array(
         'posts_per_page' =>-1, 
		 'post_type' => 'Portfolio',
		 'orderby' => 'menu_order'
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
			if($_GET['autoThumbnail']=='on'){
				$thumbnail=$preview;
			}else{
				$thumbnail=get_post_meta($post->ID, 'thumbnail_value', true);
			}
			
			$xml.= '<thumbnail>'.$preview.'</thumbnail>';
			$xml.= '<small_thumbnail>'.$thumbnail.'</small_thumbnail>';
			$xml.= '<content><![CDATA['.do_shortcode(get_the_content()).']]></content>';
			$xml.= '</item>';
			echo $xml;
		}
	}
	
echo '</items>';	
echo '</portfolio>';