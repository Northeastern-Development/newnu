<?php

	$args = array(
		"page_id" => 23
	);

	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	$stories = $fields['top_story_blocks'];

	$content = "";

	$i = 1; // first break = 5, 2nd = 9, 3rd = 13
	$jj = 1;
	$r = 0;

	$cnt = 13;

	$return = '<section class="panel-'.$jj.'">';

	$guideSingle = '<article id="article-%s" style="background-image: url(%s);" ><a href="%s" title="Click here now to learn more" %s><p>%s -></p></a><h2>%s</h2>%s</article>';

	$guideRotate = '<article id="article-%s" data-rotatorid="%s" data-cslide="1" data-slidemax="%s" class="nu__block-rotator"><a href="%s" style="background-image: url(%s);" target="%s" title="Click here now to learn more"><h2>%s</h2></a><div class="slider_prev rotate" title="Click here to view the previous slide"><svg viewbox="0 0 100 100"><path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z" transform=" translate(15,0)" /></svg></div><div class="slider_next rotate" title="Click here to view the next slide"><svg viewbox="0 0 100 100"><path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z" transform="translate(85,100) rotate(180) " /></svg></div>%s</article>';


	foreach($stories as $s){

		if(count($s['block_slide']) == 1){	// this is for a non-rotator type article

			$return .= sprintf(
				$guideSingle
				,$i
				,$s['block_slide'][0]['block_slide_image']['url']
				,$s['block_slide'][0]['block_slide_link']
				,($s['block_slide'][0]['external_link'] == '1'?' target="_blank"':'')
				,$s['block_slide'][0]['block_slide_description']
				,$s['block_slide'][0]['block_slide_title']
				,(isset($s['block_overlay_logo']) && $s['block_overlay_logo'] != ''?'<div class="nu__overlay-logo"><img src="'.$s['block_overlay_logo']['url'].'" alt="overlay logo" /></div>':'')
			);

		}else{	// this will handle rotator type articles

			$return .= sprintf(
				$guideRotate
				,$i
				,($r + 1)
				,count($s['block_slide'])
				,$s['block_slide'][0]['block_slide_link']
				,$s['block_slide'][0]['block_slide_image']['url']
				,($s['block_slide'][0]['external_link'] == '1'?'_blank':'')
				,$s['block_slide'][0]['block_slide_title']
				,(isset($s['block_overlay_logo']) && $s['block_overlay_logo'] != ''?'<div class="nu__overlay-logo"><img src="'.$s['block_overlay_logo']['url'].'" alt="overlay logo" /></div>':'')
			);
			$r++;

		}

		if($i == 5 || $i == 9){
			$jj++;
			$return .= '</section><section class="panel-'.$jj.'">';
		}

		$i++;

	}

	$return .= '</section>';
	echo $return;

?>
