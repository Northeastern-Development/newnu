<?php

$args = array(
	 "post_type" => "institutes"
);

$res = query_posts($args);

$institutes = '';

$guide = '<li><div class="bgimage" style="background-image: url(%s);"></div><div class="copy"><h3>%s</h3><p>%s</p><a href="%s" title="Learn more about %s" aria-label="Learn more about %s" target="_blank"><span>Learn more about %s</span></a></div></li>';

$cnt = 8;

foreach($res as $r){

	$fields = get_fields($r->ID);

	$institutes .= sprintf(
		$guide
		,$fields['institute_image']['url']
		,$fields['institute_name']
		,$fields['institute_description']
		,$fields['institute_url']
		,$fields['institute_abbreviation']
		,$fields['institute_abbreviation']
		,$fields['institute_abbreviation']
	);
}

echo $institutes;

?>
