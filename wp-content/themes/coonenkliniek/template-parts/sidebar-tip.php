<?php
/**
 * The template part for displaying property loop section
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      4.5.1
 * @version    4.5.1
 */ ?>

<?php
    // Parameters https://developer.wordpress.org/reference/functions/get_posts/#parameters
    $query = new WP_Query(array(
    'posts_per_page'	=> 1,
    'post_type'			=> 'team',
    'orderby'			=> 'rand',
    'meta_key'      	=> 'expert_tip',
    'meta_value' => ' ',
    'meta_compare' => '!=',
    'suppress_filters' 	=> true
    ));
    if($query->have_posts()): ?>
        <!-- Medewerker -->
        <section class="sidebar-tip shadow">
            <?php while($query->have_posts()):
                $query->the_post();
                setup_postdata( $post );
                $expert_function	= get_field('expert_function', get_the_ID());
                $expert_phone   	= get_field('expert_phone', get_the_ID());
                $expert_email   	= get_field('expert_email', get_the_ID());
                $expert_image   	= get_field('tm_image', get_the_ID()); 
                $expert_tip       	= get_field('expert_tip', get_the_ID()); 
                ?>
                
                <div class="tip">
                        <p class="label">Tip van de expert</p>
                        <p class="quote">"<?php echo $expert_tip;?>"</p>
                    </div>
                    <div class="employee flex alitce">
                        <?php if( $expert_image ) : ?>
                            <!-- Afbeelding -->
                                <?php echo wp_get_attachment_image( $expert_image, 'large', '', array( 'class' => 'image' ) ); ?>
                            <!-- ### Afbeelding -->
                        <?php endif ?>
                        <div class="personalia ">
                            <strong><?php the_title(); ?></strong>
                            <p><?php echo $expert_function; ?></p>        
                        </div>
                    </div>
                
            <?php endwhile; ?>
        </section>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>

<!-- Teamlid -->