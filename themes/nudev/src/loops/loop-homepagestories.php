<?php

	$args = array(
		'category'       => 'homepage-story',
		'meta_query' => array(
			'relation' => 'AND',
			'type_clause' => array('key' => 'type','compare' => 'EXISTS')
		)
		,
		'orderby' => array(
			'type_clause' => 'ASC'
		)
	);

	$res = query_posts($args);

	$content = "";

	$i = 1;

	while (have_posts()) : the_post();

		$fields = get_fields(get_the_ID());

		if($i <= 3){	// this is for cxo
			if($i == 1){
				$content .= '<li id="story-1"><h4>CxO Magazine</h4>';
			}

			$guide = '<a id="story-1-'.$i.'" href="//northeastern.edu" title="%s" target="_blank">
				<img src="%s" alt="article image" />
				<h5>%s</h5>
				<p>%s</p>
			</a>';

			$content .= sprintf(
				 $guide
				,$fields['title']
				,$fields['image']['url']
				,$fields['title']
				,$fields['short_description']
			);

			if($i == 3){
				$content .= '</li>';
			}
		}else if($i > 3){	// this is for news
			if($i == 4){
				$content .= '<li id="story-2"><h4>News @ Northeastern</h4>';
			}

			$guide = '<a id="story-2-'.($i - 3).'" href="//northeastern.edu" title="%s" target="_blank">
				<img src="%s" alt="article image" />
				<h5>%s</h5>
				<p>%s</p>
			</a>';

			$content .= sprintf(
				 $guide
				,$fields['title']
				,$fields['image']['url']
				,$fields['title']
				,$fields['short_description']
			);

			$content .= sprintf(
				$guide
			);

			if($i == 6){
				$content .= '</li>';
			}
		}

		$i++;

	endwhile;

	echo '<ul>'.$content.'<li><ul class="js__rotate-homepage"><li><span>&nbsp;</span></li><li><div data-id="1" data-sid="1" title="Click to view" class="active">1</div></li><li><div data-id="1" data-sid="2" title="Click to view">2</div></li><li><div data-id="1" data-sid="3" title="Click to view">3</div></li><li><span>&nbsp;</span></li></ul></li><li><ul class="js__rotate-homepage"><li><span>&nbsp;</span></li><li><div data-id="2" data-sid="1" title="Click to view" class="active">1</div></li><li><div data-id="2" data-sid="2" title="Click to view">2</div></li><li><div data-id="2" data-sid="3" title="Click to view">3</div></li><li><span>&nbsp;</span></li></ul></li></ul>';

?>
