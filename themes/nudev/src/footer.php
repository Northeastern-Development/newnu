		</div>

		<div class="nu__backtotop js__backtotop" title="Back to top">^</div>

		<?php $prefooter = (get_field('use_pre-footer',get_the_ID(),false) == 1?true:false); ?>

		<?php

			// echo 'PAGENAME: '.$_SERVER['REQUEST_URI'];

		?>

		<footer id="nu__global-footer" class="<?=($prefooter?'addprefooter ':'')?><?=(trim($_SERVER['REQUEST_URI']) === '/'?'collapse':'')?>">

			<?php

				if($prefooter){ get_template_part('loops/loop-prefooter'); }
			?>

			<?php wp_footer(); ?>

		</footer>

	</body>
</html>
