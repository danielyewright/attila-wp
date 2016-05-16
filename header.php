<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscores
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
  <!-- <body <?php body_class(); ?>> -->
    <nav id="menu">
      <a class="close-button">Close</a>
      <div class="nav-wrapper">
        <p class="nav-label">Menu</p>
        <?php

          $args = array(
            'theme_location' => 'primary'
          );

        ?>

        <?php wp_nav_menu( $args ); ?>
      </div>
    </nav>