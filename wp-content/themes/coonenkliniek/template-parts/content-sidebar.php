<?php 

$hide_menu = get_field('sidebar_hide__menu');

//Single Team  heeft medewerker
if (is_singular( 'team' )) {
    get_template_part( 'template-parts/sidebar', 'team' );
}

//Single Team en Glossary hebben niet standaard menu
if (!is_singular( 'team' ) && !is_singular( 'glossary' ) && !$hide_menu) {
    get_template_part( 'template-parts/sidebar', 'menu' );
}

//Single team heeft geen tip van de Expert
if (!is_singular( 'team' )) {
    get_template_part( 'template-parts/sidebar', 'tip' );
} 