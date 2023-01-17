<?php
    $subtitel   = get_field('pg_subtitle');       
    if (is_singular( 'team' )) {
        $subtitel = get_field('tm_function');    
    } ?>
    
<!-- /// Page Header \\ -->    
<div class="page-header stripe bottom centered">
    <div class="title">
    <h1 class="title-stripe"><?php the_title(); ?></h1>
    <?php if ($subtitel) : ?>
        <p class="functie"><?php echo $subtitel; ?></p>
        <?php endif; ?>
    </div>
</div>
<!-- \\ Page Header /// -->