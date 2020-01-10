<?php

	/* Template Name: Trustees */

	get_header();

	wp_reset_query();

	// we need to be able to translate back the custom pretty URL to get the correct filter if one has been optioned
	$filter = (!empty($wp_query->query_vars['board-type'])?$wp_query->query_vars['board-type']:'');

?>

	<div class="main" role="main" aria-label="content">

		<?php

			include(locate_template('includes/pagehero.php'));

			// this is the array of filter options that will be shown to the user if we need one on this page
			$filterOptions = array(
				array('title' => 'Board of Trustees', 'filter' => '')
				,array('title' => 'Trustees Emeritae/i and Honorary Trustees', 'filter' => 'emeritae-honorary')
				,array('title' => 'Corporators Emeritae/i', 'filter' => 'corporators-emeritae')
			);

			// this will actually call in the filter include to display on the page
			include(locate_template('includes/filteroptions.php'));

			// determine what content to show to the user based on URL and any filtered applied
			if(isset($filter) && $filter == "corporators-emeritae"){	// this will show the list of the members of the corporation
				echo '<section class="nu__board-emeriti">';
				include(locate_template('loops/loop-trustees-others.php'));
				echo '</section>';
			}
			else if(isset($filter) && $filter == "emeritae-honorary"){	// this will show standing committees
				echo '<section class="nu__board-emeriti">';
				include(locate_template('loops/loop-trustees-emeriti.php'));
				echo '</section>';
				echo '<section class="nu__board-honorary">';
				include(locate_template('loops/loop-trustees-honorary.php'));
				echo '</section>';
			}
			else{	// this is the default state to show the trustees
				echo '<section class="nu__board-trustees">';
				include(locate_template('loops/loop-trustees.php'));
				echo '</section>';
			}

		?>

	</div>

<?php
	get_footer();
?>
