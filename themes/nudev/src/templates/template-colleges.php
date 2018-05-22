<?php

	/* Template Name: Colleges & Schools */

	get_header();

?>

	<div class="main" role="main" aria-label="content">

		<section class="hero">
			<div>
				<h2>Colleges and Schools</h2>
				<h3>The nine colleges and schools offer degrees from the bachelor’s through the doctorate in a wide variety of fields and professional areas. All with Northeastern’s hallmark cross-disciplinary approach.</h3>
			</div>
		</section>

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
