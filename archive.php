<?php 

  get_header(); ?>

  <?php

    if ( is_author() ) {
      get_template_part( 'template-parts/archive-author' );
    } elseif ( is_category() ) {
      get_template_part( 'template-parts/archive-category' );
    } elseif ( is_day() || is_month() || is_year() ) {
      get_template_part( 'template-parts/archive-none' );
    }

  ?>
    
  <?php get_footer(); 

?>
