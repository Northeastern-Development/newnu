<?php

	/* Template Name: Search */

	get_header();

	// grab the menu styles from the CMS as this page needs to match the style of the search navigation
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

	<main id="nu__search" role="main" aria-label="content" class="smooth">

		<div style="<?=$style?>"></div>

		<section>
			<form name="nu__searchbar-form" id="nu__searchbar-form" action="/search" method="get"><input type="text" name="query" id="query" placeholder="| Search" title="Enter your search query here" value="<?=$_GET['query']?>" /><button type="submit" title="Click here or press enter to perform search">&#xE8B6;</button></form>
			<?php
				if(!isset($_GET['query']) || $_GET['query'] == ''){
					echo 'Opps, it doesn\'t looks like you searched for anything. show the same featured search items here.';
				}else{
					echo '<gcse:searchresults-only></gcse:searchresults-only>';
				}
			?>
		</section>

	</main>
<?php get_footer(); ?>
