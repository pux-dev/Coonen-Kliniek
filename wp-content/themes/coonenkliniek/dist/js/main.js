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


	// Testimonial Carousel
	$('.testimonials-carrousel').owlCarousel({
		loop: true,
		nav: false,
		margin: 10,
		items: 1,
		autoHeight: true,
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

	// Add Class aan Testimonial om te vergroten
	$('.testimonial-content .more').click(function () {
		$(this).parent().slideDown().addClass('enlarge');
		$('.owl-carousel').trigger('refresh.owl.carousel');
	});

	// FAQ 
	$('.faq li > .question').click(function (e) {
		e.preventDefault();
		// hide all span
		var $this = $(this).next('article');

		$(".faq li article").not($this).slideUp();

		if (!$(this).parent().hasClass('active')) {
			$('.faq li').removeClass('active');
			$(this).parent().addClass('active');
			$(this).next('article').slideDown();
		} else {
			$(this).parent().removeClass('active');
			$(this).next('article').slideUp();
		}
	});

});