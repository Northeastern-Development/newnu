// this file is the JS for the experience page ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file


(function(root,$,undefined){
	"use strict";

	$(function(){

		// this will handle changing content for the campuses on the experience page
		$('section.nu__filters.hotswap').on("click","a",function(e){

			e.preventDefault();

			if(!$(this).hasClass('active')){	// we only want to run the below if clicking on an item other than the current

				var selectedFilter = $(this);
				var selectedCampus = selectedFilter.attr('data-campus');

				$('section.nu__filters a.active').removeClass('active');	// remove the active class from the current filter

				$('section.leftright > div').fadeOut(200,function(){	// fade out the content and reset it before fading in
					$('section.leftright > div').empty();	// clear out the content to make sure that it is truly gone, before setting it again
					$.post("/wp-content/themes/nudev/src/loops/loop-experiencecampus.php",{"campus":selectedCampus},function(data){
						selectedFilter.addClass('active');	// add the active class to the selected filter option
						$('section.leftright > div').html(data);	// set the new data
						$('section.leftright > div').fadeIn(200);	// fade it back in
					});

				});

			}

    });

  });
}(this,jQuery));
