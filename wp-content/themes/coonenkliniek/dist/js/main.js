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

	$(".voorhoofdrimpel").hover(
		function () {
			$(this).not(this).addClass('hover');
		},
		function () {
			$(this).not(this).removeClass('hover');
		}
	);



});



