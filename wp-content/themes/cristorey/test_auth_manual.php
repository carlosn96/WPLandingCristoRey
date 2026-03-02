<?php
require_once('/home/u487588057/domains/cristoreyrc.com/public_html/wp-load.php');

$user_login = 'carlos_n96@hotmail.com';
$password = 'NdMiAWTf5zKWgQFeKZO3zlOB';

echo "Testing Auth for: $user_login\n";

// Use the internal WP function to verify application password
$user = wp_authenticate_application_password(null, $user_login, $password);

if (is_wp_error($user)) {
    echo "Verification FAILED: " . $user->get_error_message() . "\n";
    echo "Error Code: " . $user->get_error_code() . "\n";
} else {
    echo "Verification SUCCESS!\n";
    echo "User ID: " . $user->ID . "\n";
    echo "User Name: " . $user->display_name . "\n";

    // Check permissions
    if (user_can($user, 'publish_posts')) {
        echo "User CAN publish posts.\n";
    } else {
        echo "User CANNOT publish posts.\n";
    }
}
?>