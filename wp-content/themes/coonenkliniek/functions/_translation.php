<?php

if ( function_exists( 'pll_register_string' ) ) {
	// Set translation mechanism to `pll` when
	// the Polylang plugin is activated
	define( 'TRANSLATION_PLUGIN', 'pll' );
} elseif ( function_exists( 'icl_register_string' ) ) {
	// Set translation mechanism to `wpml` when
	// the WPML plugin is activated
	define( 'TRANSLATION_PLUGIN', 'wpml' );
} else {
	// When no translation plugins are activated
	// use the default WP translation mechanism
	define( 'TRANSLATION_PLUGIN', 'wp' );
}

/**
 * Echo the __t() function output
 * More information about __t() below...
 *
 * @param  string $string    The string to translate
 * @param  mixed  $variables Array with variables or false if no variables
 *
 * @return string             Translated string
 */
function _t( $string, $variables = false ) {
	echo __t( $string, $variables );
}

/**
 * Custom translation function this function will load string translation from WPML or
 * Polylang when they are activated. The function defaults to the default WP translation system
 *
 * @param  string $string    The string to translate
 * @param  mixed  $variables Array with variables or false if no variables
 *
 * @return string             Translated string
 */
function __t( $string, $variables = false ) {
	if ( TRANSLATION_PLUGIN == 'wpml' ) {
		$translation = apply_filters( 'wpml_translate_single_string', $string, TEXTDOMAIN, $string );

		if ( $translation == $string ) {
			do_action( 'wpml_register_single_string', TEXTDOMAIN, $string, $string );
		}

		if ( $variables ) {
			$translation = vsprintf( apply_filters( 'wpml_translate_single_string', $string, TEXTDOMAIN, $string ), $variables );
		}

		return $translation;
	} elseif ( TRANSLATION_PLUGIN == 'pll' ) {
		pll_register_string( TEXTDOMAIN, $string );

		if ( $variables ) {
			$string = vsprintf( pll__( $string ), $variables );

			return $string;
		} else {
			return pll__( $string );
		}
	} else {
		if ( $variables ) {
			$string = vsprintf( __( $string, TEXTDOMAIN ), $variables );

			return $string;
		} else {
			return __( $string, TEXTDOMAIN );
		}
	}
}
