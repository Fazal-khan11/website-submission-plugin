<?php
// Handle form submission
function handle_website_submission() {
    if (isset($_POST['name']) && isset($_POST['website_url'])) {
        // Process form data here
        // For demonstration purposes, we'll just return a success response
        wp_send_json_success();
    } else {
        wp_send_json_error();
    }
}
add_action('wp_ajax_handle_website_submission', 'handle_website_submission');
add_action('wp_ajax_nopriv_handle_website_submission', 'handle_website_submission'); // Allow non-logged-in users to submit the form
