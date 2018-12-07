<?php

	// this will grab the select options for departments in the CMS to be used as filters on screen

	$field_key = "field_5a5e2ca106a03";
	$field = get_field_object($field_key);

	$return = '';

	if($field){
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
				$return .= '<li><a '.($filter == strtolower(str_replace(" ","-",$v))?'class="active"':'').' href="'.home_url().'/about/university-administration/'.strtolower(str_replace(" ","-",$v)).'" title="Filter to show '.strtolower($v).' team">'.$v.' <span>&#xE313;</span></a></li>';
			}
		}
	}

	echo $return;

?>
