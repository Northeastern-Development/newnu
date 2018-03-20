(function(root,$,undefined){
	"use strict";

	$(function(){

		// set up some common animation speeds
		var animationSpeeds = Array(
			 200
			,1500
		);
		var windowSize = Array(0,0);
		var rotators = null;
		var contentAreaHeight = 0;
		var cNav = null;
		var debug = true;
		var showSize = false;





		/*Remove the lines below once you are done testing to set break points for various screen sizes*/
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





		// we need to set the main content offset based on: utility nav height, alerts height, and main header height
		$("main").css({
			"margin-top":$("header").outerHeight()
		});





		// if this file has loaded, we want to append an option to let the page know JS is working
		$('body').addClass('nu-js');






		// need to account for the alerts being open and shift the main menu overlays down to match!!
		if(parseInt($('#nu__alerts').height()) > 0){
			$('#nu__supernav,#nu__iamnav,#nu__searchbar').css({'top':parseInt($('#nu__alerts').outerHeight())});
		}




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
			console.log('reset');
			$('form#nu__searchbar-form > div > input').val('');
			$('form#nu__searchbar-form > div > input').attr('value','');
			$('form#nu__searchbar-form > div > label').removeClass('focus');
			$('form#nu__searchbar-form > div > button.reset').css({'color':'rgba(255,255,255,0.0)','pointer-events':'none'});
		});





		// get the height of the content area on the page
		function getContentAreaHeight(){
			contentAreaHeight = parseInt($(window).height()) - parseInt($('header').outerHeight());
		}





		// set the height of menu panels if we made it this far, used to augment the CSS
		function setMenuPanels(){
			getContentAreaHeight();
			$('div.navigational > section > div.items').css({'height':contentAreaHeight,'min-height':contentAreaHeight});
		}





		// we need to pass the browser window size to PHP so that we can better tailor responsive imagery all around
		function getWindowSize(){
			windowSize[0] = $(window).height();
			windowSize[1] = $(window).width();
			$.post("/wp-content/themes/nudev/src/windowsize.php",{"height":windowSize[0],"width":windowSize[1]},function(data){
					// console.log(data);
    	});
		}





		// call the page setup scripts to optimize some items
		setMenuPanels();
		getWindowSize();






		/* ***************************************************************************
		The following is a set of tools and features for the homepage
		*************************************************************************** */
		if($('body').hasClass('home')){

			// local vars within the home section
			var inMotion = false;
	    var windowWidth = $(window).width() * -1;
	    var offset = 0;
	    var currentPanel = 0;
	    var panelCount = 3;
			var isSafari = /safari/i.test(navigator.userAgent);
	    var aspeeds = (isSafari?1500:800);
			var sizeBreak = 900;
			var ww = $(window).width();
	    var myPanels = document.getElementById('nu__stories');
			var mc = new Hammer(myPanels);





			// need to figure out if we need to remove extra height from the content if alerts are visible
			if(parseInt($('#nu__alerts').height()) > 0){
				var hpHeight = parseInt($(window).height()) - parseInt($('header').height()) - parseInt($('footer').height());
				$('main#nu__homepage').css({'height':hpHeight,'min-height':hpHeight});
			}





			// gather up the rotator panels data and store the object to be used below
			$.post("/wp-content/themes/nudev/src/hprotatordata.php",function(data){
					rotators = JSON.parse(data);
    	});





			// since we made it this far, turn on the rotator arrows
			$('article.nu__block-rotator .rotate').css({'display':'block'});





			// the following handles clicking next and previous arrows within a rotator
			$('article.nu__block-rotator').on("click",".rotate",function(e){
				var elem = $(this).parent().parent().parent();
				var id = elem.attr('data-rotatorid');
				var sCount = parseInt(elem.attr('data-slidemax'));
				var cSlide = parseInt(elem.attr('data-cslide'));
				if($(this).hasClass('slider_prev')){
					contentSwap(parseInt(cSlide - 1) < 1 ?sCount:parseInt(cSlide - 1));
				}else{
					contentSwap(parseInt(cSlide + 1) > sCount?1:parseInt(cSlide + 1));
				}

				// this will actually perform the content swapping
				function contentSwap(a){
					elem.find('a').fadeOut(150,function(){	// fade out the rotator content
						elem.attr('data-cslide',a);	// set the new value of the current slide
						elem.find('a').prop('style','background-image: url('+rotators[id][a][0]+');');	// change the background image
						elem.find('a').attr('href',rotators[id][a][1]);	// change the link
						elem.find('a').attr('target',rotators[id][a][3]);	// change the link target style (local or external)
						elem.find('div > h2').html(rotators[id][a][2]);	// change the title of the slide
						elem.find('a').fadeIn(150);	// fade it all back in
					});
				}
			});





			// this will activate the left and right arrows to control the slider on the homepage if in debug mode
			// hidden by default, only appears if JS enabled
			if(debug){
				if (ww >= 900){
				  $('#next').fadeIn(200);
				}else {
				  $('#next').fadeOut(200);
				}
			}





			// this will handle to peekaboo footer
			$('div.nu__footer').on('click','.js_footer-hideshow',function(e){
				if($('footer#nu__global-footer').hasClass('collapse')){
					$('footer#nu__global-footer').removeClass('collapse');
				}else{
					$('footer#nu__global-footer').addClass('collapse');
				}
			});





			// this is the event listener for mousewheel only on the homepage for the slider
			$("body").on('mousewheel', { mousewheel: { behavior: 'debounce', delay: 100 } }, function(event,delta){
	      if (ww >= sizeBreak && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false && event.deltaX == 0){

	        if (event.deltaY <= (isSafari?-1:-15) && currentPanel < 2){
	          event.preventDefault();
	          slidePanels('Left');
	          inMotion = true;
	        }else if (event.deltaY >= (isSafari?1:15) && currentPanel != 0){
	          event.preventDefault();
	          slidePanels('Right');
	          inMotion = true;
	        }

	      }
	   	});





			// this is the event listener for the next and previous arrows for the slider
			$('body').on("click","#prev,#next",function(e){
				if(ww >= sizeBreak  && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false){
					inMotion = true;
					if($(this).attr('id') == 'next'){
						slidePanels('Left');
					}else{
						slidePanels('Right');
					}
				}
			});





			// this is the event listener for the arrow keys for the slider
			$(document).keydown(function(e){
					if(ww >= sizeBreak  && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false){
					switch (e.which){
						case 37:		// left arrow key
						case 38:    //up arrow key
							slidePanels('Right');
							break;
						case 39:    //right arrow key
						case 40:    //bottom arrow key
							slidePanels('Left');
							break;
					}
				}
			});





			// this will handle the swiping left and right to control the slider, uses hammer js
			mc.on("swipeleft", function(ev) {
		    inMotion = true;
		    slidePanels('Left');
		  });

			mc.on("swiperight", function(ev) {
		    inMotion = true;
		    slidePanels('Right');
		  });





		  // this is the brain for all that is happening
		  function slidePanels(a){
		    if (ww >= 900){

					// check to see if we need to collapse the footer
					if(!$('footer#nu__global-footer').hasClass('collapse')){
						$('footer#nu__global-footer').addClass('collapse');
					}

					var e = '#nu__stories';

		      $(e).css({'pointer-events':'none'});//disables hover of tiles until animation to the next screen stops
		      if(a === 'Left' && currentPanel < panelCount -1){//this moves the panels to the right
		        offset += windowWidth;
		        currentPanel++;
						if(debug){
			        if(currentPanel == panelCount -1){
			          $("#next").css({'display':'none'});
			        }else {
			          $("#next").css({'display':'block'});
			          $("#prev").css({'display':'block'});
			        }
						}
		        $(e).animate({"margin-left":  offset }, aspeeds, function() {
		          inMotion = false;
		          $(e).css({'pointer-events':'auto'});//enables hover of tiles until animation to the next screen stops
		        });
		      }else if (a === 'Right' && currentPanel > 0){//this moves the panels to the left
		        offset -= windowWidth
		        currentPanel--;
						if(debug){
			        if(currentPanel == panelCount -1){
			          $("#next").css({'display':'block'});
			        }else if(currentPanel == 0) {
			          $("#prev").css({'display':'none'});
			          $("#next").css({'display':'block'});
			        }else {
			          $("#next").css({'display':'block'});
			        }
						}
		        $(e).animate({"margin-left":  offset }, aspeeds, function() {
		          inMotion = false;
		          $(e).css({'pointer-events':'auto'});//enables hover of tiles until animation to the next screen stops
		        });
		      }
		    }
		  }

		}
		/* end of the stuff for the homepage */





		/* ***************************************************************************
		The following is a set of tools and features for the main navigation
		*************************************************************************** */

		// this will handle some preventitive measures in the main nav regarding overlap of options
		$('nav').on('click','input#nu__supernav-toggle,input#nu__iamnav-toggle,input#nu__search-toggle',function(){

			// determine which nav we are looking at and whether it is the currently active one, in which case close it
			if(cNav == null){
				$(this).prop('checked',true);
				cNav = $(this).attr('id');
			}else if($(this).attr('id') == cNav){
				$(this).prop('checked',false);
			}else{
				$('nav input').prop('checked',false);
				$(this).prop('checked',true);
				cNav = $(this).attr('id');
			}

			// need to reset the first item in the supernav and iamnav menu to be active
			$('#nu__supernav > section > div > ul > li.active').removeClass('active');
			$('#nu__supernav > section > div > ul > li:first-child').addClass('active');
			$('#nu__iamnav > section > div > ul > li.active').removeClass('active');
			$('#nu__iamnav > section > div > ul > li:first-child').addClass('active');

			allowScrollOrNot();

			// if we are on the search page, we need to restrict opening the search again on top of itself
			if($('body').hasClass('search')){
				$('input#nu__search-toggle').prop('checked',false);
				allowScrollOrNot();
			}

			// check to see if we need to collapse the footer if it is already open
			if($('body').hasClass('home') && !$('footer#nu__global-footer').hasClass('collapse')){
				$('footer#nu__global-footer').addClass('collapse');
			}

		});





		// this function will determine whether or not to allow the page to scroll, if the menu is open or not
		function allowScrollOrNot(){

			// prevent the main page from scrolling when the nav is open or allow it if we close the navs
			if($('input#nu__search-toggle').prop('checked') || $('input#nu__iamnav-toggle').prop('checked') || $('input#nu__supernav-toggle').prop('checked')){
				$('html').css({'overflow-y':'hidden'});
			}else{
				$('html').css({'overflow-y':'scroll'});
			}

		}





		// this will handle the accordion functionality for the main navigational elements
		$('div.navigational > section > div > ul').on('click','li:not(.featured)',function(e){
			$('div.navigational > section > div > ul li').removeClass('active');
			$(this).addClass('active');
		});

		/* end of the stuff for the main navigation */







		// let's listen for the page to resize and handle some events
		$(window).on("resize",function(){

			getWindowSize();

			setMenuPanels();

			// reset the offset to position content just below the header
			$("main").css({
				"margin-top":$("header").outerHeight()
			});


			// need to account for the alerts being open and shift the main menu overlays down to match!!
			if(parseInt($('#nu__alerts').height()) > 0){
				$('#nu__supernav,#nu__iamnav,#nu__searchbar').css({'top':parseInt($('header').outerHeight())});
			}


			if($('body').hasClass('home')){	// we need to make sure that we are resizing and keeping only 1 panel on the screen during resize

				ww = $(window).width();

				// if alerts are showing we need to accoutn for that in the content area of the homepage
				if(parseInt($('#nu__alerts').height()) > 0){

					var hpHeight = parseInt($(window).height()) - parseInt($('header').outerHeight()) - parseInt($('footer').height());
					$('main#nu__homepage').css({'height':hpHeight,'min-height':hpHeight});

				}


				// if we are below 900px wide, we will just stack
				if(ww < 900){
					$('#nu__stories').css({'margin-left':'0'});
					currentPanel = 0;
					offset = 0;


					// need to reset the next and previous arrows in here as well to be ready again before we hide them


				}


				var newWidth = $(window).width() * -1;

				var wDiff = (windowWidth - newWidth);

				if(currentPanel > 0){

					var newOffset = (offset - (wDiff * currentPanel));

					$('#nu__stories').css({"margin-left":newOffset});
					offset = newOffset;
				}

				windowWidth = newWidth;

			}
		});

	});
}(this,jQuery));
