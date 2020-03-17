<?php

	$thisImage = '';

	$stories = get_field('field_5a3941ccf742d');

		$guide = '<div id="article-%s" data-rotatorid="%s" data-cslide="1" data-slidemax="%s" class="nu__block-rotator"><div><a href="http://news.northeastern.edu/" title="News at northeastern" aria-label="News at northeastern" target="_blank" rel="noopener"><svg id="newslogo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 251.9 22.9"><defs><style>.cls-news-1{fill:#939598;}.cls-news-2{fill:#fff;}</style></defs><title>NewsAtNortheastern_NewsatNortheastern_GW</title><path class="cls-news-1" d="M21.14,80.66H20.07L5.22,65.74V75.5c0,3,.86,3.83,2.33,4.23v.8H1.29v-.8c1.47-.4,2.33-1.18,2.33-4.23V65.15a2,2,0,0,0-.75-1.55C1.58,62.42,1.05,62,0,61.94v-.8H4.82c.46,0,.75.08,1.47.8l13.25,13.4v-9.2c0-3-.86-3.8-2.33-4.2v-.8h6.26v.8c-1.47.4-2.33,1.17-2.33,4.2Z" transform="translate(0.02 -59.99)"/><path class="cls-news-1" d="M31.19,80.8a5.93,5.93,0,0,1-6.29-6.29A6.26,6.26,0,0,1,31.14,68a4.39,4.39,0,0,1,4.73,4.25l-7.76,2.57c.49,2.36,1.82,4.18,4.2,4.18a3.88,3.88,0,0,0,3-1.34l.7.53A5.13,5.13,0,0,1,31.19,80.8Zm-3.26-7.28,4.81-1.66c-.32-1.66-1.07-2.51-2.24-2.51-1.74,0-2.6,1.26-2.6,3.45C27.9,73.23,27.93,73.5,27.93,73.52Z" transform="translate(0.02 -59.99)"/><path class="cls-news-1" d="M46.36,73.15l-3.3,7.51H41.67l-3.53-9.6c-.51-1.44-.88-1.79-1.76-2v-.8H42.9v.8c-1.55.19-1.68.88-1.25,2.11l1.76,5.14,3.16-7.46h1.34l3.26,7.41L52.62,72c.58-1.77.29-2.65-1.26-3v-.72h5V69c-1.07.24-1.39.72-2.06,2.65l-3.15,9H49.73Z" transform="translate(0.02 -59.99)"/><path class="cls-news-1" d="M61.86,80.8A6.57,6.57,0,0,1,59,80.16l-.77.53H57.8l-1-4,.7-.27c1.58,2,2.91,3.16,4.63,3.16,1.25,0,1.9-.64,1.9-1.5,0-1.36-1.26-1.74-3.11-2.35S57.05,74.38,57.05,72s1.79-4,4.52-4a6.71,6.71,0,0,1,2.44.48l.45-.37h.43l1,3.21-.7.29c-1.39-1.58-2.54-2.38-3.88-2.38a1.46,1.46,0,0,0-1.6,1.42C59.7,72,61,72.37,62.8,73s3.88,1.33,3.88,3.74S64.49,80.8,61.86,80.8Z" transform="translate(0.02 -59.99)"/><path class="cls-news-1" d="M79.78,82.89c-6.58,0-11-4.29-11-10.46,0-6.69,5-12.44,12-12.44,6.59,0,10.17,3.53,10.17,8.72,0,5.83-3.37,8-5.64,8s-3.24-1-3.54-2.25a4.32,4.32,0,0,1-4,2.52c-2.49,0-3.91-2-3.91-4.31a7.37,7.37,0,0,1,7.52-7.3,8.15,8.15,0,0,1,2.78.51l.91-.51h.86l-1.45,8.16c-.21,1.23.16,1.82,1.55,1.82,1.72,0,3.72-2.09,3.72-6.58S86.61,61,80.77,61c-6.42,0-10.86,5.24-10.86,11.4,0,5.56,4,9.41,9.87,9.41a10.56,10.56,0,0,0,6.83-2.41l.61.75A10.87,10.87,0,0,1,79.78,82.89ZM79,75.13c1.36,0,2.38-.86,2.78-3.13l.8-4.5a3.81,3.81,0,0,0-2.33-.77c-2.3,0-3.4,3.18-3.4,5.83C76.81,74.24,77.48,75.13,79,75.13Z" transform="translate(0.02 -59.99)"/><path class="cls-news-2" d="M113.62,80.66h-1.07L97.7,65.74V75.5c0,3,.86,3.83,2.33,4.23v.8H93.77v-.8c1.47-.4,2.33-1.18,2.33-4.23V65.15a2,2,0,0,0-.75-1.55c-1.29-1.18-1.82-1.56-2.89-1.66v-.8H97.3c.45,0,.75.08,1.47.8L112,75.34v-9.2c0-3-.85-3.8-2.32-4.2v-.8H116v.8c-1.48.4-2.33,1.17-2.33,4.2Z" transform="translate(0.02 -59.99)"/><path class="cls-news-2" d="M123.8,80.8a6,6,0,0,1-6.42-6.23A6.37,6.37,0,0,1,124.07,68c4.17,0,6.45,2.84,6.45,6.23A6.4,6.4,0,0,1,123.8,80.8Zm.35-1.29c2.11,0,3.13-1.47,3.13-3.79,0-3.08-.8-6.45-3.53-6.45-2.14,0-3.13,1.47-3.13,3.82C120.62,76.17,121.4,79.51,124.15,79.51Z" transform="translate(0.02 -59.99)"/><path class="cls-news-2" d="M139.21,80.53h-7v-.8c1.5-.22,1.74-.56,1.74-2v-6.9h-1.74v-.57l3.69-2.46h1.15v2.57c.94-1.47,1.9-2.51,3.19-2.51A1.65,1.65,0,0,1,142,69.72a1.82,1.82,0,0,1-1.74,2,1.56,1.56,0,0,1-1.57-1.64,7.84,7.84,0,0,0-1.53,2.09v5.3c0,1.6.24,1.95,2,2.22Z" transform="translate(0.02 -59.99)"/><path class="cls-news-2" d="M149.32,79a4.81,4.81,0,0,0,1.87-.46l.4.8a7,7,0,0,1-4.17,1.45c-1.9,0-2.84-.91-2.84-2.6V69.75h-1.87v-.83l4.63-3h.45v2.41h3.29v1.47h-3.29v7.78C147.79,78.39,148.11,79,149.32,79Z" transform="translate(0.02 -59.99)"/><path class="cls-news-2" d="M159.08,80.53h-6.69v-.8c1.5-.22,1.74-.56,1.74-2V63.28h-1.87v-.57L156.38,60h1V70.26C158.86,69,160.44,68,162,68c2.62,0,3.48,1.47,3.48,3.53v6.21c0,1.42.24,1.76,1.74,2v.8h-6.69v-.8c1.5-.22,1.74-.56,1.74-2V71.84c0-1.15-.38-1.82-1.63-1.82s-2.06.59-3.32,1.74v6c0,1.42.21,1.76,1.74,2Z" transform="translate(0.02 -59.99)"/><path class="cls-news-2" d="M174.86,80.8a5.92,5.92,0,0,1-6.29-6.29A6.25,6.25,0,0,1,174.8,68a4.4,4.4,0,0,1,4.74,4.25l-7.76,2.57c.48,2.36,1.82,4.18,4.2,4.18a3.91,3.91,0,0,0,3-1.34l.69.53A5.12,5.12,0,0,1,174.86,80.8Zm-3.27-7.28,4.82-1.66c-.32-1.66-1.07-2.51-2.25-2.51-1.74,0-2.59,1.26-2.59,3.45C171.57,73.23,171.59,73.5,171.59,73.52Z" transform="translate(0.02 -59.99)"/><path class="cls-news-2" d="M187.77,79.35A6.52,6.52,0,0,1,184,80.8c-1.92,0-3.12-1-3.12-2.92,0-2.43,2.14-3.45,6.74-4.6V70.71c0-1-.54-1.42-1.66-1.42a4.37,4.37,0,0,0-2,.49,1.56,1.56,0,0,1,.54,1.28,1.76,1.76,0,0,1-1.79,1.85,1.4,1.4,0,0,1-1.47-1.48c0-1.65,2.4-3.42,5.69-3.42,2.92,0,3.83,1.12,3.83,3.18V78.1c0,.85.45,1,1.74.8l.24.72a5.94,5.94,0,0,1-3.1,1.07A1.67,1.67,0,0,1,187.77,79.35ZM185.58,79a3.26,3.26,0,0,0,2-.83V74.46c-3,.83-3.62,1.44-3.62,2.75S184.56,79,185.58,79Z" transform="translate(0.02 -59.99)"/><path class="cls-news-2" d="M198.68,80.8a6.54,6.54,0,0,1-2.86-.64l-.77.53h-.43l-1-4,.7-.27c1.58,2,2.91,3.16,4.62,3.16,1.26,0,1.9-.64,1.9-1.5,0-1.36-1.25-1.74-3.1-2.35s-3.85-1.31-3.85-3.72,1.79-4,4.52-4a6.62,6.62,0,0,1,2.43.48l.46-.37h.43l1,3.21-.7.29c-1.39-1.58-2.54-2.38-3.88-2.38a1.46,1.46,0,0,0-1.6,1.42c0,1.34,1.28,1.71,3.1,2.33s3.88,1.33,3.88,3.74S201.31,80.8,198.68,80.8Z" transform="translate(0.02 -59.99)"/><path class="cls-news-2" d="M211,79a4.77,4.77,0,0,0,1.87-.46l.4.8a7,7,0,0,1-4.17,1.45c-1.9,0-2.84-.91-2.84-2.6V69.75h-1.87v-.83l4.63-3h.45v2.41h3.29v1.47h-3.29v7.78C209.43,78.39,209.76,79,211,79Z" transform="translate(0.02 -59.99)"/><path class="cls-news-2" d="M220.45,80.8a5.92,5.92,0,0,1-6.28-6.29A6.25,6.25,0,0,1,220.4,68a4.4,4.4,0,0,1,4.74,4.25l-7.76,2.57c.48,2.36,1.82,4.18,4.2,4.18a3.91,3.91,0,0,0,3-1.34l.69.53A5.12,5.12,0,0,1,220.45,80.8Zm-3.26-7.28L222,71.86c-.33-1.66-1.08-2.51-2.25-2.51-1.74,0-2.6,1.26-2.6,3.45C217.16,73.23,217.19,73.5,217.19,73.52Z" transform="translate(0.02 -59.99)"/><path class="cls-news-2" d="M233.53,80.53h-6.95v-.8c1.49-.22,1.73-.56,1.73-2v-6.9h-1.73v-.57l3.69-2.46h1.15v2.57c.93-1.47,1.9-2.51,3.18-2.51a1.65,1.65,0,0,1,1.77,1.84,1.83,1.83,0,0,1-1.74,2,1.57,1.57,0,0,1-1.58-1.64,7.84,7.84,0,0,0-1.53,2.09v5.3c0,1.6.25,1.95,2,2.22Z" transform="translate(0.02 -59.99)"/><path class="cls-news-2" d="M243.72,80.53H237v-.8c1.5-.22,1.74-.56,1.74-2v-6.9H237v-.57l3.69-2.46h1.21v2.46C243.48,69,245.06,68,246.66,68c2.6,0,3.48,1.47,3.48,3.53v6.21c0,1.42.24,1.76,1.74,2v.8h-6.69v-.8c1.5-.22,1.74-.56,1.74-2V71.84c0-1.15-.35-1.82-1.66-1.82A5.47,5.47,0,0,0,242,71.76v6c0,1.42.24,1.76,1.74,2Z" transform="translate(0.02 -59.99)"/></svg></a><ul role="list">%s</ul><a class="contact" href="http://news.northeastern.edu/contact/" title="Contact media relations" aria-label="Contact media relations" target="_blank" rel="noopener">Media Inquiries</a></div><div class="bgimage" style="%s" role="img" aria-label="%s"><div class="gradient"><a tabindex="-1" class="readstory" href="%s" title="%s [will open in new tab/window]" aria-label="%s [will open in new tab/window]" target="_blank" rel="noopener"><span>Read story</span></a></div>%s</div></div>';

	$thisImage = $stories[0]['block_slide'][0];

	// loop through and build the list of articles
	$slideLinks = '';
	$i = 1;

	$slideGuide = '<li%s data-id="%s" role="listitem"><a href="%s" title="%s [will open in new tab/window]" aria-label="%s [will open in new tab/window]" target="_blank" rel="noopener"><span>%s</span></a></li>';

	foreach($stories[0]['block_slide'] as $bS){	// loop through and build out each list item

		$slideLinks .= sprintf(
			$slideGuide
			,($i == 1?' class="active"':'')
			,$i
			,$bS['block_slide_link']
			,wp_strip_all_tags(strtolower($bS['block_slide_title']),true)	// this is the title
			,wp_strip_all_tags(strtolower($bS['block_slide_title']),true) // this is the aria label
			,wp_strip_all_tags($bS['block_slide_title'],true) // this is the value that the user will see on the screen
		);
		$i++;

	}

	echo sprintf(
		$guide
		,'1'
		,1
		,count($stories[0]['block_slide'])
		,$slideLinks
		,'background-image: url('.$thisImage['block_slide_image']['url'].');'
		,'image for '.strtolower($stories[0]['block_slide'][0]['block_slide_title'])
		,strtolower($stories[0]['block_slide'][0]['block_slide_link'])
		,wp_strip_all_tags(strtolower($stories[0]['block_slide'][0]['block_slide_title']),true)
		,wp_strip_all_tags(strtolower($stories[0]['block_slide'][0]['block_slide_title']),true)
		,(isset($stories[0]['block_slide'][0]['slide_tag']) && $stories[0]['block_slide'][0]['slide_tag'] != ''?'<h2>'.ucwords(trim($stories[0]['block_slide'][0]['slide_tag']).'</h2>'):'')
	);

?>
