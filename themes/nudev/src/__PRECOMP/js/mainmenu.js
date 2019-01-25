// this file is the JS for the main menu ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file

var cNav = null;
var navPanelInMotion = false;

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
		



		// we need to have an event listener for the first and last items in each of the nav panels
		$('nav.nu__mainmenu').on('focus','a.js__closepanelend',function(e){
			blurNavPanels();
		});

		$('nav.nu__mainmenu').on('focus','a.js__closepanelstart',function(e){
			blurNavPanels();
		});


		$('nav.nu__mainmenu').on('click','a.js__mainmenu-item',function(e){

			e.preventDefault();
			e.stopPropagation();

			var eType = e.type;

			if(eType == 'click' && !navPanelInMotion){	// this is for a click

				navPanelInMotion = true;

				// determine which nav we are looking at and whether it is the currently active one, in which case close it
				if(cNav == null){  // if no menu is currently open

					focusNavPanel($(this));

				}else if($(this).attr('id') == cNav){  // if we have clicked the same menu item again after it was open

					blurSamePanel($(this));

				}else{ // if we have clicked another menu item while one was already open

					blurNavPanels();

					focusNavPanel($(this));

				}

			}else if(eType == 'focusin' && !navPanelInMotion){

				navPanelInMotion = true;

				blurNavPanels();

				var showMe = $(this);

				setTimeout(function(){ focusNavPanel(showMe); }, 100);

			}else if(eType == 'focusout' && !navPanelInMotion){
				navPanelInMotion = true;
			}

			// need to reset the first item in the supernav and iamnav menu to be active
			navReset();

			// if we are on the search page, we need to restrict opening the search again on top of itself
			if($('body').hasClass('search')){
				$('#nu__search-toggle').removeClass('active');
			}

		});


		// this function will handle opening a specific nav panel
		function focusNavPanel(a){

			a.addClass('active').focus().next('div').addClass('open');

			a.next('div').find('form input').focus();

			a.next('div').find('div.items > ul').attr('aria-hidden','false');
			a.next('div').find('div.items > ul > li:not(.sectiontitle)').first().focus();
			a.next('div').find('div.items > ul > li:not(.sectiontitle)').attr('tabindex','1');


			// we need to reveal the dropdown sneezeguard
			$('.js-dropdown-sneezeguard').css({'height':'100%'});

			// set the id of the now open nav panel
			cNav = a.attr('id');
		}


		// this function will handle closing the same nav panel
		function blurSamePanel(a){
			a.removeClass('active').next('div').removeClass('open');
			a.next('div').find('div.items ul').attr('aria-hidden','true');
			a.next('div').find('div.items > ul > li:not(.sectiontitle)').attr('tabindex','-1');
			cNav = null;

			// we need to hide the dropdown sneezeguard
			$('.js-dropdown-sneezeguard').css({'height':'0'});
		}


		// this function will handle closing a specific nav panel
		function blurNavPanels(){
			$('nav a.js__mainmenu-item').each(function(i){  // force all of them closed/clear
				$(this).removeClass('active').blur().next('div').removeClass('open');
				$(this).next('div').find('div.items > ul').attr('aria-hidden','true');
				$(this).next('div').find('div.items > ul > li:not(.sectiontitle)').attr('tabindex','-1');
			});

			// we need to hide the dropdown sneezeguard
			$('.js-dropdown-sneezeguard').css({'height':'0'});

			cNav = null;

			navReset();
		}





		// this will handle resetting the nav panels
		function navReset(){

			// every state has to reset the first items from being active
			$('#nu__supernav > section > div > ul > li.active').removeClass('active');
			$('#nu__supernav > section > div > ul > li').first().addClass('active');

			if(windowSize[1] > 740){	// above break size, show first cat automagically
				$('#nu__supernav > section > div > ul > li:first-child').addClass('active');
			}

			allowScrollOrNot();

			setTimeout(function(){ navPanelInMotion = false; }, 100);

		}





		// if the user clicks outside the menu items and on the empty portion of the fullscreen sneezeguard, close the nav panels
    $('nav.nu__mainmenu').on('click','div#nu__supernav,div#nu__searchbar,div#nu__iamnav',function(e){
			if(['nu__supernav','nu__searchbar','nu__iamnav'].indexOf(e.target.id) >= 0){

        $('nav a.js__mainmenu-item').each(function(i){  // force all of them closed/clear
					$(this).removeClass('active').blur().next('div').removeClass('open');
        });

				// we need to hide the dropdown sneezeguard
				$('.js-dropdown-sneezeguard').css({'height':'0'});

				cNav = null;
				allowScrollOrNot();
			}
		});





		// if we focus on a main nav item that is NOT a dropdown, we still want to close any open dropdown
		$('ul.dropdowns').on('focus mouseover','li.js-single',function(e){
			$('ul.dropdowns > li > ul').hide();
			$('ul.dropdowns > li.js-dropdown').find('a').removeClass('open');
		});





		// this will handle the new dropdown system for items outside the hamburger menu
		$('ul.dropdowns').on('focus mouseover','li.js-dropdown',function(e){
			$('ul.dropdowns > li > ul').hide();
			openCloseDropdown($(this));
		});


		// use this if we want to tab through all of the sub items
		$('ul.dropdowns').on('mouseout','li.js-dropdown',function(e){
			$('ul.dropdowns > li.js-dropdown').find('ul > li > a').attr('tabindex','-1');
			$('ul.dropdowns > li.js-dropdown').find('ul').hide();
			$('ul.dropdowns > li.js-dropdown').find('a').removeClass('open');
		});





		// this will perform the hide and show of the dropdowns
		function openCloseDropdown(a){

			$('ul.dropdowns > li.js-dropdown').find('a').removeClass('open');

			if(a.find('ul').css('display') == 'none'){
				a.find('ul').show();
				a.find('a').addClass('open');

				// turning this on makes the tab go through each drop down menu item, comment out for arrow up/down
				a.find('ul > li > a').attr('tabindex','0');
			}
		}






		// this function will determine whether or not to allow the page to scroll, if the menu is open or not
		function allowScrollOrNot(){

			// prevent the main page from scrolling when the nav is open or allow it if we close the navs
			if($('#nu__search-toggle').hasClass('active') === true || $('#nu__supernav-toggle').hasClass('active') === true){
				$('html').css({'overflow-y':'hidden'});
			}else{
				$('html').css({'overflow-y':'scroll'});
			}

		}


		// this will handle pressing enter on a nav category
		$('div.navigational > section > div.items > ul > li:not(.featured)').focus(function(e){
			changeNavCat($(this));
		});


		// this is the function that will actually change the category
		function changeNavCat(a){

			// we need to handle activating the correct aria-hidden values as we change categories
      a.parent().find('li ul').attr('aria-hidden','true');
			a.parent().find('li ul li').attr('tabindex','-1');
      a.find('ul').first().attr('aria-hidden','false');
			a.find('ul li:not(.sectiontitle)').attr('tabindex','1');

			$('div.navigational > section > div > ul li').removeClass('active');
			a.addClass('active');

		}


    // this is the event listener for the user to press esc to close the menu panels
		$(document).on('keydown','html',function(e){

			// if one of the dropdowns is open, then we can use arrow keys to nav up and down the options
			if($('#dropdown-admissions').find('ul').attr('aria-hidden') == 'false'){

				// listen for the arrow press up and down here
				if(e.which == 38){
					e.preventDefault();
				}else if(e.which == 40){
					e.preventDefault();
				}
			}


			// if one of the super nav options is open
			if($('#nu__search-toggle').hasClass('active') === true || $('#nu__supernav-toggle').hasClass('active') === true){

        if(e.which == 27){

					$('.js-dropdown-sneezeguard').css({'height':'0'});	// close the sneezeguard protecting the other menu items


					$('nav a.js__mainmenu-item').each(function(i){  // force all of them closed/clear

						if($(this).hasClass('active')){
							$(this).focus();
						}else{
							$(this).blur();
						}

						$(this).removeClass('active').next('div').removeClass('open');
	          $(this).next('div').find('div.items > ul').attr('aria-hidden','true').attr('tabindex','-1');
						$(this).next('div').find('div.items > ul > li').attr('tabindex','-1');

	        });

					cNav = null;
					navReset();
        }
      }
    });


    // let's listen for the page to resize and handle some events
		$(window).on("resize",function(){

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
