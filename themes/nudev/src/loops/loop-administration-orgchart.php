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
			,"posts_per_page" => -1
			,'meta_query' => array(
				 'relation' => 'AND'
				,array("key"=>"type","value"=>"Department","compare"=>"=")
				// ,array("key"=>"department","value"=>"strategy","compare"=>"!=")
			)
		);

		$res = query_posts($args);

		// print_r($res);
		// die();

		unset($args);

		// we need to filter multiple departments out of the main list as they will live up closer to the president
		$skipMe = array('strategy','partnerships');
		$depts = array();
		$aboveSLT = array();

		foreach($res as $r){
			$fields = get_fields($r->ID);

			// print_r($fields);


			// if($fields['department'][0] != 'strategy' && $fields['department'][0] != 'partnerships'){
			if(!in_array($fields['department'][0],$skipMe)){	// this should skip any in the array above
				$depts[] = array(
					 "name" => $r->post_title
					,"department" => $fields['department'][0]
					,"departmentslug" => $r->post_name
				);
			}else{
				$aboveSLT[] = array(
					 "name" => $r->post_title
					,"department" => $fields['department'][0]
					,"departmentslug" => $r->post_name
				);
			}
		}

		// print_r($depts);
		// die();

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
				// $manager = query_posts($args)[0];
				$manager = query_posts($args);
				// $manager = $manager[0];

				// if(){
				// echo $d['department'].' - ';
				// print_r($manager);
				// die();
				unset($args);

				$departments .= '<div id="dept-'.strtolower(str_replace(" ","-",$d['department'])).'">';

				// we need to filter out presidential advisors from being clickable
				if($d['department'] != 'presidential-advisors'){
					$departments .= '<a href="'.home_url().'/about/university-administration/'.strtolower(str_replace(" ","-",$d['department'])).'" title="Learn more about '.strtolower($d['name']).'" aria-label="Learn more about '.strtolower($d['name']).'">';
				}

				// $departments .= '<div class="departmenttitle">'.str_replace(array('-'),' ',$d['department']).'</div>';

				if(!empty($manager)){

					$manager = $manager[0];

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
					,'sub-type_clause' => array("key"=>"sub_type","compare"=>"EXISTS")
					,'head_clause' => array("key"=>"department_head","value"=>"0","compare"=>"LIKE")
				)
				// ,'orderby' => array('sub-type_clause' => 'DESC')	// this will force deans to be listed first
			);

			$subTypeCheck = '';

			$staff = query_posts($args);
			unset($args);

			if($d['department'] == 'provost'){

				// this will force deans to be listed first
				// we need to reorder the results that were returned a doing it in the query screws up the custom ordering
				$deans = array();
				$admins = array();
				foreach($staff as $r){
					if(get_field('sub_type',$r->ID) == 'Dean'){
						$deans[] = $r;
					}else{
						$admins[] = $r;
					}
				}

				$staff = array_merge($deans,$admins); // put everything back together again

				unset($deans,$admins);

				// $departments .= '<div class="grouptitle"><div>Deans</div></div>';
				$departments .= '<div class="grouptitle"><div>&nbsp;</div></div>';
				$subTypeCheck = 'Dean';
			}

			if(!empty($staff)){

				foreach($staff as $r){

					$fields = get_fields($r->ID);

					// check to see if we are in provost, and if we have reached the end of the deans list, and change the section title
					if($d['department'] == 'provost' && $fields['sub_type'] != $subTypeCheck){
						// $departments .= '<div class="grouptitle"><div>Administrators</div></div>';
						$departments .= '<div class="grouptitle"><div>&nbsp;</div></div>';
						$subTypeCheck = '';
					}

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

			if($d['department'] != 'presidential-advisors'){	// only if not presidential advisors
				$departments .= '</a>';
			}

			$departments .= '</div>';

			$connectors .= '<div><div></div></div>';

		}












		// we need to get the above SLT departments here
		$aboveSLTRetun = '';
		foreach($aboveSLT as $aS){
			$args = array(
				 "post_type" => "administration"
				,"posts_per_page" => 1
				,'meta_query' => array(
					 'relation' => 'AND'
					,'type_clause' => array("key"=>"type","value"=>"individual","compare"=>"=")
					,'dept_clause' => array("key"=>"department","value"=>$aS['department'],"compare"=>"LIKE")
					,'head_clause' => array("key"=>"department_head","value"=>"1","compare"=>"LIKE")
				)
			);
			$res = query_posts($args)[0];
			unset($args);
			$resFields = get_fields($res->ID);

			$image = (!empty($resFields['thumbnail'])?$resFields['thumbnail']['url']:$resFields['headshot']['sizes']['small']);

			$aboveSLTRetun .= '<a href="'.home_url().'/about/university-administration/'.$aS['department'].'" title="Learn more about '.strtolower($resFields['title']).'" aria-label="Learn more about '.strtolower($resFields['title']).'">';

			$aboveSLTRetun .= sprintf(
				$guides['deptstaff']
				,$res->post_title
				,$resFields['title']
				,$image
			);

			$aboveSLTRetun .= '</a>';
		}



		$orgChart .= '<section class="nu__orgchart">';

		// $orgChart .= '<div class="dept-strategy"><div><div><a href="'.home_url().'/about/university-administration/strategy" title="Learn more about '.strtolower($stratFields['title']).'" aria-label="Learn more about '.strtolower($stratFields['title']).'">'.$strategy.'</a></div></div></div>';
		$orgChart .= '<div class="dept-aslt"><div><div>'.$aboveSLTRetun.'</div></div></div>';

		$orgChart .= '<div class="connectors">'.$connectors.'</div>';

		$orgChart .= '<div class="container">'.$departments.'</div></section>';

	echo $orgChart;

	unset($orgChart,$depts,$connectors,$departments,$strat,$strategy,$stratFields);











}else{	// we want to show a specific department *******************************************************************************

	$departments = '';

	$args = array(
		 "post_type" => "administration"
		 ,"posts_per_page" => 1
		 ,'meta_query' => array(
			 'relation' => 'AND'
			 ,array("key"=>"type","value"=>"Department","compare"=>"=")
			,array("key"=>"department","value"=>'"'.$filter.'"',"compare"=>"LIKE")
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
			,array("key"=>"department","value"=>'"'.$filter.'"',"compare"=>"LIKE")
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
			// ,'dept_clause' => array("key"=>"department","value"=>'"'.str_replace("-"," ",$filter).'"',"compare"=>"LIKE")
			,'dept_clause' => array("key"=>"department","value"=>'"'.$filter.'"',"compare"=>"LIKE")
			,array("key"=>"department_head","value"=>"0","compare"=>"LIKE")
		)
	);

	$res = query_posts($args);
	unset($args);

	if($filter == 'provost'){

		// this will force deans to be listed first
		// we need to reorder the results that were returned a doing it in the query screws up the custom ordering
		$deans = array();
		$admins = array();
		foreach($res as $r){
			if(get_field('sub_type',$r->ID) == 'Dean'){
				$deans[] = $r;
			}else{
				$admins[] = $r;
			}
		}

		$res = array_merge($deans,$admins); // put everything back together again
		unset($deans,$admins);
	}

	// $departments .= '<section class="nu__team-list">'.($subType != "" ?'<h3>'.$subType.'</h3>':'').'<ul>';

	$departments .= '<section class="nu__team-list"><ul>';

	$guide = '<li><div style="background-image: url(%s);"></div><p><span>%s</span><br />%s</p></li>';

	foreach($res as $r){
		$fields = get_fields($r->ID);

		// if($fields['sub_type'] != $subType){
		// 	$subType = $fields['sub_type'];
		// 	$departments .= '</ul>'.($subType != "" ?'<h3>'.$subType.'</h3>':'').'<ul>';
		// }

		$departments .= sprintf(
			$guide
			,$fields['headshot']['sizes']['medium_large']
			,trim($r->post_title)
			,trim($fields['title'])
		);

		unset($fields);

	}

	unset($guide,$res,$r);

	$departments .= "</ul></section>";

	echo $departments;

	unset($departments);

}

?>
