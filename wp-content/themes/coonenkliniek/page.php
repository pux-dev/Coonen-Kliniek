<?php
/**
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */
the_post();

get_header();
$has_banner = get_field('has_banner'); ?>

<?php 
if ($has_banner) {
    if (is_front_page() ) {
        get_template_part( 'template-parts/content', 'banner' );
    } else {
        get_template_part( 'template-parts/content', 'banner-page' );
    }
} ?>

<?php //Breadcrumbs
if (!is_front_page()) {
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
      }
} ?>

<!--  / content area \ -->
<div class="content-area">
    <?php the_content(); ?>
</div>
<!--  / content area \ -->

<?php get_footer();