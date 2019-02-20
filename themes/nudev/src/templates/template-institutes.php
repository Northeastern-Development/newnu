<?php

	/* Template Name: Institutes */

	get_header();

?>

	<div class="main" role="main" aria-label="content">

		<?php include(locate_template('includes/pagehero.php')); ?>

		<section class="brandstatement">
			<h2>Our institutes generate <span>collaborative discovery</span></h2>
			<p>We build our institutes around challenges rather than academic disciplines.  This approach opens new avenues for global, multidisciplinary collaborations among industry, government, and academic researchers&mdash;the kinds of partnerships necessary to solving complex problems.</p>
			<!-- <a href="#contact" title="Click here to contact us" aria-label="Click here to contact us" class="button">Contact Us</a> -->
		</section>

		<section class="grid">

			<ul>
				<?php get_template_part('loops/loop-institutes'); ?>
			</ul>

		</section>

		<section class="closingstatement">
			<h2>&#8220;The impact of the lonely genius is disappearing.<br />You need to <span>collaborate</span> to be competitive.&#8221;</h2>
			<p>Albert-L&#225;szl&#243; Barab&#225;si, <span>Robert Gray Dodge Professor and University Distinguished Professor, Network Science Institute</span></p>
		</section>

		<!-- <section id="contactform" class="contactform">

		</section> -->

	</div>

<?php get_footer(); ?>
