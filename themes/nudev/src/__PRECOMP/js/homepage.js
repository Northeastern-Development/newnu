// this file is the JS for the homepge ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file


(function(root,$,undefined){
	"use strict";

	$(function(){

    //if($('body').hasClass('home')){

      // local vars within the home section, we will need to set these to check the main js if it exists and then assign vars if needed
      // to prevent errors when used remotely
      var inMotion = false;
      windowWidth = windowSize[1] * -1;
      var myPanels = document.getElementById('nu__stories');
      var mc = new Hammer(myPanels);
      var aspeeds = (isSafari?1500:1500);
      var takeOverTimeout = 7000;	// 0 = no auto close, otherwise in mls





      // need to figure out if we need to remove extra height from the content if alerts are visible
      if(parseInt($('#nu__alerts').height()) > 0){
        var hpHeight = parseInt(windowSize[0]) - parseInt($('header').height()) - parseInt($('footer').height());
        $('main#nu__homepage').css({'height':hpHeight,'min-height':hpHeight});
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



        // we will be adding new functionality in here to make the inner rotators look like and contain the
        // same kind of data as the regular blocks



        function contentSwap(a){
					console.log(rotators);
          elem.find('div.bgimage,h2,div.nu__overlay-logo').fadeOut(150,function(){	// fade out the rotator content
            elem.attr('data-cslide',a);	// set the new value of the current slide
            // elem.find('div.bgimage').attr('style','background-image: url('+rotators[id][a][0]+');');	// change the background image
						elem.attr('style','background-image: url('+rotators[id][a][0]+');');	// change the background image
            elem.find('a').attr('href',rotators[id][a][1]);	// change the link
            elem.find('a').attr('target',rotators[id][a][5]);	// change the link target style (local or external)
						elem.find('p').html(rotators[id][a][3]);	// change the link target style (local or external)
            elem.find('h2').html('<span>'+rotators[id][a][2]+'</span>');	// change the title of the slide
						elem.find('div.nu__overlay-logo > img').prop('src',rotators[id][a][4])// swap the overlay logo
            elem.find('div.bgimage,h2,div.nu__overlay-logo').fadeIn(150);	// fade it all back in
          });
        }
      });





      // this will activate the left and right arrows to control the slider on the homepage if in debug mode
      // hidden by default, only appears if JS enabled
      if(debug){
        if (windowSize[1] >= sizeBreak){
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
      $("body").on('mousewheel', { mousewheel: { behavior: 'debounce', delay: 5 } }, function(event,delta){
        if (windowSize[1] >= sizeBreak && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false && event.deltaX == 0){
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
        if(windowSize[1] >= sizeBreak  && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false){
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
          if(windowSize[1] >= sizeBreak  && !inMotion && $('input#nu__search-toggle').prop('checked') === false && $('input#nu__supernav-toggle').prop('checked') === false && $('input#nu__iamnav-toggle').prop('checked') === false){
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





      // this will handle the actual slide event for the panels on the homepage
      function slidePanels(a){
        if (windowSize[1] >= sizeBreak){

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
            runTween(offset);
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
            runTween(offset);
          }

          function runTween(a){
            TweenLite.to(e,1.5,{ease:Power3.easeOut,marginLeft:a,onComplete:slideDone});
            function slideDone(){
                inMotion = false;
                $(e).css({'pointer-events':'auto'});//enables hover of tiles until animation to the next screen stops
            }
          }

        }
      }

    //}
  });
}(this,jQuery));
