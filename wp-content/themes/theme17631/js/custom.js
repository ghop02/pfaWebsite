// Rewritten version
// By @mathias, @cheeaun and @jdalton

(function(doc) {

var addEvent = 'addEventListener',
type = 'gesturestart',
qsa = 'querySelectorAll',
scales = [1, 1],
meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];

function fix() {
meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
doc.removeEventListener(type, fix, true);
}

if ((meta = meta[meta.length - 1]) && addEvent in doc) {
fix();
scales = [.25, 1.6];
doc[addEvent](type, fix, true);
}

}(document));

jQuery(document).ready(function(){
													 
// ---------------------------------------------------------
// Tabs
// ---------------------------------------------------------
jQuery(".tabs").each(function(){

		jQuery(this).find(".tab").hide();
		jQuery(this).find(".tab-menu li:first a").addClass("active").show();
		jQuery(this).find(".tab:first").show();

});

jQuery(".tabs").each(function(){

		jQuery(this).find(".tab-menu a").click(function() {

				jQuery(this).parent().parent().find("a").removeClass("active");
				jQuery(this).addClass("active");
				jQuery(this).parent().parent().parent().parent().find(".tab").hide();
				var activeTab = jQuery(this).attr("href");
				jQuery(activeTab).fadeIn();
				return false;

		});

});


// ---------------------------------------------------------
// Toggle
// ---------------------------------------------------------

jQuery(".toggle").each(function(){

		jQuery(this).find(".box").hide();

});

jQuery(".toggle").each(function(){

		jQuery(this).find(".trigger").click(function() {

				jQuery(this).toggleClass("active").next().stop(true, true).slideToggle("normal");

				return false;

		});

});



jQuery(".recent-posts li.team:nth-child(5n), .line .grid_6:nth-child(4n), .post_list.testi li:nth-child(3n), .post_list.partners li:nth-child(5n)").addClass("nomargin");



// ---------------------------------------------------------
// Social Icons
// ---------------------------------------------------------

jQuery(".social-networks li a").tooltip({ effect: 'slide', position: 'bottom center', opacity: .5 });

// ---------------------------------------------------------
// BlackAndWhite
// ---------------------------------------------------------

jQuery(function(){
    jQuery('.post_list.testi .featured-thumbnail a, .post_list.partners .featured-thumbnail a').BlackAndWhite({
        hoverEffect : true,
        webworkerPath : false,
        responsive:true,
        speed: {
            fadeIn: 200,
            fadeOut: 800 
        }
    });
});

// ---------------------------------------------------------
// Back to Top
// ---------------------------------------------------------

// fade in #back-top
jQuery(function () {
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('#back-top').fadeIn();
		} else {
			jQuery('#back-top').fadeOut();
		}
	});

	// scroll body to 0px on click
	jQuery('#back-top a').click(function () {
		jQuery('body,html').stop(false, false).animate({
			scrollTop: 0
		}, 800);
		return false;
	});
});


});