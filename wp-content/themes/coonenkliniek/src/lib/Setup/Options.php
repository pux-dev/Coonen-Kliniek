<?php

namespace Theme\Setup;

/**
 * Class Options
 *
 * @package Theme\Setup
 */
class Options {
	/**
	 * Options constructor
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'theme_option_pages' ] );
	}

	/**
	 * Define additional option pages
	 * based on ACF to the WP admin
	 */
	public function theme_option_pages() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page( [
				'page_title' => __t( 'Thema Opties' ),
				'menu_title' => __t( 'Thema Opties' ),
				'menu_slug'  => 'options-theme',
				'capability' => 'edit_posts',
			] );
		}

		if ( function_exists( 'acf_add_options_sub_page' ) ) {
			acf_add_options_sub_page( [
				'page_title' => __t( 'Algemeen' ),
				'menu_title' => __t( 'Algemeen' ),
				'menu_slug'  => 'options-theme-general',
				'parent'     => 'options-theme',
				'capability' => 'edit_posts',
			] );
		}
	}
}
