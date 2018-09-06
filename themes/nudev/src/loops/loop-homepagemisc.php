<?php

	$thisImage = '';

	$args = array(
		"page_id" => 23
	);

	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	$story = $fields['top_story_blocks'][1];

	$guide = '<article id="article-%s"><a %s href="%s" title="Click here now to learn more %s" %s>%s</a><div class="bgimage" style="%s %s"></div><div class="nu__panel-content"><div><h2><span>%s</span></h2></div></div>%s<div class="gradient"></div>%s</article>';

	$iPath = responsive_background_images();	// call the function to figure out the best image size to use

	$thisImage = $story['block_slide'][0];
	foreach($iPath as $iP){
		$thisImage = $thisImage[$iP];
	}

	echo sprintf(
		$guide
		,'2'
		,($i > 5?'tabindex="-1"':'')
		,$story['block_slide'][0]['block_slide_link']
		,($story['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
		,($story['block_slide'][0]['external_link'] == '1'?' target="_blank"':'')
		,$story['block_slide'][0]['block_slide_title']
		,'background-image: url('.$thisImage.');'
		,'background-color: '.$story['block_slide'][0]['block_slide_background'].'; '
		,$story['block_slide'][0]['block_slide_title']
		,(isset($story['block_overlay_logo']) && $story['block_overlay_logo'] != ''?'<div class="nu__overlay-logo"><img src="'.$story['block_overlay_logo']['url'].'" alt="overlay logo for '.$story['block_slide'][0]['block_slide_title'].'" /></div>':'')
		,($i == 1 || $i == 6 || $i == 11?'<div class="nu__article-alphatile"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 445.84 269.62"><path class="alphatilesvg-1" d="M348.41,269.62C266.3,189.69,96.3,24.18,71.74,0H0V266.86c0,.94,0,1.86,0,2.76H13.48L13.07,53.76l224,215.86Z"/><path class="alphatilesvg-2" d="M328.44,0l.05,2.87c36.11-.35,55.65,17.67,55.65,65V269.62h12.55c0-82,0-175.86,0-201.73-.07-48.52,22.55-64.68,49.18-64.68V0Z"/></svg></div>':'')
	);

?>
