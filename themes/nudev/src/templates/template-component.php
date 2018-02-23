<?php
  /**
   * Template Name: Shared Component
   */

  if($_GET['return'] === 'main-menu'){

    $returnType = 'return';

    $menu = include(get_template_directory().'/loops/loop-supernav.php');

    echo '<!-- link to where css can be found if being done manually --><div id="nu__utility-nav"><a href="//northeastern.edu" title="Northeastern University"><img src="/wp-content/uploads/seal.jpg" alt="northeastern university seal" /></a><div><input id="nu__supernav-toggle" type="checkbox" title="Click to show/hide main menu" /><label for="nu__supernav-toggle" id="nu__supernav-toggle-label"></label><div id="nu__supernav" class="utilitystyle">'.$menu.'</div></div></div>';
  }else{ // held for future use
    //echo 'this will provide a shared component to the calling page';
  }

?>
