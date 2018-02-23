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

		<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/smoothstate.js'></script>
		<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/velocity.js'></script>
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



					<div id="logo">
						<a href="<?=home_url()?>" title="Northeastern University System"><img src="<?=home_url()?>/wp-content/uploads/logo.png" alt="northeastern university logo" />
							<!-- <svg width="430px" height="57px" viewBox="0 0 430 57" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							    <defs>
							        <polygon id="path-1" points="0.165111111 13.3333333 8.53955556 13.3333333 8.53955556 0.568 0.165111111 0.568"></polygon>
							    </defs>
							    <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <g id="Global-Nav" transform="translate(-261.000000, -25.000000)">
							            <g id="NU-EA-logo">
							                <g transform="translate(261.000000, 25.000000)">
							                    <g id="logo" transform="translate(0.000000, 40.000000)">
							                        <polygon id="Fill-49" fill="#FEFEFE" points="0.200777778 0.389555556 8.553 0.389555556 8.553 2.15511111 2.19188889 2.15511111 2.19188889 7.22511111 8.18966667 7.22511111 8.18966667 8.99066667 2.19188889 8.99066667 2.19188889 14.7851111 8.82411111 14.7851111 8.82411111 16.5506667 0.200777778 16.5506667"></polygon>
							                        <polygon id="Fill-51" fill="#FEFEFE" points="9.95233333 4.41844444 12.0345556 4.41844444 14.2301111 8.74288889 16.4478889 4.41844444 18.5301111 4.41844444 15.3612222 10.2351111 18.6434444 16.5506667 16.5612222 16.5506667 14.139 11.7528889 11.8078889 16.5506667 9.72566667 16.5506667 13.0534444 10.2351111"></polygon>
							                        <path d="M21.492,0.887555556 L23.3931111,0.887555556 L23.3931111,4.41866667 L25.4986667,4.41866667 L25.4986667,5.912 L23.3931111,5.912 L23.3931111,13.6986667 C23.3931111,14.672 23.6431111,15.0564444 24.6386667,15.0564444 C25.0453333,15.0564444 25.272,15.012 25.4753333,14.9886667 L25.4753333,16.5508889 C25.2264444,16.5964444 24.7286667,16.6864444 23.9364444,16.6864444 C21.9675556,16.6864444 21.492,15.8708889 21.492,14.2875556 L21.492,5.912 L19.7264444,5.912 L19.7264444,4.41866667 L21.492,4.41866667 L21.492,0.887555556 Z" id="Fill-53" fill="#FEFEFE"></path>
							                        <g id="Group-57" transform="translate(26.666667, 3.534111)">
							                            <mask id="mask-2" fill="white">
							                                <use xlink:href="#path-1"></use>
							                            </mask>
							                            <g id="Clip-56"></g>
							                            <path d="M6.54733333,5.68355556 L6.54733333,5.02688889 C6.54733333,3.66911111 6.11733333,2.06133333 4.44177778,2.06133333 C2.45066667,2.06133333 2.224,4.50577778 2.224,5.23022222 L2.224,5.68355556 L6.54733333,5.68355556 Z M2.15622222,7.17688889 C2.15622222,9.03355556 2.15622222,11.8391111 4.48733333,11.8391111 C6.29844444,11.8391111 6.54733333,9.938 6.54733333,9.03355556 L8.44844444,9.03355556 C8.44844444,10.3235556 7.67955556,13.3335556 4.374,13.3335556 C1.40955556,13.3335556 0.165111111,11.2735556 0.165111111,7.10911111 C0.165111111,4.07688889 0.752888889,0.568 4.48733333,0.568 C8.19955556,0.568 8.53955556,3.80466667 8.53955556,6.40688889 L8.53955556,7.17688889 L2.15622222,7.17688889 Z" id="Fill-55" fill="#FEFEFE" mask="url(#mask-2)"></path>
							                        </g>
							                        <path d="M37.5108889,4.41844444 L39.412,4.41844444 L39.412,6.22955556 L39.4564444,6.22955556 C40.0008889,5.07511111 40.7253333,4.10177778 42.0831111,4.10177778 C42.4675556,4.10177778 42.7397778,4.14733333 42.9197778,4.23733333 L42.9197778,6.094 C42.7397778,6.07066667 42.512,6.004 41.902,6.004 C40.9508889,6.004 39.412,6.86288889 39.412,8.87844444 L39.412,16.5506667 L37.5108889,16.5506667 L37.5108889,4.41844444 Z" id="Fill-58" fill="#FEFEFE"></path>
							                        <path d="M44.661,4.41844444 L46.471,4.41844444 L46.471,5.84511111 L46.5165556,5.84511111 C47.0143333,4.73511111 48.2821111,4.10177778 49.4587778,4.10177778 C52.6498889,4.10177778 52.6498889,6.524 52.6498889,7.94955556 L52.6498889,16.5506667 L50.7487778,16.5506667 L50.7487778,8.17622222 C50.7487778,7.24844444 50.681,5.73177778 48.961,5.73177778 C47.9432222,5.73177778 46.5621111,6.41066667 46.5621111,8.17622222 L46.5621111,16.5506667 L44.661,16.5506667 L44.661,4.41844444 Z" id="Fill-60" fill="#FEFEFE"></path>
							                        <path d="M60.9304444,9.94144444 C60.2293333,10.6881111 58.5537778,10.8458889 57.6937778,11.367 C57.0826667,11.7525556 56.766,12.2281111 56.766,13.2914444 C56.766,14.5136667 57.196,15.3736667 58.486,15.3736667 C59.7304444,15.3736667 60.9304444,14.3103333 60.9304444,13.0658889 L60.9304444,9.94144444 Z M55.0682222,8.08588889 C55.0682222,5.32477778 56.246,4.10144444 59.1426667,4.10144444 C62.8315556,4.10144444 62.8315556,6.32033333 62.8315556,7.58811111 L62.8315556,14.3558889 C62.8315556,14.8536667 62.8315556,15.3292222 63.4204444,15.3292222 C63.6693333,15.3292222 63.7826667,15.2836667 63.8726667,15.2147778 L63.8726667,16.5736667 C63.7371111,16.5958889 63.2393333,16.6858889 62.7637778,16.6858889 C62.0404444,16.6858889 61.1348889,16.6858889 61.0437778,15.1247778 L60.9982222,15.1247778 C60.3871111,16.2114444 59.2104444,16.867 58.0793333,16.867 C55.8148889,16.867 54.7737778,15.5092222 54.7737778,13.337 C54.7737778,11.6392222 55.4982222,10.4625556 57.0604444,9.987 L59.6182222,9.21811111 C60.9982222,8.787 60.9982222,8.40255556 60.9982222,7.38366667 C60.9982222,6.25255556 60.3193333,5.59588889 59.0526667,5.59588889 C56.9704444,5.59588889 56.9704444,7.54255556 56.9704444,7.97255556 L56.9704444,8.08588889 L55.0682222,8.08588889 Z" id="Fill-62" fill="#FEFEFE"></path>
							                        <polygon id="Fill-64" fill="#FEFEFE" points="65.522 0.389555556 67.4231111 0.389555556 67.4231111 4.53066667 67.4231111 16.5506667 65.522 16.5506667 65.522 4.62288889"></polygon>
							                        <path d="M77.11,10.485 L81.4555556,10.485 L79.3966667,2.67611111 L79.3511111,2.67611111 L77.11,10.485 Z M78.0833333,0.389444444 L80.7544444,0.389444444 L85.1,16.5505556 L83.0177778,16.5505556 L81.8633333,12.115 L76.7022222,12.115 L75.5033333,16.5505556 L73.4211111,16.5505556 L78.0833333,0.389444444 Z" id="Fill-66" fill="#FEFEFE"></path>
							                        <path d="M87.1788889,5.91255556 L85.4133333,5.91255556 L85.4133333,4.41811111 L87.1788889,4.41811111 L87.1788889,2.99255556 C87.1788889,1.16033333 87.9711111,0.209222222 89.8044444,0.209222222 L91.1844444,0.209222222 L91.1844444,1.83811111 L90.3022222,1.83811111 C89.4877778,1.83811111 89.08,2.15477778 89.08,2.99255556 L89.08,4.41811111 L91.1622222,4.41811111 L91.1622222,5.91255556 L89.08,5.91255556 L89.08,16.5503333 L87.1788889,16.5503333 L87.1788889,5.91255556 Z" id="Fill-68" fill="#FEFEFE"></path>
							                        <path d="M93.9432222,5.91255556 L92.1776667,5.91255556 L92.1776667,4.41811111 L93.9432222,4.41811111 L93.9432222,2.99255556 C93.9432222,1.16033333 94.7354444,0.209222222 96.5687778,0.209222222 L97.9498889,0.209222222 L97.9498889,1.83811111 L97.0676667,1.83811111 C96.2521111,1.83811111 95.8443333,2.15477778 95.8443333,2.99255556 L95.8443333,4.41811111 L97.9265556,4.41811111 L97.9265556,5.91255556 L95.8443333,5.91255556 L95.8443333,16.5503333 L93.9432222,16.5503333 L93.9432222,5.91255556 Z" id="Fill-70" fill="#FEFEFE"></path>
							                        <path d="M105.031556,9.94144444 C104.330444,10.6881111 102.654889,10.8458889 101.794889,11.367 C101.183778,11.7525556 100.867111,12.2281111 100.867111,13.2914444 C100.867111,14.5136667 101.297111,15.3736667 102.587111,15.3736667 C103.831556,15.3736667 105.031556,14.3103333 105.031556,13.0658889 L105.031556,9.94144444 Z M99.1693333,8.08588889 C99.1693333,5.32477778 100.347111,4.10144444 103.243778,4.10144444 C106.932667,4.10144444 106.932667,6.32033333 106.932667,7.58811111 L106.932667,14.3558889 C106.932667,14.8536667 106.932667,15.3292222 107.521556,15.3292222 C107.770444,15.3292222 107.883778,15.2836667 107.973778,15.2147778 L107.973778,16.5736667 C107.838222,16.5958889 107.340444,16.6858889 106.864889,16.6858889 C106.141556,16.6858889 105.236,16.6858889 105.144889,15.1247778 L105.100444,15.1247778 C104.488222,16.2114444 103.311556,16.867 102.180444,16.867 C99.916,16.867 98.8748889,15.5092222 98.8748889,13.337 C98.8748889,11.6392222 99.5993333,10.4625556 101.161556,9.987 L103.719333,9.21811111 C105.100444,8.787 105.100444,8.40255556 105.100444,7.38366667 C105.100444,6.25255556 104.420444,5.59588889 103.153778,5.59588889 C101.071556,5.59588889 101.071556,7.54255556 101.071556,7.97255556 L101.071556,8.08588889 L99.1693333,8.08588889 Z" id="Fill-72" fill="#FEFEFE"></path>
							                        <path d="M109.848889,16.5507778 L111.75,16.5507778 L111.75,4.41855556 L109.848889,4.41855556 L109.848889,16.5507778 Z M109.848889,2.563 L111.75,2.563 L111.75,0.389666667 L109.848889,0.389666667 L109.848889,2.563 Z" id="Fill-74" fill="#FEFEFE"></path>
							                        <path d="M114.578444,4.41844444 L116.479556,4.41844444 L116.479556,6.22955556 L116.524,6.22955556 C117.068444,5.07511111 117.792889,4.10177778 119.150667,4.10177778 C119.535111,4.10177778 119.807333,4.14733333 119.987333,4.23733333 L119.987333,6.094 C119.807333,6.07066667 119.579556,6.004 118.969556,6.004 C118.018444,6.004 116.479556,6.86288889 116.479556,8.87844444 L116.479556,16.5506667 L114.578444,16.5506667 L114.578444,4.41844444 Z" id="Fill-76" fill="#FEFEFE"></path>
							                        <path d="M126.707444,7.972 C126.707444,6.43311111 126.299667,5.59533333 124.919667,5.59533333 C124.308556,5.59533333 122.950778,5.75422222 122.950778,7.452 C122.950778,8.87755556 124.444111,9.14977778 125.937444,9.64755556 C127.408556,10.1453333 128.903,10.6664444 128.903,13.0653333 C128.903,15.6231111 127.250778,16.8675556 124.987444,16.8675556 C120.867444,16.8675556 120.823,13.812 120.823,12.5675556 L122.724111,12.5675556 C122.724111,14.0386667 123.130778,15.3731111 124.987444,15.3731111 C125.598556,15.3731111 127.001889,15.0786667 127.001889,13.3597778 C127.001889,11.7297778 125.507444,11.3897778 124.036333,10.892 C122.565222,10.3942222 121.048556,9.96422222 121.048556,7.452 C121.048556,5.18866667 122.814111,4.102 124.919667,4.102 C128.449667,4.102 128.586333,6.54644444 128.608556,7.972 L126.707444,7.972 Z" id="Fill-77" fill="#FEFEFE"></path>
							                    </g>
							                    <g id="logo" fill="#E0272F">
							                        <path d="M276.707616,0.379895918 L276.707616,1.37409687 C272.320781,1.6890301 272.320781,3.99607033 272.320781,7.70116706 L272.320781,16.1524927 C272.320781,20.0873054 272.320781,22.0324812 271.149971,24.1974927 C269.564189,27.0924083 265.993711,29.3537524 260.616381,29.3537524 C254.423929,29.3537524 251.667337,26.6836126 250.491586,24.9656828 C248.998432,22.752505 248.998432,20.6727107 248.998432,15.6090785 L248.998432,7.92841299 C248.998432,1.87181487 248.957676,1.37409687 244.980872,1.37409687 L244.30037,1.37409687 L244.30037,0.379895918 L257.226217,0.379895918 L257.226217,1.37409687 C252.75293,1.37409687 252.617077,1.37409687 252.617077,7.83825564 L252.617077,15.7474021 C252.617077,20.0416092 252.617077,22.4338667 253.745896,24.3333463 C254.784558,26.0945023 257.271913,27.8605984 261.564885,27.8605984 C264.459801,27.8605984 268.026574,26.8182312 269.972985,23.7886971 C271.236423,21.8496964 271.236423,19.7711372 271.236423,15.973413 L271.236423,7.29854655 C271.236423,3.67990207 271.236423,1.6890301 266.675449,1.37409687 L266.675449,0.379895918 L276.707616,0.379895918 Z" id="Fill-1"></path>
							                        <path d="M281.626008,10.0069723 C281.989108,11.0456344 282.168187,12.8117305 282.220059,13.7602352 C284.520924,11.2284191 286.558727,10.0069723 289.176995,10.0069723 C293.332879,10.0069723 294.826033,12.9018878 294.826033,15.9277168 L294.826033,22.6178865 C294.826033,27.54196 294.826033,27.8124321 297.809871,27.8124321 L297.809871,28.8103382 L288.544659,28.8103382 L288.544659,27.8124321 C291.660645,27.8124321 291.660645,27.54196 291.660645,22.6178865 L291.660645,16.7860642 C291.660645,12.6758769 290.216892,11.3642727 288.003715,11.3642727 C285.423732,11.3642727 283.755204,13.5342243 282.220059,15.2496841 L282.220059,22.6178865 C282.220059,27.501204 282.220059,27.8124321 285.198956,27.8124321 L285.198956,28.8103382 L276.070833,28.8103382 L276.070833,27.8124321 C279.055906,27.8124321 279.055906,27.54196 279.055906,22.6178865 L279.055906,17.236851 C279.055906,12.3127775 279.055906,12.0423054 276.070833,12.0423054 L276.070833,11.0456344 C277.919676,10.7751623 280.271178,10.3219055 281.039368,10.0069723 L281.626008,10.0069723 Z" id="Fill-3"></path>
							                        <path d="M306.166222,24.3774369 C306.166222,27.2723525 306.440399,27.8120616 308.653577,27.8120616 L309.33161,27.8120616 L309.33161,28.8099677 L299.705769,28.8099677 L299.705769,27.8120616 L300.473959,27.8120616 C302.779764,27.8120616 303.226845,27.4526672 303.226845,24.3774369 L303.226845,17.1500282 C303.226845,12.2222496 302.956373,12.1740833 299.705769,12.1740833 L299.705769,11.1835875 C301.058129,11.1391263 303.815956,10.5500159 305.71667,10.0066017 L306.166222,10.0066017 L306.166222,24.3774369 Z" id="Fill-5"></path>
							                        <path d="M319.5888,29.5298679 L313.172807,15.0688754 C311.998291,12.4444319 311.5438,11.8170355 309.875271,11.7244081 L309.875271,10.7326772 L318.006723,10.7326772 L318.006723,11.7244081 C316.832208,11.7244081 315.705858,11.7244081 315.705858,12.8112365 C315.705858,12.9915512 315.749084,13.3101895 316.198636,14.3451465 L321.441348,26.1434095 L325.829418,16.3360185 C326.458049,14.8897957 326.86808,13.8918897 326.86808,13.3101895 C326.86808,11.9528891 325.462613,11.7688693 324.648727,11.7244081 L324.648727,10.7326772 L330.752256,10.7326772 L330.752256,11.7244081 C328.851541,11.8627317 328.131518,13.5349654 326.728521,16.6064906 L320.855943,29.5298679 L319.5888,29.5298679 Z" id="Fill-7"></path>
							                        <path d="M334.817982,16.7417266 L344.48952,16.7417266 C344.445059,14.6187062 343.855948,11.0012967 339.970537,11.0012967 C336.397588,11.0012967 335.043993,14.2556067 334.817982,16.7417266 L334.817982,16.7417266 Z M334.73153,17.6445352 C334.680894,18.0533308 334.637668,18.6844323 334.637668,18.9993655 C334.637668,24.7410304 336.44205,28.3596749 340.830119,28.3596749 C343.3607,28.3596749 345.393563,27.2234452 346.658236,24.7410304 L347.696898,24.7410304 C346.568079,27.7236333 343.900409,29.5292504 340.241009,29.5292504 C335.178612,29.5292504 330.978267,25.7377014 330.978267,19.9046442 C330.978267,14.3000678 334.637668,10.0070958 340.060694,10.0070958 C345.168787,10.0070958 347.745065,13.3515631 347.879683,17.6445352 L334.73153,17.6445352 Z" id="Fill-9"></path>
							                        <path d="M356.69275,22.617763 C356.69275,27.2231982 356.69275,27.8123086 359.355479,27.8123086 L359.990286,27.8123086 L359.990286,28.8102147 L350.407671,28.8102147 L350.407671,27.8123086 C353.527362,27.8123086 353.527362,27.635699 353.527362,22.617763 L353.527362,17.5096696 C353.527362,12.4929687 353.527362,12.312654 350.407671,12.312654 L350.407671,11.3159829 C352.444239,11.0455109 354.792035,10.321782 355.515764,10.0957711 L355.831932,10.0068488 C356.059178,10.7330477 356.467974,12.1743303 356.467974,14.7506076 C357.869736,11.4098454 361.121575,10.0068488 363.427381,10.0068488 C365.775177,10.0068488 366.907702,11.6803174 366.907702,12.7634407 C366.907702,13.577327 366.319826,14.3936833 365.363911,14.3936833 C364.37712,14.3936833 363.874462,13.7156506 363.605225,12.9462255 C363.427381,12.4448024 363.064281,11.5926302 362.021914,11.5926302 C360.215062,11.5926302 356.69275,13.7601117 356.69275,18.3704871 L356.69275,22.617763 Z" id="Fill-11"></path>
							                        <path d="M368.573884,23.4318962 L369.432231,23.4318962 C369.885488,25.5993778 371.470034,28.5362845 375.624683,28.5362845 C379.377946,28.5362845 379.827497,26.2341844 379.827497,25.3289058 C379.827497,23.1132579 377.480936,22.0708907 374.634187,21.0359337 C370.474598,19.4983186 368.61958,18.1867143 368.61958,15.0200916 C368.61958,12.7179915 370.33998,10.0070958 374.405706,10.0070958 C376.527491,10.0070958 378.066341,10.8654432 379.107474,11.9041053 C379.464398,11.4990147 379.91889,10.4146564 379.967056,10.322029 L380.777237,10.322029 L380.777237,15.9278403 L379.967056,15.9278403 C379.55826,13.8505161 377.747703,11.0012967 374.540324,11.0012967 C371.604653,11.0012967 370.609217,12.4450494 370.609217,13.7603587 C370.609217,15.8833792 372.324676,16.6515692 375.624683,17.8260849 C379.239622,19.093228 381.999919,20.5851469 381.999919,24.1976162 C381.999919,27.2716115 379.783036,29.5292504 375.672849,29.5292504 C373.003944,29.5292504 371.424338,28.4955284 370.385676,27.5013275 C369.932419,27.9953404 369.523623,28.9413751 369.432231,29.3538759 L368.573884,29.3538759 L368.573884,23.4318962 Z" id="Fill-13"></path>
							                        <path d="M391.355659,24.3774369 C391.355659,27.2723525 391.623661,27.8120616 393.835604,27.8120616 L394.514871,27.8120616 L394.514871,28.8099677 L384.8915,28.8099677 L384.8915,27.8120616 L385.65722,27.8120616 C387.96673,27.8120616 388.416282,27.4526672 388.416282,24.3774369 L388.416282,17.1500282 C388.416282,12.2222496 388.142105,12.1740833 384.8915,12.1740833 L384.8915,11.1835875 C386.245095,11.1391263 389.005392,10.5500159 390.902402,10.0066017 L391.355659,10.0066017 L391.355659,24.3774369 Z" id="Fill-15"></path>
							                        <path d="M402.015099,11.7244081 L402.015099,22.6593836 C402.015099,25.1492086 402.015099,27.9959579 404.725994,27.9959579 C406.267315,27.9959579 407.078731,26.7769811 407.486291,26.1878707 L408.164324,26.5966664 C406.762563,29.5298679 403.871352,29.5298679 403.552714,29.5298679 C402.289276,29.5298679 401.29137,29.2593959 400.571346,28.6715205 C399.39436,27.7674769 398.853416,26.0952433 398.853416,23.4312787 L398.853416,11.7244081 L396.231443,11.7244081 L396.231443,10.7326772 C398.219844,10.6400498 400.615807,9.33215064 401.29137,5.08240469 L402.015099,5.08240469 L402.015099,10.7326772 L407.486291,10.7326772 L407.486291,11.7244081 L402.015099,11.7244081 Z" id="Fill-17"></path>
							                        <path d="M425.472313,14.6636613 C425.787246,13.9399324 426.105885,13.2643698 426.105885,12.9012703 C426.105885,11.9527656 424.474407,11.7242846 423.664226,11.7242846 L423.664226,10.7325537 L429.991296,10.7325537 L429.991296,11.7242846 C427.729952,11.8626082 427.276695,12.9914277 426.151581,15.7035585 L418.104111,35.1367908 C416.929595,37.9415491 415.845237,39.9250108 414.086551,39.9250108 C413.355412,39.9250108 412.681084,39.4754591 412.681084,38.6171117 C412.681084,37.1251927 414.174238,36.445925 414.986889,36.0852956 C416.524504,35.4072629 417.016047,35.1367908 417.649619,33.5534795 L419.368784,29.2592724 L412.590927,14.7056524 C411.552265,12.4924746 411.189165,11.7687458 409.068615,11.7242846 L409.068615,10.7325537 L417.379147,10.7325537 L417.379147,11.7242846 C416.250327,11.816912 415.167204,11.8626082 415.167204,12.6283282 C415.167204,12.9914277 415.710618,14.1177771 416.029256,14.843976 L420.999026,25.4195571 L425.472313,14.6636613 Z" id="Fill-19"></path>
							                        <path d="M306.202409,4.28519138 C306.202409,5.36831465 305.324301,6.24024742 304.249823,6.24024742 C303.169169,6.24024742 302.297237,5.36831465 302.297237,4.28519138 C302.297237,3.21071332 303.169169,2.33507546 304.249823,2.33507546 C305.324301,2.33507546 306.202409,3.21071332 306.202409,4.28519138" id="Fill-21"></path>
							                        <path d="M391.411235,4.28519138 C391.411235,5.36831465 390.533127,6.24024742 389.458649,6.24024742 C388.377996,6.24024742 387.506063,5.36831465 387.506063,4.28519138 C387.506063,3.21071332 388.377996,2.33507546 389.458649,2.33507546 C390.533127,2.33507546 391.411235,3.21071332 391.411235,4.28519138" id="Fill-23"></path>
							                        <path d="M5.92012706,2.80179415 L5.92012706,23.0464427 C5.92012706,26.0315156 6.54875847,27.7037493 11.1616039,27.8358977 L11.1616039,28.8325687 L0.000617516122,28.8325687 L0.000617516122,27.8358977 C4.92222101,27.6135919 4.83453372,25.5794938 4.83453372,23.0464427 L4.83453372,7.54308293 C4.83453372,1.80388809 4.51713043,1.39879752 0.406943124,1.39879752 L0.406943124,0.405831595 L8.54210051,0.405831595 L25.489213,22.9105891 L25.489213,5.69423966 C25.489213,3.29704208 25.1718097,1.44696378 20.3823546,1.39879752 L20.3823546,0.405831595 L31.2247027,0.405831595 L31.2247027,1.39879752 C26.8440433,1.80388809 26.5723362,3.34150324 26.5723362,6.00917288 L26.5723362,29.5106014 L25.9424698,29.5106014 L5.92012706,2.80179415 Z" id="Fill-25"></path>
							                        <path d="M40.4449594,28.4720628 C44.605783,28.4720628 46.4558613,25.6216084 46.4558613,19.9330499 C46.4558613,15.0472623 45.1454921,11.1124496 40.4449594,11.1124496 C35.8839853,11.1124496 34.4809887,14.957105 34.4809887,19.8848836 C34.4809887,25.6697747 36.332302,28.4720628 40.4449594,28.4720628 M40.4449594,10.0317964 C45.7778286,10.0317964 50.1164969,14.0530614 50.1164969,19.7947263 C50.1164969,26.2144239 45.2838157,29.5564211 40.4449594,29.5564211 C35.7876528,29.5564211 30.8178831,26.4367297 30.8178831,19.7502651 C30.8178831,14.1419837 35.065159,10.0317964 40.4449594,10.0317964" id="Fill-27"></path>
							                        <path d="M58.1623615,22.6407346 C58.1623615,27.2498749 58.1623615,27.8352802 60.8275611,27.8352802 L61.4611326,27.8352802 L61.4611326,28.8331863 L51.8760473,28.8331863 L51.8760473,27.8352802 C54.9982089,27.8352802 54.9982089,27.6574356 54.9982089,22.6407346 L54.9982089,17.5326412 C54.9982089,12.5159403 54.9982089,12.3356256 51.8760473,12.3356256 L51.8760473,11.3451297 C53.9150856,11.0721876 56.2616468,10.3472236 56.9829057,10.1224478 L57.301544,10.0322904 C57.5250848,10.7560193 57.9338805,12.2034771 57.9338805,14.7772843 C59.3344071,11.4315819 62.5911871,10.0322904 64.8957573,10.0322904 C67.2472587,10.0322904 68.3736081,11.7057591 68.3736081,12.7864123 C68.3736081,13.6027686 67.7894378,14.4129498 66.838463,14.4129498 C65.843027,14.4129498 65.346544,13.7373871 65.076072,12.9691971 C64.8957573,12.4739492 64.5326578,11.6143667 63.4952307,11.6143667 C61.6859085,11.6143667 58.1623615,13.7830833 58.1623615,18.3946937 L58.1623615,22.6407346 Z" id="Fill-29"></path>
							                        <path d="M75.6933972,11.7497263 L75.6933972,22.6884068 C75.6933972,25.1720567 75.6933972,28.018806 78.4042929,28.018806 C79.9419081,28.018806 80.7557943,26.7998292 81.1608849,26.2144239 L81.8401526,26.6158094 C80.4396261,29.5564211 77.5459455,29.5564211 77.2322473,29.5564211 C75.9663393,29.5564211 74.9733734,29.282244 74.2471744,28.6943686 C73.0714237,27.7927951 72.5292446,26.1180914 72.5292446,23.4553619 L72.5292446,11.7497263 L69.9085061,11.7497263 L69.9085061,10.7555253 C71.8993781,10.6628979 74.2941056,9.3537637 74.9733734,5.10525278 L75.6933972,5.10525278 L75.6933972,10.7555253 L81.1608849,10.7555253 L81.1608849,11.7497263 L75.6933972,11.7497263 Z" id="Fill-31"></path>
							                        <path d="M102.360584,22.6407346 C102.360584,27.6129744 102.360584,27.8352802 105.432109,27.8352802 L105.432109,28.8331863 L96.0742698,28.8331863 L96.0742698,27.8352802 C99.1939612,27.8352802 99.1939612,27.6129744 99.1939612,22.6407346 L99.1939612,16.8089123 C99.1939612,12.6085677 97.9305232,11.3834157 95.2628536,11.3834157 C93.1842943,11.3834157 91.1958924,13.5150813 89.7496696,15.3676297 L89.7496696,22.6407346 C89.7496696,27.4783559 89.7496696,27.8352802 92.5951839,27.8352802 L92.5951839,28.8331863 L83.4213644,28.8331863 L83.4213644,27.8352802 C86.585517,27.8352802 86.585517,27.6574356 86.585517,22.6407346 L86.585517,6.14440891 C86.585517,2.98272637 86.585517,1.93912413 83.6041492,1.93912413 L83.6041492,0.949863298 C85.4554625,0.949863298 87.9415824,0.539832594 89.3878052,0.000123503224 L89.7039734,0.000123503224 L89.7039734,13.7830833 C91.9640824,11.3834157 93.9512493,10.0322904 96.3027507,10.0322904 C100.322781,10.0322904 102.360584,12.1553108 102.360584,16.2654982 L102.360584,22.6407346 Z" id="Fill-33"></path>
							                        <path d="M109.994442,16.7670447 L119.665979,16.7670447 C119.621518,14.6415543 119.033643,11.0266149 115.146996,11.0266149 C111.575283,11.0266149 110.219218,14.2772197 109.994442,16.7670447 L109.994442,16.7670447 Z M109.903049,17.6673832 C109.857353,18.077414 109.814127,18.7097505 109.814127,19.0259187 C109.814127,24.7675836 111.619744,28.381288 116.002874,28.381288 C118.53716,28.381288 120.571258,27.2499984 121.833461,24.7675836 L122.874593,24.7675836 C121.744538,27.7452464 119.079339,29.5558036 115.417468,29.5558036 C110.355071,29.5558036 106.151021,25.7605495 106.151021,19.9324324 C106.151021,14.325386 109.814127,10.0324139 115.239624,10.0324139 C120.342777,10.0324139 122.922759,13.3744112 123.058613,17.6673832 L109.903049,17.6673832 Z" id="Fill-35"></path>
							                        <path d="M146.29945,23.4547443 L147.157797,23.4547443 C147.608584,25.6222259 149.189425,28.5628377 153.350249,28.5628377 C157.102277,28.5628377 157.550593,26.2557975 157.550593,25.3517539 C157.550593,23.136106 155.202797,22.099914 152.356048,21.0587818 C148.197694,19.5236367 146.345146,18.2120325 146.345146,15.0466448 C146.345146,12.7433097 148.064311,10.0324139 152.128802,10.0324139 C154.251822,10.0324139 155.793142,10.8907613 156.828099,11.9331285 C157.193669,11.5218628 157.644456,10.4375045 157.688917,10.3473471 L158.499098,10.3473471 L158.499098,15.9506884 L157.688917,15.9506884 C157.282591,13.8721292 155.473269,11.0266149 152.26589,11.0266149 C149.326514,11.0266149 148.333548,12.4728376 148.333548,13.7832068 C148.333548,15.9086973 150.051477,16.6744173 153.350249,17.8514031 C156.965188,19.1185461 159.723015,20.607995 159.723015,24.2229344 C159.723015,27.2944596 157.506132,29.5558036 153.393475,29.5558036 C150.72704,29.5558036 149.147434,28.5171415 148.105067,27.5229406 C147.65428,28.0181885 147.249189,28.9679283 147.157797,29.3754889 L146.29945,29.3754889 L146.29945,23.4547443 Z" id="Fill-37"></path>
							                        <path d="M167.990938,11.7497263 L167.990938,22.6884068 C167.990938,25.1720567 167.990938,28.018806 170.700599,28.018806 C172.239449,28.018806 173.053335,26.7998292 173.458426,26.2144239 L174.137694,26.6158094 C172.737167,29.5564211 169.843487,29.5564211 169.527318,29.5564211 C168.262645,29.5564211 167.267209,29.282244 166.545951,28.6943686 C165.368965,27.7927951 164.824316,26.1180914 164.824316,23.4553619 L164.824316,11.7497263 L162.204812,11.7497263 L162.204812,10.7555253 C164.194449,10.6628979 166.586707,9.3537637 167.267209,5.10525278 L167.990938,5.10525278 L167.990938,10.7555253 L173.458426,10.7555253 L173.458426,11.7497263 L167.990938,11.7497263 Z" id="Fill-39"></path>
							                        <path d="M179.018171,16.7670447 L188.688473,16.7670447 C188.642777,14.6415543 188.053667,11.0266149 184.16949,11.0266149 C180.599012,11.0266149 179.244182,14.2772197 179.018171,16.7670447 L179.018171,16.7670447 Z M178.926778,17.6673832 C178.882317,18.077414 178.836621,18.7097505 178.836621,19.0259187 C178.836621,24.7675836 180.645943,28.381288 185.031543,28.381288 C187.557184,28.381288 189.593752,27.2499984 190.85719,24.7675836 L191.897087,24.7675836 C190.768267,27.7452464 188.100598,29.5558036 184.439962,29.5558036 C179.3788,29.5558036 175.175985,25.7605495 175.175985,19.9324324 C175.175985,14.325386 178.836621,10.0324139 184.259648,10.0324139 C189.366506,10.0324139 191.940313,13.3744112 192.077402,17.6673832 L178.926778,17.6673832 Z" id="Fill-41"></path>
							                        <path d="M200.346684,22.6407346 C200.346684,27.2498749 200.346684,27.8352802 203.014353,27.8352802 L203.64916,27.8352802 L203.64916,28.8331863 L194.066545,28.8331863 L194.066545,27.8352802 C197.183766,27.8352802 197.183766,27.6574356 197.183766,22.6407346 L197.183766,17.5326412 C197.183766,12.5159403 197.183766,12.3356256 194.066545,12.3356256 L194.066545,11.3451297 C196.098173,11.0721876 198.448439,10.3472236 199.174638,10.1224478 L199.489571,10.0322904 C199.715582,10.7560193 200.120673,12.2034771 200.120673,14.7772843 C201.519964,11.4315819 204.773039,10.0322904 207.081314,10.0322904 C209.430346,10.0322904 210.56287,11.7057591 210.56287,12.7864123 C210.56287,13.6027686 209.974995,14.4129498 209.025255,14.4129498 C208.032289,14.4129498 207.534571,13.7373871 207.265334,12.9691971 C207.081314,12.4739492 206.71945,11.6143667 205.682023,11.6143667 C203.872701,11.6143667 200.346684,13.7830833 200.346684,18.3946937 L200.346684,22.6407346 Z" id="Fill-43"></path>
							                        <path d="M217.702221,10.0322904 C218.06038,11.0721876 218.24687,12.8308735 218.288861,13.7830833 C220.592197,11.2512672 222.62506,10.0322904 225.247033,10.0322904 C229.404152,10.0322904 230.899776,12.9247359 230.899776,15.9505649 L230.899776,22.6407346 C230.899776,27.5685132 230.899776,27.8352802 233.881144,27.8352802 L233.881144,28.8331863 L224.614697,28.8331863 L224.614697,27.8352802 C227.731918,27.8352802 227.731918,27.5685132 227.731918,22.6407346 L227.731918,16.8089123 C227.731918,12.698725 226.28446,11.3834157 224.074988,11.3834157 C221.49871,11.3834157 219.822772,13.5570724 218.288861,15.2750023 L218.288861,22.6407346 C218.288861,27.522817 218.288861,27.8352802 221.275169,27.8352802 L221.275169,28.8331863 L212.144576,28.8331863 L212.144576,27.8352802 C215.123474,27.8352802 215.123474,27.5685132 215.123474,22.6407346 L215.123474,17.2621692 C215.123474,12.3356256 215.123474,12.0651535 212.144576,12.0651535 L212.144576,11.0721876 C213.994654,10.8017155 216.346156,10.3472236 217.113111,10.0322904 L217.702221,10.0322904 Z" id="Fill-45"></path>
							                        <path d="M137.335215,25.1107991 C135.513542,26.6867002 133.058298,27.9377879 131.3873,27.9377879 C129.46806,27.9377879 128.531905,26.5483766 128.531905,24.879848 C128.531905,22.3838479 130.896992,20.1163287 134.726827,18.8615359 L137.335215,18.0352994 L137.335215,25.1107991 Z M143.647465,25.5356502 C143.2856,27.6562005 142.358091,27.7834089 141.819617,27.7834089 C140.41662,27.7834089 140.393155,26.7892079 140.393155,23.6793967 L140.393155,16.3593606 C140.393155,13.6892209 140.047346,10.0322904 133.810433,10.0322904 C129.28898,10.0322904 126.533623,12.3356256 126.533623,14.1424777 C126.533623,14.956364 127.030106,15.455317 127.75507,15.455317 C128.927115,15.455317 129.381607,14.5957346 129.652079,13.6027686 C129.965778,12.3800867 130.64875,11.0264914 133.538726,11.0264914 C136.926419,11.0264914 137.335215,13.195208 137.335215,15.8604076 L137.335215,16.989227 L133.90059,18.1662128 C127.527824,20.3386345 125.583883,22.8667455 125.583883,25.4430228 C125.583883,28.018065 127.619216,29.282738 130.239955,29.282738 C132.409906,29.282738 134.66878,28.3811645 137.335215,26.1173504 C137.562461,27.2041787 138.149101,29.282738 140.798245,29.282738 C143.2856,29.282738 144.369959,27.5685132 144.460116,25.5356502 L143.647465,25.5356502 Z" id="Fill-47"></path>
							                    </g>
							                </g>
							            </g>
							        </g>
							    </g>
							</svg> -->
						</a>
					</div>

				</div>

			</header>
