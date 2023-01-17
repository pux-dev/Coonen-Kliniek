<?php
$title       = get_field('banner_title');
$content     = get_field('banner_content');
$link        = get_field('banner_link');
$image       = get_field('banner_image');
$banner_usp  = get_field('banner_usp');?>

<!--  / banner \ -->
<div class="banner section">
    
    <!--  / inner \ -->
    <div class="inner flex alitce">
        
        <!--  / content \ -->
        <div class="content flex jucoce">
            <div class="content-holder logo-backdrop">
            
                <?php  if ($title) : ?>
                    <h1><?php echo $title; ?></h1>
                <?php endif; ?>

                <?php  if ($content) : ?>
                    <p><?php echo $content; ?></p>
                <?php endif; ?>

                <?php if( $link ): 
                $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? \ link['target'] : '_self'; ?>
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>               
            
            </div>
            
        </div>
        <!--  / end content \ -->

        <!--  / Image section \ -->
        <div class="banner-image">
            <?php if( $image ) : ?>
                <?php echo wp_get_attachment_image( $image, 'banner_lg', '', array( 'class' => 'image' ) ); ?>
            <?php endif ?>
            <?php get_template_part( 'template-parts/content', 'review-widget' ); ?>
        </div>
        <!--  / end Image section \ -->
        
        <!-- Scroll down arrow -->
        <a href="#scroll" class="scroll-down read-more">Lees verder</a>
        <!-- END Scroll down arrow -->
        
    </div> <!--  / end inner \ -->

    <?php if ($banner_usp) : ?>
        <!--  / USP section \ -->
        <div class="usp">
            <?php
            if( have_rows('banner_usp_items') ): ?>
                <!-- USP items -->
                <div class="items slidedown grid columns-4 centered">
                    <?php // Loop through rows.
                    while( have_rows('banner_usp_items') ) : the_row();
                        // Load sub field value.
                        $usp_title   = get_sub_field('banner_usp_iem_title');
                        $usp_content = get_sub_field('banner_usp_iem_content'); ?>

                        <div class="item">
                            
                            <?php if ($usp_title) : ?>
                                <h4><?php echo $usp_title; ?></h4>
                            <?php endif; ?>

                            <?php if ($usp_content) : ?>
                                <div class="usp-content" style="display: none;">
                                    <p><?php echo $usp_content;?></p>
                                </div>
                            <?php endif; ?>

                            

                    </div>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        <!--END USP items -->
    <?php endif; ?>
  
    </div>
    <!--  / END USP section \ -->
   
</div>
<!--  / end banner \ -->

