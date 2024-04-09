<?php
/*
Plugin Name: Website Submission Plugin
Description: Adds a form to submit website details and stores them as custom post type "Website".
Version: 1.0
Author: Fazal Khan
*/

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/custom_post_type.php';
require_once plugin_dir_path(__FILE__) . 'includes/form_shortcode.php';
require_once plugin_dir_path(__FILE__) . 'includes/handle_form_submission.php';
require_once plugin_dir_path(__FILE__) . 'includes/metabox.php';
require_once plugin_dir_path(__FILE__) . 'includes/rest_api.php';
require_once plugin_dir_path(__FILE__) . 'includes/access_control.php';
require_once plugin_dir_path(__FILE__) . 'includes/ajax-handler.php';

// Enqueue custom script to hide the "Update" button for 'website' post type
function enqueue_hide_update_button_script() {
    global $pagenow, $post;

    // Check if we are on the post editing screen for a 'website' post type
    if ($pagenow === 'post.php' && isset($post->post_type) && $post->post_type === 'website') {
        wp_enqueue_script('hide-update-button', plugins_url('/js/hide-update-button.js', __FILE__), array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_hide_update_button_script');

// Register and enqueue script
function register_hide_update_button_script() {
    wp_register_script('hide-update-button', plugins_url('/js/hide-update-button.js', __FILE__), array('jquery'), null, true);
    wp_enqueue_script('hide-update-button');
}
add_action('admin_enqueue_scripts', 'register_hide_update_button_script');

// Enqueue custom CSS for the website submission form
function enqueue_website_submission_style() {
    wp_enqueue_style( 'website-submission-style', plugins_url( '/css/website-submission-style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'enqueue_website_submission_style' );
