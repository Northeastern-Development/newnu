<?php

	$thisImage = '';

	$args = array(
		"page_id" => 23
	);

	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	$story = $fields['top_story_blocks'][1];

	$guide = '<article id="article-%s"><div class="bgimage" style="%s %s"></div><div class="nu__panel-content"><div><h2><span>%s</span></h2><a class="learnmore" href="%s" title="%s%s" aria-label="%s%s"%s>Learn More</a></div></div>%s<div class="gradient"></div></article>';

	$thisImage = $story['block_slide'][0];

	echo sprintf(
		$guide
		,'2'
		,'background-image: url('.$thisImage['block_slide_image']['url'].');'
		,'background-color: '.$story['block_slide'][0]['block_slide_background'].'; '
		,$story['block_slide'][0]['block_slide_title']
		,$story['block_slide'][0]['block_slide_link']
		,$story['block_slide'][0]['block_slide_title']
		,($story['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
		,$story['block_slide'][0]['block_slide_title']
		,($story['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
		,($story['block_slide'][0]['external_link'] == '1'?' target="_blank"':'')
		,(isset($story['block_overlay_logo']) && $story['block_overlay_logo'] != ''?'<div class="nu__overlay-logo"><img src="'.$story['block_overlay_logo']['url'].'" alt="overlay logo for '.$story['block_slide'][0]['block_slide_title'].'" /></div>':'')
	);

?>
