<?php

	/* Template Name: Administration */

	get_header();

	wp_reset_query();
	
	$filter = (!empty($wp_query->query_vars['team-filter'])?$wp_query->query_vars['team-filter']:'');

?>

	<div class="main" role="main" aria-label="content">

		<?php include(locate_template('includes/pagehero.php')); ?>

		<?php include(locate_template('loops/loop-administration-president.php')); ?>

		<?php  include(locate_template('loops/loop-administration-orgchart.php')); ?>

	</div>

<?php
	get_footer();
?>
