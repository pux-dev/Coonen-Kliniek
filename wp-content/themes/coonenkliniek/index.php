<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link       http://codex.wordpress.org/Template_Hierarchy
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      1.0
 * @version    1.0
 */

if (is_post_type_archive( 'team' )) {
    $title          = get_field('team_page_title', 'options');
    $content        = get_field('team_page_desc', 'options');    
} elseif (is_post_type_archive( 'vacatures' )){
    $title          = get_field('vacature_page_title', 'options');
    $content        = get_field('vacature_page_desc', 'options'); 
} else {
    $title          = get_field('blog_page_title', 'options');
    $content        = get_field('blog_page_desc', 'options'); 
}

get_header(); ?>

<!--  / content area \ -->
<div class="section aligncenter centered">
    <div class="content ">
    
        <?php         
        if( $title ) : ?>
            <h1><?php echo $title; ?></h1>
            <?php endif; ?>
        
        <?php if( $content ) : ?>
            <p><?php echo $content; ?></p>
        <?php endif; ?>

    </div>
</div>
    
<section class="blog-overview section centered items grid <?php if (is_post_type_archive( 'team' )) { echo 'columns-4'; } else { echo 'columns-3'; } ?>">
    
    <?php 
    if ( have_posts() ) { ?>
            
        <?php 
        while ( have_posts() ) : the_post();
            
            if (is_post_type_archive( 'team' )) {
                get_template_part( 'template-parts/loop', 'team' );
            } elseif (is_post_type_archive( 'vacatures' )) {
                get_template_part( 'template-parts/loop', 'vacature' );
            } else {
                get_template_part( 'template-parts/loop', 'item' );
            }
                
        endwhile;

        get_template_part( 'snippets/blog', 'pagination' );

    
    } ?>
    
</section>

<!--  / content area \ -->

<?php get_footer();