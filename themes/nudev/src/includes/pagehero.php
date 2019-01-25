<?php

	$heroFields = get_fields((isset($forcePageID) && $forcePageID != ''?$forcePageID:get_the_ID()));

	$heroReturn = '';

	if($heroFields['use_hero'] == 1){
		if(isset($heroFields['hero_background']) && $heroFields['hero_background'] != ''){	// this header area has a bg image
			$heroReturn .= '<section class="hero withbg" style="background-image: url('.$heroFields['hero_background']['url'].');"><div><h2>'.$heroFields['title'].'</h2>'.(isset($heroFields['description']) && $heroFields['description'] != ''?'<h3>'.$heroFields['description'].'</h3>':'').'</h3></div></section>';
		}else{ // this is for the text only version of the header area
			$heroReturn .= '<section class="hero"><div><h2>'.$heroFields['title'].'</h2>'.(isset($heroFields['description']) && $heroFields['description'] != ''?'<h3>'.$heroFields['description'].'</h3>':'').'</div></section>';
		}
	}

	echo $heroReturn;

?>
