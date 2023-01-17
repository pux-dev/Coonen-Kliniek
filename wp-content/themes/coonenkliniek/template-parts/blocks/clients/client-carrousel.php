<?php
/**
 * The template part for displaying carrousel content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'client-carrousel-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'client-carrousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title          = get_field('client_carrousel_title');
$content        = get_field('client_carrousel_content');
$link       	= get_field('client_carrousel_link');
if( $link ) { 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}
$image       	= get_field('client_carrousel_icon');
$margin         = get_field('client_carrousel_margin_bottom');
$background     = get_field('client_carrousel_background_color'); ?>


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> section aligncenter <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
	
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
        // Parameters https://developer.wordpress.org/reference/functions/get_posts/#parameters
        $query = new WP_Query(array(
        'posts_per_page'	=> -1,
        'post_type'			=> 'clients',
        'orderby'			=> 'rand',
        'suppress_filters' => true
        ));
        if($query->have_posts()): ?>
            <div class="logo-carrousel owl-carousel">
                <?php while($query->have_posts()):
                $query->the_post();
                setup_postdata( $post );
                $image      = get_field('partner_logo', get_the_ID());
                $link       = get_field('partner_link', get_the_ID());?>
                    <div class="item">
                        <?php if( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image, 'partner_logo', '', array( 'class' => 'partner-logo' ) ); ?>
                        <?php endif ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php wp_reset_postdata(); ?>
        <?php endif;
    ?>        
        
    
    <div class="nav">
        <a class="nav-arrow prev orange"></a>
        <a class="nav-arrow next orange"></a>
    </div>
	
</section>