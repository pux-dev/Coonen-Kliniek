<?php
/**
 * Template Name: Pagina met Sidebar
 */
 
the_post();
get_header(); 

get_template_part( 'template-parts/content', 'page-header' ); ?>

<!-- /// Page content  \\ -->
<div class="content-page content-area  centered grid">
    
    <!--  / content area \ -->
    <div class="section centered">
        <?php the_content() ;?>    
    </div>
    <!--  / Einde content area \ -->

    <!-- Sidebar -->
    <div class="sidebar">
        <?php get_template_part( 'template-parts/content', 'sidebar' ); ?>
    </div>
    <!--### Sidebar -->

</div>
<!-- \\ Page content /// -->

<!-- /// Gerelateerde items \\ -->
<?php get_template_part( 'template-parts/contact', 'cta' ); ?>
<?php // get_template_part( 'template-parts/loop', 'related' ); ?>
<!-- \\ Gerelateerde items /// -->

<?php get_footer();