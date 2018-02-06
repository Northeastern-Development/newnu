<?php

	$return = '';

	// grab the details for the president
	$args = array(
		 "post_type" => "administration"
		,"posts_per_page" => 1
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"department","value"=>"President","compare"=>"=")
		)
	);
	$res = query_posts($args);
	$fields = get_fields($res[0]->ID);

	$return .= '<section><h3>Office of the president</h3><a href="'.$fields['url'].'" title="President [will open in new window]" target="_blank"><img src="'.$fields['headshot']['sizes']['medium'].'" alt="'.$res[0]->post_title.'" /></a><br />'.$res[0]->post_title.'</section>';


	// gather up the administration categories
	$args = array(
		 "post_type" => "administration"
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"type","value"=>"Department","compare"=>"=")
		)
	);


	// build out an array of the departments to be shown
	$res = query_posts($args);
	$departments = array();
	foreach($res as $r){
		$fields = get_fields($r->ID);
		$departments[] = array(
			 "name" => trim($r->post_title)
			,"department" => $fields['department']
			,"description" => $fields['description']
			,"link" => $fields['url']
			,"email" => $fields['email']
			,"phone" => $fields['phone']
		);
	}


	foreach($departments as $d){

		// get the manager of this department
		$args = array(
			 "post_type" => "administration"
			,"posts_per_page" => 1000
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
			,"posts_per_page" => 1000
			,'meta_query' => array(
				 'relation' => 'AND'
				,array("key"=>"type","value"=>"individual","compare"=>"=")
				,array("key"=>"department","value"=>$d['department'],"compare"=>"=")
				,array("key"=>"department_head","value"=>"0","compare"=>"=")
			)
		);
		$res = query_posts($args);
		$members = '<ul style="clear: both; list-style-type: none; list-style: none;">';

		foreach($res as $r){
			$fields = get_fields($r->ID);
			$members .= '<li style="background: #333; margin: 10px; float: left; width: 200px; height: 300px;"><img src="'.$fields['headshot']['sizes']['small'].'" alt="'.$r->post_title.'" /><br />'.$r->post_title.'<br />'.$fields['title'].'</li>';
		}
		$members .= '</ul>';

		$return .= '<br /><br /><section><div style="margin: 0 0 0 0; overflow: hidden;"><div style="float: right;"><img src="'.$managerFields['headshot']['sizes']['small'].'" alt="'.$manager->post_title.'" />'.$manager[0]->post_title.'<br />'.$managerFields['title'].'</div></div><h3>'.$d['name'].'</h3>'.(isset($d['description']) && $d['description'] != ""?'<p>'.$d['description'].'</p>':'').''.(isset($d['link']) && $d['link'] != ""?'<p><a href="'.$d['link'].'" title="'.$d['name'].'" target="_blank">LINK</a></p>':'').''.(isset($d['email']) && $d['email'] != ""?'<p><a href="mailto:'.$d['email'].'" title="Send us an email">'.$d['email'].'</a></p>':'').''.(isset($d['phone']) && $d['phone'] != ""?'<p><a href="tel:'.$d['phone'].'" title="Give us a call">'.$d['phone'].'</a></p>':'');

		$return .= '<div style="background:#333;">Team Members'.$members.'</div>';


		$return .= '</section><br />';

	}




	/* Template Name: Administration */

	get_header();

?>

	<main id="static" role="main" aria-label="content">

		<?=$return?>

	</main>

<?php get_footer(); ?>
