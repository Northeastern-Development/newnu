<?php

	/* Template Name: Departments & Programs */

	get_header();

?>

	<div class="main" role="main" aria-label="content">

		<?php include(locate_template('includes/pagehero.php')); ?>

		<section class="nu__departmentlist">
			<div>
				<?php get_template_part('loops/loop-departmentspage'); ?>
			</div>
		</section>

	</div>

<?php get_footer(); ?>
