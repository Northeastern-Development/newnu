<?php

  // build out the introduction area
  $introduction = '<p>'.$fields['introduction']['introduction_summary'].'</p><ul role="list">';

  $bulletGuide = '<li role="listitem">%s</li>';

  foreach($fields['introduction']['introduction_bullet_points'] as $bP){
    $introduction .= sprintf(
      $bulletGuide
      ,$bP['introduction_bullet_points_bullet']
    );
  }

  $introduction .= '</ul>';

  echo $introduction;

?>
