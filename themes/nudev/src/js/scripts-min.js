!function(n,$,o){"use strict";$(function(){function n(){i[0]=$(window).height(),i[1]=$(window).width(),$.post("/wp-content/themes/nudev/src/windowsize.php",{height:i[0],width:i[1]},function(n){console.log(n)})}function o(){"block"!=$(".js__backtotop").css("display")?$(".js__backtotop").fadeIn(t[0]):$(".js__backtotop").fadeOut(t[0])}function e(){var n=$("#supernav");"0"===n.css("opacity")?(n.css({visibility:"visible",height:"100%"}),n.animate({opacity:1},t[0],function(){$("input#nu__mainmenu-toggle").prop("checked",!0)})):"1"===n.css("opacity")&&n.animate({opacity:0},t[0],function(){n.css({visibility:"hidden",height:"0"}),$("input#nu__mainmenu-toggle").prop("checked",!1)})}var t=Array(200,1e3),i=Array(0,0);n(),$("main").css({"margin-top":$("header").height()}),$("nav").on("click","input#nu__supernav-toggle",function(){$("input#nu__search-toggle").prop("checked",!1)}),$("nav").on("click","input#nu__search-toggle",function(){$("input#nu__supernav-toggle").prop("checked",!1)}),$("nav").on("mouseover","li.nu__menu-iam",function(){$("input#nu__search-toggle").prop("checked",!1),$("input#nu__supernav-toggle").prop("checked",!1)}),$("#nu__supernav > section:nth-child(2) > ul").on("click","li",function(n){$("#nu__supernav > section:nth-child(2) > ul li").removeClass("active"),$(this).addClass("active")}),$("div.nu__footer").on("click",".js_footer-hideshow",function(n){$("footer#nu__global-footer").hasClass("collapse")?$("footer#nu__global-footer").removeClass("collapse"):$("footer#nu__global-footer").addClass("collapse")}),$(window).on("scroll",function(){}),$(window).on("resize",function(){n()}),$("body").on("click touchend",".js__backtotop",function(n){n.preventDefault(),$("html, body").animate({scrollTop:0},t[1],function(){$(".js__backtotop").fadeOut(t[0])})}),$(document).keyup(function(n){77==n.keyCode&&$("#supernav").css("opacity"),27==n.keyCode&&$("#supernav").css("opacity")})})}(this,jQuery);