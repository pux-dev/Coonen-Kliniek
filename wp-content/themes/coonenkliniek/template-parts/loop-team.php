<?php
/**
 * The template part for displaying property loop section
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      4.5.1
 * @version    4.5.1
 */
$functie = get_field('expert_function', get_the_ID());
$quote = get_field('tm_quote', get_the_ID());
$phone = get_field('expert_phone', get_the_ID());
$email = get_field('expert_email', get_the_ID());
$linkedin = get_field('tm_linkedin', get_the_ID());
$image = get_field('tm_image', get_the_ID()); ?>

<!-- Teamlid -->
<div class="item">
    <!-- Inner -->
    <div class="inner">

        <?php if( $image ) : ?>
            <!-- Afbeelding -->
            <a href="<?php the_permalink(); ?>">
                <div class="image-holder">
                    <?php echo wp_get_attachment_image( $image, 'large', '', array( 'class' => 'image' ) ); ?>
                </div>
            </a>
            <!-- ### Afbeelding -->
        <?php endif ?>

        <!-- Content -->
        <div class="item-content">
            <a href="<?php the_permalink(); ?>">
                <h4><?php the_title(); ?></h4>  
                <?php if ($functie) : ?>
                    <?php echo $functie; ?>
                <?php endif; ?>              
            </a>           

            <?php  if( $phone ): 
                $link_url = $phone['url']; $link_title = $phone['title']; $link_target = $phone['target'] ? $phone['target'] : '_self'; ?>
                    <a class="tel" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>   
            
            <?php  if( $email ): 
                $link_url = $email['url']; $link_title = $email['title']; $link_target = $email['target'] ? $email['target'] : '_self'; ?>
                    <a class="mail" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
                                     
        </div>
        <!-- ###Content -->
        
    </div>
    <!-- ### Inner -->
</div>   
<!-- ### Teamlid -->