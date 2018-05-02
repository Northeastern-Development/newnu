<?php

	/* Template Name: Administration */

	get_header();

	wp_reset_query();

	// we need to be able to translate back the custom pretty URL to get the correct filter if one has been optioned
	$fChk = $wp_query->query_vars['team-filter'];
	$filter = (isset($fChk) && $fChk != ''?$fChk:'');

?>

	<div class="main" role="main" aria-label="content">

		<section class="hero">
			<div>
				<h2>Administration</h2>
				<h3>Administration Administration Administration Administration Administration Administration Administration Administration Administration Administration Administration Administration Administration Administration Administration Administration Administration </h3>
			</div>
		</section>

		<?php include(locate_template('loops/loop-administration-president.php')); ?>

		<section class="nu__filters">
			<h2>Leadership Team</h2>
			<ul>
				<li><a <?=($filter == ''?'class="active"':'')?> href="<?=home_url()?>/about/university-administration" title="Show senior leadership team">Senior Leadership</a></li>
				<?php include(locate_template('loops/loop-administration-filters.php')); ?>
			</ul>
		</section>

		<section class="nu__team">
			<?php  include(locate_template('loops/loop-administration.php')); ?>
		</section>

	</div>

<?php get_footer(); ?>
