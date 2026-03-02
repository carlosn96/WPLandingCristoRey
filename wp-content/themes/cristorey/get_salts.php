<?php
// Script para extraer sales (DEBUG SOLAMENTE)
$config = file_get_contents('/home/u487588057/domains/cristoreyrc.com/public_html/wp-config.php');
preg_match_all("/define\(\s*'([A-Z_]+)'\s*,\s*'([^']+)'\s*\);/", $config, $matches);

$salts = array();
foreach ($matches[1] as $index => $key) {
    if (strpos($key, 'KEY') !== false || strpos($key, 'SALT') !== false) {
        $salts[$key] = $matches[2][$index];
    }
}

header('Content-Type: application/json');
echo json_encode($salts, JSON_PRETTY_PRINT);
exit;
?>