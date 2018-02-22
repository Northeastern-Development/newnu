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

	$return = '';
	$i = 0;
	$jj = 0;

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

				$return .= '<li title="'.$o.'"'.($jj==0?' class="active"':'').'>'.$o.'<ul><li>'.$o.'</li>';
				foreach($res as $r){

					$fields = get_fields($r->ID);

					$guide = '<li><a href="%s" title="%s%s"%s>%s%s</a></li>';

					$return .= sprintf(
						$guide
						,$fields['link_target_url']
						,$r->post_title
						,($fields['open_in_new'] == "1"?' [will open in new window]':'')
						,($fields['open_in_new'] == "1"?' target="_blank"':'')
						,(isset($fields['thumbnail']) && $fields['thumbnail'] != ''?'<img src="'.$fields['thumbnail']['url'].'" alt="'.$r->post_title.' thumbnail" />':'')
						,$r->post_title
					);
				}
				$return .= '</ul></li>';

			}
			$jj++;
		}
		$i++;
	}

?>

<section>
	<form name="nu__searchbar-form" id="nu__searchbar-form" action="/search" method="get">
		<input type="text" name="query" id="query" placeholder="Enter search query" title="Enter your search query here" />
		<button type="submit" title="Click here or press enter to perform search">&#xE8B6;</button>
	</form>
	<a href="//northeastern.edu/president" title="President Aoun [will open in new window]" target="_blank"><img src="http://fpoimagery.com/?t=px&w=30&h=30&bg=0ff&fg=000000" alt="president icon" /> President Aoun</a><br />
	<a href="//my.northeastern.edu" title="MyNortheastern [will open in new window]" target="_blank"><img src="http://fpoimagery.com/?t=px&w=30&h=30&bg=0ff&fg=000000" alt="mynortheastern icon" /> MyNortheastern</a><br />
	<a href="//northeastern.edu/findfacultystaff" title="Find faculty and staff" target="_blank"><img src="http://fpoimagery.com/?t=px&w=30&h=30&bg=0ff&fg=000000" alt="find faculty and staff icon" /> Find Faculty and Staff</a><br />
	<a href="//giving.northeastern.edu" title="Make a gift" target="_blank"><img src="http://fpoimagery.com/?t=px&w=30&h=30&bg=0ff&fg=000000" alt="make a gift icon" /> Make a Gift</a><br />
</section>

<section><ul><?=$return?></ul></section>
