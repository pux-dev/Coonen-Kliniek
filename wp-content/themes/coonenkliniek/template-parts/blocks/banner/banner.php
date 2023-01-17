<?php
/**
 * The template part for displaying the Banner
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'banner-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['an
    chor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title          = get_field('ban_title');
$label          = get_field('ban_label');
$content        = get_field('ban_content');
$read_more      = get_field('ban_more');
$link       	= get_field('ban_link');

if( $link ) { 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}
$image       	= get_field('ban_image');
$margin         = get_field('ban_margin_bottom');
$background     = get_field('ban_background_color'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> section grid columns-2 alitce jucoce <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
    
	<!-- Content holder -->
    <div class="content-holder flex alitce jucoce">
        <div class="content">
            <?php if( $title ) : ?>
                <h1 class="page-title"><?php echo $title; ?></h1>
            <?php endif; ?>        
            
            <?php if( $label ) : ?>
                <h4 class="label"><?php echo $label; ?></h4>
            <?php endif; ?>
                
            <?php if( $content ) : ?>
                <?php echo $content; ?>
            <?php endif; ?>

            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

            
        </div>
        <?php  if ($read_more) : ?>
            <div class="scroll read-more"><?php echo $read_more; ?></div>
        <?php endif; ?>
    </div><!-- End Content holder -->

	<?php if( $image ) : ?>
		<div class="image">
			<?php echo wp_get_attachment_image( $image, 'banner_lg', '', array( 'class' => 'banner-image' ) ); ?>
		</div>
	<?php endif; ?>
	
</section>
