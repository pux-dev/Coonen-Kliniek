<?php
/**
 * The template part for displaying featured-blogs content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'featured-blogs-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured-blogs';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title          = get_field('featured-blogs_title');
$content        = get_field('featured-blogs_content');
$link       	= get_field('featured-blogs_link');
if( $link ) { 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}
$image       	= get_field('featured-blogs_icon');
$margin         = get_field('featured-blogs_margin_bottom');
$background     = get_field('featured-blogs_background_color'); ?>


<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>  section centered <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
    
    <!-- Content -->
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
    <!-- Einde Content -->

    <!-- Uitgelichte blogs -->
    <div class="items grid columns-2">
        
        <!-- Links -->
        <div class="left">
            <?php
            // Parameters https://developer.wordpress.org/reference/functions/get_posts/#parameters
            $query = new WP_Query(array(
            'posts_per_page'	=> 1,
            'post_type'			=> 'post',
            'suppress_filters' => true
            ));
            
            if($query->have_posts()): ?>
                
                    <?php while($query->have_posts()):
                    $query->the_post();
                    setup_postdata( $post );
                        get_template_part( 'template-parts/loop', 'item' ); ?>
                    <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>
        </div>
        <!-- Einde Links -->

        <!-- Rechts -->
        <div class="right">
        <?php
            // Parameters https://developer.wordpress.org/reference/functions/get_posts/#parameters
            $query = new WP_Query(array(
            'posts_per_page'	=> 3,
            'post_type'			=> 'post',
            'offset'            => 1,   
            'suppress_filters' => true
            ));
            
            if($query->have_posts()): ?>
                
                    <?php while($query->have_posts()):
                    $query->the_post();
                    setup_postdata( $post );
                        get_template_part( 'template-parts/loop', 'item' ); ?>
                    <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

           
            
        </div>
        <!-- Einde rechts -->  
        
        <?php if( $link ): 
        $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? $link['target'] : '_self'; ?>
        <a class="read-more" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
        
    </div>
    <!-- Einde Uitgelichte blogs -->

    
    
</section>