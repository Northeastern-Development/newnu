<?php

  // build out the quotes
  $quotes = '';
  $quotesOptions = '<ul role="list">';

  $quotesGuide = '<article id="slider-article-%s" class="%s"><p class="quote">%s</p><p class="attribution">%s</p></article>';

  $quotesOptionsGuide = '<li role="listitem"><a href="javascript:void(%s);" title="Click to view item %s" aria-label="Click to view item %s" class="%s" data-id="%s">%s</a></li>';

  $cnt = 1;

  foreach($fields['quotes'] as $qT){
    $quotes .= sprintf(
      $quotesGuide
      ,$cnt
      ,($cnt == 1?'active':'')
      ,$qT['quotes_quote']
      ,$qT['quotes_attribution']
    );
    $quotesOptions .= sprintf(
      $quotesOptionsGuide
      ,$cnt
      ,$cnt
      ,$cnt
      ,($cnt == 1?'active':'')
      ,$cnt
      ,$cnt
    );
    $cnt++;
  }

  $quotesOptions .= '</ul>';

  echo $quotes.$quotesOptions;

?>
