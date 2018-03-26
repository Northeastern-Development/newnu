<?php

	$thisImage = '';

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

	//$guideSingle = '<article id="article-%s" style="%s %s" ><a href="%s" title="Click here now to learn more %s" %s><p>%s&nbsp;</p></a><h2><span>%s</span></h2>%s<div class="gradient"></div></article>';

	$guideSingle = '<article id="article-%s" style="%s %s" ><a href="%s" title="Click here now to learn more %s" %s></a><div class="nu__panel-content"><p>%s&nbsp;</p><h2><span>%s</span></h2></div>%s<div class="gradient"></div></article>';

	$guideRotate = '<article id="article-%s" data-rotatorid="%s" data-cslide="1" data-slidemax="%s" class="nu__block-rotator"><div style="background-image: url(%s);" class="bgimage"></div><a href="%s" target="%s" title="Click here now to learn more %s"></a><h2>%s&nbsp;</h2><div class="nu__slide-controls"><div><div class="slider_prev rotate" title="Click here to view the previous slide">&#xE5C4;</div><div class="slider_next rotate" title="Click here to view the next slide">&#xE5C8;</div></div></div>%s<div class="gradient"></div></article>';

	$iPath = responsive_background_images();	// call the function to figure out the best iamge size to use

	foreach($stories as $s){

		$thisImage = $s['block_slide'][0];
		foreach($iPath as $iP){
			$thisImage = $thisImage[$iP];
		}

		if(count($s['block_slide']) == 1){	// this is for a non-rotator type article

			$return .= sprintf(
				$guideSingle
				,$i
				,'background-image: url('.$thisImage.');'
				,'background-color: '.$s['block_slide'][0]['block_slide_background'].'; '
				,$s['block_slide'][0]['block_slide_link']
				,($s['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
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
				,$thisImage
				,$s['block_slide'][0]['block_slide_link']

				,($s['block_slide'][0]['external_link'] == '1'?'_blank':'')
				,($s['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
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
