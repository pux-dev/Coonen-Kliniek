<?php

/**
 * Get the current URL
 */
function get_current_url() {
	global $wp;

	$current_url = add_query_arg( esc_url( $_SERVER['QUERY_STRING'] ), '', home_url( $wp->request ) );

	if ( substr( $current_url, - 1 ) != '/' && strpos( $current_url, '?' ) === false ) {
		$current_url = $current_url . '/';
	}

	return $current_url;
}

/**
 * Shorthand code for echo get_current_url();
 */
function the_current_url() {
	echo get_current_url();
}
