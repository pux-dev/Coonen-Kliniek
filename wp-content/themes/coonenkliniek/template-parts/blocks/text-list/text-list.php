<?php
/**
 * The template part for displaying text-list block with image
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'text-list+' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-list';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title          = get_field('op_title');
$content        = get_field('op_content');
$label       	= get_field('op_label');
$image       	= get_field('op_image');
$image       	= get_field('op_image');
$link       	= get_field('op_link');
$margin         = get_field('op_margin_bottom');
$background     = get_field('op_background'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> centered section grid columns-2 <?php if ($margin) { echo $margin; } ?> <?php if ($align) { echo $align; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
       
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

            <?php if( have_rows('op_opsomming') ): ?>
                <ul class="usp">
                    <?php // Loop through rows.
                    while( have_rows('op_opsomming') ) : the_row();
                        // Load sub field value.
                        $op_item_title = get_sub_field('op_item_title');
                        $op_item_icon = get_sub_field('op_item_icon'); ?>
                        
                        <li class="item flex alitce">
                            <?php if( $op_item_icon ) : ?>
                                <div class="icon-holder flex alitce jucoce">
                                    <?php echo wp_get_attachment_image( $op_item_icon, 'large', '', array( 'class' => 'icon' ) ); ?>
                                </div>
                            <?php endif ?>                    
                            <h3><?php echo $op_item_title; ?></h3>
                        </li>
                        
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>           

            <?php if( $link ): 
                $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? \ link['target'] : '_self'; ?>
                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>            
            
        </div>        
        
        <?php
           if( have_rows('op_images') ):            
            $count = count(get_field('op_images')); ?>
            
            <div class="image-holder grid <?php if ($count > 1) { echo 'columns-2'; } ?>">

                <?php // Loop through rows.
                while( have_rows('op_images') ) : the_row();
                    // Load sub field value.
                    $image = get_sub_field('op_image');
                    // Do something...
                if( $image ) : ?>
                        <?php echo wp_get_attachment_image( $image, 'large', '', array( 'class' => 'image' ) ); ?>
                <?php endif;

                endwhile; ?>
            </div>

           <?php endif; ?>
            
        </div>
</section>