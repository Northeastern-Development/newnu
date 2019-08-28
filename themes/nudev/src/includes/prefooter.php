<?php

	wp_reset_query();

	$prefooterFields = get_fields((isset($forcePageID) && $forcePageID != ''?$forcePageID:get_the_ID()));

	$return_prefooter = '';


	if($prefooterFields['use_pre-footer'] == 1){	// if the page is using the pre-footer option

		$prefooterBgColor = ($prefooterFields['background_color'] == ''?' bg_white':' bg_'.$prefooterFields['background_color']);

		if(isset($prefooterFields['pre-footer_image_block']) && $prefooterFields['pre-footer_image_block'] != ''){		// image blocks: image, title, description

			$iPath = responsive_background_images('medium_large');

			$return_prefooter .= '<div class="nu__prefooter imageblocks'.$prefooterBgColor.'"><p>'.$prefooterFields['pre-footer_area_title'].'</p><div><ul>';

			$guide = '<li><a href="%s" title="%s" aria-label="%s"%s><div class="image"><div aria-label="background image" style="background-image: url(%s);"></div></div><h3>%s</h3><p>%s</p><p class="readmore"><span>More About %s</span></p></a></li>';

			// we should wrap this in a catch to make sure that we have records to loop over

			if(!empty($prefooterFields['pre-footer_image_block'])){
				foreach($prefooterFields['pre-footer_image_block'] as $r){

					$fields = get_fields($r['items'][0]['item']->ID);

					// we should swap the count check to an empty() call

					// if(count($iPath) > 2){	// if we have a double nested image path
					if(!empty($iPath) && count($iPath) > 2){
						$thisImage = $fields['image'][$iPath[1]][$iPath[2]];
					}else{	// single nested image path
						$thisImage = $fields['image']['url'];
					}

					$return_prefooter .= sprintf(
						$guide
						,$fields['link']
						,strtolower($r['block_title']).(isset($fields['external_link']) && $fields['external_link'] == "1"?' [will open in new window]':'')
						,strtolower($r['block_title']).(isset($fields['external_link']) && $fields['external_link'] == "1"?' [will open in new window]':'')
						,(isset($fields['external_link']) && $fields['external_link'] == "1"?' target="_blank"':'')
						,$thisImage
						,$r['block_title']
						,$fields['description']
						,$r['block_title']
					);
				}
			}

			$return_prefooter .= '</ul></div></div>';

		}	// end image block
		else if(isset($prefooterFields['pre-footer_stat_block']) && $prefooterFields['pre-footer_stat_block'] != ''){	// stat blocks: stat, description

			$return_prefooter .= '<div class="nu__prefooter statblocks"><p>'.$prefooterFields['pre-footer_area_title'].'</p><div><ul>';

			$guide = '<li><span>%s</span><p>%s</p></li>';

			foreach($prefooterFields['pre-footer_stat_block'] as $r){

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
