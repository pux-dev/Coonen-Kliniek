 <?php
 $footer_logo	= get_field('footer_logo', 'options');
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

			<!-- /// Top footer \\ -->
			<div class="top centered grid columns-3">

				<div class="column">
					<h4 class="title">Botox</h4>
					<?php
						wp_nav_menu( [
							'theme_location' => 'footer_menu_a',							
						] );
					?>	
				</div>

				<div class="column">
					<h4 class="title">Fillers</h4>
					<?php
						wp_nav_menu( [
							'theme_location' => 'footer_menu_b',							
						] );
					?>	
				</div>

				<div class="column">
					<h4 class="title">Skinboosters</h4>
					<?php
						wp_nav_menu( [
							'theme_location' => 'footer_menu_v',
						] );
					?>	

				<h4 class="title">Coolsculpting</h4>

				</div>
				
			</div>
			<!-- \\ Top footer /// -->

			<!-- /// Bottom Footer \\ -->
			<div class="bottom centered grid columns-3">
				
				<!-- /// Contact widget \\ -->
				<div class="contact">
					<h4>Coonen Kliniek</h4>
					
					<?php if ($adress) : ?>
						<p><?php echo $adress; ?></p>
					<?php endif; ?>

					<?php if( $phone ): 
					$link_url = $phone['url']; $link_title = $phone['title']; $link_target = $phone['target'] ? $phone['target'] : '_self'; ?>
						<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">T: <?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>

					<?php if( $email ): 
					$link_url = $email['url']; $link_title = $email['title']; $link_target = $email['target'] ? $email['target'] : '_self'; ?>
						<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">E: <?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>		
					
					<!-- /// Certificeringen \\ -->
					<div class="certificeringen">
						<?php if( have_rows('footer_certifications', 'options') ): ?>
							<h4>Aangesloten bij:</h4>
							<?php // Loop through rows.
							while( have_rows('footer_certifications', 'options') ) : the_row();
								// Load sub field value.
								$cert_logo = get_sub_field('footer_certification');
								// Do something...
								if( $cert_logo ) : ?>
									<?php echo wp_get_attachment_image( $cert_logo, 'footer_cert_lg', '', array( 'class' => 'image' ) ); ?>
								<?php endif ?>
							<?php endwhile;
						endif; ?>
					</div>
					<!-- \\ Certificeringen /// -->					
				
				</div>
				<!-- \\ Contact widget /// -->

				<!-- /// Snel Naar \\ -->
				<div class="column">
					<h4 class="title">Snel Naar</h4>
					<?php
						wp_nav_menu( [
							'theme_location' => 'footer_menu_d',							
						] );
					?>	
				</div>						
				<!-- \\ Snel Naar /// -->

				<div class="column">

					<!-- /// Ervaringen widget \\ -->
					<div class="ervaringen">
						<h4 class="Ervaringen">Ervaringen</h4>
						<p>Deze functionaliteit volgt snel</p>
					</div>
					<!-- \\ Ervaringen widget /// -->

					<!-- /// Privacy \\ -->
						<div class="privacy">
							<h4 class="title">Privacy</h4>
							<?php
								wp_nav_menu( [
									'theme_location' => 'copyright_menu',
								] );
							?>	
							<p class="copy">&copy;<?php echo date('Y');?> <?php echo get_bloginfo('name'); ?></p>
						</div>
					<!-- \\ Privacy /// -->

				</div>
				
			</div>
			<!-- \\ Bottom Footer /// -->

			<!-- /// Subfooter \\ -->
			<div class="subfooter flex jucoce">
				<?php if( $footer_logo ) : ?>
					<?php echo wp_get_attachment_image( $footer_logo, 'large', '', array( 'class' => 'image' ) ); ?>
				<?php endif ?>
			</div>
			<!-- \\ Subfooter /// -->

		
		</footer>
		<!--  \ footer container / -->

		
		
	</div>
	<!--  \ main container / -->
	</div>

	<!--  \ wrapper / -->
	<?php wp_footer(); ?>
</body>

</html>