<?php

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
		$style = 'background: rgba('.hex2rgb($styles['background_color']).','.($styles['opacity'] != ''?$styles['opacity']:'0.8').')';
	}

?>

<div id="nu__searchbar" style="<?=$style?>"><form name="nu__searchbar-form" id="nu__searchbar-form" action="/search" method="get"><input type="text" name="query" id="query" placeholder="Enter search query" title="Enter your search query here" /><button type="submit" title="Click here or press enter to perform search">&#xE8B6;</button><br />We can add in some more information here if we want to.</form></div>
