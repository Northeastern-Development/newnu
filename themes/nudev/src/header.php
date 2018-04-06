<?php
	// error_reporting(E_ALL);
?>
<!-- <!doctype html> -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

						<div id="nu__mainmenu-search">
							<input id="nu__search-toggle" type="checkbox" title="Click to search all of Northeastern University" />
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
						<a href="<?=home_url()?>" title="Northeastern University - A University Like No Other"><svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 445.35 102.74"><defs><style>.cls-1{fill:#fff;}.cls-2{fill:none;}.cls-3{fill:url(#linear-gradient);}.cls-4{fill:url(#linear-gradient-2);}.cls-5{fill:url(#linear-gradient-3);}</style><linearGradient id="linear-gradient" x1="60.97" y1="-71.09" x2="152.46" y2="93.79" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#e11a2c"/><stop offset="0.09" stop-color="#d6192a"/><stop offset="0.71" stop-color="#860e19"/><stop offset="1" stop-color="#660a13"/></linearGradient><linearGradient id="linear-gradient-2" x1="3.88" y1="-39.41" x2="95.37" y2="125.46" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-3" x1="31.7" y1="82.75" x2="31.7" y2="110.16" xlink:href="#linear-gradient"/></defs><polygon class="cls-1" points="25.57 39.68 21.93 39.86 21.58 32.86 19.37 32.97 19.82 41.96 25.67 41.67 25.57 39.68"/><polygon class="cls-1" points="33.44 32.56 31.21 38.76 28.88 32.6 26.53 32.61 30.09 41.65 32.22 41.63 35.66 32.55 33.44 32.56"/><polygon class="cls-1" points="39.5 41.69 41.58 38.59 43.38 41.86 45.94 41.98 43.14 37.16 46.12 32.98 43.64 32.87 41.82 35.58 40.24 32.72 37.67 32.6 40.25 37.03 37.03 41.58 39.5 41.69"/><polygon class="cls-1" points="6.81 59.5 9.05 50.05 6.85 50.35 5.44 56.79 2.33 50.97 0 51.29 4.69 59.79 6.81 59.5"/><polygon class="cls-1" points="19.35 58.18 19.19 56.26 15 56.61 14.86 54.88 17.95 54.62 17.79 52.78 14.71 53.03 14.58 51.48 18.77 51.13 18.61 49.21 12.2 49.75 12.95 58.71 19.35 58.18"/><path class="cls-1" d="M25.43,54.65l1,0L28.23,58l2.41-.08L28.5,54.08a2.47,2.47,0,0,0,1.43-2.38C29.87,50,28.6,48.94,26.66,49L23,49.12l.29,9L25.54,58Zm-.12-3.79,1.36,0a1,1,0,0,1,.07,2l-1.37,0Z" transform="translate(-0.67 -0.12)"/><rect class="cls-1" x="30.22" y="52.3" width="8.99" height="2.22" transform="translate(-19.64 87.57) rotate(-89.54)"/><polygon class="cls-1" points="42.95 58.05 43.28 51.06 45.95 51.18 46.05 49.2 38.49 48.84 38.39 50.83 41.06 50.95 40.73 57.95 42.95 58.05"/><path class="cls-1" d="M55.94,59.16l-2.65-9.35-2.19-.2-4.33,8.7,2.22.2.78-1.67,3.36.31.47,1.79Zm-5.38-4,1.32-2.8.78,3Z" transform="translate(-0.67 -0.12)"/><path class="cls-1" d="M62.05,52.62a2.37,2.37,0,0,1,1.39.94l1.44-1.26a3.74,3.74,0,0,0-2.56-1.53A2.71,2.71,0,0,0,59.08,53a2.65,2.65,0,0,0,1.12,2.53l1.59,1.31c.34.28.5.52.45.83s-.44.61-1,.54a3.14,3.14,0,0,1-1.88-1.36L58,58.12a4.28,4.28,0,0,0,3.07,2,2.72,2.72,0,0,0,3.34-2.25,2.64,2.64,0,0,0-1.13-2.5L61.66,54c-.37-.3-.5-.51-.45-.84A.68.68,0,0,1,62.05,52.62Z" transform="translate(-0.67 -0.12)"/><polygon class="cls-1" points="9.93 72.43 6.96 66.54 4.62 66.81 9.12 75.42 11.24 75.18 13.71 65.77 11.49 66.02 9.93 72.43"/><rect class="cls-1" x="17.8" y="65.6" width="2.22" height="9" transform="translate(-5.47 1.36) rotate(-3.96)"/><path class="cls-1" d="M30.7,67.89c-.05-1.67-1.31-2.76-3.25-2.71l-3.63.11.26,9,2.21-.06-.1-3.4,1,0L29,74.14l2.41-.07-2.12-3.8A2.47,2.47,0,0,0,30.7,67.89ZM27.51,69l-1.37,0-.05-2,1.36,0a1,1,0,0,1,1,1A.94.94,0,0,1,27.51,69Z" transform="translate(-0.67 -0.12)"/><polygon class="cls-1" points="32.44 66.95 35.11 67 34.98 74 37.2 74.04 37.33 67.04 40.01 67.09 40.04 65.09 32.48 64.95 32.44 66.95"/><path class="cls-1" d="M48.66,71.25a1.49,1.49,0,0,1-1.61,1.47A1.47,1.47,0,0,1,45.67,71l.38-5.54-2.22-.15-.38,5.55a3.69,3.69,0,0,0,7.37.51l.38-5.55L49,65.71Z" transform="translate(-0.67 -0.12)"/><path class="cls-1" d="M57.47,68.23a2.31,2.31,0,0,1,1.4.91l1.41-1.3a3.73,3.73,0,0,0-2.59-1.47,2.72,2.72,0,0,0-3.19,2.31,2.68,2.68,0,0,0,1.18,2.5l1.62,1.26c.34.28.51.52.47.82s-.42.63-.93.56a3.07,3.07,0,0,1-1.91-1.31l-1.42,1.31a4.31,4.31,0,0,0,3.12,1.87,2.71,2.71,0,0,0,3.28-2.33,2.66,2.66,0,0,0-1.18-2.47l-1.62-1.27c-.38-.29-.51-.5-.47-.83A.67.67,0,0,1,57.47,68.23Z" transform="translate(-0.67 -0.12)"/><path class="cls-2" d="M162.09.79c0,13,0,77.48,0,102.06H165V.12H162.1C162.1.34,162.09.56,162.09.79Z" transform="translate(-0.67 -0.12)"/><path class="cls-2" d="M157.93.79V.12H76.58c27.27,26.58,70.06,68.23,81.35,79.23Z" transform="translate(-0.67 -0.12)"/><path class="cls-2" d="M34.7.12l0,24h-4.5c0-9.27,0-17.88-.05-24H25.43V102.85h120L38.86.12Z" transform="translate(-0.67 -0.12)"/><path class="cls-3" d="M162.09.79c0-.23,0-.45,0-.67h-4.17V79.35C146.64,68.35,103.85,26.7,76.58.12H38.86l106.6,102.73H162.1C162.1,78.27,162.12,13.78,162.09.79Z" transform="translate(-0.67 -0.12)"/><path class="cls-4" d="M34.75,24.13l0-24H30.2c0,6.13,0,14.74.05,24Z" transform="translate(-0.67 -0.12)"/><path class="cls-2" d="M5.29,79.35v23.5h5V99.07c7.81,0,17.49-4.23,19.64-16.32h5.16C36.4,94.61,42.46,99.29,53,99.19l.07,3.66h7.19V79.35Z" transform="translate(-0.67 -0.12)"/><path class="cls-5" d="M35.11,82.75H30C27.8,94.84,18.12,99.07,10.31,99.07v3.78H53.09L53,99.19C42.46,99.29,36.4,94.61,35.11,82.75Z" transform="translate(-0.67 -0.12)"/><path class="cls-1" d="M304.3,69.07c7.88,0,10.85-4.51,10.85-11.62V50.56c0-3.49,1-4.42,3-5v-.87h-7.75v.87c2,.54,3,1.47,3,5v6.89c0,6.53-2.73,9.44-8.4,9.44-5.95,0-8.71-2.56-8.71-9.44V48.61c0-2.21.58-2.63,2.79-3v-.93h-9.29v.93c2.21.32,2.79.74,2.79,3v8.84c0,7.78,3.62,11.62,11.69,11.62m23.09-1.18c-2.05-.32-2.31-.67-2.31-2.37V57.67c1.73-1.57,3-2.3,4.45-2.3,1.64,0,2.09.89,2.09,2.46v7.69c0,1.7-.26,2-2.31,2.37v.86h8.13v-.86c-2.05-.32-2.3-.67-2.3-2.37V57.64c0-2.5-1.06-4.39-4.26-4.39-2,0-4,1.25-5.89,2.88v-3h-.64l-5.1,2.56v.61h2.31v9.26c0,1.7-.26,2-2.31,2.37v.86h8.14Zm16.2-17.71A2.22,2.22,0,0,0,345.8,48a2,2,0,0,0-1.95-2,2.2,2.2,0,0,0-2.24,2.21,2,2,0,0,0,2,2m4.52,17.71c-2.18-.35-2.47-.67-2.47-2.37V53.09H345l-5.5,1.28v.87h2.62V65.52c0,1.7-.29,2-2.47,2.37v.86h8.46Zm14.54-10c1.18-2.66,1.7-3.27,3-3.59v-.74h-6.38v.74c2,.51,2.63,1.82,1.64,4.1l-2.66,6.15L355,57.19c-.64-1.5-.57-2.5,1.76-2.75v-.87h-8v.87c1,.25,1.37.67,2.21,2.49l5.41,12h1.41Zm17.1,8.77-.32-.54a7.17,7.17,0,0,1-3.33.83,5.84,5.84,0,0,1-5.86-4c-.16-.45-.29-.86-.42-1.28L379.43,58c-.32-3.2-2.43-4.77-5.44-4.77-4.3,0-7.31,3.46-7.31,8.07,0,4.81,3.17,7.75,7.37,7.75a7.93,7.93,0,0,0,5.7-2.4m-8-11.66c2-.67,3.81.19,4.38,2.66l-6.63,2.56c-.32-2.62.52-4.61,2.25-5.22m18.16,12.88c-2.63-.42-2.95-.77-2.95-2.69V58.76A6.54,6.54,0,0,1,389.33,56a2,2,0,0,0,2,1.57,1.94,1.94,0,0,0,1.89-2.12A2.12,2.12,0,0,0,391,53.25c-1.47,0-2.69,1.28-4.07,3.52V53.09h-.64l-5.09,2.56v.61h2.31v9.26c0,1.7-.26,2-2.31,2.37v.86h8.78Zm16.36-3.65c0-5.42-8.84-4-8.84-7.72a1.86,1.86,0,0,1,2.08-1.92c1.7,0,3.24,1,5.1,3.2l.7-.39-1.38-4h-.41l-.61.45a10.66,10.66,0,0,0-3.33-.61c-3,0-5.06,2-5.06,4.71,0,5.41,8.84,4,8.84,7.72,0,1.12-.77,2-2.76,2s-3.39-1.41-5.41-4l-.74.29,1.28,4.9h.42l.87-.54a8.15,8.15,0,0,0,3.55.7c3,0,5.7-1.85,5.7-4.83m6-14.06A2.22,2.22,0,0,0,414.5,48a2,2,0,0,0-1.95-2,2.21,2.21,0,0,0-2.25,2.21,2,2,0,0,0,2,2m4.52,17.71c-2.18-.35-2.47-.67-2.47-2.37V53.09h-.64l-5.51,1.28v.87h2.63V65.52c0,1.7-.29,2-2.47,2.37v.86h8.46ZM428,67c-3,.67-4,.07-4-1.79V55.62h3.87V54.21H424V50.5h-.64L418.15,55v.61h2.31V65.87c0,2.08,1,3.2,2.88,3.2a9.41,9.41,0,0,0,4.87-1.34Zm9,4.61,6.12-13.7c1.18-2.66,1.69-3.27,2.94-3.59v-.74h-6.37v.74c2,.51,2.63,1.82,1.63,4.1l-2.69,6.15-3.2-7.37c-.64-1.5-.58-2.5,1.76-2.75v-.87h-8v.87c1,.25,1.37.67,2.21,2.49l5.34,11.82-1,2.21a6.15,6.15,0,0,1-1.35,2.12c-.38-1.29-1.12-2-2.21-2a2,2,0,0,0-2,2.15,2.49,2.49,0,0,0,2.49,2.53c1.64,0,2.92-1,4.36-4.2" transform="translate(-0.67 -0.12)"/><path class="cls-1" d="M107.4,49.21c0-3.49,1-4.42,3-5v-.87h-7.75v.87c2,.54,3,1.47,3,5V62L88.76,44.18c-.7-.73-1-.8-1.6-.8h-5.6v.87a5.84,5.84,0,0,1,3.65,1.82,2.24,2.24,0,0,1,1,1.76V61.57c0,3.49-1,4.42-3,5v.86h7.75v-.86c-2-.55-3-1.48-3-5V48.41l18.41,19.15h1.09Zm12.91,18.51a7.84,7.84,0,0,0,8.16-8.1c0-4.2-2.78-7.72-7.84-7.72a7.85,7.85,0,0,0-8.17,8.1c0,4.2,2.79,7.72,7.85,7.72m1.12-1.54c-2.92.45-4.81-1.21-5.41-5.54s.73-6.79,3.45-7.2c2.92-.45,4.78,1.25,5.42,5.57s-.74,6.73-3.46,7.17m18.35.36c-2.63-.42-2.95-.77-2.95-2.69V57.41a6.68,6.68,0,0,1,2.34-2.72,2,2,0,0,0,2,1.57,1.94,1.94,0,0,0,1.89-2.12,2.13,2.13,0,0,0-2.28-2.24c-1.47,0-2.69,1.28-4.06,3.52V51.74h-.64L131,54.3v.61h2.31v9.26c0,1.69-.26,2-2.31,2.37v.86h8.78Zm14.47-.9c-3,.67-4,.06-4-1.79V54.27h3.88V52.86h-3.88V49.15h-.64l-5.19,4.51v.61h2.31V64.52c0,2.08,1,3.2,2.88,3.2a9.38,9.38,0,0,0,4.87-1.34Zm9.77.9c-2.05-.32-2.3-.68-2.3-2.37V56.32c1.73-1.57,3-2.31,4.45-2.31,1.63,0,2.08.9,2.08,2.47v7.69c0,1.69-.26,2-2.31,2.37v.86h8.14v-.86c-2.05-.32-2.31-.68-2.31-2.37V56.29c0-2.5-1.05-4.39-4.26-4.39-1.95,0-3.9,1.19-5.79,2.79V42.45h-.64L155.89,45v.61h2.3V64.17c0,1.69-.25,2-2.3,2.37v.86H164Zm25-1.22-.33-.54a7.14,7.14,0,0,1-3.33.83,5.84,5.84,0,0,1-5.86-4c-.16-.45-.28-.86-.41-1.28l9.6-3.62c-.32-3.2-2.43-4.77-5.44-4.77C179,51.9,176,55.36,176,60c0,4.81,3.17,7.75,7.36,7.75a8,8,0,0,0,5.71-2.4m-8-11.66c1.95-.67,3.81.19,4.39,2.66l-6.63,2.56c-.32-2.62.51-4.61,2.24-5.22m20.43,13.87a8.53,8.53,0,0,0,3.49-.9l-.12-.64c-1.7.19-2.18-.13-2.18-1.25V55.42c0-2.3-1.22-3.52-4.55-3.52-3.91,0-6.72,2-6.72,3.91a1.55,1.55,0,0,0,1.76,1.57,2,2,0,0,0,2.11-2.24,2,2,0,0,0-.45-1.29,5.31,5.31,0,0,1,2.53-.57,1.63,1.63,0,0,1,1.86,1.86V58.4c-5.41,1.28-8.52,2.44-8.52,5.8,0,2.24,1.47,3.52,3.75,3.52a8.48,8.48,0,0,0,5-2.08,1.83,1.83,0,0,0,2.08,1.89m-7.36-4.07c0-1.82.83-2.66,5.09-3.81v4.87a5.47,5.47,0,0,1-3.08,1.38c-1.37,0-2-.68-2-2.44m24.72-.57c0-5.42-8.84-4-8.84-7.72a1.86,1.86,0,0,1,2.08-1.92c1.7,0,3.24,1,5.1,3.2l.7-.39-1.38-4h-.41l-.61.45a10.66,10.66,0,0,0-3.33-.61c-3,0-5.06,2-5.06,4.71,0,5.41,8.84,4,8.84,7.72,0,1.12-.77,2-2.76,2s-3.39-1.41-5.41-4l-.74.29,1.28,4.9h.42l.87-.54a8.15,8.15,0,0,0,3.55.7c3,0,5.7-1.86,5.7-4.83M230,65.64c-3,.67-4,.06-4-1.79V54.27h3.87V52.86H226V49.15h-.65l-5.18,4.51v.61h2.3V64.52c0,2.08,1,3.2,2.88,3.2a9.35,9.35,0,0,0,4.87-1.34Zm15-.32-.32-.54a7.17,7.17,0,0,1-3.33.83,5.84,5.84,0,0,1-5.86-4c-.16-.45-.29-.86-.42-1.28l9.61-3.62c-.32-3.2-2.43-4.77-5.45-4.77C235,51.9,232,55.36,232,60c0,4.81,3.17,7.75,7.37,7.75a8,8,0,0,0,5.7-2.4m-8-11.66c2-.67,3.82.19,4.39,2.66l-6.63,2.56c-.32-2.62.52-4.61,2.24-5.22m18.16,12.88c-2.62-.42-2.94-.77-2.94-2.69V57.41a6.54,6.54,0,0,1,2.34-2.72,2,2,0,0,0,2,1.57,1.94,1.94,0,0,0,1.89-2.12,2.12,2.12,0,0,0-2.27-2.24c-1.47,0-2.69,1.28-4.07,3.52V51.74h-.64l-5.09,2.56v.61h2.3v9.26c0,1.69-.25,2-2.3,2.37v.86h8.77Zm12.85,0c-2.05-.32-2.31-.68-2.31-2.37V56.32c1.73-1.57,3-2.31,4.45-2.31,1.64,0,2.08.9,2.08,2.47v7.69c0,1.69-.25,2-2.3,2.37v.86h8.13v-.86c-2.05-.32-2.3-.68-2.3-2.37V56.29c0-2.5-1.06-4.39-4.26-4.39-2,0-4,1.25-5.9,2.88v-3H265l-5.09,2.56v.61h2.31v9.26c0,1.69-.26,2-2.31,2.37v.86h8.14Z" transform="translate(-0.67 -0.12)"/></svg></a>
					</div>

				</div>

			</header>
