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
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-touch-57x57.png?v=2">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-touch-60x60.png?v=2">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-touch-72x72.png?v=2">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-touch-76x76.png?v=2">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-touch-114x114.png?v=2">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-touch-120x120.png?v=2">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-touch-144x144.png?v=2">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-touch-152x152.png?v=2">
		<link rel="icon" type="image/png" sizes="144x144"  href="<?php echo get_template_directory_uri(); ?>/favicon/android-chrome-144x144.png?v=2">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-32x32.png?v=2">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-16x16.png?v=2">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicon/mstile-144x144.png?v=2">
		<meta name="theme-color" content="#ffffff">

		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/material-icons.css">

		<?php wp_head(); ?>

		<!-- crazy egg script -->
		<!-- <script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0075/8948.js" async="async"></script> -->

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
		<!-- Google Tag Manager -->
		<!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-WGQLLJ');</script> -->
		<!-- End Google Tag Manager -->
	</head>
	<body <?php body_class(); ?>>
		<!-- Google Tag Manager (noscript) -->
	<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WGQLLJ"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
	<!-- End Google Tag Manager (noscript) -->

	<a href="#maincontent" class="skiptomaincontent" title="Click here to skip to main content" aria-label="Click here to skip to main content">Skip to main content</a>

		<p class="testp" style="position:fixed;background:rgba(0,0,0,0.7);color:#fff;top:200px;left:0;font-weight:bold;font-size:20px;z-index:99999999;"></p>

		<div class="wrapper">

			<?php if(function_exists("wp_header")){wp_header();} ?><header>

				<?php

					// this will call the alerts micro-service and display any content that may be active
					$return = wp_remote_get('https://alerts.northeastern.edu/alert-panel/?campus=boston&cache=no');
					echo $return['body'];

				?>

				<div>



					<div id="nu__logo">
						<a href="<?=home_url()?>" title="Northeastern University - A University Like No Other" aria-label="Northeastern University - A University Like No Other"><svg id="northeastern logo svg" data-name="northeastern logo svg" aria-label="northeastern logo svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1323.07 387.6"><defs><style>.cls-1{fill:#fff;}.cls-2{fill:url(#linear-gradient);}.cls-3{fill:url(#linear-gradient-2);}.cls-4{fill:url(#linear-gradient-3);}</style><linearGradient id="linear-gradient" x1="125.93" y1="-271.36" x2="108.67" y2="-173.47" gradientTransform="matrix(1, 0, 0, -1, 0, 132)" gradientUnits="userSpaceOnUse"><stop offset="0.15" stop-color="#781012"/><stop offset="0.16" stop-color="#7b1113"/><stop offset="0.37" stop-color="#9c1a1d"/><stop offset="0.56" stop-color="#b51e23"/><stop offset="0.72" stop-color="#c52026"/><stop offset="0.84" stop-color="#cb2026"/></linearGradient><linearGradient id="linear-gradient-2" x1="135.68" y1="57.41" x2="109.38" y2="129.65" gradientTransform="matrix(1, 0, 0, -1, -0.93, 131.6)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#a32125"/><stop offset="0.14" stop-color="#b12126"/><stop offset="0.39" stop-color="#c42126"/><stop offset="0.56" stop-color="#cb2026"/></linearGradient><linearGradient id="linear-gradient-3" x1="512.56" y1="-279.88" x2="337.42" y2="201.3" gradientTransform="matrix(1, 0, 0, -1, 0, 132)" gradientUnits="userSpaceOnUse"><stop offset="0.15" stop-color="#670607"/><stop offset="0.15" stop-color="#690707"/><stop offset="0.25" stop-color="#841215"/><stop offset="0.35" stop-color="#9d191c"/><stop offset="0.46" stop-color="#b11d21"/><stop offset="0.57" stop-color="#c01f24"/><stop offset="0.69" stop-color="#c82026"/><stop offset="0.84" stop-color="#cb2026"/></linearGradient></defs><path class="cls-1" d="M83.26,141c4.5-.3,6.6-.3,11.09-.6,1.5,0,2.4.6,2.4,2.4v2.7a2.63,2.63,0,0,1-2.4,2.7c-6.89.3-10.19.6-17.09.89-1.49,0-2.39-.59-2.39-2.39V117.61a2.63,2.63,0,0,1,2.39-2.7,12.31,12.31,0,0,0,3.3-.3c1.5,0,2.4.6,2.4,2.4C83,126.6,83,131.4,83.26,141Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M118.63,147.89h-3a3,3,0,0,1-3.3-2.4c-4.5-12-6.6-17.69-10.79-29.68-.3-1.2.3-2.4,1.49-2.4h3.9c1.8,0,2.4.6,3,2.4,3,8.39,4.5,12.59,7.49,21,3-8.39,4.5-12.59,7.2-21.28.6-1.8,1.2-2.4,3-2.4h3.29c1.2,0,1.8,1.2,1.5,2.4-4.19,12-6.29,18-10.79,29.68C121,147.29,120.43,147.89,118.63,147.89Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M145.61,147.89a22.56,22.56,0,0,1-4.49-.3,1.33,1.33,0,0,1-.9-2.1c4.19-6,6-9,9.89-15.29-3.6-6-5.1-8.69-8.4-14.69a1.35,1.35,0,0,1,1.2-2.1,22.71,22.71,0,0,1,4.5.3c1.8,0,2.4.6,3.6,2.4,1.8,3.6,3,5.1,4.79,8.69,2.1-3.29,3-4.79,4.8-8.09.9-1.8,1.5-2.1,3.6-1.8a18.32,18.32,0,0,1,4.19.3c.9,0,1.5,1.2,1.2,2.1-3.59,5.4-5.09,8.39-8.69,13.79,3.9,6.59,6,9.59,9.89,16.19a1.34,1.34,0,0,1-1.2,2.09,25.7,25.7,0,0,1-4.79-.3c-2.1,0-2.7-.59-3.6-2.39-2.4-4.2-3.6-6.3-6-10.2-2.39,3.9-3.59,5.7-6,9.6C148,147.59,147.41,147.89,145.61,147.89Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M20.31,215.63a12.31,12.31,0,0,1-3.3.3c-1.8.3-2.7-.3-3.6-1.8C8.32,203,5.92,197.35,1.12,186.26a1.64,1.64,0,0,1,1.5-2.4c1.5-.3,2.4-.3,3.9-.6a2.59,2.59,0,0,1,3.3,1.8c3.29,7.79,5.09,12,8.39,19.78,2.7-8.69,4.2-13.19,6.9-21.88.59-1.8,1.19-2.4,3-2.7,1.5-.3,2.1-.3,3.6-.6a1.39,1.39,0,0,1,1.5,2.1c-3.9,12.29-6,18.59-10.19,30.88C22.71,214.73,22.11,215.63,20.31,215.63Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M49.09,212.34c-1.5,0-2.4-.6-2.4-2.1,0-11.69-.3-17.39-.3-29.08a2.63,2.63,0,0,1,2.4-2.7L68,177c1.5,0,2.4.6,2.4,2.1v2.4c0,1.5-.6,2.4-2.4,2.7-5.39.3-8.09.6-13.49,1.2v6c3.6-.3,5.7-.6,9.3-.9,1.49,0,2.39.6,2.39,2.1v2.1a2.63,2.63,0,0,1-2.39,2.7c-3.6.3-5.7.6-9.3.9v6.59c5.4-.3,8.1-.6,13.49-1.2,1.5,0,2.4.6,2.4,2.1v2.4a2.63,2.63,0,0,1-2.4,2.7C60.78,211.14,56.88,211.44,49.09,212.34Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M90.15,209.34H86.56c-1.5,0-2.4-.6-2.4-2.4V177.86a2.21,2.21,0,0,1,2.4-2.4c4.49,0,6.59-.3,11.09-.3,7.19-.3,12,3.9,12,10.2a9.59,9.59,0,0,1-5.4,9c2.7,4.8,4.2,7.19,6.9,12.29a1.35,1.35,0,0,1-1.2,2.1h-4.2c-2.1,0-2.7-.3-3.59-2.1-2.1-4.2-3.3-6.29-5.4-10.49h-3.9v10.49Q92.4,209.34,90.15,209.34Zm7.5-27.28a29.11,29.11,0,0,0-5.1.3v7.79a29.11,29.11,0,0,0,5.1-.3,3.72,3.72,0,0,0,3.6-3.89C101.25,183.56,99.75,182.06,97.65,182.06Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M125.53,208.74a2.21,2.21,0,0,1-2.4-2.4V177.26a2.21,2.21,0,0,1,2.4-2.4h3.59a2.21,2.21,0,0,1,2.4,2.4v29.08a2.21,2.21,0,0,1-2.4,2.4Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M155.2,209.64a2.21,2.21,0,0,1-2.39-2.4c0-9.59.3-14.39.3-24-3,0-4.5-.3-7.5-.3a2.21,2.21,0,0,1-2.4-2.4v-2.7a2.21,2.21,0,0,1,2.4-2.4c9.29.3,14.09.6,23.38,1.2a2.21,2.21,0,0,1,2.4,2.4v2.7a2.21,2.21,0,0,1-2.4,2.4c-3,0-4.49-.3-7.49-.3,0,9.59,0,14.39-.3,24a2.21,2.21,0,0,1-2.4,2.4A7.61,7.61,0,0,0,155.2,209.64Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M180.68,210.84c-1.49,0-2.09-.3-3.59-.3a1.64,1.64,0,0,1-1.5-2.4c5.09-11.39,7.79-17.09,12.59-28.48.6-1.8,1.5-2.1,3.3-2.1,1.5,0,2.09.3,3.29.3a3.52,3.52,0,0,1,3.3,2.7c4.5,12.29,6.6,18.29,11.09,30.58a1.39,1.39,0,0,1-1.5,2.1c-1.79,0-2.39-.3-4.19-.3a3.52,3.52,0,0,1-3.3-2.7l-1.5-4.5c-5.1-.6-7.79-.6-12.89-1.2a44,44,0,0,1-1.8,4.2C183.38,210.84,182.48,211.14,180.68,210.84Zm15.59-11.69c-1.5-4.5-2.4-6.9-3.89-11.4-1.8,4.2-2.4,6.3-4.2,10.5A74.4,74.4,0,0,0,196.27,199.15Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M37.4,274.39c-1.5,0-2.1.3-3.3.3-2.1.3-2.7-.3-3.6-1.8-5.09-11.39-7.79-17.09-12.59-28.18a1.64,1.64,0,0,1,1.5-2.4,19.81,19.81,0,0,1,4.2-.3,2.58,2.58,0,0,1,3.29,1.8c3.3,8.1,5.1,12,8.7,20.09,3-8.7,4.49-13.19,7.19-21.89a3.49,3.49,0,0,1,3.3-2.69c1.5,0,2.1-.3,3.6-.3a1.67,1.67,0,0,1,1.79,2.09C47.29,253.4,45.19,259.7,41,272,40.09,273.79,39.19,274.39,37.4,274.39Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M67.07,272c-1.8,0-2.7-.6-2.7-2.4-.29-11.69-.29-17.38-.59-29.08a2.62,2.62,0,0,1,2.39-2.69,14.61,14.61,0,0,0,3.6-.3c1.5,0,2.4.6,2.4,2.39.3,11.7.3,17.39.6,29.08a2.63,2.63,0,0,1-2.4,2.7A14.72,14.72,0,0,0,67.07,272Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M94.05,270.49h-3.6c-1.79,0-2.39-.9-2.39-2.4V239a2.21,2.21,0,0,1,2.39-2.4c4.5,0,6.9-.3,11.4-.3,7.49-.3,12.29,3.89,12.29,10.19a9.85,9.85,0,0,1-5.7,9c2.7,4.8,4.2,7.5,6.9,12.29a1.35,1.35,0,0,1-1.2,2.1h-4.5c-2.1,0-2.7-.3-3.6-2.1-2.4-4.19-3.29-6.29-5.69-10.49h-3.9v10.49C96.75,269.59,95.85,270.49,94.05,270.49Zm7.8-27.28h-5.4V251h5.4a4,4,0,0,0,3.89-3.9A3.78,3.78,0,0,0,101.85,243.21Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M135.42,270.19c-1.8,0-2.4-.9-2.4-2.4,0-9.59,0-14.39.3-24h-7.79a2.21,2.21,0,0,1-2.4-2.4v-2.69a2.21,2.21,0,0,1,2.4-2.4c9.59.3,14.39.3,24,.3a2.21,2.21,0,0,1,2.4,2.4v2.69a2.21,2.21,0,0,1-2.4,2.4h-7.8v24a2.2,2.2,0,0,1-2.39,2.4A17.11,17.11,0,0,0,135.42,270.19Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M178.29,272.29a12.31,12.31,0,0,1-3.3-.3,3,3,0,0,1-3.3-2.4c-4.49-12.29-6.59-18.28-11.09-30.27-.6-1.2.3-2.4,1.8-2.1,1.5,0,2.4.3,4.2.3a3,3,0,0,1,3.29,2.39c3,8.7,4.5,12.89,7.5,21.59,3.29-8.1,5.09-12.29,8.39-20.69.6-1.79,1.5-2.09,3.3-2.09a14.61,14.61,0,0,1,3.6.3,1.63,1.63,0,0,1,1.49,2.39c-4.79,11.69-7.19,17.39-12.29,28.78C181,272,180.09,272.29,178.29,272.29Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M230.15,210.24c2.09.3,3.59-.6,3.59-2.1,0-1.2-.6-2.1-2.09-3-1.2-.9-5.1-3.6-6.6-4.79-3.6-2.4-5.4-5.7-5.1-9.3.3-5.69,5.1-9.59,11.7-9a14.41,14.41,0,0,1,8.69,3.9,2.34,2.34,0,0,1,0,3.29c-.3.3-1.2,1.5-1.5,1.8-.9,1.2-2.1,1.2-3.3,0a6.45,6.45,0,0,0-3.89-1.8,2.84,2.84,0,0,0-3.3,2.1c0,1.2.6,2.1,2.1,3,1.2.9,5.09,3.6,6.59,4.8,3.6,2.69,5.4,5.69,5.1,9.29-.3,6.29-5.4,9.59-12,9a18.34,18.34,0,0,1-10.8-5.09,2.26,2.26,0,0,1,0-3.6l1.8-1.8c1.2-1.2,2.1-.9,3.3,0A8.74,8.74,0,0,0,230.15,210.24Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M212.76,268.69c2.1.3,3.6-.6,3.6-2.1,0-1.2-.6-2.09-2.1-3s-5.1-3.6-6.3-4.5a10.73,10.73,0,0,1-5.09-9.29c.3-5.7,5.09-9.6,11.69-9a14.2,14.2,0,0,1,8.39,3.6,2.35,2.35,0,0,1,0,3.3c-.3.3-1.2,1.5-1.5,1.8-.9,1.2-2.1,1.2-3.29.3a6.45,6.45,0,0,0-3.9-1.8,2.84,2.84,0,0,0-3.3,2.1c0,1.2.6,2.1,2.1,3s5.1,3.6,6.29,4.5c3.6,2.7,5.1,5.7,5.1,9.29-.3,6.3-5.39,9.6-12,9a16.39,16.39,0,0,1-10.49-4.8,2.25,2.25,0,0,1,0-3.6l1.8-1.8c1.2-1.19,2.1-.89,3.29,0A11.73,11.73,0,0,0,212.76,268.69Z" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M1159.43,305.26l19.78-43.46c3.9-8.7,5.1-10.49,9.29-11.39v-3h-20.68v3c6.9,1.5,7.5,4.79,4.5,12.29l-8.1,18.88-9.89-22.18c-2.1-4.8-1.8-7.79,5.4-8.69v-3.3h-27.58v3.3c3.3.9,4.49,2.09,7.19,8.09l17.39,37.77-3,6.3c-1.8,3.59-3.3,6.29-5.09,8.09-1.2-4.2-3.6-6.6-7.5-6.6s-6.89,2.4-6.89,7.5a8.5,8.5,0,0,0,8.69,8.69c7.19-.6,11.39-3.89,16.49-15.29m-27.88-13.19-1.5-3.29a19.37,19.37,0,0,1-7.49,1.8c-4.8,0-6.3-2.4-6.3-6V253.1h13.19v-6h-13.19v-9.59h-1.8l-18.88,12.29v3.29h7.49v34.18c0,6.89,3.9,10.49,11.39,10.49a27.29,27.29,0,0,0,17.09-5.7m-39.87,1.5c-6.6-.9-7.49-2.4-7.49-8.09V245.31h-5.1l-15.29,9.89v2.4h7.5v27.58c0,5.7-.9,7.19-7.5,8.09v3.3h27.88v-3ZM1077,237.82a8.06,8.06,0,0,0,8.09-8.1,7.1,7.1,0,0,0-7.19-7.19,8.06,8.06,0,0,0-8.09,8.09,7.1,7.1,0,0,0,7.19,7.2m-18.28,43.76c0-9.59-8.1-12.89-15.59-15.29s-12.59-3.89-12.59-9.29c0-3,2.1-5.69,6.59-5.69,5.4,0,9.89,3.29,15.59,9.59l2.7-1.2-3.9-12.89h-1.8l-1.8,1.5a26.43,26.43,0,0,0-9.89-2.1c-11.09,0-18.28,6.29-18.28,15.89s8.09,12.59,15.58,15,12.59,3.89,12.59,9.59c0,3.6-2.69,6-7.49,6-6.9,0-12.29-4.49-18.59-12.89l-2.69.9,4.19,16.19h1.8l3-2.1a24.87,24.87,0,0,0,11.69,2.7c9.89.3,18.89-5.7,18.89-15.89m-54.56,12c-6.9-.9-7.8-2.4-7.8-9V263a29,29,0,0,1,6.3-8.4c0,4.2,2.7,6.6,6.29,6.6s6.9-2.7,6.9-8.4c0-4.49-2.7-7.49-7.2-7.49-5.09,0-9,4.2-12.89,10.49V245.31h-4.49L976,255.2v2.4h7.19v27.88c0,5.69-.9,7.19-6.89,8.09v3.3h27.58v-3.3ZM938.8,265.1c0-8.4,3.6-13.49,10.49-13.49,4.8,0,7.79,3.59,9,10.19l-19.48,6.59V265.1m32.67,22.48-2.7-2.1a15.59,15.59,0,0,1-12,5.4c-9.59,0-15-7.2-17.08-16.79l31.47-10.49c-.6-11.1-8.69-17.09-19.18-17.09-14.39,0-25.18,11.69-25.18,26.38,0,14.39,9.29,25.48,25.48,25.48,9.59-.6,15.59-4.8,19.18-10.79M916.62,261.8c3.89-8.7,5.09-10.49,9.29-11.39v-3H905.22v3c6.9,1.5,7.5,4.79,4.5,12.29l-8.09,18.88-9.9-22.18c-2.09-4.8-1.79-7.79,5.4-8.69v-3.3H869.85v3.3c3.3.9,4.5,2.09,7.2,8.09l18,38.67h5.4ZM869,293.57c-6.59-.9-7.49-2.4-7.49-8.09V245.31h-5.1l-15.29,9.89v2.4h7.5v27.58c0,5.7-.9,7.19-7.5,8.09v3.3H869v-3Zm-15-55.75a8.07,8.07,0,0,0,8.1-8.1,7.1,7.1,0,0,0-7.2-7.19,8.06,8.06,0,0,0-8.09,8.09,7.1,7.1,0,0,0,7.19,7.2M801.2,293.57c-6-.9-6.89-2.4-6.89-8.09V261.2c5.1-4.8,9.59-6.9,13.19-6.9,5.1,0,6.59,2.7,6.59,7.2v24c0,5.69-.89,7.19-6.89,8.09v3.3h27v-3.3c-6-.9-6.9-2.4-6.9-8.09V260.6c0-8.39-3.59-14.39-14.08-14.39-6.6,0-12.89,3.9-19.19,9.29v-9.89h-4.8l-15.28,9.89v2.4h7.19v27.88c0,5.69-.9,7.19-6.89,8.09v3.3h27v-3.6ZM687.29,232.12V263.6c0,20.38,10.49,34.47,37.17,34.47S761.64,284,761.64,264.2V239c0-12.3,3.59-15.29,9.29-17.09v-3.3H745.75v3.3c6,1.8,9.29,4.79,9.29,17.09V264.2c0,17.68-9.29,25.78-27,25.78-17.39,0-27-8.1-27-25.78V232.42c0-8.09,2.4-9.29,9-10.19v-3.6H678.3v3.6c6.89.6,9,2.1,9,9.89" transform="translate(-0.93 -0.4)"/><path class="cls-1" d="M1291,180.26c-6-.9-6.9-2.4-6.9-8.09V147.89c5.1-4.8,9.59-6.9,13.19-6.9,5.1,0,6.6,2.7,6.6,7.2v24c0,5.69-.9,7.19-6.9,8.09v3.3h27v-3.3c-6-.9-6.89-2.4-6.89-8.09V147.29c0-8.4-3.6-14.39-14.09-14.39-6.6,0-12.89,3.89-19.19,9.29V132.3H1279l-15.28,9.89v2.4h7.19v27.88c0,5.69-.9,7.19-6.89,8.09v3.3h27v-3.6Zm-41.67,0c-6.9-.9-7.8-2.4-7.8-9V149.68a29.06,29.06,0,0,1,6.3-8.39c0,4.2,2.7,6.6,6.29,6.6s6.9-2.7,6.9-8.4c0-4.49-2.7-7.49-7.2-7.49-5.09,0-9,4.19-12.89,10.49V132h-4.49l-15.29,9.89v2.4h7.19v27.88c0,5.69-.9,7.19-6.89,8.09v3.3h27.58v-3.3Zm-65.65-28.48c0-8.39,3.6-13.49,10.49-13.49,4.8,0,7.79,3.6,9,10.2l-19.48,6.59v-3.3m33,22.49-2.69-2.1a15.65,15.65,0,0,1-12,5.39c-9.59,0-15-7.19-17.08-16.78l31.47-10.5c-.6-11.09-8.69-17.08-19.18-17.08-14.39,0-25.18,11.69-25.18,26.38,0,14.39,9.29,25.48,25.48,25.48,9.59-.3,15.59-4.8,19.18-10.79m-48.56,4.49-1.5-3.3a19.33,19.33,0,0,1-7.49,1.8c-4.8,0-6.3-2.4-6.3-6V140.09H1166v-6h-13.19v-9.6H1151l-18.88,12.29v3.3h7.49v34.18c0,6.89,3.9,10.49,11.39,10.49a27,27,0,0,0,17.09-6m-39.57-10.49c0-9.59-8.09-12.89-15.59-15.29s-12.59-3.9-12.59-9.29c0-3,2.1-5.7,6.6-5.7,5.39,0,9.89,3.3,15.59,9.6l2.69-1.2-3.89-12.89h-1.8l-1.8,1.5a26.51,26.51,0,0,0-9.89-2.1c-11.09,0-18.29,6.29-18.29,15.89s8.1,12.59,15.59,15,12.59,3.9,12.59,9.6c0,3.59-2.7,6-7.49,6-6.9,0-12.3-4.5-18.59-12.89l-2.7.9,4.2,16.19h1.8l3-2.1a24.91,24.91,0,0,0,11.7,2.7c10.19.6,18.88-5.7,18.88-15.89m-80.34,1.8c0-5.4,2.4-7.8,14.69-11.09v15.29c-3,2.39-5.39,3.29-8.09,3.29-4.2,0-6.6-2.4-6.6-7.49m23.09,14.09c4.49,0,9.29-2.1,12.59-4.2l-.9-3c-5.1.9-6.9.3-6.9-3.29V145.79c0-8.4-3.6-12.89-15.59-12.89-13.19,0-23.08,7.19-23.08,13.79a5.66,5.66,0,0,0,6,6,6.64,6.64,0,0,0,6.89-5.69c.6-3.3-.3-5.7-2.1-6.9a18.79,18.79,0,0,1,8.1-1.8c4.49,0,6.59,1.5,6.59,5.7v10.49c-18.58,4.5-27.28,8.69-27.28,18.59,0,7.49,4.8,11.69,12.59,11.69,4.8,0,10.5-2.1,15.29-6,.9,3.3,3.3,5.4,7.8,5.4M997,151.78c0-8.39,3.6-13.49,10.49-13.49,4.8,0,7.8,3.6,9,10.2L997,155.08v-3.3m32.68,22.49-2.7-2.1a15.63,15.63,0,0,1-12,5.39c-9.59,0-15-7.19-17.09-16.78l31.48-10.5c-.6-11.09-8.7-17.08-19.19-17.08-14.39,0-25.18,11.69-25.18,26.38,0,14.39,9.3,25.48,25.48,25.48,9.89-.3,15.89-4.8,19.19-10.79m-83,6c-6-.9-6.89-2.4-6.89-8.09V147.89c5.09-4.5,9-6.9,13.19-6.9,5.09,0,6.59,2.7,6.59,7.2v24c0,5.69-.9,7.19-6.89,8.09v3.3h27v-3.3c-6-.9-6.9-2.4-6.9-8.09V147.29c0-8.4-3.6-14.39-14.09-14.39-6.29,0-12.59,3.89-18.88,9V100.52h-3.9L919,111.61V114h7.5v58.46c0,5.69-.9,7.19-6.9,8.09v3.3h27Zm-30-1.5-1.5-3.3a19.37,19.37,0,0,1-7.5,1.8c-4.79,0-6.29-2.4-6.29-6V140.09h13.19v-6H901.33v-9.6h-1.8l-18.89,12.29v3.3h7.5v34.18c0,6.89,3.89,10.49,11.39,10.49a28.25,28.25,0,0,0,17.09-6m-51.27,1.5c-6.89-.9-7.79-2.4-7.79-9V149.68a29.06,29.06,0,0,1,6.3-8.39c0,4.2,2.69,6.6,6.29,6.6s6.9-2.7,6.9-8.4c0-4.49-2.7-7.49-7.2-7.49-5.09,0-9,4.19-12.89,10.49V132h-4.5l-15.28,9.89v2.4h7.19v27.88c0,5.69-.9,7.19-6.89,8.09v3.3h27.58v-3.3Zm-75.54-26.68c0-9.29,4.2-15.29,12.59-15.29,11.1,0,14.39,13.49,14.39,26.08,0,9.3-4.19,15.29-12.59,15.29-11.09-.3-14.39-13.79-14.39-26.08m39.87,4.5c0-13.79-9.29-25.18-26.08-25.18-17.08,0-27,12.29-27,26.38,0,13.79,9.3,25.18,26.08,25.18,17.09.3,27-12,27-26.38m-68-32.68c0-12.29,3.59-15.28,9.29-17.08V105H745.75v3.3c6,1.8,9.29,4.79,9.29,17.08v36.87l-53.36-54c-3-3-4.2-3.3-6-3.3H675.9v3.3c4.2.3,6.9,2.09,11.69,6.89a8.45,8.45,0,0,1,3,6.3v42c0,12.29-3.6,15.29-9.29,17.09v3.3h25.18v-3.3c-6-1.8-9.29-4.8-9.29-17.09V123.6l59.95,60.26h4.2V125.4Z" transform="translate(-0.93 -0.4)"/><path class="cls-2" d="M213.06,378.41V388H31.7v-9.59c39.87-15,65.35-33.28,76.44-72.85h28.48C148,345.13,173.49,363.42,213.06,378.41Z" transform="translate(-0.93 -0.4)"/><rect class="cls-3" x="113.8" width="15.59" height="76.14"/><path class="cls-4" d="M561.39.4a289.34,289.34,0,0,1,1.5,29.08V271.09L279.91.4h-134l411,387.6h21.29V29.48A289.34,289.34,0,0,1,579.68.4Z" transform="translate(-0.93 -0.4)"/></svg></a>
					</div>

					<nav class="nu__mainmenu" aria-label="main menu">

						<?php get_template_part('loops/loop-dropdowns'); ?>

						<div id="nu__mainmenu-search">
							<a id="nu__search-toggle" href="search" title="Click to search all of Northeastern University" aria-label="Click to search all of Northeastern University" aria-haspopup="true" class="js__mainmenu-item" data-title="Search"></a>
							<?php get_template_part('loops/loop-searchnav'); ?>
						</div>

						<div id="nu__mainmenu-supernav">
							<a id="nu__supernav-toggle" href="mainmenu" title="Click to show/hide main menu" aria-label="Click to show/hide main menu" aria-haspopup="true" class="js__mainmenu-item" data-title="Menu"></a>
							<?php if(get_query_var('pagename') != 'main-menu'){ get_template_part('loops/loop-supernav'); } ?>
						</div>

					</nav>

				</div>

			</header>

			<a name="maincontent" id="maincontent"></a>
