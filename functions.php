<?php

/**
 * Theme Features
 * See https://codex.wordpress.org/Function_Reference/add_theme_support
 *
 * Example: [
 *  ['post-thumbnails', ['post', 'page']],
 *  ['custom-background']
 * ];
 */
$theme_support = [];

/**
 * Set environment variable dev/prod
 */
global $env;
$env = 'dev';

/**
 * Plugin Dependencies via TGM Plugin Activation
 * See http://tgmpluginactivation.com/configuration/
 *
 * Example: [
 *  [
 *    'name' => 'Plugin Name',
 *    'required' => 'true,'
 *    'source' => get_stylesheet_directory() . '/plugins/plugin.zip'
 *  ]
 * ];
 */
$plugin_dependencies = [];


/**
 * Menues
 * See https://codex.wordpress.org/Navigation_Menus
 */
$theme_menues = [
  'header-nav' => 'Main Navigation',
];


/**
 * Sidebars
 * See https://codex.wordpress.org/Sidebars
 *
 * Example: [
 *  [
 *    'name' => 'Footer Widgets',
 *    'id' => 'footer',
 *    'before_widget' => ''
 *  ]
 * ]
 */
$sidebars = [];


/**
 * Assets
 * Default assets (compiled SASS, jQuery, Foundation, ...) are loaded
 * automatically. `style.css` is NOT loaded since it's only used for WordPress.
 */
$assets = [
  'Main JS' => 'assets/js/index.js',
];


/**
 * Libraries
 * PHP libraries to load
 */
$libs = [
  'init.php',
  'helper.php',
  'assets.php',
  //add theme options page
  'theme-options.php',
  //CPT
  'cpt/lorem-ipsum.php'
];

// ============================================================================

foreach ($libs as $file) {
  if (locate_template('libs/' . $file)) {
    require_once locate_template('libs/' . $file);
  } else {
    trigger_error('Failed to load library (' . $file . ')', E_USER_ERROR);
  }
}
