//
// Main
//
// Import this file using the following HTML or equivalent:
// <script src="dist/js/main.min.js" type="text/javascript"></script>
//
jQuery( document ).ready(
	function( $ ) {
		if ( typeof $.magnificPopup === 'object' ) {
			$( '.magnific-popup' ).magnificPopup(
				{
					type: 'image'
				}
			);
		}

		if ( typeof $.mmenu === 'function' ) {
			$( '#nav' ).mmenu(
				{}, {
					clone: true
				}
			);
		}

		$( 'a[href="#top"]' ).on(
			'click', function( event ) {
				event.preventDefault();

				$( 'html, body' ).animate( { scrollTop: '0px' } );
			}
		);

		$('.introduction .button').addClass('button--large');

	}
);
