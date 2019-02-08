<?php

	/* Template Name: Institutes */

	get_header();

?>

	<div class="main" role="main" aria-label="content">

		<?php include(locate_template('includes/pagehero.php')); ?>

		<section class="brandstatement">
			<h2>Our institutes generate <span>collaborative discovery</span></h2>
			<p>Today, experience has never been more relevant, as we bring regionally-aligned graduate programs and innovation opportunities to some of the world's most thriving cities.</p>
			<!-- <a href="#contact" title="Click here to contact us" aria-label="Click here to contact us" class="button">Contact Us</a> -->
		</section>

		<section class="grid">

			<ul>
				<?php get_template_part('loops/loop-institutes'); ?>
			</ul>

		</section>

		<!-- <section id="contactform" class="contactform">

		</section> -->

	</div>

<?php get_footer(); ?>
