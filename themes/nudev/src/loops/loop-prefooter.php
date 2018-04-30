<?php

	$res = get_fields(784);

	$related = '';

	$guide = '<li><a href="%s" title="%s"%s><div class="image"><div style="background-image: url(%s);"></div></div><h4>%s</h4><p>%s</p></a></li>';

	foreach($res['pre-footer_image_block'] as $r){

		$fields = get_fields($r['items'][0]['item']->ID);

		$related .= sprintf(
			$guide
			,$fields['link']
			,$r['block_title'].(isset($fields['external_link']) && $fields['external_link'] == "1"?' [will open in new window]':'')
			,(isset($fields['external_link']) && $fields['external_link'] == "1"?' target="_blank"':'')
			,$fields['image']['url']
			,$r['block_title']
			,$fields['description']
		);
	}

	echo '<div class="nu__prefooter"><h3>Related Resources</h3><div><ul>'.$related.'</ul></div></div>';

?>
