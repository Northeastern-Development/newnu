<?php

	$thisImage = '';

	$args = array(
		"page_id" => 23
	);

	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	$story = $fields['top_story_blocks'][1];


	$guide = '<article id="article-%s"'.($story['block_slide'][0]['flexspace'] == 1?' class="flexspace"':'').'><div class="bgimage" style="%s %s"></div><div class="nu__panel-content"><div>%s<a class="learnmore" href="%s" title="%s%s" aria-label="%s%s"%s>%s</a></div></div>%s<div class="gradient"></div></article>';

	echo sprintf(
		$guide
		,'2'
		,'background-image: url('.$story['block_slide'][0]['block_slide_image']['url'].');'
		,'background-color: '.$story['block_slide'][0]['block_slide_background'].'; '
		,$story['block_slide'][0]['block_slide_title'] // this is what appears in the browser to the user
		,$story['block_slide'][0]['block_slide_link']
		,wp_strip_all_tags($story['block_slide'][0]['block_slide_title'],true)	// this is the title
		,($story['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
		,wp_strip_all_tags($story['block_slide'][0]['block_slide_title'],true)	// this is the aria label
		,($story['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
		,($story['block_slide'][0]['external_link'] == '1'?' target="_blank" rel="noopener"':'')
		,(!empty($story['block_slide'][0]['slide_button_copy'])?$story['block_slide'][0]['slide_button_copy']:'Learn More')	// CTA copy
		,(isset($story['block_overlay_logo']) && $story['block_overlay_logo'] != ''?'<div class="nu__overlay-logo"><img src="'.$story['block_overlay_logo']['url'].'" alt="overlay logo for '.wp_strip_all_tags($story['block_slide'][0]['block_slide_title'],true).'" /></div>':'') // overlay logo, if there is one
	);

?>
