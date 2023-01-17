<?php

namespace Theme\Setup;

/**
 * Class Placeholders
 *
 * @package Theme\Setup
 */
class Placeholders {
	/**
	 * Placeholders constructor
	 */
	public function __construct() {
		add_filter( 'theme_page_templates', [ $this, 'add_archive_placeholders' ], 10, 3 );
		add_action( 'template_redirect', [ $this, 'redirect_to_archive' ] );
		add_filter( 'theme_page_templates', [ $this, 'add_404_placeholders' ], 10, 3 );
		add_action( 'template_redirect', [ $this, 'redirect_to_404' ] );
	}

	/**
	 * Add custom post types with archives to the page templates so we can create placeholders
	 *
	 * @param $page_templates
	 * @param $instance
	 * @param $post
	 *
	 * @return mixed
	 */
	public function add_archive_placeholders( $page_templates, $instance, $post ) {
		if ( $post && $post->post_type != 'page' ) {
			return $page_templates;
		}

		$post_types = get_post_types( [ '_builtin' => false ] );

		foreach ( $post_types as $post_type ) {
			if ( ( $post_type_object = get_post_type_object( $post_type ) ) != null && $post_type_object->has_archive ) {
				$page_templates[ 'archive_' . $post_type ] = __t( 'Archive - %s', [ $post_type_object->labels->singular_name ] );
			}
		}

		return $page_templates;
	}

	/**
	 * Redirect archive placeholder page to archive url
	 */
	public function redirect_to_archive() {
		if ( is_singular( 'page' ) ) {
			$template = str_replace( 'archive_', '', get_page_template_slug( get_queried_object_id() ) );
			$types    = get_post_types( [ 'has_archive' => true ], 'names' );

			if ( in_array( $template, $types ) ) {
				wp_safe_redirect( get_post_type_archive_link( $template ) );
				exit();
			}
		}
	}

	/**
	 * Give users ability to customize the 404 page
	 *
	 * @param $page_templates
	 * @param $instance
	 * @param $post
	 *
	 * @return mixed
	 */
	public function add_404_placeholders( $page_templates, $instance, $post ) {
		if ( $post && $post->post_type != 'page' ) {
			return $page_templates;
		}

		$page_templates['404'] = __t( '404 - Page not Found' );

		return $page_templates;
	}

	/**
	 * Redirect 404 placeholder page to 404 error
	 */
	public function redirect_to_404() {
		if ( is_singular( 'page' ) && is_page_template( '404' ) ) {
			global $wp_query;

			$wp_query->set_404();

			status_header( 404 );
			get_template_part( 404 );

			exit();
		}
	}
}
