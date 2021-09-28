<?php
/**
 * Post Type: Blog.
 */

function post_type_blog() {

  $labels = [
    'name' => __('Blog', 'plural'),
    'singular_name' => __('Blog', 'singular'),
    'menu_name' => __('Blog', 'admin menu'),
    'name_admin_bar' => __('Blog', 'admin bar'),
    'add_new' => __('Add New', 'add new'),
    'add_new_item' => __('Add New Blog'),
    'new_item' => __('New Blog'),
    'edit_item' => __('Edit Blog'),
    'view_item' => __('View Blog'),
    'all_items' => __('All Blog'),
    'search_items' => __('Search Blog'),
    'not_found' => __('No Blog found.'),
  ];

  $args = [
    'label' => __('Blog'),
    'labels' => $labels,
    'description' => '',
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'rest_base' => '',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'has_archive' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'delete_with_user' => false,
    'exclude_from_search' => false,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'rewrite' => ['slug' => 'blog', 'with_front' => true],
    'query_var' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-media-document',
    'supports' => ['title', 'editor', 'thumbnail'],
  ];

  register_post_type('blog', $args);
}

add_action('init', 'post_type_blog');
