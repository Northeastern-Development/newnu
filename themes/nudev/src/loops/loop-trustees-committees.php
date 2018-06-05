<?php

	wp_reset_query();

	$return = '';

	$args = array(
		"post_type" => "corporation"
		,"posts_per_page" => -1
		,'meta_query' => array(
			'relation' => 'AND'
			,array("key"=>"type","value"=>"Committee","compare"=>"=")
		)
	);

	$res = query_posts($args);

	$guide = '<article><h5>%s</h5><p>%s</p></article>';

	foreach($res as $r){

		$fields = get_fields($r->ID);

		$return .= sprintf(
			$guide
			,$r->post_title
			,$fields['description']
		);
	}

	$return .= '';

	echo $return;

?>
