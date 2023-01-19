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
		<header id="headerCntr">
			<div class="headerBox flex flwr">

				<!-- /// Top Menu \\ -->
				<div class="top-menu flex jucosp">
					
					<div class="left">
						<a href="/">COONEN KLINIEK</a> & <a href="#">COONEN COOLSCULPTING</a>						  	
					</div>

					<div class="right flex">
						<?php if( $phone ): 
							$link_url = $phone['url']; $link_title = $phone['title']; $link_target = $phone['target'] ? $phone['target'] : '_self'; ?>
							<a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>

						/

						<?php if( $email ): 
							$link_url = $email['url']; $link_title = $email['title']; $link_target = $email['target'] ? $email['target'] : '_self'; ?>
							<a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>						
					</div>
					
				</div>
				<!-- \\ Top Menu /// -->

					<!-- /// Bottom Menu \\ -->
					<div class="bottom-menu flex jucosp alitce">

						<!-- /// Left \\ -->
						<div class="left">
							<?php 
							if( $logo ) : ?>
								<!--  / logo box \ -->
								<a class="logo" href="/">
									<?php echo wp_get_attachment_image( $logo, 'large', '', array( 'class' => 'logo' ) ); ?>
								</a>
								<!--  \ logo box / -->
							<?php endif ?>
						</div>
						<!-- \\ Left /// -->	

						<!-- /// Right \\ -->
						<div class="right flex alitce">
							<!--  / menu box \ -->
							<?php
								wp_nav_menu( [
									'theme_location' => 'primary-menu',						
									'container'       => 'ul',																	
								] );
								?>					
								
							<!--  \ menu box / -->

							<a href="#" class="button">Maak een afspraak</a>
						</div>
						<!-- \\ Right /// -->
						
					</div>
					<!-- \\ Bottom Menu /// -->

				</div>
			</div>

			<nav class="mobilemenu" id="mobilemenu" style="display: none;">
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