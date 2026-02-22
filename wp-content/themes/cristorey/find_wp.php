<?php
echo "Searching for wp-load.php...\n";
$start = '/home/u487588057/domains/temp.cristoreyrc.com/public_html/';
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($start));
foreach ($iterator as $file) {
    if ($file->getFilename() === 'wp-load.php') {
        echo "FOUND: " . $file->getPathname() . "\n";
    }
}
?>