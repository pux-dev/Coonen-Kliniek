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
$title = get_field('testi_title', get_the_ID());
$text_length = strlen($testimonial); //aantal karakters
$max_length = 402; //aantal getoonde karakters ?>


<!-- Review item -->
<div class="item <?php if ($text_length > $max_length ) { echo 'long-text'; } ?>">

    <!-- Rating sterren -->
    <div class="stars flex">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/star.svg" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/star.svg" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/star.svg" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/star.svg" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/star.svg" alt="">
    </div>
    <!--Einde Rating sterren -->

    <!-- Naam -->
    <p class="name"><?php the_title();?></p>
    <!-- Einde Naam -->
    
    <!-- Testimonial inhoud -->
    <div class="testimonial-content">
        <p><?php echo $testimonial; ?></p>

        <!-- Lees meer -->
        <?php
        
        if ($text_length > $max_length ) : ?>
            <a id="full-review" class="more">
                <?php _e( 'Lees Meer', 'vandam' ); ?>
            </a>
        <?php endif; ?>
        <!-- Einde lees meer -->

    </div>
    <!-- Einde Testimonial inhoud -->

    
    
    
</div>
<!--Einde review item -->