<?php

	/* Template Name: Colleges & Schools */

	get_header();

?>

	<div class="main" role="main" aria-label="content">

		<?php include(locate_template('includes/pagehero.php')); ?>

		<?php get_template_part('loops/loop-collegespage'); ?>

		<section class="nu__bythenumbers">
			<h2>Northeastern by the numbers</h2>
			<ul>
				<li>
					<span>90+</span>
					<p>Majors and concentrations offered</p>
				</li>
				<li>
					<span>1465</span>
					<p>Mean two-part SAT score for fall 2017 freshmen</p>
				</li>
				<li>
					<span>136</span>
					<p>Number of countries where we placed students in experiential learning opportunities (2016 - 2017)</p>
				</li>
			</ul>
		</section>

	</div>

<?php get_footer(); ?>
