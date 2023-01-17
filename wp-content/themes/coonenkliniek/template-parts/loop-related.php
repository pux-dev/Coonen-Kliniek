<?php
/**
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      4.5.1
 * @version    4.5.1
 */

if (is_singular( 'team' )) {
	$title 		= 'Onze overige teamleden';
} else {
	$title 		= get_field('related_title', 'options');
}

$subtitle  	= get_field('related_subtitle', 'options');
$content 	= get_field('related_content', 'options');


if (is_singular( 'team' )) {
	$related = get_posts( array( 'post_type'   => 'team', 'post__not_in' => array($post->ID) ) ); //checken of er related posts zijn (op basis van categorie)	
} elseif (is_singular( 'glossary' )) {
	$related = get_posts( array( 'post_type'   => 'glossary', 'post__not_in' => array($post->ID) ) ); //checken of er related posts zijn (op basis van categorie)	
} else {
	$related = get_posts( array( 'post_type'   => 'post', 'category__in' => wp_get_post_categories($post->ID), 'post__not_in' => array($post->ID) ) ); //checken of er related posts zijn (op basis van categorie)
}

if ($related) : ?>

	<!--  / Related items \ -->
	<section class="related carrousel stripe top">

		<?php if ($title || $content) : ?>
			<!-- Content -->
			<div class="content aligncenter centered-sm">

				<?php if( $subtitle ) : ?>
					<p class="kopje"><?php echo $subtitle; ?></p>
				<?php endif; ?>
				
				<?php if( $title ) : ?>
					<h2><?php echo $title; ?></h2>    
					<?php endif; ?>

					<?php if( $content ) : ?>
						<?php echo $content; ?> 
					<?php endif; ?>
			</div>
			<!-- Einde Content -->

		<?php endif; ?>

		<!-- Carrousel holder -->
		<div class="carrousel carrousel-holder">
			
			<!-- Carrousel -->
			<div class="owl-carousel item-carrousel ">				
				<?php if( $related ) foreach( $related as $post ) {
						setup_postdata($post);
						if (is_singular( 'team' )) {
							get_template_part( 'template-parts/loop', 'team' );
						} elseif (is_singular( 'glossary' )) {
							get_template_part( 'template-parts/loop', 'glossary' );
						} else {
							get_template_part( 'template-parts/loop', 'item' );
						}
					}					
				wp_reset_postdata(); ?>
			</div>
			<!-- Einde Carrousel -->

		</div>
		<!-- Einde Carrousel holder -->

		<!-- Navigatie arrow -->
		<div class="nav bottom">
				<a class="nav-arrow prev"></a>
				<a class="nav-arrow next"></a>
			</div>
			<!-- Einde Navigatie arrow -->
		
	</section>
	<!--  \ Einde Related items / -->
<?php endif; ?>