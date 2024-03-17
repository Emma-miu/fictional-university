<?php 

function university_post_types() {
  // campus post type
  register_post_type('campus', array(
    'capability_type' => 'campus',
    'map_meta_cap' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array(
      'slug' => 'campuses'
    ),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true, //for new UI
    'labels' => array(
      'name' => 'Campuses',
      'add_new' => 'Add new Campus',
      'add_new_item' => 'Add new Campus',
      'edit_item' => 'Edit Campus',
      'all_items' => 'All Campuses',
      'singular_name' => 'Campus'
    ),
    'menu_icon' => 'dashicons-location-alt',
  ));

  // event post type
  register_post_type('event', array(
    'capability_type' => 'event',
    'map_meta_cap' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array(
      'slug' => 'events'
    ),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true, //for new UI
    'labels' => array(
      'name' => 'Events',
      'add_new' => 'Add new Event',
      'add_new_item' => 'Add new Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
    'menu_icon' => 'dashicons-calendar',
  ));

  // program post type
  register_post_type('program', array(
    'supports' => array('title', 'excerpt'),
    'rewrite' => array(
      'slug' => 'programs'
    ),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true, //for new UI
    'labels' => array(
      'name' => 'Programs',
      'add_new' => 'Add new Program',
      'add_new_item' => 'Add new Program',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
    ),
    'menu_icon' => 'dashicons-awards',
  ));

  // professor post type
  register_post_type('professor', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'public' => true,
    'show_in_rest' => true, //for new UI
    'labels' => array(
      'name' => 'Professors',
      'add_new' => 'Add new Professor',
      'add_new_item' => 'Add new Professor',
      'edit_item' => 'Edit Professor',
      'all_items' => 'All Professor',
      'singular_name' => 'Professor'
    ),
    'menu_icon' => 'dashicons-welcome-learn-more',
  ));

}
add_action('init', 'university_post_types');