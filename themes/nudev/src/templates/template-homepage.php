<?php

	/* Template Name: Homepage */

	get_header();

?>

	<main id="homepage" role="main" aria-label="content" class="smooth">

		<!-- <div id="nu__alert">
			<script src="//northe.edu/alert/current/nu__global-alert.js" async></script>
		</div> -->

		<?php

			// $res = get_post(23);
      //
      //
			// while (have_posts()) : the_post();
      //
			// 	$fields = get_fields(get_the_ID());
      //
			// 	print_r($fields);
      //
			// endwhile;

		?>

		<!-- <div id="weglot_here"></div> -->

		<section id="topstories">
			<ul>
				<li>Many Experiences. One Northeastern.</li>
				<li>Transformative Research</li>
				<li>Vibrant Campus Life</li>
				<li>A Better, Faster Food</li>
				<li>The Global University System</li>
				<li>Leading Change</li>
			</ul>
		</section>

		<section id="colleges">
			<div class="nu__section-header"><div></div><h3>Colleges</h3><div></div></div>
			<ul>
				<li>DMSB</li>
				<li>CPS</li>
				<li>CAMD</li>
				<li>COS</li>
				<li>COE</li>
				<li>BCHS</li>
				<li>SOL</li>
				<li>CSSH</li>
				<li>CCIS</li>
			</ul>
		</section>

		<section id="campuses">
			<div class="nu__section-header"><div></div><h3>Campuses</h3><div></div></div>
			<ul>
				<li>Boston</li>
				<li>Charlotte</li>
				<li>Seattle</li>
				<li>Silicon Valley</li>
				<li>Toronto</li>
			</ul>
		</section>

		<!-- <section class="stories">
			<?php get_template_part('loops/loop-homepagestories'); ?>
		</section> -->

	</main>
<?php get_footer(); ?>
