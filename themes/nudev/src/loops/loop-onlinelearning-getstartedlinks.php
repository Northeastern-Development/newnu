<?php

  // build out the links for the get started section
  $getStartedLinks = '';

  $linkGuide = '<a href="%s" title="More about %s%s" aria-label="More about %s%s"%s>%s</a>';

  foreach($fields['get_started']['get_started_links'] as $gS){
    $getStartedLinks .= sprintf(
      $linkGuide
      ,$gS['get_started_links_url']
      ,strtolower($gS['get_started_links_link_text'])
      ,(isset($gS['get_started_links_internalexternal']) && $gS['get_started_links_internalexternal'] == 1?' [will open in new tab/window]':'')
      ,strtolower($gS['get_started_links_link_text'])
      ,(isset($gS['get_started_links_internalexternal']) && $gS['get_started_links_internalexternal'] == 1?' [will open in new tab/window]':'')
      ,(isset($gS['get_started_links_internalexternal']) && $gS['get_started_links_internalexternal'] == 1?' target="_blank"':'')
      ,$gS['get_started_links_link_text']
    );
  }

  echo $getStartedLinks;

?>
