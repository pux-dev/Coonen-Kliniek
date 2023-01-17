<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link       http://codex.wordpress.org/Template_Hierarchy
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      1.0
 * @version    1.0
 */

$title          = get_field('team_page_title', 'options');
$content        = get_field('team_page_desc', 'options');  
$front_title    = get_field('team_page_front_title', 'options');
$front_content  = get_field('team_page_front_desc', 'options');  

get_header(); ?>

<!--  / content area \ -->
<div class="section aligncenter centered">
    <div class="content ">
    
        <?php 
        if( $title ) : ?>
            <h1><?php echo $title; ?></h1>
            <?php endif; ?>
        
        <?php if( $content ) : ?>
            <p><?php echo $content; ?></p>
        <?php endif; ?>

    </div>
</div>
    
<!-- /// Experts overzicht \\ -->
<section class="team-page blog-overview section centered items grid columns-4">

    <?php
        // Parameters https://developer.wordpress.org/reference/functions/get_posts/#parameters
        $query = new WP_Query(array(
        'posts_per_page'	=> -1,
        'post_type'			=> 'team',
        'orderby'			=> 'rand',
        'meta_key'      	=> 'expert_is_expert',
		'meta_value' 		=> 1,
        'suppress_filters' => true
        ));
        if($query->have_posts()): ?>
                <?php while($query->have_posts()):
                $query->the_post();
                setup_postdata( $post );
                    get_template_part( 'template-parts/loop', 'team' ); ?>
                <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif;
    ?>
</section>
<!-- \\ Experts overzicht /// -->

<!-- /// Front office overzicht \\ -->

<!--  / content area \ -->
<div class="section aligncenter centered">
    <div class="content ">
        <?php         
        if( $front_title ) : ?>
            <h1><?php echo $front_title; ?></h1>
            <?php endif; ?>
        
        <?php if( $front_content ) : ?>
            <p><?php echo $front_content; ?></p>
        <?php endif; ?>

    </div>
</div>

<section class="blog-overview section centered items grid columns-4">

    <?php
        // Parameters https://developer.wordpress.org/reference/functions/get_posts/#parameters
        $query = new WP_Query(array(
        'posts_per_page'	=> -1,
        'post_type'			=> 'team',
        'orderby'			=> 'rand',
        'meta_key'      	=> 'expert_is_expert',
		'meta_value' 		=> 0,
        'suppress_filters' => true
        ));
        if($query->have_posts()): ?>
                <?php while($query->have_posts()):
                $query->the_post();
                setup_postdata( $post );
                    get_template_part( 'template-parts/loop', 'team' ); ?>
                <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif;
    ?>
    
</section>
<!-- \\ Front office overzicht /// -->

<!--  / content area \ -->

<?php get_footer();