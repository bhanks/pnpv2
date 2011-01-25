<script type="text/javascript"
	src="<?php bloginfo('template_directory'); ?>/script/slider.js"></script>
	<?php 
$autoplay=get_opt('_thum_autoplay_big')=='false'?'false':'true';
$interval=get_opt('_thum_interval_big');
$pauseInterval=get_opt('_thum_pause_big');
$pauseOnHover=get_opt('_thum_pause_hover_big')=='false'?'false':'true';
?>
<script type="text/javascript">
(function($){
	$(window).load(function(){
		$('#slider').slider({thumbContainerId:'slider-navigation', autoplay:<?php echo($autoplay); ?>, interval:<?php echo($interval);?>, pauseInterval:<?php echo($pauseInterval);?>, pauseOnHover:<?php echo($pauseOnHover); ?>});
	});
})(jQuery);
</script>
<div id="slider-container">
<div id="slider-container-shadow"></div>
<div id="big-slider">
<div id="slider" class="center"> 
<div class="loading"></div>
	
	  <?php 

$separator='|*|';

$sliderImagesString = get_option('_thum_image_names_big');
$linkString=get_option('_thum_image_links_big');
$descString=get_option('_thum_image_desc_big');

$sliderImagesArray=explode($separator, $sliderImagesString);
$linkArray= explode($separator,$linkString);
$descArray= explode($separator,$descString);

$count=count($sliderImagesArray);
$linkCount=count($linkArray);

for($i=0;$i<$count-1;$i++){

	if($i<$linkCount && $linkArray[$i]!=''){
		echo('<a href="'.$linkArray[$i].'">');
	}
	echo('<img src="');
	$path=$sliderImagesArray[$i];
	echo($path);
	echo('" alt=""');
	if($descArray[$i]!=''){
		echo(' title="'.stripslashes($descArray[$i]).'"');
	}
	echo('/>');
	if($i<$linkCount && $linkArray[$i]!=''){
		echo('</a>');
	}
}
?>
	
</div>
</div>

<div id="slider-container-shadow-bottom"></div>
</div>
<div id="slider-navigation-container">
	  <div class="hr"></div>
 
 <div class="center relative">
      <div id="slider-navigation" >
      <div class="items">
      	<?php 
      	$closed=true;
      	for($i=0;$i<$count-1;$i++){
      		if($i%6==0){ 
      			echo('<div>'); 
      			$closed=false;
      		}
      		if(get_opt('_thum_auto_resize_big')=='true'){
      			echo('<img src="'.get_bloginfo('template_directory').'/functions/timthumb.php?src='.$sliderImagesArray[$i].'&h=70&w=120&zc=1&q=80" alt="" />');
      		}else{
      			echo('<img src="'.$sliderImagesArray[$i].'" alt="" />');
      		}
			if(($i+1)%6==0){
				echo('</div>');
				$closed=true;
			}
		}
		if(!$closed){
			echo('</div>');
		}
      	?>
      </div>
      </div>
 </div>

	  <div class="hr"></div>
</div>
