<?php

	wp_reset_query();

	$takeoverFields = get_fields(get_the_ID())['takeover'][0];

	$takeover = '';

	if($takeoverFields['status'] == 1){
		$guide = '<div class="takeover"><a href="javascript:void(0);" title="Click to close announcement" aria-label="Click to close announcement" class="nu__close-takeover">X</a><div><p>Copy and imagery can appear here!</p></div></div>';

		$takeover .= sprintf(
			$guide
		);
	}

	echo $takeover;

?>
