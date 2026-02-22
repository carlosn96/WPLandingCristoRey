<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$load_path = '../../../../wp-load.php';
if (!file_exists($load_path)) {
    // Try even higher or elsewhere? 
    // Let's also check if it's in the current deploy-src root (unlikely if it's just the theme repo)
    $load_path = '../../../wp-load.php';
}

if (!file_exists($load_path)) {
    die("Error: wp-load.php not found. Current dir: " . __DIR__ . "\nContents of ../../../../: " . json_encode(scandir('../../../../')));
}
require_once($load_path);

$user = get_userdata(1);
if ($user) {
    echo "User 1 Login: " . $user->user_login;
} else {
    echo "User 1 not found";
}
