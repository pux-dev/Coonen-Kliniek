<?php
if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die( 'Please do not load this page directly.' );
}

$cpage          = ( get_query_var( 'cpage' ) ) ? get_query_var( 'cpage' ) : 1;
$comment_parent = ( isset( $_GET['replytocom'] ) ) ? esc_attr( $_GET['replytocom'] ) : 0;

wp_enqueue_script( 'comment-reply' ); ?>

<?php if ( $comments || $post->comment_status == 'open' ) : ?>
	<div class="comment-content">
		<div class="comments">
			<?php if ( ! empty( $post->post_password ) && $_COOKIE[ 'wp-postpass_' . COOKIEHASH ] != $post->post_password ) : ?>
				<div class="content">
					<p><?php _t( 'This post is password protected. Enter the password to view comments.' ); ?></p>
				</div>
			<?php else : ?>
				<?php if ( $comments ) : ?>			

					<h5 id="comments" class="comment__title"><?php comments_number( 'Reacties', 'Reacties', 'Reacties' ); ?> (<?php echo get_comments_number(); ?>)</h5>

					<?php
					$comment_parents  = [];
					$comment_children = [];

					foreach ( $comments as $comment ) {
						if ( $comment->comment_parent == 0 ) {
							$comment_parents[ $comment->comment_ID ] = $comment;
						} else {
							$comment_children[ $comment->comment_parent ][] = $comment;
						}
					}

					$comment_parents = \Theme\Frontend\Comments::get_paged_comments( $comment_parents, get_option( 'comments_per_page' ), $cpage );

					echo '<ul>';
					foreach ( $comment_parents as $comment ) {
						\Theme\Frontend\Comments::render_comment( $comment, $comment_children );
					}
					echo '</ul>';
					?>

					<div class="comment-nav">
						<?php paginate_comments_links(); ?>
					</div>

				<?php else : ?>
					<?php if ( $post->comment_status != 'open' ) : ?>
						<div class="content">
							<p><?php echo _t( 'Reacties voor dit onderdeel zijn gesloten.' ); ?></p>
						</div>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( $post->comment_status == 'open' ) : ?>
					<h5 id="respond" class="comment__title"><?php _t( 'Laat een reactie achter' ); ?></h5>

					<?php if ( get_option( 'comment_registration' ) && ! $user_ID ) : ?>
						<div class="content">
							<p><?php echo _t( 'Je moet <a href="%s">ingelogd</a> zijn om een reactie te kunnen plaatsen', [ add_query_arg( [ 'redirect_to' => urlencode( get_permalink() ) ], site_url( '/wp-login.php' ) ) ] ); ?></p>
						</div>
					<?php else : ?>
						<form id="commentform" action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post">
							<fieldset>
								<?php if ( $user_ID ) : ?>
									<div class="content-holder">
										<p><?php echo _t( 'U bent ingelogd als %s', [ $user_identity ] ); ?>,
											<a href="<?php echo add_query_arg( [ 'action' => 'logout' ], site_url( '/wp-login.php' ) ); ?>"><?php echo _t( 'Uitloggen' ); ?></a>
										</p>
									</div>
								<?php endif; ?>

								<textarea name="comment" id="comment" cols="50%" rows="4"placeholder="<?php _t( 'Je reactie*:' ); ?>" required></textarea>

								<?php if ( ! $user_ID ) : ?>
									<div class="comment__col flex jucosp">
										
											<input type="text" name="author" id="author" placeholder="<?php _t( 'Naam *' ); ?>" value="<?php echo $comment_author ?>" size="22" tabindex="1" required>
										
										
											<input type="text" name="email" id="email" placeholder="<?php _t( 'E-mailadres *' ); ?>" value="<?php echo $comment_author_email ?>" size="22" tabindex="2" required>
										
									</div>
								<?php endif; ?>

								<?php if ( $user_ID ) : ?>
									<?php do_action( 'comment_form_logged_in_after' ); ?>
								<?php else : ?>
									<?php do_action( 'comment_form_after_fields' ); ?>
								<?php endif; ?>

								<button class="button button-border" type="submit" value="<?php _t( 'Plaats reactie' ); ?>" /><?php _t( 'Plaats reactie' ); ?></button>

								<input type="hidden" name="comment_parent" id="comment_parent" value="<?php echo $comment_parent ?>">
								<input type="hidden" name="comment_post_ID" value="<?php echo $id ?>" />

								<?php do_action( 'comment_form', $post->ID ); ?>
							</fieldset>
						</form>

					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
