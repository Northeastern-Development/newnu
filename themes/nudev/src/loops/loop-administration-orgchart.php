<?php

	wp_reset_query();

	if(empty($filter)){	// we want to show the org chart! *******************************************************************************

	$orgChart = '';

	$guides = array(
		"slt" => '<article><div class="orgheadshot slt"><div class="image" style="background-image: url(%3$s);"></div></div><div class="orgdetails"><div><p>%1$s</p><p>%2$s</p></div></div></article>'
		,"deptstaff" => '<article><div class="orgheadshot"><div class="image" style="background-image: url(%3$s);"></div></div><div class="orgdetails"><div><p>%1$s</p><p>%2$s</p></div></div></article>'
	);

	// get a list of all of the departments
		$args = array(
			 "post_type" => "administration"
			,"post_status" => "publish"
			,'meta_query' => array(
				 'relation' => 'AND'
				,array("key"=>"type","value"=>"Department","compare"=>"=")
			)
		);

		$res = query_posts($args);
		unset($args);
		$depts = array();

		foreach($res as $r){
			$fields = get_fields($r->ID);
			$depts[] = array(
				 "name" => $r->post_title
				,"department" => $fields['department'][0]
				,"departmentslug" => $r->post_name
			);
		}

		unset($res,$r,$fields);

		$departments = '';
		$connectors = '';

		// loop through each dept and build out the list of staff
		foreach($depts as $d){

				// get the dept head first
				$args = array(
					 "post_type" => "administration"
					,"post_status" => "publish"
					,"posts_per_page" => 1
					,'meta_query' => array(
						 'relation' => 'AND'
						,array("key"=>"type","value"=>"individual","compare"=>"=")
						,array("key"=>"department","value"=>'"'.$d['department'].'"',"compare"=>"LIKE")
						,array("key"=>"department_head","value"=>"1","compare"=>"LIKE")
					)
				);
				$manager = query_posts($args)[0];
				unset($args);

				$departments .= '<div id="dept-'.strtolower(str_replace(" ","-",$d['department'])).'"><a href="'.home_url().'/about/university-administration/'.strtolower(str_replace(" ","-",$d['department'])).'" title="Learn more about '.strtolower($d['name']).'" aria-label="Learn more about '.strtolower($d['name']).'">';

				if(!empty($manager)){

					$managerFields = get_fields($manager->ID);
					$image = (!empty($managerFields['thumbnail'])?$managerFields['thumbnail']['url']:$managerFields['headshot']['sizes']['small']);

					$departments .= sprintf(
							$guides['slt']
							,$manager->post_title
							,$managerFields['title']
							,$image
					);
					unset($managerFields,$manager,$image);
				}


			// now we can grab the remaining people for this dept
			$args = array(
				 "post_type" => "administration"
				,"posts_per_page" => -1
				,'meta_query' => array(
					 'relation' => 'AND'
					,'type_clause' => array("key"=>"type","value"=>"individual","compare"=>"=")
					,'dept_clause' => array("key"=>"department","value"=>'"'.$d['department'].'"',"compare"=>"LIKE")
					,array("key"=>"department_head","value"=>"0","compare"=>"LIKE")
				)
			);

			$staff = query_posts($args);
			unset($args);

			if(!empty($staff)){
				foreach($staff as $r){

					$fields = get_fields($r->ID);
					$image = (!empty($fields['thumbnail'])?$fields['thumbnail']['url']:$fields['headshot']['sizes']['small']);

					$departments .= sprintf(
						$guides['deptstaff']
						,$r->post_title
						,$fields['title']
						,$image
					);
					unset($fields,$image);
				}
				unset($r);
			}
			unset($staff);


			$departments .= '</a></div>';

			$connectors .= '<div><div></div></div>';

		}



		$orgChart .= '<section class="nu__orgchart"><div class="connectors">'.$connectors.'</div><div class="container">'.$departments.'</div></section>';

	echo $orgChart;

	unset($orgChart,$depts);

}else{	// we want to show a specific department *******************************************************************************

	$departments = '';

	$args = array(
		 "post_type" => "administration"
		 ,'meta_query' => array(
			 'relation' => 'AND'
			 ,array("key"=>"type","value"=>"Department","compare"=>"=")
			,array("key"=>"department","value"=>'"'.str_replace("-"," ",$filter).'"',"compare"=>"LIKE")
		)
	);

	$dept = query_posts($args);
	$deptFields = get_fields($dept[0]->ID);
	unset($args);

	// get the manager of this department
	$args = array(
		 "post_type" => "administration"
		,"posts_per_page" => -1
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"type","value"=>"individual","compare"=>"=")
			,array("key"=>"department","value"=>'"'.str_replace("-"," ",$filter).'"',"compare"=>"LIKE")
			,array("key"=>"department_head","value"=>"1","compare"=>"=")
		)
	);
	$manager = query_posts($args);
	$managerFields = get_fields($manager[0]->ID);
	unset($args);

	if($managerFields['department_head'] == 1){

		$guide = '<section class="nu__team"><article><div><h4>%s</h4><div class="description">%s</div>%s<div class="contact">%s%s</div></div><div><div style="background-image: url(%s);"></div><p><span>%s</span><br />%s</p></div></article></section>';

		$departments .= sprintf(
			$guide
			,$dept[0]->post_title
			,$deptFields['description']
			,'<div class="learnmoreabout">[<a href="javascript:void(0);" title="Read more about '.$manager[0]->post_title.'" aria-label="Read more about '.$manager[0]->post_title.'" class="js__readmoredept" tabindex="-1" id="'.str_replace(array(" ","."),"-",strtolower($manager[0]->post_title)).'">Read <span>More</span> About '.$manager[0]->post_title.'</a>]</div>'
			,(isset($deptFields['phone']) && $deptFields['phone'] != '' ? '<a href="tel:'.$deptFields['phone'].'" title="Call '.strtolower($dept[0]->post_title).'" aria-label="Call '.strtolower($dept[0]->post_title).'"><span>&#xE0B0;</span>'.$deptFields['phone'].'</a><br />':'')
			,(isset($deptFields['url']) && $deptFields['url'] != '' ? '<a href="'.$deptFields['url'].'" title="Visit website [will open in new window]" aria-label="Visit website [will open in new window]" target="_blank"><span>&#xE5C8;</span> Visit website</a>':'')
			,$managerFields['headshot']['sizes']['medium_large']
			,$manager[0]->post_title
			,$managerFields['title']
		);

		unset($manager,$managerFields,$deptFields,$department,$dept);

	}

	unset($guide);

	// now we can gather up the members of the department ordered by sub-type
	$args = array(
		 "post_type" => "administration"
		,"posts_per_page" => -1
		,'meta_query' => array(
			 'relation' => 'AND'
			,'type_clause' => array("key"=>"type","value"=>"individual","compare"=>"=")
			,'sub-type_clause' => array("key"=>"sub_type","compare"=>"EXISTS")
			,'dept_clause' => array("key"=>"department","value"=>'"'.str_replace("-"," ",$filter).'"',"compare"=>"LIKE")
			,array("key"=>"department_head","value"=>"0","compare"=>"LIKE")
		)
	);

	$res = query_posts($args);
	unset($args);

	$subType = get_fields($res[0]->ID)['sub_type'];

	$departments .= '<section class="nu__team-list">'.($subType != "" ?'<h3>'.$subType.'</h3>':'').'<ul>';

	$guide = '<li><div style="background-image: url(%s);"></div><p><span>%s</span><br />%s</p></li>';

	foreach($res as $r){
		$fields = get_fields($r->ID);

		if($fields['sub_type'] != $subType){
			$subType = $fields['sub_type'];
			$departments .= '</ul>'.($subType != "" ?'<h3>'.$subType.'</h3>':'').'<ul>';
		}

		$departments .= sprintf(
			$guide
			,$fields['headshot']['sizes']['medium_large']
			,trim($r->post_title)
			,trim($fields['title'])
		);

		unset($fields);

	}

	unset($guide,$subType,$res,$r);

	$departments .= "</ul></section>";

	echo $departments;

	unset($departments);

}

?>
