



(function( root, $, undefined ) {
	"use strict";

	$(function () {

		/*Remove the lines below once you are done testing*/
    // var wi = $(window).width();
    // $("p.testp").text('Screen width is currently: ' + wi + 'px.');
    //
    // $(window).resize(function(){
    //   var wi = $(window).width();
    //   if (wi <= 576){
    //     $("p.testp").text('Screen width is less than or equal to 576px. Width is currently: ' + wi + 'px.');
    //   }else if (wi <= 680){
    //     $("p.testp").text('Screen width is between 577px and 680px. Width is currently: ' + wi + 'px.');
    //   }else if (wi <= 1024){
    //     $("p.testp").text('Screen width is between 681px and 1024px. Width is currently: ' + wi + 'px.');
    //   }else if (wi <= 1500){
    //     $("p.testp").text('Screen width is between 1025px and 1499px. Width is currently: ' + wi + 'px.');
    //   }else {
    //     $("p.testp").text('Screen width is greater than 1500px. Width is currently: ' + wi + 'px.');
    // 	}
    // });
		/* ********************************************** */



		// set up some common animation speeds
		var animationSpeeds = Array(
			 200
			,1000
		);
		var windowSize = Array(0,0);

		var rotators = null;



		// if this file has loaded, we want to append an option to let the page know JS is working
		$('body').addClass('nu-js');


		// the following vars are for the homepage panel slider
		if($('body').hasClass('home')){
			var inMotion = false;
	    var windowWidth = $(window).width() * -1;
	    var offset = 0;
	    var currentPanel = 0;
	    var panelCount = 3;
	    var aspeeds = 1000;
			var sizeBreak = 900;
	    // var wi = $(window).width();
			var ww = $(window).width();
	    var myPanels = document.getElementById('nu__stories');
			var mc = new Hammer(myPanels);











			if (ww >= 900){
			  $('#next').fadeIn(200);//fades in the next panel button if js is enabled
			}else {
			  $('#next').fadeOut(200);//fades in the next panel button if js is enabled
			}
			//-----------------------------------------------------
			  // Sliding Panel scroll, swipe, keydown, and click.
			//-----------------------------------------------------



		    $("body").mousewheel(function(event, delta){

		      if (ww >= sizeBreak && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false){

		        if (delta < 0 && currentPanel < 2){
		          event.preventDefault();
		          slidePanels('Left');
		          inMotion = true;
		        }else if (delta > 0 && currentPanel != 0){
		          event.preventDefault();
		          slidePanels('Right');
		          inMotion = true;
		        }
		      }

		   });


		  // this is the brain for all that is happening
		  function slidePanels(a){
		    if (ww >= 900){
		      mc.stop();

					// windowWidth = $(window).width() * -1;

					// check to see if we need to collapse the footer
					if(!$('footer#nu__global-footer').hasClass('collapse')){
						$('footer#nu__global-footer').addClass('collapse');
					}

					var e = '#nu__stories';

		      $(e).css({'pointer-events':'none'});//disables hover of tiles until animation to the next screen stops
		      if(a === 'Left' && currentPanel < panelCount -1){//this moves the panels to the right
		        offset += windowWidth;
		        currentPanel++;
		        if(currentPanel == panelCount -1){
		          $("#next").css({'display':'none'});
		        }else {
		          $("#next").css({'display':'block'});
		          $("#prev").css({'display':'block'});
		        }
		        $(e).animate({"margin-left":  offset }, aspeeds, function() {
		          inMotion = false;
		          $(e).css({'pointer-events':'auto'});//enables hover of tiles until animation to the next screen stops
		        });
		      }else if (a === 'Right' && currentPanel > 0){//this moves the panels to the left
		        //console.log('bck');
		        offset -= windowWidth
		        currentPanel--;
		        if(currentPanel == panelCount -1){
		          $("#next").css({'display':'block'});
		        }else if(currentPanel == 0) {
		          $("#prev").css({'display':'none'});
		          $("#next").css({'display':'block'});
		        }else {
		          $("#next").css({'display':'block'});
		        }
		        $(e).animate({"margin-left":  offset }, aspeeds, function() {
		          inMotion = false;
		          $(e).css({'pointer-events':'auto'});//enables hover of tiles until animation to the next screen stops
		        });
		      }
		    }
		  }


		  // Next / Prev arrow click functions
			// if($('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false){
			  $('body').on("click","#next", function (e) {
					if(ww >= sizeBreak  && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false){
				    inMotion = true;
				    slidePanels('Left');
				    //console.log('dasf');
					}
			  });

			  $('body').on("click","#prev", function (e) {
					if(ww >= sizeBreak  && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false){
				    inMotion = true;
				    slidePanels('Right');
					}
			  });

			  // arrow keys
			  $(document).keydown(function(e){
					if(ww >= sizeBreak  && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false){
			      switch (e.which){
			      case 37:    //left arrow key
			        slidePanels('Right');
			          break;
			      case 38:    //up arrow key
			          slidePanels('Right');
			          break;
			      case 39:    //right arrow key
			          slidePanels('Left');
			          break;
			      case 40:    //bottom arrow key
			          slidePanels('Left');
			          break;
			      }
					}
			  });
			// }


		  // hammer js swipe left and right.
		  mc.on("panleft", function(ev) {
		    inMotion = true;
		    slidePanels('Left');

		  });
		  mc.on("panright", function(ev) {
		    inMotion = true;
		    slidePanels('Right');
		  });


		}





		// this will handle clicking on the next and previous arrows for rotator type articles, but only if we are on the homepage
		if($('body').hasClass('home')){

			// gather up the rotator panels data and store the object to be used below
			$.post("/wp-content/themes/nudev/src/hprotatordata.php",function(data){
					rotators = JSON.parse(data);
					// console.log(rotators);
    	});

			// since we made it this far, turn on the rotator arrows
			$('article.nu__block-rotator .rotate').css({'display':'block'});

			// the following handles clicking next and previous arrows within a rotator
			$('article.nu__block-rotator').on("click",".rotate",function(e){
				var elem = $(this).parent();
				var id = $(this).parent().attr('data-rotatorid');
				var sCount = parseInt($(this).parent().attr('data-slidemax'));
				var cSlide = parseInt($(this).parent().attr('data-cslide'));
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
						elem.find('a > h2').html(rotators[id][a][2]);	// change the title of the slide
						elem.find('a').fadeIn(150);	// fade it all back in
					});
				}

			});
		}










		// we need to pass the browser window size to PHP so that we can better tailor responsive imagery all around

		function getWindowSize(){
			windowSize[0] = $(window).height();
			windowSize[1] = $(window).width();
			$.post("/wp-content/themes/nudev/src/windowsize.php",{"height":windowSize[0],"width":windowSize[1]},function(data){
					console.log(data);
    	});
		}

		getWindowSize();



		// console.log("fghjfghjfgj");




		// DOM ready, take it away


		// we need to set the main content offset based on: utility nav height, alerts height, and main header height
		// console.log($("header").height());
		$("main").css({
			"margin-top":$("header").height()
		});




		// this will handle some preventitive measures in the main nav regarding overlap of options
		$('nav').on('click','input#nu__supernav-toggle',function(){
			$('input#nu__search-toggle').prop('checked',false);
			$('input#nu__iamnav-toggle').prop('checked',false);
			// need to reset the first item in the iamnav menu to be active
			$('#nu__supernav > section > div > ul > li').removeClass('active');
			$('#nu__supernav > section > div > ul > li:first-child').addClass('active');
		});

		$('nav').on('click','input#nu__iamnav-toggle',function(){
			$('input#nu__search-toggle').prop('checked',false);
			$('input#nu__supernav-toggle').prop('checked',false);
			// need to reset the first item in the supernav menu to be active
			$('#nu__iamnav > section > div > ul > li').removeClass('active');
			$('#nu__iamnav > section > div > ul > li:first-child').addClass('active');
		});

		$('nav').on('click','input#nu__search-toggle',function(){
			$('input#nu__supernav-toggle').prop('checked',false);
			$('input#nu__iamnav-toggle').prop('checked',false);
			$('#nu__iamnav > section > div > ul > li').removeClass('active');
			$('#nu__iamnav > section > div > ul > li:first-child').addClass('active');
			$('#nu__supernav > section > div > ul > li').removeClass('active');
			$('#nu__supernav > section > div > ul > li:first-child').addClass('active');
		});





		// this will handle the accordion functionality for the main navigational elements
		$('div.navigational > section > div > ul').on('click','li:not(.featured)',function(e){
			$('div.navigational > section > div > ul li').removeClass('active');
			$(this).addClass('active');
		});








		// this will handle the smoothstate page transitions

		// need to figure out how to get the pre-footer content into the area that will transition as it is currently in the footer which never goes anywhere

		//$( function() { // Ready

        // var settings = {
        //     anchors: 'a'
        // };
				// // console.log('smoothstate should fire next');
        // $("#homepage").smoothState( settings );
    //} );





		// this will handle bringing up the footer on the homepage
		$('div.nu__footer').on('click','.js_footer-hideshow',function(e){
			if($('footer#nu__global-footer').hasClass('collapse')){
				$('footer#nu__global-footer').removeClass('collapse');
			}else{
				$('footer#nu__global-footer').addClass('collapse');
			}




			// $('html, body').animate({ scrollTop: 0 },animationSpeeds[1], function () {
      //   // alert("reached top");
			// 	$(".js__backtotop").fadeOut(animationSpeeds[0]);
    	// });




		});





		// let's listen for the page to scroll and handle some events
		$(window).on("scroll",function(){
			// console.log('scrolled!');

			// if we have scrolled more than 300px, we should show the back to top button
			// if($(document).scrollTop() >= 400 && $(".js__backtotop").css("display") != "block"){
			// 	hideShowBackTop();
			// }else if($(document).scrollTop() < 400 && $(".js__backtotop").css("display") == "block"){
			// 	hideShowBackTop();
			// }

		});





		// let's listen for the page to resize and handle some events
		$(window).on("resize",function(){

			getWindowSize();




			if($('body').hasClass('home')){	// we need to make sure that we are resizing and keeping only 1 panel on the screen during resize

				// console.log('resizing the homepage');


				ww = $(window).width();


				// if (ww >= sizeBreak){
	      //   //inMotion = false;
	      //   // offset = 0;
	      //   //currentPanel = 0;
	      //   //panelCount = 3;
	      //   //aspeeds = 1500;
	      //   // windowWidth = $(window).width() * -1;
	      //   $('#next').fadeIn(200);//fades in the next panel button if js is enabled
	      // }else {
	      //   inMotion = true;
	      //   $('.nu__panel-nav').css({'display':'none'});
	      //   $('#nu__panels').css({'margin-left':'0'});
	      // }



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




		// this will handle hiding and showing the scroll to top option
		function hideShowBackTop(){
			if($(".js__backtotop").css("display") != "block"){
				$(".js__backtotop").fadeIn(animationSpeeds[0]);
			}else{
				$(".js__backtotop").fadeOut(animationSpeeds[0]);
			}
		}



		// this will handle the click on the back to top
		$("body").on("click touchend",".js__backtotop",function(e){
			e.preventDefault();
			$('html, body').animate({ scrollTop: 0 },animationSpeeds[1], function () {
        // alert("reached top");
				$(".js__backtotop").fadeOut(animationSpeeds[0]);
    	});
		});








		// this will listen for the main menu to be opened and closed
		// $("nav.mainmenu ul li.js__mainmenu").on("click touchend","a",function(e){
		// 	e.preventDefault();
		// 	// hideShowSuperNav();
		// });



		// a is the menu object that was actioned
		// this can be called from anywhere now, so that we could close the nav on scroll if it is already open
		function hideShowSuperNav(){
			// console.log(a);
			var e = $('#supernav');
			if(e.css('opacity') === '0'){
				// e.css({"display":"block"});
				// e.fadeIn(200);
				// $("nav.mainmenu ul li.js__mainmenu").addClass("current-menu-item");
				e.css({'visibility':'visible','height':'100%'});
				// $('input#nu__mainmenu-toggle').prop('checked',true);
				e.animate({
					'opacity': 1
				},animationSpeeds[0],function(){
					// need to reset the checkmark here
					// e.css({'visibility':'hidden','height':'0'});
					$('input#nu__mainmenu-toggle').prop('checked',true);
				});

			}else if(e.css('opacity') === '1'){
				// e.css({"display":"none"});
				// e.fadeOut(200);
				// $("nav.mainmenu ul li.js__mainmenu").removeClass("current-menu-item");
				// e.css({'opacity':'0','visibility':'hidden','height':'0'});
				e.animate({
					'opacity': 0
				},animationSpeeds[0],function(){
					// need to reset the checkmark here
					e.css({'visibility':'hidden','height':'0'});
					$('input#nu__mainmenu-toggle').prop('checked',false);
				});

				// need some fixes in here to address the check mark changes as well as height, etc.

			}
		}



		// this will listen for key presses to perform various functions
		// $(document).keyup(function(e){
		//
		// 	// 'm' key to open the super nav
	  //   if(e.keyCode == 77){
		// 		 if($('#supernav').css('opacity') === '0'){
		// 			 // hideShowSuperNav();
		// 		 }
	  //   }
		//
		// 	// escape key to close the super nav
	  //   if(e.keyCode == 27){
		// 		 if($('#supernav').css('opacity') === '1'){
		// 			 // hideShowSuperNav();
		// 		 }
	  //   }
		// });









		// this is to open bios for senior staff members
		// $("ul.seniorteam,ul.department").on("click touchend",".js__bio",function(e){
		// 	e.preventDefault();
    //
		// 	var thisId = $(this).attr("id");
		// 	var content = $("div.biocontent#staff-"+thisId).html();
    //
		// 	$.magnificPopup.open({
		// 	  items: {
		// 			src: '<div class="popupbio">'+content+'</div>',
		// 	    type: 'inline'
		// 	  }
		// 	});
    //
		// });





		// select which department to filter by on the staff page
		// $("section.filternav > select").change(function(e){
		// 	e.preventDefault();
		// 	// var url = '//'+window.location.hostname + '/staff?filter='+$(this).val();
    //
		// 	var url = '//'+window.location.hostname + ($(this).val() != ""?'/staff?filter='+$(this).val():'/staff');
    //
		// 	window.location.href = url;
		// });





		// this will listen for clicks on the options for the rotators at the bottom of the homepage
		// $(".js__rotate-homepage").on("click touchend","li > div",function(e){
    //
		// 	// determine which story was selected
		// 	var t = Array($(this).attr("data-id"),$(this).attr("data-sid"));
    //
		// 	// hide all of the stories in the  selcted story group only
		// 	$("section.stories > ul > li[id=story-"+t[0]+"] > a").css({"display":"none"});
    //
		// 	// remove the active state from all of the related story options
		// 	$("ul.js__rotate-homepage > li > div[data-id="+t[0]+"]").removeClass("active");
    //
		// 	// now show the story that was selected
		// 	$("section.stories > ul > li[id=story-"+t[0]+"] > a[id=story-"+t[0]+"-"+t[1]+"]").css({"display":"block"});
    //
		// 	// set the active state on the selected story
		// 	$(this).addClass("active");
		// });







		// this is the listener for when the user clicks on the mobile nav
		// $("nav").on("click touchend","ul > li:first-child",function(e){
		// 	e.preventDefault();
		// 	// alert("hide and show mobile nav!");
		// 	// console.log("clicked hide and show mobile nav");
		// 	if($("nav > ul").height() > 50){
		// 		$("nav > ul").css({"height":"50px"});
		// 		$("nav > ul > li:first-child > a").html("&#xf0c9;");
		// 	}else{
		// 		$("nav > ul").css({"height":"auto"});
		// 		$("nav > ul > li:first-child > a").html("&#xf00d;");
		// 	}
		// });








		// this is the magnific listener to know when to open a gallaery lightbox
		// $("ul.gallery").each(function(){
		// 	$(this).magnificPopup({
		// 		delegate:"a",
		// 		gallery:{
		// 			enabled:true
		// 		},
		// 		image:{
		// 			titleSrc:function(item){
		// 				return item.el.attr("data-title");
		// 			}
		// 		}
		// 	});
		// });



		// if($(window).width() <= 1080){


			// $("div#secondarynav ul li:nth-of-type(1) a").click(function(e){
			// 	// console.log("dfgjfhgjfghjgh");
			// 	e.preventDefault();
			// 	if($("div#secondarynav ul").hasClass("open")){
			// 		$("div#secondarynav ul").removeClass("open");
			// 		$("div#secondarynav ul li:nth-of-type(1) a span").html("&#xf0d9;");
			// 	}else{
			// 		$("div#secondarynav ul").addClass("open");
			// 		$("div#secondarynav ul li:nth-of-type(1) a span").html("&#xf0d7;");
			// 	}
			// });
		// }





		// this will listen for a user to click on one or more of the options in class notes to narrow results
		// $("div.searchpanel").on("change","select",function(){
		// 	var qPart = $(this).attr("id");
		// 	var url = window.location.href;
    //
    //
    //
		// 	// if the user selected a category of in memoriam, we need to disable the other filter options until this is changed
		// 	// if(qPart === "category" && $("select[id="+qPart+"]").val() === "In Memoriam"){
		// 	// 	console.log("disable other filter options!");
		// 	// }
    //
    //
    //
    //
		// 	// need to check and see if we already have a querystring being used
		// 	var urlParts = url.split("?");
    //
		// 	// check to see if we have data in the querystring
		// 	var qstringKeys = new Array();
		// 	var qstringValues = new Array();
		// 	var match = false;
		// 	if(urlParts.length > 1){
		// 		var qstringParts = urlParts[1].split("&");
    //
		// 		for(var i=0;i<qstringParts.length;i++){
		// 			var splitPart = qstringParts[i].split("=");
		// 			if(splitPart[0] != qPart){
		// 				qstringKeys.push(splitPart[0]);
		// 				qstringValues.push(splitPart[1]);
		// 			}else{
		// 				if($("select[id="+splitPart[0]+"]").val() === "all"){
		// 					qstringKeys.splice(i,1);
		// 					qstringValues.splice(i,1);
		// 					match = -1;	// flag this for removal
		// 				}else{
		// 					match = i;
		// 				}
		// 			}
		// 		}
		// 	}
    //
		// 	// if no match was previously found, add to the querystring
		// 	if(!match){
		// 		qstringKeys.push(qPart);
		// 		qstringValues.push($("select[id="+qPart+"]").val());
		// 	}else if(match >= 0){
		// 		qstringValues[match] = $("select[id="+qPart+"]").val();
		// 	}
    //
    //
		// 	// rebuild the querystring and attach it to the base URL again to redirect the user
		// 	var newQ = "";
		// 	for(var i=0;i<qstringKeys.length;i++){
		// 		if(newQ === ""){
		// 			newQ += "?"+qstringKeys[i]+"="+qstringValues[i];
		// 		}else{
		// 			newQ += "&"+qstringKeys[i]+"="+qstringValues[i];
		// 		}
		// 	}
		// 	url = urlParts[0]+newQ;
    //
    //
		// 	// send the user back with the updated quesrystring payload attached
		// 	window.location.href = url;
    //
    //
		// });



		// $(window).on("resize",function(){
		//
		// });



		// check to see if a sidenote has come into view on the screen and then fade it in
		// $(window).on("scroll resize",function(){
    //
		// 	if($('#contentarea:not(.multimedia):not(.staticcontent)').css('position') !== "relative"){
		// 		if($(".title img").height() < $(window).height()){
		// 			$('#contentarea:not(.multimedia):not(.staticcontent)').css({"top":($(".title img").height() - $('header').height()) - 40,'opacity':1.0});
		// 		}else{
		// 			$('#contentarea:not(.multimedia):not(.staticcontent)').css({"top":($(window).height() - $('header').height()) - 40,'opacity':1.0});
		// 		}
		// 	}else{
		// 		$('#contentarea:not(.multimedia):not(.staticcontent)').css({'top':0,'opacity':1.0});
		// 	}
    //
    //
		// 	// check to see if the panels section has made it to the top of the browser window
		// 	if($('#title').length){
		// 		if($( "#contentarea:not(.multimedia):not(.staticcontent)" ).offset().top - $( document ).scrollTop() <= 0){
		// 			$('#title').hide();
		// 		}else{
		// 			$('#title').show();
		// 		}
		// 	}
    //
    //
    //
		// 	// remove the hover from the utility nav if page is scrolled
		// 	$("div#secondarynav ul").removeClass("open");
    //
    //
    //
    //
    //
    //
		// 	// check to see if one of the animated content blocks has come onto the screen and should now be visible
    // 	$(".sidenote, blockquote").each(function(index, element){
    //     if (isScrolledIntoView(element)){
    //       $(element).animate({opacity: 1.0},500);
    //     }
    // });

		// function isScrolledIntoView(elem){
		// 	var centerY = Math.max(0,(($(window).height()-$(elem).outerHeight()) / 1) + $(window).scrollTop());
	  //   var elementTop = $(elem).offset().top;
	  //   var elementBottom = elementTop + $(elem).height();
	  //   return elementTop <= centerY && elementBottom >= centerY;
		// }
	});



//});

} ( this, jQuery ));



// $(window).load(function(){
//
// 	// if we have loaded an article, fade the title area in after half a second
//
// 	$('#title').animate({opacity: 1.0},750);
//
// 	if($('#contentarea:not(.multimedia):not(.staticcontent)').css('position') !== "relative"){
// 		if($(".title img").height() < $(window).height()){
// 			$('#contentarea:not(.multimedia):not(.staticcontent)').css({"top":($(".title img").height() - $('header').height()) - 40,'opacity':1.0});
// 		}else{
// 			$('#contentarea:not(.multimedia):not(.staticcontent)').css({"top":($(window).height() - $('header').height()) - 40,'opacity':1.0});
// 		}
// 	}else{
// 		$('#contentarea:not(.multimedia):not(.staticcontent)').css({'top':0,'opacity':1.0});
// 	}
// });
