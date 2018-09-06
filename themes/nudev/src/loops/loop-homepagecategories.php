<?php

	$thisImage = '';

	$args = array(
		"page_id" => 23
	);

	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	$stories = $fields['top_story_blocks'];

	// $content = "";

	$return = '';

	$categoryItems = array(
		"undergraduate" => array(
			array('Admissions','https://www.northeastern.edu/admissions/')
			,array('Experiential Learning','http://www.northeastern.edu/experiential-learning/')
			,array('Visit Campus','https://www.northeastern.edu/admissions/connect/visit/')
		)
		,"graduate" => array(
			array('Visit Campus','https://www.northeastern.edu/admissions/connect/visit/')
			,array('PhD Education','https://phd.northeastern.edu/')
			,array('Graduate Faculty','https://phd.northeastern.edu/')
		)
		,"research" => array(
			array('Health','http://www.northeastern.edu/research/about/research-areas/health/')
			,array('Security','http://www.northeastern.edu/research/about/research-areas/security/')
			,array('Sustainability','http://www.northeastern.edu/research/about/research-areas/sustainability/')
		)
		,"lifelong learning" => array(
			array('Programs','https://www.northeastern.edu/graduate/')
			,array('Campus Network','https://www.northeastern.edu/learnforlife/campuses/')
			,array('Admissions','https://www.northeastern.edu/graduate/admissions-information/how-to-apply/the-process/')
		)
	);

	$guide = '<div><div><a href="%s" title="%s%s"%s><div class="bgimage" style="%s"></div><h2>%s</h2></a><ul>%s</ul></div></div>';

	$iPath = responsive_background_images();	// call the function to figure out the best image size to use

	for($i=2;$i<6;$i++){

		$thisImage = $stories[$i]['block_slide'][0];
		foreach($iPath as $iP){
			$thisImage = $thisImage[$iP];
		}

		// this will build out the category options
		// print_r($categoryItems[strtolower($stories[$i]['block_slide'][0]['block_slide_title'])]);
		$options = '';
		// echo $stories[$i]['block_slide'][0]['block_slide_title'];
		foreach($categoryItems[strtolower($stories[$i]['block_slide'][0]['block_slide_title'])] as $cI){
			// print_r($cI);
			$options .= '<li><a href="'.$cI[1].'" title="'.$cI[0].'" target="_blank">'.$cI[0].'</a></li>';
		}


			$return .= sprintf(
				$guide
				// ,($i - 1)
				,$stories[$i]['block_slide'][0]['block_slide_link']
				,$stories[$i]['block_slide'][0]['block_slide_title']
				,($stories[$i]['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
				,($stories[$i]['block_slide'][0]['external_link'] == '1'?' target="_blank"':'')
				,'background-image: url('.$thisImage.');'
				//,'background-color: '.$stories[$i]['block_slide'][0]['block_slide_background'].'; '
				// ,''
				// ,$stories[$i]['block_slide'][0]['block_slide_link']
				// ,($stories[$i]['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
				// ,($stories[$i]['block_slide'][0]['external_link'] == '1'?' target="_blank"':'')
				// ,$stories[$i]['block_slide'][0]['block_slide_title']
				// ,$stories[$i]['block_slide'][0]['block_slide_description']
				,$stories[$i]['block_slide'][0]['block_slide_title']
				,$options
				// ,(isset($stories[$i]['block_overlay_logo']) && $stories[$i]['block_overlay_logo'] != ''?'<div class="nu__overlay-logo"><img src="'.$stories[$i]['block_overlay_logo']['url'].'" alt="overlay logo for '.$stories[$i]['block_slide'][0]['block_slide_title'].'" /></div>':'')
				// ,''
			);

	}

	echo $return;

?>
