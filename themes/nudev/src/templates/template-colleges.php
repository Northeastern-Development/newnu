<?php

	/* Template Name: Colleges & Schools */

	get_header();

?>

	<div class="main" role="main" aria-label="content">

		<?php include(locate_template('includes/pagehero.php')); ?>

		<?php get_template_part('loops/loop-collegespage'); ?>

	</div>

<?php get_footer(); ?>
