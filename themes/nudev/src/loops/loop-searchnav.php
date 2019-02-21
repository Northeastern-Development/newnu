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
		$style = 'background: rgba(0,0,0,0.8)';
	}

	// get the list of popular search terms
	$guide = '<li><a href="/search/?query=%s" title="search for %s" aria-label="search for %s">%s</a></li>';

	$popular = '';
	foreach($styles['popular_searches'] as $pS){
		$popular .= sprintf(
			$guide
			,strtolower(str_replace(' ','+',trim($pS['term'])))
			,strtolower($pS['term'])
			,strtolower($pS['term'])
			,trim($pS['term'])
		);
	}

?>

<!-- <div id="nu__searchbar" style="<?=$style?>"><section><a href="javascript:void(0);" title="Close panel" aria-label="Close panel" class="js__closepanelstart">X</a><form name="nu__searchbar-form" id="nu__searchbar-form" action="/search" method="get"><div><button type="submit" title="Click here or press enter to perform search" aria-label="Click here or press enter to perform search" tabindex="-1">&#xE8B6;</button><input type="text" name="query" id="superquery" title="Enter your search query here and press enter" aria-label="Enter your search query here and press enter" /><label for="superquery" class="label">Search</label><button class="reset hidden" type="reset" title="Click here to clear current search" aria-label="Click here to clear current search" tabindex="-1">&#xE5C9;</button></div><p>Commonly searched items</p><ul><?=$popular?></ul></form><a href="javascript:void(0);" title="Close panel" aria-label="Close panel" class="js__closepanelend">X</a></section></div> -->

<div id="nu__searchbar" style="<?=$style?>"><section><a href="javascript:void(0);" class="blur blurclosepanel"></a><form name="nu__searchbar-form" id="nu__searchbar-form" action="/search" method="get"><div><button type="submit" title="Click here or press enter to perform search" aria-label="Click here or press enter to perform search" tabindex="-1">&#xE8B6;</button><input type="text" name="query" id="superquery" title="Enter your search query here and press enter" aria-label="Enter your search query here and press enter" /><label for="superquery" class="label">Search</label><button class="reset hidden" type="reset" title="Click here to clear current search" aria-label="Click here to clear current search" tabindex="-1">&#xE5C9;</button></div><p>Commonly searched items</p><ul><?=$popular?></ul></form><a href="javascript:void(0);" class="blur blurclosepanel"></a></section></div>
