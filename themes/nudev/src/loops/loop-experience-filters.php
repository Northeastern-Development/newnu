<?php
	// this will grab the select options for campuses in the CMS to be used as filters on screen

	$return = '';
	$i = 0;

	// grab the data
	$args = array(
		 "post_type" => "campuses"
		 ,"posts_per_page" => -1
		 ,'meta_query' => array(
				 'relation' => 'AND'
				,'type_clause' => array("key"=>"show_details","value"=>"1","compare"=>"=")
			)
	);

	$res = query_posts($args);

	unset($args);	// clean up

	if(!empty($res)){	// only do the next if we have records of data

		$guide = '<li><a href="%s" title="See details for %s" aria-label="See details for %s"%s tabindex="-1" data-campus="%s">%s <span>&#xE313;</span></a></li>';

		foreach($res as $r){

			$fields = get_fields($r->ID);

			$return .= sprintf(
				$guide																								// the guide to show the data within
				,$fields['campus_url']																// url of the specific campus
				,strtolower($r->post_title)														// title of the campus in the link title
				,strtolower($r->post_title)														// title of the campus in the link aria-label
				,($i==0?' class="active"':'')													// if this is the active campus, add the active class
				,$r->post_title																				// title of the campus stored as a data value
				,ucwords(trim($r->post_title))												// title of the campus shown to the user
			);
			$i++;
		}
		unset($guide,$res,$r,$fields);	// clean up
	}

	unset($i);	// clean up

	echo $return;	// return the content

?>
