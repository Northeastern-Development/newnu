// this file is the JS for the main menu ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file

var cNav = null;

(function(root,$,undefined){
	"use strict";

	$(function(){


    // set the height of menu panels if we made it this far, used to augment the CSS
		function setMenuPanels(){
			getContentAreaHeight();
			$('div.navigational > section > div.items').css({'height':contentAreaHeight,'min-height':contentAreaHeight});
			if($('body').hasClass('search')){
				$('#nu__search section').css({'min-height':contentAreaHeight});
			}
		}


    setMenuPanels();


    // we need to perform some tweaks to the site if we are below the break size on load
		if(windowSize[1] < 740){
			navReset();
		}





    // need to account for the alerts being open and shift the main menu overlays down to match!!
		if(parseInt($('#nu__alerts').height()) > 0){
			$('#nu__supernav,#nu__iamnav,#nu__searchbar').css({'top':parseInt($('#nu__alerts').outerHeight())});
		}





    // gather up the background images for the iam nav categories
    $.post("/wp-content/themes/nudev/src/iamnavbgs.php",function(data){
			iamnavbgs = JSON.parse(data);
		});




    // NEW A TAG VERSION
    // this will handle the click of main menu items as well as some preventitive measures regarding overlap of options
		$('nav').on('click','a.js__mainmenu-item',function(e){

      // prevent the default link action
      e.preventDefault();

			// determine which nav we are looking at and whether it is the currently active one, in which case close it
			if(cNav == null){  // if no menu is currently open
        $(this).addClass('active').focus().html('Close').next('div').addClass('open');
				cNav = $(this).attr('id');
			}else if($(this).attr('id') == cNav){  // if we have clicked the same menu item again after it was open
        $(this).removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');
				cNav = null;
			}else{ // if we have clicked another menu item while one was already open

        $('nav a.js__mainmenu-item').each(function(i){  // force all of them closed/clear
          $(this).removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');
        });

        $(this).addClass('active').focus().next('div').addClass('open');  // activate the one that was selected
				cNav = $(this).attr('id');
			}



			// // if we are on a screensize below the break size, we need to autoscroll the nav element that was selected to the top just below the header
			// // for ease of use
			// if(windowSize[1] < sizeBreak){
			// 	console.log($(this));
			// }



			// need to reset the first item in the supernav and iamnav menu to be active
			navReset();

			// if we are on the search page, we need to restrict opening the search again on top of itself
			if($('body').hasClass('search')){
				$('input#nu__search-toggle').prop('checked',false);
			}

			// check to see if we need to collapse the footer if it is already open (homepage only)
			if($('body').hasClass('home') && !$('footer#nu__global-footer').hasClass('collapse')){
				$('footer#nu__global-footer').addClass('collapse');
			}

			// if(!$('body').hasClass('home')){
			// 	allowScrollOrNot();
			// }

		});




    // OLD CHECKBOX VERSION CODE
		// this will handle the click of main menu items as well as some preventitive measures regarding overlap of options
		$('nav').on('click','input#nu__supernav-toggle,input#nu__iamnav-toggle,input#nu__search-toggle',function(){

			// determine which nav we are looking at and whether it is the currently active one, in which case close it
			if(cNav == null){
				$(this).prop('checked',true);
				cNav = $(this).attr('id');
			}else if($(this).attr('id') == cNav){
				$(this).prop('checked',false);
				cNav = null;
			}else{
				$('nav input').prop('checked',false);
				$(this).prop('checked',true);
				cNav = $(this).attr('id');
			}



			// // if we are on a screensize below the break size, we need to autoscroll the nav element that was selected to the top just below the header
			// // for ease of use
			// if(windowSize[1] < sizeBreak){
			// 	console.log($(this));
			// }



			// need to reset the first item in the supernav and iamnav menu to be active
			navReset();

			// if we are on the search page, we need to restrict opening the search again on top of itself
			if($('body').hasClass('search')){
				$('input#nu__search-toggle').prop('checked',false);
			}

			// check to see if we need to collapse the footer if it is already open (homepage only)
			if($('body').hasClass('home') && !$('footer#nu__global-footer').hasClass('collapse')){
				$('footer#nu__global-footer').addClass('collapse');
			}

			// if(!$('body').hasClass('home')){
			// 	allowScrollOrNot();
			// }

		});





		// this will handle resetting the nav panels
		function navReset(){

			// every state has to reset the first items from being active
			$('#nu__supernav > section > div > ul > li.active').removeClass('active');
			$('#nu__iamnav > section > div > ul > li.active').removeClass('active');

			if(windowSize[1] > 740){	// above break size, show first cat automagically
				$('#nu__supernav > section > div > ul > li:first-child').addClass('active');
				$('#nu__iamnav > section > div > ul > li:first-child').addClass('active');
			}

			if(!$('body').hasClass('home')){
				allowScrollOrNot();
			}
		}





		// if the user clicks outside the menu items and on the empty portion of the fullscreen sneezeguard, close the nav panels
		$('nav.nu__mainmenu').on('click','div#nu__supernav,div#nu__searchbar,div#nu__iamnav',function(e){
			if(['nu__supernav','nu__searchbar','nu__iamnav'].indexOf(e.target.id) >= 0){
				$('nav input').prop('checked',false);
				cNav = null;
				allowScrollOrNot();
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




			// if we are on a screensize below the break size, we need to autoscroll the nav element that was selected to the top just below the header
			// for ease of use
			// if(windowSize[1] < sizeBreak){
			// 	console.log($(this));
			// 	$(window).scrollTop(0);
			// }


			// if we are clicking on cats in the iamnav, we may need to swap the background image
			// console.log(iamnavbgs);
			if($(this).parent().parent().parent().parent().attr('id') == 'nu__iamnav' && iamnavbgs.length > 0 && iamnavbgs[0] != ''){
				$('div#nu__iamnav').attr('style','background-image: url('+iamnavbgs[$(this).index()]+');');
			}




			$('div.navigational > section > div > ul li').removeClass('active');
			$(this).addClass('active');
		});




    // let's listen for the page to resize and handle some events
		$(window).on("resize",function(){

			// getWindowSize();

			setMenuPanels();

      // need to account for the alerts being open and shift the main menu overlays down to match!!
			if(parseInt($('#nu__alerts').height()) > 0){
				$('#nu__supernav,#nu__iamnav,#nu__searchbar').css({'top':parseInt($('header').outerHeight())});
			}

      // reset the navigation panels
			navReset();

		});





  });
}(this,jQuery));
