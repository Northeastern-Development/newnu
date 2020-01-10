<?php

	// this is for the new hero v2 design with the inset content

	$heroFields = get_fields((isset($forcePageID) && $forcePageID != ''?$forcePageID:get_the_ID()));

	if($heroFields['use_hero'] == 1){
			echo '<section class="herov3"><div class="bgimage" style="background-image: url('.$heroFields['hero_background']['url'].');"></div><div class="copy"><h2>'.$heroFields['title'].'</h2></div><div class="overlap">'.$pageFields['introduction_description'].'</div></section>';
	}

?>
