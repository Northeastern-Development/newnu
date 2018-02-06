<?php

/*

	Template Name: 404

*/

get_header(); ?>

	<main class="staticpage" role="main" aria-label="Content">
		<!-- section -->
		<section>

			<article>
				<div id="contentarea" class="staticcontent">
					<div class="panel">
						<div class="contentarea">
							<div class="overlap"></div>
							<h1>Ooops!</h1>

							<p>It appears that the page or resource you are looking for cannot be found.</p>

							<p>Please use the main navigation to jump to a specific section fo the site or the search form.</p>

							<p>If you are still encountering an issue, please <a href="<?=home_url()?>/contact" title="Contact us">contact us here</a>.</p>
						</div>
					</div>
				</div>
			</article>

		</section>
		<!-- /section -->
	</main>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
