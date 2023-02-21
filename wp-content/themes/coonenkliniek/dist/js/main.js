jQuery(document).ready(function ($) {
	if (typeof $.mmenu === 'function') {

		$('#mobilemenu').mmenu({
			offCanvas: {
				position: 'right',
			},
		}, {
			clone: false,
		});
	}

	// Sticky header
	$(window).scroll(function () {
		if ($(this).scrollTop() > 5) {
			$('#headerCntr').addClass('sticky');
		} else {
			$('#headerCntr').removeClass('sticky');
		}
	});

	$('.testimonials-carrousel').owlCarousel({
		loop: true,
		nav: false,
		margin: 10,
		items: 1,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},

		}
	})
	var testimonialCarrousel = $('.testimonials-carrousel');
	testimonialCarrousel.owlCarousel();
	// Go to the next item
	$('.testimonials .next').click(function () {
		testimonialCarrousel.trigger('next.owl.carousel');
	})
	// Go to the previous item
	$('.testimonials .prev').click(function () {
		// With optional speed parameter
		// Parameters has to be in square bracket '[]'
		testimonialCarrousel.trigger('prev.owl.carousel', [300]);
	})




});



