<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header();
$error_title = get_field('error_title', 'option');
$error_content = get_field('error_content', 'option');
$error_image = get_field('error_image', 'option');
$error_img_size = 'large'; ?>

<div class="content-area error-page centered align-center section">
	<?php if( $error_image ) {
	    echo wp_get_attachment_image( $error_image, $error_img_size );
	} ?>

	<?php if ($error_title) : ?>	
		<h1><?php echo $error_title;?></h1>
	<?php endif; ?>

	<?php if ($error_content) : ?>	
		<?php echo $error_content;?>
	<?php endif; ?>	
	
</div>

<?php get_footer(); ?>
