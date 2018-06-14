<section class="nu__grid-filters">
	<div>
		<input id="toggle" type="checkbox" title="Click to select">
		<ul class="nu__grid-filters-options">

			<?php
				$return = '';
				$guide = '<li><a %s href="%s" title="Show %s">%s <span>&#xE313;</span></a></li>';
				foreach($filterOptions as $fO){
					$return .= sprintf(
						$guide
						,($filter == $fO['filter']?'class="active"':'')
						,get_page_link().$fO['filter']
						,strtolower($fO['title'])
						,$fO['title']
					);
				}
				echo $return;
			?>

		</ul>
	</div>
</section>
