<?php

/**
 * Easily add multiple classes to objects
 *
 * @param $classes
 */
function css_class( $classes ) {

	echo ' class="' . trim( implode( ' ', $classes ) ) . '"';
}

/**
 * Check if the page is loaded through ajax
 */
function is_ajax_call() {
	if ( ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) {
		return true;
	}

	return false;
}

/**
 * Calculate the size of a file
 * Can be used like `get_size( get_attached_file( $attachment_id ) )`
 *
 * @param $file
 *
 * @return string
 */
function get_size( $file ) {
	$bytes = filesize( $file );
	$s     = [ 'b', 'Kb', 'Mb', 'Gb' ];
	$e     = floor( log( $bytes ) / log( 1024 ) );

	return sprintf( '%.2f ' . $s[ $e ], ( $bytes / pow( 1024, floor( $e ) ) ) );
}

/**
 * Strip a phone number so it can be used in <a href="tel://">
 *
 * @param  string $phone_number The phone number which need to be stripped
 */
function strip_phone_number( $phone_number ) {
	$phone_number = str_replace( ' ', '', $phone_number );
	$phone_number = str_replace( '-', '', $phone_number );
	$phone_number = str_replace( '.', '', $phone_number );
	$phone_number = str_replace( '(0)', '', $phone_number );
	$phone_number = str_replace( '(', '', $phone_number );
	$phone_number = str_replace( ')', '', $phone_number );
	$phone_number = str_replace( '+', '00', $phone_number );

	return $phone_number;
}

/**
 * Easily format prices
 *
 * @param  string  $price The price to format
 * @param  boolean $zeros Do we need to add ,00 or ,-
 */
function format_price( $price, $zeros = true ) {
	$price = str_replace( '.', ',', $price );
	$price = '&euro; ' . $price;

	if ( $zeros === false ) {
		if ( substr( $price, - 3 ) == ',00' ) {
			$price = substr( $price, 0, - 3 ) . ',-';
		}
	}

	return $price;
}
