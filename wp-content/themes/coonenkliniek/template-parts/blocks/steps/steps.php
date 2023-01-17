<?php
/**
 * The template part for displaying steps content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'steps-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'steps';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title          = get_field('steps_title');
$content        = get_field('steps_content');
$margin         = get_field('steps_margin_bottom');
$background     = get_field('steps_background_color'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> section centered <?php if ($margin) { echo $margin; } ?> <?php if ($background && $background != 'no-bg') { echo 'has-bg' . ' ' .  $background; } ?>">
	
	<div class="content aligncenter">
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
	// Check rows exists.
	if( have_rows('steps') ): ?>

		<ul class="steps-nav flex jucoce">

			<?php while( have_rows('steps') ) : the_row();
				$step_nav_title = get_sub_field('step_nav_title');
				$index = get_row_index(); ?>				
				<li <?php if ($index == 1) { echo 'class="active"'; } ?>>
					<div class="number flex alitce jucoce"><?php echo get_row_index(); ?></div>
					<?php if ($step_nav_title) : ?>
						<div class="step-desc"><?php echo $step_nav_title;?></div>
					<?php endif; ?>
				</li>
			<?php endwhile; ?>
			
		</ul>		

		<div class="steps-carousel owl-carousel">
	
			<?php // Loop through rows.
			while( have_rows('steps') ) : the_row();
		
				// Load sub field value.
				$step_title     = get_sub_field('step_title');
				$step_content   = get_sub_field('step_content');
				$step_link      = get_sub_field('step_link');
				$step_image     = get_sub_field('step_image'); ?>

				<div class="item">
					<div class="grid alitce">

						<?php if( $step_image ) : ?>
							<div class="image">
								<?php echo wp_get_attachment_image( $step_image, 'step_lg' ); ?>
							</div>
						<?php endif; ?>

						<div class="step-content">
							
							<?php if( $step_title ) : ?>
								<h2><?php echo $step_title; ?></h2>    
							<?php endif; ?>

							<?php if( $step_content ) : ?>
								<?php echo $step_content; ?>    
							<?php endif; ?>

							<?php if ($step_link) : 
								$link_target = $step_link['target'] ? $step_link['target'] : '_self'; ?>
								<a class="read-more" href="<?php echo esc_url( $step_link['url'] ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $step_link['title'] ); ?></a>
							<?php endif; ?>


						</div>
					</div>
				</div>
			
			<?php endwhile; ?>

		</div>        
	
	<?php endif; ?>
	
</section>

<script>
	jQuery(document).ready(function ($) {		
		$('.steps-nav li').click(function(){
			var index = $(this).index();
			$('.active').removeClass('active')
			$(this).addClass('active')
			$('.steps-carousel').trigger('to.owl.carousel', index)
		});
	});
</script>