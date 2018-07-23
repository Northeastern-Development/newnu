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
var exceedsContainer = false;




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


		// let's check to see if they have accepted the cookie window or not, and display it if they have not accepted
		if(localStorage.getItem('acceptCookies') != 'true'){
        // $(".cookiewarning").delay(1000).fadeIn(250);	// this is turned off until layout is created and approved
    }



		// listen for the user to click on the accept and continue button for the cookies
		$('.cookiewarning').on('click','.js__cookie-accept',function(e){	// the user has clicked on the accept button
			localStorage.setItem('acceptCookies','true');	// set the cookie into localstorage that they agreed
			$(".cookiewarning").fadeOut(250);
		});




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
				// $('form#nu__searchbar-form > div > button.reset').css({'color':'rgba(255,255,255,1.0)','pointer-events':'auto'});
			});
			$('#nu__searchbar').on('blur','form#nu__searchbar-form > div > input',function(e){	// blur
				if($(this).val() == ''){
					$('form#nu__searchbar-form > div > label').removeClass('focus');
					// $('form#nu__searchbar-form > div > button.reset').css({'color':'rgba(255,255,255,0.0)','pointer-events':'none'});
				}
			});
		}

		// need a listener on the search reset button to cover some other misc. functionality
		$('form#nu__searchbar-form').on('click','div > button[type=reset]',function(e){
			$('form#nu__searchbar-form > div > input').val('');
			$('form#nu__searchbar-form > div > input').attr('value','');
			$('form#nu__searchbar-form > div > label').removeClass('focus');
			// $('form#nu__searchbar-form > div > button.reset').css({'color':'rgba(255,255,255,0.0)','pointer-events':'none'});
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





		// this will handle clicking on the more button in filter options
		$('.nu__filters').on('click','.js__showmore',function(e){

			// console.log('I would like to see more!');

			// showHideMore();

			// $('.nu__filters ul').height('auto');

			if(!$(this).hasClass('active')){
				showMoreFilters();
			}else{
				hideMoreFilters();
			}

		});


		// function showHideMore(){
		// 	if(!$('.js__showmore').hasClass('active')){
		// 		$('.js__showmore').addClass('active');
		// 		$('.nu__filters > div > ul > li.inshowmore').each(function(){
		// 			$(this).show();
		// 		});
		// 	}else{
		// 		$('.js__showmore').removeClass('active');
		// 		$('.nu__filters > div > ul > li.inshowmore').each(function(){
		// 			$(this).hide();
		// 		});
		// 	}
		// }

		function showMoreFilters(){
			if(!$('.js__showmore').hasClass('active')){
				$('.js__showmore').addClass('active');
				$('.nu__filters > div > ul > li.inshowmore').each(function(){
					$(this).css({'opacity':'1.0'});
				});
				$('.nu__filters').css({'overflow':'visible'});
			}
		}

		function hideMoreFilters(){
			if($('.js__showmore').hasClass('active')){
				$('.js__showmore').removeClass('active');
				$('.nu__filters > div > ul > li.inshowmore').each(function(){
					$(this).css({'opacity':'0.0'});
				});
				$('.nu__filters').css({'overflow':'hidden'});
			}
		}



		// function closeMore(){
		// 	$('.nu__filters > div > ul > li.inshowmore').each(function(){
		// 		$(this).hide();
		// 	});
		// }






		// this function will check filter navs used on pages to see if the items exceed the width of the container
		function filterNavCheck(){

			if($(window).width() <= 620){	// we are on a much smaller screen, so ignore the more option and stack via CSS
				// console.log('screen size less than 620px');
				$('.nu__filters > div > div').hide();
				$('.nu__filters > div > ul > li').removeAttr('style');
				$('.nu__filters > div > ul > li').removeClass('inshowmore');
				exceedsContainer = false;
			}else{	// we need to use the more option to allow user to see all options

				// $('.nu__filters > div > div').show();	// we need to show the more option

				var offset = 0;
				var filterWidth = $('.nu__filters > div > ul').width();

				// total up the width of all of the filter options
				var itemWidth = 0;
				var tPos = $('.nu__filters > div > ul > li').first().position().top;
				//console.log(tPos);
				var vOffset = ($('.nu__filters').height() - 2);

				// console.log(vOffset);

				// $('.nu__filters > div > ul > li.inshowmore').removeAttr('style');
				// $('.nu__filters > div > ul > li.inshowmore').removeClass('inshowmore');

				// $('.nu__filters > div > ul > li.inshowmore').removeAttr('style');
				$('.nu__filters > div > ul > li.inshowmore').removeClass('inshowmore');

				$('.nu__filters > div > ul > li > a').each(function(i){
					itemWidth += $(this).outerWidth();
					//console.log($(this).parent().position().top);
					// if($(this).parent().position().top > tPos){
					if(itemWidth > filterWidth){
						//console.log($(this));
						$(this).parent().addClass('inshowmore').css({'top':vOffset});
						vOffset += $(this).parent().height();
					}else{

						// need to re-check the position vs width here to remove styles if no longer hiding

						// $('.nu__filters > div > ul > li.inshowmore').removeAttr('style');
						// $('.nu__filters > div > ul > li.inshowmore').removeClass('inshowmore');
						// // $(this).parent().removeClass('inshowmore').css({'top':vOffset});
						// vOffset -= $(this).parent().height();
						$(this).parent().removeAttr('style');
						$(this).parent().removeClass('inshowmore');
					}
				});

				// now let's figure out if the content fits inside the container or not
				if((itemWidth + offset) >= filterWidth){
					if(!exceedsContainer){
						// console.log('content exceeds container!');
						exceedsContainer = true;

						// let's show the more button as the items do not fit
						$('.nu__filters > div > div').show();

					}
				}else if((itemWidth + offset) < filterWidth){
					if(exceedsContainer){
						// console.log('content fits within container again!');
						exceedsContainer = false;

						// more than enough room, hide the more button
						$('.nu__filters > div > div').hide();

						$('.nu__filters > div > ul > li.inshowmore').removeAttr('style');
						$('.nu__filters > div > ul > li.inshowmore').removeClass('inshowmore');

					}
				}
			}
		}

		// if we are NOT on the homepage, kick off a filter check right away
		if(!$('body').hasClass('home') && $('.nu__filters').length > 0){
			filterNavCheck();
		}







		// let's listen for the page to resize and handle some events
		$(window).on("resize",function(){

			getWindowSize();	// check the window size

			// if we are NOT on the homepage, kick off a filter check
			if(!$('body').hasClass('home') && $('.nu__filters').length > 0){
				filterNavCheck();	// check to see what needs to be shown and what is overflow for filters
				hideMoreFilters();	// hide the additional filters if they are visible
			}

			// reset the offset to position content just below the header
			$(".main").css({
				"margin-top":$("header").outerHeight()
			});

		});





		// need to set up an on-scroll event that IS NOT going to activate on the homepage
		$(window).on("scroll",function(){

			// we will ONLY check scroll on pages other than the homepage
			if(!$('body').hasClass('home')){

				// we should make sure that the more options for filters close if we scroll the page
				hideMoreFilters();

			}
		});




	});
}(this,jQuery));
