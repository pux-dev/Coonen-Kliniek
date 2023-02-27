<?php
$image       = get_field('banner_image');
$price       = get_field('behandel_price'); ?>

<!--  / banner \ -->
<div class="page-banner no-margin banner section">

    <!--  / Image section \ -->
    <div class="banner-image">
        <?php if( $image ) : ?>
            <?php echo wp_get_attachment_image( $image, 'banner_lg', '', array( 'class' => 'image' ) ); ?>
        <?php endif ?>
        <?php get_template_part( 'template-parts/content', 'review-widget' ); ?>
    </div>
    <!--  / end Image section \ -->
        
    <!--  / content \ -->
    <div class="content flex jucoce">
        <div class="content-holder">

            <p class="parent"><?php $terms = get_the_terms($post->ID, 'type');foreach($terms as $term){echo $term->name;} ?></p>

            <h1 class="page-title"><?php the_title(); ?></h1>

            <p class="price">
                <span>Vanaf</span>                
                €<?php echo $price; ?>,-
            </p>

            <a class="button" href="#/">Plan een intake</a>
        
        </div>
        
    </div>
    <!--  / end content \ -->

   
</div>
<!--  / end banner \ -->

