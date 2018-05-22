<?php

	/* Template Name: Departments & Programs */

	get_header();

?>

	<div class="main" role="main" aria-label="content">

		<section class="hero">
			<div>
				<h2>Departments and Programs</h2>
				<h3>With programs offering more than 90 majors and concentrations aligned with 21st-century needs, Northeastern undergraduate and graduate students are able to design an education that positions them for a lifetime of career success and fulfillment.</h3>
			</div>
		</section>

		<section class="nu__departmentlist">
			<div>
				<?php get_template_part('loops/loop-departmentspage'); ?>
			</div>
		</section>

	</div>

<?php get_footer(); ?>
