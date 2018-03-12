<?php

	/* Template Name: Homepage */

	get_header();

?>

	<main id="nu__homepage" role="main" aria-label="content" class="smooth">

		<div id="nu__stories">

			<div id="prev" title="Click here to go to the previous slide">&#xE5C4;</div>
		  <div id="next" title="Click here to go to the next slide">&#xE5C8;</div>

			<?php get_template_part('loops/loop-homepagestories'); ?>

		</div>

	</main>

<?php get_footer(); ?>
