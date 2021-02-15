<?php
function theme_setup()
{
  // Initialize theme support
  global $theme_support;
  if (!empty($theme_support)) {
    foreach ($theme_support as $feature => $args) {
      if (count($args) === 0) {
        add_theme_support($feature);
      } else {
        add_theme_support($feature, $args);
      }
    }
  }

  // Register menues
  global $theme_menues;
  if (!empty($theme_menues)) {
    register_nav_menus($theme_menues);
  }

  // Register sidebars
  global $sidebars;
  if (!empty($sidebars)) {
    foreach ($sidebars as $sidebar) {
      register_sidebar($sidebar);
    }
  }

  // Load plugin dependencies
  function register_plugin_dependencies()
  {
    global $plugin_dependencies;
    tgmpa($plugin_dependencies);
  }

  add_action('tgmpa_register', 'register_plugin_dependencies');

  // Clean up wp_head
  // See https://scotch.io/quick-tips/removing-wordpress-header-junk
  remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
  remove_action('wp_head', 'wp_generator'); // remove wordpress version
  remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
  remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
  remove_action('wp_head', 'index_rel_link'); // remove link to index page
  remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
  remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
  remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
  remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);


  //make Jquery Migrate script to be silent in the console
  add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
      $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, array('jquery-migrate'));
    }
  });

  add_theme_support('post-thumbnails');
  add_image_size('full');

  //Adding Widgets to Sidebar
  function arphabet_widgets_init()
  {

    register_sidebar(
      array(
        'name'          => 'Blog Sidebar',
        'id'            => 'blog_sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
      )
    );

    register_sidebar(
      array(
        'name'          => 'Archive Sidebar',
        'id'            => 'archive_sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
      )
    );

    register_sidebar(
      array(
        'name'          => 'Standard Blog Sidebar',
        'id'            => 'standard_blog_sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
      )
    );

    register_sidebar(
      array(
        'name'          => 'Grid Blog Sidebar',
        'id'            => 'grid_blog_sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
      )
    );
  }
  add_action('widgets_init', 'arphabet_widgets_init');

  //Adding New Axtesys Role
  add_role(
    'axtesys_admin',
    __('Axtesys Administrator'),
    array(
      'read' => true,
      'edit_posts' => true,
      'edit_others_posts' => true,
      'create_posts' => true,
      'activate_plugins' => true,
      'edit_dashboard' => true,
      'manage_categories' => true,
      'publish_posts' => true,
      'edit_files' => true,
      'edit_theme_options' => true,
      'manage_options' => true,
      'moderate_comments' => true,
      'manage_categories' => true,
      'manage_links' => true,
      'edit_others_posts' => true,
      'edit_pages' => true,
      'edit_others_pages' => true,
      'edit_published_pages' => true,
      'publish_pages' => true,
      'delete_pages' => true,
      'delete_others_pages' => true,
      'delete_published_pages' => true,
      'delete_others_posts' => true,
      'delete_private_posts' => true,
      'edit_private_posts' => true,
      'read_private_posts' => true,
      'delete_private_pages' => true,
      'edit_private_pages' => true,
      'read_private_pages' => true,
      'unfiltered_html' => true,
      'edit_published_posts' => true,
      'upload_files' => true,
      'publish_posts' => true,
      'delete_published_posts' => true,
      'delete_posts' => true,
      'export' => true,
      'import' => true,
      'list_users' => true,
      'manage_categories' => true,
      'promote_users' => true,
      'remove_users' => true,
      'switch_themes' => true,
      'customize' => true,
      'delete_site' => true,
      'install_plugins' => true,
      'delete_plugins' => true,
      'update_plugin' => true,
      'update_plugins' => true,
      'update_themes' => true,
      'install_themes' => true,
      'delete_themes' => true,
      'edit_plugins' => true,
      'edit_themes' => true,
      'edit_files' => true,
      'edit_users' => true,
      'add_users' => true,
      'create_users' => true,
      'delete_users' => true,
      'unfiltered_html' => true,
      'update_core' => true
    )
  );

  //Removing Roles
  remove_role('editor');
  remove_role('author');
  remove_role('contributor');
  remove_role('subscriber');
}

add_action('after_setup_theme', 'theme_setup');
