!function(e,$,t){"use strict";$(function(){function e(){c=parseInt($(window).height())-parseInt($("header").outerHeight())}function t(){e(),$("div.navigational > section > div.items").css({height:c,"min-height":c})}function n(){s[0]=$(window).height(),s[1]=$(window).width(),$.post("/wp-content/themes/nudev/src/windowsize.php",{height:s[0],width:s[1]},function(e){})}function a(e){if(k>=900){$("footer#nu__global-footer").hasClass("collapse")||$("footer#nu__global-footer").addClass("collapse");var t="#nu__stories";$(t).css({"pointer-events":"none"}),"Left"===e&&g<v-1?(f+=_,g++,u&&(g==v-1?$("#next").css({display:"none"}):($("#next").css({display:"block"}),$("#prev").css({display:"block"}))),$(t).animate({"margin-left":f},b,function(){d=!1,$(t).css({"pointer-events":"auto"})})):"Right"===e&&g>0&&(f-=_,g--,u&&(g==v-1?$("#next").css({display:"block"}):0==g?($("#prev").css({display:"none"}),$("#next").css({display:"block"})):$("#next").css({display:"block"})),$(t).animate({"margin-left":f},b,function(){d=!1,$(t).css({"pointer-events":"auto"})}))}}function i(){$("input#nu__search-toggle").prop("checked")||$("input#nu__iamnav-toggle").prop("checked")||$("input#nu__supernav-toggle").prop("checked")?$("html").css({"overflow-y":"hidden"}):$("html").css({"overflow-y":"scroll"})}var o=Array(200,1500),s=Array(0,0),r=null,c=0,l=null,u=!1,h=!0;if(!0){var p=$(window).width();$("p.testp").text("Screen width is currently: "+p+"px."),$(window).resize(function(){var e=$(window).width();e<=576?$("p.testp").text("Screen width is less than or equal to 576px. Width is currently: "+e+"px."):e<=680?$("p.testp").text("Screen width is between 577px and 680px. Width is currently: "+e+"px."):e<=1024?$("p.testp").text("Screen width is between 681px and 1024px. Width is currently: "+e+"px."):e<=1500?$("p.testp").text("Screen width is between 1025px and 1499px. Width is currently: "+e+"px."):$("p.testp").text("Screen width is greater than 1500px. Width is currently: "+e+"px.")})}if($("main").css({"margin-top":$("header").outerHeight()}),$("body").addClass("nu-js"),parseInt($("#nu__alerts").height())>0&&$("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt($("#nu__alerts").outerHeight())}),parseInt($("form#nu__searchbar-form > div > label").css("left"))>0&&($("#nu__searchbar").on("focus","form#nu__searchbar-form > div > input",function(e){$("form#nu__searchbar-form > div > label").addClass("focus"),$("form#nu__searchbar-form > div > button.reset").css({color:"rgba(255,255,255,1.0)","pointer-events":"auto"})}),$("#nu__searchbar").on("blur","form#nu__searchbar-form > div > input",function(e){""==$(this).val()&&($("form#nu__searchbar-form > div > label").removeClass("focus"),$("form#nu__searchbar-form > div > button.reset").css({color:"rgba(255,255,255,0.0)","pointer-events":"none"}))})),$("form#nu__searchbar-form").on("click","div > button[type=reset]",function(e){console.log("reset"),$("form#nu__searchbar-form > div > input").val(""),$("form#nu__searchbar-form > div > input").attr("value",""),$("form#nu__searchbar-form > div > label").removeClass("focus"),$("form#nu__searchbar-form > div > button.reset").css({color:"rgba(255,255,255,0.0)","pointer-events":"none"})}),t(),n(),$("body").hasClass("home")){var d=!1,_=-1*$(window).width(),f=0,g=0,v=3,m=/safari/i.test(navigator.userAgent),b=m?1500:800,w=900,k=$(window).width(),y=document.getElementById("nu__stories"),x=new Hammer(y);if(parseInt($("#nu__alerts").height())>0){var I=parseInt($(window).height())-parseInt($("header").height())-parseInt($("footer").height());$("main#nu__homepage").css({height:I,"min-height":I})}$.post("/wp-content/themes/nudev/src/hprotatordata.php",function(e){r=JSON.parse(e)}),$("article.nu__block-rotator .rotate").css({display:"block"}),$("article.nu__block-rotator").on("click",".rotate",function(e){function t(e){n.find("a").fadeOut(150,function(){n.attr("data-cslide",e),n.find("a").prop("style","background-image: url("+r[a][e][0]+");"),n.find("a").attr("href",r[a][e][1]),n.find("a").attr("target",r[a][e][3]),n.find("div > h2").html(r[a][e][2]),n.find("a").fadeIn(150)})}var n=$(this).parent().parent().parent(),a=n.attr("data-rotatorid"),i=parseInt(n.attr("data-slidemax")),o=parseInt(n.attr("data-cslide"));t($(this).hasClass("slider_prev")?parseInt(o-1)<1?i:parseInt(o-1):parseInt(o+1)>i?1:parseInt(o+1))}),u&&(k>=900?$("#next").fadeIn(200):$("#next").fadeOut(200)),$("div.nu__footer").on("click",".js_footer-hideshow",function(e){$("footer#nu__global-footer").hasClass("collapse")?$("footer#nu__global-footer").removeClass("collapse"):$("footer#nu__global-footer").addClass("collapse")}),$("body").on("mousewheel",{mousewheel:{behavior:"debounce",delay:100}},function(e,t){k>=900&&!d&&!1===$("input#nu__search-toggle").prop("checked")&&!1===$("input#nu__supernav-toggle").prop("checked")&&!1===$("input#nu__iamnav-toggle").prop("checked")&&0==e.deltaX&&(e.deltaY<=(m?-1:-15)&&g<2?(e.preventDefault(),a("Left"),d=!0):e.deltaY>=(m?1:15)&&0!=g&&(e.preventDefault(),a("Right"),d=!0))}),$("body").on("click","#prev,#next",function(e){k>=900&&!d&&!1===$("input#nu__search-toggle").prop("checked")&&!1===$("input#nu__supernav-toggle").prop("checked")&&!1===$("input#nu__iamnav-toggle").prop("checked")&&(d=!0,a("next"==$(this).attr("id")?"Left":"Right"))}),$(document).keydown(function(e){if(k>=900&&!d&&!1===$("input#nu__search-toggle").prop("checked")&&!1===$("input#nu__supernav-toggle").prop("checked")&&!1===$("input#nu__iamnav-toggle").prop("checked"))switch(e.which){case 37:case 38:a("Right");break;case 39:case 40:a("Left");break}}),x.on("swipeleft",function(e){d=!0,a("Left")}),x.on("swiperight",function(e){d=!0,a("Right")})}$("nav").on("click","input#nu__supernav-toggle,input#nu__iamnav-toggle,input#nu__search-toggle",function(){console.log($(this)),null==l?($(this).prop("checked",!0),l=$(this).attr("id")):$(this).attr("id")==l?($(this).prop("checked",!1),l=null):($("nav input").prop("checked",!1),$(this).prop("checked",!0),l=$(this).attr("id")),$("#nu__supernav > section > div > ul > li.active").removeClass("active"),$("#nu__supernav > section > div > ul > li:first-child").addClass("active"),$("#nu__iamnav > section > div > ul > li.active").removeClass("active"),$("#nu__iamnav > section > div > ul > li:first-child").addClass("active"),i(),$("body").hasClass("search")&&($("input#nu__search-toggle").prop("checked",!1),i()),$("body").hasClass("home")&&!$("footer#nu__global-footer").hasClass("collapse")&&$("footer#nu__global-footer").addClass("collapse")}),$("div.navigational > section > div > ul").on("click","li:not(.featured)",function(e){$("div.navigational > section > div > ul li").removeClass("active"),$(this).addClass("active")}),$(window).on("resize",function(){if(n(),t(),$("main").css({"margin-top":$("header").outerHeight()}),parseInt($("#nu__alerts").height())>0&&$("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt($("header").outerHeight())}),$("body").hasClass("home")){if(k=$(window).width(),parseInt($("#nu__alerts").height())>0){var e=parseInt($(window).height())-parseInt($("header").outerHeight())-parseInt($("footer").height());$("main#nu__homepage").css({height:e,"min-height":e})}k<900&&($("#nu__stories").css({"margin-left":"0"}),g=0,f=0);var a=-1*$(window).width(),i=_-a;if(g>0){var o=f-i*g;$("#nu__stories").css({"margin-left":o}),f=o}_=a}})})}(this,jQuery);