<?php

	wp_reset_query();

	$return = '';


	// we need to test to see if there are any leadership entries, and if so show the title for this section otherwise not
	$args = array(
		"post_type" => "corporation"
		,"posts_per_page" => -1
		,'meta_query' => array(
			'relation' => 'AND'
			,array("key"=>"type","value"=>"Trustee","compare"=>"=")
			,array("key"=>"sub-type","value"=>"","compare"=>"!=")
		)
	);

	$res = query_posts($args);

	// if there are no leadership entries, don't show the section title
	if(count($res) > 0){
		$return .= '<h4>Members</h4>';
	}


	$return .= '<ul>';



	// now let's grab the members of the corporation
	$args = array(
		"post_type" => "corporation"
		,"posts_per_page" => -1
		,'meta_query' => array(
			'relation' => 'AND'
			,array("key"=>"type","value"=>"Trustee","compare"=>"=")
			,array("key"=>"sub-type","value"=>"","compare"=>"=")
		)
	);

	$res = query_posts($args);

	$guide = '<li><div style="background-image: url(%s);"></div><p><span>%s%s</span>%s%s%s%s</p></li>';

	foreach($res as $r){

		$fields = get_fields($r->ID);

		$return .= sprintf(
			$guide
			,$fields['headshot']['url']
			,$r->post_title
			,(isset($fields['alumni']) && $fields['alumni'] != "" ?', '.$fields['alumni']:'')
			,(isset($fields['job_title']) && $fields['job_title'] != ""?'<br />'.$fields['job_title'].(isset($fields['retired']) && $fields['retired'] == "1" ?' (Retired)':''):'')
			,(isset($fields['secondary_details']) && $fields['secondary_details'] != "" ?'<br />'.$fields['secondary_details']:'')
			,(isset($fields['current_employer']) && $fields['current_employer'] != "" ?' at '.$fields['current_employer']:'')
			,(isset($fields['location']) && $fields['location'] != "" ?'<br />'.$fields['location']:'')
		);
	}

	$return .= '</ul>';

	echo $return;

?>
