<?php

	// grab the details for the president
	$args = array(
		 "post_type" => "administration"
		,"posts_per_page" => 1
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"department","value"=>"president","compare"=>"LIKE")
		)
	);
	$res = query_posts($args);

	// print_r($res);
	// die();

	$fields = get_fields($res[0]->ID);

	// $guide = '<section class="nu__president"><div style="background-image: url(%s);"><div></div><p><span>%s</span><br />President</p></div><div><h3>Office of the President</h3><p>%s<p>[<a class="readmore" href="http://www.northeastern.edu/president/biography/" title="Read more about %s [will open in new window]" aria-label="Read more about %s [will open in new window]" target="_blank" rel="noopener noreferrer">Learn More About %s</a>]</p><p><a href="tel:%s" title="Call the Office of the President" aria-label="Call the Office of the President"><span>&#xE0B0;</span> %s</a><br /><a href="%s" title="Visit website [will open in new window]" aria-label="Visit website [will open in new window]" target="_blank" rel="noopener noreferrer"><span>&#xE5C8;</span> Visit website</a></p></div></section>';
	//
	// $president = sprintf(
	// 	$guide
	// 	,$fields['headshot']['sizes']['large']
	// 	,$res[0]->post_title
	// 	,$fields['description']
	// 	,$res[0]->post_title
	// 	,$res[0]->post_title
	// 	,$res[0]->post_title
	// 	,$fields['phone']
	// 	,$fields['phone']
	// 	,$fields['url']
	// );

	// echo $president;

?>


<section class="nu__orgchart-pres <?=empty($filter)?' bgcolor':''?>">

	<?php if(empty($filter)){ ?>
		<!-- <h3>Leadership Team</h3> -->
	<div class="presorg">
		<div>
			<a href="<?=$fields['url']?>" title="Read more about <?=strtolower($res[0]->post_title)?> [will open in new window]" aria-label="Read more about <?=strtolower($res[0]->post_title)?> [will open in new window]" target="_blank" rel="noopener noreferrer">
				<div class="orgheadshot">

					<?php
						$image = (!empty($fields['thumbnail'])?$fields['thumbnail']['url']:$fields['headshot']['sizes']['small']);
					?>

					<div class="image" style="background-image: url(<?=$image?>);"></div>
				</div>
				<div class="orgdetails">
					<div>
						<p><?=$res[0]->post_title?></p>
						<p>President</p>
					</div>
				</div>
			</a>
		</div>
	</div>
<?php }else{ ?>
	<ul>
		<li><a href="/about/university-administration" title="Click to go back to org chart" aria-label="Click to go back to org chart"><span>Back to org chart<span></a></li>
	</ul>
<?php } ?>
</section>


<?php

	unset($fields,$guide,$res,$president,$image);

?>
