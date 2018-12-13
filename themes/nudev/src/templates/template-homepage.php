<?php

	/* Template Name: Homepage */

	get_header();

?>

	<div id="nu__homepage" role="main" aria-label="content" class="main smooth" tabindex="-1">

		<div id="nu__seo-content"><h1><?=get_the_content()?></h1></div>

		<div id="nu__stories">
			<div>
				<?php get_template_part('loops/loop-homepagenews'); ?>
			</div>

			<div>
				<?php get_template_part('loops/loop-homepagemisc'); ?>
			</div>
		</div>

		<div id="nu__categories">
			<?php get_template_part('loops/loop-homepagecategories'); ?>
		</div>

		<hr>
		<?php include(locate_template('includes/prefooter.php')); ?>

		<?php get_template_part('loops/loop-homepageevents'); ?>

	</div>

<?php get_footer(); ?>
