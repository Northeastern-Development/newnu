// this file is the JS for the main menu ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file
var cNav=null,navPanelInMotion=!1;!function(i,d,n){"use strict";d(function(){
// set the height of menu panels if we made it this far, used to augment the CSS
function i(){getContentAreaHeight(),d("div.navigational > section > div.items").css({height:contentAreaHeight,"min-height":contentAreaHeight}),d("body").hasClass("search")&&d("#nu__search section").css({"min-height":contentAreaHeight})}
// this function will handle opening a specific nav panel
function e(i){
// console.log('open nav panel');
i.addClass("active").focus().next("div").addClass("open"),i.next("div").find("form input").focus(),i.next("div").find("div.items > ul").attr("aria-hidden","false"),
// a.next('div').find('div.items > ul > li:not(.sectiontitle)').first().focus();
// a.next('div').find('div.items > ul > li:not(.sectiontitle)').first().focus();
i.next("div").find("div.items > ul > li > ul > li:not(.sectiontitle)").first().find("a").focus(),
// a.next('div').find('div.items > ul > li:not(.sectiontitle)').attr('tabindex','1');
// we need to reveal the dropdown sneezeguard
d(".js-dropdown-sneezeguard").css({height:"100%"}),
// set the id of the now open nav panel
cNav=i.attr("id")}
// this function will handle closing the same nav panel
function s(i){i.removeClass("active").next("div").removeClass("open"),i.next("div").find("div.items ul").attr("aria-hidden","true"),i.next("div").find("div.items > ul > li:not(.sectiontitle)").attr("tabindex","-1"),cNav=null,
// we need to hide the dropdown sneezeguard
d(".js-dropdown-sneezeguard").css({height:"0"})}
// this function will handle closing a specific nav panel
function a(){d("nav a.js__mainmenu-item").each(function(i){// force all of them closed/clear
d(this).removeClass("active").blur().next("div").removeClass("open"),d(this).next("div").find("div.items > ul").attr("aria-hidden","true"),d(this).next("div").find("div.items > ul > li:not(.sectiontitle)").attr("tabindex","-1")}),
// we need to hide the dropdown sneezeguard
d(".js-dropdown-sneezeguard").css({height:"0"}),cNav=null,o()}
// this will handle resetting the nav panels
function o(){
// every state has to reset the first items from being active
d("#nu__supernav > section > div > ul > li.active").removeClass("active"),d("#nu__supernav > section > div > ul > li").first().addClass("active"),740<windowSize[1]&&// above break size, show first cat automagically
d("#nu__supernav > section > div > ul > li:first-child").addClass("active"),t(),setTimeout(function(){navPanelInMotion=!1},100)}
// if the user clicks outside the menu items and on the empty portion of the fullscreen sneezeguard, close the nav panels
// this will perform the hide and show of the dropdowns
function n(i){d("ul.dropdowns > li.js-dropdown").find("a").removeClass("open"),"none"==i.find("ul").css("display")&&(i.find("ul").show(),i.find("a").addClass("open"),
// turning this on makes the tab go through each drop down menu item, comment out for arrow up/down
i.find("ul > li > a").attr("tabindex","0"))}
// this function will determine whether or not to allow the page to scroll, if the menu is open or not
function t(){
// prevent the main page from scrolling when the nav is open or allow it if we close the navs
!0===d("#nu__search-toggle").hasClass("active")||!0===d("#nu__supernav-toggle").hasClass("active")?d("html").css({"overflow-y":"hidden"}):d("html").css({"overflow-y":"scroll"})}
// this will handle pressing enter on a nav category
// this is the function that will actually change the category
function l(i){
// we need to handle activating the correct aria-hidden values as we change categories
i.parent().find("li ul").attr("aria-hidden","true"),i.parent().find("li ul li").attr("tabindex","-1"),i.find("ul").first().attr("aria-hidden","false"),i.find("ul li:not(.sectiontitle)").attr("tabindex","1"),d("div.navigational > section > div > ul li").removeClass("active"),i.addClass("active")}
// this is the event listener for the user to press esc to close the menu panels
i(),
// we need to perform some tweaks to the site if we are below the break size on load
windowSize[1]<740&&o(),
// need to account for the alerts being open and shift the main menu overlays down to match!!
0<parseInt(d("#nu__alerts").height())&&d("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt(d("#nu__alerts").outerHeight())}),
// this is a listener for when we hit a blur class element to see where we need to send focus next
d("nav.nu__mainmenu").on("focus","a.blur",function(i){d(this).hasClass("blurclosepanel")?(// this will close the currently open panel
d("#"+cNav).focus(),a()):d(this).hasClass("blurnextcat")?(// this will transfer focus from one category in the supernav to the next
d(this).parent().removeClass("active"),d(this).parent().attr("aria-hidden","true"),d(this).parent().nextAll("li:not(.hideuntilmobile)").first().addClass("active"),d(this).parent().nextAll("li:not(.hideuntilmobile)").first().find("ul > li:not(.sectiontitle)").first().find("a").focus()):d(this).hasClass("blurprevcat")?(// this will transfer focus from one category in the supernav to the previous
d(this).parent().removeClass("active"),d(this).parent().attr("aria-hidden","true"),d(this).parent().prevAll("li:not(.hideuntilmobile)").first().addClass("active"),d(this).parent().prevAll("li:not(.hideuntilmobile)").first().find("ul > li:not(.sectiontitle)").first().find("a").focus()):d(this).hasClass("blurtofeatured")?(// this will blur from the categories to the featured items in the supernav
d(this).parent().prevAll("li:not(.hideuntilmobile)").attr("aria-hidden","true"),d(this).parent().nextAll("li.featured:not(.hideuntilmobile)").first().find("a").focus()):d(this).hasClass("blurfromfeatured")&&// this will blur from the featured items to the categories in the supernav
d(this).prevAll("li:not(.hideuntilmobile)").first().find("ul > li:not(.sectiontitle)").first().find("a").focus()}),
// we need to have an event listener for the first and last items in each of the nav panels
// $('nav.nu__mainmenu').on('focus','a.js__closepanelend',function(e){
// 	blurNavPanels();
// });
//
// $('nav.nu__mainmenu').on('focus','a.js__closepanelstart',function(e){
// 	blurNavPanels();
// });
d("nav.nu__mainmenu").on("click","a.js__mainmenu-item",function(i){i.preventDefault(),i.stopPropagation();var n=i.type;if("click"!=n||navPanelInMotion)if("focusin"!=n||navPanelInMotion)"focusout"!=n||navPanelInMotion||(navPanelInMotion=!0);
// need to reset the first item in the supernav and iamnav menu to be active
else{navPanelInMotion=!0,a();var t=d(this);setTimeout(function(){e(t)},100)}else// this is for a click
navPanelInMotion=!0,
// determine which nav we are looking at and whether it is the currently active one, in which case close it
null==cNav?// if no menu is currently open
e(d(this)):d(this).attr("id")==cNav?// if we have clicked the same menu item again after it was open
s(d(this)):(// if we have clicked another menu item while one was already open
a(),e(d(this)));o(),
// if we are on the search page, we need to restrict opening the search again on top of itself
d("body").hasClass("search")&&d("#nu__search-toggle").removeClass("active")}),d("nav.nu__mainmenu").on("click","div#nu__supernav,div#nu__searchbar,div#nu__iamnav",function(i){0<=["nu__supernav","nu__searchbar","nu__iamnav"].indexOf(i.target.id)&&(d("nav a.js__mainmenu-item").each(function(i){// force all of them closed/clear
d(this).removeClass("active").blur().next("div").removeClass("open")}),
// we need to hide the dropdown sneezeguard
d(".js-dropdown-sneezeguard").css({height:"0"}),cNav=null,t())}),
// if we focus on a main nav item that is NOT a dropdown, we still want to close any open dropdown
d("ul.dropdowns").on("focus mouseover","li.js-single",function(i){d("ul.dropdowns > li > ul").hide(),d("ul.dropdowns > li.js-dropdown").find("a").removeClass("open")}),
// this will handle the new dropdown system for items outside the hamburger menu
d("ul.dropdowns").on("focus mouseover","li.js-dropdown",function(i){d("ul.dropdowns > li > ul").hide(),n(d(this))}),
// use this if we want to tab through all of the sub items
d("ul.dropdowns").on("mouseout","li.js-dropdown",function(i){d("ul.dropdowns > li.js-dropdown").find("ul > li > a").attr("tabindex","-1"),d("ul.dropdowns > li.js-dropdown").find("ul").hide(),d("ul.dropdowns > li.js-dropdown").find("a").removeClass("open")}),d("div.navigational > section > div.items > ul > li:not(.featured)").focus(function(i){l(d(this))}),d(document).on("keydown","html",function(i){
// if one of the dropdowns is open, then we can use arrow keys to nav up and down the options
"false"==d("#dropdown-admissions").find("ul").attr("aria-hidden")&&(
// listen for the arrow press up and down here
38==i.which?i.preventDefault():40==i.which&&i.preventDefault()),
// if one of the super nav options is open
!0!==d("#nu__search-toggle").hasClass("active")&&!0!==d("#nu__supernav-toggle").hasClass("active")||27==i.which&&(d(".js-dropdown-sneezeguard").css({height:"0"}),// close the sneezeguard protecting the other menu items
d("nav a.js__mainmenu-item").each(function(i){// force all of them closed/clear
d(this).hasClass("active")?d(this).focus():d(this).blur(),d(this).removeClass("active").next("div").removeClass("open"),d(this).next("div").find("div.items > ul").attr("aria-hidden","true").attr("tabindex","-1"),d(this).next("div").find("div.items > ul > li").attr("tabindex","-1")}),cNav=null,o())}),
// let's listen for the page to resize and handle some events
d(window).on("resize",function(){
// setMenuPanels();
// need to account for the alerts being open and shift the main menu overlays down to match!!
// if(parseInt($('#nu__alerts').height()) > 0){
// $('#nu__supernav,#nu__iamnav,#nu__searchbar').css({'top':parseInt($('header').outerHeight())});
// }
// reset the navigation panels
o(),
// reset the height of the menu panels
i()})})}(this,jQuery);