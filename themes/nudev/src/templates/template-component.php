<?php
  /**
   * Template Name: Shared Component
   */

  if($_GET['return'] === 'main-menu'){

    $returnType = 'return';

    $menu = include(get_template_directory().'/loops/loop-supernav.php');

    echo '<div id="nu__utility-nav"><a href="//northeastern.edu" title="Northeastern University"><img src="/wp-content/uploads/seal.jpg" alt="northeastern university seal" /></a><div id="nu__mainmenu-supernav"><input id="nu__supernav-toggle" type="checkbox" title="Click to show/hide main menu" /><label for="nu__supernav-toggle"id="nu__supernav-toggle-label"></label>'.$menu.'</div></div>';
  }else if($_GET['return'] === 'footer'){

    include(get_template_directory().'/footer.php');

  }else{ // held for future use
    //echo 'this will provide a shared component to the calling page';
  }

?>
