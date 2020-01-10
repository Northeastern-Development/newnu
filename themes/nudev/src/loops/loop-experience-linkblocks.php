<?php

  $linkBlocks = $pageFields['experience_link_blocks'];  // grab the content for the link blocks from the CMS

  $returnLB = '';

  $guide = '<li><a href="%1$s" title="Learn more about %2$s" aria-label="Learn more about %2$s"%3$s><div class="bgimage"><h3>%2$s</h3><div style="background-image: url(%4$s);" aria-label="image for %2$s"></div></div><div class="copy"><p>%5$s</p><p class="cta"><span>%6$s</span></p></div></a></li>';

  foreach($linkBlocks as $lB){  // loop through each rec in the link blocks
    $returnLB .= sprintf(
      $guide
      ,$lB['experience_link_blocks_item_link']
      ,trim($lB['experience_link_blocks_item_title'])
      ,($lB['experience_link_blocks_internalexternal'] == '1'?' target="_blank"':'')
      ,$lB['experience_link_blocks_item_image']['url']
      ,trim($lB['experience_link_blocks_item_description'])
      ,trim($lB['experience_link_blocks_item_cta'])
    );
  }

  echo $returnLB; // echo the built content back to the screen

?>
