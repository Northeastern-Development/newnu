<?php

	/* Template Name: Institutes */

	get_header();

	// let's get the brand/closer title and statement
	$pageFields = get_fields();

?>

	<div class="main" role="main" aria-label="content">

		<?php include(locate_template('includes/pagehero-v2.php')); ?>

		<section class="grid">

			<ul>
				<?php get_template_part('loops/loop-institutes'); ?>
			</ul>

		</section>

	</div>

<?php get_footer(); ?>
