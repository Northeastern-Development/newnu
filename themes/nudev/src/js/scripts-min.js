function getContentAreaHeight(){contentAreaHeight=parseInt($(window).height())-parseInt($("header").outerHeight())}function getWindowSize(){$.post("/wp-content/themes/nudev/src/windowsize.php",{height:$(window).height(),width:$(window).width()},function(e){})}var windowSize=Array(0,0),rotators=null,iamnavbgs=null,contentAreaHeight=0,debug=!1,showSize=!0,sizeBreak=900,isSafari=/safari/i.test(navigator.userAgent),windowWidth=null,offset=0,exceedsContainer=!1;!function(e,i,t){"use strict";i(function(){function e(){window.history.back()}function t(){i(".js__showmore").hasClass("active")||(i(".js__showmore").addClass("active"),i(".nu__filters > div > ul > li.inshowmore").each(function(){i(this).css({opacity:"1.0"})}),i(".nu__filters").css({overflow:"visible"}))}function s(){i(".js__showmore").hasClass("active")&&(i(".js__showmore").removeClass("active"),i(".nu__filters > div > ul > li.inshowmore").each(function(){i(this).css({opacity:"0.0"})}),i(".nu__filters").css({overflow:"hidden"}))}function n(){if(i(window).width()<=620)i(".nu__filters > div > div").hide(),i(".nu__filters > div > ul > li").removeAttr("style"),i(".nu__filters > div > ul > li").removeClass("inshowmore"),exceedsContainer=!1;else{var e=0,t=i(".nu__filters > div > ul").width(),s=0,n=i(".nu__filters > div > ul > li").first().position().top,o=i(".nu__filters").height()-2;i(".nu__filters > div > ul > li.inshowmore").removeClass("inshowmore"),i(".nu__filters > div > ul > li > a").each(function(e){(s+=i(this).outerWidth())>t?(i(this).parent().addClass("inshowmore").css({top:o}),o+=i(this).parent().height()):(i(this).parent().removeAttr("style"),i(this).parent().removeClass("inshowmore"))}),s+0>=t?exceedsContainer||(exceedsContainer=!0,i(".nu__filters > div > div").show()):s+0<t&&exceedsContainer&&(exceedsContainer=!1,i(".nu__filters > div > div").hide(),i(".nu__filters > div > ul > li.inshowmore").removeAttr("style"),i(".nu__filters > div > ul > li.inshowmore").removeClass("inshowmore"))}}if(getWindowSize(),showSize){var o=i(window).width();i("p.testp").text("Screen width is currently: "+o+"px."),i(window).resize(function(){var e=i(window).width();e<=576?i("p.testp").text("Screen width is less than or equal to 576px. Width is currently: "+e+"px."):e<=680?i("p.testp").text("Screen width is between 577px and 680px. Width is currently: "+e+"px."):e<=1024?i("p.testp").text("Screen width is between 681px and 1024px. Width is currently: "+e+"px."):e<=1500?i("p.testp").text("Screen width is between 1025px and 1499px. Width is currently: "+e+"px."):i("p.testp").text("Screen width is greater than 1500px. Width is currently: "+e+"px.")})}"true"!=localStorage.getItem("acceptCookies")&&i(".cookiewarning").delay(1e3).fadeIn(250),i(".cookiewarning").on("click",".js__cookie-accept",function(e){localStorage.setItem("acceptCookies","true"),i(".cookiewarning").fadeOut(250)}),console.log(i("header").outerHeight()),i(".main").css({"margin-top":i("header").outerHeight()}),i("body").addClass("nu-js"),i("nav input").prop("checked",!1),i("body.search .js-search-close").on("click touchend",function(){e()}),parseInt(i("form#nu__searchbar-form > div > label").css("left"))>0&&(i("#nu__searchbar").on("focus","form#nu__searchbar-form > div > input",function(e){i("form#nu__searchbar-form > div > label").addClass("focus")}),i("#nu__searchbar").on("blur","form#nu__searchbar-form > div > input",function(e){""==i(this).val()&&i("form#nu__searchbar-form > div > label").removeClass("focus")})),i("form#nu__searchbar-form").on("click","div > button[type=reset]",function(e){i("form#nu__searchbar-form > div > input").val(""),i("form#nu__searchbar-form > div > input").attr("value",""),i("form#nu__searchbar-form > div > label").removeClass("focus")}),i(".nu__filters").on("click",".js__showmore",function(e){i(this).hasClass("active")?s():t()}),!i("body").hasClass("home")&&i(".nu__filters").length>0&&n(),i(window).on("resize",function(){getWindowSize(),!i("body").hasClass("home")&&i(".nu__filters").length>0&&(n(),s()),i(".main").css({"margin-top":i("header").outerHeight()})}),i(window).on("scroll",function(){i("body").hasClass("home")||s()})})}(this,jQuery);