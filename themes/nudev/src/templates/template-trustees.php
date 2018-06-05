<?php

	/* Template Name: Trustees */

	get_header();

	wp_reset_query();

	// we need to be able to translate back the custom pretty URL to get the correct filter if one has been optioned
	$fChk = $wp_query->query_vars['board-type'];
	$filter = (isset($fChk) && $fChk != ''?$fChk:'');

?>

	<div class="main" role="main" aria-label="content">

		<?php include(locate_template('includes/pagehero.php')); ?>

		<section class="nu__grid-filters">
			<ul>
				<li><a <?=($filter == ''?'class="active"':'')?> href="<?=home_url()?>/about/board-of-trustees" title="Show board of trustees">Board of Trustees</a></li>
				<li><a <?=($filter == 'members'?'class="active"':'')?> href="<?=home_url()?>/about/board-of-trustees/members" title="Show members of the corporation">Members of the Corporation</a></li>
				<li><a <?=($filter == 'committees'?'class="active"':'')?> href="<?=home_url()?>/about/board-of-trustees/committees" title="Show standing committees">Standing Committees</a></li>
			</ul>
		</section>

		<?php

			// determine what content to show to the user based on URL and any filtered applied

			if(isset($filter) && $filter == "members"){	// this will show the list of the members of the corporation
				echo '<section class="nu__board-emeriti">';
				include(locate_template('loops/loop-trustees-emeriti.php'));
				echo '</section>';
				echo '<section class="nu__board-honorary">';
				include(locate_template('loops/loop-trustees-honorary.php'));
				echo '</section>';
				echo '<section class="nu__board-others fullwidth">';
				include(locate_template('loops/loop-trustees-others.php'));
				echo '</section>';
			}else if(isset($filter) && $filter == "committees"){	// this will show standing committees
				echo '<section class="nu__board-committees">';
				include(locate_template('loops/loop-trustees-committees.php'));
				echo '</section>';
			}else{	// this is the default state to show the trustees and leadership
				echo '<section class="nu__board-trustees">';
				include(locate_template('loops/loop-trustees-leadership.php'));
				include(locate_template('loops/loop-trustees.php'));
				echo '</section>';
			}

		?>

	</div>

<?php
	get_footer();
?>
