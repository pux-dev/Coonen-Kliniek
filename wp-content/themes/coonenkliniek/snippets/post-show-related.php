<?php
/*Toon related posts op basis van categorie */ 
$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) ); 

if( $related ) foreach( $related as $post ) {
    setup_postdata($post); 
        get_template_part( 'template-parts/loop', 'item' );
    wp_reset_postdata();
}

