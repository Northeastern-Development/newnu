		</div>

		<div class="nu__backtotop js__backtotop" title="Back to top">^</div>

		<?php $prefooter = (get_field('use_pre-footer',get_the_ID(),false) == 1?true:false); ?>

		<footer id="nu__global-footer" <?=($prefooter?' class="addprefooter"':'')?>>

			<?php

				if($prefooter){ get_template_part('loops/loop-prefooter'); }
			?>

			<?php wp_footer(); ?>

		</footer>

	</body>
</html>
