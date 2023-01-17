<?php
/**
 * The template for displaying search form
 */
$search_subtitle 	= get_field('search_subtitle', 'options');
$search_title 		= get_field('search_title', 'options');
$search_content 	= get_field('search_content', 'options');
$search_placeholder	= get_field('search_placeholder', 'options');
$search_button 		= get_field('search_button', 'options'); ?>

<?php if ($search_subtitle) : ?>
	<p class="kopje"><?php echo $search_subtitle; ?></p>
<?php endif; ?>

<?php if ($search_title) : ?>
	<h3><?php echo $search_title; ?></h3>
<?php endif; ?>

<?php if ($search_content) : ?>
	<p><?php echo $search_content; ?></p>
<?php endif; ?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<fieldset class="align-center">
		<input class="field" type="text" name="s" id="s" placeholder="<?php if ($search_placeholder) { echo $search_placeholder; } ?>" />
		<input class="submit button" type="submit" name="submit" id="searchsubmit" value="<?php if ($search_placeholder) { echo $search_button; } ?>" />
	</fieldset>
</form>
