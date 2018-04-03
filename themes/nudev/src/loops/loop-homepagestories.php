<?php

	$thisImage = '';

	$args = array(
		"page_id" => 23
	);

	$res = query_posts($args);



	$fields = get_fields($res[0]->ID);

	// print_r($fields);
	// die();

	$stories = $fields['top_story_blocks'];

	$content = "";

	$i = 1; // first break = 5, 2nd = 9, 3rd = 13
	$jj = 1;
	$r = 0;

	$cnt = 13;

	$return = '<section class="panel-'.$jj.'">';

	//$guideSingle = '<article id="article-%s" style="%s %s" ><a href="%s" title="Click here now to learn more %s" %s><p>%s&nbsp;</p></a><h2><span>%s</span></h2>%s<div class="gradient"></div></article>';

	$guideSingle = '<article id="article-%s" style="%s %s"><a href="%s" title="Click here now to learn more %s" %s>%s</a><div class="nu__panel-content"><p>%s&nbsp;</p><h2><span>%s</span></h2></div>%s<div class="gradient"></div></article>';

	$guideRotate = '<article id="article-%s" data-rotatorid="%s" data-cslide="1" data-slidemax="%s" class="nu__block-rotator" style="%s %s"><a href="%s" target="%s" title="Click here now to learn more %s">%s</a><div class="nu__panel-content"><p>%s&nbsp;</p><h2><span>%s</span></h2></div><div class="nu__slide-controls"><div><div class="slider_prev rotate" title="Click here to view the previous slide">&#xE5C4;</div><div class="slider_next rotate" title="Click here to view the next slide">&#xE5C8;</div></div></div><div class="nu__overlay-logo">%s</div><div class="gradient"></div></article>';

	$iPath = responsive_background_images();	// call the function to figure out the best image size to use

	foreach($stories as $s){

		// print_r($s);

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
				,$s['block_slide'][0]['block_slide_title']
				,$s['block_slide'][0]['block_slide_description']
				,$s['block_slide'][0]['block_slide_title']
				,(isset($s['block_overlay_logo']) && $s['block_overlay_logo'] != ''?'<div class="nu__overlay-logo"><img src="'.$s['block_overlay_logo']['url'].'" alt="overlay logo for '.$s['block_slide'][0]['block_slide_title'].'" /></div>':'')
			);

		}else{	// this will handle rotator type articles

			$return .= sprintf(
				$guideRotate
				,$i
				,($r + 1)
				,count($s['block_slide'])
				,'background-image: url('.$thisImage.');'
				,'background-color: '.$s['block_slide'][0]['block_slide_background'].'; '
				,$s['block_slide'][0]['block_slide_link']
				,($s['block_slide'][0]['external_link'] == '1'?'_blank':'')
				,($s['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
				,$s['block_slide'][0]['block_slide_title']
				,$s['block_slide'][0]['block_slide_description']
				,$s['block_slide'][0]['block_slide_title']
				// ,(isset($s['block_overlay_logo']) && $s['block_overlay_logo'] != ''?'<div class="nu__overlay-logo"><img src="'.$s['block_overlay_logo']['url'].'" alt="overlay logo" /></div>':'')
				,(isset($s['block_slide'][0]['slide_overlay_logo']) && $s['block_slide'][0]['slide_overlay_logo'] != ''?'<img src="'.$s['block_slide'][0]['slide_overlay_logo']['url'].'" alt="overlay logo for '.$s['block_slide'][0]['block_slide_title'].'" />':'')
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


	// let's determine if we have a take over block active

	$guideTakeover = '<div class="takeover" style="background-image: url(%s);"><div class="nu__close-takeover" title="Click to close"></div><a href="%s" title="%s%s" target="%s"><h2><span>%s</span></h2><p>%s</p></a><div class="gradient"></div></div>';

	if(isset($fields['takeover']) && $fields['takeover'][0]['status'] == 1){
		$return .= sprintf(
			$guideTakeover
			,$fields['takeover'][0]['image']['url']
			,$fields['takeover'][0]['link']
			,$fields['takeover'][0]['title']
			,($fields['takeover'][0]['external'] == '1'?' [will open in new window]':'')
			,($fields['takeover'][0]['external'] == '1'?'_blank':'')
			,$fields['takeover'][0]['title']
			,$fields['takeover'][0]['description']
		);
	}




	echo $return;

?>
