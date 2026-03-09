<?php
$license_file = __DIR__ . '/LICENSE';
header('Content-Type: text/plain; charset=utf-8');
header('Content-Disposition: inline; filename="license.txt"');
if (is_readable($license_file)) {
    readfile($license_file);
} else {
    http_response_code(404);
    echo 'License file not found.';
}
