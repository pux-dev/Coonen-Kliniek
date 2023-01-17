<?php
   if( have_rows('banner_subnav') ):
   $counter = 1; ?>
    <nav class="subnav">
        <ul class="flex alitce jucoce">
            <li> Navigeer snel naar ></li>
            <?php // Loop through rows.
            while( have_rows('banner_subnav') ) : the_row();
                // Load sub field value.
                $subnav_title = get_sub_field('banner_subnav_title');
                $subnav_id = get_sub_field('banner_subnav_id'); ?>
                <li><a class="<?php if ($counter == 1) { echo 'active'; } ?>" href="#<?php echo $subnav_id; ?>"><?php echo $subnav_title; ?></a></li>
                <?php $counter++;
            endwhile; ?>
            </ul>
        </nav>
   <?php endif; 
?>