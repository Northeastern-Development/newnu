<?php

	/* Template Name: Homepage */




	get_header();

?>

	<div id="nu__homepage" role="main" aria-label="content" class="main smooth">

		<div id="nu__seo-content"><h1><?=get_the_content()?></h1></div>

		<div id="nu__stories">

			<div id="prev" title="Click here to go to the previous slide">&#xE5C4;</div>
		  <div id="next" title="Click here to go to the next slide">&#xE5C8;</div>

			<?php get_template_part('loops/loop-homepagestories'); ?>

		</div>

	</div>

<?php get_footer(); ?>
