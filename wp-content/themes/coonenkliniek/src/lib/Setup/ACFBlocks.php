<?php

namespace Theme\Setup;

/**
 * Class ACFBlocks
 *
 * @package Theme\Setup
 */
class ACFBlocks {
    /**
     * ACFBlocks constructor
     */
    public function __construct() {
        add_action('acf/init', [ $this, 'my_acf_init_block_types' ] );
        add_action( 'after_setup_theme', [ $this, 'add_gutenberg_css' ] );
        add_action( 'admin_head', [ $this, 'custom_gutenberg_width' ] );        
        add_filter( 'allowed_block_types_all', [$this, 'pux_allow_blocks' ], 25, 2 );        
    }

    //Gutenberg Blocks
    
    public function my_acf_init_block_types() {

        // Check function exists.
        if( function_exists('acf_register_block_type') ) {

            if ( FULLWIDTH_BLOCK == true ) {
                // Tekstblok volledige breedte
                acf_register_block_type(array(
                    'name'              => 'full-width',
                    'title'             => __('Tekstblok'),
                    'description'       => __('Tekstblok'),
                    'render_template'   => 'template-parts/blocks/full-width/full-width.php',
                    'category'          => 'common',
                    'icon'              => 'align-left',
                    'keywords'          => array( 'tekst', 'text'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/full-width/preview.png',
                            )
                        )
                    )         
                ));   
            }

            if ( TEXTIMAGE_BLOCK == true ) {
                // Tekstblok met afbeelding
                acf_register_block_type(array(
                    'name'              => 'content',
                    'title'             => __('Tekst met afbeelding'),
                    'description'       => __('Tekst met afbeelding'),
                    'render_template'   => 'template-parts/blocks/text-image/text-image.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'tekst', 'text', 'afbeelding', 'image'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/text-image/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( BANNER == true ) {
                // Tekstblok met afbeelding
                acf_register_block_type(array(
                    'name'              => 'banner',
                    'title'             => __('Pagina banner'),
                    'description'       => __('Gebruik deze bovenaan de pagina'),
                    'render_template'   => 'template-parts/blocks/banner/banner.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'banner'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/banner/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( CONTACT == true ) {
                // Contactformulier
                acf_register_block_type(array(
                    'name'              => 'contact',
                    'title'             => __('Contactformulier'),
                    'description'       => __('Contactformulier met contactmogelijkheden'),
                    'render_template'   => 'template-parts/blocks/contact/contact.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'contact', 'form'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/contact/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( CONTACT_CTA == true ) {
                // Contactformulier met medewerker img
                acf_register_block_type(array(
                    'name'              => 'contact-cta',
                    'title'             => __('Contact Call to Action'),
                    'description'       => __('Contactformulier met medewerker gegevens'),
                    'render_template'   => 'template-parts/blocks/contact/contact-cta.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'contact'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/contact/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( CARROUSEL == true ) {
                // Carrousel
                acf_register_block_type(array(
                    'name'              => 'carrousel',
                    'title'             => __('Carrousel'),
                    'description'       => __('Carrousel met meerdere items'),
                    'render_template'   => 'template-parts/blocks/carrousel/carrousel.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'carrousel'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/carrousel/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( STEPS == true ) {
                // Stappen Carrousel
                acf_register_block_type(array(
                    'name'              => 'steps',
                    'title'             => __('Stappen'),
                    'description'       => __('Stappen in een carrousel'),
                    'render_template'   => 'template-parts/blocks/steps/steps.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'stappen', 'carrousel', 'steps'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/steps/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( SLIDER == true ) {
                // Slider
                acf_register_block_type(array(
                    'name'              => 'slider',
                    'title'             => __('Slider'),
                    'description'       => __('Slider met meerdere items'),
                    'render_template'   => 'template-parts/blocks/slider/slider.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'slider'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/slider/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( FEATURED == true ) {
                // Slider
                acf_register_block_type(array(
                    'name'              => 'featured',
                    'title'             => __('Featured'),
                    'description'       => __('Eén of meerdere blokken uitgelicht'),
                    'render_template'   => 'template-parts/blocks/featured/featured.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'featured', 'uitgelicht'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/featured/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( BLOCKS == true ) {
                // Slider
                acf_register_block_type(array(
                    'name'              => 'blocks',
                    'title'             => __('Blokken'),
                    'description'       => __('Meerdere blokken naast elkaar om items uit te lichten'),
                    'render_template'   => 'template-parts/blocks/blocks/blocks.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'blocks', 'blokken'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/blocks/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( REVIEWS_BLOCK == true ) {
                // Reviews sectie
                acf_register_block_type(array(
                    'name'              => 'reviews',
                    'title'             => __('Reviews'),
                    'description'       => __('Sectie met Reviews'),
                    'render_template'   => 'template-parts/blocks/reviews/reviews.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'review', 'reviews', 'testimonial'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/reviews/preview.png',
                            )
                        )
                    )
                ));          
            }

            

            if ( FEATURED_BLOGS == true ) {
                // Reviews sectie
                acf_register_block_type(array(
                    'name'              => 'featured-blogs',
                    'title'             => __('Uitgelichte blogs'),
                    'description'       => __('Sectie met de laatste blog items'),
                    'render_template'   => 'template-parts/blocks/blog/featured-blogs.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'blog', 'nieuws', 'uitgelicht', 'featured'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/blog/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( TESTIMONIAL_CARROUSEL == true ) {
                // Reviews sectie
                acf_register_block_type(array(
                    'name'              => 'testimonial-carrousel',
                    'title'             => __('Testimonials'),
                    'description'       => __('Testimonials in een carousel'),
                    'render_template'   => 'template-parts/blocks/testimonials/testimonial-carousel.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'review', 'carrousel', 'testimonial'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/testimonials/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( CTA_BLOCK == true ) {
                // Tekstblok met afbeelding
                acf_register_block_type(array(
                    'name'              => 'cta',
                    'title'             => __('Call to Action'),
                    'description'       => __('Sectie met duidelijke Call to Action'),
                    'render_template'   => 'template-parts/blocks/cta/cta.php',
                    'category'          => 'common',
                    'icon'              => 'bell',
                    'keywords'          => array( 'cta', 'call', 'action', 'button'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/cta/preview.png',
                            )
                        )
                    )
                ));
            }

            if ( GALLERY == true ) {
                // Afbeeldingen Galerij
                acf_register_block_type(array(
                    'name'              => 'gallery',
                    'title'             => __('Afbeeldingen galerij'),
                    'description'       => __('Afbeeldingen galerij'),
                    'render_template'   => 'template-parts/blocks/gallery/gallery.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'gallery', 'galerij', 'afbeeldingen'),
                    'supports' => array( 
                        'align' =>false 
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/gallery/preview.png',
                            )
                        )
                    )   
                ));          
            }

            if ( USP_BLOCK == true ) {
                // USP Sectie
                acf_register_block_type(array(
                    'name'              => 'usp',
                    'title'             => __('USP sectie'),
                    'description'       => __('Sectie met Unique Selling points iconen'),
                    'render_template'   => 'template-parts/blocks/usp/usp.php',
                    'category'          => 'common',
                    'icon'              => 'awards',
                    'keywords'          => array( 'usp', 'call', 'action', 'button'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/usp/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( SERVICES_BLOCK == true ) {
                // Tekstblok met opsomming
                acf_register_block_type(array(
                    'name'              => 'services',
                    'title'             => __('Behandelingen'),
                    'description'       => __('Overzicht van alle behandelingen'),
                    'render_template'   => 'template-parts/blocks/services/services.php',
                    'category'          => 'common',
                    'icon'              => 'list',
                    'keywords'          => array( 'behandelingen', 'diensten', 'overzicht'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/services/preview.png',
                            )
                        )
                    )
                ));
            }

            if ( TEAM == true ) {
                // TEAM
                acf_register_block_type(array(
                    'name'              => 'team',
                    'title'             => __('Teamleden'),
                    'description'       => __('Een sectie om je teamleden te laten zien'),
                    'render_template'   => 'template-parts/blocks/team/team.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'team', 'personeel', 'ons'),
                    'supports' => array( 
                        'align' =>false 
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/team/preview.png',
                            )
                        )
                    ) 
                ));          
            }

            if ( TEXT_LIST == true ) {
                // Tekstblok met opsomming
                acf_register_block_type(array(
                    'name'              => 'text-list',
                    'title'             => __('Tekstblok met opsomming'),
                    'description'       => __('Tekstblok met opsomming'),
                    'render_template'   => 'template-parts/blocks/text-list/text-list.php',
                    'category'          => 'common',
                    'icon'              => 'list',
                    'keywords'          => array( 'text', 'tekst', 'lijst', 'opsomming'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/text-list/preview.png',
                            )
                        )
                    )
                ));
            }
            

            if ( CLIENT_CARROUSEL == true ) {
                // Tekstblok met opsomming
                acf_register_block_type(array(
                    'name'              => 'client-carrousel',
                    'title'             => __('Logo Carrousel'),
                    'description'       => __('Carrousel met verschillende logos'),
                    'render_template'   => 'template-parts/blocks/clients/client-carrousel.php',
                    'category'          => 'common',
                    'icon'              => 'list',
                    'keywords'          => array( 'logo', 'partner', 'klant', 'client', 'carrousel'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/clients/preview.png',
                            )
                        )
                    )
                ));          
            }
            
            if ( LATEST_NEWS == true ) {
                // LATEST_NEWS
                acf_register_block_type(array(
                    'name'              => 'latest',
                    'title'             => __('Laatste nieuws'),
                    'description'       => __('Laatste nieuwsitems'),
                    'render_template'   => 'template-parts/blocks/lastest/latest.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'nieuws', 'news', 'laatste', 'blog'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/latest/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( LOGO_SECTION == true ) {
                // Tekstblok met opsomming
                acf_register_block_type(array(
                    'name'              => 'client-logos',
                    'title'             => __('Logo sectie'),
                    'description'       => __('Sectie waar je een of meerdere logos kunt toevogen'),
                    'render_template'   => 'template-parts/blocks/clients/client-logos.php',
                    'category'          => 'common',
                    'icon'              => 'list',
                    'keywords'          => array( 'logo', 'partner', 'klant', 'client'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/clients/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( PRICING == true ) {
                // LATEST_NEWS
                acf_register_block_type(array(
                    'name'              => 'pricing',
                    'title'             => __('Prijzen'),
                    'description'       => __('Prijzen van de behandelingen'),
                    'render_template'   => 'template-parts/blocks/pricing/pricing.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'prijzen', 'tarieven', 'kosten'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/pricing/preview.png',
                            )
                        )
                    )
                ));          
            }

            if ( FAQ == true ) {
                // FAQ
                acf_register_block_type(array(
                    'name'              => 'faq',
                    'title'             => __('Veelgestelde vragen'),
                    'description'       => __('Een FAQ met vaak gestelde vragen'),
                    'render_template'   => 'template-parts/blocks/faq/faq.php',
                    'category'          => 'common',
                    'icon'              => 'list-view',
                    'keywords'          => array( 'faq', 'vragen', 'veelgestelde'),
                    'supports' => array( 
                        'align' =>false  
                    ),
                    'example'  => array(
                        'attributes' => array(
                            'mode' => 'preview',
                            'data' => array(
                                'preview_image_help' => get_stylesheet_directory_uri() . '/template-parts/blocks/faq/preview.png',
                            )
                        )
                    )
                ));          
            }
		
        }
    }

    public function add_gutenberg_css(){
        add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
        add_editor_style( 'dist/css/main.css' ); // tries to include style-editor.css directly from your theme folder
    }

    public function custom_gutenberg_width() {
        echo '<style type="text/css">
        /* Main column width */
        .wp-block {
            max-width: 1170px;
            overflow: hidden;
        }
        
        /* Width of "wide" blocks */
                .wp-block[data-align="wide"] {
                max-width: 1170px;
        }
        
        /* Width of "full-wide" blocks */
        .wp-block[data-align="full"] {
            max-width: none;
        }

        .editor-styles-wrapper .button,
        .editor-styles-wrapper input[type=submit] {
        font-family: initial !important;
        font-weight: initial!important;
        text-align: initial!important;
        padding: initial!important;
        padding-left: initial!important;
        padding-right: initial!important;
        color: initial!important;
        background-color: initial !important;
        border-width: 1px!important;
        border-style: solid!important;
        -webkit-appearance: none!important;
        border-radius: 3px!important;
        white-space: nowrap!important;
        box-sizing: border-box!important;
        text-decoration: initial!important;
        text-transform: initial!important;
        min-width: initial!important;
        transition: initial!important;
        display: initial!important;
        min-height: 26px!important;
        line-height: 2.18181818!important;
        padding: 0 8px!important;
        font-size: 11px!important;
        }
        
        </style>';
    }

    /*
    * Whitelist specific Gutenberg blocks (paragraph, heading, image and lists)
    */    
    public function pux_allow_blocks( $allowed_blocks, $editor_context ) {
    
        return array(
            'acf/banner',
            'acf/blocks',
            'acf/content',
            'acf/cta',
            'acf/client-logos',
            'acf/contact',
            'acf/contact-cta',
            'acf/full-width',
            'acf/latest',
            'acf/text-list',
            'acf/usp',
            'acf/reviews',
            'acf/carrousel',
            'acf/steps',
            'acf/client-carrousel',            
            'acf/services',
            'acf/slider',
            'acf/featured',
            'acf/featured-blogs',            
            'acf/faq',
            'acf/gallery',
            'acf/team',
            'acf/testimonial-carrousel',
            'acf/pricing',
            //'core/image',
            //'core/paragraph',            
            //'core/list',
            //'core/preformatted',
            //'core/pullquote',
            //'core/table',
            //'core/verse',
            // 'core/heading',
            // 'core/navigation',
            // 'core/navigation-link',
            // 'core/navigation-submenu',
            // 'core/page-list',
            // 'core/legacy-widget',
            // 'core/paragraph', 
            // 'core/html',
        );
    
    }
}
