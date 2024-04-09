<?php
// Remove ability to create new WEBSITES
function remove_website_capability() {
    $editor_role = get_role('editor');
    $author_role = get_role('author');
    
    if ($editor_role) {
        $editor_role->remove_cap('publish_posts');
    }
    
    if ($author_role) {
        $author_role->remove_cap('publish_posts');
    }
}
add_action('admin_init', 'remove_website_capability');

// Remove standard metaboxes from the edit screen for WEBSITES
// function remove_websites_metaboxes() {
//     remove_meta_box('slugdiv', 'websites', 'normal');
//     remove_meta_box('authordiv', 'websites', 'normal');
//     remove_meta_box('postimagediv', 'websites', 'normal');
//     // Remove other standard metaboxes as needed
// }
// add_action('add_meta_boxes', 'remove_websites_metaboxes');

