<?php
/*
 Template Name: Contact form page
 */

get_header();

if(have_posts()){
	while(have_posts()){
		the_post();
		$pageId=get_the_ID();
		$subtitle=get_post_meta($page_id, 'subtitle_value', true);
		$slider=get_post_meta($post->ID, "slider_value", $single = true);
		$layout=get_post_meta($pageId, 'layout_value', true);
		if($layout==''){
			$layout='right';
		}
		$show_title=get_opt('_show_page_title');
		$sidebar=get_post_meta($post->ID, 'sidebar_value', $single = true);
		if($sidebar=='' || $sidebar=='default'){
			$sidebar='contact';
		}
		
		include(TEMPLATEPATH . '/includes/page-header.php');
?>

<div id="content-container" class="center <?php echo $layoutclass; ?> ">
<div id="<?php echo $content_id; ?>">
	   <!--content-->
    <?php 
    
	 if($show_title!='off'){?>
    	<h1 class="page-heading"><?php the_title(); ?></h1><hr/><hr/>	
    <?php }

the_content();

include(TEMPLATEPATH . '/includes/form.php');
	}
}

?>

  </div>
<?php 
if($layout!='full'){
	print_sidebar($sidebar);
}
?>

  </div>
<?php
get_footer();
?>

