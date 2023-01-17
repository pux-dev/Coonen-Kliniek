<li id="comment-<?php echo $comment->comment_ID ?>" class="comment">
	<?php //print_r($comment); ?>
	<div class="comment__title">
		<?php /*
		<div class="gravatar">
		<?php 
			$firstCharacter = $comment->comment_author[0];
			echo $firstCharacter; ?>
		</div> */ ?>
		<div class="text">
			<div class="name"><?php echo $comment->comment_author; ?></div>
			<div class="date"><?php echo get_comment_date( 'd/m/Y', $comment->comment_ID ); ?></div>
		</div>
	</div>
	<div class="comment__body">
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php echo _t( 'Wij beoordelen momenteel je reactie alvorens deze definitief geplaatst wordt.' ); ?></em>
			<br />
		<?php endif; ?>
		<?php echo $comment->comment_content; ?>
	</div>
	<div class="comment__reply">
		<a class="comment__reply" href="<?php echo esc_url( add_query_arg( 'replytocom', $comment->comment_ID ) ) ?>#respond" onclick="return addComment.moveForm('comment-<?php echo $comment->comment_ID ?>', '<?php echo $comment->comment_ID ?>', 'respond', '<?php echo $comment->comment_post_ID ?>')"><?php _t( 'Reageer' ); ?></a>
	</div>
	<?php if ( isset( $comment_children[ $comment->comment_ID ] ) && count( $comment_children[ $comment->comment_ID ] ) > 0 ) : ?>
		<ul>
			<?php foreach ( $comment_children[ $comment->comment_ID ] as $child_comment ) : ?>
				<?php \Theme\Frontend\Comments::render_comment( $child_comment, $comment_children ); ?>
			<?php endforeach ?>
		</ul>
	<?php endif; ?>
</li>
