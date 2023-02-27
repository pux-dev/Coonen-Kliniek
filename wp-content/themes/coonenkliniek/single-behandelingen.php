<?php
/**
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */
the_post();

get_header();
$intro = get_field('behandel_intro');
$payoff = get_field('behandel_payoff'); ?>

<?php 

get_template_part( 'template-parts/content', 'banner-page' );

//Breadcrumbs
if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
} ?>

<!--  / content area \ -->

    <div class="section centered-sm">
        
        <!-- /// Intro \\ -->
        <div class="intro">
            <?php if ($payoff) {
                echo '<p class="payoff">' . $payoff . '</p>';
            } ?>

            <?php if ($intro) {
                echo $intro;
            } ?>
        </div>
        <!-- \\ Intro /// -->

    </div>

    <!-- /// Uitvouw content \\ -->
    <div class="uitvouw faq section sm-margin">
        <?php if( have_rows('behandel_items') ): 
            $counter = 1; ?>
            <ul class="items">
                <?php // Loop through rows.
                while( have_rows('behandel_items') ) : the_row();
                    // Load sub field value.
                    $item_title = get_sub_field('behandel_item_title');
                    $item_content = get_sub_field('behandel_item_content'); ?>
                    
                    <li class="centered-sm <?php if ($counter == 1) { echo 'active'; } ?>">
                        <h2 class="question"><?php echo $item_title; ?></h4>
                        <article class="answer">
                            <div class="inner">
                                <p><?php echo $item_content; ?></p>
                            </div>
                        </article>                            
                    </li>            
                    
                <?php 
                $counter++;
            endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>
        
    <!-- \\ Uitvouw content /// -->

    <!-- /// CTA Button \\ -->
    <div class="section centered-sm flex jucoce">
        <a href="#/" class="button">Plan een afspraak</a>
    </div>
    <!-- \\ CTA Button /// -->

    <div class="usp-section section">
        
    </div>

    <!-- /// Testimonials \\ -->
    <div class="reviews section">
        <?php get_template_part( 'template-parts/blocks/testimonials/testimonial', 'carousel' ); ?>
    </div>
    <!-- \\ Testimonials /// -->

    

<!--  / content area \ -->

<?php get_footer();