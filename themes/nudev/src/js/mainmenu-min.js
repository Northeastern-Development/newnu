// this file is the JS for the main menu ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file
var cNav=null,navPanelInMotion=!1;!function(n,l,i){"use strict";l(function(){
// set the height of menu panels if we made it this far, used to augment the CSS
function n(){getContentAreaHeight(),l("div.navigational > section > div.items").css({height:contentAreaHeight,"min-height":contentAreaHeight}),l("body").hasClass("search")&&l("#nu__search section").css({"min-height":contentAreaHeight})}
// this function will handle opening a specific nav panel
function t(n){n.addClass("active").focus().next("div").addClass("open"),n.next("div").find("form input").focus(),n.next("div").find("div.items > ul").attr("aria-hidden","false"),n.next("div").find("div.items > ul > li:not(.sectiontitle)").first().focus(),n.next("div").find("div.items > ul > li:not(.sectiontitle)").attr("tabindex","1"),
// we need to reveal the dropdown sneezeguard
l(".js-dropdown-sneezeguard").css({height:"100%"}),
// set the id of the now open nav panel
cNav=n.attr("id")}
// this function will handle closing the same nav panel
function a(n){n.removeClass("active").next("div").removeClass("open"),n.next("div").find("div.items ul").attr("aria-hidden","true"),n.next("div").find("div.items > ul > li:not(.sectiontitle)").attr("tabindex","-1"),cNav=null,
// we need to hide the dropdown sneezeguard
l(".js-dropdown-sneezeguard").css({height:"0"})}
// this function will handle closing a specific nav panel
function s(){l("nav a.js__mainmenu-item").each(function(n){// force all of them closed/clear
l(this).removeClass("active").blur().next("div").removeClass("open"),l(this).next("div").find("div.items > ul").attr("aria-hidden","true"),l(this).next("div").find("div.items > ul > li:not(.sectiontitle)").attr("tabindex","-1")}),
// we need to hide the dropdown sneezeguard
l(".js-dropdown-sneezeguard").css({height:"0"}),cNav=null,o()}
// this will handle resetting the nav panels
function o(){
// every state has to reset the first items from being active
l("#nu__supernav > section > div > ul > li.active").removeClass("active"),l("#nu__supernav > section > div > ul > li").first().addClass("active"),740<windowSize[1]&&// above break size, show first cat automagically
l("#nu__supernav > section > div > ul > li:first-child").addClass("active"),e(),setTimeout(function(){navPanelInMotion=!1},100)}
// if the user clicks outside the menu items and on the empty portion of the fullscreen sneezeguard, close the nav panels
// this will perform the hide and show of the dropdowns
function i(n){l("ul.dropdowns > li.js-dropdown").find("a").removeClass("open"),"none"==n.find("ul").css("display")&&(n.find("ul").show(),n.find("a").addClass("open"),
// turning this on makes the tab go through each drop down menu item, comment out for arrow up/down
n.find("ul > li > a").attr("tabindex","0"))}
// this function will determine whether or not to allow the page to scroll, if the menu is open or not
function e(){
// prevent the main page from scrolling when the nav is open or allow it if we close the navs
!0===l("#nu__search-toggle").hasClass("active")||!0===l("#nu__supernav-toggle").hasClass("active")?l("html").css({"overflow-y":"hidden"}):l("html").css({"overflow-y":"scroll"})}
// this will handle pressing enter on a nav category
// this is the function that will actually change the category
function d(n){
// we need to handle activating the correct aria-hidden values as we change categories
n.parent().find("li ul").attr("aria-hidden","true"),n.parent().find("li ul li").attr("tabindex","-1"),n.find("ul").first().attr("aria-hidden","false"),n.find("ul li:not(.sectiontitle)").attr("tabindex","1"),l("div.navigational > section > div > ul li").removeClass("active"),n.addClass("active")}
// this is the event listener for the user to press esc to close the menu panels
n(),
// we need to perform some tweaks to the site if we are below the break size on load
windowSize[1]<740&&o(),
// need to account for the alerts being open and shift the main menu overlays down to match!!
0<parseInt(l("#nu__alerts").height())&&l("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt(l("#nu__alerts").outerHeight())}),
// we need to have an event listener for the first and last items in each of the nav panels
l("nav.nu__mainmenu").on("focus","a.js__closepanelend",function(n){s()}),l("nav.nu__mainmenu").on("focus","a.js__closepanelstart",function(n){s()}),l("nav.nu__mainmenu").on("click","a.js__mainmenu-item",function(n){n.preventDefault(),n.stopPropagation();var i=n.type;if("click"!=i||navPanelInMotion)if("focusin"!=i||navPanelInMotion)"focusout"!=i||navPanelInMotion||(navPanelInMotion=!0);
// need to reset the first item in the supernav and iamnav menu to be active
else{navPanelInMotion=!0,s();var e=l(this);setTimeout(function(){t(e)},100)}else// this is for a click
navPanelInMotion=!0,
// determine which nav we are looking at and whether it is the currently active one, in which case close it
null==cNav?// if no menu is currently open
t(l(this)):l(this).attr("id")==cNav?// if we have clicked the same menu item again after it was open
a(l(this)):(// if we have clicked another menu item while one was already open
s(),t(l(this)));o(),
// if we are on the search page, we need to restrict opening the search again on top of itself
l("body").hasClass("search")&&l("#nu__search-toggle").removeClass("active")}),l("nav.nu__mainmenu").on("click","div#nu__supernav,div#nu__searchbar,div#nu__iamnav",function(n){0<=["nu__supernav","nu__searchbar","nu__iamnav"].indexOf(n.target.id)&&(l("nav a.js__mainmenu-item").each(function(n){// force all of them closed/clear
l(this).removeClass("active").blur().next("div").removeClass("open")}),
// we need to hide the dropdown sneezeguard
l(".js-dropdown-sneezeguard").css({height:"0"}),cNav=null,e())}),
// if we focus on a main nav item that is NOT a dropdown, we still want to close any open dropdown
l("ul.dropdowns").on("focus mouseover","li.js-single",function(n){l("ul.dropdowns > li > ul").hide(),l("ul.dropdowns > li.js-dropdown").find("a").removeClass("open")}),
// this will handle the new dropdown system for items outside the hamburger menu
l("ul.dropdowns").on("focus mouseover","li.js-dropdown",function(n){l("ul.dropdowns > li > ul").hide(),i(l(this))}),
// use this if we want to tab through all of the sub items
l("ul.dropdowns").on("mouseout","li.js-dropdown",function(n){l("ul.dropdowns > li.js-dropdown").find("ul > li > a").attr("tabindex","-1"),l("ul.dropdowns > li.js-dropdown").find("ul").hide(),l("ul.dropdowns > li.js-dropdown").find("a").removeClass("open")}),l("div.navigational > section > div.items > ul > li:not(.featured)").focus(function(n){d(l(this))}),l(document).on("keydown","html",function(n){
// if one of the dropdowns is open, then we can use arrow keys to nav up and down the options
"false"==l("#dropdown-admissions").find("ul").attr("aria-hidden")&&(
// listen for the arrow press up and down here
38==n.which?n.preventDefault():40==n.which&&n.preventDefault()),
// if one of the super nav options is open
!0!==l("#nu__search-toggle").hasClass("active")&&!0!==l("#nu__supernav-toggle").hasClass("active")||27==n.which&&(l(".js-dropdown-sneezeguard").css({height:"0"}),// close the sneezeguard protecting the other menu items
l("nav a.js__mainmenu-item").each(function(n){// force all of them closed/clear
l(this).hasClass("active")?l(this).focus():l(this).blur(),l(this).removeClass("active").next("div").removeClass("open"),l(this).next("div").find("div.items > ul").attr("aria-hidden","true").attr("tabindex","-1"),l(this).next("div").find("div.items > ul > li").attr("tabindex","-1")}),cNav=null,o())}),
// let's listen for the page to resize and handle some events
l(window).on("resize",function(){n(),
// need to account for the alerts being open and shift the main menu overlays down to match!!
0<parseInt(l("#nu__alerts").height())&&l("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt(l("header").outerHeight())}),
// reset the navigation panels
o()})})}(this,jQuery);