<?php

$args = array(
	 "post_type" => "programs"
	 ,"posts_per_page" => -1
);

$res = query_posts($args);

$departments = '';

$guideA = '<div><div><a href="%s" title="Learn more about %s [will open in new window]" target="_blank"><span>%s</span></a></div>%s<div class="spacer"></div>%s</div>';


foreach($res as $r){

	$fields = get_fields($r->ID);

	$grad = $ugrad = '<div class="inactive"></div>';	// turn all levels off until the data turns them on

	// what program types does this exist in
	foreach($fields['program_level'] as $pL){
		if($pL['level'] === "Graduate"){
			$grad = '<div class="active"><a href="'.$pL['level_url'].'" title="Learn more about '.$r->post_title.' - Graduate [will open in new window]" target="_blank">Graduate</a></div>';
		}else if($pL['level'] === "Undergraduate"){
			$ugrad = '<div class="active"><a href="'.$pL['level_url'].'" title="Learn more about '.$r->post_title.' - Undergraduate [will open in new window]" target="_blank">Undergraduate</a></div>';
		}
	}

	$departments .= sprintf(
		$guideA
		,$fields['program_url']
		,$r->post_title
		,$r->post_title
		,$grad
		,$ugrad
	);
}

	// this is the return value to appear on the calling page
	echo $departments;

?>
