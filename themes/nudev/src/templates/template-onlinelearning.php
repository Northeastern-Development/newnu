<?php

	/* Template Name: Online Learning */

	get_header();

	$fields = get_fields();

?>

	<div class="main" role="main" aria-label="content">

		<?php include(locate_template('includes/pagehero.php')); ?>

		<section class="overview">
			<?php include(locate_template('loops/loop-onlinelearning-introduction.php')); ?>
		</section>

		<section class="experience">
			<?php include(locate_template('loops/loop-onlinelearning-experience.php')); ?>
		</section>

		<section class="slider">
			<?php include(locate_template('loops/loop-onlinelearning-quotes.php')); ?>
		</section>

		<section class="getstarted">
			<div class="copy">
				<h2>Ready to get started?</h2>
				<p>
					Learn more about our online programs.
				</p>
			</div>
			<div class="links">
				<div>
					<?php include(locate_template('loops/loop-onlinelearning-getstartedlinks.php')); ?>
				</div>
			</div>
		</section>

	</div>

<?php get_footer(); ?>
