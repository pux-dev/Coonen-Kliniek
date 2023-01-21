//
// Main
//
// Import this file using the following HTML or equivalent:
// <script src="dist/js/main.min.js" type="text/javascript"></script>
//
jQuery(document).ready(
	function ($) {

		if (typeof $.mmenu === 'function') {
			$('#nav').mmenu(
				{}, {
				clone: true
			}
			);
		}



		$(".voorhoofdrimpel").hover(
			function () {
				$(this).addClass('hover');
			},
			function () {
				$(this).removeClass('hover');
			}
		);


	}
);
