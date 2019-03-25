<?php

  // build out the editorial layout (experience) section
  $poweredByExperience = '';

  $experienceGuide = '<div class="copy"><h3>%s</h3>%s</div><div class="image" style="background-image:url(%s);" aria-label="%s"></div>';

  $poweredByExperience .= sprintf(
    $experienceGuide
    ,$fields['powered_by_experience']['powered_by_experience_title']
    ,$fields['powered_by_experience']['powered_by_experience_copy']
    ,$fields['powered_by_experience']['powered_by_experience_image']['url']
    ,$fields['powered_by_experience']['powered_by_experience_image']['caption']
  );

  echo $poweredByExperience;

?>
