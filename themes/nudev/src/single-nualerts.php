<?php

/*
	Template Name: NUAlerts
	Template Post Type: nualerts
*/


	// if this alert is not active, and someone got here another way, redirect to the emergency info page
	if(get_field('active',$post->ID) == ''){
		header('location:https://www.northeastern.edu/emergency-information');
	}

	get_header();

?>

	<div class="main" id="nu__static" role="main" aria-label="content">

		<section class="hero">
			<div>
				<h2>University Updates</h2>
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

	</div>
<?php get_footer(); ?>
