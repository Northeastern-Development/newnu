<?php

	$args = array(
		"page_id" => 23
	);

	$res = query_posts($args);

	// print_r($res);
	//
	// die();

	$content = "";

	$i = 1; // first break = 5, 2nd = 9, 3rd = 13

	// while (have_posts()) : the_post();

		$fields = get_fields(get_the_ID());

		// print_r($fields);

		// die();

		// $i++;

	// endwhile;

	// echo $content;

	echo '<section id="nu__stories"><ul><li>Many Experiences. One Northeastern.</li><li>Transformative Research</li><li>Vibrant Campus Life</li><li>A Better, Faster Food</li><li>The Global University System</li><li>Leading Change</li></ul></section>';

?>
