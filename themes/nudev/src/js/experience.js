// this file is the JS for the homepge ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file
!function(t,s,e){"use strict";s(function(){
// this will handle changing content for the campuses on the experience page
s("section.nu__filters.hotswap").on("click","a",function(t){if(t.preventDefault(),!s(this).hasClass("active")){// we only want to run the below if clicking on an item other than the current
var e=s(this),i=e.attr("data-campus");s("section.nu__filters a.active").removeClass("active"),// remove the active class from the current filter
s("section.leftright div").fadeOut(200,function(){// fade out the content and reset it before fading in
s("section.leftright").empty(),// clear out the content to make sure that it is truly gone, before setting it again
s.post("/wp-content/themes/nudev/src/loops/loop-experiencecampus.php",{campus:i},function(t){e.addClass("active"),// add the active class to the selected filter option
s("section.leftright").html(t),// set the new data
s("section.leftright div").fadeIn(200)})})}})})}(this,jQuery);