// this file is the JS for the homepge ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file


(function(root,$,undefined){
	"use strict";

	$(function(){

    // local vars within the home section, we will need to set these to check the main js if it exists and then assign vars if needed
    // to prevent errors when used remotely
    var inMotion = false;
    windowWidth = windowSize[1] * -1;
    var myPanels = document.getElementById('nu__stories');
    var mc = new Hammer(myPanels);
    var aspeeds = (isSafari?1500:1500);
    var takeOverTimeout = 7000;	// 0 = no auto close, otherwise in mls






		// need to pick a random image for each of the 4 main categories IF they have more than 1 defined
		$('div#nu__categories div.bgimage').each(function(index){
			var bgImages = $(this).attr('data-backgrounds').split(",");
			// console.log(bgImages);
			if(bgImages.length > 1){
				// console.log('we need to randomize!');
				// console.log(bgImages[Math.floor(Math.random() * bgImages.length)]);
				// console.log($(this));
				// $(this).css({'background-image':'url('+bgImages[Math.floor(Math.random() * bgImages.length)]+');'});
				// $(this).css({'background-image':'url(dfghfhgjfghjfghjfghjfghkfghkfghk);'});
				// $(this).css({'background-repeat':'repeat !important;'});
				$(this).attr('style','background-image:url('+bgImages[Math.floor(Math.random() * bgImages.length)]+');')
			}
			// else{
			// 	console.log('no need to change anything!');
			// }
		});





    // need to figure out if we need to remove extra height from the content if alerts are visible
    if(parseInt($('#nu__alerts').height()) > 0){
      var hpHeight = parseInt(windowSize[0]) - parseInt($('header').height()) - parseInt($('footer').height());
      $('#nu__homepage').css({'height':hpHeight,'min-height':hpHeight});
    }





    // this will listen for a user to close the hp takeover
    $('div.takeover').on("click",".nu__close-takeover",function(e){
      closeTakeover()
    });

    // this will auto-close the takeover after specific time period, if value = 0 then it will not autoclose
    if(takeOverTimeout > 0 && $('div.takeover').css('display') == 'block'){
      setTimeout(function(){ closeTakeover(); },takeOverTimeout);
    }

    // close the actual takeover panel
    function closeTakeover(){
      $('div.takeover').fadeOut(250);
    }





    // gather up the rotator panels data and store the object to be used below
    $.post("/wp-content/themes/nudev/src/hprotatordata.php",function(data){
        rotators = JSON.parse(data);
    });





    // since we made it this far, turn on the rotator arrows
    $('article.nu__block-rotator .rotate').css({'display':'block'});





    // the following handles clicking next and previous arrows within a rotator
    $('div.nu__block-rotator').on("click",".rotate",function(e){
      var elem = $(this).parent().parent().parent();
      var id = elem.attr('data-rotatorid');
      var sCount = parseInt(elem.attr('data-slidemax'));
      var cSlide = parseInt(elem.attr('data-cslide'));
      if($(this).hasClass('slider_prev')){
        contentSwap(parseInt(cSlide - 1) < 1 ?sCount:parseInt(cSlide - 1));
      }else{
        contentSwap(parseInt(cSlide + 1) > sCount?1:parseInt(cSlide + 1));
      }

      // this will actually perform the content swapping for the inner rotators
      function contentSwap(a){
        elem.find('div.bgimage,h2,div.nu__overlay-logo').fadeOut(150,function(){	// fade out the rotator content
          elem.attr('data-cslide',a);	// set the new value of the current slide
					elem.find('div.bgimage > div').attr('style','background-image: url('+rotators[id][a][0]+');');	// change the background image
          elem.find('a').attr('href',rotators[id][a][1]);	// change the link
          elem.find('a').attr('target',rotators[id][a][5]);	// change the link target style (local or external)
          elem.find('h2').html('<span>'+rotators[id][a][2]+'</span>');	// change the title of the slide
					elem.find('div.nu__overlay-logo').html('');
					if(rotators[id][a][4] && rotators[id][a][4] != ''){// swap the overlay logo if we have one otherwise empty
						elem.find('div.nu__overlay-logo').html('<img src="'+rotators[id][a][4]+'" alt="overlay logo for '+rotators[id][a][2]+'" />')
					}

          elem.find('div.bgimage,h2,div.nu__overlay-logo').fadeIn(150);	// fade it all back in
        });
      }
    });





    // this will activate the left and right arrows to control the slider on the homepage if in debug mode
    // hidden by default, only appears if JS enabled
    // if(debug){
    //   if (windowSize[1] >= sizeBreak){
    //     $('#next').fadeIn(200);
    //   }else {
    //     $('#next').fadeOut(200);
    //   }
    // }





    // this will handle to peekaboo footer
    // $('div.nu__footer').on('click','.js_footer-hideshow',function(e){
    //   if($('footer#nu__global-footer').hasClass('collapse')){
    //     $('footer#nu__global-footer').removeClass('collapse');
    //   }else{
    //     $('footer#nu__global-footer').addClass('collapse');
    //   }
    // });





    // this is the event listener for mousewheel only on the homepage for the slider
    // $("body").on('mousewheel', { mousewheel: { behavior: 'debounce', delay: 5 } }, function(event,delta){
    //   // if (windowSize[1] >= sizeBreak && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false && event.deltaX == 0){
		// 	if (windowSize[1] >= sizeBreak && !inMotion && $('#nu__search-toggle').hasClass('active') === false && $('#nu__supernav-toggle').hasClass('active') === false && $('#nu__iamnav-toggle').hasClass('active') === false && event.deltaX == 0){
    //     if (event.deltaY <= (isSafari?-1:-15) && currentPanel < 2){
    //       event.preventDefault();
    //       slidePanels('Left');
    //       inMotion = true;
    //     }else if (event.deltaY >= (isSafari?1:15) && currentPanel != 0){
    //       event.preventDefault();
    //       slidePanels('Right');
    //       inMotion = true;
    //     }
    //   }
    // });





    // this is the event listener for the next and previous arrows for the slider
    // $('body').on("click","#prev,#next",function(e){
		// 	// console.log('fghjfghkgj');
    //   // if(windowSize[1] >= sizeBreak  && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false){
		// 	if(windowSize[1] >= sizeBreak  && !inMotion && $('#nu__search-toggle').hasClass('active') === false && $('#nu__supernav-toggle').hasClass('active') === false && $('#nu__iamnav-toggle').hasClass('active') === false){
    //     inMotion = true;
    //     if($(this).attr('id') == 'next'){
    //       slidePanels('Left');
    //     }else{
    //       slidePanels('Right');
    //     }
    //   }
    // });





    // this is the event listener for the arrow keys for the slider
    // $(document).keydown(function(e){
    //     // if(windowSize[1] >= sizeBreak  && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false){
		// 		if(windowSize[1] >= sizeBreak  && !inMotion && $('#nu__search-toggle').hasClass('active') === false && $('#nu__supernav-toggle').hasClass('active') === false && $('#nu__iamnav-toggle').hasClass('active') === false){
    //     switch (e.which){
    //       case 37:		// left arrow key
    //       case 38:    //up arrow key
    //         slidePanels('Right');
    //         break;
    //       case 39:    //right arrow key
    //       case 40:    //bottom arrow key
    //         slidePanels('Left');
    //         break;
    //     }
    //   }
    // });





    // this will handle the swiping left and right to control the slider, uses hammer js
    // mc.on("swipeleft", function(ev) {
    //   inMotion = true;
    //   slidePanels('Left');
    // });
		//
    // mc.on("swiperight", function(ev) {
    //   inMotion = true;
    //   slidePanels('Right');
    // });





    // this will handle the actual slide event for the panels on the homepage
    // function slidePanels(a){
    //   if (windowSize[1] >= sizeBreak){
		//
    //     // check to see if we need to collapse the footer
    //     if(!$('footer#nu__global-footer').hasClass('collapse')){
    //       $('footer#nu__global-footer').addClass('collapse');
    //     }
		//
    //     var e = '#nu__stories';
		//
    //     $(e).css({'pointer-events':'none'});//disables hover of tiles until animation to the next screen stops
    //     if(a === 'Left' && currentPanel < panelCount -1){//this moves the panels to the right
    //       offset += windowWidth;
    //       currentPanel++;
    //       if(debug){
    //         if(currentPanel == panelCount -1){
		// 					$("#next").fadeOut(250);
    //         }else{
		// 					$("#next").fadeIn(250);
    //           $("#prev").fadeIn(250);
    //         }
    //       }
    //       runTween(offset);
    //     }else if (a === 'Right' && currentPanel > 0){//this moves the panels to the left
    //       offset -= windowWidth
    //       currentPanel--;
    //       if(debug){
    //         if(currentPanel == panelCount -1){
		// 					$("#next").fadeIn(250);
    //         }else if(currentPanel == 0){
		// 					$("#prev").fadeOut(250);
    //           $("#next").fadeIn(250);
    //         }else {
		// 					$("#next").fadeIn(250);
    //         }
    //       }
    //       runTween(offset);
    //     }
		//
    //     function runTween(a){
    //       TweenLite.to(e,1.5,{ease:Power3.easeOut,marginLeft:a,onComplete:slideDone});
    //       function slideDone(){
    //           inMotion = false;
    //           $(e).css({'pointer-events':'auto'});//enables hover of tiles until animation to the next screen stops
    //       }
    //     }
		//
    //   }
    // }



		// let's listen for the page to resize and handle some events
		$(window).on("resize",function(){

			// if alerts are showing we need to account for that in the content area of the homepage
			// if(parseInt($('#nu__alerts').height()) > 0){
			//
			// 	var hpHeight = parseInt($(window).height()) - parseInt($('header').outerHeight()) - parseInt($('footer').height());
			// 	$('#nu__homepage').css({'height':hpHeight,'min-height':hpHeight});
			//
			// }


			// if we are below the size break, we will just stack
			// if(windowSize[1] < sizeBreak){
			// 	$('#nu__stories').css({'margin-left':'0'});
			// 	currentPanel = 0;
			// 	offset = 0;
			//
			// 	// hide the next and previous arrows for the slider on the homepage as the content has stacked
			// 	$('#next,#prev').fadeOut(200);
			//
			// }else{	// we have gone above the break size, reset the next and previous arrows if not already visible
			// 	if($('#next').css('display') == 'none'){
			// 		$('#next').fadeIn(200);
			// 	}
			// }



			// we need to reset the panel sizes on resize to ensure that things slide back and forth correctly
			// var newWidth = windowSize[1] * -1;
			//
			// var wDiff = (windowWidth - newWidth);
			//
			// if(currentPanel > 0){
			//
			// 	var newOffset = (offset - (wDiff * currentPanel));
			//
			// 	$('#nu__stories').css({"margin-left":newOffset});
			// 	offset = newOffset;
			// }
			//
			// windowWidth = newWidth;

		});






  });
}(this,jQuery));
