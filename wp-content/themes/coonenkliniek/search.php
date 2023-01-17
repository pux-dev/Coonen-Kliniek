<?php
/**
 * The template for displaying Search Results pages
 */

get_header(); ?>

<div class="search-content">
	
<div class="heading<?php if ( is_active_sidebar( 'sidebar_right' ) ) : ?> heading--sidebar<?php endif; ?>">
		<h2><?php _t( 'Zoekresultaten voor: &ldquo;%s&rdquo;:', [ get_search_query() ] ); ?></h2>
	</div>
	
	
	<div class="content-area section">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="result-holder">
					<a href="<?php the_permalink() ?>">
						<h3><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
					</a>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<p><?php _t( 'We hebben helaas geen resultaten voor deze zoekterm kunnen vinden.' ); ?></p>
		<?php endif; ?>
	</div>

</div>

	
<!-- Start sidebar -->
<div class="sidebar">    
    <?php get_template_part( 'template-parts/content', 'sidebar' ); ?>
</div>
<!-- End sidebar -->

<?php get_footer(); ?>
