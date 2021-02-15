<?php


// Register Custom Post Type "Lorem Ipsum" (wordpress-boilerplate)

function lorem_ipsum_cpt()
{

  $labels = array(
    'name'                => _x('Lorem Ipsum', 'Post Type General Name', 'wordpress-boilerplate'),
    'singular_name'       => _x('Lorem Ipsum', 'Post Type Singular Name', 'wordpress-boilerplate'),
    'menu_name'           => __('Lorem Ipsum', 'wordpress-boilerplate'),
    'name_admin_bar'      => __('Lorem Ipsum', 'wordpress-boilerplate'),
    'parent_item_colon'   => __('Parent Item:', 'wordpress-boilerplate'),
    'all_items'           => __('Alle Lorem Ipsum', 'wordpress-boilerplate'),
    'add_new_item'        => __('Neue Lorem Ipsum hinzufügen', 'wordpress-boilerplate'),
    'add_new'             => __('Neues Lorem ipsum', 'wordpress-boilerplate'),
    'new_item'            => __('Neu', 'wordpress-boilerplate'),
    'edit_item'           => __('Lorem Ipsum', 'wordpress-boilerplate'),
    'update_item'         => __('Aktualisieren', 'wordpress-boilerplate'),
    'view_item'           => __('Ansehen', 'wordpress-boilerplate'),
    'search_items'        => __('Lorem Ipsum suchen', 'wordpress-boilerplate'),
    'not_found'           => __('Nichts gefunden', 'wordpress-boilerplate'),
    'not_found_in_trash'  => __('Der Papierkorb ist leer', 'wordpress-boilerplate'),
  );
  $rewrite = array(
    'slug'                => 'lorem-ipsum',
    'with_front'          => false,
    'pages'               => true,
    'feeds'               => false,
  );
  $args = array(
    'label'               => __('Lorem Ipsum', 'wordpress-boilerplate'),
    'description'         => __('Lorem Ipsum von wordpress-boilerplate', 'wordpress-boilerplate'),
    'labels'              => $labels,
    'supports'            => array('title', 'editor', 'thumbnail'),
    'show_in_rest'        => true,
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-code-standards',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
  );
  register_post_type('lorem-ipsum', $args);
}
add_action('init', 'lorem_ipsum_cpt', 0);
