//
// WP link additions
//
// Import this file using the following HTML or equivalent:
// <script src="dist/js/vendor/wp/wplink-additions.min.js" type="text/javascript"></script>
//
(function( $ ) {
	$( document ).ready(
		function() {
			var wpLinkGetAttrs = wpLink.getAttrs;
			var wpLinkRefresh = wpLink.refresh;

			$( '#wp-link-wrap .wp-link-text-field' ).show();
			$( '#wp-link .query-results' ).css( 'top', '210px' );

			$(
				'<div class="link-button" style="margin: 0 0 -15px 3px;">' +
				'<label><span> </span><input type="checkbox" id="wp-link-button" /> ' + objectL10n.make_button + '</label>' +
				'</div>'
			).insertAfter( '#wp-link .link-target' );

			wpLink.getAttrs = function() {
				var attributes = wpLinkGetAttrs.apply( wpLinkGetAttrs );

				attributes.class = $( '#wp-link-button' ).is( ':checked' ) ? 'button' : '';

				return attributes;
			};

			wpLink.refresh = function() {
				if ( wpLink.isMCE() ) {
					wpLinkRefresh.apply( wpLinkRefresh );

					var editor = window.tinymce.get( window.wpActiveEditor );
					var linkNode = editor.dom.getParent( editor.selection.getNode(), 'a[href]' );

					$( '#wp-link-button' ).prop( 'checked', 'button' === editor.dom.getAttrib( linkNode, 'class' ) );
				}
			};
		}
	);
})( jQuery );
