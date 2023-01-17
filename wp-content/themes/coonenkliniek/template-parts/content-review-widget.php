<?php
/**
 * The template part for displaying faq content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
?>

<div class="review-widget">
    <p class="title">Klanttevredenheid</p>
    <div class="score flex alitce">
        <?php $counter = 1;
        while ($counter <= 5) : ?>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/star.svg" alt="star">        
        <?php $counter++;
        endwhile; ?>        
        9,4    
    </div>
    <p>Op basis van <a href="/beoordelingen/">312 beoordelingen</a></p>
</div>