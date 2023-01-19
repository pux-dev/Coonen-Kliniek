<?php
$title       = get_field('banner_title');
$content     = get_field('banner_content');
$link        = get_field('banner_link');
$image       = get_field('banner_image');
$margin      = get_field('banner_margin_bottom'); ?>

<!--  / banner \ -->
<div class="banner section <?php if ($margin) { echo $margin; } ?>">

    <!--  / Image section \ -->
    <div class="banner-image">
        <?php if( $image ) : ?>
            <?php echo wp_get_attachment_image( $image, 'banner_lg', '', array( 'class' => 'image' ) ); ?>
        <?php endif ?>
        <?php get_template_part( 'template-parts/content', 'review-widget' ); ?>
    </div>
    <!--  / end Image section \ -->
        
    <!--  / content \ -->
    <div class="content flex jucoce">
        <div class="content-holder">
        
            <?php  if ($title) : ?>
                <h1 class="page-title"><?php echo $title; ?></h1>
            <?php endif; ?>

            <?php  if ($content) : ?>
                <p><?php echo $content; ?></p>
            <?php endif; ?>

            <?php if( $link ): 
            $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>          
        
        </div>
        
    </div>
    <!--  / end content \ -->

   
</div>
<!--  / end banner \ -->

