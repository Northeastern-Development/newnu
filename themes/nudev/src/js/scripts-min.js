function getContentAreaHeight(){contentAreaHeight=parseInt($(window).height())-parseInt($("header").outerHeight())}function getWindowSize(){windowSize[0]=$(window).height(),windowSize[1]=$(window).width(),$.post("/wp-content/themes/nudev/src/windowsize.php",{height:windowSize[0],width:windowSize[1]},function(e){})}var windowSize=Array(0,0),rotators=null,iamnavbgs=null,contentAreaHeight=0,debug=!0,showSize=!1,sizeBreak=900,isSafari=/safari/i.test(navigator.userAgent),currentPanel=0,panelCount=3,windowWidth=null,offset=0,exceedsContainer=!1;!function(e,$,i){"use strict";$(function(){function e(){window.history.back()}function i(){$(".js__showmore").hasClass("active")||($(".js__showmore").addClass("active"),$(".nu__filters > div > ul > li.inshowmore").each(function(){$(this).css({opacity:"1.0"})}),$(".nu__filters").css({overflow:"visible"}))}function t(){$(".js__showmore").hasClass("active")&&($(".js__showmore").removeClass("active"),$(".nu__filters > div > ul > li.inshowmore").each(function(){$(this).css({opacity:"0.0"})}),$(".nu__filters").css({overflow:"hidden"}))}function n(){if($(window).width()<=620)$(".nu__filters > div > div").hide(),$(".nu__filters > div > ul > li").removeAttr("style"),$(".nu__filters > div > ul > li").removeClass("inshowmore"),exceedsContainer=!1;else{var e=0,i=$(".nu__filters > div > ul").width(),t=0,n=$(".nu__filters > div > ul > li").first().position().top,s=$(".nu__filters").height()-2;$(".nu__filters > div > ul > li.inshowmore").removeClass("inshowmore"),$(".nu__filters > div > ul > li > a").each(function(e){t+=$(this).outerWidth(),t>i?($(this).parent().addClass("inshowmore").css({top:s}),s+=$(this).parent().height()):($(this).parent().removeAttr("style"),$(this).parent().removeClass("inshowmore"))}),t+0>=i?exceedsContainer||(exceedsContainer=!0,$(".nu__filters > div > div").show()):t+0<i&&exceedsContainer&&(exceedsContainer=!1,$(".nu__filters > div > div").hide(),$(".nu__filters > div > ul > li.inshowmore").removeAttr("style"),$(".nu__filters > div > ul > li.inshowmore").removeClass("inshowmore"))}}if(showSize){var s=$(window).width();$("p.testp").text("Screen width is currently: "+s+"px."),$(window).resize(function(){var e=$(window).width();e<=576?$("p.testp").text("Screen width is less than or equal to 576px. Width is currently: "+e+"px."):e<=680?$("p.testp").text("Screen width is between 577px and 680px. Width is currently: "+e+"px."):e<=1024?$("p.testp").text("Screen width is between 681px and 1024px. Width is currently: "+e+"px."):e<=1500?$("p.testp").text("Screen width is between 1025px and 1499px. Width is currently: "+e+"px."):$("p.testp").text("Screen width is greater than 1500px. Width is currently: "+e+"px.")})}"true"!=localStorage.getItem("acceptCookies")&&$(".cookiewarning").delay(1e3).fadeIn(250),$(".cookiewarning").on("click",".js__cookie-accept",function(e){localStorage.setItem("acceptCookies","true"),$(".cookiewarning").fadeOut(250)}),$(".main").css({"margin-top":$("header").outerHeight()}),$("body").addClass("nu-js"),$("nav input").prop("checked",!1),$("body.search .js-search-close").on("click touchend",function(){e()}),parseInt($("form#nu__searchbar-form > div > label").css("left"))>0&&($("#nu__searchbar").on("focus","form#nu__searchbar-form > div > input",function(e){$("form#nu__searchbar-form > div > label").addClass("focus")}),$("#nu__searchbar").on("blur","form#nu__searchbar-form > div > input",function(e){""==$(this).val()&&$("form#nu__searchbar-form > div > label").removeClass("focus")})),$("form#nu__searchbar-form").on("click","div > button[type=reset]",function(e){$("form#nu__searchbar-form > div > input").val(""),$("form#nu__searchbar-form > div > input").attr("value",""),$("form#nu__searchbar-form > div > label").removeClass("focus")}),getWindowSize(),$(".nu__filters").on("click",".js__showmore",function(e){$(this).hasClass("active")?t():i()}),!$("body").hasClass("home")&&$(".nu__filters").length&&n(),$(window).on("resize",function(){getWindowSize(),!$("body").hasClass("home")&&$(".nu__filters").length&&(n(),t()),$(".main").css({"margin-top":$("header").outerHeight()})}),$(window).on("scroll",function(){$("body").hasClass("home")||t()})})}(this,jQuery);