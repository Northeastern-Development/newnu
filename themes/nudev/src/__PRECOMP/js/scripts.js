var windowSize = Array(0,0);
var rotators = null;
var iamnavbgs = null;
var contentAreaHeight = 0;
// var cNav = null;
var debug = true;
var showSize = true;
var sizeBreak = 900;
var isSafari = /safari/i.test(navigator.userAgent);
var currentPanel = 0;
var panelCount = 3;
var windowWidth = null;
var offset = 0;




/* ***************************************************************************
The following are globally accessible functions that can be used in any other
script file that extends the functionality for any specific page, etc.
*************************************************************************** */


// get the height of the content area on the page
function getContentAreaHeight(){
	// contentAreaHeight = (parseInt($(window).height()) - parseInt($('header').outerHeight()) - parseInt($('footer').outerHeight()));
	contentAreaHeight = (parseInt($(window).height()) - parseInt($('header').outerHeight()));
}


// we need to pass the browser window size to PHP so that we can better tailor responsive imagery all around
function getWindowSize(){
	windowSize[0] = $(window).height();
	windowSize[1] = $(window).width();
	$.post("/wp-content/themes/nudev/src/windowsize.php",{"height":windowSize[0],"width":windowSize[1]},function(data){
			// console.log(data);
	});
}

/* ************************************************************************ */





(function(root,$,undefined){
	"use strict";

	$(function(){


		// this is for testing and validating break points based on screen size, turned on and off using global var above
		if(showSize){
	    var wi = $(window).width();
	    $("p.testp").text('Screen width is currently: ' + wi + 'px.');

	    $(window).resize(function(){
	      var wi = $(window).width();
	      if (wi <= 576){
	        $("p.testp").text('Screen width is less than or equal to 576px. Width is currently: ' + wi + 'px.');
	      }else if (wi <= 680){
	        $("p.testp").text('Screen width is between 577px and 680px. Width is currently: ' + wi + 'px.');
	      }else if (wi <= 1024){
	        $("p.testp").text('Screen width is between 681px and 1024px. Width is currently: ' + wi + 'px.');
	      }else if (wi <= 1500){
	        $("p.testp").text('Screen width is between 1025px and 1499px. Width is currently: ' + wi + 'px.');
	      }else {
	        $("p.testp").text('Screen width is greater than 1500px. Width is currently: ' + wi + 'px.');
	    	}
	    });
		}
		/* ********************************************** */




		/* ***************************************************************************
		The following is a set of tools and features for all pages as soon as they
		are loaded
		*************************************************************************** */

		// we need to set the main content offset based on: utility nav height, alerts height, and main header height
		$(".main").css({
			"margin-top":$("header").outerHeight()
		});


		function goBack() {
		    window.history.back();

		}


		// if this file has loaded, we want to append an option to let the page know JS is working
		$('body').addClass('nu-js');

		//needed a way to go back a page if someone clicked the search button from the results page.
		//$('input:checkbox').prop('checked', false);
		$('nav input').prop('checked',false);
		$('body.search .js-search-close').on('click touchend', function(){
			goBack();
		});




		// listen for the user to focus on the search bar so that we can make some small design tweaks if JS is available
		if(parseInt($('form#nu__searchbar-form > div > label').css('left')) > 0){	// not already small
			$('#nu__searchbar').on('focus','form#nu__searchbar-form > div > input',function(e){	// focus
				$('form#nu__searchbar-form > div > label').addClass('focus');
				$('form#nu__searchbar-form > div > button.reset').css({'color':'rgba(255,255,255,1.0)','pointer-events':'auto'});
			});
			$('#nu__searchbar').on('blur','form#nu__searchbar-form > div > input',function(e){	// blur
				if($(this).val() == ''){
					$('form#nu__searchbar-form > div > label').removeClass('focus');
					$('form#nu__searchbar-form > div > button.reset').css({'color':'rgba(255,255,255,0.0)','pointer-events':'none'});
				}
			});
		}

		// need a listener on the search reset button to cover some other misc. functionality
		$('form#nu__searchbar-form').on('click','div > button[type=reset]',function(e){
			$('form#nu__searchbar-form > div > input').val('');
			$('form#nu__searchbar-form > div > input').attr('value','');
			$('form#nu__searchbar-form > div > label').removeClass('focus');
			$('form#nu__searchbar-form > div > button.reset').css({'color':'rgba(255,255,255,0.0)','pointer-events':'none'});
		});





		// call the page setup scripts to optimize some items
		getWindowSize();

		/* ************************************************************************ */






		// /* ***************************************************************************
		// The following is a set of tools and features for the homepage
		// *************************************************************************** */

		// these are stored within the separate homepage.js file

		// /* end of the stuff for the homepage */





		/* ***************************************************************************
		The following is a set of tools and features for the main navigation
		*************************************************************************** */

		// these are stored within the separate mainmenu.js file

		/* end of the stuff for the main navigation */







		// let's listen for the page to resize and handle some events
		$(window).on("resize",function(){

			getWindowSize();

			// reset the offset to position content just below the header
			$(".main").css({
				"margin-top":$("header").outerHeight()
			});




		});

	});
}(this,jQuery));
