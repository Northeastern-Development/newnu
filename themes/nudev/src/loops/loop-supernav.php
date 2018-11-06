<?php




	// function hex2rgb( $colour ) {
	// 	if ( $colour[0] == '#' ) {
	// 		$colour = substr( $colour, 1 );
	// 	}
	// 	if ( strlen( $colour ) == 6 ) {
	// 		list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
	// 	} elseif ( strlen( $colour ) == 3 ) {
	// 		list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
	// 	} else {
	// 		return false;
	// 	}
	// 	$r = hexdec( $r );
	// 	$g = hexdec( $g );
	// 	$b = hexdec( $b );
	// 	return $r.','.$g.','.$b;
	// }




	// grab the menu styles from the CMS
	$args = array(
		 "post_type" => "menustyles"
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"menu","value"=>"Main Menu","compare"=>"=")
		)
	);
	$res = query_posts($args);
	$styles = get_fields($res[0]->ID);

	if($styles['background_image'] != ''){	// this will set a background image
		$style = 'background-color: none; background: url('.$styles['background_image']['url'].'); background-repeat: no-repeat; background-position: center; background-size: cover;';
	}else{	// this will set a background color with opacity
		// $style = 'background: rgba('.hex2rgb($styles['background_color']).','.($styles['opacity'] != ''?$styles['opacity']:'0.8').')';
		$style = 'background: rgba(0,0,0,0.8)';
	}



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
		// if($fields['sub-type'] == 'Primary'){
			// $navConfig[0][] = $r->post_title;
		// }else{
			// $navConfig[1][] = $r->post_title;
		// }
		$navConfig[] = array($r->post_title,$fields['hide_until_mobile']);
	}

	$return = '';
	// $i = 0;
	$jj = 0;

	// print_r($navConfig);

	foreach($navConfig as $o){

		// foreach($nC as $o){

			$args = array(
				 "post_type" => "supernav"
				,"posts_per_page" => -1
				,'meta_query' => array(
					 'relation' => 'AND'
					,array("key"=>"status","value"=>"1","compare"=>"=")
					,array("key"=>"category","value"=>trim($o[0]),"compare"=>"=")
				)
			);

			$res = query_posts($args);

			if(count($res) >= 1){

				// print_r($nC);

				$return .= '<li title="View '.$o[0].'" aria-label="View '.$o[0].'" class="'.($jj==0?'active':'').($o[1] == 1?' hideuntilmobile':'').'" role="button" tabindex="-1">'.$o[0].'<ul role="menu" aria-hidden="true"><li>'.$o[0].'</li>';
				foreach($res as $r){

					$fields = get_fields($r->ID);

					$guide = '<li role="menuitem" tabindex="-1"><a href="%s" title="Learn more about %s%s" aria-label="Learn more about %s%s"%s><div>%s</div><div><span>%s</span></div></a></li>';

					$return .= sprintf(
						$guide
						,(isset($returnType) && $returnType === 'return' && strpos($fields['link_target_url'],'http') === false?'http://www.northeastern.edu':'').$fields['link_target_url']
						,$r->post_title
						,($fields['open_in_new'] == "1"?' [will open in new window]':'')
						,$r->post_title
						,($fields['open_in_new'] == "1"?' [will open in new window]':'')
						,($fields['open_in_new'] == "1"?' target="_blank"':'')
						// ,(isset($fields['thumbnail']) && $fields['thumbnail'] != ''?'<img src="'.$fields['thumbnail']['url'].'" alt="'.$r->post_title.' thumbnail" />':'')
						,(isset($fields['thumbnail']) && $fields['thumbnail'] != ''?'<img src="'.$fields['thumbnail']['url'].'" alt="thumbnail - '.$r->post_title.'" />':'')
						,$r->post_title
					);
				}
				$return .= '</ul></li>';

			}
			$jj++;
		// }
		// $i++;
	}

	// grab the featured items from the menu CMS and show them below
	$args = array(
		 "post_type" => "supernav"
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"status","value"=>"1","compare"=>"=")
			,array("key"=>"category","value"=>'Featured',"compare"=>"=")
		)
	);

	$res = query_posts($args);

	// print_r($res);

	$guide = '<li class="featured%s%s%s"><a href="%s" title="learn more about %s%s" aria-label="learn more about %s%s"%s><div><img src="%s" alt="%s icon" /></div><div>%s</div></a></li>';

	$iii = 0;
	foreach($res as $r){

		$fields = get_fields($r->ID);

		$return .= sprintf(
			$guide
			,($iii === 0?' first':'')
			,(strtolower($r->post_title) == "make a gift"?' makeagift':'')
			,($fields['hide_until_mobile'] == 1?' hideuntilmobile':'')
			,$fields['link_target_url']
			,$r->post_title
			,(isset($fields['open_in_new']) && $fields['open_in_new'] == "1"?' [will open in new window]':'')
			,$r->post_title
			,(isset($fields['open_in_new']) && $fields['open_in_new'] == "1"?' [will open in new window]':'')
			,(isset($fields['open_in_new']) && $fields['open_in_new'] == "1"?' target="_blank"':'')
			,$fields['thumbnail']['url']
			,$r->post_title
			,$r->post_title
		);

		$iii++;
	}

	$supernav = '<div id="nu__supernav" class="navigational" style="'.$style.'"><section><div class="search">search will appear here</div><div class="fixedbg"><div></div><div></div></div><div class="items"><ul role="menu" aria-hidden="true">'.$return.'</ul></div></section></div>';

	if(isset($returnType) && $returnType === 'return'){	// this will return the results for remote calls
		return $supernav;
	}else{ // this will echo the results for local site use
		echo $supernav;
	}

?>
