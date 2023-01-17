<?php
/**
 * The template part for displaying carrousel content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'carrousel-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'carrousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title          = get_field('client_carrousel_title');
$content        = get_field('client_carrousel_content');
$link       	= get_field('client_carrousel_link');
if( $link ) { 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}
$image       	= get_field('carrousel_icon');
$margin         = get_field('carrousel_margin_bottom');
$background     = get_field('carrousel_background_color'); ?>


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>  section <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
	
	<div class="content stripe">
		<?php if( $label ) : ?>
		    <p class="label"><?php echo $label; ?></p>
		<?php endif; ?>

		<h2></h2>

		<?php if( $title ) : ?>
		    <h2><?php echo $title; ?></h2>            
		<?php endif; ?>	
		
		<?php if( $content ) : ?>
		    <?php echo $content; ?>
		<?php endif; ?>
	</div>

	<div class="items">
        <?php // The Query
			$today = date('Y-m-d ');
            $args = array(
                
				'post_type' => 'event',
				'post_status' => 'published',
				//'orderby'   => 'meta_value_num',
				//'meta_key'  => '_event_start_date',
				'tax_query' => array(
					array(
						'taxonomy' => 'event-categories',
						'field'    => 'term_id',
						'terms'    => 5,
					),
					
				),
				'meta_query' => array(
					array(
						'key'     => '_event_start_date',
						'value'   => $today,
						'compare' => '>',
					),
				),
				'posts_per_page' => 3,
				

            );
            $query = new WP_Query($args); 

            // The Loop
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    get_template_part( 'template-parts/loop', 'wandeling' );
            }
            } else {
                echo 'er zijn geen berichten gevonden';
            }
            
            // Restore original Post Data
            wp_reset_postdata(); ?>            
    </div>

	<?php if( $link ): 
	$link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? \ link['target'] : '_self'; ?>
		<a class="read-more" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
	<?php endif; ?>
	
</section>