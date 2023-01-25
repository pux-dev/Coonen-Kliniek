<?php
/**
 * The template part for displaying Testimonial-carrousel
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-carrousel-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial-carrousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title              = get_field('rv_title');
$content            = get_field('rv_content');
$link               = get_field('rv_link');
$margin             = get_field('rv_margin_bottom');
$background         = get_field('rv_background_color'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> centered  alitce section  <?php if ($margin) { echo $margin; } ?> <?php if ($align) { echo $align; } ?> <?php if ($background && $background != 'no-bg') { echo 'has-bg' . ' ' .  $background; } ?>">

    <!-- Content -->
    <div class="content">        
        
        <?php if( $title ) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if( $content ) : ?>
            <?php echo $content; ?>
        <?php endif; ?>
        
    </div>
    <!-- Einde Content -->        

    <!-- Testimonial Carrousel -->
    <div class="testimonials ">
                
		<?php
		// Parameters https://developer.wordpress.org/reference/functions/get_posts/#parameters
		$query = new WP_Query(array(
		'posts_per_page'	=> -1,
		'post_type'			=> 'testimonials',
		'suppress_filters' => true
		));
		
		if($query->have_posts()): ?>
			
			<div class="testimonials-carrousel owl-carousel">
				<?php while($query->have_posts()):
				    $query->the_post();
				    setup_postdata( $query );
				    get_template_part( 'template-parts/loop', 'testimonial' ); ?>                
				<?php endwhile; ?>
			</div>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>
        
        <div class="nav">
            <a class="nav-arrow prev"></a>
            <a class="nav-arrow next"></a>            
        </div>

        <?php if( $link ): 
            $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? $link['target'] : '_self'; ?>
            <a class="read-more" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>

    </div>

    <!-- End Testimonial Carrousel -->

</section>
