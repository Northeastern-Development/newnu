<?php

	// grab the details for the president
	$args = array(
		 "post_type" => "administration"
		,"posts_per_page" => 1
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"department","value"=>"President","compare"=>"LIKE")
		)
	);
	$res = query_posts($args);

	$fields = get_fields($res[0]->ID);

	// $srcSet = ar_responsive_image(get_field('headshot',$res[0]->ID)['id'],'medium','640px');

	$guide = '<section class="nu__president"><div><h3>Office of the president</h3><p>%s</p><p><a href="%s" title="President [will open in new window]" target="_blank">web site</a><br /><a href="tel:111.111.1111" title="Call the Office of the President">111.111.1111</a></p></div><div style="background-image: url(%s);"><p>%s<br />President</p></div></section>';
	$president = sprintf(
		$guide
		,$fields['description']
		,$fields['url']
		,$fields['headshot']['url']
		,$res[0]->post_title
	);

	echo $president;

?>
