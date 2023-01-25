<?php
/**
 * The template part for displaying property loop section
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      4.5.1
 * @version    4.5.1
 */

$testimonial = get_field('testi_testimonial', get_the_ID()); 
$score = get_field('testi_score', get_the_ID());
$title = get_field('testi_title', get_the_ID()); ?>

<!-- Review item -->
<div class="item">
    <!-- Rating sterren -->
    <div class="stars flex">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/star.svg" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/star.svg" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/star.svg" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/star.svg" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/star.svg" alt="">
    </div>
    <!--Einde Rating sterren -->
    
    <!-- Testimonial inhoud -->
    <div class="testimonial-content">
        <?php echo $testimonial; ?>

        <!-- Lees meer -->
        <?php
        $text_length = strlen($testimonial);
        if ($text_length > 260) : ?>
            <a id="full-review" class="more">
                <?php _e( 'Meer', 'vandam' ); ?>
            </a>
        <?php endif; ?>
        <!-- Einde lees meer -->

    </div>
    <!-- Einde Testimonial inhoud -->

    <!-- Naam -->
    <p class="name"><?php the_title();?></p>
    <!-- Einde Naam -->
    
</div>
<!--Einde review item -->