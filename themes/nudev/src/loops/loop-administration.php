<?php

	wp_reset_query();

	$departments = '';

	if($filter == ''){	// this is for the SLT

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
				 "name" => $r->post_title
				,"department" => $fields['department'][0]
				,"departmentslug" => $r->post_name
				,"link" => $fields['url']
				,"email" => $fields['email']
				,"phone" => $fields['phone']
			);
		}

		foreach($depts as $d){

			// get the manager of this department
			$args = array(
				 "post_type" => "administration"
				,"posts_per_page" => -1
				,'meta_query' => array(
					 'relation' => 'AND'
					,array("key"=>"type","value"=>"individual","compare"=>"=")
					,array("key"=>"department","value"=>'"'.$d['department'].'"',"compare"=>"LIKE")
					,array("key"=>"department_head","value"=>"1","compare"=>"LIKE")
				)
			);
			$manager = query_posts($args);
			$managerFields = get_fields($manager[0]->ID);

			// print_r($managerFields);

			if($managerFields['department_head'] == 1){

				$guide = '<article id="profile_%s"><div><div style="background-image: url(%s);"></div></div><div><p class="nametitle"><span>%s</span><br />%s</p><div class="description">%s</div><p class="contact">%s%s%s</p></div></article>';

				// are there any staff assigned to this department?
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

				$staffCnt = count(query_posts($args));

				$department = sprintf(
					$guide
					,str_replace(array(" ","."),"-",strtolower($manager[0]->post_title))
					,$managerFields['headshot']['url']
					,$manager[0]->post_title
					,$managerFields['title']
					,$managerFields['description'].'<div>[<a href="javascript:void(0);" title="Read more about '.$manager[0]->post_title.'" aria-label="Read more about '.$manager[0]->post_title.'" class="js__readmore" tabindex="-1" id="'.str_replace(array(" ","."),"-",strtolower($manager[0]->post_title)).'">Read <span>More</span> About '.$manager[0]->post_title.'</a>]</div>'
					,(isset($d['phone']) && $d['phone'] != ''?'<a href="tel:'.$d['phone'].'" title="Call '.$manager[0]->post_title.'" aria-label="Call '.$manager[0]->post_title.'"><span>&#xE0B0;</span> '.$d['phone'].'</a><br />':'')
					,(isset($d['link']) && $d['link'] != ''?'<a href="'.$d['link'].'" title="Visit '.strtolower($d['department']).' website [will open in new window]" aria-label="Visit '.strtolower($d['department']).' website [will open in new window]" target="_blank"><span>&#xE5C8;</span> Visit website</a><br />':'')
					,($staffCnt > 0?'<a href="'.home_url().'/about/university-administration/'.str_replace(" ","-",strtolower($d['department'])).'" title="Filter to show '.strtolower($d['department']).' team" aria-label="Filter to show '.strtolower($d['department']).' team"><span>&#xE7EF;</span> View Leadership</a>':'')
				);

				$departments .= '<section class="nu__slt">'.$department.'</section>';

			}

		}

	}else{	// this is for a specific department

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

		if($managerFields['department_head'] == 1){

			// $guide = '<section class="nu__team"><article><div><p class="description">%s</p><p class="contact"><a href="tel:%s" title="Call %s" aria-label="Call %s"><span>&#xE0B0;</span>%s</a><br /><a href="%s" title="Visit website [will open in new window]" aria-label="Visit website [will open in new window]" target="_blank"><span>&#xE5C8;</span> Visit website</a></p></div><div><div style="background-image: url(%s);"></div><p><span>%s</span><br />%s</p></div></article></section>';

			$guide = '<section class="nu__team"><article><div><div class="description">%s</div>%s<div class="contact">%s%s</div></div><div><div style="background-image: url(%s);"></div><p><span>%s</span><br />%s</p></div></article></section>';

			$department = sprintf(
				$guide

				,$deptFields['description']
				,'<div class="learnmoreabout">[<a href="javascript:void(0);" title="Read more about '.$manager[0]->post_title.'" aria-label="Read more about '.$manager[0]->post_title.'" class="js__readmoredept" tabindex="-1" id="'.str_replace(array(" ","."),"-",strtolower($manager[0]->post_title)).'">Read <span>More</span> About '.$manager[0]->post_title.'</a>]</div>'
				,(isset($deptFields['phone']) && $deptFields['phone'] != '' ? '<a href="tel:'.$deptFields['phone'].'" title="Call '.strtolower($dept[0]->post_title).'" aria-label="Call '.strtolower($dept[0]->post_title).'"><span>&#xE0B0;</span>'.$deptFields['phone'].'</a><br />':'')
				,(isset($deptFields['url']) && $deptFields['url'] != '' ? '<a href="'.$deptFields['url'].'" title="Visit website [will open in new window]" aria-label="Visit website [will open in new window]" target="_blank"><span>&#xE5C8;</span> Visit website</a>':'')
				,$managerFields['headshot']['url']
				,$manager[0]->post_title
				,$managerFields['title']
			);

			$departments .= $department;

		}

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
				,$fields['headshot']['url']
				,trim($r->post_title)
				,trim($fields['title'])
			);

		}

		$departments .= "</ul></section>";

	}

	echo $departments;

?>
