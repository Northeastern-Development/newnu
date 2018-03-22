<?php

/*
	Template Name: NUAlerts
	Template Post Type: nualerts
*/

	get_header();

?>

	<main id="nu__static" role="main" aria-label="content">

		<section class="hero">
			<div>
				<h2>University Updates</h2>
				<h3>Check out this page for the latest info on stuff that you should know about relating to your special time at this Northeastern University experience.</h3>
			</div>
		</section>

		<section class="intro">
			<h1><?php the_title(); ?>: <?php the_date(); ?> <?php the_time(); ?></h1>
		</section>
		<section>

			<?php the_content(); ?>

		</section>

		<section class="last">
			<a href="<?=get_home_url().'/emergency-information'?>" title="Click here for more emergency information">Click here for more emergency information</a>
		</section>

	</main>
<?php get_footer(); ?>
