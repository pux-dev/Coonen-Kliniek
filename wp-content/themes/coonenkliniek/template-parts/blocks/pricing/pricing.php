<?php
/**
 * The template part for displaying Text block with image
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
$acf_prefix = 'pricing'; //De ACF velden hebben allen een eigen prefix om benaming uniek te houden

// Create id attribute allowing for custom "anchor" value.
$id = $acf_prefix . '+' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = $acf_prefix . '';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$title          = get_field($acf_prefix . '_title');
$label          = get_field($acf_prefix . '_label');
$content        = get_field($acf_prefix . '_content');
$link       	= get_field($acf_prefix . '_link');
$width          = get_field($acf_prefix . '_background_width');
$heading_width  = get_field($acf_prefix . '_heading_width');
$sm_title       = get_field($acf_prefix . '_sm_title');
$align          = get_field($acf_prefix . '_align');
$margin         = get_field($acf_prefix . '_margin_bottom');
$background     = get_field($acf_prefix . '_background_color'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> section centered alitce <?php if ($margin) { echo $margin; } ?> <?php if ($align) { echo $align; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?> <?php if ($width == '`sm`-width') { echo 'centered-sm'; } ?> <?php if ($sm_title) { echo 'sm-title'; } ?> <?php if ($heading_width == 'sm-width') { echo 'heading-sm'; } ?>">
       
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
            $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="read-more" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
                        
        </div>

        <!-- /// Pricing Items \\ -->
        <?php if( have_rows('pricing_items') ): ?>
            <div class="pricing-section grid columns-3">
                <?php // Loop through rows.
                while( have_rows('pricing_items') ) : the_row();
                    // Load sub field value.
                    $item_title     = get_sub_field('pricing_items_title');
                    $item_price     = get_sub_field('pricing_items_price');
                    $item_options   = get_sub_field('pricing_items_options'); ?>

                    <div class="item">
                        <?php if ($item_title) {
                            echo '<h4>' . $item_title . '</h4>';
                        } ?>

                        <?php if ($item_price) {
                            echo '<p class="price">€' . $item_price . ',-</p>';
                        } ?>

                        <?php if( have_rows('pricing_items_options') ):
                            echo '<ul>';
                                // Loop through rows.
                                while( have_rows('pricing_items_options') ) : the_row();
                                    // Load sub field value.
                                    $option = get_sub_field('pricing_items_option');
                                    // Do something...

                                    echo '<li>'. $option . '</li>';
                                endwhile;
                            echo '</ul>';
                        endif; ?>
                        
                    </div>
                    
                    
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <!-- \\ Pricing Items /// -->
        

</section>