var cNav=null,navPanelInMotion=!1;!function(i,n,t){"use strict";n(function(){function i(){getContentAreaHeight(),n("div.navigational > section > div.items").css({height:contentAreaHeight,"min-height":contentAreaHeight}),n("body").hasClass("search")&&n("#nu__search section").css({"min-height":contentAreaHeight})}function t(i){i.addClass("active").focus().next("div").addClass("open"),i.next("div").find("form input").focus(),i.next("div").find("div.items > ul").attr("aria-hidden","false"),i.next("div").find("div.items > ul > li > ul > li:not(.sectiontitle)").first().find("a").focus(),n(".js-dropdown-sneezeguard").css({height:"100%"}),cNav=i.attr("id")}function e(i){i.removeClass("active").next("div").removeClass("open"),i.next("div").find("div.items > ul > li:not(.sectiontitle)").attr("tabindex","-1"),cNav=null,n(".js-dropdown-sneezeguard").css({height:"0"})}function s(){n("nav a.js__mainmenu-item").each(function(i){n(this).removeClass("active").blur().next("div").removeClass("open"),n(this).next("div").find("div.items > ul > li:not(.sectiontitle)").attr("tabindex","-1")}),n(".js-dropdown-sneezeguard").css({height:"0"}),cNav=null,a()}function a(){n("#nu__supernav > section > div > ul > li.active").removeClass("active"),n("#nu__supernav > section > div > ul > li").first().addClass("active"),windowSize[1]>740&&n("#nu__supernav > section > div > ul > li:first-child").addClass("active"),o(),setTimeout(function(){navPanelInMotion=!1},100)}function l(i){n("ul.dropdowns > li.js-dropdown").find("a").removeClass("open"),"none"==i.find("ul").css("display")&&(i.find("ul").show(),i.find("a").addClass("open"),i.find("ul > li > a").attr("tabindex","0"))}function o(){!0===n("#nu__search-toggle").hasClass("active")||!0===n("#nu__supernav-toggle").hasClass("active")?n("html").css({"overflow-y":"hidden"}):n("html").css({"overflow-y":"scroll"})}function d(i){i.parent().find("li ul li").attr("tabindex","-1"),i.find("ul").first().attr("aria-hidden","false"),i.find("ul li:not(.sectiontitle)").attr("tabindex","1"),n("div.navigational > section > div > ul li").removeClass("active"),i.addClass("active")}i(),windowSize[1]<740&&a(),parseInt(n("#nu__alerts").height())>0&&n("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt(n("#nu__alerts").outerHeight())}),n("nav.nu__mainmenu").on("focus","a.blur",function(i){n(this).hasClass("blurclosepanel")?(n("#"+cNav).focus(),s()):n(this).hasClass("blurnextcat")?(n(this).parent().removeClass("active"),n(this).parent().attr("aria-hidden","true"),n(this).parent().nextAll("li:not(.hideuntilmobile)").first().addClass("active"),n(this).parent().nextAll("li:not(.hideuntilmobile)").first().attr("aria-hidden","false"),n(this).parent().nextAll("li:not(.hideuntilmobile)").first().find("ul > li:not(.sectiontitle)").first().find("a").focus()):n(this).hasClass("blurprevcat")?(n(this).parent().removeClass("active"),n(this).parent().attr("aria-hidden","true"),n(this).parent().prevAll("li:not(.hideuntilmobile)").first().addClass("active"),n(this).parent().prevAll("li:not(.hideuntilmobile)").first().attr("aria-hidden","false"),n(this).parent().prevAll("li:not(.hideuntilmobile)").first().find("ul > li:not(.sectiontitle)").first().find("a").focus()):n(this).hasClass("blurtofeatured")?(n(this).parent().prevAll("li:not(.hideuntilmobile)").attr("aria-hidden","true"),n(this).parent().nextAll("li.featured:not(.hideuntilmobile)").first().find("a").focus()):n(this).hasClass("blurfromfeatured")&&n(this).prevAll("li:not(.hideuntilmobile)").first().find("ul > li:not(.sectiontitle)").first().find("a").focus()}),n("nav.nu__mainmenu").on("click","a.js__mainmenu-item",function(i){i.preventDefault(),i.stopPropagation();var l=i.type;if("click"!=l||navPanelInMotion)if("focusin"!=l||navPanelInMotion)"focusout"!=l||navPanelInMotion||(navPanelInMotion=!0);else{navPanelInMotion=!0,s();var o=n(this);setTimeout(function(){t(o)},100)}else navPanelInMotion=!0,null==cNav?t(n(this)):n(this).attr("id")==cNav?e(n(this)):(s(),t(n(this)));a(),n("body").hasClass("search")&&n("#nu__search-toggle").removeClass("active")}),n("nav.nu__mainmenu").on("click","div#nu__supernav,div#nu__searchbar,div#nu__iamnav",function(i){["nu__supernav","nu__searchbar","nu__iamnav"].indexOf(i.target.id)>=0&&(n("nav a.js__mainmenu-item").each(function(i){n(this).removeClass("active").blur().next("div").removeClass("open")}),n(".js-dropdown-sneezeguard").css({height:"0"}),cNav=null,o())}),n("ul.dropdowns").on("focus mouseover","li.js-single",function(i){cNav=null,n("ul.dropdowns > li > ul").hide(),n("ul.dropdowns > li.js-dropdown").find("a").removeClass("open").blur()}),n("ul.dropdowns").on("click","li.js-dropdown > a",function(i){i.preventDefault(),n("ul.dropdowns > li > ul").hide(),n("ul.dropdowns > li.js-dropdown").find("a").removeClass("open"),cNav!=n(this).parent().attr("id")?(cNav=n(this).parent().attr("id"),l(n(this).parent())):cNav=null}),n("div.navigational > section > div.items > ul > li:not(.featured)").focus(function(i){d(n(this))}),n("div.navigational > section > div.items > ul > li:not(.featured)").click(function(i){d(n(this))}),n(document).on("keyup","html",function(i){13==i.which&&n("ul.dropdowns > li.js-dropdown > a.open").next().find("li").first().find("a").focus()}),n(document).on("keydown","html",function(i){27==i.which&&(n("ul.dropdowns > li > ul").hide(),n("ul.dropdowns > li.js-dropdown").find("a").removeClass("open"),cNav=null,!0!==n("#nu__search-toggle").hasClass("active")&&!0!==n("#nu__supernav-toggle").hasClass("active")||(n(".js-dropdown-sneezeguard").css({height:"0"}),n("nav a.js__mainmenu-item").each(function(i){n(this).hasClass("active")?n(this).focus():n(this).blur(),n(this).removeClass("active").next("div").removeClass("open"),n(this).next("div").find("div.items > ul").attr("tabindex","-1"),n(this).next("div").find("div.items > ul > li").attr("tabindex","-1")}),a()))}),n(window).on("resize",function(){a(),i()})})}(this,jQuery);