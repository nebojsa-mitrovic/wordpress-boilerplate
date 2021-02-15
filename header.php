<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wordpress-boilerplate
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php bloginfo('name');
          echo (' | ');
          bloginfo('description') ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header>
    <h2>Header</h2>
  </header>