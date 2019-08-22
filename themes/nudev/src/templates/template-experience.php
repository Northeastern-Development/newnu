<?php

	/* Template Name: Experience */

	get_header();

?>

	<div class="main" role="main" aria-label="content">

		<?php include(locate_template('includes/pagehero.php')); ?>

		<?php $noPreFooter = true; include(locate_template('includes/prefooter.php')); ?>

		<section class="globalnetwork">
			<h2>Our growing <span>global network</span></h2>
			<p>Today, experience has never been more relevant, as we bring regionally-aligned graduate programs and innovation opportunities to some of the world's most thriving cities.</p>
		</section>

		<section class="nu__filters hotswap" tabindex="-1">
			<input id="toggle" type="checkbox" title="Click to select">
			<div>
				<ul>
					<?php include(locate_template('loops/loop-experience-filters.php')); ?>
				</ul>
				<div title="Click to show/hide more options" class="js__showmore">More</div>
			</div>
		</section>

		<section class="leftright">
			<div>
				<?php include(locate_template('loops/loop-experiencecampus.php')); ?>
			</div>
		</section>

	</div>

<?php get_footer(); ?>
