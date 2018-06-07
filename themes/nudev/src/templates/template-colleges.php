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
					<span>9</span>
					<p>Colleges and schools at Northeastern's Boston Campus</p>
				</li>
				<li>
					<span>157</span>
					<p>Undergraduate and graduate areas of study in emerging fields added since 2006</p>
				</li>
				<li>
					<span>610</span>
					<p>Tenured and tenure-track faculty hires since 2006, 47 for fall 2017</p>
				</li>
			</ul>
		</section>

	</div>

<?php get_footer(); ?>
