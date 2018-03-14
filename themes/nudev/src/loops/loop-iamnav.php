<?php

	// grab the menu styles from the CMS
	$args = array(
		 "post_type" => "menustyles"
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"menu","value"=>"IAm Menu","compare"=>"=")
		)
	);
	$res = query_posts($args);
	$styles = get_fields($res[0]->ID);



	if($styles['background_image'] != ''){	// this will set a background image
		$style = 'background-color: none; background: url('.$styles['background_image']['url'].'); background-repeat: no-repeat; background-position: center; background-size: cover;';
	}else{	// this will set a background color with opacity
		$style = 'background: rgba('.hex2rgb($styles['background_color']).','.($styles['opacity'] != ''?$styles['opacity']:'0.8').')';
	}

	$args = array(
		 "post_type" => "supernav"
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"status","value"=>"1","compare"=>"=")
			,array("key"=>"category","value"=>'Audience',"compare"=>"=")
			,array("key"=>"sub-type","value"=>'',"compare"=>"=")
		)
	);

	$res = query_posts($args);

	// need to build the array of background images for each main category (if they exist, if not use the one from the styles)
	// $bgImages = array();

	$navConfig = array();
	foreach($res as $r){
		$fields = get_fields($r->ID);
		//print_r($fields);
		// $bgImages[strtolower($r->post_title)] = (isset($fields['background_image']) && $fields['background_image'] != ''?$fields['background_image']['url']:'');
		if($fields['sub-type'] == 'Primary'){
			$navConfig[0][] = $r->post_title;
		}else{
			$navConfig[1][] = $r->post_title;
		}
	}

	// print_r($bgImages);
	// echo $bgImages['current students'];
	// die();

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
					,array("key"=>"category","value"=>'Audience',"compare"=>"=")
					,array("key"=>"sub-type","value"=>trim($o),"compare"=>"=")
				)
			);

			$res = query_posts($args);

			if(count($res) >= 1){

				$return .= '<li title="'.$o.'"'.($jj==0?' class="active"':'').'>'.$o.'<ul><li>'.$o.'</li>';
				foreach($res as $r){

					$fields = get_fields($r->ID);

					$guide = '<li><a href="%s" title="%s%s"%s><div>%s</div><div>%s</div></a></li>';

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

<div id="nu__iamnav" class="navigational" style="<?=$style?>"><section><div class="fixedbg"><div></div><div></div></div><div class="items"><ul><?=$return?></ul></div></section></div>
