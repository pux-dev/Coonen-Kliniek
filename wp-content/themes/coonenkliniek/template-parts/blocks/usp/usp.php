<?php
/**
 * The template part for displaying usp content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */

 $custom_usps = get_field('custom_usps');
 
if ($custom_usps) {
    // Create id attribute allowing for custom "anchor" value.
    $id = 'usp-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }    
}

// Indien iamge gekozen is als preview tonen we deze in Gutenberg (voeg preview_image_help toe bij acfblocks.php)
if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'usp';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$title          = get_field('usp_title');
$content        = get_field('usp_content');
$label          = get_field('usp_label');
$align          = get_field('usp_align');
$per_row        = get_field('usp_per_row');
$margin         = get_field('usp_margin_bottom');
$padding        = get_field('usp_padding');
$background     = get_field('usp_background_color'); ?>

<section  class="usp centered section <?php if ($margin) { echo $margin; } ?> <?php if ($padding) { echo $padding; } ?> <?php if ($align) { echo $align; } ?> <?php if ($per_row) { echo $per_row; } ?> <?php if ($background && $background != 'no-bg') { echo 'has-bg' . ' ' .  $background; } ?>">
	
    <?php if ($title || $content || $label) : ?>
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
    <?php endif; ?>

    
    <?php if ($custom_usps) { 
        $rows = "'usp'";
    } else {
        $rows = "'usp_items', 'options'";
    }
    
    if( have_rows('usp_items', 'options') ): ?>
        <ul class="items flex">
            <?php // Loop through rows.
            while( have_rows('usp_items', 'options') ) : the_row();  
                
                $usp_icon = get_sub_field('theme_usp_icon', ' options');
                $usp_text = get_sub_field('theme_usp_text', ' options');
                $usp_desc = get_sub_field('theme_usp_desc', ' options');
                $usp_link = get_sub_field('theme_usp_link', ' options'); ?>

                <li class="item">
                
                    <?php if( $usp_icon ) : ?>
                        <div class="icon-holder">
                            <?php echo wp_get_attachment_image( $usp_icon, 'large', '', array( 'class' => 'icon' ) ); ?>
                        </div>
                    <?php endif ?>
                    
                    <?php if( $usp_text ) : ?>        
                        <h4><?php echo $usp_text; ?></h4>
                    <?php endif ?>

                    <?php if( $usp_desc ) : ?>        
                        <p><?php echo $usp_desc; ?></p>
                    <?php endif ?>

                    <?php 

                    if( $usp_link ): 
                    $link_url = $usp_link['url']; $link_title = $usp_link['title']; $link_target = $usp_link['target'] ? $usp_link['target'] : '_self'; ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> ></a>
                    <?php endif; ?>

                </li>

            <?php endwhile; ?>
        </ul>
    <?php endif; ?>

</section>