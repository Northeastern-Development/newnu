<?php

	wp_reset_query();

	$res = get_fields(get_the_ID());

	$return_prefooter = '';


	if($res['use_pre-footer'] == "1"){	// if the page is using the pre-footer option

		if(isset($res['pre-footer_image_block']) && $res['pre-footer_image_block'] != ''){		// image blocks: image, title, description

			$return_prefooter .= '<div class="nu__prefooter imageblocks"><p>'.$res['pre-footer_area_title'].'</p><div><ul>';

			$guide = '<li><a href="%s" title="%s"%s><div class="image"><div style="background-image: url(%s);"></div></div><h4>%s<span>&#xE8E4;</span></h4><p>%s</p></a></li>';

			foreach($res['pre-footer_image_block'] as $r){

				$fields = get_fields($r['items'][0]['item']->ID);

				$return_prefooter .= sprintf(
					$guide
					,$fields['link']
					,$r['block_title'].(isset($fields['external_link']) && $fields['external_link'] == "1"?' [will open in new window]':'')
					,(isset($fields['external_link']) && $fields['external_link'] == "1"?' target="_blank"':'')
					,$fields['image']['url']
					,$r['block_title']
					,$fields['description']
				);
			}

			$return_prefooter .= '</ul></div></div>';

		}	// end image block
		else if(isset($res['pre-footer_stat_block']) && $res['pre-footer_stat_block'] != ''){	// stat blocks: stat, description

			$return_prefooter .= '<div class="nu__prefooter statblocks"><p>'.$res['pre-footer_area_title'].'</p><div><ul>';

			$guide = '<li><span>%s</span><p>%s</p></li>';

			foreach($res['pre-footer_stat_block'] as $r){

				$fields = get_fields($r['items'][0]['item']->ID);

				$return_prefooter .= sprintf(
					$guide
					,$fields['statistic']
					,$fields['description']
				);

			}

			$return_prefooter .= '</ul></div></div>';

		}	// end stat blocks

	}

	echo $return_prefooter;	// echo the compiled content back to the footer for the page that called it

?>
