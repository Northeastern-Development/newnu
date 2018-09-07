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
					<h3>Hi, welcome to Northeastern.<br />What can I help you with?</h3>
					<form name="homepagesearch" action="<?=site_url()?>/search" method="get">
						<input type="text" name="query" id="query" placeholder="Campus Visit, Academic Calendar ..." title="Enter your search query here" />
						<input name="gosearch" id="gosearch" type="submit" value="Search" title="Click to search">
					</form>
				</article>
				<?php get_template_part('loops/loop-homepagemisc'); ?>
			</div>
		</div>

		<div id="nu__categories">
			<?php get_template_part('loops/loop-homepagecategories'); ?>
		</div>

		<hr>
		<?php include(locate_template('includes/prefooter.php')); ?>

		<hr class="events">
		<div id="nu__events">
			<?php get_template_part('loops/loop-homepageevents'); ?>
		</div>

	</div>

<?php get_footer(); ?>
