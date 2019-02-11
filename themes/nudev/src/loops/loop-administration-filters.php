<?php

	// this will grab the select options for departments in the CMS to be used as filters on screen

	$field_key = "field_5a5e2ca106a03";
	$field = get_field_object($field_key);

	$return = '';



	if($field){

		$guide = '<li><a%shref="%s" title="Filter to show %s team" aria-label="Filter to show %s team">%s</a></li>';

		foreach($field['choices'] as $k => $v){

			// if there is no staff assigned to a department, do not show it in the filter options
			$args = array(
				 "post_type" => "administration"
				,"posts_per_page" => -1
				,'meta_query' => array(
					 'relation' => 'AND'
					,'type_clause' => array("key"=>"type","value"=>"individual","compare"=>"=")
					,'dept_clause' => array("key"=>"department","value"=>'"'.$v.'"',"compare"=>"LIKE")
					,array("key"=>"department_head","value"=>"0","compare"=>"LIKE")
				)
			);

			$staffCnt = count(query_posts($args));

			if($staffCnt > 0){

				$return .= sprintf(
					$guide
					,($filter == strtolower(str_replace(" ","-",$v))?' class="active" ':' ')
					,home_url().'/about/university-administration/'.strtolower(str_replace(" ","-",$v))
					,strtolower($v)
					,strtolower($v)
					,$v
				);

			}
		}
	}

	echo $return;

?>
