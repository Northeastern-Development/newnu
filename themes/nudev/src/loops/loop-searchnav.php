<?php

	// function hex2rgbSearch( $colour ) {
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
			,array("key"=>"menu","value"=>"Search","compare"=>"=")
		)
	);
	$res = query_posts($args);
	$styles = get_fields($res[0]->ID);

	if($styles['background_image'] != ''){	// this will set a background image
		$style = 'background-color: none; background: url('.$styles['background_image']['url'].'); background-repeat: no-repeat; background-position: center; background-size: cover;';
	}else{	// this will set a background color with opacity
		// $style = 'background: rgba('.hex2rgbSearch($styles['background_color']).','.($styles['opacity'] != ''?$styles['opacity']:'0.8').')';
		$style = 'background: rgba(0,0,0,0.8)';
	}

	// get the list of popular search terms
	$popular = '';
	foreach($styles['popular_searches'] as $pS){
		$popular .= '<li><a href="/search/?query='.strtolower(str_replace(' ','+',trim($pS['term']))).'" title="Click here to run a search for '.strtolower($pS['term']).'" aria-label="Click here to run a search for '.strtolower($pS['term']).'">'.$pS['term'].'</a></li>';
	}

?>

<div id="nu__searchbar" style="<?=$style?>"><section><form name="nu__searchbar-form" id="nu__searchbar-form" action="/search" method="get"><div><button type="submit" title="Click here or press enter to perform search" aria-label="Click here or press enter to perform search">&#xE8B6;</button><input type="text" name="query" id="superquery" title="Enter your search query here and press enter" aria-label="Enter your search query here and press enter" /><label for="superquery" class="label">Search</label><button class="reset hidden" type="reset" title="Click here to clear current search" aria-label="Click here to clear current search">&#xE5C9;</button></div><p>Commonly searched items</p><ul><?=$popular?></ul></form></section></div>
