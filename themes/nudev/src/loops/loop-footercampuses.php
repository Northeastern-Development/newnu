<?php

	$args = array(
		 "post_type" => "campuses"
	);

	$res = query_posts($args);

	$return = '';

	if(count($res) > 0){

		$return .= '<!-- <div class="campuses"> --><!-- <p>Campuses</p> --><ul>';

		$guide = '<li%s><a href="%s" title="Learn more about our %s campus" target="_blank">%s</a></li>';

		$i = 0;
		foreach($res as $r){

			$fields = get_fields($r->ID);

			$return .= sprintf(
				$guide
				,($i == 0?' class="nearestcampus"':'')
				,$fields['campus_url']
				,$fields['campus_name']
				,$fields['campus_name']
			);

			$i++;

		}

		$return .= '</ul><!-- </div> -->';

	}

	echo $return;

?>
