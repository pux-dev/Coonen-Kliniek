<?php
/**
 * The template used for displaying page content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      4.5.1
 * @version    4.5.1
 */

// Load the ACF content
if ( have_rows( 'content' ) ) {
	while ( have_rows( 'content' ) ) {
		the_row();
		if ( get_row_layout() == 'text' ):
			get_template_part( 'template-parts/content', 'text' );		
		elseif ( get_row_layout() == 'text-image' ):
			get_template_part( 'template-parts/content', 'text-image' );
		elseif ( get_row_layout() == 'columns' ):
			get_template_part( 'template-parts/content', 'columns' );		
		elseif ( get_row_layout() == 'cta' ):
			get_template_part( 'template-parts/content', 'cta' );
		elseif ( get_row_layout() == 'usp' ):
			get_template_part( 'template-parts/content', 'usp' );
		elseif ( get_row_layout() == 'testimonials' ):
			get_template_part( 'template-parts/content', 'testimonials' );
		elseif ( get_row_layout() == 'steps' ):
			get_template_part( 'template-parts/content', 'steps' );
		elseif ( get_row_layout() == 'blog' ):
			get_template_part( 'template-parts/content', 'blog' );
		elseif ( get_row_layout() == 'form' ):
			get_template_part( 'template-parts/content', 'form' );
		elseif ( get_row_layout() == 'client-carousel' ):
			get_template_part( 'template-parts/content', 'client-carousel' );
		endif;
	}
} ?>
