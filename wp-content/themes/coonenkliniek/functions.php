<?php

// Autoloader
require_once( get_template_directory() . '/src/lib/Autoload.php' );

// Setup theme
$theme = new \Theme\Autoload;
$theme->register();
$theme->add_namespace( 'Theme', get_template_directory() . '/src/lib' );

// General
define( 'THEME_NAME', explode( '/', get_template_directory() )[ count( explode( '/', get_template_directory() ) ) - 1 ] );
define( 'TEXTDOMAIN', THEME_NAME );
define( 'THEME_VERSION', '0.1' ); //Versienummer wordt aan css + js files meegegeven

// Options
define( 'EXCERPT_LENGTH', '20' );
define( 'EXCERPT_MORE', '...' );

// Define Vendors
define( 'MMENU', true ); //MMENU, @link https://mmenujs.com/
define( 'MMENU_LIGHT', false ); //MMENU Light, @link https://mmenujs.com/mmenu-light/
define( 'OWL', true ); //Owl Carousel @link https://owlcarousel2.github.io/OwlCarousel2/docs/api-options.html
define( 'OWL_THEME', false ); //Owl Carousel standard theme
define( 'AOS', false ); //Animate on scroll @link https://michalsnik.github.io/aos/
define( 'RELLAX', false ); //Rellax Parallax @link https://github.com/dixonandmoe/rellax
define( 'FANCYBOX', false ); //Fancybox @link https://fancyapps.com/fancybox/3/
define( 'SAL', false ); // Scroll Animation Library @link https://mciastek.github.io/sal/
define( 'SLICK', false ); //Slick Slider @link https://kenwheeler.github.io/slick/
define( 'MAGNIFIC', false ); //Magnific Popup @link https://dimsemenov.com/plugins/magnific-popup/

// Gutenberg gebruiken
define( 'GUTENBERG_POSTS', false ); //Gutenberg uit voor posts
define( 'GUTENBERG_PAGES', true ); //Gutenberg uit voor pages

// Define Gutenberg Blocks (ACFBlocks.php)
define( 'BANNER', false ); //Pagina banner
define( 'BLOCKS', false ); // Meerdere blokken om zaken uit te lichten
define( 'CARROUSEL', false ); // Carrousel met item slider
define( 'CONTACT', false ); // Contactformulier met contact opties
define( 'CONTACT_CTA', false ); // Contactformulier met medewerker gegevens
define( 'CLIENT_CARROUSEL', false ); //Carrousel met logo's
define( 'CTA_BLOCK', true ); //Call to Action
define( 'FAQ', false ); // Veelgestelde vragen
define( 'FEATURED_BLOGS', false ); // Uitgelichte blogs
define( 'FULLWIDTH_BLOCK', true ); //Tekstblok volledige breedte
define( 'GALLERY', false ); //Afbeeldingen gallerij
define( 'LATEST_NEWS', false ); //Laatste nieuwsitems
define( 'LOGO_SECTION', true ); //Sectie met logo's
define( 'TEXT_LIST', false ); //
define( 'TEXTIMAGE_BLOCK', true ); //Tekstblok met afbeelding
define( 'USP_BLOCK', true ); //Unique Selling Points
define( 'TEAM', false ); //Teamleden
define( 'REVIEWS_BLOCK', false ); //Sectie met reviews en Testimonials
define( 'SERVICES_BLOCK', true ); //Diensten overzicht
define( 'SLIDER', false ); // Slider
define( 'STEPS', false ); // Stappen Carrousel
define( 'FEATURED', false ); // Uitgelichte items
define( 'TESTIMONIAL_CARROUSEL', true ); //Testimonial Carrousel

//Define Custom Post Types
define( 'CPT_TEAM', false ); //Team 
define( 'CPT_TESTIMONIALS', true ); //Testimonials
define( 'VACATURES', false ); //Vacatures

/*
//Widgets
function pux_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'footer_a',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title">',
		'after_title'   => '</div>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 2',
		'id'            => 'footer_b',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title">',
		'after_title'   => '</div>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 3',
		'id'            => 'footer_c',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title">',
		'after_title'   => '</div>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 4',
		'id'            => 'footer_d',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title">',
		'after_title'   => '</div>',
	) );

}
add_action( 'widgets_init', 'pux_widgets_init' );*/

// Add Additional Javascript
define( 'JAVASCRIPTS', serialize( [
	/*'additional' => [
		'src' => '/dist/js/vendor/additional/additional.js', //Place additional JS files
	],*/	
] ) );

// Add Additional Stylesheets
define( 'STYLESHEETS', serialize( [	
	/*'additional'  => [
		'src' => '/dist/css/vendor/additional/additional.css', //Place additional CSS files
	],*/
] ) );

// Theme
define( 'FEATURED_IMAGE', true );
define( 'GOOGLE_MAPS', false );

// Image sizes1
//add_image_size( 'square_lg', 1170, 550, true ); //o.a. voor Wandelingen Carrousel
//add_image_size( 'square', 585, 1100, true ); //o.a. voor Wandelingen Carrousel
//add_image_size( 'rectangle_lg', 830, 480, true ); //o.a. voor slider, blog en featured
//add_image_size( 'rectangle', 415, 240, true ); //@ o.a. blog en featured
//set_post_thumbnail_size( 746, 498, true ); //alleen voor post thumbnail

/*Specifieke sizes worden gezet tijdens upload in eigen ACF veld: */	

add_filter('acf/upload_prefilter/name=banner_image', 'banner_filter', 10, 3);
function banner_filter( $errors, $file, $field ){  
	add_image_size( 'banner', 1280, 637, true );
	add_image_size( 'banner_lg', 1920, 955, true );
}


add_filter('acf/upload_prefilter/name=footer_certification', 'certification_filter', 10, 3);
function certification_filter( $errors, $file, $field ){  
	add_image_size( 'footer_cert', 200, 400, false );
	add_image_size( 'footer_cert_lg', 400, 800, false );
}


/*Uitschakelen van overbodige standaard image sizes */
function pux_disable_image_sizes($sizes) {
	unset($sizes['medium']); // disable medium
	unset($sizes['medium_large']); // disable medium-large size
	unset($sizes['1536x1536']);    // disable 2x medium-large size
	unset($sizes['2048x2048']);    // disable 2x large size	
	return $sizes;
	
}
add_action('intermediate_image_sizes_advanced', 'pux_disable_image_sizes');

//We zetten de WP scaled image uit (gebruiken we niet)
/*https://developer.wordpress.org/reference/hooks/big_image_size_threshold/*/
add_filter( 'big_image_size_threshold', '__return_false' );


// Menus
define( 'MENUS', serialize( [
	'primary-menu' => __t( 'Primary menu' ),
	'copyright_menu' => __t( 'Copyright - Menu' ),	
	'footer_menu_a' => __t( 'Footer menu A' ),
	'footer_menu_b' => __t( 'Footer menu B' ),
	'footer_menu_c' => __t( 'Footer menu C' ),
	'footer_menu_d' => __t( 'Footer menu D' ),
] ) );

// Theme init
$theme->init();

// weghalen van WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//Weghalen van Gutenberg Block Editor CSS
function pux_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'pux_remove_wp_block_library_css', 100 );

//Pux support Dashboard widget
add_action('wp_dashboard_setup', 'pux_dashboard_widgets');
  
function pux_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Hulp bij website aanpassen voor ' . get_bloginfo('name') , 'pux_dashboard_help');
}
 
function pux_dashboard_help() {
echo '<p>Weten hoe je deze site zelf aan kunt passen? We hebben speciaal voor ' . get_bloginfo('name') . ' <a href="https://www.youtube.com/playlist?list=PLWb-tv3Q9BT02srhd8qS-VhCYpUL4vOXV" target="_blank">deze video tutorials</a> gemaakt. Voor aanvullende vragen kun je contact opnemen met Pux via <a href="mailto:hallo@pux.nl">hallo@pux.nl</a> of telefonisch via <a href="tel:0031232052440">023 - 205 24 40</a></p>';
}

/**
 * Tekst toevoegen bij een  Uitgelichte afbeelding
 */
function pux_post_thumbnail_add_label($content, $post_id, $thumbnail_id)
{
    $post = get_post($post_id);
    if ($post->post_type == 'event' || $post->post_type == 'event_aanvraag' || $post->post_type == 'post') {
        $content .= '<strong>Gebruik een liggende of vierkante afbeelding van minimaal 800 pixels breed</strong>';
        return $content;
    }

    return $content;
}
add_filter('admin_post_thumbnail_html', 'pux_post_thumbnail_add_label', 10, 3);

add_action( 'after_setup_theme', 'gutenberg_css' );
function gutenberg_css(){
	add_theme_support( 'editor-styles' );
	add_editor_style( 'dist/css/gutenberg.css' );
}

register_block_type( 'template-parts/blocks/text-image/block.json' );

//Automatisch tags <br> Contact Form 7 weghalen
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/**
 * Disable Editor
 *
 * @package      ClientName
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Templates and Page IDs without editor
 *
 */
function ea_disable_editor( $id = false ) {

	$excluded_templates = array(
		'templates/template-sidebar.php',
	);

	$excluded_ids = array(
		// get_option( 'page_on_front' )
	);

	if( empty( $id ) )
		return false;

	$id = intval( $id );
	$template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

/**
 * Disable Gutenberg by template
 *
 */
function ea_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
		return $can_edit;

	if( ea_disable_editor( $_GET['post'] ) )
		$can_edit = false;

	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );

/**
 * Disable Gutenberg by post type
 *
 */
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'glossary') return false;
    return $current_status;
}

