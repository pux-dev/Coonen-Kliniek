<?php
/**
 * The template part for displaying gallery content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'gallery-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'gallery';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title          = get_field('gallery_title');
$content        = get_field('gallery_content');
$align         	= get_field('gallery_align');
$per_row      	= get_field('gallery_per_row');
$margin         = get_field('gallery_margin_bottom');
$background     = get_field('gallery_background_color'); ?>


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>  section aligncenter <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
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

	<!-- Image gallery -->
	<div class="gallery-holder">
		<?php 
		if( have_rows('gallery') ): ?>		
		
			<div class="items grid <?php if (!empty($per_row))  { echo 'columns-' . $per_row; } else {echo 'columns-3'; } ?>">
				<?php // Loop through rows. 
				
				while( have_rows('gallery') ) : the_row();
					// Load sub field value.
					$item = get_sub_field('gallery_item'); ?>
					<?php if( $item ) : ?>
						<div class="item">
							<div class="image-holder">
								<a href="<?php echo wp_get_attachment_image_url($item, 'large'); ?>" data-fancybox="images">
									<?php echo wp_get_attachment_image( $item, 'square_lg', '', array( 'class' => 'image-thumb' ) ); ?>
								</a>
							</div>
						</div>
					<?php endif ?>
						
					
				<?php endwhile; ?>
			</div>
		<?php endif; ?>		
	</div> <!-- END Image gallery -->
	
</section>