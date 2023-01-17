//
// MMenu
//
// Import this file using the following HTML or equivalent:
// <script src="dist/js/vendor/mmenu/mmenu.min.js" type="text/javascript"></script>
//
// =require ../../../../bower_components/mmenu/dist/core/js/jquery.mmenu.min.all.js

jQuery( document ).ready(
	function( $ ) {
		if ( typeof $.mmenu === 'function' ) {
			var $nav = $( '#nav' );
			var $nav_link = $( 'a[href="#nav"]' );

			$nav.mmenu(
				{
					offCanvas: {
						position: 'right'
					}
				}, {
					clone: true
				}
			);

			var api = $nav.data( 'mmenu' );

			api.bind(
				'opened', function() {
					$nav_link.addClass( 'header__menu-toggle--active' );
				}
			);

			api.bind(
				'closed', function() {
					$nav_link.removeClass( 'header__menu-toggle--active' );
				}
			);
		}
	}
);
