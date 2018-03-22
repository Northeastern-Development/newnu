<?php

	$args = array(
		 "post_type" => "campuses"
	);

	$res = query_posts($args);

	$return = '';

	if(count($res) > 0){

		$return .= '<div><p>Main Campuses</p><ul>';

		$guide = '<li><a href="%s" title="%s" target="_blank">%s</a></li>';

		foreach($res as $r){

			$fields = get_fields($r->ID);

			$return .= sprintf(
				$guide
				,$fields['campus_url']
				,$fields['campus_name']
				,$fields['campus_name']
			);

		}

		$return .= '</ul></div>';

	}

	echo $return;

?>
