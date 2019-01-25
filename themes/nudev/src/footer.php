		</div>

		<div class="cookiewarning">
			<div class="js__cookie-accept" title="Click here to accept and continue">&#xE14C;</div>
			<h3>Cookies on Northeastern sites</h3>
			<p>This website uses cookies and similar technologies to understand your use of our website and give you a better experience. By continuing to use the site or closing this banner without changing your cookie settings, you agree to our use of cookies and other technologies. To find out more about our use of cookies and how to change your settings, please go to our <a href="/privacy-information" title="Privacy information">Privacy Statement</a>.</p>
			<button class="js__cookie-accept" title="Click here to accept and continue">Accept and Continue</button>
		</div>

		<?php

			global $forcePageID;	// check to see if we are manually overriding the natural WP page ID
			global $noPreFooter;	// an override if we are using the prefooter as another element in the page and to not include here in footer

			$prefooter = (get_field('use_pre-footer',(isset($forcePageID) && $forcePageID != ''?$forcePageID:get_the_ID()),false) == 1?true:false);

		?>

		<footer id="nu__global-footer" class="<?=($prefooter?'addprefooter ':'')?><?=(trim($_SERVER['REQUEST_URI']) === '/'?'collapse absolute':'')?>">

			<?php

				if($prefooter && (!isset($noPreFooter) || !$noPreFooter)){
					include(locate_template('includes/prefooter.php'));
				}
			?>

			<?php

				wp_footer();

				include(locate_template('includes/footer.php'));

			?>

		</footer>
	</body>
</html>
