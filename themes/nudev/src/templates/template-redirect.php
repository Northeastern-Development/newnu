<?php

	/* Template Name: Redirect */

	// this page will simply act as a redirect to get to the correct content elsewhere on the Internet
	switch ($pagename) {
    case 'research':
			header('location:http://northeastern.edu/research');
			break;
    // case 1:
    //     echo "i equals 1";
    //     break;
    // case 2:
    //     echo "i equals 2";
    //     break;
	}
	exit();

?>
