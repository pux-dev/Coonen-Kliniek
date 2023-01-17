<?php
/**
 * The template part for displaying Reviews
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'reviews-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'reviews';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title              = get_field('rv_title');
$content            = get_field('rv_content');
$google_count       = get_field('google_count', 'options');
$google_score       = get_field('google_score', 'options');
$tripadvisor_count  = get_field('tripadvisor_count', 'options');
$tripadvisor_score  = get_field('tripadvisor_score', 'options');
$facebook_count     = get_field('facebook_count', 'options');
$facebook_score     = get_field('facebook_score', 'options');
$margin             = get_field('rv_margin_bottom');
$background         = get_field('rv_background_color'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> centered  alitce section  has-bg <?php if ($margin) { echo $margin; } ?> <?php if ($align) { echo $align; } ?> <?php if ($background && $background != 'no-bg') { echo 'has-bg' . ' ' .  $background; } ?>">
    <div class="reviews-bg"></div>
       
        <div class="centered-sm">

            <div class="content">
            
                <?php if( $title ) : ?>
                    <h2><?php echo $title; ?></h2>
            <?php endif; ?>               

            <?php if( $content ) : ?>
                <?php echo $content; ?>
            <?php endif; ?>
            
        </div>

        <!-- Review Companies -->
        <div class="companies grid columns-3">
                        
                <div class="company">
                    <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/google-reviews.svg" alt="review-logo">
                    <strong>Google Reviews</strong>
                    
                    <?php $a=1;
                    while ($a <= 5) : ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/review-star.svg" alt="">                    
                        <?php $a++;
                    endwhile; ?>
                    <p><?php echo $google_count;?>+ reviews</p>
                </div>

                <div class="company">
                    <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/tripadvisor-reviews.svg" alt="review-logo">
                    <strong>Tripadvisor</strong>
                    
                    <?php $a=1;
                    while ($a <= 5) : ?>
                        <span class="review-bol"></span>
                        <?php $a++;
                    endwhile; ?>
                    <p><?php echo $tripadvisor_count;?>+ reviews</p>
                </div>

                <div class="company">
                    <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/facebook-reviews.svg" alt="review-logo">
                    <strong>Facebook</strong>
                    
                    <?php $a=1;
                    while ($a <= 1) : ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/review-star.svg" alt="">                    
                        <?php $a++;
                    endwhile; ?>
                    <?php echo $facebook_score;?>/5
                    <p><?php echo $facebook_count;?>+ reviews</p>

                </div>

        </div>
        <!-- End Review companies -->
    </div>       

    <!-- Testimonials -->
    <div class="testimonials ">
        <a class="nav-arrow prev"></a>
        
		<?php
		// Parameters https://developer.wordpress.org/reference/functions/get_posts/#parameters
		$query = new WP_Query(array(
		'posts_per_page'	=> -1,
		'post_type'			=> 'testimonials',
		'suppress_filters' => true
		));
		
		if($query->have_posts()): ?>
			
			<div class="testimonial-carrousel owl-carousel">
				<?php while($query->have_posts()):
				$query->the_post();
				setup_postdata( $post );
				get_template_part( 'template-parts/loop', 'testimonial' ); ?>
				<?php endwhile; ?>
			</div>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>

        <a class="nav-arrow next"></a>
    </div>
    <!-- End Testimonials -->

</section>
