<?php

namespace Theme\Frontend;

/**
 * Class Comments
 *
 * @package Theme\Frontend
 */
class Comments {
	/**
	 * Get comments by page
	 *
	 * @param $comments
	 * @param $comments_per_page
	 * @param $page_number
	 *
	 * @return array
	 */
	public static function get_paged_comments( $comments, $comments_per_page, $page_number ) {
		$return_comments = [];

		$counter = 1;

		foreach ( $comments as $comment ) {
			if ( $page_number > 1 ) {
				if ( $counter > ( $comments_per_page * ( $page_number - 1 ) ) && $counter <= ( $comments_per_page * $page_number ) ) {
					$return_comments[] = $comment;
				}
			} else {
				if ( $counter <= ( $comments_per_page * $page_number ) ) {
					$return_comments[] = $comment;
				}
			}

			$counter ++;
		}

		return $return_comments;
	}

	/**
	 * Render comment
	 *
	 * @param $comment
	 * @param $comment_children
	 */
	public static function render_comment( $comment, $comment_children ) {
		require( locate_template( 'template-parts/loop-comment.php' ) );
	}
}
