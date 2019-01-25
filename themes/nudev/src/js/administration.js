// this file is the JS for the administration page ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file
!function(e,o,n){"use strict";o(function(){
// this will handle expanding and contracting the bios on the SLT page of administration
o("section.nu__slt").on("click","a.js__readmore",function(e){e.preventDefault();var n=o(this),i="#profile_"+o(this).attr("id"),s=o(this).parent().parent(),t=o("header").height()+30;"none"==s.find("p").last().css("display")?(// if nothing is currently open
// hide any currently open p tags for other bios
o("div.description").find("p").removeClass("open"),o("div.description").find("a.js__readmore").find("span").html("More"),
// set this item up to be open
s.find("p").addClass("open"),n.find("span").html("Less")):(// trying to close the expanded view
s.find("p").removeClass("open"),n.find("span").html("More")),
// force the page to move to the top of the bio that was selected, and offset a little bit
o("html,body").animate({scrollTop:o(i).offset().top-t},500)})})}(this,jQuery);