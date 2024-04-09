<?php
// Implement JSON API
function custom_website_api_route() {
    register_rest_route('website/v1', '/list', array(
        'methods' => 'GET',
        'callback' => 'get_websites_list',
    ));
}
add_action('rest_api_init', 'custom_website_api_route');

function get_websites_list() {
    $args = array(
        'post_type' => 'website',
        'posts_per_page' => -1,
    );
    $websites = get_posts($args);
    $formatted_websites = array();
    foreach ($websites as $website) {
        $formatted_websites[] = array(
            'name' => $website->post_title,
            'url' => get_post_meta($website->ID, 'website_url', true),
        );
    }
    return $formatted_websites;
}
