<?php

	/* Template Name: Experience */

	get_header();

	$pageFields = get_fields();

?>

	<div class="main" role="main" aria-label="content">

		<?php include(locate_template('includes/pagehero-v2.php')); ?>

		<?php $noPreFooter = true; ?>

		<section class="grid">

			<ul>
				<?php include(locate_template('loops/loop-experience-linkblocks.php')); ?>
			</ul>

		</section>

		<section class="globalnetwork">
			<div>
				<h2><?=$pageFields['experience_global_network_title']?></h2>
				<p><?=$pageFields['experience_global_network_description']?></p>
			</div>
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
