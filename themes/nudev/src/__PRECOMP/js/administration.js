// this file is the JS for the administration page ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file


(function(root,$,undefined){
	"use strict";

	$(function(){

		// this will handle expanding and contracting the bios on the SLT page of administration
		$('section.nu__slt').on("click","a.js__readmore",function(e){

			e.preventDefault();

			var thisLink = $(this);
			var thisId = "#profile_"+$(this).attr("id");
			var thisProfile = $(this).parent().parent();
			var offSet = ($("header").height() + 30);

			if(thisProfile.find('p').last().css('display') == 'none'){	// if nothing is currently open

				// hide any currently open p tags for other bios
				$('div.description').find('p').removeClass('open');
				$('div.description').find('a.js__readmore').find('span').html('More');

				// set this item up to be open
				thisProfile.find('p').addClass('open');
				thisLink.find('span').html('Less');

			}else{	// trying to close the expanded view
				thisProfile.find('p').removeClass('open');
				thisLink.find('span').html('More');
			}

			// force the page to move to the top of the bio that was selected, and offset a little bit
			$("html,body").animate({ scrollTop: $(thisId).offset().top - offSet }, 500);

    });

  });
}(this,jQuery));
