<?php

	$thisImage = '';

	$args = array(
		"page_id" => 23
	);

	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	$stories = $fields['top_story_blocks'];

	$return = '';

	$categoryItems = array(
		"undergraduate" => array(
			array('Admissions','https://www.northeastern.edu/admissions/')
			,array('Academic Programs','https://undergraduate.northeastern.edu/academic-programs/')
			,array('Visit Campus','https://www.northeastern.edu/admissions/connect/visit/')
		)
		,"graduate" => array(
			array('Graduate Programs','https://www.northeastern.edu/graduate/programs/#/')
			,array('Admissions','https://www.northeastern.edu/graduate/programs/#/')
			,array('PhD Education','https://phd.northeastern.edu/')
		)
		,"research" => array(
			array('Health','http://www.northeastern.edu/research/about/research-areas/health/')
			,array('Security','http://www.northeastern.edu/research/about/research-areas/security/')
			,array('Sustainability','http://www.northeastern.edu/research/about/research-areas/sustainability/')
		)
		,"lifelong learning" => array(
			array('Professional Programs','https://www.northeastern.edu/learnforlife/programs/')
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
		$options = '';
		foreach($categoryItems[strtolower($stories[$i]['block_slide'][0]['block_slide_title'])] as $cI){
			$options .= '<li><a href="'.$cI[1].'" title="'.$cI[0].'" target="_blank">'.$cI[0].'</a></li>';
		}


			$return .= sprintf(
				$guide
				,$stories[$i]['block_slide'][0]['block_slide_link']
				,$stories[$i]['block_slide'][0]['block_slide_title']
				,($stories[$i]['block_slide'][0]['external_link'] == '1'?' [will open in new window]':'')
				,($stories[$i]['block_slide'][0]['external_link'] == '1'?' target="_blank"':'')
				,'background-image: url('.$thisImage.');'
				,$stories[$i]['block_slide'][0]['block_slide_title']
				,$options
			);

	}

	echo $return;

?>
