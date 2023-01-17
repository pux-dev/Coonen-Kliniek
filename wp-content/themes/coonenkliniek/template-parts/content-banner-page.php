<?php
$title       = get_field('banner_title');
$content     = get_field('banner_content');
$link        = get_field('banner_link');
$image       = get_field('banner_image'); 
$subnav      = get_field('has_subnav'); 
$banner_usp  = get_field('banner_usp'); ?>

<!--  / page banner \ -->
<section class="page-banner text-image centered alitce section stripe bottom gradient <?php if ($margin) { echo $margin; } ?> <?php if ($align) { echo $align; } ?> <?php if ($background && $background != 'no-bg') { echo 'has-bg' . ' ' .  $background; } ?> <?php if ($subnav) { echo "has-subnav"; } ?>">
       
        <!--  Content -->
        <div class="content logo-backdrop">

            <?php if( $label ) : ?>
                <p class="label"><?php echo $label; ?></p>
            <?php endif; ?>
        
            <?php if( $title ) : ?>
                <h2><?php echo $title; ?></h2>
           <?php endif; ?>               

           <?php if( $content ) : ?>
               <?php echo $content; ?>
           <?php endif; ?>

           <?php if ($banner_usp) {
                get_template_part( 'template-parts/component', 'usp-list' );
            } ?>          

           <?php if( $link ): 
               $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? \ link['target'] : '_self'; ?>
               <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
           <?php endif; ?>           
           
       </div>
       <!--  Einde Content -->

       <!-- Afbeelding -->
       <div class="image">
            <?php if( $image) : ?>
                <?php echo wp_get_attachment_image( $image, 'banner_lg', '', array( 'class' => 'image' ) ); ?>
           <?php endif ?>
       </div>
       <!-- Einde afbeelding -->

        <!-- Scroll down arrow -->
        <a href="#scroll" class="scroll-down read-more">Lees verder</a>
        <!-- END Scroll down arrow -->

</section>
<!--  / end page banner \ -->

<?php
    if ($subnav) {
        get_template_part( 'template-parts/nav', 'subnav' ); 
    }
?>
