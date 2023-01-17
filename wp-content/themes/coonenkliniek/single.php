<?php
/**
 * The Template for displaying all single posts.
 */
the_post();
get_header(); ?>

<!--  / content area \ -->
<div class="section content-area centered">
    <?php the_post_thumbnail('rectangle_lg', ['class' => 'featured-img']); ?>    
    <h1><?php the_title(); ?></h1>
    <?php the_content() ;?>    
</div>
<?php

if (is_singular( 'vacatures' )) {
    get_template_part( 'template-parts/contact', 'vacature' );
} else {
    get_template_part( 'template-parts/loop', 'related' );
} ?>


<!--  / Einde content area \ -->

<?php get_footer();