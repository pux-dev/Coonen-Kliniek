<?php
/*Toon de comments op de single page */ 
if ( comments_open() || get_comments_number() ) :
 comments_template();
endif; ?>