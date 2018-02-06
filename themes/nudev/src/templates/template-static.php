<?php

	/* Template Name: Static */

	get_header();

?>

	<main id="static" role="main" aria-label="content">

	<?php
		the_content();	// this will show the formatted content coming from the CMS
  ?>

	</main>

<?php get_footer(); ?>
