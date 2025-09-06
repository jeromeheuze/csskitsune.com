<?php

// Configure DB via environment variables with sensible defaults for local dev
$DBhost = getenv('DB_HOST') ?: 'localhost';
$DBuser = getenv('DB_USER') ?: 'spectrum_ckit_u';
$DBpass = getenv('DB_PASS') ?: '73pC_fbhmx75z,r@';
$DBname = getenv('DB_NAME') ?: 'spectrum_csskitsune';

$DBcon = new MySQLi($DBhost, $DBuser, $DBpass, $DBname);
if ($DBcon->connect_errno) {
    http_response_code(500);
    die("Database connection failed.");
}

// Ensure UTF-8
$DBcon->set_charset('utf8mb4');

// Create alias for consistency (some files use $conn, others use $DBcon)
$conn = $DBcon;