<?php
/**
 * The template part for displaying CONTACT-CTA content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */

$label          = get_field('special_cta_label', 'options');
$title          = get_field('special_cta_title', 'options');
$content        = get_field('special_cta_desc', 'options'); ?>

<section class="contact-cta stripe top centered section has-bg grid <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
	
	<!-- Content  -->
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

		<?php
		// Parameters https://developer.wordpress.org/reference/functions/get_posts/#parameters
		$query = new WP_Query(array(
		'posts_per_page'	=> 1,
		'post_type'			=> 'team',
		'orderby'			=> 'rand',
		'meta_key'      	=> 'expert_is_expert',
		'meta_value' 		=> 1,
		'suppress_filters' => true
		));
		if($query->have_posts()): ?>
			<!-- Medewerker -->
			<div class="employee flex alitce">
				<?php while($query->have_posts()):
				$query->the_post();
				setup_postdata( $post );
				$expert_function	= get_field('expert_function', get_the_ID());
				$expert_phone   	= get_field('expert_phone', get_the_ID());
				$expert_email   	= get_field('expert_email', get_the_ID());
				$expert_image   	= get_field('tm_image', get_the_ID());

				if( $expert_image ) : ?>
					<?php echo wp_get_attachment_image( $expert_image, 'large', '', array( 'class' => 'image' ) ); ?>
				<?php endif ?>

					<div class="personalia">
						<strong><?php the_title(); ?></strong>
							
						<p class="functie"><?php echo $expert_function; ?></p>
						
						<?php if( $expert_phone ): 
							$link_url = $expert_phone['url']; $link_title = $expert_phone['title']; $link_target = $expert_phone['target'] ? $expert_phone['target'] : '_self'; ?>
							<a class="tel" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>

						<?php if( $expert_email ): 
							$link_url = $expert_email['url']; $link_title = $expert_email['title']; $link_target = $expert_email['target'] ? $expert_email['target'] : '_self'; ?>
							<a class="mail" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
					</div> 

				<?php endwhile; ?>
			</div>
			<!-- Einde medewerker -->
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>

		
		
			                   
		

	</div>
	<!-- Einde Content  -->

	<!-- Contactformulier -->
	<div class="contact-form">
		<?php echo do_shortcode('[contact-form-7 id="5" title="Advies aanvragen"]'); ?>
		
	</div>
	<!-- Einde Contactformulier -->

	
</section>