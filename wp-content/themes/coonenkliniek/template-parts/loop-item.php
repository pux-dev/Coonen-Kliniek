<?php
/**
 * The template part for displaying property loop section
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      4.5.1
 * @version    4.5.1
 */
?>
<a href="<?php the_permalink(); ?>" class="item">
    <div class="inner">
    <div class="image-holder">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="item-content">
        <p class="date"><?php echo get_the_date(); ?></p>
        <h4><?php the_title(); ?></h4>
        Lees verder                    
    </div>
    </div>
</a>   