<?php
$config_path = '/home/u487588057/domains/cristoreyrc.com/public_html/wp-config.php';
if (!file_exists($config_path)) {
    die("Config not found at $config_path");
}
$config = file_get_contents($config_path);
preg_match_all("/define\(\s*'([A-Z_]+)'\s*,\s*'([^']+)'\s*\);/", $config, $matches);

$salts = array();
foreach ($matches[1] as $index => $key) {
    if (strpos($key, 'KEY') !== false || strpos($key, 'SALT') !== false) {
        $salts[$key] = $matches[2][$index];
    }
}

echo "SALTS_JSON:" . json_encode($salts);
exit;
?>