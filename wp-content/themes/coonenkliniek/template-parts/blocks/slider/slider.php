<?php
/**
 * The template part for displaying slider content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title          = get_field('slider_title');
$content        = get_field('slider_content');
$margin         = get_field('slider_margin_bottom');
$background     = get_field('slider_background_color'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>  section <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">

	<?php if( have_rows('slider') ): ?>
		<div class="owl-slider owl-carousel">
			<?php // Loop through rows.
			while( have_rows('slider') ) : the_row();
				// Load sub field value.
				$title = get_sub_field('slide_title');
				$image = get_sub_field('slide_image');
				$link = get_sub_field('slide_link');
				$label = get_sub_field('slide_label'); ?>
				
				<div class="item inner <?php if ($label) { echo $label; } ?>">
					<?php if( $image ) : ?>
						<?php echo wp_get_attachment_image( $image, 'rectangle_lg', '', array( 'class' => 'image' ) ); ?>
					<?php endif ?>
					
					<div class="overlay"></div>
					
					<?php if ($label) : ?>
						<div class="label">
							<?= $label; ?>
						</div>
					<?php endif; ?>
					
					<div class="content">
						<?php  if ($title) : ?>
							<h3><?php echo $title; ?></h3>
						<?php endif; ?>

						<?php if( $link ): 
						$link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? \ link['target'] : '_self'; ?>
							<a class="read-more" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
					
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

	<img class="nav prev" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/arrow.svg" alt="nav-links">
	<img class="nav next" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/arrow.svg" alt="nav-rechts">
	
</section>