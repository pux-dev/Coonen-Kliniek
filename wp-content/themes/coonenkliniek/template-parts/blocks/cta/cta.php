<?php
/**
 * The template part for displaying CTA content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'cta-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cta';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title          = get_field('cta_title');
$content        = get_field('cta_content');
$link       	= get_field('cta_link');
if( $link ) { 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}
$image       	= get_field('cta_icon');
$margin         = get_field('cta_margin_bottom');
$background     = get_field('cta_background_color'); ?>


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> centered section has-bg flex alitce jucoce gradient-bg <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
	
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

	<?php
	if ($link) : ?>
		<div class="button-holder">
			<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
		</div>
	<?php endif; ?>

	<?php if( $image ) : ?>
		<div class="icon">
			<?php echo wp_get_attachment_image( $image, 'large', '', array( 'class' => 'image' ) ); ?>
		</div>
	<?php endif; ?>
	
</section>