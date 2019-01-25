<?php

	wp_reset_query();

	// $return = '<h4>Other members of The Corporation</h4><ul>';

	$return = '<ul>';

	$args = array(
		"post_type" => "corporation"
		,"posts_per_page" => -1
		,'meta_query' => array(
			'relation' => 'AND'
			,array("key"=>"type","value"=>"Member of the Corporation","compare"=>"=")
		)
	);

	$res = query_posts($args);

	// $guide = '<li><p>%s</p></li>';
	$guide = '<li><p><span>%s</span></p></li>';

	foreach($res as $r){

		$fields = get_fields($r->ID);

		$return .= sprintf(
			$guide
			,$r->post_title
		);
	}

	$return .= '</ul>';

	echo $return;

?>
