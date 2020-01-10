<?php

	$args = array(
		 "post_type" => "campuses"
	);

	$res = query_posts($args);

	$return = '';

	if(count($res) > 0){

		$return .= '<ul role="list">';

		$guide = '<li%s role="listitem"><a href="%s" title="%s campus [will open in new window]" aria-label="%s campus [will open in new window]" target="_blank" rel="noopener noreferrer">%s</a></li>';

		$i = 0;
		foreach($res as $r){

			$fields = get_fields($r->ID);

			$return .= sprintf(
				$guide
				,($i == 0?' class="nearestcampus"':'')
				,$fields['campus_url']
				,$fields['campus_name']
				,$fields['campus_name']
				,$fields['campus_name']
			);

			$i++;

		}

		$return .= '</ul>';

	}

	echo $return;

?>
