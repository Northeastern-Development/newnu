<?php
  /**
   * Template Name: Shared Component
   */

  if(isset($_GET['return']) && $_GET['return'] != ''){

    $returnType = 'return';

    if($_GET['return'] === 'main-menu'){ // build out the global header to be returned to the requesting site

      $menu = include(get_template_directory().'/loops/loop-supernav.php');
      $url  = site_url();

      echo '<div id="nu__utility-nav"><a href="https://www.northeastern.edu" title="Northeastern University" aria-label="Northeastern University" target="_blank"><img src="https://brand.northeastern.edu/global/assets/logos/northeastern/png/transparent/logo-204x158.png" alt="northeastern university seal" aria-label="northeastern university seal" /></a><div id="nu__mainmenu-supernav"><a id="nu__supernav-toggle" href="main-menu" title="Click to show/hide explore northeastern menu" aria-haspopup="true" class="js__mainmenu-item" data-title="Menu">EXPLORE NORTHEASTERN</a>'.$menu.'</div></div>';

    }else if($_GET['return'] === 'footer'){ // build out the global footer to be returned to the requesting site

      include(get_template_directory().'/includes/footer.php');

    // }else if($_GET['return'] === 'alerts'){ // build out the alerts to be returned to the requesting site
    //
    //   echo getAlerts();
    //   // echo 'this will show active alerts';

    }

    // alerts are now handled by the micro-service @ alerts.northeastern.edu

  }else{
    echo 'ERROR: invalid component request';
  }

?>
