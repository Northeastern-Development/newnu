<?php

	$heroPageId = (isset($forcePageID) && $forcePageID != ''?$forcePageID:get_the_ID());

	$heroFields = get_fields($heroPageId);

	$heroReturn = '';

	if($heroFields['use_hero'] == 1){
		$heroReturn .= '<section class="hero"><div><h2>'.$heroFields['title'].'</h2><h3>'.$heroFields['description'].'</h3></div></section>';
	}

	echo $heroReturn;

?>
