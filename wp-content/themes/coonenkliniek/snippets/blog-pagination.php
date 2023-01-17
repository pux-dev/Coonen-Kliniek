<?php
/**
 * Snippet voor weergeven van pagination
 * CSS staat in css/pagination.css
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      4.5.1
 * @version    4.5.1
 */ ?>

    <?php the_posts_pagination( [
    	'prev_text' => __( '', 'textdomain' ),
    	'next_text' => __( '', 'textdomain' ),
    ] ); ?>
