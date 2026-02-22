<?php
require_once('../../../wp-load.php');
$user = get_userdata(1);
if ($user) {
    echo "User 1 Login: " . $user->user_login;
} else {
    echo "User 1 not found";
}
