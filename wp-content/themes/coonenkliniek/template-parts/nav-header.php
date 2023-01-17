<?php
/**
 * Template Name: Header
 *
 *
 */ 
$logo 	= get_field('logo', 'options');
$email 	= get_field('email', 'options');
$phone 	= get_field('phone', 'options');
$has_banner = get_field('has_banner'); ?>

<!--  / wrapper \ -->
<div id="wrapper">

	<!--  / main container \ -->
	<div id="mainCntr">
		<!--  / header container \ -->
		<header id="headerCntr" class="centered">
			<div class="headerBox flex jucosp">

				<?php 
				if( $logo ) : ?>
					<!--  / logo box \ -->
					<a class="logo" href="/">
						<?php echo wp_get_attachment_image( $logo, 'large', '', array( 'class' => 'logo' ) ); ?>
					</a>
					<!--  \ logo box / -->
				<?php endif ?>

				<div class="menu">
					
					
					<div class="top-menu flex jucoen alitce">						
						<?php if( $phone ): 
						$link_url = $phone['url']; $link_title = $phone['title']; $link_target = $phone['target'] ? \ link['target'] : '_self'; ?>
							<a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/phone.svg" alt="phone-icon"><span><?php echo esc_html( $link_title ); ?></span></a>
						<?php endif; ?>

						<?php if( $email ): 
						$link_url = $email['url']; $link_title = $email['title']; $link_target = $email['target'] ? \ link['target'] : '_self'; ?>
							<a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/email.svg" alt="email-icon"><span><?php echo esc_html( $link_title ); ?></span></a>
						<?php endif; ?>
					</div>

					<div class="bottom-menu">
						<!--  / menu box \ -->
						<?php
							wp_nav_menu( [
								'theme_location' => 'primary-menu',						
								'container'       => 'ul',																	
							] );
							?>					
							
						<!--  \ menu box / -->
					</div>
				</div>
			</div>

			<nav class="mobilemenu" id="mobilemenu">
				<!--  / menu box \ -->
				<?php
							wp_nav_menu( [
								'theme_location' => 'primary-menu',						
								'container'       => 'ul',																	
							] );
							?>					
							
						<!--  \ menu box / -->
			</nav>
						
			<a class="mobileMenu" href="#mobilemenu">	
				<div class="bar1"></div>
  				<div class="bar2"></div>
  				<div class="bar3"></div>
			</a>
			
		</header>
		<!--  \ header container / -->

		<!--  / content container \ -->
		<main id="contentCntr" <?php if (!$has_banner) { echo 'class="banner-padding"'; } ?>>