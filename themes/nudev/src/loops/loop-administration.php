<?php

	// grab the details for the president
	$args = array(
		 "post_type" => "administration"
		,"posts_per_page" => 1
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"department","value"=>"President","compare"=>"LIKE")
		)
	);
	$res = query_posts($args);
	$fields = get_fields($res[0]->ID);



	$srcSet = ar_responsive_image(get_field('headshot',$res[0]->ID)['id'],'medium','640px');

	$guide = '<section><h3>Office of the president</h3><a href="%s" title="President [will open in new window]" target="_blank"><img %s alt="%s" style="width: 300px;"/></a><br />%s</section>';
	$president = sprintf(
		$guide
		,$fields['url']
		// ,$fields['headshot']['sizes']['medium']
		,$srcSet
		,$res[0]->post_title
		,$res[0]->post_title
	);


	function testFunction(){
		echo "this is for naught!!!";
		echo "fgjfghj";
	}





	// build out an array of the departments to be shown
	$args = array(
		 "post_type" => "administration"
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"type","value"=>"Department","compare"=>"=")
		)
	);

	$res = query_posts($args);
	$depts = array();

	foreach($res as $r){
		$fields = get_fields($r->ID);
		$depts[] = array(
			 "name" => trim($r->post_title)
			,"department" => $fields['department']
			,"description" => $fields['description']
			,"link" => $fields['url']
			,"email" => $fields['email']
			,"phone" => $fields['phone']
		);
	}

	$departments = '';

	foreach($depts as $d){

		// get the manager of this department
		$args = array(
			 "post_type" => "administration"
			,"posts_per_page" => -1
			,'meta_query' => array(
				 'relation' => 'AND'
				,array("key"=>"type","value"=>"individual","compare"=>"=")
				,array("key"=>"department","value"=>$d['department'],"compare"=>"=")
				,array("key"=>"department_head","value"=>"1","compare"=>"=")
			)
		);
		$manager = query_posts($args);
		$managerFields = get_fields($manager[0]->ID);


		// gather up the members of this department
		$args = array(
			 "post_type" => "administration"
			,"posts_per_page" => -1
			,'meta_query' => array(
				 'relation' => 'AND'
				,array("key"=>"type","value"=>"individual","compare"=>"=")
				,array("key"=>"department","value"=>$d['department'],"compare"=>"LIKE")	// this allows memebrs to be in more than 1 dept at a time
				,array("key"=>"department_head","value"=>"0","compare"=>"=")
			)
		);
		$res = query_posts($args);

		$members = '<ul style="clear: both; list-style-type: none; list-style: none;">';

		$guide = '<li style="background: #333; margin: 10px; float: left; width: 200px; height: 300px;"><img src="%s" alt="%s" /><br />%s<br />%s</li>';

		foreach($res as $r){
			$fields = get_fields($r->ID);
			$members .= sprintf(
				$guide
				,$fields['headshot']['sizes']['small']
				,$r->post_title
				,$r->post_title
				,$fields['title']
			);
		}
		$members .= '</ul>';

		$guide = '<br /><br /><section><div style="margin: 0 0 0 0; overflow: hidden;"><div style="float: right;"><img src="%s" alt="%s" />%s<br />%s</div></div><h3>%s</h3>%s%s%s%s<div style="background:#333;">Team Members%s</div></section><br />';

		$department = sprintf(
			$guide
			,$managerFields['headshot']['sizes']['small']
			,$manager->post_title
			,$manager[0]->post_title
			,$managerFields['title']
			,$d['name']
			,(isset($d['description']) && $d['description'] != ""?'<p>'.$d['description'].'</p>':'')
			,(isset($d['link']) && $d['link'] != ""?'<p><a href="'.$d['link'].'" title="'.$d['name'].'" target="_blank">LINK</a></p>':'')
			,(isset($d['email']) && $d['email'] != ""?'<p><a href="mailto:'.$d['email'].'" title="Send us an email">'.$d['email'].'</a></p>':'')
			,(isset($d['phone']) && $d['phone'] != ""?'<p><a href="tel:'.$d['phone'].'" title="Give us a call">'.$d['phone'].'</a></p>':'')
			,$members
		);

		$departments .= $department;

	}

	echo $president.$departments;	// done this way to allow us to more easily move pieces around should we need to in the future

?>
