<?php

/**
 * Possibility to add multiple excerpt styles and lengths to the theme
 *
 * @param  integer $new_length The length of the excerpt
 * @param  string  $new_more   More symbol (example: `...`)
 */
function get_custom_excerpt( $new_length = EXCERPT_LENGTH, $new_more = EXCERPT_MORE ) {
	add_filter( 'excerpt_length', function () use ( $new_length ) {

		return $new_length;
	}, 999 );

	add_filter( 'excerpt_more', function () use ( $new_more ) {

		return $new_more;
	} );

	$output = get_the_excerpt();
	$output = apply_filters( 'wptexturize', $output );
	$output = apply_filters( 'convert_chars', $output );

	return $output;
}

/**
 * Shorthand code for echo get_custom_excerpt();
 *
 * @param int    $new_length
 * @param string $new_more
 */
function the_custom_excerpt( $new_length = EXCERPT_LENGTH, $new_more = EXCERPT_MORE ) {
	echo get_custom_excerpt( $new_length, $new_more );
}
