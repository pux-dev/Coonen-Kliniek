<?php
/**
 * The template part for displaying featured content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'featured-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title          = get_field('featured_title');
$content        = get_field('featured_content');
$link       	= get_field('featured_link');
if( $link ) { 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}
$image       	= get_field('featured_icon');
$margin         = get_field('featured_margin_bottom');
$background     = get_field('featured_background_color'); ?>


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>  section <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
    <div class="content stripe">
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

    <?php if( have_rows('items') ): ?>
        <div class="items grid columns-2">
            <?php // Loop through rows.
            while( have_rows('items') ) : the_row();
                // Load sub field value.
                $title = get_sub_field('item_title');
                $content = get_sub_field('item_content');
                $image = get_sub_field('item_image');
                $link = get_sub_field('item_link'); ?>

                <div class="item">
                    <a href="<?php the_permalink(); ?>">                    
                        <?php if( $image ) : ?>
                            <div class="image-holder">
                                <?php echo wp_get_attachment_image( $image, 'rectangle_lg', '', array( 'class' => 'image' ) ); ?>
                            </div>
                        <?php endif ?>
                        
                        <?php if ($title) : ?>
                            <h3><?php echo $title; ?></h3>
                        <?php endif; ?>

                        <?php if ($content) : ?>
                            <p><?php echo $content; ?></p>
                        <?php endif; ?>

                        <?php if( $link ): 
                        $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? \ link['target'] : '_self'; ?>
                            <a class="read-more" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>                  
                    </a>                            
                </div>
                
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    
</section>