<?php
/**
 * Email capture for Shizen signup. Appends to log file — no database.
 */

$log_dir = __DIR__ . '/data';
$log_file = $log_dir . '/signups.log';

// Ensure data directory exists and is writable
if (!is_dir($log_dir)) {
    if (!@mkdir($log_dir, 0755, true)) {
        header('Location: index.php?e=2');
        exit;
    }
}

$email = isset($_POST['email']) ? trim($_POST['email']) : '';

// Basic validation
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php?e=1');
    exit;
}

$line = date('Y-m-d H:i:s') . "\t" . $email . "\t" . ($_SERVER['HTTP_USER_AGENT'] ?? '') . "\n";

if (@file_put_contents($log_file, $line, FILE_APPEND | LOCK_EX) === false) {
    header('Location: index.php?e=2');
    exit;
}

header('Location: index.php?s=1');
exit;
