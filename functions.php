<?php
function enqueue_esports_assets() {
    // Enqueue the CSS file
    wp_enqueue_style(
        'esports-style', // Handle name
        get_template_directory_uri() . '/assets/css/esports-style.css', // File path
        array(), // Dependencies (none)
        '2.0', // Version number
        'all' // Media type
    );
    
    // Enqueue the JavaScript file (if needed)
    wp_enqueue_script(
        'esports-script', // Handle name
        get_template_directory_uri() . '/assets/js/esports-script.js', // File path
        array('jquery'), // Dependencies
        '2.0', // Version number
        true // Load in footer
    );
}
add_action('wp_enqueue_scripts', 'enqueue_esports_assets');

// Handle esports registration form submission with file upload
function handle_esports_registration() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['paymentScreenshot'])) {

        // Sanitize form input
        $team_name = sanitize_text_field($_POST['teamName']);

        // Handle file upload
        $uploaded_file = $_FILES['paymentScreenshot'];

        // Check for upload errors
        if ($uploaded_file['error'] !== UPLOAD_ERR_OK) {
            wp_die('File upload error. Please try again.');
        }

        // Allowed file types and size limit (5MB)
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_file_size = 5 * 1024 * 1024; // 5MB

        // Validate file type
        $file_type = wp_check_filetype($uploaded_file['name']);
        if (!in_array($file_type['type'], $allowed_types)) {
            wp_die('Invalid file type. Only JPG, PNG, and GIF are allowed.');
        }

        // Validate file size
        if ($uploaded_file['size'] > $max_file_size) {
            wp_die('File is too large. Max size is 5MB.');
        }

        // Upload to WordPress Media Library
        $upload = wp_handle_upload($uploaded_file, ['test_form' => false]);
        if (isset($upload['error'])) {
            wp_die('Upload failed: ' . $upload['error']);
        }

        // Store the attachment in the media library
        $attachment_id = wp_insert_attachment([
            'guid'           => $upload['url'],
            'post_mime_type' => $upload['type'],
            'post_title'     => sanitize_file_name($uploaded_file['name']),
            'post_content'   => '',
            'post_status'    => 'inherit'
        ], $upload['file']);

        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
        wp_update_attachment_metadata($attachment_id, $attachment_data);

        // Display success message
        echo "<div style='padding: 20px; background-color: #d4edda; color: #155724;'>Registration submitted successfully!<br>Payment Screenshot ID: {$attachment_id}</div>";
    }
}