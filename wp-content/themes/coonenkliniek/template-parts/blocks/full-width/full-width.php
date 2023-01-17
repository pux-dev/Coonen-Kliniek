<?php
/**
 * The template part for displaying Text block with image
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'text+' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title          = get_field('text_title');
$content        = get_field('text_content');
$link       	= get_field('text_link');
$width          = get_field('text_background_width');
$margin         = get_field('text_margin_bottom');
$background     = get_field('text_background_color'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> section centered alitce <?php if ($margin) { echo $margin; } ?> <?php if ($align) { echo $align; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?> <?php if ($width == 'sm-width') { echo 'centered-sm'; } ?>">
       
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

            <?php if( $link ): 
                $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? \ link['target'] : '_self'; ?>
                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>            
            
        </div>       

</section>