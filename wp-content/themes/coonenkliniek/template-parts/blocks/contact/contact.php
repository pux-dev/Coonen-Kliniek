<?php
/**
 * The template part for displaying CONTACT content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'contact-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$label          = get_field('ctcf_label');
$title          = get_field('ctcf_title');
$content        = get_field('ctcf_content');
$link       	= get_field('ctcf_link');
if( $link ) { 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}
$image       	= get_field('ctcf_image');
$margin         = get_field('ctcf_margin_bottom');
$background     = get_field('ctcf_background_color'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> centered section has-bg grid <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
	<!-- /// Linkerzijde \\ -->
	<div class="left">
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
		</div>
		<!-- \\ Content /// -->

		<!-- /// Contact details \\ -->
		<div class="contact-details grid columns-2">

			<!-- /// Links \\ -->
			<div class="left">
				<!-- /// Contact optie \\ -->
				<div class="contact-option flex">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/phone-icon.svg" alt="">				
					</div>
					<div class="ctc">
						<strong>Telefoon</strong>
						<a href="/#">033 253 72 00</a>	
					</div>
				</div>
				<!-- \\ Contact optie /// -->

				<!-- /// Contact optie \\ -->
				<div class="contact-option flex">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/email-icon.svg" alt="">
					</div>
					<div class="ctc">
						<strong>E-mail</strong>
						<a href="/#">info@kloppenborgnli.nl</a>	
					</div>
				</div>
				<!-- \\ Contact optie /// -->

				<!-- /// Contact optie \\ -->
				<div class="contact-option flex">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/whatsapp.svg" alt="">				
					</div>
					<div class="ctc">
						<strong>Whatsapp</strong>
						<a href="/#">033 253 72 00</a>	
					</div>
				</div>
				<!-- \\ Contact optie /// -->
			</div>
			<!-- \\\ Links // -->

			<!-- /// Rechts \\ -->
				<div class="right">
				<!-- /// Contact optie \\ -->
				<div class="contact-option flex">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/marker.svg" alt="">				
					</div>
					<div class="ctc">
						<strong>Adres & Route</strong>
						<p>Basicweg 14D <br>
						3821 BR Amersfoort
						<strong><a href="/#">Plan route ></a></strong>
						</p>
					</div>
				</div>
				<!-- \\ Contact optie /// -->

				<!-- /// Contact optie \\ -->
				<div class="contact-option flex">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/beeldmerk-icon.svg" alt="">				
					</div>
					<div class="ctc">
						<strong>Kloppenburg NLI</strong>
						<p>BTW: NL 859698798B01 <br>
						KVK: 73885932</p>
					</div>
				</div>
				<!-- \\ Contact optie /// -->
			</div>
			<!-- \\\ Rechts // -->			
			
		</div>
		<!-- \\\ Contact details // -->

		<!-- Einde Content  -->
	</div>
	<!-- \\\ Linkerzijde /// -->

	<!-- /// Rechterzijde \\ -->
		<!-- Contactformulier -->
		<div class="rechterzijde">
			<div class="contact-form">
				<?php echo do_shortcode('[contact-form-7 id="5" title="Advies aanvragen"]'); ?>
			</div>
		</div>
		<!-- Einde Contactformulier -->
	<!-- \\ Rechterzijde /// -->

	
</section>