<?php

namespace Theme\Setup;

/**
 * Class Backend
 *
 * @package Theme\Setup
 */
class Backend {
	/**
	 * Backend constructor
	 */
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'theme_setup' ] );
		add_action( 'after_switch_theme', [ $this, 'theme_flush_rewrites' ] );
		add_filter( 'acf/settings/save_json', [ $this, 'acf_json_save_point' ] );
		add_filter( 'acf/settings/load_json', [ $this, 'acf_json_load_point' ] );
		add_action( 'acf/init', [ $this, 'google_api_key' ] );
		add_filter( 'wp_terms_checklist_args', [ $this, 'wp_terms_checklist_args' ] );
		add_action( 'edit_form_after_title', [ $this, 'content_editor_on_page_for_posts_page' ], 0 );
		add_action( 'admin_init', [ $this, 'hide_editor' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'wplink_additions' ], 999 );		
		add_filter( 'http_request_args', [ $this, 'disable_theme_updates' ], 5, 2 );
	}

	/**
	 * General theme set-up
	 */
	public function theme_setup() {
		
		// Remove generator (wp) from <head>
		remove_action( 'wp_head', 'wp_generator' );

		// Render shortcodes in text widgets
		add_filter( 'widget_text', 'do_shortcode' );

		// Add menus
		register_nav_menus( unserialize( MENUS ) );

		// Register language files
		load_theme_textdomain( TEXTDOMAIN, get_template_directory() . '/languages' );

		// Set custom content width
		global $content_width;
		$content_width = apply_filters( 'custom_content_width', 'CONTENT_WIDTH' );

		/* Deze gaf unserialize error
		// Sidebars
		$sidebars = unserialize( 'SIDEBARS' );

		if ( $sidebars ) {
			foreach ( $sidebars as $sidebar ) {
				register_sidebar( $sidebar );
			}
		}*/

		// Theme support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );

		if ( FEATURED_IMAGE === true ) {
			add_theme_support( 'post-thumbnails' );
		}

		// Turn default components into HTML5
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		] );
		
		update_option( 'timezone_string', 'Europe/Amsterdam' );
	}

	/**
	 * Flush the rewrites after switching themes
	 */
	public function theme_flush_rewrites() {
		flush_rewrite_rules();
	}

	/**
	 * Update the ACF json saving path
	 *
	 * @param $path
	 *
	 * @return string
	 */
	public function acf_json_save_point( $path ) {
		$path = get_template_directory() . '/src/field-groups';

		return $path;
	}

	/**
	 * Update teh ACF json loading path
	 *
	 * @param $paths
	 *
	 * @return array
	 */
	public function acf_json_load_point( $paths ) {
		// Remove original path (acf-json)
		unset( $paths[0] );

		// Updated path
		$paths[] = get_template_directory() . '/src/field-groups';

		return $paths;
	}

	/**
	 * It may be necessary to register a Google API key in order to allow the Google API to load correctly.
	 * The API key can be set in the Theme options
	 */
	public function google_api_key() {
		acf_update_setting( 'google_api_key', get_field( 'google_api_key', 'option' ) );
	}

	/**
	 * Give taxonomies a nice tree structure when checked
	 *
	 * @param  array $args Taxonomy arguments
	 */
	public function wp_terms_checklist_args( $args ) {
		$args['checked_ontop'] = false;

		return $args;
	}

	/**
	 * Activate the default editor on the posts page
	 * Setting is set in settings.php
	 *
	 * @param  object $post The global post object
	 */
	public function content_editor_on_page_for_posts_page( $post ) {
		if ( 'EDITOR_ON_BLOG_PAGE' ) {

			if ( $post->ID != get_option( 'page_for_posts' ) || post_type_supports( 'page', 'editor' ) ) {
				return;
			}

			remove_action( 'edit_form_after_title', '_wp_posts_page_notice' );
			add_post_type_support( 'page', 'editor' );
		}
	}

	/**
	 * Hide default editor from posts or pages
	 * Setting is set in settings.php
	 */
	public function hide_editor() {
		//Eruit gesloopt omdat hij PHP warning geeft
		/*if ( count( unserialize( 'HIDE_DEFAULT_EDITOR' ) ) > 0 ) {
			if ( ! isset( $_GET['post'] ) && ! isset( $_POST['post_ID'] ) ) {
				return;
			}

			$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

			if ( ! isset( $post_id ) ) {
				return;
			}

			$template_file = get_post_meta( $post_id, '_wp_page_template', true );

			if ( in_array( $template_file, unserialize( HIDE_DEFAULT_EDITOR ) ) ) {
				remove_post_type_support( 'page', 'editor' );
			}
		}*/
	}

	/**
	 * Overwrite the wplink javascript to add an additional checkbox `Make button`
	 * This will create <a class="button" href="#"></a>
	 *
	 * @internal This function uses the `admin_enqueue_scripts` action
	 * @link     https://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
	 *
	 * @since    2.0
	 *
	 * @param string $admin_page The admin page URL
	 *
	 * @return void
	 */
	public function wplink_additions( $admin_page ) {
		// Only load on post edit pages.
		if ( 'post.php' !== $admin_page && 'post-new.php' !== $admin_page ) {
			return;
		}

		wp_enqueue_script( 'wplink-additions', get_stylesheet_directory_uri() . '/dist/js/vendor/wp/wplink-additions.js', [], false, true );
		wp_localize_script( 'wplink-additions', 'objectL10n', [
			'make_button' => __t( 'Maak button van deze link' ),
		] );
	}

	/**
	 * Disable theme updates to make sure
	 * hacks can not be applied through theme updates
	 *
	 * @param $request
	 * @param $url
	 *
	 * @return mixed
	 */
	public function disable_theme_updates( $request, $url ) {
		if ( strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) !== 0 ) {
			return $request;
		}

		$themes = json_decode( $request['body']['themes'] );
		$parent = get_option( 'template' );
		$child  = get_option( 'stylesheet' );

		unset( $themes->themes->$parent );
		unset( $themes->themes->$child );

		$request['body']['themes'] = json_encode( $themes );

		return $request;
	}
}
