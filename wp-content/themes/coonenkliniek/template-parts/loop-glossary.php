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

<!-- Item -->
<div class="item">
    <!-- Inner -->
    <div class="inner">

        <!-- Content -->
        <div class="item-content">
            <a href="<?php the_permalink(); ?>">
                <h4><?php the_title(); ?></h4>  
                <?php the_excerpt(); ?>
            </a>           
           
                                     
        </div>
        <!-- ###Content -->
        
    </div>
    <!-- ### Inner -->
</div>   
<!-- ### Teamlid -->