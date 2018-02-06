<?php

	$args = array(
		 "post_type" => "supernav"
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"status","value"=>"1","compare"=>"=")
			,array("key"=>"category","value"=>'Main Category',"compare"=>"=")
		)
	);

	$res = query_posts($args);

	$navConfig = array();
	foreach($res as $r){
		$fields = get_fields($r->ID);
		if($fields['sub-type'] == 'Primary'){
			$navConfig[0][] = $r->post_title;
		}else{
			$navConfig[1][] = $r->post_title;
		}
	}

	$return = array();	// we are returning content as two pieces to represent the two priority levels in the main nav
	$i = 0;

	foreach($navConfig as $nC){

		foreach($nC as $o){

			$args = array(
				 "post_type" => "supernav"
				,'meta_query' => array(
					 'relation' => 'AND'
					,array("key"=>"status","value"=>"1","compare"=>"=")
					,array("key"=>"category","value"=>trim($o),"compare"=>"=")
				)
			);

			$res = query_posts($args);

			if(count($res) >= 1){

				$return[$i] .= '<li>'.$o.'<ul>';
				foreach($res as $r){

					$fields = get_fields($r->ID);

					$return[$i] .= '<li><a href="'.$fields['link_target_url'].'" title="'.$r->post_title.''.($fields['open_in_new'] == "1"?' [will open in new window]':'').'"'.($fields['open_in_new'] == "1"?' target="_blank"':'').'>'.$r->post_title.'</a></li>';
				}
				$return[$i] .= '</ul></li>';
			}
		}
		$i++;
	}

	echo '<ul>'.$return[0].'</ul><ul>'.$return[1].'</ul>';

?>
