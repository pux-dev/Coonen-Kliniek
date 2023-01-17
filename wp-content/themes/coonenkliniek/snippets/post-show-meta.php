<?php
/*
**Toont de belangrijke meta op de single post
**Zie: https://developer.wordpress.org/reference/functions/get_the_author_meta/
*/
?>

Geschreven door <?php echo the_author_meta('first_name'); ?> op <?php echo get_the_date();?>