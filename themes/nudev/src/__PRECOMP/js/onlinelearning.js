// this file is the JS for the homepge ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file


(function(root,$,undefined){
	"use strict";

	$(function(){

		// this will handle changing content for the campuses on the experience page
		$('section.slider > ul').on("click","a",function(e){

			e.preventDefault();

			if(!$(this).hasClass('active')){	// we only want to run the below if clicking on an item other than the current

				var selectedItem = $(this);

				$('section.slider > ul a.active').removeClass('active');	// remove the active class from the current filter

				$('section.slider > article.active').fadeOut(250,function(){		// hide the currently open information to prepare for the selected one to be shown

					selectedItem.addClass('active');

					$('section.slider > article.active').removeClass('active');
					$('section.slider > article#slider-article-'+selectedItem.attr('data-id')).addClass('active');

					$('section.slider > article#slider-article-'+selectedItem.attr('data-id')).fadeIn(250);
				});

			}

    });

  });
}(this,jQuery));
