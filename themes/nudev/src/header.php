<?php
	// error_reporting(E_ALL);
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>

		<title><?php wp_title(''); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="title" content="<?php wp_title(''); ?>" />
		<meta charset="<?php bloginfo('charset'); ?>">
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
		<!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> -->
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/material-icons.css">

		<?php wp_head(); ?>

		<script>
			// this is for the google custom search engine
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

				<?=getAlerts()?>

				<div>

					<nav role="navigation" class="nu__mainmenu">

						<div id="nu__mainmenu-supernav">
							<input id="nu__supernav-toggle" type="checkbox" title="Click to show/hide main menu" />
							<label for="nu__supernav-toggle"id="nu__supernav-toggle-label">Menu</label>
							<?php if(get_query_var('pagename') != 'main-menu'){ get_template_part('loops/loop-supernav'); } ?>
						</div>

						<div id="nu__mainmenu-search" >
							<input id="nu__search-toggle" class="js-search-close" type="checkbox" title="Click to search all of Northeastern University" />
							<label for="nu__search-toggle" id="nu__search-toggle-label">Search</label>
							<?php get_template_part('loops/loop-searchnav'); ?>
						</div>

						<div id="nu__mainmenu-iamnav">
							<input id="nu__iamnav-toggle" type="checkbox" title="Click to show/hide audience selection menu" />
							<label for="nu__iamnav-toggle"id="nu__iamnav-toggle-label">I Am A</label>
							<?php if(get_query_var('pagename') != 'iam-menu'){ get_template_part('loops/loop-iamnav'); } ?>
						</div>

						<?php // nudev_nav(); ?>

					</nav>

					<div id="nu__logo">
						<a href="<?=home_url()?>" title="Northeastern University - A University Like No Other"><svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 446.5 102.7"><style>.st0,.st3{display:none}.st3{fill:#fff}.st6{fill:none}.st10{fill:#fff}</style><path class="st0" d="M1140.8-71.5h572V148h-572z"/><g class="st0"><linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="1248.397" y1="82.636" x2="1248.397" y2="110.039"><stop offset="0" stop-color="#e11a2c"/><stop offset=".085" stop-color="#d6182a"/><stop offset=".713" stop-color="#860e19"/><stop offset="1" stop-color="#660a13"/></linearGradient><path d="M1246.6 82.6c-2.1 12.1-11.8 16.3-19.6 16.3V110h42.9l-.2-11c-10.6.1-16.6-4.6-17.9-16.4h-5.2z" fill="url(#SVGID_1_)"/><linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="1307.207" y1="-31.95" x2="1307.207" y2="112.279"><stop offset="0" stop-color="#e11a2c"/><stop offset=".085" stop-color="#d6182a"/><stop offset=".713" stop-color="#860e19"/><stop offset="1" stop-color="#660a13"/></linearGradient><path d="M1246.9 24c0-14.9-.1-28.2-.1-32.1-9.7-10.6-15.5-12.2-27.5-12.2V-32h34.2c7.5.2 8.9 1.7 16.9 9.7 8.2 8.1 88 85.8 104.1 101.4V.7c0-15.7-6.5-21.7-18.5-21.6l-.2-11h39.2v11.1c-8.8 0-16.4 5.4-16.3 21.5v111.6h-6.7L1251.3-4l.1 28h-4.5z" fill="url(#SVGID_2_)"/></g><path class="st3" d="M1520.9 69c7.9 0 10.9-4.5 10.9-11.6v-6.9c0-3.5 1-4.4 3-5v-.9h-7.8v.9c2 .5 3 1.5 3 5v6.9c0 6.5-2.7 9.4-8.4 9.4-6 0-8.7-2.6-8.7-9.4v-8.8c0-2.2.6-2.6 2.8-2.9v-.9h-9.3v.9c2.2.3 2.8.7 2.8 2.9v8.8c0 7.7 3.7 11.6 11.7 11.6m23.1-1.2c-2-.3-2.3-.7-2.3-2.4v-7.8c1.7-1.6 3-2.3 4.5-2.3 1.6 0 2.1.9 2.1 2.5v7.7c0 1.7-.3 2.1-2.3 2.4v.9h8.1v-.9c-2.1-.3-2.3-.7-2.3-2.4v-7.9c0-2.5-1.1-4.4-4.3-4.4-2 0-4 1.2-5.9 2.9v-3h-.6l-5.1 2.6v.6h2.3v9.3c0 1.7-.3 2.1-2.3 2.4v.9h8.1v-1.1zm16.2-17.7c1.2 0 2.2-1 2.2-2.2 0-1.1-.8-2-2-2s-2.2 1-2.2 2.2c0 1 .9 2 2 2m4.5 17.7c-2.2-.4-2.5-.7-2.5-2.4V53h-.6l-5.5 1.3v.9h2.6v10.3c0 1.7-.3 2-2.5 2.4v.9h8.5v-1zm14.6-10c1.2-2.7 1.7-3.3 2.9-3.6v-.7h-6.4v.7c2 .5 2.6 1.8 1.6 4.1l-2.7 6.1-3.2-7.4c-.6-1.5-.6-2.5 1.8-2.8v-.9h-8v.9c1 .3 1.4.7 2.2 2.5l5.4 12h1.4l5-10.9zm17.1 8.8l-.3-.5c-1.1.5-2.1.8-3.3.8-2.6 0-4.7-1.1-5.9-4-.2-.4-.3-.9-.4-1.3l9.6-3.6c-.3-3.2-2.4-4.8-5.4-4.8-4.3 0-7.3 3.5-7.3 8.1 0 4.8 3.2 7.8 7.4 7.8 2.4-.1 4.5-1.4 5.6-2.5m-8-11.7c2-.7 3.8.2 4.4 2.7l-6.6 2.6c-.4-2.7.5-4.7 2.2-5.3m18.2 12.9c-2.6-.4-2.9-.8-2.9-2.7v-6.4c.9-1.5 1.7-2.4 2.3-2.7.2.9.9 1.6 2 1.6.9 0 1.9-.7 1.9-2.1 0-1.4-1-2.2-2.3-2.2-1.5 0-2.7 1.3-4.1 3.5V53h-.6l-5.1 2.6v.6h2.3v9.3c0 1.7-.3 2.1-2.3 2.4v.9h8.8v-1zm16.3-3.7c0-5.4-8.8-4-8.8-7.7 0-.9.5-1.9 2.1-1.9 1.7 0 3.2 1.1 5.1 3.2l.7-.4-1.4-4h-.4l-.6.4c-1-.4-2.2-.6-3.3-.6-3 0-5.1 2-5.1 4.7 0 5.4 8.8 4 8.8 7.7 0 1.1-.8 2.1-2.8 2.1s-3.4-1.4-5.4-4l-.7.3 1.3 4.9h.4l.9-.5c1 .5 2.2.7 3.6.7 2.9 0 5.6-1.9 5.6-4.9m6-14c1.2 0 2.2-1 2.2-2.2 0-1.1-.8-2-2-2s-2.2 1-2.2 2.2c0 1 .9 2 2 2m4.5 17.7c-2.2-.4-2.5-.7-2.5-2.4V53h-.6l-5.5 1.3v.9h2.6v10.3c0 1.7-.3 2-2.5 2.4v.9h8.5v-1zm11.2-.9c-3 .7-4 .1-4-1.8v-9.6h3.9v-1.4h-3.9v-3.7h-.6l-5.2 4.5v.6h2.3v10.2c0 2.1 1 3.2 2.9 3.2a10 10 0 0 0 4.9-1.3l-.3-.7zm9 4.6l6.1-13.7c1.2-2.7 1.7-3.3 2.9-3.6v-.7h-6.4v.7c2 .5 2.6 1.8 1.6 4.1l-2.7 6.1-3.2-7.4c-.6-1.5-.6-2.5 1.8-2.8v-.9h-8v.9c1 .3 1.4.7 2.2 2.5l5.3 11.8-1 2.2c-.4.9-.8 1.7-1.3 2.1-.4-1.3-1.1-2-2.2-2s-2 .7-2 2.1c0 1.5 1.2 2.5 2.5 2.5 1.7.3 2.9-.7 4.4-3.9M1324 49.1c0-3.5 1-4.4 3-5v-.9h-7.8v.9c2 .5 3 1.5 3 5v12.8l-16.9-17.8c-.7-.7-1-.8-1.6-.8h-5.6v.9c1.4.1 2.3.6 3.7 1.8.5.4 1 .9 1 1.8v13.7c0 3.5-1 4.4-3 5v.9h7.8v-.9c-2-.5-3-1.5-3-5V48.3l18.4 19.2h1.1V49.1zm12.9 18.5c5.1 0 8.2-3.7 8.2-8.1 0-4.2-2.8-7.7-7.8-7.7-5.1 0-8.2 3.7-8.2 8.1 0 4.2 2.8 7.7 7.8 7.7m1.2-1.5c-2.9.4-4.8-1.2-5.4-5.5-.6-4.4.7-6.8 3.5-7.2 2.9-.4 4.8 1.2 5.4 5.6.6 4.2-.8 6.6-3.5 7.1m18.3.3c-2.6-.4-2.9-.8-2.9-2.7v-6.4c.9-1.5 1.7-2.4 2.3-2.7.2.9.9 1.6 2 1.6.9 0 1.9-.7 1.9-2.1 0-1.4-1-2.2-2.3-2.2-1.5 0-2.7 1.3-4.1 3.5v-3.7h-.6l-5.1 2.6v.6h2.3V64c0 1.7-.3 2-2.3 2.4v.9h8.8v-.9zm14.5-.9c-3 .7-4 .1-4-1.8v-9.6h3.9v-1.4h-3.9V49h-.6l-5.2 4.5v.6h2.3v10.2c0 2.1 1 3.2 2.9 3.2a10 10 0 0 0 4.9-1.3l-.3-.7zm9.8.9c-2-.3-2.3-.7-2.3-2.4v-7.8c1.7-1.6 3-2.3 4.5-2.3 1.6 0 2.1.9 2.1 2.5V64c0 1.7-.3 2-2.3 2.4v.9h8.1v-.9c-2.1-.3-2.3-.7-2.3-2.4v-7.9c0-2.5-1.1-4.4-4.3-4.4-2 0-3.9 1.2-5.8 2.8V42.3h-.6l-5.2 2.6v.6h2.3V64c0 1.7-.3 2-2.3 2.4v.9h8.1v-.9zm25-1.2l-.3-.5c-1.1.5-2.1.8-3.3.8-2.6 0-4.7-1.1-5.9-4-.2-.4-.3-.9-.4-1.3l9.6-3.6c-.3-3.2-2.4-4.8-5.4-4.8-4.3 0-7.3 3.5-7.3 8.1 0 4.8 3.2 7.8 7.4 7.8 2.4-.1 4.5-1.3 5.6-2.5m-8-11.7c2-.7 3.8.2 4.4 2.7l-6.6 2.6c-.4-2.7.5-4.6 2.2-5.3m20.4 13.9c1.2 0 2.7-.5 3.5-.9l-.1-.6c-1.7.2-2.2-.1-2.2-1.2v-9.3c0-2.3-1.2-3.5-4.5-3.5-3.9 0-6.7 2-6.7 3.9 0 .9.6 1.6 1.8 1.6 1.4 0 2.1-.9 2.1-2.2 0-.5-.2-.9-.4-1.3.8-.4 1.6-.6 2.5-.6 1.2 0 1.9.5 1.9 1.9v3.3c-5.4 1.3-8.5 2.4-8.5 5.8 0 2.2 1.5 3.5 3.7 3.5 1.6 0 3.5-.9 5-2.1-.1 1 .5 1.7 1.9 1.7m-7.3-4.1c0-1.8.8-2.7 5.1-3.8v4.9c-1 .8-2.2 1.4-3.1 1.4-1.4 0-2-.7-2-2.5m24.7-.5c0-5.4-8.8-4-8.8-7.7 0-.9.5-1.9 2.1-1.9 1.7 0 3.2 1.1 5.1 3.2l.7-.4-1.4-4h-.4l-.6.4c-1-.4-2.2-.6-3.3-.6-3 0-5.1 2-5.1 4.7 0 5.4 8.8 4 8.8 7.7 0 1.1-.8 2.1-2.8 2.1-2 0-3.4-1.4-5.4-4l-.7.3 1.3 4.9h.4l.9-.5c1 .5 2.2.7 3.6.7 2.9-.1 5.6-2 5.6-4.9m11.2 2.7c-3 .7-4 .1-4-1.8v-9.6h3.9v-1.4h-3.9V49h-.6l-5.2 4.5v.6h2.3v10.2c0 2.1 1 3.2 2.9 3.2a10 10 0 0 0 4.9-1.3l-.3-.7zm15-.3l-.3-.5c-1.1.5-2.1.8-3.3.8-2.6 0-4.7-1.1-5.9-4-.2-.4-.3-.9-.4-1.3l9.6-3.6c-.3-3.2-2.4-4.8-5.4-4.8-4.3 0-7.3 3.5-7.3 8.1 0 4.8 3.2 7.8 7.4 7.8 2.4-.1 4.5-1.3 5.6-2.5m-8-11.7c2-.7 3.8.2 4.4 2.7l-6.6 2.6c-.4-2.7.5-4.6 2.2-5.3m18.2 12.9c-2.6-.4-2.9-.8-2.9-2.7v-6.4c.9-1.5 1.7-2.4 2.3-2.7.2.9.9 1.6 2 1.6.9 0 1.9-.7 1.9-2.1 0-1.4-1-2.2-2.3-2.2-1.5 0-2.7 1.3-4.1 3.5v-3.7h-.6l-5.1 2.6v.6h2.3V64c0 1.7-.3 2-2.3 2.4v.9h8.8v-.9zm12.8 0c-2.1-.3-2.3-.7-2.3-2.4v-7.8c1.7-1.6 3-2.3 4.5-2.3 1.6 0 2.1.9 2.1 2.5V64c0 1.7-.3 2-2.3 2.4v.9h8.1v-.9c-2.1-.3-2.3-.7-2.3-2.4v-7.9c0-2.5-1.1-4.4-4.3-4.4-2 0-4 1.2-5.9 2.9v-3h-.6l-5.1 2.6v.6h2.3V64c0 1.7-.3 2-2.3 2.4v.9h8.1v-.9z"/><path class="st0" d="M565.3-71.5h535.9V148H565.3z"/><g class="st0"><linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="636.738" y1="82.636" x2="636.738" y2="110.039"><stop offset="0" stop-color="#e11a2c"/><stop offset=".085" stop-color="#d6182a"/><stop offset=".713" stop-color="#860e19"/><stop offset="1" stop-color="#660a13"/></linearGradient><path d="M634.9 82.6C632.8 94.7 623.1 99 615.3 99v11h42.9l-.2-11c-10.6.1-16.6-4.6-17.9-16.4h-5.2z" fill="url(#SVGID_3_)"/><linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="669.446" y1="-73.149" x2="760.933" y2="91.723"><stop offset="0" stop-color="#e11a2c"/><stop offset=".085" stop-color="#d6182a"/><stop offset=".713" stop-color="#860e19"/><stop offset="1" stop-color="#660a13"/></linearGradient><path d="M635.2 24c0-14.9-.1-28.2-.1-32.1-9.7-10.6-15.5-12.2-27.5-12.2V-32h34.2c7.5.2 8.9 1.7 16.9 9.7 8.2 8.1 88 85.8 104.1 101.4V.7c0-15.7-6.5-21.7-18.5-21.6l-.2-11h39.2v11.1c-8.8 0-16.4 5.4-16.3 21.5v111.6h-6.7L639.7-4l.1 28h-4.6z" fill="url(#SVGID_4_)"/></g><path class="st6" d="M5.8 79.2v23.5h5V99c7.8 0 17.5-4.2 19.6-16.3h5.2c1.3 11.9 7.3 16.5 17.9 16.4l.1 3.7h7.2V79.2h-55z"/><linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="32.201" y1="82.636" x2="32.201" y2="110.039"><stop offset="0" stop-color="#e11a2c"/><stop offset=".085" stop-color="#d6182a"/><stop offset=".713" stop-color="#860e19"/><stop offset="1" stop-color="#660a13"/></linearGradient><path d="M35.6 82.6h-5.2C28.3 94.7 18.6 99 10.8 99v3.8h42.8l-.1-3.7c-10.5.1-16.6-4.6-17.9-16.5z" fill="url(#SVGID_5_)"/><g><path class="st6" d="M162.6.7v102.1h2.9V0h-2.9v.7zM158.4.7V0H77.1c27.3 26.6 70.1 68.2 81.4 79.2V.7zM35.2 0v24h-4.5c0-9.3 0-17.9-.1-24h-4.8v102.7h120L39.4 0h-4.2z"/><linearGradient id="SVGID_6_" gradientUnits="userSpaceOnUse" x1="61.474" y1="-71.206" x2="152.96" y2="93.667"><stop offset="0" stop-color="#e11a2c"/><stop offset=".085" stop-color="#d6182a"/><stop offset=".713" stop-color="#860e19"/><stop offset="1" stop-color="#660a13"/></linearGradient><path d="M162.6.7V0h-4.2v79.3C147.1 68.3 104.3 26.7 77 .1H39.4L146 102.7h16.6V.7z" fill="url(#SVGID_6_)"/><linearGradient id="SVGID_7_" gradientUnits="userSpaceOnUse" x1="4.384" y1="-39.527" x2="95.87" y2="125.346"><stop offset="0" stop-color="#e11a2c"/><stop offset=".085" stop-color="#d6182a"/><stop offset=".713" stop-color="#860e19"/><stop offset="1" stop-color="#660a13"/></linearGradient><path d="M35.2 24V0h-4.5c0 6.1 0 14.7.1 24h4.4z" fill="url(#SVGID_7_)"/><g><path class="st6" d="M27.7 52.2c0-.6-.5-1-1-1h-1.4l.1 2.1h1.4c.6-.1 1-.5.9-1.1zM27.5 67.8h-1.4l.1 2.1h1.4c.6 0 1-.5 1-1.1-.1-.6-.5-1-1.1-1zM51.2 55.6l2.2.2-.8-3z"/><path class="st10" d="M26.3 39.9l-3.8.2-.3-7.2-2.3.1.5 9.2 6-.3zM41.2 41.9l2.2-3.2 1.8 3.4 2.6.1-2.9-4.9L48 33l-2.5-.1-1.9 2.8-1.6-3-2.7-.1 2.7 4.5-3.3 4.7zM7 60.2l2.3-9.7-2.3.3-1.4 6.6-3.2-5.9-2.4.3 4.8 8.7zM19.9 58.9l-.2-2-4.3.4-.1-1.8 3.1-.3-.1-1.9-3.2.3L15 52l4.3-.4-.2-1.9-6.6.5.8 9.2zM25.4 55.1h1l1.9 3.4 2.5-.1-2.2-3.9c1-.5 1.5-1.4 1.5-2.5-.1-1.7-1.4-2.8-3.4-2.8l-3.7.2.3 9.2 2.3-.1-.2-3.4zm-.1-3.9h1.4c.6 0 1 .4 1 1s-.4 1-1 1.1h-1.4v-2.1z"/><path transform="matrix(-.00811 1 -1 -.00811 89.094 19.316)" class="st10" d="M30.3 52.7h9.2V55h-9.2z"/><path class="st10" d="M44.1 58.7l.4-7.1 2.7.1.1-2.1-7.8-.3-.1 2 2.8.1-.4 7.2zM56.8 59.8L54 50.1l-2.2-.2-4.4 8.9 2.3.2.8-1.7 3.4.3.5 1.8 2.4.4zm-5.6-4.2l1.4-2.9.8 3.1-2.2-.2zM63 53c.5.1 1 .4 1.4 1l1.5-1.3c-.6-.8-1.4-1.4-2.6-1.6-1.7-.2-3.1.8-3.3 2.3-.1 1 .3 1.9 1.2 2.6l1.6 1.3c.3.3.5.5.5.9-.1.4-.5.6-1 .6-.6-.1-1.2-.5-1.9-1.4l-1.5 1.3c.8 1.1 1.7 1.8 3.2 2 1.7.2 3.2-.6 3.4-2.3.1-.9-.2-1.8-1.2-2.6l-1.6-1.3c-.4-.3-.5-.5-.5-.9s.4-.6.8-.6zM10.2 73.5l-3.1-6-2.4.2 4.7 8.9 2.1-.3 2.6-9.6-2.3.2z"/><path transform="scale(-1) rotate(86.035 76.08 -20.086)" class="st10" d="M14.1 69.8h9.2v2.3h-9.2z"/><path class="st10" d="M30.8 68.7c0-1.7-1.4-2.8-3.3-2.8l-3.7.1.3 9.2 2.3-.1-.1-3.5h1l1.8 3.4 2.5-.1-2.2-3.9c.9-.3 1.5-1.2 1.4-2.3zm-3.2 1.2h-1.4l-.1-2.1h1.4c.6 0 1 .4 1 1 .1.6-.4 1.1-.9 1.1zM33.3 67.9h2.8l-.2 7.2 2.3.1.1-7.2h2.8v-2l-7.7-.2zM49.3 72.2c-.1.9-.7 1.6-1.7 1.5-.9-.1-1.5-.8-1.4-1.7l.4-5.7-2.3-.2-.4 5.7c-.1 2.1 1.3 3.8 3.5 4 2.2.2 3.9-1.3 4-3.5l.4-5.7-2.2-.2-.3 5.8zM58.3 69.1c.5.1 1 .4 1.4.9l1.4-1.3c-.6-.8-1.5-1.4-2.7-1.5-1.7-.2-3.1.8-3.3 2.4-.1 1 .3 1.9 1.2 2.6l1.7 1.3c.4.3.5.5.5.8 0 .4-.4.6-1 .6-.6-.1-1.3-.5-2-1.4l-1.4 1.3c.8 1.1 1.7 1.7 3.2 1.9 1.7.2 3.2-.7 3.4-2.4.1-.9-.3-1.8-1.2-2.5L58 70.5c-.4-.3-.5-.5-.5-.9 0-.3.4-.6.8-.5zM34.4 38.3c0 .9-.6 1.6-1.5 1.6s-1.5-.7-1.5-1.6v-5.7h-2.3v5.7c0 2.1 1.6 3.7 3.8 3.7 2.2 0 3.8-1.6 3.8-3.7v-5.7h-2.2l-.1 5.7z"/></g></g><g><path class="st10" d="M304.8 69c7.9 0 10.9-4.5 10.9-11.6v-6.9c0-3.5 1-4.4 3-5v-.9h-7.8v.9c2 .5 3 1.5 3 5v6.9c0 6.5-2.7 9.4-8.4 9.4-6 0-8.7-2.6-8.7-9.4v-8.8c0-2.2.6-2.6 2.8-2.9v-.9h-9.3v.9c2.2.3 2.8.7 2.8 2.9v8.8c0 7.7 3.6 11.6 11.7 11.6m23.1-1.2c-2-.3-2.3-.7-2.3-2.4v-7.8c1.7-1.6 3-2.3 4.5-2.3 1.6 0 2.1.9 2.1 2.5v7.7c0 1.7-.3 2.1-2.3 2.4v.9h8.1v-.9c-2.1-.3-2.3-.7-2.3-2.4v-7.9c0-2.5-1.1-4.4-4.3-4.4-2 0-4 1.2-5.9 2.9v-3h-.6l-5.1 2.6v.6h2.3v9.3c0 1.7-.3 2.1-2.3 2.4v.9h8.1v-1.1zm16.2-17.7c1.2 0 2.2-1 2.2-2.2 0-1.1-.8-2-2-2s-2.2 1-2.2 2.2c0 1 .8 2 2 2m4.5 17.7c-2.2-.4-2.5-.7-2.5-2.4V53h-.6l-5.5 1.3v.9h2.6v10.3c0 1.7-.3 2-2.5 2.4v.9h8.5v-1zm14.6-10c1.2-2.7 1.7-3.3 2.9-3.6v-.7h-6.4v.7c2 .5 2.6 1.8 1.6 4.1l-2.7 6.1-3.2-7.4c-.6-1.5-.6-2.5 1.8-2.8v-.9h-8v.9c1 .3 1.4.7 2.2 2.5l5.4 12h1.4l5-10.9zm17.1 8.8l-.3-.5c-1.1.5-2.1.8-3.3.8-2.6 0-4.7-1.1-5.9-4-.2-.4-.3-.9-.4-1.3L380 58c-.3-3.2-2.4-4.8-5.4-4.8-4.3 0-7.3 3.5-7.3 8.1 0 4.8 3.2 7.8 7.4 7.8 2.4-.1 4.5-1.4 5.6-2.5m-8-11.7c2-.7 3.8.2 4.4 2.7l-6.6 2.6c-.4-2.7.4-4.7 2.2-5.3m18.1 12.9c-2.6-.4-2.9-.8-2.9-2.7v-6.4c.9-1.5 1.7-2.4 2.3-2.7.2.9.9 1.6 2 1.6.9 0 1.9-.7 1.9-2.1 0-1.4-1-2.2-2.3-2.2-1.5 0-2.7 1.3-4.1 3.5V53h-.6l-5.1 2.6v.6h2.3v9.3c0 1.7-.3 2.1-2.3 2.4v.9h8.8v-1zm16.4-3.7c0-5.4-8.8-4-8.8-7.7 0-.9.5-1.9 2.1-1.9 1.7 0 3.2 1.1 5.1 3.2l.7-.4-1.4-4h-.4l-.6.4c-1-.4-2.2-.6-3.3-.6-3 0-5.1 2-5.1 4.7 0 5.4 8.8 4 8.8 7.7 0 1.1-.8 2.1-2.8 2.1s-3.4-1.4-5.4-4l-.7.3 1.3 4.9h.4l.9-.5c1 .5 2.2.7 3.6.7 2.9 0 5.6-1.9 5.6-4.9m6-14c1.2 0 2.2-1 2.2-2.2 0-1.1-.8-2-2-2s-2.2 1-2.2 2.2c0 1 .8 2 2 2m4.5 17.7c-2.2-.4-2.5-.7-2.5-2.4V53h-.6l-5.5 1.3v.9h2.6v10.3c0 1.7-.3 2-2.5 2.4v.9h8.5v-1zm11.2-.9c-3 .7-4 .1-4-1.8v-9.6h3.9v-1.4h-3.9v-3.7h-.6l-5.2 4.5v.6h2.3v10.2c0 2.1 1 3.2 2.9 3.2a10 10 0 0 0 4.9-1.3l-.3-.7zm9 4.6l6.1-13.7c1.2-2.7 1.7-3.3 2.9-3.6v-.7h-6.4v.7c2 .5 2.6 1.8 1.6 4.1l-2.7 6.1-3.2-7.4c-.6-1.5-.6-2.5 1.8-2.8v-.9h-8v.9c1 .3 1.4.7 2.2 2.5l5.3 11.8-1 2.2c-.4.9-.8 1.7-1.3 2.1-.4-1.3-1.1-2-2.2-2s-2 .7-2 2.1c0 1.5 1.2 2.5 2.5 2.5 1.6.3 2.9-.7 4.4-3.9M107.9 49.1c0-3.5 1-4.4 3-5v-.9h-7.8v.9c2 .5 3 1.5 3 5v12.8L89.3 44.1c-.7-.7-1-.8-1.6-.8h-5.6v.9c1.4.1 2.3.6 3.7 1.8.5.4 1 .9 1 1.8v13.7c0 3.5-1 4.4-3 5v.9h7.8v-.9c-2-.5-3-1.5-3-5V48.3L107 67.5h1.1V49.1zm12.9 18.5c5.1 0 8.2-3.7 8.2-8.1 0-4.2-2.8-7.7-7.8-7.7-5.1 0-8.2 3.7-8.2 8.1 0 4.2 2.7 7.7 7.8 7.7m1.1-1.5c-2.9.4-4.8-1.2-5.4-5.5-.6-4.4.7-6.8 3.5-7.2 2.9-.4 4.8 1.2 5.4 5.6.6 4.2-.7 6.6-3.5 7.1m18.4.3c-2.6-.4-2.9-.8-2.9-2.7v-6.4c.9-1.5 1.7-2.4 2.3-2.7.2.9.9 1.6 2 1.6.9 0 1.9-.7 1.9-2.1 0-1.4-1-2.2-2.3-2.2-1.5 0-2.7 1.3-4.1 3.5v-3.7h-.6l-5.1 2.6v.6h2.3V64c0 1.7-.3 2-2.3 2.4v.9h8.8v-.9zm14.5-.9c-3 .7-4 .1-4-1.8v-9.6h3.9v-1.4h-3.9V49h-.6l-5.2 4.5v.6h2.3v10.2c0 2.1 1 3.2 2.9 3.2a10 10 0 0 0 4.9-1.3l-.3-.7zm9.7.9c-2-.3-2.3-.7-2.3-2.4v-7.8c1.7-1.6 3-2.3 4.5-2.3 1.6 0 2.1.9 2.1 2.5V64c0 1.7-.3 2-2.3 2.4v.9h8.1v-.9c-2.1-.3-2.3-.7-2.3-2.4v-7.9c0-2.5-1.1-4.4-4.3-4.4-2 0-3.9 1.2-5.8 2.8V42.3h-.6l-5.2 2.6v.6h2.3V64c0 1.7-.3 2-2.3 2.4v.9h8.1v-.9zm25-1.2l-.3-.5c-1.1.5-2.1.8-3.3.8-2.6 0-4.7-1.1-5.9-4-.2-.4-.3-.9-.4-1.3l9.6-3.6c-.3-3.2-2.4-4.8-5.4-4.8-4.3 0-7.3 3.5-7.3 8.1 0 4.8 3.2 7.8 7.4 7.8 2.5-.1 4.5-1.3 5.6-2.5m-7.9-11.7c2-.7 3.8.2 4.4 2.7l-6.6 2.6c-.4-2.7.4-4.6 2.2-5.3M202 67.4c1.2 0 2.7-.5 3.5-.9l-.1-.6c-1.7.2-2.2-.1-2.2-1.2v-9.3c0-2.3-1.2-3.5-4.5-3.5-3.9 0-6.7 2-6.7 3.9 0 .9.6 1.6 1.8 1.6 1.4 0 2.1-.9 2.1-2.2 0-.5-.2-.9-.4-1.3.8-.4 1.6-.6 2.5-.6 1.2 0 1.9.5 1.9 1.9v3.3c-5.4 1.3-8.5 2.4-8.5 5.8 0 2.2 1.5 3.5 3.7 3.5 1.6 0 3.5-.9 5-2.1-.1 1 .5 1.7 1.9 1.7m-7.4-4.1c0-1.8.8-2.7 5.1-3.8v4.9c-1 .8-2.2 1.4-3.1 1.4-1.3 0-2-.7-2-2.5m24.8-.5c0-5.4-8.8-4-8.8-7.7 0-.9.5-1.9 2.1-1.9 1.7 0 3.2 1.1 5.1 3.2l.7-.4-1.4-4h-.4l-.6.4c-1-.4-2.2-.6-3.3-.6-3 0-5.1 2-5.1 4.7 0 5.4 8.8 4 8.8 7.7 0 1.1-.8 2.1-2.8 2.1-2 0-3.4-1.4-5.4-4l-.7.3 1.3 4.9h.4l.9-.5c1 .5 2.2.7 3.6.7 2.9-.1 5.6-2 5.6-4.9m11.1 2.7c-3 .7-4 .1-4-1.8v-9.6h3.9v-1.4h-3.9V49h-.6l-5.2 4.5v.6h2.3v10.2c0 2.1 1 3.2 2.9 3.2a10 10 0 0 0 4.9-1.3l-.3-.7zm15.1-.3l-.3-.5c-1.1.5-2.1.8-3.3.8-2.6 0-4.7-1.1-5.9-4-.2-.4-.3-.9-.4-1.3l9.6-3.6c-.3-3.2-2.4-4.8-5.4-4.8-4.3 0-7.3 3.5-7.3 8.1 0 4.8 3.2 7.8 7.4 7.8 2.4-.1 4.5-1.3 5.6-2.5m-8-11.7c2-.7 3.8.2 4.4 2.7l-6.6 2.6c-.4-2.7.4-4.6 2.2-5.3m18.1 12.9c-2.6-.4-2.9-.8-2.9-2.7v-6.4c.9-1.5 1.7-2.4 2.3-2.7.2.9.9 1.6 2 1.6.9 0 1.9-.7 1.9-2.1 0-1.4-1-2.2-2.3-2.2-1.5 0-2.7 1.3-4.1 3.5v-3.7h-.6l-5.1 2.6v.6h2.3V64c0 1.7-.3 2-2.3 2.4v.9h8.8v-.9zm12.9 0c-2.1-.3-2.3-.7-2.3-2.4v-7.8c1.7-1.6 3-2.3 4.5-2.3 1.6 0 2.1.9 2.1 2.5V64c0 1.7-.3 2-2.3 2.4v.9h8.1v-.9c-2.1-.3-2.3-.7-2.3-2.4v-7.9c0-2.5-1.1-4.4-4.3-4.4-2 0-4 1.2-5.9 2.9v-3h-.6l-5.1 2.6v.6h2.3V64c0 1.7-.3 2-2.3 2.4v.9h8.1v-.9z"/></g></svg></a>
					</div>

				</div>

			</header>
