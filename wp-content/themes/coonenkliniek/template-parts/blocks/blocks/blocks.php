<?php
/**
 * The template part for displaying featured content
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      3.4.6
 * @version    3.4.6
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'blocks-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blocks';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
$title          = get_field('featured_title');
$content        = get_field('featured_content');
$link       	= get_field('featured_link');
if( $link ) { 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}
$image       	= get_field('featured_icon');
$margin         = get_field('featured_margin_bottom');
$background     = get_field('featured_background_color'); ?>


<section id="<?php echo esc_attr($id); ?>" class="centered <?php echo esc_attr($className); ?>  section <?php if ($margin) { echo $margin; } ?> <?php if ($background) { echo 'has-bg' . ' ' .  $background; } ?>">
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

    <!-- Blokken -->
    <div class="items grid columns-3">
        
        <!-- Blok 1 -->
        <div class="item">
            
            <!-- Image -->
            <div class="image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/desia.jpg" alt="">                
            </div>
            <!-- Einde Image -->

            <!-- Inner -->
            <div class="inner">
                <div class="label">
                    Het verhaal van Desia                
                </div>
                <div class="quote">
                    <blockquote>"In zo een moeilijke periode wil je juist niet bezig zijn met juridisch geneuzel."</blockquote>
                </div>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque pharetra tellus sed placerat. Duis blandit ex risus, ut sodales felis aliquam eu.</p>                
                </div>
            </div>
            <!-- Einde Inner -->      
            
            <a class="read-more" href="/client-ervaringen/het-verhaal-van-desia/">Lees het hele verhaal</a>

        </div>  
        <!-- Einde Block 1 -->

        <!-- Blok 2 -->
        <div class="item">            

            <!-- Inner -->
            
            <div class="inner">
                <h3>Uw situatie</h3>
                <?php 

               if( have_rows('featured_items') ):
                // Loop through rows.
                while( have_rows('featured_items') ) : the_row();
                    // Load sub field value.
                    $featured_item_title = get_sub_field('featured_item_title');
                    $featured_item_image = get_sub_field('featured_item_image');
                    $featured_item_link = get_sub_field('featured_item_link');
                    $link_url = $featured_item_link['url']; 
                    $link_title = $featured_item_link['title']; 
                    $link_target = $featured_item_link['target'] ? $featured_item_link['target'] : '_self'; ?>
                    
                    <a class="situatie" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <div class="image flex jucoce alitce">
                            <?php if( $featured_item_image ) : ?>
                                <?php echo wp_get_attachment_image( $featured_item_image, 'large', '', array( 'class' => 'image' ) ); ?>
                            <?php endif ?>                            
                        </div>
                        <?php if ($featured_item_title) : ?>
                            <p><?php echo $featured_item_title; ?></p>
                        <?php endif; ?>                        
                    </a>   

                <?php endwhile;
               endif; ?>
                
            </div>
            <!-- Einde Inner -->      
            
            <a class="read-more" href="/bijzondere-ongevallen/">Meer letselschade situaties</a>

        </div>  
        <!-- Einde blok 2 -->

        <!-- Blok 3 -->
        <div class="item">

            <!-- Inner -->
            <div class="inner">
                <div class="label">
                    Teamlid uitgelicht
                </div>
                <div class="employee flex alitce">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/han.jpg" alt="">
                    <div class="personalia">
                        <strong>Han Mossink</strong>
                        <p class="functie">Expert personenschade</p>    
                    </div>                    
                </div>
                <div class="quote">
                <blockquote>"Bij lichamelijk letsel is er vaak te weinig begrip voor de emoties van de betrokkene."</blockquote>
                </div>
                <div class="description">
                    <p>Donec euismod, justo in aliquet tristique, ante libero aliquet neque, sit amet vestibulum ipsum lorem quis sem. Donec laoreet auctor euismod. Nulla et aliquam sapien. Pellentesque vitae enim nec nunc sagittis tempor ut sed magna.</p>
                </div>
                          
            </div>
            <!-- Einde Inner -->      
            <a class="read-more" href="/team/">Meer verhalen van ons team</a> 

        </div>  
        <!-- Einde Blok 3 -->

    </div>
    <!-- Einde Blokken -->
    
</section>