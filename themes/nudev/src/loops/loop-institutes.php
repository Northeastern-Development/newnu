<?php

$args = array(
	 "post_type" => "institutes"
);

$res = query_posts($args);

$institutes = '';

$guide = '<li><a href="%s" title="Learn more about %s" aria-label="Learn more about %s" target="_blank"><div class="bgimage"><div style="background-image: url(%s);" aria-label="image for %s"></div></div><div class="copy"><h3>%s</h3><p>%s</p><h4><span>Learn more about %s</span></h4></div></a></li>';

$cnt = 8;

foreach($res as $r){

	$fields = get_fields($r->ID);

	$institutes .= sprintf(
		$guide
		,$fields['institute_url']
		,$fields['institute_abbreviation']
		,$fields['institute_abbreviation']
		,$fields['institute_image']['url']
		,strtolower($fields['institute_name'])
		,$fields['institute_name']
		,$fields['institute_description']
		,$fields['institute_abbreviation']
	);
}

echo $institutes;

?>
