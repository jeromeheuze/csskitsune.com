<?php
require_once __DIR__ . '/../includes/content.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: public, max-age=60');

echo json_encode([
    'generated_at' => gmdate('c'),
    'posts' => build_search_index(),
]);
