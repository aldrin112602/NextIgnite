<?php
session_start();
$config = require_once __DIR__ . '/config.php';

// Extract database configuration
$dbConfig = $config['database'];

$conn = mysqli_connect(
    $dbConfig['host'],
    $dbConfig['username'],
    $dbConfig['password'],
    $dbConfig['database'],
    $dbConfig['port']
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
