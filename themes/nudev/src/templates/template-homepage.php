<?php

	/* Template Name: Homepage */

	get_header();

?>

	<main id="nu__homepage" role="main" aria-label="content" class="smooth">

		<div id="nu__stories">

			<div id="prev" title="Click here to go to the previous slide">
		    <svg viewbox="0 0 100 100">
		      <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z" transform=" translate(15,0)" />
		   </svg>
		  </div>
		  <div id="next" title="Click here to go to the next slide">
		    <svg viewbox="0 0 100 100">
		      <path class="arrow" d="M 50,0 L 60,10 L 20,50 L 60,90 L 50,100 L 0,50 Z" transform="translate(85,100) rotate(180)" />
		    </svg>
		  </div>

			<?php get_template_part('loops/loop-homepagestories'); ?>

		</div>

	</main>

<?php get_footer(); ?>
