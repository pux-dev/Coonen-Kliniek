<?php

namespace Theme\Setup;

/**
 * Class Frontend
 *
 * @package Theme\Setup
 */
class Frontend {
	/**
	 * Frontend constructor
	 */
	public function __construct() {		
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_stylesheets' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_javascripts' ] );
		add_filter( 'wp_head', [ $this, 'wp_head' ] );
		add_action( 'nav_menu_css_class', [ $this, 'cpt_archive_nav_support' ], 10, 2 );
		add_filter( 'excerpt_length', [ $this, 'excerpt_length' ], 999 );
		add_filter( 'excerpt_more', [ $this, 'excerpt_more' ] );
		add_filter( 'image_resize_dimensions', [ $this, 'image_crop_dimensions' ], 10, 6 );
		add_filter( 'use_block_editor_for_post_type', [ $this, 'disable_gutenberg'], 10, 2 );


		/**
		 * Disable wp rocket caching when caching variable is set in URL
		 */
		if ( isset( $_GET['caching'] ) && $_GET['caching'] === 'false' ) {
			add_filter( 'do_rocket_generate_caching_files', '__return_false' );
		}
	}

	/**
	 * Improved image resize dimensions for cropping an image
	 * Also includes upscaling
	 *
	 * @param $default
	 * @param $orig_w
	 * @param $orig_h
	 * @param $new_w
	 * @param $new_h
	 * @param $crop
	 *
	 * @return array|null
	 */
	public function image_crop_dimensions( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ) {
		if ( ! $crop ) {
			// If no cropping required let WordPress handle it
			return null;
		}

		$aspect_ratio = $orig_w / $orig_h;
		$size_ratio   = max( $new_w / $orig_w, $new_h / $orig_h );

		$crop_w = round( $new_w / $size_ratio );
		$crop_h = round( $new_h / $size_ratio );

		$s_x = floor( ( $orig_w - $crop_w ) / 2 );
		$s_y = floor( ( $orig_h - $crop_h ) / 2 );

		return [ 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h ];
	}

	/**
	 * Load the theme stylesheets
	 * Additional stylesheets can be added in settings.php
	 */
	public function enqueue_stylesheets() {
		$stylesheets = unserialize( STYLESHEETS );
		$additional  = [];
		$enqueues    = [];

		$additional['main'] = [
			'src' => '/dist/css/main.css',
			'version' => THEME_VERSION,
		];

		if ( MMENU == true ) {
			$additional['mmenu'] = [
				'src' => '/dist/css/vendor/mmenu/mmenu.min.css',
			];
		}

		if ( MMENU_LIGHT == true ) {
			$additional['mmenu_light'] = [
				'src' => '/dist/css/vendor/mmenu-light/mmenu-light.min.css',
			];
		}

		if ( OWL == true ) {
			$additional['owl'] = [
				'src' => '/dist/css/vendor/owl-carousel/owl.carousel.min.css',
			];
		}

		if ( OWL_THEME == true ) {
			$additional['owl-theme'] = [
				'src' => '/dist/css/vendor/owl-carousel/owl.theme.default.min.css',
			];
		}

		if ( AOS == true ) {
			$additional['aos'] = [
				'src' => '/dist/css/vendor/aos/aos.min.css',
			];
		}

		if ( FANCYBOX == true ) {
			$additional['fancybox'] = [
				'src' => '/dist/css/vendor/fancybox/fancybox.min.css',
			];
		}

		if ( SAL == true ) {
			$additional['sal'] = [
				'src' => '/dist/css/vendor/sal/sal.min.css',
			];
		}

		if ( SLICK == true ) {
			$additional['slick'] = [
				'src' => '/dist/css/vendor/slick/slick.min.css',
			];
		}

		

		$stylesheets = $additional + $stylesheets;

		foreach ( $stylesheets as $name => $stylesheet ) {
			$source       = ( strpos( $stylesheet['src'], '//' ) === false ) ? get_template_directory_uri() . $stylesheet['src'] : $stylesheet['src'];
			$dependencies = ( isset( $stylesheet['dependencies'] ) ) ? $stylesheet['dependencies'] : [];
			$version      = ( isset( $stylesheet['version'] ) ) ? $stylesheet['version'] : false;
			$media        = ( isset( $stylesheet['media'] ) ) ? $stylesheet['media'] : 'all';
			$enqueue      = ( isset( $stylesheet['enqueue'] ) ) ? $stylesheet['enqueue'] : true;

			if ( $enqueue ) {
				wp_enqueue_style( $name, $source, $dependencies, $version, $media );
			} else {
				wp_register_style( $name, $source, $dependencies, $version, $media );
			}
		}
	}

	/**
	 * Load the theme javascripts
	 * Additional javascripts can be added in settings.php
	 */
	public function enqueue_javascripts() {
		$javascripts = unserialize( JAVASCRIPTS );
		$additional  = [];
		$enqueues    = [];
 
		wp_enqueue_script( 'jquery' );

		$additional['main'] = [
			'src' => '/dist/js/main.js',
			'version' => THEME_VERSION,
		];			

		if ( MMENU == true ) {
			$additional['mmenu'] = [
				'src' => '/dist/js/vendor/mmenu/mmenu.min.js',
			];
		}

		if ( MMENU_LIGHT == true ) {
			$additional['mmenu_light'] = [
				'src' => '/dist/js/vendor/mmenu-light/mmenu-light.min.js',
			];
		}

		if ( OWL == true ) {
			$additional['owl'] = [
				'src' => '/dist/js/vendor/owl-carousel/owl.carousel.min.js',
			];
		}

		if ( AOS == true ) {
			$additional['aos'] = [
				'src' => '/dist/js/vendor/aos/aos.min.js',
			];
		}

		if ( RELLAX == true ) {
			$additional['rellax'] = [
				'src' => '/dist/js/vendor/rellax/rellax.min.js',
			];
		}

		if ( FANCYBOX == true ) {
			$additional['fancybox'] = [
				'src' => '/dist/js/vendor/fancybox/fancybox.min.js',
			];
		}

		if ( SAL == true ) {
			$additional['sal'] = [
				'src' => '/dist/js/vendor/sal/sal.min.js',
			];
		}

		if ( SLICK == true ) {
			$additional['slick'] = [
				'src' => '/dist/js/vendor/slick/slick.min.js',
			];
		}

		$javascripts = $additional + $javascripts;

		foreach ( $javascripts as $name => $javascript ) {
			$source       = ( strpos( $javascript['src'], '//' ) === false ) ? get_template_directory_uri() . $javascript['src'] : $javascript['src'];
			$dependencies = ( isset( $javascript['dependencies'] ) ) ? $javascript['dependencies'] : [];
			$version      = ( isset( $javascript['version'] ) ) ? $javascript['version'] : false;
			$in_footer    = ( isset( $javascript['in_footer'] ) ) ? $javascript['in_footer'] : true;
			$enqueue      = ( isset( $javascript['enqueue'] ) ) ? $javascript['enqueue'] : true;

			if ( $enqueue ) {
				wp_enqueue_script( $name, $source, $dependencies, $version, $in_footer );
			} else {
				wp_register_script( $name, $source, $dependencies, $version, $in_footer );
			}
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
	}

	/**
	 * Add additional meta tags to the head
	 */
	public function wp_head() {
		if ( ! is_admin() ) {
			echo '<meta charset="' . get_bloginfo( 'charset' ) . '" />';				
			echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
		}
	}
	

	/**
	 * Fix the active state in navigations for custom post type archives
	 *
	 * @param $classes
	 * @param $item
	 *
	 * @return array
	 */
	public function cpt_archive_nav_support( $classes, $item ) {
		global $post;

		if ( is_single() || is_archive() ) {
			$current_post_type = get_post_type_object( get_post_type( $post->ID ) );

			if ( $current_post_type->has_archive ) {
				$menu_slug = strtolower( trim( $item->url ) );

				if ( $menu_slug == get_post_type_archive_link( $current_post_type->name ) ) {
					$classes[] = 'current-menu-item';
				}
			}
		}

		return $classes;
	}

	/**
	 * Adjust global excerpt length
	 * This is setting is set in settings.php
	 *
	 * @param  integer $length The excerpt length
	 */
	public function excerpt_length( $length ) {
		return EXCERPT_LENGTH;
	}

	/**
	 * Adjust global excerpt more symbol
	 * This is setting is set in settings.php
	 *
	 * @param  string $length The excerpt more symbol
	 */
	public function excerpt_more( $more ) {
		return EXCERPT_MORE;
	}

	/**
	 * Gutenberg niet gebruiken voor posts
	 */
	
	function disable_gutenberg( $use_block_editor, $post_type ) {
		if ( GUTENBERG_POSTS == false ) {
			if ( 'post' === $post_type ) {
				return false;
			}
			if ( GUTENBERG_PAGES == false ) {
				if ( 'page' === $post_type ) {
					return false;
				}
			}
		}
		return $use_block_editor;
	}
	
	
}