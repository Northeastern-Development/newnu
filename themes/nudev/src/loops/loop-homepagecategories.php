<?php

	$thisImage = '';

	$args = array(
		"page_id" => 23
	);

	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	$stories = $fields['top_story_blocks'];

	$return = '';

	$guide = '<div><div><a href="%s" title="view %s%s" aria-label="view %s%s"%s><div data-backgrounds="%s" class="bgimage" style="%s" aria-label="category image for %s"></div><h2><span>%s</span></h2></a><ul>%s</ul></div></div>';

	$optionsGuide = '<li><a href="%s" title="view %s%s" aria-label="view %s%s" %s><span>%s</span></a></li>';

	for($i=2;$i<6;$i++){

		// we need to see if there is more than 1 block with an image so that we can potentially pick a random one each time page loads
		$images = array();
		$jsonImages = '';

		foreach($stories[$i]['block_slide'] as $bS){
			if(isset($bS['block_slide_image']) && $bS['block_slide_image'] != ""){
				$images[] = $bS['block_slide_image']['url'];
				$jsonImages .= ($jsonImages != ''?',':'').$bS['block_slide_image']['url'];
			}
		}

		$thisImage = $images[rand(0,(count($images) - 1))];

		// this will build out the category options
		$options = '';

		for($ii=1;$ii<count($stories[$i]['block_slide']);$ii++){

			$options .= sprintf(
				$optionsGuide
				,$stories[$i]['block_slide'][$ii]['block_slide_link']
				,wp_strip_all_tags(strtolower($stories[$i]['block_slide'][$ii]['block_slide_title']),true)	// this is the title
				,($stories[$i]['block_slide'][$ii]['external_link'] == 1?' [will open in new tab or window]':'')
				,wp_strip_all_tags(strtolower($stories[$i]['block_slide'][$ii]['block_slide_title']),true)	// this is the aria label
				,($stories[$i]['block_slide'][$ii]['external_link'] == 1?' [will open in new tab or window]':'')
				,($stories[$i]['block_slide'][$ii]['external_link'] == 1?' target="_blank" rel="noopener"':'')
				,wp_strip_all_tags($stories[$i]['block_slide'][$ii]['block_slide_title'],true)	// this is the title that appears to the user
			);
		}

		$return .= sprintf(
			$guide
			,$stories[$i]['block_slide'][0]['block_slide_link']
			,$stories[$i]['block_name']
			,($stories[$i]['block_slide'][0]['external_link'] == '1'?' [will open in new tab or window]':'')
			,$stories[$i]['block_name']
			,($stories[$i]['block_slide'][0]['external_link'] == '1'?' [will open in new tab or window]':'')
			,($stories[$i]['block_slide'][0]['external_link'] == '1'?' target="_blank" rel="noopener"':'')
			,$jsonImages
			,'background-image: url('.$thisImage.');'
			,strtolower($stories[$i]['block_name'])
			,$stories[$i]['block_name']
			,$options
		);

	}

	echo $return;

?>
