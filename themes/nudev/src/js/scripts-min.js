!function(e,$,t){"use strict";$(function(){function e(){u=parseInt($(window).height())-parseInt($("header").outerHeight())}function t(){e(),$("div.navigational > section > div.items").css({height:u,"min-height":u})}function n(e){if(m>=900){$("footer#nu__global-footer").hasClass("collapse")||$("footer#nu__global-footer").addClass("collapse");var t="#nu__stories";$(t).css({"pointer-events":"none"}),"Left"===e&&_<f-1?(d+=h,_++,_==f-1?$("#next").css({display:"none"}):($("#next").css({display:"block"}),$("#prev").css({display:"block"})),$(t).animate({"margin-left":d},g,function(){p=!1,$(t).css({"pointer-events":"auto"})})):"Right"===e&&_>0&&(d-=h,_--,_==f-1?$("#next").css({display:"block"}):0==_?($("#prev").css({display:"none"}),$("#next").css({display:"block"})):$("#next").css({display:"block"}),$(t).animate({"margin-left":d},g,function(){p=!1,$(t).css({"pointer-events":"auto"})}))}}function o(){c[0]=$(window).height(),c[1]=$(window).width(),$.post("/wp-content/themes/nudev/src/windowsize.php",{height:c[0],width:c[1]},function(e){})}function a(){$("input#nu__search-toggle").prop("checked")||$("input#nu__iamnav-toggle").prop("checked")||$("input#nu__supernav-toggle").prop("checked")?$("html").css({"overflow-y":"hidden"}):$("html").css({"overflow-y":"scroll"})}function s(){"block"!=$(".js__backtotop").css("display")?$(".js__backtotop").fadeIn(r[0]):$(".js__backtotop").fadeOut(r[0])}function i(){var e=$("#supernav");"0"===e.css("opacity")?(e.css({visibility:"visible",height:"100%"}),e.animate({opacity:1},r[0],function(){$("input#nu__mainmenu-toggle").prop("checked",!0)})):"1"===e.css("opacity")&&e.animate({opacity:0},r[0],function(){e.css({visibility:"hidden",height:"0"}),$("input#nu__mainmenu-toggle").prop("checked",!1)})}var r=Array(200,1500),c=Array(0,0),l=null,u=0;if($("body").addClass("nu-js"),parseInt($("#nu__alerts").height())>0&&$("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt($("#nu__alerts").outerHeight())}),parseInt($("form#nu__searchbar-form > div > label").css("left"))>0&&($("#nu__searchbar").on("focus","form#nu__searchbar-form > div > input",function(e){$("form#nu__searchbar-form > div > label").addClass("focus"),$("form#nu__searchbar-form > div > button.reset").css({color:"rgba(255,255,255,1.0)","pointer-events":"auto"})}),$("#nu__searchbar").on("blur","form#nu__searchbar-form > div > input",function(e){""==$(this).val()&&($("form#nu__searchbar-form > div > label").removeClass("focus"),$("form#nu__searchbar-form > div > button.reset").css({color:"rgba(255,255,255,0.0)","pointer-events":"none"}))})),$("form#nu__searchbar-form").on("click","div > button[type=reset]",function(e){console.log("reset"),$("form#nu__searchbar-form > div > input").val(""),$("form#nu__searchbar-form > div > input").attr("value",""),$("form#nu__searchbar-form > div > label").removeClass("focus"),$("form#nu__searchbar-form > div > button.reset").css({color:"rgba(255,255,255,0.0)","pointer-events":"none"})}),t(),$("body").hasClass("home")){var p=!1,h=-1*$(window).width(),d=0,_=0,f=3,g=800,v=900,m=$(window).width(),b=document.getElementById("nu__stories"),k=new Hammer(b);m>=900?$("#next").fadeIn(200):$("#next").fadeOut(200),$("body").on("mousewheel",{mousewheel:{behavior:"debounce",delay:100}},function(e,t){console.log("X: "+e.deltaX+" - Y:"+e.deltaY);var o=/safari/i.test(navigator.userAgent);m>=900&&!p&&!1===$("input#nu__search-toggle").prop("checked")&&!1===$("input#nu__supernav-toggle").prop("checked")&&!1===$("input#nu__iamnav-toggle").prop("checked")&&0==e.deltaX?e.deltaY<=(o?-1:-15)&&_<2?(e.preventDefault(),n("Left"),p=!0):e.deltaY>=(o?1:15)&&0!=_&&(e.preventDefault(),n("Right"),p=!0):e.preventDefault()}),$("body").on("click","#next",function(e){m>=900&&!p&&!1===$("input#nu__search-toggle").prop("checked")&&!1===$("input#nu__supernav-toggle").prop("checked")&&!1===$("input#nu__iamnav-toggle").prop("checked")&&(p=!0,n("Left"))}),$("body").on("click","#prev",function(e){m>=900&&!p&&!1===$("input#nu__search-toggle").prop("checked")&&!1===$("input#nu__supernav-toggle").prop("checked")&&!1===$("input#nu__iamnav-toggle").prop("checked")&&(p=!0,n("Right"))}),$(document).keydown(function(e){if(m>=900&&!p&&!1===$("input#nu__search-toggle").prop("checked")&&!1===$("input#nu__supernav-toggle").prop("checked")&&!1===$("input#nu__iamnav-toggle").prop("checked"))switch(e.which){case 37:n("Right");break;case 38:n("Right");break;case 39:n("Left");break;case 40:n("Left");break}}),k.on("swipeleft",function(e){p=!0,n("Left")}),k.on("swiperight",function(e){p=!0,n("Right")})}if($("body").hasClass("home")){if(parseInt($("#nu__alerts").height())>0){var w=parseInt($(window).height())-parseInt($("header").height())-parseInt($("footer").height());$("main#nu__homepage").css({height:w,"min-height":w})}$.post("/wp-content/themes/nudev/src/hprotatordata.php",function(e){l=JSON.parse(e)}),$("article.nu__block-rotator .rotate").css({display:"block"}),$("article.nu__block-rotator").on("click",".rotate",function(e){function t(e){n.find("a").fadeOut(150,function(){n.attr("data-cslide",e),n.find("a").prop("style","background-image: url("+l[o][e][0]+");"),n.find("a").attr("href",l[o][e][1]),n.find("a").attr("target",l[o][e][3]),n.find("div > h2").html(l[o][e][2]),n.find("a").fadeIn(150)})}var n=$(this).parent().parent().parent(),o=n.attr("data-rotatorid"),a=parseInt(n.attr("data-slidemax")),s=parseInt(n.attr("data-cslide"));t($(this).hasClass("slider_prev")?parseInt(s-1)<1?a:parseInt(s-1):parseInt(s+1)>a?1:parseInt(s+1))})}o(),$("main").css({"margin-top":$("header").outerHeight()}),$("nav").on("click","input#nu__supernav-toggle",function(){$("input#nu__search-toggle").prop("checked",!1),$("input#nu__iamnav-toggle").prop("checked",!1),$("#nu__supernav > section > div > ul > li").removeClass("active"),$("#nu__supernav > section > div > ul > li:first-child").addClass("active"),a(),$("body").hasClass("home")&&!$("footer#nu__global-footer").hasClass("collapse")&&$("footer#nu__global-footer").addClass("collapse")}),$("nav").on("click","input#nu__iamnav-toggle",function(){$("input#nu__search-toggle").prop("checked",!1),$("input#nu__supernav-toggle").prop("checked",!1),$("#nu__iamnav > section > div > ul > li").removeClass("active"),$("#nu__iamnav > section > div > ul > li:first-child").addClass("active"),a(),$("body").hasClass("home")&&!$("footer#nu__global-footer").hasClass("collapse")&&$("footer#nu__global-footer").addClass("collapse")}),$("nav").on("click","input#nu__search-toggle",function(){$("body").hasClass("search")&&(console.log("clicked search while on the search results page, which should not be allowed!!!"),$("input#nu__search-toggle").prop("checked",!1)),$("input#nu__supernav-toggle").prop("checked",!1),$("input#nu__iamnav-toggle").prop("checked",!1),$("#nu__iamnav > section > div > ul > li").removeClass("active"),$("#nu__iamnav > section > div > ul > li:first-child").addClass("active"),$("#nu__supernav > section > div > ul > li").removeClass("active"),$("#nu__supernav > section > div > ul > li:first-child").addClass("active"),a(),$("body").hasClass("home")&&!$("footer#nu__global-footer").hasClass("collapse")&&$("footer#nu__global-footer").addClass("collapse")}),$("div.navigational > section > div > ul").on("click","li:not(.featured)",function(e){$("div.navigational > section > div > ul li").removeClass("active"),$(this).addClass("active")}),$("div.nu__footer").on("click",".js_footer-hideshow",function(e){$("footer#nu__global-footer").hasClass("collapse")?$("footer#nu__global-footer").removeClass("collapse"):$("footer#nu__global-footer").addClass("collapse")}),$(window).on("resize",function(){if(o(),t(),$("main").css({"margin-top":$("header").outerHeight()}),parseInt($("#nu__alerts").height())>0&&$("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt($("header").outerHeight())}),$("body").hasClass("home")){if(m=$(window).width(),parseInt($("#nu__alerts").height())>0){console.log($("header").height());var e=parseInt($(window).height())-parseInt($("header").outerHeight())-parseInt($("footer").height());$("main#nu__homepage").css({height:e,"min-height":e})}m<900&&($("#nu__stories").css({"margin-left":"0"}),_=0,d=0);var n=-1*$(window).width(),a=h-n;if(_>0){var s=d-a*_;$("#nu__stories").css({"margin-left":s}),d=s}h=n}}),$("body").on("click touchend",".js__backtotop",function(e){e.preventDefault(),$("html, body").animate({scrollTop:0},r[1],function(){$(".js__backtotop").fadeOut(r[0])})})})}(this,jQuery);