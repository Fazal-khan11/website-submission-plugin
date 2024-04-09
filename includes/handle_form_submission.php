<?php
// Handle form submission
function handle_website_form_submission() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = sanitize_text_field($_POST['name']);
        $url = esc_url_raw($_POST['url']);
        $postarr = array(
            'post_title' => $name,
            'post_type' => 'website',
            'post_status' => 'publish'
        );
        $post_id = wp_insert_post($postarr);
        add_post_meta($post_id, 'website_url', $url);
    }
}
add_action('template_redirect', 'handle_website_form_submission');
