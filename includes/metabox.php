<?php
// Add custom metabox
function add_website_source_metabox() {
    add_meta_box('website_source_metabox', 'Website Details', 'display_website_source_metabox', 'website', 'normal');
}
add_action('add_meta_boxes', 'add_website_source_metabox');

// Display custom metabox
function display_website_source_metabox($post) {
    $url = get_post_meta($post->ID, 'website_url', true);
    $source_code = get_post_meta($post->ID, 'website_source_code', true);

    // Check user role to restrict access to source code
    $current_user = wp_get_current_user();
    if (!in_array('administrator', $current_user->roles) && !in_array('editor', $current_user->roles)) {
        // Hide source code metabox for non-administrator and non-editor users
        echo 'Only administrators and editors can view the source code.';
        return;
    }

    // Fetch source code from URL if URL is provided and source code is empty
    if (!empty($url) && empty($source_code)) {
        $source_code = fetch_source_code_from_url($url);
        if (!empty($source_code)) {
            update_post_meta($post->ID, 'website_source_code', wp_kses_post($source_code));
        }
    }
    ?>
    <label for="website_url">Website URL:</label><br>
    <input type="text" id="website_url" name="website_url" value="<?php echo esc_attr($url); ?>"><br><br>

    <?php if (in_array('administrator', $current_user->roles)) : ?>
    <!-- Display source code metabox only for administrators -->
    <label for="website_source_code">Website Source Code:</label><br>
    <textarea id="website_source_code" name="website_source_code" rows="5" cols="50"><?php echo esc_textarea($source_code); ?></textarea><br>
    <?php endif; ?>
    <?php
}

// Save custom metabox data
function save_website_source_metabox_data($post_id) {
    if (isset($_POST['website_url'])) {
        update_post_meta($post_id, 'website_url', esc_url($_POST['website_url']));
    }

    if (isset($_POST['website_source_code'])) {
        update_post_meta($post_id, 'website_source_code', wp_kses_post($_POST['website_source_code']));
    }
}
add_action('save_post', 'save_website_source_metabox_data');

// Fetch source code from URL
function fetch_source_code_from_url($url) {
    $response = wp_remote_get($url);
    if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
        return wp_remote_retrieve_body($response);
    }
    return '';
}
