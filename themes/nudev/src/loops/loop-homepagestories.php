<?php

	$thisImage = '';

	$args = array(
		"page_id" => 23
		// ,'posts_per_page' => '5'
	);

	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	$stories = $fields['top_story_blocks'];

	$content = "";

	$i = 1; // first break = 2, 2nd = 6
	$jj = 1;
	$r = 0;

	$cnt = 6;

	$return = '<section class="panel-'.$jj.'">';

	$guideSingle = '<article id="article-%s" style="%s %s"><a %s href="%s" title="Click here now to learn more %s" %s>%s</a><div class="nu__panel-content"><div><p>%s&nbsp;</p><h2><span>%s</span></h2></div></div>%s<div class="gradient"></div>%s</article>';

	$guideRotate = '<article id="article-%s" data-rotatorid="%s" data-cslide="1" data-slidemax="%s" class="nu__block-rotator" style="%s %s"><a %s href="%s" %s title="Click here now to learn more %s">%s</a><div class="nu__panel-content"><div><p>%s&nbsp;</p><h2><span>%s</span></h2></div></div><div class="nu__slide-controls"><div><div class="slider_prev rotate" title="Click here to view the previous slide">&#xE5C4;</div><div class="slider_next rotate" title="Click here to view the next slide">&#xE5C8;</div></div></div><div class="nu__overlay-logo">%s</div><div class="gradient"></div></article>';

	// this is a specific guide for the search block in the top portion of the homepage
	$guideSearch = '<article class="nu__block-search">This is the search block!</article>';

	// echo 'SCREEN SIZE: '.$_SESSION['windowsize'];

	$iPath = responsive_background_images();	// call the function to figure out the best image size to use

	foreach($stories as $s){

		$thisImage = $s['block_slide'][0];
		foreach($iPath as $iP){
			$thisImage = $thisImage[$iP];
		}

		if(count($s['block_slide']) == 1){	// this is for single type article

			$return .= sprintf(
				$guideSingle
				,$i
				,'background-image: url('.$thisImage.');'
				,'background-color: '.$s['block_slide'][0]['block_slide_background'].'; '
				,($i > 5?'tabindex="-1"':'')
				,$s['block_slide'][0]['block_slide_link']
				,($s['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
				,($s['block_slide'][0]['external_link'] == '1'?' target="_blank" rel="noopener"':'')
				,$s['block_slide'][0]['block_slide_title']
				,$s['block_slide'][0]['block_slide_description']
				,$s['block_slide'][0]['block_slide_title']
				,(isset($s['block_overlay_logo']) && $s['block_overlay_logo'] != ''?'<div class="nu__overlay-logo"><img src="'.$s['block_overlay_logo']['url'].'" alt="overlay logo for '.$s['block_slide'][0]['block_slide_title'].'" /></div>':'')
				,($i == 1 || $i == 6 || $i == 11?'<div class="nu__article-alphatile"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 445.84 269.62"><path class="alphatilesvg-1" d="M348.41,269.62C266.3,189.69,96.3,24.18,71.74,0H0V266.86c0,.94,0,1.86,0,2.76H13.48L13.07,53.76l224,215.86Z"/><path class="alphatilesvg-2" d="M328.44,0l.05,2.87c36.11-.35,55.65,17.67,55.65,65V269.62h12.55c0-82,0-175.86,0-201.73-.07-48.52,22.55-64.68,49.18-64.68V0Z"/></svg></div>':'')
			);

		}else{	// this will handle rotator type articles

			$return .= sprintf(
				$guideRotate
				,$i
				,($r + 1)
				,count($s['block_slide'])
				,'background-image: url('.$thisImage.');'
				,'background-color: '.$s['block_slide'][0]['block_slide_background'].'; '
				,($i > 5?'tabindex="-1"':'')
				,$s['block_slide'][0]['block_slide_link']
				,($s['block_slide'][0]['external_link'] == '1'?'target="_blank" rel="noopener"':'')
				,($s['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
				,$s['block_slide'][0]['block_slide_title']
				,$s['block_slide'][0]['block_slide_description']
				,$s['block_slide'][0]['block_slide_title']
				,(isset($s['block_slide'][0]['slide_overlay_logo']) && $s['block_slide'][0]['slide_overlay_logo'] != ''?'<img src="'.$s['block_slide'][0]['slide_overlay_logo']['url'].'" alt="overlay logo for '.$s['block_slide'][0]['block_slide_title'].'" />':'')
			);
			$r++;

		}

		if($i == 1){
			$return .= '<div>';
		}

		if($i == 2){
			$jj++;
			$return .= $guideSearch.'</div></section><section class="panel-'.$jj.'">';
		}

		$i++;

	}

	$return .= '</section>';


	// let's determine if we have a take over block active, and show it if it is
	$guideTakeover = '<div class="takeover" style="background-image: url(%s);"><div class="nu__close-takeover" title="Click to close"></div><a href="%s" title="%s%s" %s><h2><span>%s</span></h2><p>%s</p></a><div class="gradient"></div></div>';

	if(isset($fields['takeover']) && $fields['takeover'][0]['status'] == 1){
		$return .= sprintf(
			$guideTakeover
			,$fields['takeover'][0]['image']['url']
			,$fields['takeover'][0]['link']
			,$fields['takeover'][0]['title']
			,($fields['takeover'][0]['external'] == '1'?' [will open in new window]':'')
			,($fields['takeover'][0]['external'] == '1'?'target="_blank" rel="noopener"':'')
			,$fields['takeover'][0]['title']
			,$fields['takeover'][0]['description']
		);
	}

	echo $return;

?>
