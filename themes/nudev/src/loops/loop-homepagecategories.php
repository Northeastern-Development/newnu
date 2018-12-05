<?php

	$thisImage = '';

	$args = array(
		"page_id" => 23
	);

	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	$stories = $fields['top_story_blocks'];

	$return = '';

	$guide = '<div><div><a href="%s" title="Learn more about %s%s" aria-label="Learn more about %s%s"%s><div data-backgrounds="%s" class="bgimage" style="%s" aria-label="category image for %s"></div><h2><span>%s</span></h2></a><ul>%s</ul></div></div>';

	$optionsGuide = '<li><a href="%s" title="Learn more about %s%s" aria-label="Learn more about %s%s" %s><span>%s</span></a></li>';

	// $iPath = responsive_background_images('medium_large');

	for($i=2;$i<6;$i++){

		// we need to see if there is more than 1 block with an image so that we can potentially pick a random one each time page loads
		$images = array();
		$jsonImages = '';

		foreach($stories[$i]['block_slide'] as $bS){
			if(isset($bS['block_slide_image']) && $bS['block_slide_image'] != ""){

				$images[] = $bS['block_slide_image']['url'];
				$jsonImages .= ($jsonImages != ''?',':'').$bS['block_slide_image']['url'];

				// if(count($iPath) > 2){
				// 	$images[] = $bS[$iPath[0]][$iPath[1]][$iPath[2]];
				// 	$jsonImages .= ($jsonImages != ''?',':'').$bS[$iPath[0]][$iPath[1]][$iPath[2]];
				// }else{
				// 	$images[] = $bS[$iPath[0]][$iPath[1]];
				// 	$jsonImages .= ($jsonImages != ''?',':'').$bS[$iPath[0]][$iPath[1]];
				// }
			}
		}

		$thisImage = $images[rand(0,(count($images) - 1))];

		// this will build out the category options
		$options = '';



		for($ii=1;$ii<count($stories[$i]['block_slide']);$ii++){
			// $options .= '<li><a href="'.$stories[$i]['block_slide'][$ii]['block_slide_link'].'" title="Learn more about '.$stories[$i]['block_slide'][$ii]['block_slide_title'].($stories[$i]['block_slide'][$ii]['external_link'] == 1?' [will open in new tab or window]':'').'" aria-label="Learn more about '.$stories[$i]['block_slide'][$ii]['block_slide_title'].($stories[$i]['block_slide'][$ii]['external_link'] == 1?' [will open in new tab or window]':'').'"'.($stories[$i]['block_slide'][$ii]['external_link'] == 1?' target="_blank"':'').'>'.$stories[$i]['block_slide'][$ii]['block_slide_title'].'</a></li>';

			$options .= sprintf(
				$optionsGuide
				,$stories[$i]['block_slide'][$ii]['block_slide_link']
				,strtolower($stories[$i]['block_slide'][$ii]['block_slide_title'])
				,($stories[$i]['block_slide'][$ii]['external_link'] == 1?' [will open in new tab or window]':'')
				,strtolower($stories[$i]['block_slide'][$ii]['block_slide_title'])
				,($stories[$i]['block_slide'][$ii]['external_link'] == 1?' [will open in new tab or window]':'')
				,($stories[$i]['block_slide'][$ii]['external_link'] == 1?' target="_blank"':'')
				,$stories[$i]['block_slide'][$ii]['block_slide_title']
			);
		}

		$return .= sprintf(
			$guide
			,$stories[$i]['block_slide'][0]['block_slide_link']
			,$stories[$i]['block_name']
			,($stories[$i]['block_slide'][0]['external_link'] == '1'?' [will open in new tab or window]':'')
			,$stories[$i]['block_name']
			,($stories[$i]['block_slide'][0]['external_link'] == '1'?' [will open in new tab or window]':'')
			,($stories[$i]['block_slide'][0]['external_link'] == '1'?' target="_blank"':'')
			,$jsonImages
			,'background-image: url('.$thisImage.');'
			,strtolower($stories[$i]['block_name'])
			,$stories[$i]['block_name']
			,$options
		);

	}

	echo $return;

?>
