<?php

	wp_reset_query();

	$return = '<h4>Honorary Trustees</h4><ul>';

	$args = array(
		"post_type" => "corporation"
		,"posts_per_page" => -1
		,'meta_query' => array(
			'relation' => 'AND'
			,array("key"=>"type","value"=>"Honorary Trustee","compare"=>"=")
		)
	);

	$res = query_posts($args);

	$guide = '<li><p><span>%s</span>%s</p></li>';

	foreach($res as $r){

		$fields = get_fields($r->ID);

		$return .= sprintf(
			$guide
			,$r->post_title
			,(isset($fields['sub-type']) && $fields['sub-type'] != ""?'<br />'.$fields['sub-type']:'')
		);
	}

	$return .= '</ul>';

	echo $return;

?>
