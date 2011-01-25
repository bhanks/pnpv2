<?php
/*
 Template Name: Portfolio Page
 */
get_header();?>

<?php

if(have_posts()){
	while(have_posts()){
		the_post();
		$pageId=get_the_ID();
		$pageTitle=get_the_title();
		$subtitle=get_post_meta($pageId, 'subtitle_value', true);
		$catId=get_post_meta($pageId,'postCategory_value',true);
		$postNumberToShow=get_post_meta($pageId,'postNumber_value',true);
		$slider=get_post_meta($post->ID, "slider_value", $single = true);
		$auto_thumbnail=get_post_meta($post->ID, '_auto_portfolio_thumbnail_value', true);
		$order=get_post_meta($post->ID, 'order_value', true);
		
		include(TEMPLATEPATH . '/includes/page-header.php');
	}
}
?>

 <div id="content-container" class="center">

<div id="portfolio-preview-container">
<div class="loading"></div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($){
	$('#portfolio-preview-container').portfolioPreviewer({
		xmlSourceFile:"<?php bloginfo('template_directory'); ?>/includes/portfolio/portfolio-previewer.php", 
		catId:"<?php echo $catId; ?>", 
		autoThumbnail:"<?php echo $auto_thumbnail; ?>",
		resizerUrl:"<?php bloginfo("template_directory") ?>/functions/timthumb.php",
		itemnum:<?php echo $postNumberToShow; ?>,
		order:"<?php echo $order; ?>"
		});
});
</script>	

<?php $pexeto_scripts= 'portfolio'; ?>
    
  </div>
<?php
get_footer();
?>
