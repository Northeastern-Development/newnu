<?php

	$args = array(
		"page_id" => get_the_ID()
	);

	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	$return = '';

	if($fields['use_hero'] == 1){
		$return .= '<section class="hero"><div><h2>'.$fields['title'].'</h2><h3>'.$fields['description'].'</h3></div></section>';
	}

	echo $return;

?>
