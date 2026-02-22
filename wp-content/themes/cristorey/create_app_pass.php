<?php
require_once('/home/u487588057/domains/temp.cristoreyrc.com/public_html/wp-load.php');

$user_id = 1; // El admin identificado
$app_pass_name = 'Agente_Antigravity_' . time();
$new_pass = WP_Application_Passwords::create_new_application_password($user_id, array('name' => $app_pass_name));

if (is_wp_error($new_pass)) {
    echo "Error creando password: " . $new_pass->get_error_message();
} else {
    echo "NUEVO_PASSWORD_DUMP: " . json_encode($new_pass);
}
?>