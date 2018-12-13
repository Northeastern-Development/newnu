// this file is the JS for the main menu ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file
var cNav=null,navPanelInMotion=!1;!function(n,u,i){"use strict";u(function(){
// set the height of menu panels if we made it this far, used to augment the CSS
function n(){getContentAreaHeight(),u("div.navigational > section > div.items").css({height:contentAreaHeight,"min-height":contentAreaHeight}),u("body").hasClass("search")&&u("#nu__search section").css({"min-height":contentAreaHeight})}
// this function will handle opening a specific nav panel
function t(n){
// console.log(a);
n.addClass("active").focus().next("div").addClass("open"),n.next("div").find("form input").focus(),n.next("div").find("div.items > ul").attr("aria-hidden","false"),n.next("div").find("div.items > ul > li:not(.sectiontitle)").first().focus(),n.next("div").find("div.items > ul > li:not(.sectiontitle)").attr("tabindex","1"),
// we need to reveal the dropdown sneezeguard
u(".js-dropdown-sneezeguard").css({height:"100%"}),
// set the id of the now open nav panel
cNav=n.attr("id")}
// this function will handle closing the same nav panel
function a(n){
// $(this).removeClass('active').blur().next('div').removeClass('open');
n.removeClass("active").next("div").removeClass("open"),n.next("div").find("div.items ul").attr("aria-hidden","true"),n.next("div").find("div.items > ul > li:not(.sectiontitle)").attr("tabindex","-1"),cNav=null,
// we need to hide the dropdown sneezeguard
u(".js-dropdown-sneezeguard").css({height:"0"})}
// this function will handle closing a specific nav panel
function s(){u("nav a.js__mainmenu-item").each(function(n){// force all of them closed/clear
u(this).removeClass("active").blur().next("div").removeClass("open"),u(this).next("div").find("div.items > ul").attr("aria-hidden","true"),u(this).next("div").find("div.items > ul > li:not(.sectiontitle)").attr("tabindex","-1")}),
// we need to hide the dropdown sneezeguard
u(".js-dropdown-sneezeguard").css({height:"0"}),cNav=null}
// this will handle resetting the nav panels
function o(){
// every state has to reset the first items from being active
u("#nu__supernav > section > div > ul > li.active").removeClass("active"),
// $('#nu__supernav > section > div > ul > li').attr('tabindex','-1');
// $('#nu__iamnav > section > div > ul > li.active').removeClass('active');
u("#nu__supernav > section > div > ul > li").first().addClass("active"),740<windowSize[1]&&// above break size, show first cat automagically
u("#nu__supernav > section > div > ul > li:first-child").addClass("active"),
// if(!$('body').hasClass('home')){
e(),
// }
// navPanelInMotion = false;
setTimeout(function(){navPanelInMotion=!1},100)}
// if the user clicks outside the menu items and on the empty portion of the fullscreen sneezeguard, close the nav panels
// $('ul.dropdowns').on('keyup','li.js-dropdown',function(e){
// 	if(e.which == 13){	// pressed the escape key
// 		openCloseDropdown($(this));
// 	}
// });
// this will perform the hide and show of the dropdowns
function i(n){
// console.log(a.attr('aria-hidden'));
// if(a.attr('aria-hidden') == 'true'){
// console.log(a.find('ul').css('display'));
"none"==n.find("ul").css("display")&&(
// a.focus();
// console.log(a);
// a.find('ul').show().attr('aria-hidden','false');
n.find("ul").show(),
// a.css({
//
// });
n.find("a").addClass("open"),
// a.attr('aria-hidden','false');
// turning this on makes the tab go through each drop down menu item, comment out for arrow up/down
n.find("ul > li > a").attr("tabindex","0"));
// else{
// 	a.attr('aria-hidden','true');
// // 	a.find('ul').hide();
// // 	// a.find().attr('tabindex','-1');
// }
}
// this function will determine whether or not to allow the page to scroll, if the menu is open or not
function e(){
// prevent the main page from scrolling when the nav is open or allow it if we close the navs
// if($('input#nu__search-toggle').prop('checked') || $('input#nu__iamnav-toggle').prop('checked') || $('input#nu__supernav-toggle').prop('checked')){
!0===u("#nu__search-toggle").hasClass("active")||!0===u("#nu__supernav-toggle").hasClass("active")?u("html").css({"overflow-y":"hidden"}):u("html").css({"overflow-y":"scroll"})}
// this will handle the click on a nav category
// $('div.navigational > section > div.items > ul').on('click','li:not(.featured)',function(e){
//
// 	changeNavCat($(this));
//
//   // // we need to handle activating the correct aria-hidden values as we change categories
//   // $(this).parent().find('li ul').attr('aria-hidden','true');
//   // $(this).find('ul').first().attr('aria-hidden','false');
// 	//
// 	// // if we are clicking on cats in the iamnav, we may need to swap the background image
// 	// if($(this).parent().parent().parent().parent().attr('id') == 'nu__iamnav' && iamnavbgs.length > 0 && iamnavbgs[0] != ''){
// 	// 	$('div#nu__iamnav').attr('style','background-image: url('+iamnavbgs[$(this).index()]+');');
// 	// }
// 	//
// 	// $('div.navigational > section > div > ul li').removeClass('active');
// 	// $(this).addClass('active');
// });
// this will handle pressing enter on a nav category
// $('div.navigational > section > div.items > ul > li:not(.featured)').keydown(function(e){
// this is the function that will actually change the category
function d(n){
// console.log(a.parent);
// we need to handle activating the correct aria-hidden values as we change categories
n.parent().find("li ul").attr("aria-hidden","true"),n.parent().find("li ul li").attr("tabindex","-1"),n.find("ul").first().attr("aria-hidden","false"),n.find("ul li:not(.sectiontitle)").attr("tabindex","1"),
// if we are clicking on cats in the iamnav, we may need to swap the background image
// if(a.parent().parent().parent().parent().attr('id') == 'nu__iamnav' && iamnavbgs.length > 0 && iamnavbgs[0] != ''){
// 	$('div#nu__iamnav').attr('style','background-image: url('+iamnavbgs[a.index()]+');');
// }
u("div.navigational > section > div > ul li").removeClass("active"),n.addClass("active")}
// this is the event listener for the user to press esc to close the menu panels
// $(document).keydown(function(e){
n(),
// we need to perform some tweaks to the site if we are below the break size on load
windowSize[1]<740&&o(),
// need to account for the alerts being open and shift the main menu overlays down to match!!
0<parseInt(u("#nu__alerts").height())&&u("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt(u("#nu__alerts").outerHeight())}),
// gather up the background images for the iam nav categories
// $.post("/wp-content/themes/nudev/src/iamnavbgs.php",function(data){
// 	iamnavbgs = JSON.parse(data);
// });
// NEW A TAG VERSION
// this will handle the click of main menu items as well as some preventitive measures regarding overlap of options
// $('nav').on('click','a.js__mainmenu-item',function(e){
// 	actionMainMenu(e);
// });
// $('nav').on('focus','a.js__mainmenu-item',function(e){
// 	console.log('action!');
// 	actionMainMenu(e);
// });
// $('nav').on('focus : click','a.js__mainmenu-item',function(e){
// $('nav.nu__mainmenu').on('focus','a.js__mainmenu-item',function(e){
// 	console.log(e.type);
// });
// we need this to rpevent the default action fo the a tag
// $('nav.nu__mainmenu').on('click','a.js__mainmenu-item',function(e){
// 	e.preventDefault();
// });
// we need to have an event listener for the first and last items in each of the nav panels
u("nav.nu__mainmenu").on("focus","a.js__closepanelend",function(n){
// console.log('close the panel at the end');
s()}),u("nav.nu__mainmenu").on("focus","a.js__closepanelstart",function(n){
// console.log('close the search panel at the start');
s()}),
// $('nav.nu__mainmenu').on('click : focus','a.js__mainmenu-item',function(e){
// $('nav.nu__mainmenu').on('mousedown focus','a.js__mainmenu-item',function(e){
u("nav.nu__mainmenu").on("click","a.js__mainmenu-item",function(n){
// console.log(e.type);
// need to determine the first/last actionable item in the nav panel, so that we know when the blur on it we can auto-close
// var firstItem = $(this).next('div').find('a').first();
// var lastItem = $(this).next('div').find('a').last();
// console.log(firstItem);
// console.log(lastItem);
n.preventDefault(),n.stopPropagation();var i=n.type;
// console.log(eType);
// if(eType == 'mousedown' && !navPanelInMotion){	// this is for a click
if("click"!=i||navPanelInMotion)if("focusin"!=i||navPanelInMotion)"focusout"!=i||navPanelInMotion||(
// }else if(eType == 'focusout'){
navPanelInMotion=!0);
// need to reset the first item in the supernav and iamnav menu to be active
else{
// }else if(eType == 'focusin'){
navPanelInMotion=!0,s();
// $('nav a.js__mainmenu-item').each(function(i){  // force all of them closed/clear
// 	$(this).removeClass('active').blur().next('div').removeClass('open');
// 	$(this).next('div').find('div.items > ul').attr('aria-hidden','true');
// 	$(this).next('div').find('div.items > ul > li').attr('tabindex','-1');
// });
//
// // we need to hide the dropdown sneezeguard
// $('.js-dropdown-sneezeguard').css({'height':'0'});
//
// cNav = null;
var e=u(this);setTimeout(function(){t(e)},100)}else// this is for a click
// if(eType == 'mousedown'){	// this is for mousedown
// e.preventDefault();
// console.log('mousedown!');
navPanelInMotion=!0,
// determine which nav we are looking at and whether it is the currently active one, in which case close it
null==cNav?// if no menu is currently open
t(u(this)):u(this).attr("id")==cNav?// if we have clicked the same menu item again after it was open
a(u(this)):(// if we have clicked another menu item while one was already open
s(),t(u(this)));o(),
// if we are on the search page, we need to restrict opening the search again on top of itself
u("body").hasClass("search")&&u("#nu__search-toggle").removeClass("active")}),u("nav.nu__mainmenu").on("click","div#nu__supernav,div#nu__searchbar,div#nu__iamnav",function(n){0<=["nu__supernav","nu__searchbar","nu__iamnav"].indexOf(n.target.id)&&(u("nav a.js__mainmenu-item").each(function(n){// force all of them closed/clear
// $(this).removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');
u(this).removeClass("active").blur().next("div").removeClass("open")}),
// we need to hide the dropdown sneezeguard
u(".js-dropdown-sneezeguard").css({height:"0"}),cNav=null,e())}),
// if we focus on a main nav item that is NOT a dropdown, we still want to close any open dropdown
u("ul.dropdowns").on("focus mouseover","li.js-single",function(n){
// $('ul.dropdowns').on('click','li.js-dropdown',function(e){
// $('ul.dropdowns > li > ul').attr('aria-hidden','true');
u("ul.dropdowns > li > ul").hide();
// openCloseDropdown($(this));
}),
// this will handle the new dropdown system for items outside the hamburger menu
u("ul.dropdowns").on("focus mouseover","li.js-dropdown",function(n){
// $('ul.dropdowns').on('click','li.js-dropdown',function(e){
u("ul.dropdowns > li > ul").hide(),
// $('ul.dropdowns > li > ul').attr('aria-hidden','true');
i(u(this))}),
// $('ul.dropdowns').on('blur mouseout','li.js-dropdown',function(e){	// use this if we want to tab through all of the sub items
u("ul.dropdowns").on("mouseout","li.js-dropdown",function(n){
// $('ul.dropdowns > li.js-dropdown').attr('aria-hidden','true');
u("ul.dropdowns > li.js-dropdown").find("ul > li > a").attr("tabindex","-1"),u("ul.dropdowns > li.js-dropdown").find("ul").hide(),u("ul.dropdowns > li.js-dropdown").find("a").removeClass("open")}),u("div.navigational > section > div.items > ul > li:not(.featured)").focus(function(n){
//if(e.which === 13){ // the user pressed on the enter key
// console.log($(this));
d(u(this));
//}
}),u(document).on("keydown","html",function(n){
// console.log(e);
// if(windowSize[1] >= sizeBreak && $('#nu__search-toggle').hasClass('active') === true || $('#nu__supernav-toggle').hasClass('active') === true || $('#nu__iamnav-toggle').hasClass('active') === true){
// if(windowSize[1] >= sizeBreak && $('#nu__search-toggle').hasClass('active') === true || $('#nu__supernav-toggle').hasClass('active') === true){
// console.log('NOTICE: key pressed - '+e.which);
// if one of the dropdowns is open, then we can use arrow keys to nav up and down the options
"false"==u("#dropdown-admissions").find("ul").attr("aria-hidden")&&(
// e.preventDefault();
// console.log('NOTICE: key pressed - '+e.which);
// listen for the arrow press up and down here
38==n.which?n.preventDefault():40==n.which&&n.preventDefault()),
// if one of the super nav options is open
!0!==u("#nu__search-toggle").hasClass("active")&&!0!==u("#nu__supernav-toggle").hasClass("active")||27==n.which&&(
// console.log('NOTICE: esc key pressed - '+e.which);
u(".js-dropdown-sneezeguard").css({height:"0"}),// close the sneezeguard protecting the other menu items
u("nav a.js__mainmenu-item").each(function(n){// force all of them closed/clear
// $(this).removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');
u(this).hasClass("active")?u(this).focus():u(this).blur(),u(this).removeClass("active").next("div").removeClass("open"),u(this).next("div").find("div.items > ul").attr("aria-hidden","true").attr("tabindex","-1"),u(this).next("div").find("div.items > ul > li").attr("tabindex","-1")}),cNav=null,
// $('nav a.js__mainmenu-item').removeClass('active');
// $('nav a.js__mainmenu-item').each(function(i){  // force all of them closed/clear
// $('nav a.js__mainmenu-item').removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');
// 	$(this).removeClass('active').blur().next('div').removeClass('open');
//   $('div.items > ul').attr('aria-hidden','true');
//
// 	// we need to hide the dropdown sneezeguard
// 	$('.js-dropdown-sneezeguard').css({'height':'0'});
// });
o())}),
// let's listen for the page to resize and handle some events
u(window).on("resize",function(){n(),
// need to account for the alerts being open and shift the main menu overlays down to match!!
0<parseInt(u("#nu__alerts").height())&&u("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt(u("header").outerHeight())}),
// reset the navigation panels
o()})})}(this,jQuery);