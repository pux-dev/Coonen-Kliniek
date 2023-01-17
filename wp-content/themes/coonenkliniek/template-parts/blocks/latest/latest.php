<?php
/**
 * The template part for displaying Latest news
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'latest-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'latest';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$latest_title          = get_field('latest_title');
$latest_content        = get_field('latest_content');
$latest_link           = get_field('latest_link');
$latest_margin_bottom  = get_field('latest_margin_bottom');
$latest_background     = get_field('latest_background'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> centered section <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
	
	<div class="content align-center">
		<?php if( $label ) : ?>
		    <p class="label"><?php echo $label; ?></p>
		<?php endif; ?>

		<?php if( $latest_title ) : ?>
		    <h2><?php echo $latest_title; ?></h2>            
		<?php endif; ?>

		<?php if( $latest_content ) : ?>
		    <?php echo $latest_content; ?>
		<?php endif; ?>

        <?php if( $latest_link ) : ?>
		    <?php echo $latest_link; ?>
		<?php endif; ?>

	</div>

    <div class="items grid columns-3">
        
        <?php // The Query
        $args = array(
            'posts_per_page' => 3,    
        );
        $query = new WP_Query($args); 

        // The Loop
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part( 'template-parts/loop', 'item' );
                
        
        }
        } else {
            echo 'er zijn geen berichten gevonden';
        }
        
        // Restore original Post Data
        wp_reset_postdata(); ?>

    </div>

	
</section>