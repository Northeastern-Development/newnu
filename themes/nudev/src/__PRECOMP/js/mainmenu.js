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





    // gather up the background images for the iam nav categories
    // $.post("/wp-content/themes/nudev/src/iamnavbgs.php",function(data){
		// 	iamnavbgs = JSON.parse(data);
		// });




    // NEW A TAG VERSION
    // this will handle the click of main menu items as well as some preventitive measures regarding overlap of options
		// $('nav').on('click','a.js__mainmenu-item',function(e){
		// 	actionMainMenu(e);
		// });

		// $('nav').on('focus','a.js__mainmenu-item',function(e){
		// 	console.log('action!');
		// 	actionMainMenu(e);
		// });

		// $('nav').on('focus : click','a.js__mainmenu-item',function(e){

		// $('nav.nu__mainmenu').on('focus','a.js__mainmenu-item',function(e){
		// 	console.log(e.type);
		// });


		// we need this to rpevent the default action fo the a tag
		// $('nav.nu__mainmenu').on('click','a.js__mainmenu-item',function(e){
		// 	e.preventDefault();
		// });



		// we need to have an event listener for the first and last items in each of the nav panels
		$('nav.nu__mainmenu').on('focus','a.js__closepanelend',function(e){
			// console.log('close the panel at the end');
			blurNavPanels();
		});

		$('nav.nu__mainmenu').on('focus','a.js__closepanelstart',function(e){
			// console.log('close the search panel at the start');
			blurNavPanels();
		});




		// $('nav.nu__mainmenu').on('click : focus','a.js__mainmenu-item',function(e){
		// $('nav.nu__mainmenu').on('mousedown focus','a.js__mainmenu-item',function(e){
		$('nav.nu__mainmenu').on('click','a.js__mainmenu-item',function(e){

			// console.log(e.type);

			// need to determine the first/last actionable item in the nav panel, so that we know when the blur on it we can auto-close
			// var firstItem = $(this).next('div').find('a').first();
			// var lastItem = $(this).next('div').find('a').last();
			// console.log(firstItem);
			// console.log(lastItem);



			e.preventDefault();
			e.stopPropagation();

			var eType = e.type;
			// console.log(eType);

			// if(eType == 'mousedown' && !navPanelInMotion){	// this is for a click
			if(eType == 'click' && !navPanelInMotion){	// this is for a click
			// if(eType == 'mousedown'){	// this is for mousedown

				// e.preventDefault();

				// console.log('mousedown!');

				navPanelInMotion = true;

				// determine which nav we are looking at and whether it is the currently active one, in which case close it
				if(cNav == null){  // if no menu is currently open

					focusNavPanel($(this));

					// // $(this).addClass('active').focus().next('div').addClass('open');
					// $(this).addClass('active').next('div').addClass('open');
	        // $(this).next('div').find('div.items > ul').attr('aria-hidden','false');
					// $(this).next('div').find('div.items > ul > li').first().focus();
					// // $(this).next('div').find('div.items > ul > li').first();
					// $(this).next('div').find('div.items > ul > li').attr('tabindex','1');
					//
					// // we need to reveal the dropdown sneezeguard
					// $('.js-dropdown-sneezeguard').css({'height':'100%'});

					// cNav = $(this).attr('id');
				}else if($(this).attr('id') == cNav){  // if we have clicked the same menu item again after it was open

					blurSamePanel($(this));

					// // $(this).removeClass('active').blur().next('div').removeClass('open');
					// $(this).removeClass('active').next('div').removeClass('open');
	        // $(this).next('div').find('div.items ul').attr('aria-hidden','true');
					// $(this).next('div').find('div.items > ul > li').attr('tabindex','-1');
					// cNav = null;
					//
					// // we need to hide the dropdown sneezeguard
					// $('.js-dropdown-sneezeguard').css({'height':'0'});

				}else{ // if we have clicked another menu item while one was already open

					blurNavPanels();

					focusNavPanel($(this));

	        // $('nav a.js__mainmenu-item').each(function(i){  // force all of them closed/clear
					// 	// $(this).removeClass('active').blur().next('div').removeClass('open');
					// 	$(this).removeClass('active').next('div').removeClass('open');
	        //   $('div.items > ul').attr('aria-hidden','true');
	        // });

					// $(this).addClass('active').focus().next('div').addClass('open');  // activate the one that was selected
					// $(this).addClass('active').next('div').addClass('open');  // activate the one that was selected
	        // $(this).next('div').find('div.items ul').attr('aria-hidden','true');
					// // $(this).next('div').find('div.items > ul > li').first().focus();
					// $(this).next('div').find('div.items > ul > li').first();
					// cNav = $(this).attr('id');

				}

				// // need to reset the first item in the supernav and iamnav menu to be active
				// navReset();
				//
				// // if we are on the search page, we need to restrict opening the search again on top of itself
				// if($('body').hasClass('search')){
				// 	$('#nu__search-toggle').removeClass('active');
				// }
				//
				// // check to see if we need to collapse the footer if it is already open (homepage only)
				// if($('body').hasClass('home') && !$('footer#nu__global-footer').hasClass('collapse')){
				// 	$('footer#nu__global-footer').addClass('collapse');
				// }

			}else if(eType == 'focusin' && !navPanelInMotion){
			// }else if(eType == 'focusin'){

				navPanelInMotion = true;

				blurNavPanels();


				// $('nav a.js__mainmenu-item').each(function(i){  // force all of them closed/clear
				// 	$(this).removeClass('active').blur().next('div').removeClass('open');
				// 	$(this).next('div').find('div.items > ul').attr('aria-hidden','true');
				// 	$(this).next('div').find('div.items > ul > li').attr('tabindex','-1');
				// });
				//
				// // we need to hide the dropdown sneezeguard
				// $('.js-dropdown-sneezeguard').css({'height':'0'});
				//
				// cNav = null;

				var showMe = $(this);

				setTimeout(function(){ focusNavPanel(showMe); }, 100);

				// focusNavPanel($(this));

				// e.stopPropagation();

				// navPanelInMotion = true;

				// console.log('focus!');
			// }
			}else if(eType == 'focusout' && !navPanelInMotion){
			// }else if(eType == 'focusout'){

				navPanelInMotion = true;

				// blurNavPanels();

				// e.stopPropagation();

				// navPanelInMotion = true;

				// console.log('blur!');
			}

			// need to reset the first item in the supernav and iamnav menu to be active
			navReset();

			// if we are on the search page, we need to restrict opening the search again on top of itself
			if($('body').hasClass('search')){
				$('#nu__search-toggle').removeClass('active');
			}

			// check to see if we need to collapse the footer if it is already open (homepage only)
			// if($('body').hasClass('home') && !$('footer#nu__global-footer').hasClass('collapse')){
			// 	$('footer#nu__global-footer').addClass('collapse');
			// }

		});


		// this function will handle opening a specific nav panel
		function focusNavPanel(a){
			// console.log(a);



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
			// $(this).removeClass('active').blur().next('div').removeClass('open');
			a.removeClass('active').next('div').removeClass('open');
			a.next('div').find('div.items ul').attr('aria-hidden','true');
			a.next('div').find('div.items > ul > li:not(.sectiontitle)').attr('tabindex','-1');
			cNav = null;

			// we need to hide the dropdown sneezeguard
			$('.js-dropdown-sneezeguard').css({'height':'0'});

			// a.focus();	// we need to do this ONLY when we tab out of a menu item
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
		}





		// this will handle resetting the nav panels
		function navReset(){

			// every state has to reset the first items from being active
			$('#nu__supernav > section > div > ul > li.active').removeClass('active');
			// $('#nu__supernav > section > div > ul > li').attr('tabindex','-1');
			// $('#nu__iamnav > section > div > ul > li.active').removeClass('active');
			$('#nu__supernav > section > div > ul > li').first().addClass('active');

			if(windowSize[1] > 740){	// above break size, show first cat automagically
				$('#nu__supernav > section > div > ul > li:first-child').addClass('active');
				// $('#nu__iamnav > section > div > ul > li:first-child').addClass('active');
			}

			// if(!$('body').hasClass('home')){
				allowScrollOrNot();
			// }

			// navPanelInMotion = false;
			setTimeout(function(){ navPanelInMotion = false; }, 100);

		}





		// if the user clicks outside the menu items and on the empty portion of the fullscreen sneezeguard, close the nav panels
    $('nav.nu__mainmenu').on('click','div#nu__supernav,div#nu__searchbar,div#nu__iamnav',function(e){
			if(['nu__supernav','nu__searchbar','nu__iamnav'].indexOf(e.target.id) >= 0){

        $('nav a.js__mainmenu-item').each(function(i){  // force all of them closed/clear
          // $(this).removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');
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
		// $('ul.dropdowns').on('click','li.js-dropdown',function(e){
			// $('ul.dropdowns > li > ul').attr('aria-hidden','true');
			$('ul.dropdowns > li > ul').hide();
			$('ul.dropdowns > li.js-dropdown').find('a').removeClass('open');
			// openCloseDropdown($(this));
		});





		// this will handle the new dropdown system for items outside the hamburger menu
		$('ul.dropdowns').on('focus mouseover','li.js-dropdown',function(e){
		// $('ul.dropdowns').on('click','li.js-dropdown',function(e){
			$('ul.dropdowns > li > ul').hide();
			// $('ul.dropdowns > li > ul').attr('aria-hidden','true');
			openCloseDropdown($(this));
		});

		// $('ul.dropdowns').on('blur mouseout','li.js-dropdown',function(e){	// use this if we want to tab through all of the sub items
		$('ul.dropdowns').on('mouseout','li.js-dropdown',function(e){

			// console.log('blur on dropdown');

			// $('ul.dropdowns > li.js-dropdown').attr('aria-hidden','true');
			$('ul.dropdowns > li.js-dropdown').find('ul > li > a').attr('tabindex','-1');
			$('ul.dropdowns > li.js-dropdown').find('ul').hide();
			$('ul.dropdowns > li.js-dropdown').find('a').removeClass('open');
			// $('ul.dropdowns > li.js-dropdown > ul').attr('aria-hidden','true');

			// openCloseDropdown($(this));

		});

		// $('ul.dropdowns').on('keyup','li.js-dropdown',function(e){
		// 	if(e.which == 13){	// pressed the escape key
		// 		openCloseDropdown($(this));
		// 	}
		// });





		// this will perform the hide and show of the dropdowns
		function openCloseDropdown(a){
			// console.log(a.attr('aria-hidden'));
			// if(a.attr('aria-hidden') == 'true'){
			// console.log(a.find('ul').css('display'));

			$('ul.dropdowns > li.js-dropdown').find('a').removeClass('open');

			if(a.find('ul').css('display') == 'none'){

				// a.focus();

				// console.log(a);

				// a.find('ul').show().attr('aria-hidden','false');
				a.find('ul').show();
				// a.css({
				//
				// });

				a.find('a').addClass('open');

				// a.attr('aria-hidden','false');


				// turning this on makes the tab go through each drop down menu item, comment out for arrow up/down
				a.find('ul > li > a').attr('tabindex','0');



				// a.find('ul > li').first().focus();

				// a.attr('aria-hidden','false');
				// a.find('ul').show().attr('aria-hidden','false');
				// a.find('ul li').attr('tabindex','1');
				// a.find('ul li').first().find('a').focus();
				// $(this).next('div').find('div.items > ul > li').first().focus();
				// a.find('ul > li').attr('tabindex','1').first().focus();
				// $(this).next('div').find('div.items > ul > li').attr('tabindex','1');
			}
			// else{
			// 	a.attr('aria-hidden','true');
			// // 	a.find('ul').hide();
			// // 	// a.find().attr('tabindex','-1');
			// }
		}






		// this function will determine whether or not to allow the page to scroll, if the menu is open or not
		function allowScrollOrNot(){

			// prevent the main page from scrolling when the nav is open or allow it if we close the navs
			// if($('input#nu__search-toggle').prop('checked') || $('input#nu__iamnav-toggle').prop('checked') || $('input#nu__supernav-toggle').prop('checked')){
			if($('#nu__search-toggle').hasClass('active') === true || $('#nu__supernav-toggle').hasClass('active') === true){
				$('html').css({'overflow-y':'hidden'});
			}else{
				$('html').css({'overflow-y':'scroll'});
			}

		}





		// this will handle the click on a nav category
		// $('div.navigational > section > div.items > ul').on('click','li:not(.featured)',function(e){
		//
		// 	changeNavCat($(this));
		//
    //   // // we need to handle activating the correct aria-hidden values as we change categories
    //   // $(this).parent().find('li ul').attr('aria-hidden','true');
    //   // $(this).find('ul').first().attr('aria-hidden','false');
		// 	//
		// 	// // if we are clicking on cats in the iamnav, we may need to swap the background image
		// 	// if($(this).parent().parent().parent().parent().attr('id') == 'nu__iamnav' && iamnavbgs.length > 0 && iamnavbgs[0] != ''){
		// 	// 	$('div#nu__iamnav').attr('style','background-image: url('+iamnavbgs[$(this).index()]+');');
		// 	// }
		// 	//
		// 	// $('div.navigational > section > div > ul li').removeClass('active');
		// 	// $(this).addClass('active');
		// });



		// this will handle pressing enter on a nav category
		// $('div.navigational > section > div.items > ul > li:not(.featured)').keydown(function(e){
		$('div.navigational > section > div.items > ul > li:not(.featured)').focus(function(e){
		    //if(e.which === 13){ // the user pressed on the enter key
						// console.log($(this));

						changeNavCat($(this));
		    //}
		});



		// this is the function that will actually change the category
		function changeNavCat(a){


			// console.log(a.parent);


			// we need to handle activating the correct aria-hidden values as we change categories
      a.parent().find('li ul').attr('aria-hidden','true');
			a.parent().find('li ul li').attr('tabindex','-1');
      a.find('ul').first().attr('aria-hidden','false');
			a.find('ul li:not(.sectiontitle)').attr('tabindex','1');

			// if we are clicking on cats in the iamnav, we may need to swap the background image
			// if(a.parent().parent().parent().parent().attr('id') == 'nu__iamnav' && iamnavbgs.length > 0 && iamnavbgs[0] != ''){
			// 	$('div#nu__iamnav').attr('style','background-image: url('+iamnavbgs[a.index()]+');');
			// }

			$('div.navigational > section > div > ul li').removeClass('active');
			a.addClass('active');


		}




    // this is the event listener for the user to press esc to close the menu panels
    // $(document).keydown(function(e){
		$(document).on('keydown','html',function(e){
      // console.log(e);
        // if(windowSize[1] >= sizeBreak && $('#nu__search-toggle').hasClass('active') === true || $('#nu__supernav-toggle').hasClass('active') === true || $('#nu__iamnav-toggle').hasClass('active') === true){
				// if(windowSize[1] >= sizeBreak && $('#nu__search-toggle').hasClass('active') === true || $('#nu__supernav-toggle').hasClass('active') === true){

				// console.log('NOTICE: key pressed - '+e.which);

				// if one of the dropdowns is open, then we can use arrow keys to nav up and down the options
				if($('#dropdown-admissions').find('ul').attr('aria-hidden') == 'false'){

					// e.preventDefault();

					// console.log('NOTICE: key pressed - '+e.which);

					// listen for the arrow press up and down here
					if(e.which == 38){
						e.preventDefault();
						// this is arrow up
						// console.log('up arrow');
					}else if(e.which == 40){
						e.preventDefault();
						// this is arrow down
						// console.log('down arrow');
					}
				}


				// if one of the super nav options is open
				if($('#nu__search-toggle').hasClass('active') === true || $('#nu__supernav-toggle').hasClass('active') === true){

	        if(e.which == 27){
						// console.log('NOTICE: esc key pressed - '+e.which);

						$('.js-dropdown-sneezeguard').css({'height':'0'});	// close the sneezeguard protecting the other menu items


						$('nav a.js__mainmenu-item').each(function(i){  // force all of them closed/clear
		          // $(this).removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');


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


						// $('nav a.js__mainmenu-item').removeClass('active');
	          // $('nav a.js__mainmenu-item').each(function(i){  // force all of them closed/clear
	          // $('nav a.js__mainmenu-item').removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');
						// 	$(this).removeClass('active').blur().next('div').removeClass('open');
	          //   $('div.items > ul').attr('aria-hidden','true');
						//
						// 	// we need to hide the dropdown sneezeguard
						// 	$('.js-dropdown-sneezeguard').css({'height':'0'});
	          // });

						navReset();
	        }

					// navReset();

				// if(e.which == 13){	// pressed the escape key
				// 	openCloseDropdown($(this));
				// }
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
