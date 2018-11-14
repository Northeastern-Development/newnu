// this file is the JS for the main menu ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file
var cNav=null;!function(i,s,e){"use strict";s(function(){
// set the height of menu panels if we made it this far, used to augment the CSS
function i(){getContentAreaHeight(),s("div.navigational > section > div.items").css({height:contentAreaHeight,"min-height":contentAreaHeight}),s("body").hasClass("search")&&s("#nu__search section").css({"min-height":contentAreaHeight})}
// this will handle resetting the nav panels
function e(){
// every state has to reset the first items from being active
s("#nu__supernav > section > div > ul > li.active").removeClass("active"),
// $('#nu__supernav > section > div > ul > li').attr('tabindex','-1');
// $('#nu__iamnav > section > div > ul > li.active').removeClass('active');
s("#nu__supernav > section > div > ul > li").first().addClass("active"),740<windowSize[1]&&// above break size, show first cat automagically
s("#nu__supernav > section > div > ul > li:first-child").addClass("active"),
// if(!$('body').hasClass('home')){
t()}
// if the user clicks outside the menu items and on the empty portion of the fullscreen sneezeguard, close the nav panels
// $('ul.dropdowns').on('keyup','li.js-dropdown',function(e){
// 	if(e.which == 13){	// pressed the escape key
// 		openCloseDropdown($(this));
// 	}
// });
// this will perform the hide and show of the dropdowns
function n(i){
// console.log(a.attr('aria-hidden'));
"true"==i.attr("aria-hidden")&&(
// a.focus();
// console.log(a);
i.find("ul").show().attr("aria-hidden","false"),
// a.attr('aria-hidden','false');
// turning this on makes the tab go through each drop down menu item, comment out for arrow up/down
i.find("ul > li > a").attr("tabindex","0"));
// else{
// 	a.attr('aria-hidden','true');
// // 	a.find('ul').hide();
// // 	// a.find().attr('tabindex','-1');
// }
}
// this function will determine whether or not to allow the page to scroll, if the menu is open or not
function t(){
// prevent the main page from scrolling when the nav is open or allow it if we close the navs
// if($('input#nu__search-toggle').prop('checked') || $('input#nu__iamnav-toggle').prop('checked') || $('input#nu__supernav-toggle').prop('checked')){
!0===s("#nu__search-toggle").hasClass("active")||!0===s("#nu__supernav-toggle").hasClass("active")?s("html").css({"overflow-y":"hidden"}):s("html").css({"overflow-y":"scroll"})}
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
function a(i){
// console.log(a.parent);
// we need to handle activating the correct aria-hidden values as we change categories
i.parent().find("li ul").attr("aria-hidden","true"),i.parent().find("li ul li").attr("tabindex","-1"),i.find("ul").first().attr("aria-hidden","false"),i.find("ul li").attr("tabindex","1"),
// if we are clicking on cats in the iamnav, we may need to swap the background image
// if(a.parent().parent().parent().parent().attr('id') == 'nu__iamnav' && iamnavbgs.length > 0 && iamnavbgs[0] != ''){
// 	$('div#nu__iamnav').attr('style','background-image: url('+iamnavbgs[a.index()]+');');
// }
s("div.navigational > section > div > ul li").removeClass("active"),i.addClass("active")}
// this is the event listener for the user to press esc to close the menu panels
// $(document).keydown(function(e){
i(),
// we need to perform some tweaks to the site if we are below the break size on load
windowSize[1]<740&&e(),
// need to account for the alerts being open and shift the main menu overlays down to match!!
0<parseInt(s("#nu__alerts").height())&&s("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt(s("#nu__alerts").outerHeight())}),
// gather up the background images for the iam nav categories
// $.post("/wp-content/themes/nudev/src/iamnavbgs.php",function(data){
// 	iamnavbgs = JSON.parse(data);
// });
// NEW A TAG VERSION
// this will handle the click of main menu items as well as some preventitive measures regarding overlap of options
s("nav").on("click","a.js__mainmenu-item",function(i){
// prevent the default link action
i.preventDefault(),console.log(i),
// determine which nav we are looking at and whether it is the currently active one, in which case close it
null==cNav?(// if no menu is currently open
// $(this).addClass('active').focus().html('Close').next('div').addClass('open');
s(this).addClass("active").focus().next("div").addClass("open"),s(this).next("div").find("div.items > ul").attr("aria-hidden","false"),s(this).next("div").find("div.items > ul > li").first().focus(),s(this).next("div").find("div.items > ul > li").attr("tabindex","1"),
//$(this).next('div').find('div.items > ul > li > ul').first().attr('aria-hidden','false');
// we need to reveal the dropdown sneezeguard
s(".js-dropdown-sneezeguard").css({height:"100%"}),cNav=s(this).attr("id")):s(this).attr("id")==cNav?(// if we have clicked the same menu item again after it was open
// $(this).removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');
s(this).removeClass("active").blur().next("div").removeClass("open"),s(this).next("div").find("div.items ul").attr("aria-hidden","true"),s(this).next("div").find("div.items > ul > li").attr("tabindex","-1"),cNav=null,
// we need to hide the dropdown sneezeguard
s(".js-dropdown-sneezeguard").css({height:"0"})):(// if we have clicked another menu item while one was already open
s("nav a.js__mainmenu-item").each(function(i){// force all of them closed/clear
// $(this).removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');
s(this).removeClass("active").blur().next("div").removeClass("open"),s("div.items > ul").attr("aria-hidden","true")}),
// $(this).addClass('active').html('Close').focus().next('div').addClass('open');  // activate the one that was selected
s(this).addClass("active").focus().next("div").addClass("open"),// activate the one that was selected
s(this).next("div").find("div.items ul").attr("aria-hidden","true"),s(this).next("div").find("div.items > ul > li").first().focus(),cNav=s(this).attr("id")),
// need to reset the first item in the supernav and iamnav menu to be active
e(),
// if we are on the search page, we need to restrict opening the search again on top of itself
s("body").hasClass("search")&&s("#nu__search-toggle").removeClass("active")}),s("nav.nu__mainmenu").on("click","div#nu__supernav,div#nu__searchbar,div#nu__iamnav",function(i){0<=["nu__supernav","nu__searchbar","nu__iamnav"].indexOf(i.target.id)&&(s("nav a.js__mainmenu-item").each(function(i){// force all of them closed/clear
// $(this).removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');
s(this).removeClass("active").blur().next("div").removeClass("open")}),
// we need to hide the dropdown sneezeguard
s(".js-dropdown-sneezeguard").css({height:"0"}),cNav=null,t())}),
// if we focus on a main nav item that is NOT a dropdown, we still want to close any open dropdown
s("ul.dropdowns").on("focus mouseover","li.js-single",function(i){
// $('ul.dropdowns').on('click','li.js-dropdown',function(e){
s("ul.dropdowns > li > ul").attr("aria-hidden","true"),s("ul.dropdowns > li > ul").hide()}),
// this will handle the new dropdown system for items outside the hamburger menu
s("ul.dropdowns").on("focus mouseover","li.js-dropdown",function(i){
// $('ul.dropdowns').on('click','li.js-dropdown',function(e){
s("ul.dropdowns > li > ul").hide(),s("ul.dropdowns > li > ul").attr("aria-hidden","true"),n(s(this))}),
// $('ul.dropdowns').on('blur mouseout','li.js-dropdown',function(e){	// use this if we want to tab through all of the sub items
s("ul.dropdowns").on("mouseout","li.js-dropdown",function(i){s("ul.dropdowns > li.js-dropdown").attr("aria-hidden","true"),s("ul.dropdowns > li.js-dropdown").find("ul > li > a").attr("tabindex","-1"),s("ul.dropdowns > li.js-dropdown").find("ul").hide(),s("ul.dropdowns > li.js-dropdown > ul").attr("aria-hidden","true")}),s("div.navigational > section > div.items > ul > li:not(.featured)").focus(function(i){
//if(e.which === 13){ // the user pressed on the enter key
console.log(s(this)),a(s(this))}),s(document).on("keydown","html",function(i){
// console.log(e);
// if(windowSize[1] >= sizeBreak && $('#nu__search-toggle').hasClass('active') === true || $('#nu__supernav-toggle').hasClass('active') === true || $('#nu__iamnav-toggle').hasClass('active') === true){
// if(windowSize[1] >= sizeBreak && $('#nu__search-toggle').hasClass('active') === true || $('#nu__supernav-toggle').hasClass('active') === true){
// console.log('NOTICE: key pressed - '+e.which);
// if one of the dropdowns is open, then we can use arrow keys to nav up and down the options
"false"==s("#dropdown-admissions").find("ul").attr("aria-hidden")&&(
// e.preventDefault();
console.log("NOTICE: key pressed - "+i.which),
// listen for the arrow press up and down here
38==i.which?(i.preventDefault(),
// this is arrow up
console.log("up arrow")):40==i.which&&(i.preventDefault(),
// this is arrow down
console.log("down arrow"))),
// if one of the super nav options is open
!0!==s("#nu__search-toggle").hasClass("active")&&!0!==s("#nu__supernav-toggle").hasClass("active")||27==i.which&&(
// console.log('NOTICE: esc key pressed - '+e.which);
s(".js-dropdown-sneezeguard").css({height:"0"}),// close the sneezeguard protecting the other menu items
s("nav a.js__mainmenu-item").each(function(i){// force all of them closed/clear
// $(this).removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');
s(this).hasClass("active")?s(this).focus():s(this).blur(),s(this).removeClass("active").next("div").removeClass("open"),s(this).next("div").find("div.items > ul").attr("aria-hidden","true").attr("tabindex","-1"),s(this).next("div").find("div.items > ul > li").attr("tabindex","-1")}),cNav=null,
// $('nav a.js__mainmenu-item').removeClass('active');
// $('nav a.js__mainmenu-item').each(function(i){  // force all of them closed/clear
// $('nav a.js__mainmenu-item').removeClass('active').blur().html($(this).attr('data-title')).next('div').removeClass('open');
// 	$(this).removeClass('active').blur().next('div').removeClass('open');
//   $('div.items > ul').attr('aria-hidden','true');
//
// 	// we need to hide the dropdown sneezeguard
// 	$('.js-dropdown-sneezeguard').css({'height':'0'});
// });
e())}),
// let's listen for the page to resize and handle some events
s(window).on("resize",function(){i(),
// need to account for the alerts being open and shift the main menu overlays down to match!!
0<parseInt(s("#nu__alerts").height())&&s("#nu__supernav,#nu__iamnav,#nu__searchbar").css({top:parseInt(s("header").outerHeight())}),
// reset the navigation panels
e()})})}(this,jQuery);