 <?php
 $logo			= get_field('logo', 'options');
 $email			= get_field('email', 'options');
 $phone			= get_field('phone', 'options');
 $adress		= get_field('adress', 'options');
 $footer_info	= get_field('footer_info', 'options'); ?>

 </div>
 <!--  \ content area / -->
 </main>
		<!--  \ content container / -->
		
		<!--  / footer container \ -->
		<footer id="footerCntr">

 		<!--  / Top Footer \ -->	
		<div class="top-footer centered">
				
			<div class="inner flex jucosp">
				<?php if( $logo ) : ?>
					<div class="logo">
						<?php echo wp_get_attachment_image( $logo, 'large', '', array( 'class' => 'style-svg' ) ); ?>
					</div>
				<?php endif ?>

			</div>					
			
		</div>
		<!--  \ Top Footer / -->
		
			<!--  / copyright box \ -->
			<div class="holder centered grid columns-4">
				
			<!-- / Company info \ -->
			<div class="widget">
				<div class="title"><?php echo get_bloginfo('name'); ?></div>					
				<?php if ($adress) {
					echo '<p>' . $adress . '</p>';
				}

				if( $phone ): 
				$link_url = $phone['url']; $link_title = $phone['title']; $link_target = $phone['target'] ? \ link['target'] : '_self'; ?>
					<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">T: <?php echo esc_html( $link_title ); ?></a><br>
				<?php endif;

				if( $email ): 
				$link_url = $email['url']; $link_title = $email['title']; $link_target = $email['target'] ? \ link['target'] : '_self'; ?>
					<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">E: <?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>

				<!-- Social icons -->
				<?php if( have_rows('socials', 'options') ): ?>
					<div class="social">
						<?php // Loop through rows.
						while( have_rows('socials', 'options') ) : the_row();
							// Load sub field value.
							$social_link = get_sub_field('social_link');
							$social_icon = get_sub_field('social_icon');
							// Do something...
							if( $social_link ): 
							$link_url = $social_link['url']; $link_title = $social_link['title']; ?>
								<a href="<?php echo esc_url( $link_url ); ?>" target="_blank"><?php echo wp_get_attachment_image( $social_icon, 'large', '', array( 'class' => 'social-icon' ) ); ?></a>
							<?php endif; ?>
						<?php endwhile; ?>
					</div>	
				<?php endif; ?>
				<!-- Einde Social icons -->
			</div>
			<!-- \ Company info / -->

			<!-- / Footer menu A \ -->
			<div class="widget">
				<div class="title">Uw situatie</div>
				<?php wp_nav_menu( [
					'theme_location' => 'footer_menu_a',							
				] ); ?>

				
			</div>
			<!-- \ Footer menu A / -->

			<!-- / Footer menu B \ -->
			<div class="widget">
				<div class="title">Begrippenlijst</div>
				<?php
					// Parameters https://developer.wordpress.org/reference/functions/get_posts/#parameters
					$query = new WP_Query(array(
					'posts_per_page'	=> 10,
					'post_type'			=> 'glossary',
					'orderby'			=> 'rand',
					'suppress_filters' => true
					));
					if($query->have_posts()): ?>
						<div class="items">
							<?php while($query->have_posts()):
							$query->the_post();
							$custom_field   = get_field('custom_field');
							setup_postdata( $post ); ?>
								<div class="item">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
							<?php endwhile; ?>
						</div>
					<?php wp_reset_postdata(); ?>
					<?php endif;
				?>
			</div>
			<!-- \ Footer menu B / -->

			<!-- / Footer menu C \ -->
			<div class="widget">
				<div class="title">Laatste nieuws</div>
				<?php
					// Parameters https://developer.wordpress.org/reference/functions/get_posts/#parameters
					$query = new WP_Query(array(
					'posts_per_page'	=> 5,
					'post_type'			=> 'post',					
					'suppress_filters' => true
					));
					if($query->have_posts()): ?>
						<div class="items">
							<?php while($query->have_posts()):
							$query->the_post();
							$custom_field   = get_field('custom_field');
							setup_postdata( $post ); ?>
								<div class="item">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
							<?php endwhile; ?>
						</div>
					<?php wp_reset_postdata(); ?>
					<?php endif;
				?>				
			</div>
				</div>				
			</div>
			<!-- \ Footer menu C / -->
			
		</footer>
		<!--  \ footer container / -->


		<div class="subfooter flex alitce jucoce">
		<div class="copyrightBox centered">
				<ul class="flex">
					<li class="copy">&copy;<?php echo date('Y');?> <?php echo get_bloginfo('name'); ?></li>
					<?php
					wp_nav_menu( [
						'theme_location' => 'copyright_menu',							
					] );
					?>					
			</div>
			<!--  \ copyright box / -->
		</div>
	</div>
	<!--  \ main container / -->
	</div>

	<div class="whatsapp">
		<a href="https://wa.me/31332537200">
			WhatsApp ons
		</a>
	</div>
		

	<!--  \ wrapper / -->
	<?php wp_footer(); ?>
</body>

</html>