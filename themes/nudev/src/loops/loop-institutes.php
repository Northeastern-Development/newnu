<?php

$args = array(
	 "post_type" => "institutes"
);

$res = query_posts($args);

// print_r($res);

$institutes = '';
// $explore = '';


$guideA = '<li><a href="%s" title="%s [will open in new window]" target="_blank"><div class="image"><div style="background-image: url(%s);"></div></div><h4>%s<span>&#xE8E4;</span></h4></a></li>';

// $guideB = '<section style="background-image: url(%s);" class="nu__explore"><div><h3>%s</h3><p>%s</p><a href="%s" title="%s [will open in new window]" target="_blank">Learn More</a></div></section>';

$i = 1;

foreach($res as $r){

	$fields = get_fields($r->ID);

	// if($i < count($res)){	// this will handle all but explore, which must be the last one in the CMS return order
		$institutes .= sprintf(
			$guideA
			,$fields['institute_url']
			,$fields['institute_name']
			,$fields['institute_image']['url']
			,$fields['institute_name']
		);
	// }
	// else{	// this will handle explore, which is the last one in the CMS return order
	// 	$explore = sprintf(
	// 		$guideB
	// 		,$fields['institute_image']['url']
	// 		,$fields['college_name']
	// 		,$fields['college_description']
	// 		,$fields['college_url']
	// 		,$fields['college_name']
	// 	);
	// }
	$i++;
}

	// this is the return value to appear on the calling page
	// echo '<section class="nu__collegegrid"><ul>'.$colleges.'</ul></section>'.$explore;
		echo '<section class="nu__collegegrid"><ul>'.$institutes.'</ul></section>';

?>
