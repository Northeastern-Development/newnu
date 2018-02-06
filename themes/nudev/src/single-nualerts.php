<?php

/*
	Template Name: NUAlerts
	Template Post Type: nualerts
*/

	get_header();

?>

	<main id="alert" role="main" aria-label="content">

		<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<span class="date">
				<time datetime="<?php the_time('Y-m-d'); ?> <?php the_time('H:i'); ?>">
					Posted: <?php the_date(); ?> <?php the_time(); ?>
				</time>
			</span>

			<?php the_content(); ?>

		</section>

		<section>
			<a href="<?=get_home_url().'/emergency-information'?>" title="Click here for more emergency information">Click here for more emergency information</a>
		</section>

	</main>
<?php get_footer(); ?>
