<?php
add_action('wp_enqueue_scripts', function () {
  // Our very own styles
  wp_enqueue_style('theme-style', get_stylesheet_uri());

  // Our very own SASS
  wp_enqueue_style('additional-css', get_template_directory_uri() . '/style.ext.css', array(), 'v1.0');

  // Load assets from functions.php
  global $assets;
  foreach ($assets as $name => $asset) {
    $exp = explode('.', $asset);
    if ($exp[1] == 'js') {
      enqueue_if_exists($name, $asset, false);
    } elseif ($exp[0] == 'css') {
      enqueue_if_exists($name, $asset);
    } else {
      trigger_error('Unknown asset (' . $name . ')', E_USER_ERROR);
    }
  }
});
