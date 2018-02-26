<?php
	// error_reporting(E_ALL);
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?></title>
		<meta name="title" content="<?php wp_title(''); ?>" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="author" content="Northeastern University, http://www.northeastern.edu" />
		<meta name="copyright" content="<?=date("Y")?>" />
		<meta name="language" content="english" />
		<meta name="zipcode" content="02115" />
		<meta name="city" content="Boston" />
		<meta name="state" content="MA" />

		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-touch-fullscreen" content="yes">
		<meta name="msapplication-tap-highlight" content="no" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="revisit" content="15 days" />
		<meta http-equiv="robots" content="all" />

		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicon/manifest.json">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/material-icons.css">

		<?php wp_head(); ?>

		<!-- <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/smoothstate.js'></script>
		<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/velocity.js'></script> -->

		<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/scripts-min.js'></script>





		<script>
			(function() {
			var cx = '003005722642506293004:ijksvxamcbm';
			var gcse = document.createElement('script');
			gcse.type = 'text/javascript';
			gcse.async = true;
			gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(gcse, s);
			})();
		</script>








	</head>
	<body <?php body_class(); ?>>

		<p class="testp" style="position:fixed;background:rgba(0,0,0,0.7);color:#fff;top:200px;left:0;font-weight:bold;font-size:20px;z-index:99999999;"></p>

		<div class="wrapper">

			<header role="banner"><?php if(function_exists("wp_header")){wp_header();} ?>

				<div>

					<nav role="navigation" class="nu__mainmenu">

						<div id="nu__mainmenu-supernav">
							<input id="nu__supernav-toggle" type="checkbox" title="Click to show/hide main menu" />
							<label for="nu__supernav-toggle"id="nu__supernav-toggle-label"></label>
							<?php if(get_query_var('pagename') != 'main-menu'){ echo '<div id="nu__supernav">'; get_template_part('loops/loop-supernav'); echo '</div>'; } ?>
						</div>

						<div id="nu__mainmenu-search">
							<input id="nu__search-toggle" type="checkbox" title="Click to search all of Northeastern University" />
							<label for="nu__search-toggle" id="nu__search-toggle-label"></label>
							<div id="nu__searchbar"><form name="nu__searchbar-form" id="nu__searchbar-form" action="/search" method="get"><input type="text" name="query" id="query" placeholder="Enter search query" title="Enter your search query here" /><button type="submit" title="Click here or press enter to perform search">&#xE8B6;</button><br />We can add in some more information here if we want to.</form></div>
						</div>

						<div id="nu__mainmenu-iamnav">
							<input id="nu__iamnav-toggle" type="checkbox" title="Click to show/hide audience selection menu" />
							<label for="nu__iamnav-toggle"id="nu__iamnav-toggle-label"></label>
							<?php if(get_query_var('pagename') != 'iam-menu'){ echo '<div id="nu__iamnav">'; get_template_part('loops/loop-iamnav'); echo '</div>'; } ?>
						</div>

						<?php // nudev_nav(); ?>

					</nav>



					<div id="nu__logo">
						<a href="<?=home_url()?>" title="Northeastern University System"><img src="<?=home_url()?>/wp-content/uploads/logo.png" alt="northeastern university logo" />
						</a>
					</div>

				</div>

			</header>
