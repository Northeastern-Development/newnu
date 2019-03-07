<?php

	/* Template Name: Institutes */

	get_header();

	// let's get the brand/closer title and statement
	$pageFields = get_fields();

?>

	<div class="main" role="main" aria-label="content">

		<?php include(locate_template('includes/pagehero.php')); ?>

		<section class="brandstatement">
			<h2><?=str_replace(array('<p>','</p>'),'',$pageFields['institutes_primary_title'])?></h2>
			<?=$pageFields['institutes_description']?>
		</section>

		<section class="grid">

			<ul>
				<?php get_template_part('loops/loop-institutes'); ?>
			</ul>

		</section>

		<section class="closingstatement">
			<h2><?=str_replace(array('<p>','</p>'),'',$pageFields['institutes_closer_primary_title'])?></h2>
			<?=$pageFields['institutes_closer_description']?>
		</section>

	</div>

<?php get_footer(); ?>
