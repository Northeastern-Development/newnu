!function(t,e,i){"use strict";e(function(){e("section.nu__filters.hotswap").on("click","a",function(t){if(t.preventDefault(),!e(this).hasClass("active")){var i=e(this),s=i.attr("data-campus");e("section.nu__filters a.active").removeClass("active"),e("section.leftright > div > div.content,section.leftright > div > div.image").fadeOut(150,function(){e("section.leftright > div").empty(),e.post("/wp-content/themes/nudev/src/loops/loop-experiencecampus.php",{campus:s},function(t){i.addClass("active"),e("section.leftright > div").html(t)})})}})})}(this,jQuery);