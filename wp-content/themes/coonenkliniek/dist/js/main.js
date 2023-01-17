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

	// slideToggle animation voor de banner USP
	$('.slidedown .item').click(function () {
		$('.slidedown .item.active').removeClass('active');
		$(this).toggleClass('active');
		$(this).children('.usp-content').slideToggle();
	});

	// FAQ 
	$('.faq li > h4').click(function (e) {
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

	// Scroll to bottom
	$('.scroll-down').on('click', function (e) {
		e.preventDefault();
		var target = $('.content-area');
		$('html, body').animate(
			{
				scrollTop: target.offset().top - 150
			},
			300,
			'linear'
		);
	});// End Scroll to bottom

	// Add Class aan Testimonial om te vergroten
	$('.testimonial .more').click(function () {
		$(this).parent().slideDown().addClass('enlarge');
	});

	//Testimonial Carrousel
	$('.testimonials-carrousel').owlCarousel({
		loop: true,
		nav: false,
		margin: 10,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 3
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

	//Item / Related Carrousel
	$('.item-carrousel').owlCarousel({
		loop: true,
		nav: false,
		margin: 15,
		center: false,
		responsive: {
			0: {
				items: 1,
				center: false,
				margin: 15,
			},
			479: {
				items: 2,
				center: true,
			},
			600: {
				items: 3
			},
			991: {
				items: 4
			}
		}
	})

	var itemCarrousel = $('.item-carrousel');
	itemCarrousel.owlCarousel();
	// Go to the next item
	$('.carrousel .next').click(function () {
		itemCarrousel.trigger('next.owl.carousel');
	})
	// Go to the previous item
	$('.carrousel .prev').click(function () {
		// With optional speed parameter
		// Parameters has to be in square bracket '[]'
		itemCarrousel.trigger('prev.owl.carousel', [300]);
	})

	//Steps carousel	
	$('.steps-carousel').owlCarousel({
		items: 1,
		nav: false,
		dots: true,
		mouseDrag: true,
		autoplay: false,
		mouseDrag: false,
	});


	//Model, subnav
	$('.subnav a[href*="#"]').on('click', (event) => {
		const hash = event.currentTarget.hash;
		if (hash) {
			event.preventDefault();
			$('html, body').animate({ scrollTop: $(hash).offset().top - 200 }, 750);
		}
	});

	var addClassOnScroll = function () {
		var windowTop = $(window).scrollTop();
		$('section[id]').each(function (index, elem) {
			var offsetTop = $(elem).offset().top;
			var outerHeight = $(this).outerHeight(true);

			if (windowTop > (offsetTop - 250) && windowTop < (offsetTop + outerHeight)) {
				var elemId = $(elem).attr('id');
				$("nav ul li a.active").removeClass('active');
				$("nav ul li a[href='#" + elemId + "']").addClass('active');
			}
		});
	};

	$(function () {
		$(window).on('scroll', function () {
			addClassOnScroll();
		});
	});



});



