<?php
/**
 * The template part for displaying CONTACT-CTA content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.

$label          = get_field('vacature_cta_label', 'options');
$title          = get_field('vacature_cta_title', 'options');
$content        = get_field('vacature_cta_desc', 'options');
$employee       = get_field('vacature_cta_employee', 'options'); ?>

<section class="vacature-cta contact-cta stripe top centered section has-bg main-bg grid no-margin">
	
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

        <?php 
        if( $employee ): ?>
            <!-- Medewerker -->
            <div class="employee flex alitce">
                <?php if( $employee ):
                    $expert_function = get_field( 'expert_function', $employee->ID );
                    $phone = get_field('expert_phone', $employee->ID);
                    $email = get_field('expert_email', $employee->ID);
                    $linkedin = get_field('tm_linkedin', $employee->ID);
                    $image = get_field('tm_image', $employee->ID); ?>
                        
                        <?php echo wp_get_attachment_image( $image, 'large', '', array( 'class' => 'image' ) ); ?>

                        <div class="personalia">
                            <strong><?php echo esc_html( $employee->post_title ); ?></strong>
                            
                            <?php if ($functie) : ?>
                                <?php echo $functie; ?>
                            <?php endif; ?>  
                            
                            <?php  if( $phone ): 
                                $link_url = $phone['url']; $link_title = $phone['title']; $link_target = $phone['target'] ? $phone['target'] : '_self'; ?>
                                    <a class="tel" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>   
                            
                            <?php  if( $email ): 
                                $link_url = $email['url']; $link_title = $email['title']; $link_target = $email['target'] ? $email['target'] : '_self'; ?>
                                    <a class="mail" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div>                    
                    </div>                    
            </div>
            <!-- Einde medewerker -->
            <?php 
            // Reset the global post object so that the rest of the page works correctly.
                endif; ?>
        <?php endif; ?>	

	<!-- Einde Content  -->

	<!-- Contactformulier -->
	<div class="contact-form">
		<?php echo do_shortcode('[contact-form-7 id="5" title="Advies aanvragen"]'); ?>
		
	</div>
	<!-- Einde Contactformulier -->

	
</section>
