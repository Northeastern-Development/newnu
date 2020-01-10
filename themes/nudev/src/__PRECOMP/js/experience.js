// this file is the JS for the experience page ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file


(function(root,$,undefined){
	"use strict";

	$(function(){

		// this will handle changing content for the campuses on the experience page
		$('body.experience').on("click",".js__loadcampus",function(e){

			e.preventDefault();

			if(!$(this).hasClass('active')){	// we only want to run the below if clicking on an item other than the current

				var selectedFilter = $(this);
				var selectedCampus = selectedFilter.attr('data-campus');

				$('section.nu__filters a.active').removeClass('active');	// remove the active class from the current filter

				$('section.leftright > div > div.content > div,section.leftright > div > div.image > div,section.leftright > div > div.campusnextprev > ul').fadeOut(150,function(){
					$.post("/wp-content/themes/nudev/src/loops/loop-experiencecampus.php",{"campus":selectedCampus},function(data){
						$('section.nu__filters a[data-campus="'+selectedCampus+'"]').addClass('active');
						$('section.leftright > div').html(data);	// set the new data
					});
				});
			}

    });

  });
}(this,jQuery));
