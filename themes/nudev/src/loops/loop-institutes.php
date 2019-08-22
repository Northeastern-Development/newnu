<?php

// grab the data
$args = array(
	 "post_type" => "researchinstitutes"
);
$res = query_posts($args);

unset($args);	// clean up

$institutes = '';

if(!empty($res)){	// only do the next if we have data to work with

	$guide = '<li><a href="%s" title="Learn more about %s" aria-label="Learn more about %s" target="_blank"><div class="bgimage"><div style="background-image: url(%s);" aria-label="image for %s"></div></div><div class="copy"><h3>%s</h3><p><span>%s</span></p></div></a></li>';

	foreach($res as $r){	// loop through each result record

		$fields = get_fields($r->ID);	// get additional data stored in ACF

		$institutes .= sprintf(
			$guide
			,$fields['institute_url']
			,$fields['institute_abbreviation']
			,$fields['institute_abbreviation']
			,$fields['institute_image']['url']
			,strtolower($fields['institute_name'])
			,$fields['institute_name']
			,$fields['institute_description']
		);
	}
	unset($guide,$res,$r,$fields);	// clean up
}

echo $institutes;	// echo content

unset($institutes);	// clean up

?>
