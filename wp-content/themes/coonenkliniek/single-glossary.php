<?php
/**
 * The Template for displaying all single posts.
 */
the_post();
get_header();

$functie = get_field('tm_function');
$quote = get_field('tm_quote');
$phone = get_field('tm_phone');
$linkedin = get_field('tm_linkedin');
$image = get_field('tm_image'); ?>

<?php get_template_part( 'template-parts/content', 'page-header' ); ?>

<!-- /// Page content  \\ -->
<div class="content-page centered grid">

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
<?php get_template_part( 'template-parts/loop', 'related' ); ?>    
<!-- \\ Gerelateerde items /// -->


<?php get_footer();