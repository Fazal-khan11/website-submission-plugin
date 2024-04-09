<?php
// Register Custom Post Type website
function create_website_cpt() {

    $labels = array(
        'name' => _x( 'websites', 'Post Type General Name', 'textdomain' ),
        'singular_name' => _x( 'website', 'Post Type Singular Name', 'textdomain' ),
        'menu_name' => _x( 'websites', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar' => _x( 'website', 'Add New on Toolbar', 'textdomain' ),
        'archives' => __( 'website Archives', 'textdomain' ),
        'attributes' => __( 'website Attributes', 'textdomain' ),
        'parent_item_colon' => __( 'Parent website:', 'textdomain' ),
        'all_items' => __( 'All websites', 'textdomain' ),
        'add_new_item' => __( 'Add New website', 'textdomain' ),
        'add_new' => __( 'Add New', 'textdomain' ),
        'new_item' => __( 'New website', 'textdomain' ),
        'edit_item' => __( 'Edit website', 'textdomain' ),
        'update_item' => __( 'Update website', 'textdomain' ),
        'view_item' => __( 'View website', 'textdomain' ),
        'view_items' => __( 'View websites', 'textdomain' ),
        'search_items' => __( 'Search website', 'textdomain' ),
        'not_found' => __( 'Not found', 'textdomain' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
        'featured_image' => __( 'Featured Image', 'textdomain' ),
        'set_featured_image' => __( 'Set featured image', 'textdomain' ),
        'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
        'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
        'insert_into_item' => __( 'Insert into website', 'textdomain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this website', 'textdomain' ),
        'items_list' => __( 'websites list', 'textdomain' ),
        'items_list_navigation' => __( 'websites list navigation', 'textdomain' ),
        'filter_items_list' => __( 'Filter websites list', 'textdomain' ),
    );
    $args = array(
        'label' => __( 'website', 'textdomain' ),
        'description' => __( '', 'textdomain' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-admin-site-alt3',
        'supports' => array('title'),
        'taxonomies' => array(),
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
        'capability_type' => 'website', // Adjusted capability type
        'capabilities' => array(
            'read'              => 'read_post',
            'read_post'         => 'read_post',
            'edit_post'         => 'edit_posts', // Changed capability for editing posts
            'delete_post'       => 'do_not_allow',
            'create_posts'      => 'do_not_allow',
            'publish_posts'     => 'do_not_allow',
            'edit_posts'        => 'edit_posts',
            'edit_others_posts' => 'read_post',
            'delete_posts'      => 'do_not_allow', 
        ),
    );

    register_post_type( 'website', $args );
}
add_action( 'init', 'create_website_cpt', 0 );
