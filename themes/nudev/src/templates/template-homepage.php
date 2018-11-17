<?php

	/* Template Name: Homepage */

	get_header();

?>

	<div id="nu__homepage" role="main" aria-label="content" class="main smooth">

		<div id="nu__seo-content"><h1><?=get_the_content()?></h1></div>

		<div id="nu__stories">
			<div>
				<?php get_template_part('loops/loop-homepagenews'); ?>
			</div>

			<div>
				<article>
					<!-- <div class="livechat">
						<div></div>
						<a href="" disabled="disabled" title="Click here to chat with us now">Live Chat</a>
					</div> -->
					<div class="searcharea">
						<h3>Hi, welcome to Northeastern.<br /><span>What can we help you with?</span></h3>
						<form name="homepagesearch" action="<?=site_url()?>/search" method="get">
							<input type="text" name="query" id="inpagequery" placeholder="Campus Visit, Academic Calendar ..." title="Enter your search query here" /><label for="inpagequery" class="label" style="font-size: 1px;">Search</label>
							<input name="gosearch" id="gosearch" type="submit" value="Search" title="Click to search">
						</form>
					</div>
					<div class="nlogo"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1040.85 802.7"><path d="M910.08,227.46c0-129.71,43.59-172.24,130.77-205.2V1h-286V22.26c87.18,33,130.77,75.49,130.77,205.2V608.07L280.68,29.71C253,4.19,245.59,1,227.52,1H0V22.26c50,5.32,79.74,19.14,152,89.31l27.65,26.58V571.92c0,129.71-43.59,172.24-130.77,205.2v21.26h286V777.12c-87.18-33-130.77-75.49-130.77-205.2V158.35L888.81,803.7h21.27Z" transform="translate(0 -1)"/></svg></div>
				</article>
				<?php get_template_part('loops/loop-homepagemisc'); ?>
			</div>
		</div>

		<div id="nu__categories">
			<?php get_template_part('loops/loop-homepagecategories'); ?>
		</div>

		<hr>
		<?php include(locate_template('includes/prefooter.php')); ?>

		<?php get_template_part('loops/loop-homepageevents'); ?>


	</div>

<?php get_footer(); ?>
