<?php
	// this will grab the select options for campuses in the CMS to be used as filters on screen

	$return = '';
	$i = 0;

	$args = array(
		 "post_type" => "campuses"
		 ,"posts_per_page" => -1
		 ,'meta_query' => array(
				 'relation' => 'AND'
				,'type_clause' => array("key"=>"show_details","value"=>"1","compare"=>"=")
			)
	);

	$res = query_posts($args);

	$guide = '<li><a href="%s" title="See details for %s" aria-label="See details for %s"%s tabindex="-1" data-campus="%s">%s <span>&#xE313;</span></a></li>';

	foreach($res as $r){

		$fields = get_fields($r->ID);

		$return .= sprintf(
			$guide
			,$fields['campus_url']
			,strtolower($r->post_title)
			,strtolower($r->post_title)
			,($i==0?'class="active"':'')
			,$r->post_title
			,ucwords(trim($r->post_title))
		);
		$i++;
	}

	unset($i,$res,$r,$fields,$guide);

	echo $return;

?>
