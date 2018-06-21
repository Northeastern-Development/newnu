		</div>

		<div class="cookiewarning">
			<p>This website uses cookies and similar technologies to understand your use of our website and give you a better experience. By continuing to use the site or closing this banner without changing your cookie settings, you agree to our use of cookies and other technologies. To find out more about our use of cookies and how to change your settings, <a href="/privacy-information" title="Privacy information">please go to our Privacy Statement</a>.</p>
			<button>I understand and Accept</button>
		</div>

		<?php $prefooter = (get_field('use_pre-footer',get_the_ID(),false) == 1?true:false); ?>

		<footer id="nu__global-footer" class="<?=($prefooter?'addprefooter ':'')?><?=(trim($_SERVER['REQUEST_URI']) === '/'?'collapse absolute':'')?>" <?=(trim($_SERVER['REQUEST_URI']) === '/'?'aria-hidden="true"':'')?>>





			<?php
				if($prefooter){
					//get_template_part('loops/loop-prefooter');
					include(locate_template('includes/prefooter.php'));
				}
			?>

			<?php wp_footer(); ?>

			<div class="nu__footer">



				<div class="nu__footer-hideshow js_footer-hideshow" title="Click to show/hide the footer"></div>
				<a href="/privacy-information" title="Privacy information">Privacy</a>
				<div>

					<?php get_template_part('loops/loop-footercampuses'); ?>

					<div>
						<p>Connect</p>
						<ul>
							<li><a href="//www.facebook.com/northeastern/" title="Friend us on Facebook" target="_blank"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs><style>.cls-1{}</style></defs><title>Friend us on Facebook</title><circle class="cls-1" cx="256" cy="256" r="256"/><path d="M301.6,151.2h36.3V97H286.5c-29.6,0-68.1,19-68.1,74.2v43H169.3v56.1h49.1v146H277v-146h48.8l8.1-56.1H277V178.5C277,160.1,286,151.2,301.6,151.2Z"/></svg></a></li>
							<li><a href="//twitter.com/Northeastern" title="Follow us on Twitter" target="_blank"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 510.57 510.57"><defs><style>.cls-1{}</style></defs><title>Follow us on Twitter</title><path class="cls-1" d="M255.29,1.43C114.3,1.43,0,115.75,0,256.73S114.3,512,255.29,512,510.57,397.72,510.57,256.73,396.28,1.43,255.29,1.43Zm128.6,203.82c.13,2.76.19,5.53.19,8.33,0,85-64.72,183-183,183a182.12,182.12,0,0,1-98.62-28.89,131.78,131.78,0,0,0,15.34.89,129.07,129.07,0,0,0,79.9-27.53,64.43,64.43,0,0,1-60.09-44.7,62.61,62.61,0,0,0,12.1,1.15,63.61,63.61,0,0,0,17-2.25A64.39,64.39,0,0,1,115,232.22c0-.28,0-.55,0-.83a64.25,64.25,0,0,0,29.15,8.06,64.42,64.42,0,0,1-19.92-85.91,182.61,182.61,0,0,0,132.62,67.21,64.38,64.38,0,0,1,109.62-58.68,128.49,128.49,0,0,0,40.86-15.61A64.52,64.52,0,0,1,379,182.05a128.53,128.53,0,0,0,37-10.13A130.11,130.11,0,0,1,383.89,205.25Z" transform="translate(0 -1.43)"/></svg></a></li>
							<li><a href="//www.youtube.com/user/Northeastern" title="Check us out on YouTube" target="_blank"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs><style>.cls-1{}</style></defs><title>Check us out on YouTube</title><g id="Layer_1" data-name="Layer 1"><polygon class="cls-1" points="221.28 308.14 308.19 256 221.28 203.86 221.28 308.14"/><path class="cls-1" d="M256,0C114.62,0,0,114.61,0,256S114.62,512,256,512,512,397.38,512,256,397.38,0,256,0ZM395,267.22a476.39,476.39,0,0,1-2.79,48s-2.72,20.44-11,29.42c-10.57,11.81-22.41,11.87-27.85,12.58-38.91,3-97.33,3.07-97.33,3.07s-72.29-.71-94.53-3c-6.19-1.23-20.06-.88-30.65-12.67-8.34-9-11-29.42-11-29.42a476.12,476.12,0,0,1-2.79-48v-22.5a475.73,475.73,0,0,1,2.79-48s2.72-20.45,11-29.46c10.57-11.82,22.41-11.89,27.85-12.56,38.9-3,97.27-3,97.27-3h.12s58.37,0,97.27,3c5.42.67,17.28.74,27.85,12.54,8.34,9,11,29.46,11,29.46a476.39,476.39,0,0,1,2.79,48Z"/></g></svg></a></li>
							<li><a href="https://www.linkedin.com/school/northeastern-university/" title="Connect with us on LinkedIn" target="_blank"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255 255"><defs><style>.cls-1{}</style></defs><title>Connect with us on LinkedIn</title><path class="cls-1" d="M200.06,188.58V138.81c0-26.67-14.24-39.08-33.22-39.08-15.32,0-22.18,8.43-26,14.34v-12.3H112c.38,8.14,0,86.81,0,86.81h28.85V140.1a19.61,19.61,0,0,1,1-7c2.08-5.18,6.83-10.55,14.79-10.55,10.45,0,14.62,8,14.62,19.63v46.45h28.86ZM81.58,89.92c10.06,0,16.32-6.67,16.32-15-.18-8.51-6.26-15-16.13-15s-16.33,6.47-16.33,15c0,8.34,6.27,15,16,15ZM128.5,256A127.5,127.5,0,1,1,256,128.5,127.51,127.51,0,0,1,128.5,256ZM96,188.58V101.77H67.15v86.81Z" transform="translate(-1 -1)"/></svg></a></li>
							<li><a href="https://www.instagram.com/northeastern/" title="See what we are up to on Instagram" target="_blank"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255 255"><defs><style>.cls-1{}</style></defs><title>See what we are up to on Instagram</title><path class="cls-1" d="M167.9,97v0c2.14,0,4.27,0,6.41,0a5.19,5.19,0,0,0,5-5.17V79.47A5.24,5.24,0,0,0,174,74.19H161.79a5.25,5.25,0,0,0-5.26,5.29c0,4,0,8.11,0,12.17a5.55,5.55,0,0,0,.31,1.81A5.22,5.22,0,0,0,162,97Zm-39.4,5.26a26.27,26.27,0,1,0,26.26,26.85A26.27,26.27,0,0,0,128.5,102.22Zm-50.8,14v.35q0,28.78,0,57.57a5.24,5.24,0,0,0,5.15,5.13q45.65,0,91.28,0a5.25,5.25,0,0,0,5.17-5.15V116.25H166.92a40.57,40.57,0,0,1,1.6,17.06,40.34,40.34,0,0,1-17.41,28.56,40.3,40.3,0,0,1-42.27,1.82,39.37,39.37,0,0,1-15.66-15.78c-5.48-10.09-6.35-20.68-3.14-31.67Zm102.67,77.09c.68-.11,1.35-.2,2-.35a14,14,0,0,0,10.66-10.87c.11-.58.19-1.16.28-1.73V76.62c-.09-.56-.17-1.13-.27-1.7a14,14,0,0,0-11.82-11.13l-.72-.12h-104c-.62.11-1.25.2-1.87.34A14,14,0,0,0,63.79,75.76c0,.24-.08.49-.12.73v104c.12.65.21,1.32.36,2A14.06,14.06,0,0,0,75.8,193.21c.28,0,.56.09.83.12ZM128.5,256A127.5,127.5,0,1,1,256,128.5,127.51,127.51,0,0,1,128.5,256Z" transform="translate(-1 -1)"/></svg></a></li>
							<li><a href="https://www.snapchat.com/add/NortheasternU" title="Engage with us on SnapChat" target="_blank"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256.01 256"><defs><style>.cls-1{}</style></defs><title>Engage with us on SnapChat</title><path class="cls-1" d="M128.51,0a128,128,0,1,0,128,128A128,128,0,0,0,128.51,0ZM208.1,169.92c-.95,2.23-5.24,5.39-20.25,7.7-1.22.19-1.7,1.79-2.43,5.14-.27,1.22-.54,2.42-.91,3.68a2,2,0,0,1-2.14,1.6h-.19a18.77,18.77,0,0,1-3.36-.42,44.54,44.54,0,0,0-9-1,40.48,40.48,0,0,0-6.51.55c-4.5.75-8.32,3.45-12.37,6.31-5.88,4.16-12,8.45-21.41,8.45-.41,0-.82,0-1.22,0h0c-.26,0-.53,0-.8,0-9.46,0-15.53-4.29-21.4-8.44-4-2.86-7.88-5.57-12.38-6.32a40.48,40.48,0,0,0-6.51-.55,44.33,44.33,0,0,0-9,1,19.77,19.77,0,0,1-3.36.48,2.11,2.11,0,0,1-2.33-1.66c-.38-1.28-.65-2.51-.91-3.7-.67-3.07-1.14-5-2.43-5.16-15-2.32-19.3-5.48-20.25-7.72a2.59,2.59,0,0,1-.23-1,1.69,1.69,0,0,1,1.41-1.76c23.06-3.8,33.4-27.37,33.83-28.37a.3.3,0,0,1,0-.08c1.41-2.86,1.68-5.34.82-7.38-1.58-3.73-6.74-5.37-10.16-6.45-.84-.26-1.63-.51-2.25-.76-6.82-2.7-7.39-5.46-7.12-6.87.46-2.41,3.67-4.08,6.26-4.08a4.49,4.49,0,0,1,1.87.37,19.84,19.84,0,0,0,8.22,2.17c3.29,0,4.73-1.39,4.91-1.57-.09-1.56-.19-3.19-.3-4.87-.68-10.9-1.54-24.45,1.91-32.18,10.34-23.18,32.26-25,38.74-25l2.83,0h.39c6.48,0,28.45,1.8,38.8,25,3.45,7.74,2.6,21.3,1.91,32.19l0,.48c-.1,1.51-.19,3-.27,4.4a6.57,6.57,0,0,0,4.48,1.55h0a20.51,20.51,0,0,0,7.75-2.15,5.84,5.84,0,0,1,2.4-.47,7.39,7.39,0,0,1,2.77.53l0,0c2.31.82,3.83,2.44,3.86,4.14s-1.19,4-7.17,6.36c-.62.24-1.41.49-2.25.76-3.42,1.09-8.58,2.72-10.16,6.45-.86,2-.59,4.52.82,7.38a.3.3,0,0,1,0,.08c.43,1,10.76,24.57,33.83,28.37a1.7,1.7,0,0,1,1.42,1.76A2.77,2.77,0,0,1,208.1,169.92Z" transform="translate(-0.51)"/></svg></a></li>
						</ul>
					</div>

					<p>
						<a href="//www.google.com/maps/place/360+Huntington+Ave,+Boston,+MA+02115/@42.339348,-71.0903674,17z/data=!3m1!4b1!4m5!3m4!1s0x89e37a185b1286ff:0x2c025c6d4b00cba2!8m2!3d42.339348!4d-71.0881734" title="View our Boston campus in Google Maps" target="_blank">360 Huntington Ave., Boston, Massachusetts 02115</a> | <a href="tel:6173732000" title="Give us a call">617.373.2000<a/> | <a href="tel:6173733768" title="TTY">TTY 617.373.3768</a> | <a href="/emergency-information" title="Emergency information">Emergency Information</a><br>&copy; 2018 &nbsp;Northeastern University | <a href="/privacy-information" title="Privacy information">Privacy</a> | <a href="http://my.northeastern.edu/" title="MyNortheastern" target="_blank">MyNortheastern</a>
					</p>

				</div>
			</div>
		</footer>
	</body>
</html>
