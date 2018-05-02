<?php

	wp_reset_query();

	$departments = '';

	if($filter == ''){	// this is for the SLT

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
				 "name" => $r->post_title
				,"department" => $fields['department'][0]
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
					,array("key"=>"department","value"=>$d['department'],"compare"=>"LIKE")
					,array("key"=>"department_head","value"=>"1","compare"=>"=")
				)
			);
			$manager = query_posts($args);
			$managerFields = get_fields($manager[0]->ID);

			$guide = '<article><div><p><span>%s</span><br />%s</p><p>%s</p><p><a href="tel:%s" title="">%s</a><br /><a href="%s" title="View %s web site [will open in new window]" target="_blank">Visit %s Site</a><br /><a href="'.home_url().'/about/university-administration/%s" title="View %s leadership">View %s Leadership</a></p></div><div><div style="background-image: url(%s);"></div></div></article>';

			$department = sprintf(
				$guide
				,$manager[0]->post_title
				,$managerFields['title']
				,$managerFields['description']
				,$d['phone']
				,$d['phone']
				,$d['link']
				,strtolower($d['department'])
				,$d['department']
				,str_replace(" ","-",strtolower($d['department']))
				,strtolower($d['department'])
				,$d['department']
				,$managerFields['headshot']['url']
			);

			$departments .= $department;

		}

	}else{	// this is for a specific department

		$args = array(
			 "post_type" => "administration"
			 , "s" => str_replace("-"," ",$filter)
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
				,array("key"=>"department","value"=>str_replace("-"," ",$filter),"compare"=>"LIKE")
				,array("key"=>"department_head","value"=>"1","compare"=>"=")
			)
		);
		$manager = query_posts($args);
		$managerFields = get_fields($manager[0]->ID);

		// print_r($dept);
		// print_r($deptFields);
		// print_r($manager);
		// print_r($managerFields);

		$guide = '<article><div><p>%s</p><p><a href="tel:%s" title="">%s</a><br /><a href="%s" title="View %s web site [will open in new window]" target="_blank">Visit %s Site</a></p></div><div><div style="background-image: url(%s);"></div><p><span>%s</span><br />%s</p></div></article>';

		$department = sprintf(
			$guide
			,$deptFields['description']
			,$deptFields['phone']
			,$deptFields['phone']
			,$deptFields['url']
			,strtolower($dept[0]->post_title)
			,$dept[0]->post_title
			,$managerFields['headshot']['url']
			,$manager[0]->post_title
			,$managerFields['title']
		);

		$departments .= $department;


		// now we can gather up the members of the department ordered by sub-type
		$args = array(
			 "post_type" => "administration"
			,"posts_per_page" => -1
			// ,'orderby'=> 'title'
			// ,'order' => 'ASC'
			,'meta_query' => array(
				 'relation' => 'AND'
				,'type_clause' => array("key"=>"type","value"=>"individual","compare"=>"=")
				,'sub-type_clause' => array("key"=>"sub_type","compare"=>"EXISTS")
				,'dept_clause' => array("key"=>"department","value"=>str_replace("-"," ",$filter),"compare"=>"LIKE")
			),
			'orderby' => array(
        'sub-type_clause' => 'ASC',
    	)
		);

		$res = query_posts($args);

		// print_r($res);

		$subType = get_fields($res[0]->ID)['sub_type'];

		$departments .= '<div><h3>'.$subType.'</h3><ul>';

		$guide = '';

		foreach($res as $r){
			// print_r($r);
			$fields = get_fields($r->ID);
			// print_r($fields);



		}

		$departments .= "</ul></div>";


	}

	echo $departments;

?>
