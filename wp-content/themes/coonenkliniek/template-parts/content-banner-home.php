<?php
$title       = get_field('banner_title');
$banner_icon = get_field('banner_icon');
$link        = get_field('banner_link'); ?>

<div class="banner-home section sm-margin flex alitce jucoce">
    <img class="cloud" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/cloud.png" alt="cloud">    
    <img class="cloud" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/cloud.png" alt="cloud">
    <img class="cloud" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/cloud.png" alt="cloud">
    <div class="trees"></div>
    <div class="windmill"></div>
    <div class="grass"></div>               
    
    <div class="inner centered">        
        
        <div class="content">

            <?php if( $banner_icon ) : ?>
                <?php echo wp_get_attachment_image( $banner_icon, 'large', '', array( 'class' => 'badge' ) ); ?>
            <?php endif ?>

            <?php  if ($title) : ?>
                <h1 class="page-title"><?php echo $title; ?></h1>
            <?php endif; ?>

            <div class="bikes">

            <?php
               $featured_posts = get_field('banner_bikes');
               if( $featured_posts ):
                $count = count(get_field('banner_bikes')); ?>
                <ul class="grid columns-<?php echo $count; ?>">
                    <?php foreach( $featured_posts as $post ):
               
                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post);
                        $bike_link  = get_field('cyclerent_link', get_the_ID());
                        $bike_icon  = get_field('bike_icon', get_the_ID());
                        $bike_price_half   = get_field('bike_price_half');
                        $bike_price_three   = get_field('bike_price_three');
                        $bike_price_extra   = get_field('bike_price_extra');
                        $per_halve_dag      = get_field('per_halve_dag');
                        $bike_price = get_field('bike_price', get_the_ID());
                        if ($per_halve_dag) {
                            $from_price = $bike_price_half;
                        } else {
                            $from_price = ($bike_price_three + $bike_price_extra) / 4; //Goedkoopste dagprijs (dag 3) + extra dag, delen door 4
                            $from_price = number_format($from_price, 2, ',', ' '); //komma ipv punt als output
                        } ?>               
                        
                        <?php if( $bike_link ): 
                                $link_url = $bike_link['url']; $link_title = $bike_link['title']; $link_target = $bike_link['target'] ? \ link['target'] : '_self'; ?>
                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                    <?php if( $bike_icon ) : ?>
                                        <?php echo wp_get_attachment_image( $bike_icon, 'full', '', array( 'class' => 'bike-icon' ) ); ?>
                                    <?php endif ?>
                                    <h4><?php the_title(); ?></h4>
                                    v.a. €<?php echo $from_price; ?>
                                    <?php if ($per_halve_dag) {
                                        _e( 'per halve dag', 'van-dam' );
                                    } else _e( 'per dag', 'van-dam' ); 
                                    ?> 
                                </a>
                            <?php endif; ?>  
                        
                    <?php endforeach; ?>
                        </ul>
                <?php 
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata(); ?>
               <?php endif; ?>
                
            </div>

            <?php if( $link ): 
            $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? \ link['target'] : '_self'; ?>
                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>            
            
        </div>             
        
    </div>        
   
</div>


