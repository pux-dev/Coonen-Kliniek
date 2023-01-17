<?php
/**
 * The template part for displaying faq item
 *
 * @package    WordPress
 * @subpackage Custom_Theme
 * @since      4.5.1
 * @version    4.5.1
 */
$question = get_sub_field('question');
$answer = get_sub_field('answer');  ?>

<li>
    <h4 class="question"><?php echo $question; ?></h4>
    <article class="answer">
        <div class="inner">
            <p><?php echo $answer; ?></p>
        </div>
    </article>
    <div class="open-icon"></div>
</li>