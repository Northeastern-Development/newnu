<?php

	$thisImage = '';

	$args = array(
		"page_id" => 23
	);

	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	$stories = $fields['top_story_blocks'];

	$guide = '<div id="article-%s" data-rotatorid="%s" data-cslide="1" data-slidemax="%s" class="nu__block-rotator"><a %s href="%s" target="%s" title="Click here now to read more %s">%s</a><div class="bgimage"><div style="%s %s"></div></div><div class="nu__panel-content"><h2><span>%s</span></h2></div><div class="nu__slide-controls"><div><div class="slider_prev rotate" title="Click here to view the previous slide">&#xE5CB;</div><div class="slider_next rotate" title="Click here to view the next slide">&#xE5CC;</div></div></div><div class="nu__overlay-logo">%s</div></div>';

	// $iPath = responsive_background_images('medium_large');	// call the function to figure out the best image size to use

	$thisImage = $stories[0]['block_slide'][0];
	// foreach($iPath as $iP){
	// 	$thisImage = $thisImage[$iP];
	// }

	echo sprintf(
		$guide
		,'1'
		,1
		,count($stories[0]['block_slide'])
		,($i > 5?'tabindex="-1"':'')
		,$stories[0]['block_slide'][0]['block_slide_link']
		,($stories[0]['block_slide'][0]['external_link'] == '1'?'_blank':'')
		,($stories[0]['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
		,$stories[0]['block_slide'][0]['block_slide_title']
		,'background-image: url('.$thisImage['block_slide_image']['url'].');'
		,'background-color: '.$stories[0]['block_slide'][0]['block_slide_background'].'; '
		,$stories[0]['block_slide'][0]['block_slide_title']
		,(isset($stories[0]['block_slide'][0]['slide_overlay_logo']) && $stories[0]['block_slide'][0]['slide_overlay_logo'] != ''?'<img src="'.$stories[0]['block_slide'][0]['slide_overlay_logo']['url'].'" alt="overlay logo for '.$stories[0]['block_slide'][0]['block_slide_title'].'" />':'')
	);

?>
