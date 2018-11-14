<?php









	// grab the hidden until mobile items for use in the main header until on smaller screens
	$args = array(
		 "post_type" => "supernav"
		,'meta_query' => array(
			 'relation' => 'AND'
			 ,array("key"=>"status","value"=>"1","compare"=>"=")
			,array("key"=>"hide_until_mobile","value"=>"1","compare"=>"=")
			// ,array("key"=>"category","value"=>'Main Category',"compare"=>"=")
		)
	);
	$res = query_posts($args);

	// print_r($res);

	$return = '<ul class="dropdowns" role="menubar" aria-hidden="false"><div class="sneezeguard js-dropdown-sneezeguard"></div>';

	$singleGuide = '<li role="menuitem" class="js-single"><a href="%s" title="Learn more about %s"%s aria-label="%s" tabindex="0">%s</a></li>';

	$dropdownGuide = '<li role="menuitem"><a href="%s" title="Learn more about %s"%s aria-label="%s" tabindex="-1">%s</a></li>';

	$c = 2;

	foreach($res as $r){

		// $fields = get_fields($r->ID);

		// this will get items, if they exist, to build out the dropdown menus
		$args = array(
			 "post_type" => "supernav"
			,"posts_per_page" => -1
			,'meta_query' => array(
				 'relation' => 'AND'
				,array("key"=>"status","value"=>"1","compare"=>"=")
				,array("key"=>"category","value"=>trim($r->post_title),"compare"=>"=")
			)
		);

		$items = query_posts($args);
		// print_r($items);

		if(count($items) == 0){	// this is a single item link

			$fields = get_fields($r->ID);

			$return .= sprintf(
				$singleGuide
				,$fields['link_target_url']
				,$r->post_title
				,$r->post_title
				,($fields['open_in_new'] == 1?' target="_blank"':'')
				// ,$c
				,$r->post_title
			);
		}else{	// this is for a dropdown
			// $return .= '<li title="Learn more about '.$r->post_title.'" class="js-dropdown js-dropdown-'.$r->post_name.'" aria-label="Learn more about '.$r->post_title.'" aria-hidden="true" aria-haspopup="true" role="menuitem"><a href="javascript:void();">'.$r->post_title.'</a><ul role="menu" aria-hidden="true">';
			$return .= '<li id="dropdown-'.$r->post_name.'" title="Learn more about '.$r->post_title.'" class="js-dropdown" aria-label="Learn more about '.$r->post_title.'" aria-hidden="true" aria-haspopup="true" role="menuitem"><a href="javascript:void();">'.$r->post_title.'</a><ul role="menu" aria-hidden="true">';
			// $return .= '<li><a href="" title="'.$r->post_title.'" class="js-dropdown" role="menu" aria-hidden="true" tabindex="'.$c.'">'.$r->post_title.'</a><ul>';
			// this will handle the dropdown style menu items

			foreach($items as $i){
				$fields = get_fields($i->ID);

				$return .= sprintf(
					$dropdownGuide
					,$fields['link_target_url']
					,$i->post_title
					,($fields['open_in_new'] == 1?' target="_blank"':'')
					,$i->post_title
					,$i->post_title
				);

			}

			// $return .= sprintf(
			// 	$dropdownGuide
			// 	,$fields['link_target_url']
			// 	,$r->post_title
			// 	,($fields['open_in_new'] == 1?' target="_blank"':'')
			// 	,$r->post_title
			// );

			$return .= '</ul></li>';
		}
		$c++;
	}

	$return .= '</ul>';

	echo $return;

	?>
