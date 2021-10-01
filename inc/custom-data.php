<?php
/**
 * CUSTOM POST TYPES and CUSTOM TAXONOMIES
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


//tutorial custom post type

// Register Custom Post Type tutorial
// Post Type Key: tutorial

function create_tutorial_cpt() {

  $labels = array(
    'name' => __( 'Tutorials', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Tutorial', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Tutorial', 'textdomain' ),
    'name_admin_bar' => __( 'Tutorial', 'textdomain' ),
    'archives' => __( 'Tutorial Archives', 'textdomain' ),
    'attributes' => __( 'Tutorial Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Tutorial:', 'textdomain' ),
    'all_items' => __( 'All Tutorials', 'textdomain' ),
    'add_new_item' => __( 'Add New Tutorial', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Tutorial', 'textdomain' ),
    'edit_item' => __( 'Edit Tutorial', 'textdomain' ),
    'update_item' => __( 'Update Tutorial', 'textdomain' ),
    'view_item' => __( 'View Tutorial', 'textdomain' ),
    'view_items' => __( 'View Tutorials', 'textdomain' ),
    'search_items' => __( 'Search Tutorials', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into tutorial', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this tutorial', 'textdomain' ),
    'items_list' => __( 'Tutorial list', 'textdomain' ),
    'items_list_navigation' => __( 'Tutorial list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Tutorial list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'tutorial', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'tutorial', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_tutorial_cpt', 0 );

add_action( 'init', 'create_course_taxonomies', 0 );
function create_course_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Courses', 'taxonomy general name' ),
    'singular_name' => _x( 'course', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Courses' ),
    'popular_items' => __( 'Popular Courses' ),
    'all_items' => __( 'All Courses' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Courses' ),
    'update_item' => __( 'Update course' ),
    'add_new_item' => __( 'Add New course' ),
    'new_item_name' => __( 'New course' ),
    'add_or_remove_items' => __( 'Add or remove Courses' ),
    'choose_from_most_used' => __( 'Choose from the most used Courses' ),
    'menu_name' => __( 'course' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Courses',array('tutorial'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'course' ),
    'show_in_rest'          => true,
    'rest_base'             => 'course',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}

add_action( 'init', 'create_objective_taxonomies', 0 );
function create_objective_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Objectives', 'taxonomy general name' ),
    'singular_name' => _x( 'objective', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Objectives' ),
    'popular_items' => __( 'Popular Objectives' ),
    'all_items' => __( 'All Objectives' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Objectives' ),
    'update_item' => __( 'Update objective' ),
    'add_new_item' => __( 'Add New objective' ),
    'new_item_name' => __( 'New objective' ),
    'add_or_remove_items' => __( 'Add or remove Objectives' ),
    'choose_from_most_used' => __( 'Choose from the most used Objectives' ),
    'menu_name' => __( 'objective' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Objectives',array('tutorial'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'objective' ),
    'show_in_rest'          => true,
    'rest_base'             => 'objective',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}


