!function(t,$,a){"use strict";$(function(){function t(){$("div.takeover").fadeOut(250)}var a=!1;windowWidth=-1*windowSize[1];var r=document.getElementById("nu__stories"),e=new Hammer(r),o=(isSafari,1500),i=7e3;if($("div#nu__categories div.bgimage").each(function(t){var a=$(this).attr("data-backgrounds").split(",");a.length>1&&($(this).attr("style",""),$(this).attr("style","background-image:url("+a[Math.floor(Math.random()*a.length)]+");"))}),parseInt($("#nu__alerts").height())>0){var n=parseInt(windowSize[0])-parseInt($("header").height())-parseInt($("footer").height());$("#nu__homepage").css({height:n,"min-height":n})}$("div.takeover").on("click",".nu__close-takeover",function(a){t()}),"block"==$("div.takeover").css("display")&&setTimeout(function(){t()},7e3),$.post("/wp-content/themes/nudev/src/hprotatordata.php",function(t){rotators=JSON.parse(t)}),$("article.nu__block-rotator .rotate").css({display:"block"}),$("div.nu__block-rotator").on("click",".rotate",function(t){function a(t){r.find("div.bgimage,h2,div.nu__overlay-logo").fadeOut(150,function(){r.attr("data-cslide",t),r.find("div.bgimage > div").attr("style","background-image: url("+rotators[e][t][0]+");"),r.find("a").attr("href",rotators[e][t][1]),r.find("a").attr("target",rotators[e][t][5]),r.find("h2").html("<span>"+rotators[e][t][2]+"</span>"),r.find("div.nu__overlay-logo").html(""),rotators[e][t][4]&&""!=rotators[e][t][4]&&r.find("div.nu__overlay-logo").html('<img src="'+rotators[e][t][4]+'" alt="overlay logo for '+rotators[e][t][2]+'" />'),r.find("div.bgimage,h2,div.nu__overlay-logo").fadeIn(150)})}var r=$(this).parent().parent().parent(),e=r.attr("data-rotatorid"),o=parseInt(r.attr("data-slidemax")),i=parseInt(r.attr("data-cslide"));a($(this).hasClass("slider_prev")?parseInt(i-1)<1?o:parseInt(i-1):parseInt(i+1)>o?1:parseInt(i+1))}),$(window).on("resize",function(){})})}(this,jQuery);