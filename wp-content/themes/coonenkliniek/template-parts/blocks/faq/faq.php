<?php
/**
 * The template part for displaying FAQ content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'faq-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'faq';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$label          = get_field('label');
$title          = get_field('faq_title');
$content        = get_field('faq_content');
$sm_title  	    = get_field('faq_sm_title');
$align  	    = get_field('faq_align');
$margin         = get_field('faq_margin_bottom');
$background     = get_field('faq_background_color'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> section centered <?php if ($margin) { echo $margin; } ?> <?php if ($align) { echo $align; } ?> <?php if ($align) { echo $align; } ?> <?php if ($sm_title) { echo 'sm-title'; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
	
	<div class="content">
		<?php if( $label ) : ?>
		    <p class="label"><?php echo $label; ?></p>
		<?php endif; ?>		
		
		<?php if( $title ) : ?>
		    <h2><?php echo $title; ?></h2>            
		<?php endif; ?>

		<?php if( $content ) : ?>
		    <?php echo $content; ?>
		<?php endif; ?>
	</div>

	<!-- FAQ items -->
	<ul>

		<?php
			//Voor als je een ACF Repeater gebruikt
			if( have_rows('faqs') ){
				// Loop through rows.
				while( have_rows('faqs') ) : the_row();
					get_template_part( 'template-parts/loop', 'faq' ); 
				endwhile;
			} else {
				
				$args = array(
					'post_type' => 'faq',
				);
				$query = new WP_Query( $args );
			
				// The Loop
				if ( $query->have_posts() ) {
					
					while ( $query->have_posts() ) {
						$query->the_post();
							get_template_part( 'template-parts/loop', 'faq' );
						}
					
				} else {
					// no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata(); 
			}
		?>	
	</ul>
	<!--Einde FAQ items -->
	
</section>