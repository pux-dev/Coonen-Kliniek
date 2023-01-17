<?php
/**
 * The template part for displaying property loop section
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      4.5.1
 * @version    4.5.1
 */
$functie    = get_field('expert_function');
$quote      = get_field('tm_quote');
$phone      = get_field('expert_phone');
$email      = get_field('expert_email');
$linkedin   = get_field('tm_linkedin');
$image      = get_field('tm_image'); ?>

<!-- Teamlid -->
<section class="sidebar-employee item">
    
    <!-- Inner -->
    <div class="inner">

        <?php if( $image ) : ?>
            <!-- Afbeelding -->
            <div class="employee-img">
                <?php echo wp_get_attachment_image( $image, 'large', '', array( 'class' => 'image' ) ); ?>
            </div>
            <!-- ### Afbeelding -->
        <?php endif ?>

        <!-- Content -->
        <div class="item-content">           
            
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
</section>   
<!-- ### Teamlid -->