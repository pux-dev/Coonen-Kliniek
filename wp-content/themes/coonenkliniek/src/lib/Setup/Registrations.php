<?php

namespace Theme\Setup;

/**
 * Class Registrations
 *
 * @package Theme\Setup
 */
class Registrations {
	/**
	 * Registrations constructor
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'register_custom_post_types' ], 0 );
		add_action( 'init', [ $this, 'register_taxonomies' ], 0 );
	}

	/** /
	 * Register theme custom post types
	 */

	
	public function register_custom_post_types() {

		register_post_type( 'behandelingen',
			[
				'labels'             => [
					'name'          => __t( 'Behandelingen' ),
					'singular_name' => __t( 'Behandeling' ),
					'menu_name'     => __t( 'Behandelingen' ),
				],
				'public'             => true,
				'publicly_queryable' => true,
				'menu_icon'          => 'dashicons-clipboard',
				'has_archive'        => false,
				'show_in_menu'       => true,
				'menu_position'		 => 10,
				'supports'           => [
					'title',
					'revisions',
				],
			]
			);

		if ( CPT_TESTIMONIALS == true ) {
			register_post_type( 'testimonials',
			[
				'labels'             => [
					'name'          => __t( 'Testimonials' ),
					'singular_name' => __t( 'Testimonial' ),
					'menu_name'     => __t( 'Testimonials' ),
				],
				'public'             => true,
				'publicly_queryable' => false,
				'menu_icon'          => 'dashicons-format-quote
				',
				'has_archive'        => false,
				'show_in_menu'       => true,
				'menu_position'		 => 45,
				'supports'           => [
					'title',
				],
			]
			);
		}

		if ( CPT_TEAM == true ) {
		register_post_type( 'team',
			[
				'labels'             => [
					'name'          => __t( 'Teamleden' ),
					'singular_name' => __t( 'Teamlid' ),
					'menu_name'     => __t( 'Team' ),
				],
				'public'             => true,
				'publicly_queryable' => true,
				'menu_icon'          => 'dashicons-groups',
				'has_archive'        => true,
				'show_in_menu'       => true,
				'menu_position'		 => 30,
				'rewrite'             => [ 'slug' => 'team' ],
				'supports'           => [
					'title',
					'editor',
					'revisions',
					'thumbnail'
				],				
			]
		);
		}

		if ( LOGO_SECTION == true ) {
			register_post_type( 'logos',
				[
					'labels'             => [
						'name'          => __t( 'Logos' ),
						'singular_name' => __t( 'Logo' ),
						'menu_name'     => __t( 'Logos' ),
					],
					'public'             => true,
					'publicly_queryable' => true,
					'menu_icon'          => 'dashicons-groups',
					'has_archive'        => false,
					'show_in_menu'       => true,
					'menu_position'		 => 30,
					'rewrite'             => [ 'slug' => 'logo' ],
					'supports'           => [
						'title'						
					],				
				]
			);
			}

		if ( VACATURES == true ) {

		register_post_type( 'vacatures',
			[
				'labels'             => [
					'name'          => __t( 'Vacatures' ),
					'singular_name' => __t( 'Vacature' ),
					'menu_name'     => __t( 'Vacatures' ),
				],
				'public'             => true,
				'publicly_queryable' => true,
				'menu_icon'          => 'dashicons-admin-site-alt3',
				'has_archive'        => true,
				'show_in_menu'       => true,
				'menu_position'		 => 40,
				'rewrite'             => [ 'slug' => 'vacatures' ],
				'supports'           => [
					'title',
					'editor',
					'revisions',
					'excerpt'
				],				
			]
		);}

		
		
	}

	/**
	 * Register theme custom taxonomies
	 *
	 * @internal This function uses the `init` action
	 * @link     https://codex.wordpress.org/Plugin_API/Action_Reference/init
	 *
	 * @since    1.0
	 *
	 * @return void
	 */
	public function register_taxonomies() {		

		register_taxonomy( 'type', [ 'behandelingen' ],
			[
				'hierarchical'      => true,
				'labels'            => [
					'name'          => __t( 'Categorie??n' ),
					'singular_name' => __t( 'Categorie' ),
					'menu_name'     => __t( 'Categorie??n' ),
					'all_items'     => __t( 'Alle categorie??n' ),
					'add_new_item'     => __t( 'Nieuwe categorie' ),

				],
				'show_ui'           => true,
				'show_admin_column' => true,
				'rewrite'           => [ 'slug' => __t( 'behandeltype' ) ],
			]
		);		
	}

	
}

