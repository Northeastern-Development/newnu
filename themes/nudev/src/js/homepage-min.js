!function(e,$,t){"use strict";$(function(){function e(){$("div.takeover").fadeOut(250)}function t(e){function t(e){function t(){n=!1,$(o).css({"pointer-events":"auto"})}TweenLite.to(o,1.5,{ease:Power3.easeOut,marginLeft:e,onComplete:t})}if(windowSize[1]>=sizeBreak){$("footer#nu__global-footer").hasClass("collapse")||$("footer#nu__global-footer").addClass("collapse");var o="#nu__stories";$(o).css({"pointer-events":"none"}),"Left"===e&&currentPanel<panelCount-1?(offset+=windowWidth,currentPanel++,debug&&(currentPanel==panelCount-1?$("#next").fadeOut(250):($("#next").fadeIn(250),$("#prev").fadeIn(250))),t(offset)):"Right"===e&&currentPanel>0&&(offset-=windowWidth,currentPanel--,debug&&(currentPanel==panelCount-1?$("#next").fadeIn(250):0==currentPanel?($("#prev").fadeOut(250),$("#next").fadeIn(250)):$("#next").fadeIn(250)),t(offset))}}var n=!1;windowWidth=-1*windowSize[1];var o=document.getElementById("nu__stories"),a=new Hammer(o),r=(isSafari,1500),i=7e3;if(parseInt($("#nu__alerts").height())>0){var s=parseInt(windowSize[0])-parseInt($("header").height())-parseInt($("footer").height());$("#nu__homepage").css({height:s,"min-height":s})}$("div.takeover").on("click",".nu__close-takeover",function(t){e()}),"block"==$("div.takeover").css("display")&&setTimeout(function(){e()},7e3),$.post("/wp-content/themes/nudev/src/hprotatordata.php",function(e){rotators=JSON.parse(e)}),$("article.nu__block-rotator .rotate").css({display:"block"}),$("article.nu__block-rotator").on("click",".rotate",function(e){function t(e){n.find("div.bgimage,h2,div.nu__overlay-logo").fadeOut(150,function(){n.attr("data-cslide",e),n.attr("style","background-image: url("+rotators[o][e][0]+");"),n.find("a").attr("href",rotators[o][e][1]),n.find("a").attr("target",rotators[o][e][5]),n.find("p").html(rotators[o][e][3]),n.find("h2").html("<span>"+rotators[o][e][2]+"</span>"),n.find("div.nu__overlay-logo").html(""),rotators[o][e][4]&&""!=rotators[o][e][4]&&n.find("div.nu__overlay-logo").html('<img src="'+rotators[o][e][4]+'" alt="overlay logo for '+rotators[o][e][2]+'" />'),n.find("div.bgimage,h2,div.nu__overlay-logo").fadeIn(150)})}var n=$(this).parent().parent().parent(),o=n.attr("data-rotatorid"),a=parseInt(n.attr("data-slidemax")),r=parseInt(n.attr("data-cslide"));t($(this).hasClass("slider_prev")?parseInt(r-1)<1?a:parseInt(r-1):parseInt(r+1)>a?1:parseInt(r+1))}),debug&&(windowSize[1]>=sizeBreak?$("#next").fadeIn(200):$("#next").fadeOut(200)),$("div.nu__footer").on("click",".js_footer-hideshow",function(e){$("footer#nu__global-footer").hasClass("collapse")?$("footer#nu__global-footer").removeClass("collapse"):$("footer#nu__global-footer").addClass("collapse")}),$("body").on("mousewheel",{mousewheel:{behavior:"debounce",delay:5}},function(e,o){windowSize[1]>=sizeBreak&&!n&&!1===$("input#nu__search-toggle").prop("checked")&&!1===$("input#nu__supernav-toggle").prop("checked")&&!1===$("input#nu__iamnav-toggle").prop("checked")&&0==e.deltaX&&(e.deltaY<=(isSafari?-1:-15)&&currentPanel<2?(e.preventDefault(),t("Left"),n=!0):e.deltaY>=(isSafari?1:15)&&0!=currentPanel&&(e.preventDefault(),t("Right"),n=!0))}),$("body").on("click","#prev,#next",function(e){windowSize[1]>=sizeBreak&&!n&&!1===$("input#nu__search-toggle").prop("checked")&&!1===$("input#nu__supernav-toggle").prop("checked")&&!1===$("input#nu__iamnav-toggle").prop("checked")&&(n=!0,t("next"==$(this).attr("id")?"Left":"Right"))}),$(document).keydown(function(e){if(windowSize[1]>=sizeBreak&&!n&&!1===$("input#nu__search-toggle").prop("checked")&&!1===$("input#nu__supernav-toggle").prop("checked")&&!1===$("input#nu__iamnav-toggle").prop("checked"))switch(e.which){case 37:case 38:t("Right");break;case 39:case 40:t("Left");break}}),a.on("swipeleft",function(e){n=!0,t("Left")}),a.on("swiperight",function(e){n=!0,t("Right")}),$(window).on("resize",function(){if(parseInt($("#nu__alerts").height())>0){var e=parseInt($(window).height())-parseInt($("header").outerHeight())-parseInt($("footer").height());$("#nu__homepage").css({height:e,"min-height":e})}windowSize[1]<sizeBreak?($("#nu__stories").css({"margin-left":"0"}),currentPanel=0,offset=0,$("#next,#prev").fadeOut(200)):"none"==$("#next").css("display")&&$("#next").fadeIn(200);var t=-1*windowSize[1],n=windowWidth-t;if(currentPanel>0){var o=offset-n*currentPanel;$("#nu__stories").css({"margin-left":o}),offset=o}windowWidth=t})})}(this,jQuery);