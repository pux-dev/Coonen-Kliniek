<?php

/**
 * The Header for our theme.
 * Displays all of the <head> section*/
$change_bg 	= get_field('change_bg');
$page_bg 	= get_field('page_bg'); ?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
	<?php wp_head() ?>
</head>

<body <?php body_class($page_bg ); ?>>
 	
 	<?php get_template_part( 'template-parts/nav', 'header' ); ?>