<?php
echo "Current dir: " . __DIR__ . "\n";
echo "Parent dir contents: \n";
print_r(scandir('../../../'));
?>