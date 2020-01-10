<?php

// if(!empty($returnType)){
// 	echo 'RETURN TYPE: '.$returnType;
// }

	// grab the menu styles from the CMS
	$args = array(
		 "post_type" => "menustyles"
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"menu","value"=>"Main Menu","compare"=>"=")
		)
	);
	$res = query_posts($args);
	$styles = get_fields($res[0]->ID);

	if($styles['background_image'] != ''){	// this will set a background image
		$style = 'background-color: none; background: url('.$styles['background_image']['url'].'); background-repeat: no-repeat; background-position: center; background-size: cover;';
	}else{	// this will set a background color with opacity
		$style = 'background: rgba(0,0,0,0.8)';
	}

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
		// $navConfig[] = array($r->post_title,$fields['hide_until_mobile']);
		$navConfig[] = array($r->post_title,(isset($fields['hide_until_mobile'])?$fields['hide_until_mobile']:false));
	}

	$return = '';
	$jj = 0;

	foreach($navConfig as $o){

		$args = array(
			 "post_type" => "supernav"
			,"posts_per_page" => -1
			,'meta_query' => array(
				 'relation' => 'AND'
				,array("key"=>"status","value"=>"1","compare"=>"=")
				,array("key"=>"category","value"=>trim($o[0]),"compare"=>"=")
			)
		);

		$res = query_posts($args);

		if(count($res) >= 1){

			// this builds the top level li items that we will nest into
			// $return .= '<li title="view '.$o[0].'" aria-label="view '.$o[0].'" class="'.($jj == 0?'active':'').($o[1] == 1?' hideuntilmobile':'').'" tabindex="-1">'.$o[0].'<ul role="menu" aria-hidden="true"><li tabindex="-1" class="sectiontitle">'.$o[0].'</li>';

			// $return .= '<li title="view '.$o[0].'" aria-label="view '.$o[0].'" class="'.($jj == 0?'active':'').($o[1] == 1?' hideuntilmobile':'').'">'.$o[0].($jj > 0?'<a href="javascript:void(0);" class="blur blurprevcat">blur from cat '.$jj.'</a>':'<a href="javascript:void(0);" class="blur blurfirstcat blurclosepanel">blur top to close menu panel</a>').'<!-- start category --><ul role="menu" aria-hidden="false"><li tabindex="-1" class="sectiontitle">'.$o[0].'</li>';
			$return .= '<li title="view '.$o[0].'" aria-label="view '.$o[0].'" class="'.($jj == 0?'active':'').($o[1] == 1?' hideuntilmobile':'').'">'.$o[0].($jj > 0?'<a href="javascript:void(0);" class="blur blurprevcat">blur from cat '.$jj.'</a>':'<a href="javascript:void(0);" class="blur blurfirstcat blurclosepanel">blur top to close menu panel</a>').'<!-- start category --><ul role="list" aria-hidden="false"><li tabindex="-1" class="sectiontitle">'.$o[0].'</li>';

			// $guide = '<li role="menuitem" tabindex="-1"><a href="%s" title="view %s%s" aria-label="view %s%s"%s><div>%s</div><div><span>%s</span></div></a></li>';

			// $catItem = '<li role="menuitem"><a href="%s" title="view %s%s" aria-label="view %s%s"%s%s><div>%s</div><div><span>%s</span></div></a></li>';
			$catItem = '<li role="listitem"><a href="%s" title="learn more about %s%s" aria-label="learn more about %s%s"%s%s><div>%s</div><div><span>%s</span></div></a></li>';

			$cnt = 1;

			foreach($res as $r){

				$fields = get_fields($r->ID);

				$return .= sprintf(
					$catItem
					,(isset($returnType) && $returnType === 'return' && strpos($fields['link_target_url'],'http') === false?'http://www.northeastern.edu':'').$fields['link_target_url']
					,$r->post_title
					,(!empty($fields['open_in_new']) || !empty($returnType)?' [will open in new window]':'')
					,$r->post_title
					,(!empty($fields['open_in_new']) || !empty($returnType)?' [will open in new window]':'')
					,(!empty($fields['open_in_new']) || !empty($returnType)?' target="_blank" rel="noopener noreferrer"':'')
					,($cnt == count($res) || $cnt == 1?($cnt == count($res)?' class="blurlast"':' class="blurfirst"'):' class="noblur"')
					,(isset($fields['thumbnail']) && $fields['thumbnail'] != ''?'<img src="'.$fields['thumbnail']['url'].'" alt="" />':'')
					,$r->post_title
				);
				$cnt++;
			}
			$return .= '</ul>'.($jj < (count($navConfig) - 1)?'<a href="javascript:void(1);" class="blur blurnextcat">blur to next category from '.$jj.'</a>':'<a href="javascript:void(1);" class="blur blurtofeatured">blur to featured items</a>').'<!-- end category --></li>';

		}
		$jj++;
	}

	// $return .= '<!-- start featured --><a href="javascript:void(0);" class="blur blurfromfeatured"></a>';

	$return .= '<!-- start featured --><a href="javascript:void(0);" class="blur blurfromfeatured">blur from featured items</a>';

	// grab the featured items from the menu CMS and show them below
	$args = array(
		 "post_type" => "supernav"
		,'meta_query' => array(
			 'relation' => 'AND'
			,array("key"=>"status","value"=>"1","compare"=>"=")
			,array("key"=>"category","value"=>'Featured',"compare"=>"=")
		)
	);

	$res = query_posts($args);

	$guide = '<li class="featured%s%s%s"><a href="%s" title="%s%s" aria-label="%s%s"%s><div><img src="%s" alt="" /></div><div>%s</div></a></li>';

	$iii = 0;
	foreach($res as $r){

		$fields = get_fields($r->ID);

		$return .= sprintf(
			$guide
			,($iii === 0?' first':'')
			,(strtolower($r->post_title) == "make a gift"?' makeagift':'')
			,(isset($fields['hide_until_mobile']) && $fields['hide_until_mobile'] == 1?' hideuntilmobile':'')
			,$fields['link_target_url']
			,$r->post_title
			,(!empty($fields['open_in_new']) || !empty($returnType)?' [will open in new window]':'')
			,$r->post_title
			,(!empty($fields['open_in_new']) || !empty($returnType)?' [will open in new window]':'')
			,(!empty($fields['open_in_new']) || !empty($returnType)?' target="_blank" rel="noopener noreferrer"':'')
			,$fields['thumbnail']['url']
			// ,$r->post_title
			,$r->post_title
		);

		$iii++;
	}

	$return .= '<a href="javascript:void(0);" class="blur blurclosepanel">blur bottom to close menu panel</a><!-- end featured -->';

	// $supernav = '<div id="nu__supernav" class="navigational" style="'.$style.'"><section><div class="search">search will appear here</div><div class="fixedbg"><div></div><div></div></div><div class="items"><ul role="menu" aria-hidden="true"><a href="javascript:void(0);" title="Close panel" aria-label="Close panel" tabindex="1" class="js__closepanelstart">X</a>'.$return.'<a href="javascript:void(0);" title="Close panel" aria-label="Close panel" tabindex="1" class="js__closepanelend">X</a></ul></div></section></div>';

		// $supernav = '<div id="nu__supernav" class="navigational" style="'.$style.'"><section><div class="search">search will appear here</div><div class="fixedbg"><div></div><div></div></div><div class="items"><ul role="menu" aria-hidden="true">'.$return.'</ul></div></section></div>';
		$supernav = '<div id="nu__supernav" class="navigational" style="'.$style.'"><section><div class="search">search will appear here</div><div class="fixedbg"><div></div><div></div></div><div class="items"><ul role="list" aria-hidden="true">'.$return.'</ul></div></section></div>';

	if(!empty($returnType)){	// this will return the results for remote calls
		return $supernav;
	}else{ // this will echo the results for local site use
		echo $supernav;
	}

?>
