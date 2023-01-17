<?php
/**
 * The template part for displaying usp content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'team-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Indien iamge gekozen is als preview tonen we deze in Gutenberg (voeg preview_image_help toe bij acfblocks.php)
if( isset( $block['data']['preview_image_help'] )  ) :    /* rendering in inserter preview  */
	echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team';

$title          = get_field('team_title');
$content        = get_field('teamcontent');
$link       	= get_field('team_link');
$image       	= get_field('team_icon');
$align          = get_field('team_align');
$per_row        = get_field('team_per_row');
$margin         = get_field('team_margin_bottom');
$background     = get_field('team_background_color'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> centered section <?php if ($margin) { echo $margin; } ?> <?php if ($align) { echo $align; } ?> <?php if ($per_row) { echo $per_row; } ?> <?php if ($background && $background != 'no-bg') { echo 'has-bg' . ' ' .  $background; } ?>">
	
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
		'post_type'			=> 'team',
		'suppress_filters' => true
		));
		if($query->have_posts()): ?>
			<div class="team-members flex flwr">
				<?php while($query->have_posts()):
				$query->the_post();
				setup_postdata( $post );
				$desc 	 = get_field('team_desc', get_the_ID());
				$image   = get_field('team_image', get_the_ID());?>
					<div class="item">
						<?php if( $image ) : ?>
								<?php echo wp_get_attachment_image( $image, 'large', '', array( 'class' => 'image' ) ); ?>
						<?php endif;

						echo '<p class="h4">' . get_the_title() . '</p>';								

						if ($desc) : ?>
							<p><?php echo $desc; ?></p>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php wp_reset_postdata(); ?>
		<?php endif;
	?>
	

    
    

</section>