<?php

function attila_body_classes( $classes ) {
  // Adds a class of group-blog to blogs with more than 1 published author.
  if ( is_home() ) {
    $classes[] = 'home-template';
  }

  // Adds a class of hfeed to non-singular pages.
  if ( is_singular() ) {
    $classes[] = 'post-template';
  }

  if ( is_author() ) {
    $classes[] = 'author-template';
  }

  if ( is_category() ) {
    $classes[] = 'tag-template';
  }

  return $classes;
}
add_filter( 'body_class', 'attila_body_classes' );

?>