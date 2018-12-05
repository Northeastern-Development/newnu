// this file is the JS for the homepge ONLY, it requires the main scripts file to be implemented BEFORE it
// it relies on variables defined within the main scripts file
!function(t,i,a){"use strict";i(function(){
// close the actual takeover panel
function a(){i("div.takeover").fadeOut(250)}
// gather up the rotator panels data and store the object to be used below
// local vars within the home section, we will need to set these to check the main js if it exists and then assign vars if needed
// to prevent errors when used remotely
var t=!1,r=7e3,o=1;
// windowWidth = windowSize[1] * -1;
// var myPanels = document.getElementById('nu__stories');
// var mc = new Hammer(myPanels);
// var aspeeds = (isSafari?1500:1500);
// need to pick a random image for each of the 4 main categories IF they have more than 1 defined
i("div#nu__categories div.bgimage").attr("style",""),i("div#nu__categories div.bgimage").each(function(t){var a=i(this).attr("data-backgrounds").split(",");1<a.length?// if we need to randomize
i(this).attr("style","background-image:url("+a[Math.floor(Math.random()*a.length)]+");"):// if there is only 1 image
i(this).attr("style","background-image:url("+a[0]+");")}),
// need to figure out if we need to remove extra height from the content if alerts are visible
// if(parseInt($('#nu__alerts').height()) > 0){
//   var hpHeight = parseInt(windowSize[0]) - parseInt($('header').height()) - parseInt($('footer').height());
//   $('#nu__homepage').css({'height':hpHeight,'min-height':hpHeight});
// }
// this will listen for a user to close the hp takeover
i("div.takeover").on("click",".nu__close-takeover",function(t){a()}),
// this will auto-close the takeover after specific time period, if value = 0 then it will not autoclose
"block"==i("div.takeover").css("display")&&setTimeout(function(){a()},r),i.post("/wp-content/themes/nudev/src/hprotatordata.php",function(t){rotators=JSON.parse(t),console.log(rotators)}),
// the following handles clicking next and previous arrows within a rotator
// $('div.nu__block-rotator').on("click",".rotate",function(e){
//   var elem = $(this).parent().parent().parent();
//   var id = elem.attr('data-rotatorid');
//   var sCount = parseInt(elem.attr('data-slidemax'));
//   var cSlide = parseInt(elem.attr('data-cslide'));
//   if($(this).hasClass('slider_prev')){
//     contentSwap(parseInt(cSlide - 1) < 1 ?sCount:parseInt(cSlide - 1));
//   }else{
//     contentSwap(parseInt(cSlide + 1) > sCount?1:parseInt(cSlide + 1));
//   }
//
//   // this will actually perform the content swapping for the inner rotators
//   function contentSwap(a){
//     elem.find('div.bgimage,h2,div.nu__overlay-logo').fadeOut(150,function(){	// fade out the rotator content
//       elem.attr('data-cslide',a);	// set the new value of the current slide
// 			elem.find('div.bgimage > div').attr('style','background-image: url('+rotators[id][a][0]+');');	// change the background image
//       elem.find('a').attr('href',rotators[id][a][1]);	// change the link
//       elem.find('a').attr('target',rotators[id][a][5]);	// change the link target style (local or external)
//       elem.find('h2').html('<span>'+rotators[id][a][2]+'</span>');	// change the title of the slide
// 			elem.find('div.nu__overlay-logo').html('');
// 			if(rotators[id][a][4] && rotators[id][a][4] != ''){// swap the overlay logo if we have one otherwise empty
// 				elem.find('div.nu__overlay-logo').html('<img src="'+rotators[id][a][4]+'" alt="overlay logo for '+rotators[id][a][2]+'" />')
// 			}
//
//       elem.find('div.bgimage,h2,div.nu__overlay-logo').fadeIn(150);	// fade it all back in
//     });
//   }
// });
// this will listen for the hover event on the list of news items
i("div.nu__block-rotator").on("focus mouseover","ul > li",function(t){
// what item have they focused on?
var a=i(this);
// we only want to go through these steps if it is an item other than the currently active one
a.attr("data-id")!=o&&(
// remove the active class from all items before setting it on the current one
i("div.nu__block-rotator ul > li").removeClass("active"),
// set active class on the currently focused item
o=a.attr("data-id"),a.addClass("active"),
// now select the image for the news item that was focused
// $('div.nu__block-rotator div.bgimage').fadeOut(100,function(){
// 	$(this).attr('style','background-image: url('+rotators[1][thisE.attr('data-id')][0]+');').fadeIn(100);
// });
i("div.nu__block-rotator div.bgimage").attr("style","background-image: url("+rotators[1][a.attr("data-id")][0]+");"),
// update the info for the read story link (URL and title)
i("div.nu__block-rotator div.bgimage > div.gradient > a").attr("href",rotators[1][a.attr("data-id")][3]),i("div.nu__block-rotator div.bgimage > div.gradient > a").attr("title",'Click to read "'+rotators[1][a.attr("data-id")][1]+'" at northeastern news'),i("div.nu__block-rotator div.bgimage > div.gradient > a").attr("aria-label",'Click to read "'+rotators[1][a.attr("data-id")][1]+'" at northeastern news'),
// update the item tag if there is one, or hide it
i("div.nu__block-rotator h3").fadeOut(100,function(){i(this).empty(),""!=rotators[1][a.attr("data-id")][2]&&i(this).html(rotators[1][a.attr("data-id")][2]).fadeIn(100)}))})})}(this,jQuery);