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
$id = 'text-image-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-image';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$label          = get_field('ct_label');
$title          = get_field('ct_titel');
$content        = get_field('ct_content');
$image       	= get_field('ct_image');
$link       	= get_field('ct_link');
$square_image  	= get_field('ct_square_image');
$align 	        = get_field('ct_align');
$margin         = get_field('ct_margin_bottom');
$background     = get_field('ct_background_color');

if ($square_image) {
    $image_size = 'square_lg';
} else {
    $image_size = 'large';
} ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> centered  alitce section <?php if ($margin) { echo $margin; } ?> <?php if ($align) { echo $align; } ?> <?php if ($background && $background != 'no-bg') { echo 'has-bg' . ' ' .  $background; } ?>">
       
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
               <a class="read-more" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
           <?php endif; ?>            
           
       </div>

       <div class="image">
            <?php echo $new_title; ?>    
            
            <?php if( $image && !$image_as_drop ) : ?>
               <?php echo wp_get_attachment_image( $image, $image_size, '', array( 'class' => 'image' ) ); ?>
           <?php endif ?>
           
       </div>

</section>
