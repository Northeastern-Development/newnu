<?php
  /**
   * Template Name: Shared Component
   */

  if(isset($_GET['return']) && $_GET['return'] != ''){

    if($_GET['return'] === 'main-menu'){

      $returnType = 'return';

      $menu = include(get_template_directory().'/loops/loop-supernav.php');
      $url  = site_url();

      echo '<div id="nu__utility-nav"><a href="https://www.northeastern.edu" title="Northeastern University" target="_blank"><img src="'.$url.'/wp-content/uploads/global-logo.png" alt="northeastern university seal" /></a><div id="nu__mainmenu-supernav"><a id="nu__supernav-toggle" href="main-menu" title="Click to show/hide explore northeastern menu" tabindex="3" role="menuitem" aria-haspopup="true" class="js__mainmenu-item" data-title="Menu">EXPLORE NORTHEASTERN</a>'.$menu.'</div></div>';

    }else if($_GET['return'] === 'footer'){

      include(get_template_directory().'/footer.php');

    }else if($_GET['return'] === 'alerts'){
      echo getAlerts();
    }

  }else{
    echo 'ERROR: invalid component request';
  }

?>
