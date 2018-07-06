<?php

	/*

		Template Name: 404

	*/

	get_header();


	// let's grab some specific content out of the admin area

	// $globals['forcePageID'] = 2854; // this is the specific ID of the 404 error page in the admin editor that we want to use
	// global $forcePageID;
	$forcePageID = 2854;	// this is the specific ID of the 404 error page in the admin editor that we want to use

	$fields = get_fields($forcePageID);
	// print_r($fields);

?>

		<div class="main" role="main" aria-label="content">
		<?php include(locate_template('includes/pagehero.php')); ?>

		<?php

			// this will show or hie the main title if needed
			if($fields['main_title'] && $fields['main_title'] != ''){
				echo '<section>'.$fields['main_title'].'</section>';
			}

			echo '<section>';

			// this will show or hide the search bar if needed
			if($fields['show_search'] && $fields['show_search'] == 1){
				echo '<div class="nu__searchbar-container"><form name="nu__searchbar-form" id="nu__searchbar-form" action="/search" method="get"><div><button type="submit" title="Click here or press enter to perform search">&#xE8B6;</button><input type="text" name="query" id="query" value="" title="Enter your search query here" /><label for="query" class="label">Keep exploring</label><button class="reset" type="reset" title="Click here to clear current search">&#xE5C9;</button></div></form></div>';
			}

			// this will show or hide the instructional content if needed
			if($fields['instructions'] && $fields['instructions'] != ''){
				echo '<p>'.$fields['instructions'].'</p>';
			}

			echo '</section>';

		?>


		<!-- </section> -->
	</div>

<?php get_footer(); ?>
