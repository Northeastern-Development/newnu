<?php

	$thisImage = '';

	$args = array(
		"page_id" => 23
	);

	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	$stories = $fields['top_story_blocks'];

	$return = '';

	$guide = '<div><div><a href="%s" title="%s%s"%s><div class="bgimage" style="%s"></div><h2>%s</h2></a><ul>%s</ul></div></div>';

	for($i=2;$i<6;$i++){

		// we need to see if there is more than 1 block with an image so that we can potentially pick a random one each time page loads
		$images = array();

		foreach($stories[$i]['block_slide'] as $bS){
			if($bS['block_slide_image'] != ""){
				$images[] = $bS['block_slide_image']['url'];
			}
		}

		$thisImage = $images[rand(0,(count($images) - 1))];

		// this will build out the category options
		$options = '';

		for($ii=1;$ii<count($stories[$i]['block_slide']);$ii++){
			$options .= '<li><a href="'.$stories[$i]['block_slide'][$ii]['block_slide_link'].'" title="'.$stories[$i]['block_slide'][$ii]['block_slide_title'].($stories[$i]['block_slide'][$ii]['external_link'] == 1?' [will open in new tab or window]':'').'"'.($stories[$i]['block_slide'][$ii]['external_link'] == 1?' target="_blank"':'').'>'.$stories[$i]['block_slide'][$ii]['block_slide_title'].'</a></li>';
		}

		$return .= sprintf(
			$guide
			,$stories[$i]['block_slide'][0]['block_slide_link']
			,$stories[$i]['block_name']
			,($stories[$i]['block_slide'][0]['external_link'] == '1'?' [will open in new tab or window]':'')
			,($stories[$i]['block_slide'][0]['external_link'] == '1'?' target="_blank"':'')
			,'background-image: url('.$thisImage.');'
			,$stories[$i]['block_name']
			,$options
		);

	}

	echo $return;

?>
